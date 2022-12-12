<?php

namespace App\Traits;

trait WebMetaTrait
{
    /**
     * @param string|null $title
     * @param string|null $description
     * @param string|null $keywords
     * @param string|null $robots
     * @return null[]|string[]
     */
    public function getMeta( ?string $title = '', ?string $description = '', ?string $keywords = '', ?string $robots = '') : array
    {
        return [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
            'robots' => $robots,
        ];
    }
}
