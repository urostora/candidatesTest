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
}
