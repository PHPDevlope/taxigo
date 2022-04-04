<?php

namespace App\Http\Livewire\ProviderDocument;

use App\Models\Document;
use App\Models\ProviderDocument;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public ProviderDocument $providerDocument;

    public array $listsForFields = [];

    public function mount(ProviderDocument $providerDocument)
    {
        $this->providerDocument = $providerDocument;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.provider-document.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->providerDocument->save();

        return redirect()->route('admin.provider-documents');
    }

    protected function rules(): array
    {
        return [
            'providerDocument.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'providerDocument.document_id' => [
                'integer',
                'exists:documents,id',
                'nullable',
            ],
            'providerDocument.status' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user_name']     = User::pluck('name', 'id')->toArray();
        $this->listsForFields['document_name'] = Document::pluck('document_name', 'id')->toArray();
    }
}
