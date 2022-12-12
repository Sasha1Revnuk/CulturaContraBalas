<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * @var string
     */
    public $type;

    /**
     * Масив атрибутів. Ключ елементу массива - назва. Значення елементу масива - значення дата атрибуту
     * @var array
     */
    public $customAttributes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type = 'button', array $customAttributes = [])
    {
        $this->type = $type;
        $this->customAttributes = $customAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.button');
    }

   
}
