<?php

namespace App\View\Components\Admin\Menu;

use Illuminate\View\Component;

class Single extends Component
{

    public string $route;
    public array $params;
    public string $title;
    public string $menuIcon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $route,
        string $title = '',
        array $params = [],
        string $menuIcon = 'bx bx-circle'
    ) {
        $this->route = $route;
        $this->title = $title;
        $this->params = $params;
        $this->menuIcon = $menuIcon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.menu.single');
    }


}
