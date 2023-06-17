<?php

namespace App\Model;

class Classe
{
    private string $name;
    private string $instructor;
    private string $schedule;

    public function __construct($name, $instructor, $schedule)
    {
        $this->name = $name;
        $this->instructor = $instructor;
        $this->schedule = $schedule;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        return $this->name = $name;
    }

    public function getInstructor()
    {
        return $this->instructor;
    }

    public function setInstructor(string $instructor)
    {
        return $this->instructor = $instructor;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function setSchedule(string $schedule)
    {
        return $this->schedule = $schedule;
    }
}
