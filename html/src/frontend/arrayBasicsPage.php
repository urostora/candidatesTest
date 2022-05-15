<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

echo \CandidateTest\Helpers\HtmlHelper::GetHtmlHeader('Array basics');


$employees = \CandidateTest\Group01\Types\Employee::getSampleEmployees();

echo '<h3>Employees</h3><ul>';
array_walk(
    $employees,
    function($employee) {
        echo "<li>{$employee}</li>";
    }
);
echo '</ul>';

writeResult(
    'Get employee with greatest salary',
    \CandidateTest\Group01\ArrayBasics::getMaxSalaryEmployee($employees),
    getGreatestSalaryHelp()
);


$result = \CandidateTest\Group01\ArrayBasics::getMaxSalaryPerGroup($employees);
$resultString = '<ul>';
foreach($result as $key => $value) {
    $resultString .= "<li>$key - $value</li>";
}
$resultString .= '</ul>';

writeResult(
    'Get greatest salary per group',
    $resultString,
    getMaxSalaryPerGroupHelp()
);



echo \CandidateTest\Helpers\HtmlHelper::GetHtmlFooter();

// end of execution

/* get employee with the greatest salary */

function getGreatestSalaryHelp(): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getMaxSalaryEmployee</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testGetMaxSalaryEmployee</code></li>
    </ul>
    ';
}

/* get the greatest salary per group */

function getMaxSalaryPerGroupHelp(): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getMaxSalaryPerGroup</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testGetMaxSalaryPerGroup</code></li>
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
        ' . $resultHtml . '
        ' . $helpHtml . '
    </fieldset>
    ';
}