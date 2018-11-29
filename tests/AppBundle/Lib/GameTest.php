<?php

namespace Tests\AppBundle\Lib;

use AppBundle\Lib\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testOpenADoor()
    {
        $game = new Game();
        $game->openADoor();

        $this->assertNotEquals($game->getOpened(), $game->getTarget());
        $this->assertContains($game->getOpened(), $game->getDoors());
    }

    public function testWin()
    {
        $game = new Game();
        $game->setTarget(1);
        $game->setPicked(1);

        $this->assertTrue($game->win());
    }

    public function testSwitchDoor()
    {
        $game = new Game();
        $game->setPicked(1);
        $game->setOpened(2);
        $game->switchDoor();

        $this->assertEquals(3, $game->getPicked());
    }

    public function testPickADoor()
    {
        $game = new Game();
        $game->pickADoor();

        $this->assertContains($game->getPicked(), $game->getDoors());
    }
}
