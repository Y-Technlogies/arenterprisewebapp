<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = ['delivery_note', 'amount', 'quantity', 'invoice_no', 'discount'];


    public function products()
    {
        return $this->belongsToMany(Product::class)
                ->withPivot('quantity');
    }

    public function agents()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


}
