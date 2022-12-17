<?php

namespace App\View\Components\Frontend;

use App\Models\Setting;
use Illuminate\View\Component;

class Head extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $favicon;
    public $meta;
    public $title;
    public function __construct($meta = null, $page = null)
    {
        $appname = Setting::where('name', 'appname')->value('content');
        $this->favicon = asset(Setting::where('name', 'favicon')->value('content'));
        $this->meta = $meta;
        $this->title = $page .' - '. $appname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.head');
    }
}
