<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

/* ********************** Start Sarah's Comments **********************

You can create artisan commands using two methods:

First method:
$ php artisan make:command

********************** End Sarah's Comments ********************** */

// Second method:

Artisan::command('sarah', function () {
    $this->comment('I am Sarah. I am trying to learn Laravel with laracasts ');
})->describe('Show a secret msg ^.^');
