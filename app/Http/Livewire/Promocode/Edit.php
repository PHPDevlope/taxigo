<?php

namespace App\Http\Livewire\Promocode;

use App\Models\Promocode;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Promocode $promocode;

    public array $listsForFields = [];

    public function mount(Promocode $promocode)
    {
        $this->promocode = $promocode;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.promocode.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->promocode->save();

        return redirect()->route('admin.promocode');
    }

    protected function rules(): array
    {
        return [
            'promocode.promocode' => [
                'string',
                'nullable',
            ],
            'promocode.discount' => [
                'string',
                'nullable',
            ],
            'promocode.promocodes_use' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['promocodes_use'])),
            ],
            'promocode.use_count' => [
                'string',
                'nullable',
            ],
            'promocode.from_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'promocode.expiration' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'promocode.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['promocodes_use'] = $this->promocode::PROMOCODES_USE_SELECT;
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
