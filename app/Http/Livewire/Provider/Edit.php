<?php

namespace App\Http\Livewire\Provider;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public User $user;

    public array $roles = [];

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.provider.edit');
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
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
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
        $this->listsForFields['provider_status'] = $this->user::PROVIDER_STATUS_SELECT;
    }
}

