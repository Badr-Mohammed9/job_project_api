<?php

namespace Modules\Application\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Application\Database\Factories\UserApplicationFactory;

class UserApplication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id','offer_id'];

    // protected static function newFactory(): UserApplicationFactory
    // {
    //     //return UserApplicationFactory::new();
    // }
}
