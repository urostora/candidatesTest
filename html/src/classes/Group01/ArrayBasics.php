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
     */
    public static function getGroupedArray(array $inputArray, int $groupSize)
    {
        return [['1', '2'], ['3', '4'], ['5', '6']];
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
        return $employees[0] ?? null;
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
        return [
            'group1' => 100,
            'group2' => 200,
            'group3' => 300,
        ];
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
        return $employees;
    }
}
