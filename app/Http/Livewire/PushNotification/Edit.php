<?php

namespace App\Http\Livewire\PushNotification;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $ios_push_environment;
    public $ios_push_password;
    public $android_push_key;

    public function mount(MSetting $mSetting)
    {
        $iosPushEnvironment = MSetting::where("key", "ios_push_environment")->first();
        $iosPushPassword = MSetting::where("key", "ios_push_password")->first();
        $androidPushKey = MSetting::where("key", "android_push_key")->first();

        $this->ios_push_environment = $iosPushEnvironment->value;
        $this->ios_push_password = $iosPushPassword->value;
        $this->android_push_key = $androidPushKey->value;
    }

    public function render()
    {
        return view('livewire.push-notification.edit');
    }

    public function submit()
    {
        $iosPushEnvironment = MSetting::where("key", "ios_push_environment")->first();
        $iosPushEnvironment->update([
            "value" => $this->ios_push_environment
        ]);
        $iosPushPassword = MSetting::where("key", "ios_push_password")->first();
        $iosPushPassword->update([
            "value" => $this->ios_push_password
        ]);
        $androidPushKey = MSetting::where("key", "android_push_key")->first();
        $androidPushKey->update([
            "value" => $this->android_push_key
        ]);

        return redirect()->route('admin.app-settings.push-notifications');
    }
}
