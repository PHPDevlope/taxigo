<?php

namespace App\Http\Livewire\GeoFencing;

use App\Models\GeoFencing;
use Livewire\Component;

class Create extends Component
{
    public GeoFencing $geoFencing;

    public array $listsForFields = [];

    public function mount(GeoFencing $geoFencing)
    {
        $this->geoFencing = $geoFencing;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.geo-fencing.create');
    }

    public function submit()
    {
        $this->validate();

        $this->geoFencing->save();

        return redirect()->route('admin.geo-fencings.index');
    }

    protected function rules(): array
    {
        return [
            'geoFencing.city_name' => [
                'string',
                'nullable',
            ],
            'geoFencing.distance' => [
                'string',
                'nullable',
            ],
            'geoFencing.distance_price' => [
                'string',
                'nullable',
            ],
            'geoFencing.city_limits' => [
                'string',
                'nullable',
            ],
            'geoFencing.minute_price' => [
                'string',
                'nullable',
            ],
            'geoFencing.pricing_logic' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['pricing_logic'])),
            ],
            'geoFencing.hour_price' => [
                'string',
                'nullable',
            ],
            'geoFencing.base_price' => [
                'string',
                'nullable',
            ],
            'geoFencing.base_distance' => [
                'string',
                'nullable',
            ],
            'geoFencing.unit_time_pricing' => [
                'string',
                'nullable',
            ],
            'geoFencing.unit_distance_price' => [
                'string',
                'nullable',
            ],
            'geoFencing.seat_capacity' => [
                'string',
                'nullable',
            ],
            'geoFencing.waive_off_minutes' => [
                'string',
                'nullable',
            ],
            'geoFencing.per_minute_fare' => [
                'string',
                'nullable',
            ],
            'geoFencing.night_fare' => [
                'string',
                'nullable',
            ],
            'geoFencing.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['pricing_logic'] = $this->geoFencing::PRICING_LOGIC_SELECT;
        $this->listsForFields['status']        = $this->geoFencing::STATUS_SELECT;
    }
}
