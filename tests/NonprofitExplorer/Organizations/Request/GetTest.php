<?php
declare(strict_types=1);

namespace AdamTheHutt\ProPublica\Tests\NonprofitExplorer\Organizations\Request;

use AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Request;
use PHPUnit\Framework\TestCase;

/** @covers \AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Request::get */
class GetTest extends TestCase
{
    /** @test */
    public function it_returns_null_with_invalid_ein()
    {
        $result = (new Request())->get("123456789");

        $this->assertNull($result);
    }

    /** @test */
    public function it_returns_stdclass_with_valid_ein()
    {
        $result = (new Request())->get("53-0196605"); # American Red Cross

        $this->assertInstanceOf(\stdClass::class, $result);

        print_r($result);
    }
}
