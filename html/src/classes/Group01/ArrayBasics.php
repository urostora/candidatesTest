<?php

namespace CandidateTest\Group01;

class ArrayBasics {

    /**
     * Return employee with the highest salary
     */
    public static function getMaxSalaryEmployee(array $employees): ?Types\Employee {
        // TODO remove code
        // return $employees[0];

        return array_reduce(
            $employees,
            function($carry, $employee) {
                if ($carry == null || $employee->salary > $carry->salary) {
                    $carry = $employee;
                }

                return $carry;
            },
            null
        );
    }

}
