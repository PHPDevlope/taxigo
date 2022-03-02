<?php

namespace App\Http\Livewire\FleetOwner;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{

    public User $user;

    public array $roles = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'user_profile' => $user->profile,
        ];
    }

    public function render()
    {
        return view('livewire.fleet-owner.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->user->save();
        $this->user->roles()->sync($this->roles);
        $this->syncMedia();

        return redirect()->route('admin.fleet-owners');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->user->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'mediaCollections.user_profile' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_profile.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'user.name' => [
                'string',
                'required',
            ],
            'user.mobile' => [
                'string',
                'nullable',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.company_id' => [
                'integer',
                'exists:companies,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles']           = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['company']       = Company::pluck('name', 'id')->toArray();
    }
}
