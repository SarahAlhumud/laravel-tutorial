<?php
/**
 * Created by PhpStorm.
 * User: sarah
 * Date: 2019-10-15
 * Time: 11:16
 */

namespace App;


class Example
{

    protected $foo;


    // Auto-resolution: Foo isn't exists in service container, so, search of the class that is name Foo
    public function __construct(Foo $foo)
    {

        $this->foo = $foo;
    }

}