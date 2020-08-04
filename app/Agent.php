<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillabe = array(['agents_fname',
    'agents_lname',
    'agent_sn',
    'agent_contact',
    'agent_email',
    'nid',
    'salesdivision',
    'agentaddress']);

    public $primaryKey = 'agents_id';
}
