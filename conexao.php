<?php

class Conexao
{
    public static $instance;

    public static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new PDO('mysql:host=bbjdiciefhvh92vwvb9n-mysql.services.clever-cloud.com;
            dbname=bbjdiciefhvh92vwvb9n', 'ufxdjocb4xr0aejr', 'PC6bn4cSDealeFoKw0zU');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}
?>
