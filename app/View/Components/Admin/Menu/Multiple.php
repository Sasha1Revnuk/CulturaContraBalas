<?php

namespace App\View\Components\Admin\Menu;

use Illuminate\View\Component;

class Multiple extends Component
{
    /*
       * $items => [
       *  [
       *      'href' => 'route_name',
       *      'title' => 'title'
       *      'params' => []
       *  ],[
       *      'href' => [
       *          'title => 'title',
       *          'href' => 'route_name'
       *          'params' => []
       *      ],
       *      'title' => 'title'
       *  ],
       * ]
       * */
    public array $items;
    public string $title;
    public string $menuIcon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        array $items,
        string $title = '',
        string $menuIcon = 'bx bx-circle',
    ) {
        $this->items = $items;
        $this->title = $title;
        $this->menuIcon = $menuIcon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.menu.multiple');
    }


}
