<?php

use CandidateTest\Group01\ArrayBasics;
use CandidateTest\Helpers\Frontend\ArrayBasicsPageHelper;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

echo \CandidateTest\Helpers\HtmlHelper::getHtmlHeader('Array basics');

// group array

ArrayBasicsPageHelper::writeResult(
    'Group array into sub-arrays',
    ArrayBasicsPageHelper::getGroupArrayResult(),
    ArrayBasicsPageHelper::getGroupArrayHelp()
);


// Employee-based tests

$employees = \CandidateTest\Group01\Types\Employee::getSampleEmployees();

echo '<h3>Employees</h3><ul>';
array_walk(
    $employees,
    function ($employee) {
        echo "<li>{$employee}</li>";
    }
);
echo '</ul>';

echo '<h3>Results:</h3><ul>';

ArrayBasicsPageHelper::writeResult(
    'Get employee with greatest salary',
    \CandidateTest\Group01\ArrayBasics::getMaxSalaryEmployee($employees),
    ArrayBasicsPageHelper::getGreatestSalaryHelp()
);


$result = \CandidateTest\Group01\ArrayBasics::getMaxSalaryPerGroup($employees);
$resultString = '<ul>';
foreach ($result as $key => $value) {
    $resultString .= "<li>$key - $value</li>";
}
$resultString .= '</ul>';

ArrayBasicsPageHelper::writeResult(
    'Get greatest salary per group',
    $resultString,
    ArrayBasicsPageHelper::getMaxSalaryPerGroupHelp()
);


$result3 = \CandidateTest\Group01\ArrayBasics
    ::getEmployeesOrderedBySalary($employees);
$resultString3 = '<ul>';
foreach ($result3 as $key => $value) {
    $resultString3 .= "<li>$key - $value</li>";
}
$resultString3 .= '</ul>';

ArrayBasicsPageHelper::writeResult(
    'Order employees by salary',
    $resultString3,
    ArrayBasicsPageHelper::getEmployeesOrderedBySalaryHelp()
);


$result2 = \CandidateTest\Group01\ArrayBasics
    ::getEmployeesOrderedByGroupAndBirthDate($employees);
$resultString2 = '<ul>';
foreach ($result2 as $key => $value) {
    $resultString2 .= "<li>$key - $value</li>";
}
$resultString2 .= '</ul>';

ArrayBasicsPageHelper::writeResult(
    'Order employees by group and birth date',
    $resultString2,
    ArrayBasicsPageHelper::getEmployeesOrderedByGroupAndBirthDateHelp()
);


echo \CandidateTest\Helpers\HtmlHelper::getHtmlFooter();

// end of execution
