<?php

namespace App\UserFetcher;


interface UserFetcherInterface {
    public function getUsers() : array;
    public function fetchUsers() : array;
}
