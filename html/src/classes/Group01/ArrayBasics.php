<?php

namespace CandidateTest\Group01;

use \CandidateTest\Group01\Types\Employee;

class ArrayBasics {

    /**
     * Return employee with the highest salary (return first when equal)
     *
     * @param array $employees
     * 
     * @return Employee|null
     * 
     */
    public static function getMaxSalaryEmployee(array $employees): ?Employee {
        return $employees[0] ?? null;
    }

    /**
     * Return the greates salary per group
     *
     * @param array $employees
     * 
     * @return array
     * 
     */
    public static function getMaxSalaryPerGroup(array $employees): array {
        return [
            'group1' => 100,
            'group2' => 200,
            'group3' => 300,
        ];
    }

    /**
     * Return the greates salary per group
     *
     * @param array $employees
     * 
     * @return Employee[]
     * 
     */
    public static function getEmployeesOrderedByGroupAndBirthDate(array $employees): array {
        usort(
            $employees,
            function(Employee $e1, Employee $e2) {
                if ($e1->group === $e2->group) {
                    return $e1->birthday->getTimestamp() - $e2->birthday->getTimestamp();
                }

                return strcmp($e1->group, $e2->group);
            }
        );
        return $employees;
    }
}
