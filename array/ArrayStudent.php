<?php

/**
 * Class ArrayStudent
 */
class ArrayStudent
{
    private string $name;
    private int $score;

    /**
     * ArrayStudent constructor.
     * @param string $name
     * @param int $score
     */
    public function __construct(string $name, int $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    public function __toString()
    {
        return sprintf("{ArrayStudent, name:%s, score:%d}", $this->getName(), $this->getScore());
    }

}