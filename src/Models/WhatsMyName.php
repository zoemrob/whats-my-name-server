<?php

namespace App\Models;

use App\Models\WhatsMyName\Site;

class WhatsMyName
{
    const string URL = 'https://raw.githubusercontent.com/WebBreacher/WhatsMyName/main/wmn-data.json';

    public array $data;

    public function loadData(): void
    {
        $file = file_get_contents(self::URL);
        $this->data = json_decode($file, true);
    }

    public function getSites(): array
    {
        if (empty($this->data)) {
            $this->loadData();
        }

        if (!isset($this->data['sites'])) {
            return [];
        }

        return array_map(fn($siteData) => new Site($siteData), $this->data['sites']);
    }
}
