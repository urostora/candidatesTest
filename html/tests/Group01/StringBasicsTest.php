<?php declare(strict_types=1);

namespace CandidateTest\Tests\Group01;

use PHPUnit\Framework\TestCase;

use CandidateTest\Group01;
use CandidateTest\Group01\StringBasics;

final class StringBasicsTest extends TestCase
{
    /**
     * @dataProvider providerTestCheckIfContainsLowercaseUppercaseNumber
     */
    public function testCheckIfContainsLowercaseUppercaseNumber(string $input, bool $expected): void {
        $value = StringBasics::CheckIfContainsLowercaseUppercaseNumber($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestCheckIfContainsLowercaseUppercaseNumber(): array {
        return [
            ['Asdf1234', true],
            ['asdf1234', false],
            ['aA', false],
            ['1a', false],
            ['1A', false],
            ['Aa1', true],
            ['1', false],
            ['a', false],
            ['A', false],
        ];
    }

    /**
     * @dataProvider providerTestConvertUrlToHttps
     */
    public function testConvertUrlToHttps(string $input, string $expected): void {
        $value = StringBasics::ConvertUrlToHttps($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestConvertUrlToHttps(): array {
        return [
            ['abc.de', 'https://abc.de'],
            ['//abc.de', 'https://abc.de'],
            ['http://abc.de', 'https://abc.de'],
            ['https://abc.de', 'https://abc.de'],
        ];
    }

    /**
     * @dataProvider providerTestGetIssueNumbers
     */
    public function testGetIssueNumbers(string $input, array $expected): void {
        $value = StringBasics::GetIssueNumbers($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestGetIssueNumbers(): array {
        return [
            ['Minions ipsum bappleees me want bananaaa! Potatoooo uuuhhh para tú bananaaaa para tú la bodaaa.!
            Jiji bee do bee do bee do hana dul sae tank yuuu! Wiiiii bee do bee do bee do. Po kass wiiiii po kass gelatooo.',
            []],
            ['Minions ipsum potatoooo (ABCD-123456) gelatooo bee APS-896 do bee do bee.
            Butt tatata bala tu bananaaaa ti OLKD-357894 aamoo! Bananaaaa uuuhhh. La bodaaa la bodaaa uuuhhh.',
            ['ABCD-123456', 'OLKD-357894']],
            ['Minions ipsum consequat bee do bee do bee do UjKh-846214 poopayee. OfficiaERIS-456217 adipisicing SSDF-775689123 velit ullamco daa bappleees esse jiji ti aamoo! Bee do bee do bee do et gelatooo esse jiji duis reprehenderit. Quis gelatooo butt tatata bala tu bananaaaa. Sit amet qui potatoooo hana dul sae uuuhhh elit. Bananaaaa sit amet potatoooo tempor velit aute dolor poopayee aute ex.',
            ['ERIS-456217', 'SSDF-775689']],
            ['Sample text with issue number ABCD-123456',
            ['ABCD-123456']],
        ];
    }


    /**
     * @dataProvider providerTestCapitalizeEachWord
     */
    public function testCapitalizeEachWord(string $input, string $expected): void {
        $value = StringBasics::CapitalizeEachWord($input);

        $this->assertSame($expected, $value);
    }

    public function providerTestCapitalizeEachWord(): array {
        return [
            ['very Fairy tales', 'Very Fairy Tales'],
            ['bimm bamm bumm', 'Bimm Bamm Bumm'],
            ['did you see 2pac somewhere?', 'Did You See 2pac Somewhere?'],
        ];
    }
}
