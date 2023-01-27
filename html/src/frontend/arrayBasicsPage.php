<?php

use CandidateTest\Group01\ArrayBasics;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

echo \CandidateTest\Helpers\HtmlHelper::getHtmlHeader('Array basics');

// group array

writeResult(
    'Group array into sub-arrays',
    getGroupArrayResult(),
    getGroupArrayHelp()
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

writeResult(
    'Get employee with greatest salary',
    \CandidateTest\Group01\ArrayBasics::getMaxSalaryEmployee($employees),
    getGreatestSalaryHelp()
);


$result = \CandidateTest\Group01\ArrayBasics::getMaxSalaryPerGroup($employees);
$resultString = '<ul>';
foreach ($result as $key => $value) {
    $resultString .= "<li>$key - $value</li>";
}
$resultString .= '</ul>';

writeResult(
    'Get greatest salary per group',
    $resultString,
    getMaxSalaryPerGroupHelp()
);


$result3 = \CandidateTest\Group01\ArrayBasics
    ::getEmployeesOrderedBySalary($employees);
$resultString3 = '<ul>';
foreach ($result3 as $key => $value) {
    $resultString3 .= "<li>$key - $value</li>";
}
$resultString3 .= '</ul>';

writeResult(
    'Order employees by salary',
    $resultString3,
    getEmployeesOrderedBySalaryHelp()
);


$result2 = \CandidateTest\Group01\ArrayBasics
    ::getEmployeesOrderedByGroupAndBirthDate($employees);
$resultString2 = '<ul>';
foreach ($result2 as $key => $value) {
    $resultString2 .= "<li>$key - $value</li>";
}
$resultString2 .= '</ul>';

writeResult(
    'Order employees by group and birth date',
    $resultString2,
    getEmployeesOrderedByGroupAndBirthDateHelp()
);


echo \CandidateTest\Helpers\HtmlHelper::getHtmlFooter();

// end of execution

/* get group array */

function getGroupArrayResult(): string
{
    $inputString = $_GET['groupArrayString'] ?? '1, 2, 3, 4, 5, 6';
    $groupSize = (int)($_GET['groupArrayNumber'] ?? 2);

    $inputArray = array_map(
        fn($s) => trim($s),
        explode(',', $inputString)
    );

    $result = ArrayBasics::getGroupedArray($inputArray, $groupSize);

    $ret = '<p>
        <form>
            <input
                type="textbox"
                name="groupArrayString"
                style="width: 50vw;"
                value="' . htmlentities($inputString) . '"
            />
            <br />
            <input
                type="number"
                name="groupArrayNumber"
                value="' . (int)$groupSize . '"
            />
            <br />
            <input type="submit" value="Küldés" />
        </form>
    </p>
    <p> Result (group size is ' . $groupSize . '):</p>
    <p><pre>' . htmlentities(print_r($result, true)) . '</pre></p>
    ';

    return $ret;
}

function getGroupArrayHelp(): string
{
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getGroupedArray</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
        /html/tests --filter testGetGroupedArray</code></li>
    </ul>
    ';
}

/* get employee with the greatest salary */

function getGreatestSalaryHelp(): string
{
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getMaxSalaryEmployee</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
        /html/tests --filter testGetMaxSalaryEmployee</code></li>
    </ul>
    ';
}

/* get the greatest salary per group */

function getMaxSalaryPerGroupHelp(): string
{
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getMaxSalaryPerGroup</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
        /html/tests --filter testGetMaxSalaryPerGroup</code></li>
    </ul>
    ';
}

/* order employees by salary */

function getEmployeesOrderedBySalaryHelp(): string
{
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getEmployeesOrderedBySalary</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
        /html/tests --filter testGetEmployeesOrderedBySalary</code></li>
    </ul>
    ';
}

/* order employees by group and birthdate */

function getEmployeesOrderedByGroupAndBirthDateHelp(): string
{
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getEmployeesOrderedByGroupAndBirthDate</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
        /html/tests --filter testGetEmployeesOrderedByGroupAndBirthDate</code>
        </li>
    </ul>
    ';
}

/* Helpers */

function writeResult(
    string $title,
    ?string $resultHtml,
    string $helpHtml = ''
): void {
    echo '
    <fieldset>
        <legend>' . htmlentities($title) . '</legend>
        <h4>Result:</h4>
        ' . $resultHtml . '
        <h4>Code location:</h4>
        ' . $helpHtml . '
    </fieldset>
    ';
}
