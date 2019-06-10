<?php

namespace UrlUtil;

use UrlShortener\Config\Database;
use UrlShortener\Repositories\UrlRepository;

$domain = $_ENV["DOMAIN"];
$dbConnection = (new Database(
    $_ENV["DB_HOST"],
    $_ENV["DB_USERNAME"],
    $_ENV["DB_PASSWORD"],
    $_ENV["DB_DATABASE"]
    ))->getConnection();
$urlRepository = new UrlRepository($dbConnection);

