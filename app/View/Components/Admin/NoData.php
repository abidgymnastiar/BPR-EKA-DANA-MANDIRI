<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoData extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $hasData = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->hasData === false) {
            return view('components.admin.no-data');
        }
        return '';
    }
}
