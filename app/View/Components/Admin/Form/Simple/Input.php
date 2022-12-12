<?php

namespace App\View\Components\Admin\Form\Simple;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Input extends Component
{
    public $type; // Тип поля
    public $field; // Назва поля
    public $label; // Лейбл для поля
    public $id; // ID поля
    public $disabled; // Доступність поля
    public $model; // Обєкт класу
    public $required; // Обовязкове поле чи ні
    public $hint; // Підсказка для поля
    public $value; // Своє значення
    public $customAttributes; // Масив атрибутів. Ключ елементу массива - назва. Значення елементу масива - значення дата атрибуту


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $field,
        string $type = 'text',
        string $label = null,
        string $id = null,
        bool $disabled = false,
        Model $model = null,
        bool $required = false,
        string $hint = '',
        string $value = null,
        array $customAttributes = []
    ) {
        $this->type = $type;
        $this->field = $field;
        $this->label = $label;
        $this->id = $id;
        $this->disabled = $disabled;
        $this->model = $model;
        $this->required = $required;
        $this->hint = $hint;
        $this->value = $value;
        $this->customAttributes = $customAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.simple.input');
    }
}
