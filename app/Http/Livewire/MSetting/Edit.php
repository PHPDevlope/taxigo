<?php

namespace App\Http\Livewire\MSetting;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;

    public function mount(MSetting $mSetting)
    {
        $this->mSetting = $mSetting;
    }

    public function render()
    {
        return view('livewire.m-setting.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->mSetting->save();

        return redirect()->route('admin.m-settings.index');
    }

    protected function rules(): array
    {
        return [
            'mSetting.key' => [
                'string',
                'nullable',
            ],
            'mSetting.value' => [
                'string',
                'nullable',
            ],
            'mSetting.data' => [
                'string',
                'nullable',
            ],
            'mSetting.sub_data' => [
                'string',
                'nullable',
            ],
            'mSetting.field_1' => [
                'string',
                'nullable',
            ],
            'mSetting.field_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
