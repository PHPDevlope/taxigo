<?php

namespace App\Http\Livewire\StaticPage;

use App\Models\StaticPage;
use Livewire\Component;

class Edit extends Component
{
    public StaticPage $staticPage;

    public array $listsForFields = [];

    public function mount(StaticPage $staticPage)
    {
        $this->staticPage = $staticPage;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.static-page.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->staticPage->save();

        return redirect()->route('admin.static-page');
    }

    protected function rules(): array
    {
        return [
            'staticPage.page_name' => [
                'string',
                'nullable',
            ],
            'staticPage.content' => [
                'string',
                'nullable',
            ],
            'staticPage.data' => [
                'string',
                'nullable',
            ],
            'staticPage.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->staticPage::STATUS_SELECT;
    }
}
