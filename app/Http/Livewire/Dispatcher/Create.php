<?php

namespace App\Http\Livewire\Dispatcher;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{

    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $roles = Role::find('5');
        $this->roles = $roles->id;

        return view('livewire.dispatcher.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        return redirect()->route('admin.dispatchers');
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
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email',
            ],
        ];
    }
}
