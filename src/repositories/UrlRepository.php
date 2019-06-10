<?php
namespace UrlShortener\Repositories;

use \PDO;
use \Models;

class UrlRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function find($id)
    {
        $stmt = $this->connection->prepare('
            SELECT "Shortener", url.* 
             FROM urls 
             WHERE id = :id
        ');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Shortener');
        return $stmt->fetch();
    }

    public function findAll()
    {
        $stmt = $this->connection->prepare('
            SELECT * FROM urls
        ');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Shortener');
        return $stmt->fetchAll();
    }

    public function save(Url $url)
    {
        // If the ID is set, we're updating an existing record
        if (isset($url->id)) {
            return $this->update($url);
        }
        $stmt = $this->connection->prepare('
            INSERT INTO urls 
                (longurl) 
            VALUES 
                (:longurl)
        ');
        $stmt->bindParam(':url', $url->url);
        return $stmt->execute();
    }
}