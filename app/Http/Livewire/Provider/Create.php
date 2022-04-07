<?php

namespace App\Http\Livewire\Provider;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public User $user;

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        $roles = Role::find('3');
        $this->roles = $roles->id;

        return view('livewire.provider.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        return redirect()->route('admin.providers');
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.mobile' => [
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
        $this->listsForFields['provider_status'] = $this->user::PROVIDER_STATUS_SELECT;
    }
}
