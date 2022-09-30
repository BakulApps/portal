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

    public function __construct($meta, $page)
    {
        $setting = new Setting();
        $this->favicon = $setting->value('site_favicon');
        if ($meta != null){

        }
        else {
            $this->meta = (object)[
                'title' => $setting->value('meta_title'),
                'description' => $setting->value('meta_desc'),
                'keyword' => $setting->value('meta_keyword'),
                'author' => $setting->value('meta_author'),
            ];
        }
        if ($page == null){
            $this->title = $setting->value('site_name');
        }
        else {
            $this->title = $page .' - '. $setting->value('site_name');
        }
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
