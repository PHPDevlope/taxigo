<?php

namespace App\Http\Livewire\SocialLink;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $social_login;
    public $facebook_client_id;
    public $facebook_client_secret;
    public $facebook_redirect_url;
    public $google_client_id;
    public $google_client_secret;
    public $google_redirect_url;

    public function mount(MSetting $mSetting)
    {
        $socialLogin = MSetting::where("key", "social_login")->first();
        $facebookClientId = MSetting::where("key", "facebook_client_id")->first();
        $facebookClientSecret = MSetting::where("key", "facebook_client_secret")->first();
        $facebookRedirectUrl = MSetting::where("key", "facebook_redirect_url")->first();
        $googleClientId = MSetting::where("key", "google_client_id")->first();
        $googleClientSecret = MSetting::where("key", "google_client_secret")->first();
        $googleRedirectUrl = MSetting::where("key", "google_redirect_url")->first();

        $this->social_login = $socialLogin->value;
        $this->facebook_client_id = $facebookClientId->value;
        $this->facebook_client_secret = $facebookClientSecret->value;
        $this->facebook_redirect_url = $facebookRedirectUrl->value;
        $this->google_client_id = $googleClientId->value;
        $this->google_client_secret = $googleClientSecret->value;
        $this->google_redirect_url = $googleRedirectUrl->value;

    }

    public function render()
    {
        return view('livewire.social-link.edit');
    }

    public function submit()
    {
        $socialLogin = MSetting::where("key", "social_login")->first();
        $socialLogin->update([
            "value" => $this->social_login
        ]);

        $facebookClientId = MSetting::where("key", "facebook_client_id")->first();
        $facebookClientId->update([
            "value" => $this->facebook_client_id
        ]);

        $facebookClientSecret = MSetting::where("key", "facebook_client_secret")->first();
        $facebookClientSecret->update([
            "value" => $this->facebook_client_secret
        ]);

        $facebookRedirectUrl = MSetting::where("key", "facebook_redirect_url")->first();
        $facebookRedirectUrl->update([
            "value" => $this->facebook_redirect_url
        ]);

        $googleClientId = MSetting::where("key", "google_client_id")->first();
        $googleClientId->update([
            "value" => $this->google_client_id
        ]);

        $googleClientSecret = MSetting::where("key", "google_client_secret")->first();
        $googleClientSecret->update([
            "value" => $this->google_client_secret
        ]);

        $googleRedirectUrl = MSetting::where("key", "google_redirect_url")->first();
        $googleRedirectUrl->update([
            "value" => $this->google_redirect_url
        ]);

        return redirect()->route('admin.site-settings.social-links');
    }
}
