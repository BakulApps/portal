<?php

namespace App\View\Components\Frontend\Home;

use App\Models\Page;
use Illuminate\View\Component;

class CourseArea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;
    public $carousel;
    public function __construct()
    {
        foreach (Page::all() as $pages){
            $page[$pages->page_name] = $pages->page_value;
        }
        $this->page = (object) $page;
        $this->carousel = json_decode($this->page->home_widget_course_content_second, false);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.home.course-area');
    }
}
