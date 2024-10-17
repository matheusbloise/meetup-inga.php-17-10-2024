<?php

declare(strict_types=1);

namespace Test;

use App\Taximeter;
use PHPUnit\Framework\TestCase;

class TaximeterTest extends TestCase
{
    public function testShouldBeNormalFare(): void
    {
        $taximeter = new Taximeter();
        $dist = $taximeter->calcTrip(1, 10, 1000);
        $this->assertEquals(2100, $dist);
    }

    public function testShouldBeSundayFare(): void
    {
        $taximeter = new Taximeter();
        $dist = $taximeter->calcTrip(0, 10, 1000);
        $this->assertEquals(3000, $dist);
    }

    public function testShouldBeOvernightFare(): void
    {
        $taximeter = new Taximeter();
        $dist = $taximeter->calcTrip(1, 23, 1000);
        $this->assertEquals(3900, $dist);
    }

    public function testShouldNotProcessInvalidInput(): void
    {
        $taximeter = new Taximeter();
        $dist = $taximeter->calcTrip(1, null, 1000);
        $this->assertEquals(-1, $dist);
    }
}