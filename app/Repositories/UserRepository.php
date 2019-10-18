<?php
/**
 * Created by PhpStorm.
 * User: sarah
 * Date: 2019-10-16
 * Time: 12:29
 */

namespace App\Repositories;


interface UserRepository
{

    public function create($attributes);
}