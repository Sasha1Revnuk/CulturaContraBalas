<?php

namespace App\View\Components\Admin\Form\Simple;

use Illuminate\View\Component;

class Select extends Component
{
    public $field; // Назва поля
    public $label; // Лейбл для поля
    public $id; // ID поля
    public $disabled; // Доступність поля
    public $required; // Обовязкове поле чи ні
    public $hint; // Підсказка для поля
    public $customAttributes; // Масив атрибутів. Ключ елементу массива - назва. Значення елементу масива - значення дата атрибуту


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $field,
        string $label = null,
        string $id = null,
        bool $disabled = false,
        bool $required = false,
        string $hint = '',
        array $customAttributes = []
    ) {
        $this->field = $field;
        $this->label = $label;
        $this->id = $id;
        $this->disabled = $disabled;
        $this->required = $required;
        $this->hint = $hint;
        $this->customAttributes = $customAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.simple.select');
    }
}
