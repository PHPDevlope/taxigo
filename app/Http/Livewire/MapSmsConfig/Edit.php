<?php

namespace App\Http\Livewire\MapSmsConfig;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $web_map_key;
    public $android_map_key;
    public $ios_map_key;
    public $fb_app_version;
    public $fb_app_id;
    public $fb_app_secret;

    public function mount(MSetting $mSetting)
    {
        $webMapKey = MSetting::where("key", "web_map_key")->first();
        $androidMapKey = MSetting::where("key", "android_map_key")->first();
        $iosMapKey = MSetting::where("key", "ios_map_key")->first();
        $fbAppVersion = MSetting::where("key", "fb_app_version")->first();
        $fbAppId = MSetting::where("key", "fb_app_id")->first();
        $fbAppSecret = MSetting::where("key", "fb_app_secret")->first();

        $this->web_map_key = $webMapKey->value;
        $this->android_map_key = $androidMapKey->value;
        $this->ios_map_key = $iosMapKey->value;
        $this->fb_app_version = $fbAppVersion->value;
        $this->fb_app_id = $fbAppId->value;
        $this->fb_app_secret = $fbAppSecret->value;

    }

    public function render()
    {
        return view('livewire.map-sms-config.edit');
    }

    public function submit()
    {
        $webMapKey = MSetting::where("key", "web_map_key")->first();
        $webMapKey->update([
            "value" => $this->web_map_key
        ]);
        $androidMapKey = MSetting::where("key", "android_map_key")->first();
        $androidMapKey->update([
            "value" => $this->android_map_key
        ]);
        $iosMapKey = MSetting::where("key", "ios_map_key")->first();
        $iosMapKey->update([
            "value" => $this->ios_map_key
        ]);
        $fbAppVersion = MSetting::where("key", "fb_app_version")->first();
        $fbAppVersion->update([
            "value" => $this->fb_app_version
        ]);
        $fbAppId = MSetting::where("key", "fb_app_id")->first();
        $fbAppId->update([
            "value" => $this->fb_app_id
        ]);
        $fbAppSecret = MSetting::where("key", "fb_app_secret")->first();
        $fbAppSecret->update([
            "value" => $this->fb_app_secret
        ]);

        return redirect()->route('admin.app-settings.map-sms-configs');
    }
}
