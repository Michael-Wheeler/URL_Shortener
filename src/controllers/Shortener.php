<?php

namespace UrlShortener\Controllers;

class Shortener
{
    private $urlRepository;
    private $domain;

    public function __construct($urlRepository, $domain)
    {
        $this->urlRepository = $urlRepository;
        $this->domain = $domain;
    }

    public function shorten($url)
    {
        $id = $this->urlRepository->save($url);
        return $this->domain . '/' . $id;
    }
}