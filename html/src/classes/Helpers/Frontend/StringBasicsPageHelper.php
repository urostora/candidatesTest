<?php

namespace CandidateTest\Helpers\Frontend;

class StringBasicsPageHelper
{

    /* Check if string contains lowercase letters, uppercase letters and numbers  */

    public static function getCheckLettersResult(string $inputString = ''): string
    {
        $output = \CandidateTest\Group01\StringBasics
            ::checkIfContainsLowercaseUppercaseNumber($inputString);
        return "<p>String [{$inputString}] contains "
        . ($output ? '' : 'NOT ')
        . 'all of uppercase, lowercase and number letters</p>';
    }

    public static function getCheckLettersHelp(string $inputString = ''): string
    {
        return '
        <ul>
            <li>Code location: src/classes/Group01/StringBasics.php</li>
            <li>Method: StringBasics::CheckIfContainsLowercaseUppercaseNumber</li>
            <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
            /html/tests --filter testCheckIfContainsLowercaseUppercaseNumber</code>
            </li>
        </ul>
        ';
    }

    /* Convert url to https section */

    public static function getConvertToHttpsResult(string $inputUrl = ''): string
    {
        $output = \CandidateTest\Group01\StringBasics::convertUrlToHttps($inputUrl);

        $safeUrl = htmlentities($inputUrl);
        $safeOutput = htmlentities($output);

        return "<p>Url [{$safeUrl}] converted to: [{$safeOutput}]</p>";
    }

    public static function getConvertToHttpsHelp(string $inputString = ''): string
    {
        return '
        <ul>
            <li>Code location: src/classes/Group01/StringBasics.php</li>
            <li>Method: StringBasics::ConvertUrlToHttps</li>
            <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
            /html/tests --filter testConvertUrlToHttps</code></li>
        </ul>
        ';
    }


    /* Get issue numbers */

    public static function getGetIssueNumbersResult(string $inputString = ''): string
    {
        $output = \CandidateTest\Group01\StringBasics
            ::getIssueNumbers($inputString);

        $safeString = htmlentities($inputString);
        $safeOutput = sprintf('<pre>%s</pre>', print_r($output, true));

        return "<p>Issue numbers in string [{$safeString}] are: {$safeOutput}</p>";
    }

    public static function getGetIssueNumbersHelp(string $inputString = ''): string
    {
        return '
        <ul>
            <li>Code location: src/classes/Group01/StringBasics.php</li>
            <li>Method: StringBasics::GetIssueNumbers</li>
            <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
            /html/tests --filter testGetIssueNumbers</code></li>
        </ul>
        ';
    }

    /* Capitalize each word */

    public static function capitalizeEachWordResult(string $inputString = ''): string
    {
        $output = \CandidateTest\Group01\StringBasics
            ::capitalizeEachWord($inputString);

        $safeString = htmlentities($inputString);
        $safeOutput = htmlentities($output);

        return "<p>capitalized string [{$safeString}] is: {$safeOutput}</p>";
    }

    public static function getCapitalizeEachWordHelp(string $inputString = ''): string
    {
        return '
        <ul>
            <li>Code location: src/classes/Group01/StringBasics.php</li>
            <li>Method: StringBasics::CapitalizeEachWord</li>
            <li>Run unit test: <code>docker exec -it ct_php /html/vendor/bin/phpunit
            /html/tests --filter testCapitalizeEachWord</code></li>
        </ul>
        ';
    }

    /* Helpers */

    public static function writeStringEnterAndResultCode(
        string $action,
        string $title,
        callable $callback,
        string $defaultContent = '',
        string $helpHtml = '',
        bool $showTextarea = false
    ): void {
        $inputString = $_GET[$action] ?? $defaultContent;

        $input = $showTextarea
            ? '<textarea style="width: 50vw;" rows="4" name="' . $action . '">'
                . htmlentities($inputString) . '</textarea>'
            : '<input type="text" style="width: 50vw;" name="' . $action
                . '" value="' . htmlentities($inputString) . '" />';

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
}
