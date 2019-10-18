<?php
/**
 * Created by PhpStorm.
 * User: sarah
 * Date: 2019-10-16
 * Time: 12:39
 */

namespace App\Repositories;


class DbUserRepository implements UserRepository
{

    public function create($attributes)
    {
//        User::create();
        // TODO: Implement create() method.
        dd('creating the user');
    }
}