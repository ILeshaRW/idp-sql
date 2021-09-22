<?php

namespace App;

use PDO;
use PDOStatement;

class Application
{
   protected PDO $db;

   protected static self $instance;

   private function __construct(){}

   public static function getInstance(): self
   {
       if (!empty(self::$instance)) {
           return self::$instance;
       }
       self::$instance = new self();

       self::$instance->db = new PDO(
           'mysql:host=' .
           getenv('MYSQL_HOST') .
           ';dbname=' .
           getenv('MYSQL_DATABASE'),
           getenv('MYSQL_USER'),
           getenv('MYSQL_PASSWORD')
       );

       return self::$instance;
   }

   public function query(string $query): ?PDOStatement
   {
       $stmt = $this->db->query($query);

       return $stmt ?: null;
   }
}