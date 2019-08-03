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
        'state',
        'user_id',
    ];

    public function mails()
    {
        return $this->hasMany(Mail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addMail($delivered, $posted)
    {
        $this->mails()->create(compact('delivered', 'posted'));
    }

    public function isUnauthorizedUser($user_id)
    {
        if (auth()->user()->id !== $user_id && !auth()->user()->isAdmin()) {
            return true;
        }
        return false;
    }
}
