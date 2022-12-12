<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Modal extends Component
{
    public bool $withHeader;
    public bool $withFooter;
    public string $id;
    //Різні види модалок: modal-fullscreen, modal-xl, modal-lg, modal-sm, modal-dialog-centered, modal-dialog-scrollable
    public string $modalDialogClass;
    public array $customAttributes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $id,
        string $modalDialogClass = '',
        array $customAttributes = [],
        bool $withHeader = false,
        bool $withFooter = false
    ) {
        $this->withHeader = $withHeader;
        $this->withFooter = $withFooter;
        $this->id = $id;
        $this->modalDialogClass = $modalDialogClass;
        $this->customAttributes = $customAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal');
    }
}
