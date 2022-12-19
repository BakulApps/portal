<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $sliders;
    public function __construct()
    {
        $this->sliders = \App\Models\Slider::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.slider');
    }
}
