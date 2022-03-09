<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Company $company;

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

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->initListsForFields();
        $this->mediaCollections = [
            'company_logo' => $company->logo,
            'company_docs' => $company->docs,
        ];
    }

    public function render()
    {
        return view('livewire.company.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->company->save();
        $this->syncMedia();

        return redirect()->route('admin.company');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->company->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'company.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'mediaCollections.company_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.company_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.company_docs' => [
                'array',
                'nullable',
            ],
            'mediaCollections.company_docs.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'company.name' => [
                'string',
                'nullable',
            ],
            'company.address' => [
                'string',
                'nullable',
            ],
            'company.commission_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['commission_type'])),
            ],
            'company.commission_value' => [
                'string',
                'nullable',
            ],
            'company.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']            = User::pluck('name', 'id')->toArray();
        $this->listsForFields['commission_type'] = $this->company::COMMISSION_TYPE_SELECT;
        $this->listsForFields['status']          = $this->company::STATUS_SELECT;
    }
}
