<?php

namespace App\Http\Livewire\AppGeneral;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $site_name;
    public $time_zone;
    public $contact_number;
    public $contact_email;
    public $sos_number;
    public $copyright_content;

    public function mount(MSetting $mSetting){
        $siteName = MSetting::where("key", "site_name")->first();
        $timeZone = MSetting::where("key", "time_zone")->first();
        $contactNumber = MSetting::where("key", "contact_number")->first();
        $contactEmail = MSetting::where("key", "contact_email")->first();
        $sosNumber = MSetting::where("key", "sos_number")->first();
        $copyrightContent = MSetting::where("key", "copyright_content")->first();

        $this->site_name = $siteName->value;
        $this->time_zone = $timeZone->value;
        $this->contact_number = $contactNumber->value;
        $this->contact_email = $contactEmail->value;
        $this->sos_number = $sosNumber->value;
        $this->copyright_content = $copyrightContent->value;
    }

    public function render()
    {
        return view('livewire.app-general.edit');
    }

    public function submit()
    {
        $siteName = MSetting::where("key", "site_name")->first();
        $siteName->update([
            "value" => $this->site_name,
        ]);
        $timeZone = MSetting::where("key", "time_zone")->first();
        $timeZone->update([
            "value" => $this->time_zone,
        ]);
        $contactNumber = MSetting::where("key", "contact_number")->first();
        $contactNumber->update([
            "value" => $this->contact_number
        ]);
        $contactEmail = MSetting::where("key", "contact_email")->first();
        $contactEmail->update([
            "value" => $this->contact_email
        ]);
        $sosNumber = MSetting::where("key", "sos_number")->first();
        $sosNumber->update([
            "value" => $this->sos_number
        ]);
        $copyrightContent = MSetting::where("key", "copyright_content")->first();
        $copyrightContent->update([
            "value" => $this->copyright_content
        ]);

        return redirect()->route('admin.site-settings.app-generals');
    }
}
