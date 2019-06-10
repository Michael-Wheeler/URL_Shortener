<?php

require "../bootstrap.php";

use UrlShortener\Controllers\Redirector;
use UrlShortener\Controllers\Shortener;

$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
$endpoint = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($query != null) {
    parse_str($query, $params);
    $url = $params['url'];

    $shortenerController = new Shortener($urlRepository, $domain);
    $shortUrl = $shortenerController->shorten($url);

    header("HTTP/1.1 200 OK");
    header('Content-Type: text/plain');
    exit($shortUrl);
}

$redirector = new Redirector($urlRepository);
$redirectUrl = $redirector->urlRedirect($endpoint);
Header('Location: ' . $redirectUrl, true, 302);
exit();
