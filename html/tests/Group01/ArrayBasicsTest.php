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
}
