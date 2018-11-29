<?php

namespace AppBundle\Lib;

class Game
{
    const DOOR_MIN = 1;
    const DOOR_MAX = 3;

    private $doors;
    private $target;
    private $picked;
    private $opened;

    public function __construct()
    {
        $this->doors  = range(self::DOOR_MIN, self::DOOR_MAX);
        $this->target = rand(self::DOOR_MIN, self::DOOR_MAX);
    }

    public function pickADoor()
    {
        $this->picked = rand(self::DOOR_MIN, self::DOOR_MAX);
    }

    public function openADoor()
    {
        do {
            $this->opened = rand(self::DOOR_MIN, self::DOOR_MAX);
        } while ($this->opened == $this->target || $this->opened == $this->picked);
    }

    public function switchDoor()
    {
        foreach ($this->doors as $door) {
            if ($door != $this->picked || $door != $this->opened) {
                $this->picked = $door;
                break;
            }
        }
    }

    public function win()
    {
        return $this->picked == $this->target;
    }
}
