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
        $pattern = '/[A-Z]/';
        if (!preg_match($pattern, $inputString)) {
            return false;
        }
        
        $pattern = '/[a-z]/';
        if (!preg_match($pattern, $inputString)) {
            return false;
        }
        
        $pattern = '/\d/';
        if (!preg_match($pattern, $inputString)) {
            return false;
        }

        return true;
    }

    /**
     * Convert url to https scheme
     * @param string $inputString Input string can be a url in format abc.de, //abc.de, http://abc.de, https://abc.de
     * @return string url in https scheme: https://abc.de
     */
    public static function ConvertUrlToHttps(string $inputString): string {
        $pattern = '/^((http[s]?:)?\/\/)?/';
        $ret = preg_replace($pattern, 'https://', $inputString);
        return $ret;


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
        $pattern = '/[A-Z]{4}-\d{6}/';

        preg_match_all($pattern, $inputString, $matches);

        return $matches[0] ?? [];

        return ['ABCD-123456', 'LKJH-765432'];
    }

    /**
     * Capitalize each word.
     *
     * @method static string CapitaliyeEachWord(string $inputString)
     * @example StringBasics::CapitaliyeEachWord('hello there') === 'Hello There'
     * @example StringBasics::CapitaliyeEachWord("hey, so it's working!") === "Hey, So It's Working!"
     */
    public static function CapitalizeEachWord(string $inputString = ''): string {
        return ucwords($inputString);

        return $inputString;
    }
}
