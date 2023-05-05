<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AddressBook extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable=['name','phone','email','gender','age','website','nationality','created_by','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
