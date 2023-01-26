<?php

namespace app\core;

class App
{
    public function __construct()
    {
        session_start();
    }

    public function run(): void
    {
        echo Router::go();
    }
}