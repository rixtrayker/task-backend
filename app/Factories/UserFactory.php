<?php

namespace App\Factories;

use App\Factories\UserFactoryInterface;
use App\UserFetcher\FirstUsersFetcher;
use App\UserFetcher\SecondUsersFetcher;
use Illuminate\Support\Facades\DB;

class UserFactory implements UserFactoryInterface {

    private const factories = [
        FirstUsersFetcher::class,
        SecondUsersFetcher::class,
    ];

    public static function handle(){
        foreach(self::factories as $factory){
            $users = (new $factory)->getUsers();
            self::save($users);
        }
    }

    public static function save(array $data){
        foreach($data as $row){
            $row['created_at'] = new \DateTime();
            $row['updated_at'] = new \DateTime();
            DB::table('users')->insertOrIgnore([
                $row
            ]);
        }
    }

}
