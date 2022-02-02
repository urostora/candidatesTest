<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$action = filter_input(INPUT_GET, 'action');
$inputString = filter_input(INPUT_GET, 'inputString');

echo \CandidateTest\Helpers\HtmlHelper::GetHtmlHeader('String basics');

writeStringEnterAndResultCode(
    'checkLetters',
    'Check for lowercase, uppercase and number letters',
    $inputString,
    $action === 'checkLetters'? getCheckLettersResult($inputString) : '',
    getCheckLettersHelp()
);

writeStringEnterAndResultCode(
    'convertToHttps',
    'Convert url to https format',
    $inputString,
    $action === 'convertToHttps'? getConvertToHttpsResult($inputString) : ''
);

echo \CandidateTest\Helpers\HtmlHelper::GetHtmlFooter();

// end of execution

/* Check if string contains lowercase letters, uppercase letters and numbers  */

function getCheckLettersResult(string $inputString = ''): string {
    $output = \CandidateTest\Group01\StringBasics::CheckIfContainsLowercaseUppercaseNumber($inputString);
    return "<p>String [{$inputString}] contains " . ($output ? '' : 'NOT ') . 'all of uppercase, lowercase and number letters</p>';
}

function getCheckLettersHelp(string $inputString = ''): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/StringBasics.php</li>
        <li>Method: StringBasics::CheckIfContainsLowercaseUppercaseNumber</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testCheckIfContainsLowercaseUppercaseNumber</code></li>
    </ul>
    ';
}

/* Convert url to https section */

function getConvertToHttpsResult(string $inputUrl = ''): string {
    $output = \CandidateTest\Group01\StringBasics::ConvertUrlToHttps($inputUrl);
    return "<p>Url [{$inputUrl}] converted to: [{$output}]</p>";
}

/* Helpers */

function writeStringEnterAndResultCode(
    string $action,
    string $title,
    ?string $inputString,
    ?string $resultHtml,
    string $helpHtml = ''
): void {
    echo '
    <fieldset>
        <legend>' . htmlentities($title) . '</legend>
        <form>
            <input type="hidden" name="action" value="' . htmlentities($action) . '" />
            <input type="text" name="inputString" value="' . htmlentities($inputString ?? '') . '" />
            <input type="submit">
        </form>
        ' . $resultHtml . '
        ' . $helpHtml . '
    </fieldset>
    ';
}