<?php

namespace App\UserFetcher;

use App\UserFetcher\UsersFetcherInterface;
use Illuminate\Support\Facades\Http;

class SecondUsersFetcher implements UserFetcherInterface {
    public function getUsers(): array{
        $fetchedUsers = $this->fetchUsers();
        $data = [];
        foreach($fetchedUsers as $user){
            $user = (array) $user;
            array_push($data,[
                'first_name'=>$user['fName'],
                'last_name'=>$user['lName'],
                'avatar'=>$user['picture'],
                'email'=>$user['email'],
            ]);
        }
        return $data;
    }
    public function fetchUsers(): array{
        $url = config('UsersFetcher.users_2');
        $response = Http::get($url);
        return json_decode($response);
    }
}
