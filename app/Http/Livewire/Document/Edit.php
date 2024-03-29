<?php

namespace App\Http\Livewire\Document;

use App\Models\Document;
use Livewire\Component;

class Edit extends Component
{
    public Document $document;

    public array $listsForFields = [];

    public function mount(Document $document)
    {
        $this->document = $document;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.document.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->document->save();

        return redirect()->route('admin.document');
    }

    protected function rules(): array
    {
        return [
            'document.document_name' => [
                'string',
                'nullable',
            ],
            'document.document_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['document_type'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['document_type'] = $this->document::DOCUMENT_TYPE_SELECT;
    }
}
