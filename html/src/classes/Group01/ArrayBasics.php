<?php

namespace CandidateTest\Group01;

class ArrayBasics {

    /**
     * Return employee with the highest salary (return first when equal)
     */
    public static function getMaxSalaryEmployee(array $employees): ?Types\Employee {
        return $employees[0] ?? null;
    }

}
