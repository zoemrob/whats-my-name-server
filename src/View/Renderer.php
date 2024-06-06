<?php

namespace App\View;

class Renderer
{
    const string MAIN_LAYOUT_PATH = 'layouts/main.php';

    public function __construct(protected string $layout = self::MAIN_LAYOUT_PATH)
    {}

    // Renders into layout
    public function __invoke(string $template, array $templateData = []): string
    {
        return $this->render($this->layout, ['template' => $this->render($template, $templateData)]);
    }

    // renders any partial, returning the rendered string
    public function render(string $template, array $templateData = []): string
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/views/' . $template;

        foreach ($templateData as $name => $value) {
            $$name = $value;
        }

        ob_start();

        if (file_exists($filePath)) {
            include $filePath;
        }

        return ob_get_clean();
    }
}
