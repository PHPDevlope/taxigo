<?php

namespace App\Http\Livewire\PeakTime;

use App\Models\PeakTime;
use Livewire\Component;

class Create extends Component
{
    public PeakTime $peakTime;

    public array $listsForFields = [];

    public function mount(PeakTime $peakTime)
    {
        $this->peakTime = $peakTime;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.peak-time.create');
    }

    public function submit()
    {
        $this->validate();

        $this->peakTime->save();

        return redirect()->route('admin.peak-times.index');
    }

    protected function rules(): array
    {
        return [
            'peakTime.from' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'peakTime.to' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'peakTime.peak_price' => [
                'numeric',
                'nullable',
            ],
            'peakTime.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->peakTime::STATUS_SELECT;
    }
}
