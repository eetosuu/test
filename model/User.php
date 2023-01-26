<?php

namespace app\model;

class User
{
    private int $id;

    private string $username;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

}