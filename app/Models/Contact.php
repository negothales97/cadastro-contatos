<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'category_id'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'contact_id');
    }
    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class, 'contact_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
