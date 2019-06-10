<?php

namespace UrlShortener\Models;

class Url
{
    public $id;
    public $url;

    public function __construct($data = null)
    {
        if (is_array($data)) {
            if (isset($data['id'])) $this->id = $data['id'];
            $this->url = $data['url'];
        }
    }

    public function getUrls()
    {
        echo 'Url Id is: ' . $this->id . ' with long Url: ' . $this->url;
    }
}