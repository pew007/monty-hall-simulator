<?php

namespace Tests\AppBundle\Twig;

use AppBundle\Twig\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    public function testPercentage()
    {
        $extension = new NumberFormatter();
        $percentage = $extension->percentage(0.33333);

        $this->assertEquals('33.33%', $percentage);
    }
}
