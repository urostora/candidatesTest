<?php

namespace CandidateTest\Group01;

class StringBasics {

    /**
     * Visszaadja, hogy a megadott string tartalmaz-e legalább egy kisbetűt, nagybetűt és számot
     */
    public static function CheckIfContainsLowercaseUppercaseNumber(string $inputString): bool {
        return false;
    }

    /**
     * Convert url to https scheme
     * @param string $inputString Input string can be a url in format //abc.de, http://abc.de, https://abc.de
     * @return string url in https scheme: https://abc.de
     */
    public static function ConvertUrlToHttps(string $inputString): string {
        $ret = $inputString;

        return $ret;
    }
}
