<?php

namespace App\View;

class Renderer
{
    const string LAYOUT_PATH = __DIR__ . '';

    public function __construct(protected string $layoutPath = self::LAYOUT_PATH)
    {

    }

    public function __invoke(
        string $template,

    )
    {

    }
}
