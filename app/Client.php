<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillabe = array(['c_fname',
    'c_lname',
    'company',
    'phone',
    'businessphone',
    'email',
    'clientsn',
    'division',
    'district']);

    public $primaryKey = 'client_id';
    
}
