<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;

    public string $name;

    public bool $value;

//	public $uniqueId;

    public function mount()
    {
        $this->value = (bool) $this->model->getAttribute('status');
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($name, $value)
    {
        $this->model->setAttribute($name, $value)->save();
    }
}
