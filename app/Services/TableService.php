<?php

namespace App\Services;


class TableService
{

    /**
     * @param array $items
     * Single item: [
     *  'href' - for link, not required,
     *  'title' - item title
     *  'attributes' => [
     *      'attribute_name' => 'attribute_value'
     *  ],
     * 'class' => 'classes'
     * ]
     * @return string
     */
    public function getButtons(array $items): string
    {
        if (count($items) > 1) {
            return view('layouts.admin.includes.datatable.dropdownButton', compact('items'))->render();
        }

        if (!count($items)) {
            return '';
        }

        return view('layouts.admin.includes.datatable.singleButton', ['item' => $items[0]])->render();
    }


    public function getUrl($title, $href, $target = "")
    {
        return '<a target="' . $target . '" href="' . $href . '">' . $title . '</a>';
    }

    public function getImage($href)
    {
        return '<img class="img-thumbnail" alt="200x200" height="36" width="50" src="' . $href . '" data-holder-rendered="true">';
    }

    public function sorting()
    {
        return '<span style="cursor:grab" ><i class="bx bx-sort" style=""></i></span>';
    }

    public function span($class, $title, $styles = null)
    {
        return '<span style="' . $styles . '" class="' . $class . '">' . $title . '</span>';
    }
}

