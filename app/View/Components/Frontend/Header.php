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
        $this->phone        = Setting::where('name', 'phone')->value('content');
        $this->email        = Setting::where('name', 'email')->value('content');
        $this->whatsapp     = Setting::where('name', 'whatsapp')->value('content');
        $this->instagram    = Setting::where('name', 'instagram')->value('content');
        $this->youtube      = Setting::where('name', 'youtube')->value('content');
        $this->logo         = asset(Setting::where('name', 'logo')->value('content'));
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
