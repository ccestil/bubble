<?php

namespace App\View\Components\Admins;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Employee extends Component
{
    /**
     * The employees data.
     *
     * @var mixed
     */
    public $employees;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $employees
     * @return void
     */
    public function __construct($employees = null) // Make $employees optional and set default to null
    {
        $this->employees = $employees;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.admins.employee');
    }
}