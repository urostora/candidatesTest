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


echo \CandidateTest\Helpers\HtmlHelper::GetHtmlFooter();

// end of execution

/* Check if string contains lowercase letters, uppercase letters and numbers  */

function getGreatestSalaryHelp(string $inputString = ''): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/ArrayBasics.php</li>
        <li>Method: ArrayBasics::getMaxSalaryEmployee</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testGetMaxSalaryEmployee</code></li>
    </ul>
    ';
}

/* Convert url to https section */

function getConvertToHttpsResult(string $inputUrl = ''): string {
    $output = \CandidateTest\Group01\StringBasics::ConvertUrlToHttps($inputUrl);

    $safeUrl = htmlentities($inputUrl);
    $safeOutput = htmlentities($output);

    return "<p>Url [{$safeUrl}] converted to: [{$safeOutput}]</p>";
}

function getConvertToHttpsHelp(string $inputString = ''): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/StringBasics.php</li>
        <li>Method: StringBasics::ConvertUrlToHttps</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testConvertUrlToHttps</code></li>
    </ul>
    ';
}



/* Get issue numbers */

function getGetIssueNumbersResult(string $inputString = ''): string {
    $output = \CandidateTest\Group01\StringBasics::GetIssueNumbers($inputString);

    $safeString = htmlentities($inputString);
    $safeOutput = sprintf('<pre>%s</pre>', print_r($output, true));

    return "<p>Issue numbers in string [{$safeString}] are: [{$safeOutput}]</p>";
}

function getGetIssueNumbersHelp(string $inputString = ''): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/StringBasics.php</li>
        <li>Method: StringBasics::GetIssueNumbers</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testGetIssueNumbers</code></li>
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