<?php

namespace CandidateTest\Helpers;

class DbHelper {
    private static ?\PDO $pdoObject = null;

    public static function getPdoConnection(): \PDO {
        if (is_null(static::$pdoObject)) {
            static::$pdoObject = new \PDO(
                static::getPdoDsn(),
                $_ENV['MYSQL_USER'],
                $_ENV['MYSQL_PASSWORD'],
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]);
        }

        return static::$pdoObject;
    }
    
    private static function getPdoDsn(): string {
        return "mysql:host={$_ENV['MYSQL_SERVER']};port={$_ENV['MYSQL_PORT']};dbname={$_ENV['MYSQL_DATABASE']}";
    }
}