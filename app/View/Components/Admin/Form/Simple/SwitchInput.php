<?php

namespace App\View\Components\Admin\Form\Simple;

use Illuminate\View\Component;

class SwitchInput extends Component
{
    public $type; // Тип поля
    public $checked; // Чи відмічено чи ні
    public $field; // Назва поля
    public $label; // Лейбл для поля
    public $id; // ID поля
    public $disabled; // Доступність поля
    public $required; // Обовязкове поле чи ні
    public $value; // Своє значення
    public $withoutError; // true - якщо не потрібно виводити помилки
    public $customAttributes; // Масив атрибутів. Ключ елементу массива - назва. Значення елементу масива - значення дата атрибуту
    public $formCheckAttributes; // Массив атрибутів для батьківського div.form-check
    public $formCheckClass; // Класи батьківського div.form-check

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $field,
        bool $checked = false,
        string $type = 'checkbox',
        string $label = null,
        string $id = null,
        bool $disabled = false,
        bool $required = false,
        bool $withoutError = false,
        string $value = null,
        array $customAttributes = [],
        array $formCheckAttributes = [],
        string $formCheckClass = '',
    ) {
        $this->checked = $checked;
        $this->type = $type;
        $this->field = $field;
        $this->label = $label;
        $this->id = $id;
        $this->disabled = $disabled;
        $this->required = $required;
        $this->withoutError = $withoutError;
        $this->value = $value;
        $this->customAttributes = $customAttributes;
        $this->formCheckAttributes = $formCheckAttributes;
        $this->formCheckClass = $formCheckClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.simple.switch-input');
    }
}
