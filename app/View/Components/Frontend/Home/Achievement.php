<?php

namespace App\View\Components\Frontend\Home;

use App\Models\Page;
use Illuminate\View\Component;

class Achievement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;
    public $achievement;
    public function __construct()
    {
        foreach (Page::all() as $pages){
            $page[$pages->page_name] = $pages->page_value;
        }
        $this->page = (object) $page;
        $this->achievement = json_decode($this->page->home_widget_achievement_content_second, false);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.home.achievement');
    }
}
