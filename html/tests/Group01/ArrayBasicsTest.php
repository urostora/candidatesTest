<?php declare(strict_types=1);

namespace CandidateTest\Tests\Group01;

use PHPUnit\Framework\TestCase;

use CandidateTest\Group01;
use CandidateTest\Group01\ArrayBasics;
use CandidateTest\Group01\Types\Employee;

final class ArrayBasicsTest extends TestCase
{
    /**
     * @dataProvider providerTestGetMaxSalaryEmployee
     */
    public function testGetMaxSalaryEmployee(array $input, Employee $expected): void {
        $value = ArrayBasics::getMaxSalaryEmployee($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestGetMaxSalaryEmployee(): array {
        // test set 1
        $sample1 = Employee::getSampleEmployees();
        $expected1 = $sample1[1];

        $sample2 = Employee::getSampleEmployees();
        $newItem = $sample2[2];
        $newItem->salary = 500000;
        $sample2[] = $newItem;
        $expected2 = $sample2[count($sample2) - 1];

        $sample3 = Employee::getSampleEmployees();
        $sample3[4]->salary = 800000;
        $expected3 = $sample3[4];

        return [
            [$sample1, $expected1],
            [$sample2, $expected2],
            [$sample3, $expected3],
        ];
    }


    /**
     * @dataProvider providerTestGetMaxSalaryPerGroup
     */
    public function testGetMaxSalaryPerGroup(array $input, array $expected): void {
        $value = ArrayBasics::getMaxSalaryPerGroup($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestGetMaxSalaryPerGroup(): array {
        $testData = Employee::getSampleEmployees();

        // test set 1
        $sample1 = Employee::getSampleEmployees();
        $expected1 = [
            'Accounting' => 70000,
            'CEO' => 250000,
            'Cleaning' => 32000,
            'IT' => 65000,
            'Sales' => 52000
        ];

        $sample2 = Employee::getSampleEmployees();
        $newItem = $testData[0];
        $newItem->salary = 90000;
        $sample2[] = $newItem;
        $expected2 = [
            'Accounting' => 90000,
            'CEO' => 250000,
            'Cleaning' => 32000,
            'IT' => 65000,
            'Sales' => 52000
        ];;

        $sample3 = Employee::getSampleEmployees();
        $sample3[4]->salary = 800000;
        $expected3 = [
            'Accounting' => 70000,
            'CEO' => 250000,
            'Cleaning' => 32000,
            'IT' => 800000,
            'Sales' => 52000
        ];;

        return [
            [$sample1, $expected1],
            [$sample2, $expected2],
            [$sample3, $expected3],
        ];
    }

    /**
     * @dataProvider providerTestGetEmployeesOrderedByGroupAndBirthDate
     */
    public function testGetEmployeesOrderedByGroupAndBirthDate(array $input, array $expected) {
        $value = ArrayBasics::getEmployeesOrderedByGroupAndBirthDate($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestGetEmployeesOrderedByGroupAndBirthDate(): array {
        $sample1 = Employee::getSampleEmployees();
        $expected1 = [
            $sample1[0],
            $sample1[2],
            $sample1[1],
            $sample1[3],
            $sample1[6],
            $sample1[4],
            $sample1[5],
            $sample1[8],
            $sample1[7],
        ];

        $sample2 = Employee::getSampleEmployees();
        $sample2[3]->group = 'Accounting';
        $expected2 = [
            $sample2[3],
            $sample2[0],
            $sample2[2],
            $sample2[1],
            $sample2[6],
            $sample2[4],
            $sample2[5],
            $sample2[8],
            $sample2[7],
        ];

        return [
            [$sample1, $expected1],
            [$sample2, $expected2],
        ];
    }
}
