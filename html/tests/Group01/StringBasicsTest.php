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
}
