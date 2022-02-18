<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public User $user;

    public array $roles = [];

    public string $password = '';

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

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->save();
        $this->user->roles()->sync($this->roles);
        $this->syncMedia();

        return redirect()->route('admin.users.index');
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
            'user.mobile_verified_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email',
            ],
            'password' => [
                'string',
                'required',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
            'user.otp' => [
                'string',
                'nullable',
            ],
            'user.firebase_token' => [
                'string',
                'nullable',
            ],
            'user.device_token' => [
                'string',
                'nullable',
            ],
            'user.device_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['device_type'])),
            ],
            'user.device' => [
                'string',
                'nullable',
            ],
            'user.bio' => [
                'string',
                'nullable',
            ],
            'user.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'user.dob' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'user.address' => [
                'string',
                'nullable',
            ],
            'user.provider_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['provider_status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles']           = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['device_type']     = $this->user::DEVICE_TYPE_SELECT;
        $this->listsForFields['gender']          = $this->user::GENDER_SELECT;
        $this->listsForFields['provider_status'] = $this->user::PROVIDER_STATUS_SELECT;
    }
}
