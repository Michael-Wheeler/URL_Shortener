<?php

namespace UrlShortener\Controllers;

class Redirector
{
    private $urlRepository;

    public function __construct($urlRepository)
    {
        $this->urlRepository = $urlRepository;
    }

    public function urlRedirect($id)
    {
        return $this->urlRepository->getUrl($id);
    }
}
