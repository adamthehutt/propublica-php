<?php
declare(strict_types=1);

namespace AdamTheHutt\ProPublica\Tests\NonprofitExplorer\Organizations\Request;

use AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Request;
use PHPUnit\Framework\TestCase;

/** @covers \AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Request::validEin */
class ValidEinTest extends TestCase
{
    /** @test */
    public function it_returns_false()
    {
        $result = (new Request())->validEin("123456789");

        $this->assertFalse($result);
    }

    /** @test */
    public function it_returns_true()
    {
        $result = (new Request())->validEin("53-0196605"); # American Red Cross

        $this->assertTrue($result);
    }
}
