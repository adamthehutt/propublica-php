<?php
declare(strict_types=1);

namespace AdamTheHutt\ProPublica\Tests\NonprofitExplorer\Organizations\Organization;

use AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Organization;
use PHPUnit\Framework\TestCase;

/** @covers \AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Organization::normalizeEin */
class NormalizeEinTest extends TestCase
{
    /** @test */
    public function it_normalizes_to_9_numeric_digits()
    {
        $result1 = Organization::normalizeEin("12-3456789");
        $result2 = Organization::normalizeEin("123-45-6789");
        $result3 = Organization::normalizeEin("123456789078634987621439871634");

        $this->assertSame("123456789", $result1);
        $this->assertSame("123456789", $result2);
        $this->assertSame("123456789", $result3);
    }
}
