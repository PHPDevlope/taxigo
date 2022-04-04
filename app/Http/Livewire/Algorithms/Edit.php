<?php

namespace App\Http\Livewire\Algorithms;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $provider_accept_timeout;
    public $provider_search_radius;
    public $distance;

    public function mount(MSetting $mSetting)
    {
        $providerAcceptTimeout = MSetting::where("key", "provider_accept_timeout")->first();
        $providerSearchRadius = MSetting::where("key", "provider_search_radius")->first();
        $distance = MSetting::where("key", "distance")->first();

        $this->provider_accept_timeout = $providerAcceptTimeout->value;
        $this->provider_search_radius = $providerSearchRadius->value;
        $this->distance = $distance->value;

    }

    public function render()
    {
        return view('livewire.algorithms.edit');
    }

    public function submit()
    {
        $providerAcceptTimeout = MSetting::where("key", "provider_accept_timeout")->first();
        $providerAcceptTimeout->update([
            "value" => $this->provider_accept_timeout
        ]);
        $providerSearchRadius = MSetting::where("key", "provider_search_radius")->first();
        $providerSearchRadius->update([
            "value" => $this->provider_search_radius
        ]);
        $distance = MSetting::where("key", "distance")->first();
        $distance->update([
            "value" => $this->distance
        ]);

        return redirect()->route('admin.site-settings.algorithms');
    }
}
