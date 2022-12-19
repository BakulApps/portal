<?php

namespace App\View\Components\Frontend\Home;

use App\Models\Page;
use Illuminate\View\Component;

class AboutUs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;

    public function __construct()
    {
        foreach (Page::all() as $pages){
            $page[$pages->page_name] = $pages->page_value;
        }
        $this->page = (object) $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.home.about-us');
    }
}
