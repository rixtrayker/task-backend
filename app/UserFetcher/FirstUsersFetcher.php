<?php

namespace App\UserFetcher;

use App\UserFetcher\UsersFetcherInterface;
use Illuminate\Support\Facades\Http;

class FirstUsersFetcher implements UserFetcherInterface {
    public function getUsers(): array{
        $fetchedUsers = $this->fetchUsers();
        $data = [];
        foreach($fetchedUsers as $user){
            $user = (array) $user;
            array_push($data,[
                'first_name' => $user['firstName'],
                'last_name' => $user['lastName'],
                'avatar' => $user['avatar'],
                'email' => $user['email'],
            ]);
        }
        return $data;
    }
    public function fetchUsers(): array{
        $url = config('UsersFetcher.users_1');
        $response = Http::get($url);
        return json_decode($response);
    }
}
