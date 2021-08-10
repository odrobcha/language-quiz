<?php

class Player
{
    private string $name;
    // TODO: add name and score

    public function __construct($name)
    {
        $this->name = $name;
        $_SESSION['user_name'] = $this->name;
    }

    public function getUserName() : string
    {
        if (defined($this->name)){
            return 'Hello, ' .$this->name;
    }
        return '';

    }
}