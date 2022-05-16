<?php

namespace CandidateTest\Group01;

class StringBasics {

    /**
     * Returns that the input string contains at least one of these characters:
     * - uppercase character
     * - lowercase character
     * - number
     * @param string $inputString Input character
     * @return bool
     */
    public static function CheckIfContainsLowercaseUppercaseNumber(string $inputString): bool {
        return false;
    }

    /**
     * Convert url to https scheme
     * @param string $inputString Input string can be a url in format abc.de, //abc.de, http://abc.de, https://abc.de
     * @return string url in https scheme: https://abc.de
     */
    public static function ConvertUrlToHttps(string $inputString): string {
        $ret = $inputString;

        return "https://{$ret}";
    }

    /**
     * Return all issue numbers found in a text. Issue numbers must not be separated from the other text parts (with space or others)
     * Issue numbers contain 4 uppercase characters, a minus sign and 6 numbers. When more numbers are there, return the first 6 numbers
     * Examples: ABCD-123456, QWER-987654
     * @param string $inputString
     * @return array<string> Array of issue numbers found in input string
     */
    public static function GetIssueNumbers(string $inputString): array {
        return ['ABCD-123456', 'LKJH-765432'];
    }
}
