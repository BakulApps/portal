<?php

namespace App\View\Components\Frontend;

use App\Models\Setting;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $phone;
    public $email;
    public $whatsapp;
    public $instagram;
    public $youtube;
    public $logo;

    public function __construct()
    {
        $setting = new Setting();
        $this->phone = $setting->value('institution_phone');
        $this->email = $setting->value('institution_email');
        $this->whatsapp = $setting->value('institution_whatsapp');
        $this->instagram = $setting->value('institution_instagram');
        $this->youtube = $setting->value('institution_youtube');
        $this->logo = $setting->value('site_logo');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.header');
    }
}
