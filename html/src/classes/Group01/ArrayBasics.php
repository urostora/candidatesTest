<?php

namespace CandidateTest\Group01;

use \CandidateTest\Group01\Types\Employee;

class ArrayBasics
{

    /**
     * Divide the array into many sub-arrays,
     * where each subarray is at most of group size.
     *
     * @example ArrayBasics::getGroupedArray([1, 2, 3, 4, 5], 2) -> [[ 1, 2], [3, 4], [5]]
     * @example ArrayBasics::getGroupedArray([1, 2, 3, 4, 5], 3) -> [[ 1, 2, 3], [4, 5]]
     * @example ArrayBasics::getGroupedArray([1, 2, 3, 4, 5], 6) -> [[ 1, 2, 3, 4, 5]]
     *
     * @param array<string> $inputArray
     * @param int $groupSize
     *
     * @return array<int, array<int, string>>
     */
    public static function getGroupedArray(
        array $inputArray,
        int $groupSize
    ) : array {
        $ret = [];
        $currentGroup = [];

        foreach ($inputArray as $value) {
            $currentGroup[] = $value;

            if (count($currentGroup) >= $groupSize) {
                $ret[] = $currentGroup;
                $currentGroup = [];
            }
        }

        if (!empty($currentGroup)) {
            $ret[] = $currentGroup;
        }

        return $ret;
    }

    /**
     * Return employee with the highest salary (return first when equal)
     *
     * @param Employee[] $employees
     *
     * @return Employee|null
     *
     */
    public static function getMaxSalaryEmployee(array $employees): ?Employee
    {
        return array_reduce(
            $employees,
            function (?Employee $carry, Employee $value) {
                if (is_null($carry) || $carry->salary < $value->salary) {
                    $carry = $value;
                }

                return $carry;
            },
            null
        );
    }

    /**
     * Return the greatest salary per group
     *
     * return array example:
     * [
     *      'group1' => 100,
     *      'group2' => 200,
     *      'group3' => 300,
     * ];
     *
     * @param Employee[] $employees
     *
     * @return array<string, int>
     *
     */
    public static function getMaxSalaryPerGroup(array $employees): array
    {
        return array_reduce(
            $employees,
            function (array $carry, Employee $value) {
                if (!isset($carry[$value->group])
                    || $carry[$value->group] < $value->salary
                ) {
                    $carry[$value->group] = $value->salary;
                }

                return $carry;
            },
            []
        );
    }

    /**
     * Return the greates salary per group
     *
     * @param Employee[] $employees
     *
     * @return Employee[]
     *
     */
    public static function getEmployeesOrderedBySalary(array $employees): array
    {
        usort(
            $employees,
            function (Employee $e1, Employee $e2) {
                return $e1->salary - $e2->salary;
            }
        );

        return $employees;
    }

    /**
     * Return the greates salary per group
     *
     * @param Employee[] $employees
     *
     * @return Employee[]
     *
     */
    public static function getEmployeesOrderedByGroupAndBirthDate(array $employees): array
    {
        usort(
            $employees,
            function (Employee $e1, Employee $e2) {
                if ($e1->group !== $e2->group) {
                    return strcmp($e1->group, $e2->group);
                }

                return $e1->birthday->getTimestamp() - $e2->birthday->getTimestamp();
            }
        );

        return $employees;
    }
}
