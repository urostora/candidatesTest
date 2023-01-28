<?php

namespace CandidateTest\Helpers\Frontend;

use CandidateTest\Group01\ArrayBasics;

class ArrayBasicsPageHelper
{

    /* get group array */

    public static function getGroupArrayResult(): string
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

    public static function getGroupArrayHelp(): string
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

    public static function getGreatestSalaryHelp(): string
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

    public static function getMaxSalaryPerGroupHelp(): string
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

    public static function getEmployeesOrderedBySalaryHelp(): string
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

    public static function getEmployeesOrderedByGroupAndBirthDateHelp(): string
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

    public static function writeResult(
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
}
