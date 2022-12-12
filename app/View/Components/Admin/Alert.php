<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Чи закриваючий алерт
     * @var string
     */
    public bool $withClose;

    /**
     * Заготовлені типи:
     * success,
     * danger,
     * warning,
     * info
     * other - тип за замовчуванням. Потрібно вказакати необхідний клас і прописати дані в слоті
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
    public function __construct(bool $withClose = false, array $customAttributes = [], string $type = 'other')
    {
        $this->type = $type;
        $this->withClose = $withClose;
        $this->customAttributes = $customAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.alert');
    }

    public function getDefaultMdi(): string
    {
        switch ($this->type) {
            case 'success':
                return '<i class="mdi mdi-check-all me-2"></i>';
            case 'danger':
                return '<i class="mdi mdi-block-helper me-2"></i>';
            case 'warning':
                return '<i class="mdi mdi-block-helper me-2"></i>';
            case 'info':
                return '<i class="mdi mdi-alert-circle-outline me-2"></i>';
            default:
                return '';
        }
    }
}
