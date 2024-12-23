<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{

    public string $route;

    public function __construct(string $route)
    {
        $this->route = $route;
    }

    public function render(): View|Closure|string
    {
        return view('components.nav-link');
    }
}
