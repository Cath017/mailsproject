<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'state'
    ];

    public function mails(){
        return $this->hasMany(Mail::class);
    }

    public function addMail(Mail $mail)
    {   
        $this->mails()->save($mail);
        
        
    }
}
