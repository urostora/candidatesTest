<?php

namespace CandidateTest\Db;

use CandidateTest\Helpers\DbHelper;

class DbBasics {

    /**
     * Render (echo) a "select" HTML component filled with manufacturers from the database
     */
    public static function renderManufacturersSelectComponent(): void {
        $connection = DbHelper::getPdoConnection();
        // $connection = DbHelper::getMysqliConnection();

        echo 'Placeholder of the manufacturers selector';
    }

    /**
     * Render (echo) a "table" (or else suitable) HTML component filled with all products from the database
     * 
     * Columns:
     * product.product.id, category.name, manufacturer.name, product.name, product.price
     * 
     */
    public static function renderProductList(): void {
        $connection = DbHelper::getPdoConnection();
        // $connection = DbHelper::getMysqliConnection();

        echo 'Placeholder of the products list';
    }
}
