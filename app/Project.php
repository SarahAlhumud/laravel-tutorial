<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title', 'description'
    ];

    // or
    // protected $guarded = []; if you charge of what you do :). It help attacker to change id, token and database.
//    protected $guarded = [];

    public function tasks(){

        // :: reference to
        return $this->hasMany(Task::class);

    }

    // Laravel convert array that contains 'description' to Task object
    public function addTask($task){
        // not tasty :)
//        return Task::create([
//            'project_id' => $this->id,
//            'description' => $description
//        ]);

        // Tasty Creation :)
//        $this->tasks()->create(compact('description'));
        $this->tasks()->create($task);


    }
}
