<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$action = filter_input(INPUT_GET, 'action');

echo \CandidateTest\Helpers\HtmlHelper::GetHtmlHeader('String basics');

echo '<form>';

writeStringEnterAndResultCode(
    'checkLetters',
    'Check for lowercase, uppercase and number letters',
    'getCheckLettersResult',
    'Qwer1234',
    getCheckLettersHelp()
);

writeStringEnterAndResultCode(
    'convertToHttps',
    'Convert url to https format',
    'getConvertToHttpsResult',
    'https://mysite.com',
    getConvertToHttpsHelp()
);

writeStringEnterAndResultCode(
    'getIssueNumbers',
    'Get issue numbers (like ASDF-123456) from string',
    'getGetIssueNumbersResult',
    'Minions ipsum UKSR-98765489 underweaaar potatoooo hahaha SDgD-985413748 hahaha baboiii ABCD-123456 chasy. Jeje me want bananaaa! Ti aamoo! Bee (ERUE-951234) do bee do bee do. Ti aamoo! poulet tikka masala potatoooo bee do bee do bee do. Butt poopayee bananaaaa chasy baboiii po kass pepete poopayee wiiiii belloo!, QWER-987654',
    getGetIssueNumbersHelp(),
    true
);

writeStringEnterAndResultCode(
    'capitalizeEachWord',
    'Capitalize each word that begins with letter (very fairy tales => Very Fairy Tales)',
    'capitalizeEachWordResult',
    'hello Mike, have a great Holiday',
    getCapitalizeEachWordHelp(),
    true
);

echo '</form>';

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

    return "<p>Issue numbers in string [{$safeString}] are: {$safeOutput}</p>";
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

/* Capitalize each word */

function capitalizeEachWordResult(string $inputString = ''): string {
    $output = \CandidateTest\Group01\StringBasics::CapitalizeEachWord($inputString);

    $safeString = htmlentities($inputString);
    $safeOutput = htmlentities($output);

    return "<p>capitalized string [{$safeString}] is: {$safeOutput}</p>";
}

function getCapitalizeEachWordHelp(string $inputString = ''): string {
    return '
    <ul>
        <li>Code location: src/classes/Group01/StringBasics.php</li>
        <li>Method: StringBasics::CapitalizeEachWord</li>
        <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit /html/tests --filter testCapitalizeEachWord</code></li>
    </ul>
    ';
}

/* Helpers */

function writeStringEnterAndResultCode(
    string $action,
    string $title,
    callable $callback,
    string $defaultContent,
    string $helpHtml = '',
    $showTextarea = false
): void {
    $inputString = $_GET[$action] ?? $defaultContent ?? '';

    $input = $showTextarea
        ? '<textarea style="width: 50vw;" rows="4" name="' . $action . '">' . htmlentities($inputString ?? '') . '</textarea>'
        : '<input type="text" style="width: 50vw;" name="' . $action . '" value="' . htmlentities($inputString ?? '') . '" />';

    echo '
    <fieldset>
        <legend>' . htmlentities($title) . '</legend>
            ' . $input . '
            <input type="submit">
        ' . call_user_func($callback, $inputString) . '
        ' . $helpHtml . '
    </fieldset>
    ';
}