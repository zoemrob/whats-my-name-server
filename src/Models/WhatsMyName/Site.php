<?php

namespace App\Models\WhatsMyName;

class Site
{
    public string $name;
    public string $uri_check;
    public string $uri_pretty;
    public string $cat;
    public int $e_code;
    public string $e_string;
    public int $m_code;
    public string $m_string;
    public array $known;

    public function __construct(array $siteData) {
        $this->name = $siteData['name'] ?? '';
        $this->uri_check = $siteData['uri_check'] ?? '';
        $this->uri_pretty = $siteData['uri_pretty'] ?? '';
        $this->cat = $siteData['cat'] ?? '';
        $this->e_code = $siteData['e_code'] ?? 400;
        $this->e_string = $siteData['e_string'] ?? '';
        $this->m_code = $siteData['m_code'] ?? 200;
        $this->m_string = $siteData['m_string'] ?? '';
        $this->known = $siteData['known'] ?? [];
    }

    public function checkUri(string $username): string
    {
        return str_replace('{account}', $username, $this->uri_check);
    }

    public function prettyUri(string $username): string
    {
        return str_replace('{account}', $username, $this->uri_pretty);
    }
}
