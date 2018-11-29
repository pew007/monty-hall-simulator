<?php

namespace AppBundle\Lib;

class Game
{
    const DOOR_MIN = 1;
    const DOOR_MAX = 3;

    /** @var int[] */
    private $doors;
    /** @var int  */
    private $target;
    /** @var int */
    private $picked;
    /** @var int */
    private $opened;

    public function __construct()
    {
        $this->doors  = range(self::DOOR_MIN, self::DOOR_MAX);
        $this->target = rand(self::DOOR_MIN, self::DOOR_MAX);
    }

    /**
     * @return int[]
     */
    public function getDoors(): array
    {
        return $this->doors;
    }

    /**
     * @param int[] $doors
     */
    public function setDoors(array $doors)
    {
        $this->doors = $doors;
    }

    /**
     * @return int
     */
    public function getTarget(): int
    {
        return $this->target;
    }

    /**
     * @param int $target
     */
    public function setTarget(int $target)
    {
        $this->target = $target;
    }

    /**
     * @return int
     */
    public function getPicked(): int
    {
        return $this->picked;
    }

    /**
     * @param int $picked
     */
    public function setPicked(int $picked)
    {
        $this->picked = $picked;
    }

    /**
     * @return int
     */
    public function getOpened(): int
    {
        return $this->opened;
    }

    /**
     * @param int $opened
     */
    public function setOpened(int $opened)
    {
        $this->opened = $opened;
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
            if ($door != $this->picked && $door != $this->opened) {
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
