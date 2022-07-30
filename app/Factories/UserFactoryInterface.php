<?php

namespace App\Factories;

interface UserFactoryInterface {
    public static function handle();
    public static function save(array $users);
}
