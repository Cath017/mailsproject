<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mail extends Model
{
    protected $fillable = ['contact_id', 'delivered', 'posted', 'user_id'];

    protected $casts = [
        'delivered' => 'date',
        'posted' => 'date',
    ];

    // Tranform the type to Carbon object
    public function setDeliveredAttribute($value){
        $this->attributes['delivered'] = (new Carbon($value));
    }

    public function setPostedAttribute($value){
        $this->attributes['posted'] = (new Carbon($value));
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
