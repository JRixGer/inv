<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsMembers extends Model
{
 
    protected $table = 'is_members';
    public $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
    ];
}
