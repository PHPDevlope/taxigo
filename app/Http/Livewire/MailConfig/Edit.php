<?php

namespace App\Http\Livewire\MailConfig;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $send_mail;
    public $driver;
    public $host;
    public $port;
    public $username;
    public $password;
    public $from_address;
    public $from_name;
    public $encryption;

    public $sendMail;

    public function mount(MSetting $mSetting)
    {
        $sendMail = MSetting::where("key", "send_mail")->first();
        $driver = MSetting::where("key", "driver")->first();
        $host = MSetting::where("key", "host")->first();
        $port = MSetting::where("key", "port")->first();
        $username = MSetting::where("key", "username")->first();
        $password = MSetting::where("key", "password")->first();
        $fromAddress = MSetting::where("key", "from_address")->first();
        $fromName = MSetting::where("key", "from_name")->first();
        $encryption = MSetting::where("key", "encryption")->first();


        $this->send_mail = $sendMail->value == "1" ? 1 : 0;
        $this->driver = $driver->value;
        $this->host = $host->value;
        $this->port = $port->value;
        $this->username = $username->value;
        $this->password = $password->value;
        $this->from_address = $fromAddress->value;
        $this->from_name = $fromName->value;
        $this->encryption = $encryption->value;
    }

    public function render()
    {
        return view('livewire.mail-config.edit');
    }

    public function submit()
    {
        $sendMail = MSetting::where("key", "send_mail")->first();
        $sendMail->update([
            "value" => $this->send_mail
        ]);

        $driver = MSetting::where("key", "driver")->first();
        $driver->update([
            "value" => $this->driver
        ]);

        $host = MSetting::where("key", "host")->first();
        $host->update([
            "value" => $this->host
        ]);

        $port = MSetting::where("key", "port")->first();
        $port->update([
            "value" => $this->port
        ]);

        $username = MSetting::where("key", "username")->first();
        $username->update([
            "value" => $this->username
        ]);

        $password = MSetting::where("key", "password")->first();
        $password->update([
            "value" => $this->password
        ]);

        $from_address = MSetting::where("key", "from_address")->first();
        $from_address->update([
            "value" => $this->from_address
        ]);

        $from_name = MSetting::where("key", "from_name")->first();
        $from_name->update([
            "value" => $this->from_name
        ]);

        $encryption = MSetting::where("key", "encryption")->first();
        $encryption->update([
            "value" => $this->encryption
        ]);

        return redirect()->route('admin.site-settings.mail-configs');
    }

}
