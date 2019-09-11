<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'father_id', 'mother_id', 'fname', 'lname', 'birthday'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'father_id', 'mother_id'];
    protected $table = 'persons';

    public function father() {
        return $this->hasOne('App\Person', 'id', 'father_id');
    }

    public function mother() {
        return $this->hasOne('App\Person', 'id', 'mother_id');
    }

}
