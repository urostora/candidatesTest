<?php

namespace CandidateTest\Db;

use CandidateTest\Helpers\DbHelper;

class DbApi {

    /**
        - process incoming parameters (manufacturer name)
        - add manufacturer to the database or throw exception when a problem occurs
        - possible problems:
            - manufacturer with this name already exists
            - new manufacturer name is empty string
        - take care of SQL injection attacks 
     */
    protected static function handleAddManufacturer(): void {
        
    }

    public static function handleDbApiRequest(): void {
        $action = filter_input(INPUT_POST, 'action');
        $ret = null;

        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new \Exception("Invalid method [{$_SERVER['REQUEST_METHOD']}], only POST is allowed");
            }

            // call appropriate worker by the action sent
            if ($action === 'addManufacturer') {
                static::handleAddManufacturer();
            } else {
                $actionString = is_string($action) ? $action : '';
                throw new \Exception("Invalid action [{$actionString}]");
            }

        } catch (\Exception $ex) {
            self::returnErrorJson($ex);
        }

        self::returnJson();
    }

    private static function returnErrorJson(\Exception $ex): void {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'ok' => false,
            'error' => $ex->getMessage(),
            'trace' => $ex->getTraceAsString(),
        ]);
        exit();
    }

    private static function returnJson(mixed $data = null): void {
        header('Content-Type: application/json; charset=utf-8');

        $ret = [
            'ok' => true,
        ];

        if (!is_null($data)) {
            $ret['data'] = $data;
        }

        echo json_encode($ret);
        exit();
    }
}
