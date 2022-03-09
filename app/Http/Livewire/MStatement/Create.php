<?php

namespace App\Http\Livewire\MStatement;

use App\Models\Document;
use App\Models\MStatement;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public MStatement $mStatement;

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

    public function mount(MStatement $mStatement)
    {
        $this->mStatement = $mStatement;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.m-statement.create');
    }

    public function submit()
    {
        $this->validate();

        $this->mStatement->save();
        $this->syncMedia();

        return redirect()->route('admin.statements');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->mStatement->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'mStatement.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'mStatement.document_id' => [
                'integer',
                'exists:documents,id',
                'nullable',
            ],
            'mediaCollections.m_statement_files' => [
                'array',
                'nullable',
            ],
            'mediaCollections.m_statement_files.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']     = User::pluck('name', 'id')->toArray();
        $this->listsForFields['document'] = Document::pluck('document_name', 'id')->toArray();
    }
}
