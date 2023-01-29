<?php

use CandidateTest\Helpers\Frontend\StringBasicsPageHelper;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$action = filter_input(INPUT_GET, 'action');

echo \CandidateTest\Helpers\HtmlHelper::getHtmlHeader('String basics');

echo '<form>';

StringBasicsPageHelper::writeStringEnterAndResultCode(
    'checkLetters',
    'Check for lowercase, uppercase and number letters',
    [StringBasicsPageHelper::class, 'getCheckLettersResult'],
    'Qwer1234',
    StringBasicsPageHelper::getCheckLettersHelp()
);

StringBasicsPageHelper::writeStringEnterAndResultCode(
    'convertToHttps',
    'Convert url to https format',
    [StringBasicsPageHelper::class, 'getConvertToHttpsResult'],
    'https://mysite.com',
    StringBasicsPageHelper::getConvertToHttpsHelp()
);

StringBasicsPageHelper::writeStringEnterAndResultCode(
    'getIssueNumbers',
    'Get issue numbers (like ASDF-123456) from string',
    [StringBasicsPageHelper::class, 'getGetIssueNumbersResult'],
    'Minions ipsum UKSR-98765489 underweaaar potatoooo hahaha SDgD-985413748
    hahaha baboiii ABCD-123456 chasy. Jeje me want bananaaa! Ti aamoo! Bee
    (ERUE-951234) do bee do bee do. Ti aamoo! poulet tikka masala potatoooo
    bee do bee do bee do. Butt poopayee bananaaaa chasy baboiii po kass
    pepete poopayee wiiiii belloo!, QWER-987654',
    StringBasicsPageHelper::getGetIssueNumbersHelp(),
    true
);

StringBasicsPageHelper::writeStringEnterAndResultCode(
    'capitalizeEachWord',
    'Capitalize each word that begins with letter
    (very fairy tales => Very Fairy Tales)',
    [StringBasicsPageHelper::class, 'capitalizeEachWordResult'],
    'hello Mike, have a great Holiday',
    StringBasicsPageHelper::getCapitalizeEachWordHelp(),
    true
);

echo '</form>';

echo \CandidateTest\Helpers\HtmlHelper::getHtmlFooter();

// end of execution
