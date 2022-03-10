<?php

namespace CandidateTest\Helpers;

use mysqli;

class DbHelper {
    protected static ?\PDO $pdoObject = null;
    protected static ?mysqli $mysqliConnection = null;

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
    
    protected static function getPdoDsn(): string {
        return "mysql:host={$_ENV['MYSQL_SERVER']};port={$_ENV['MYSQL_PORT']};dbname={$_ENV['MYSQL_DATABASE']}";
    }

    public static function getMysqliConnection(): \mysqli {
        if (static::$mysqliConnection == null) {
            static::$mysqliConnection = new mysqli(
                $_ENV['MYSQL_SERVER'],
                $_ENV['MYSQL_USER'],
                $_ENV['MYSQL_PASSWORD'],
                $_ENV['MYSQL_DATABASE']);

            /* Set the desired charset after establishing a connection */
            static::$mysqliConnection->set_charset('utf8mb4');
        }

        return static::$mysqliConnection;
    }
}
