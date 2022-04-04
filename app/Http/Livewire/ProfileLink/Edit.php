<?php

namespace App\Http\Livewire\ProfileLink;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $playstore_user_link;
    public $playstore_provider_link;
    public $appstore_user_link;
    public $appstore_provider_link;
    public $facebook_link;
    public $twitter_link;

    public function mount(MSetting $mSetting)
    {
        $playstoreUserLink = MSetting::where("key", "playstore_user_link")->first();
        $playstoreProviderLink = MSetting::where("key", "playstore_provider_link")->first();
        $appstoreUserLink = MSetting::where("key", "appstore_user_link")->first();
        $appstoreProviderLink = MSetting::where("key", "appstore_provider_link")->first();
        $facebookLink = MSetting::where("key", "facebook_link")->first();
        $twitterLink = MSetting::where("key", "twitter_link")->first();

        $this->playstore_user_link = $playstoreUserLink->value;
        $this->playstore_provider_link = $playstoreProviderLink->value;
        $this->appstore_user_link = $appstoreUserLink->value;
        $this->appstore_provider_link = $appstoreProviderLink->value;
        $this->facebook_link = $facebookLink->value;
        $this->twitter_link = $twitterLink->value;
    }

    public function render()
    {
        return view('livewire.profile-link.edit');
    }

    public function submit()
    {
        $playstoreUserLink = MSetting::where("key", "playstore_user_link")->first();
        $playstoreUserLink->update([
            "value" => $this->playstore_user_link
        ]);
        $playstoreProviderLink = MSetting::where("key", "playstore_provider_link")->first();
        $playstoreProviderLink->update([
            "value" => $this->playstore_provider_link,
        ]);
        $appstoreUserLink = MSetting::where("key", "appstore_user_link")->first();
        $appstoreUserLink->update([
            "value" => $this->appstore_user_link
        ]);
        $appstoreProviderLink = MSetting::where("key", "appstore_provider_link")->first();
        $appstoreProviderLink->update([
            "value" => $this->appstore_provider_link
        ]);
        $facebookLink = MSetting::where("key", "facebook_link")->first();
        $facebookLink->update([
            "value" => $this->facebook_link
        ]);
        $twitterLink = MSetting::where("key", "twitter_link")->first();
        $twitterLink->update([
            "value" => $this->twitter_link
        ]);

        return redirect()->route('admin.site-settings.profile-links');
    }
}
