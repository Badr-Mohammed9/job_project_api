<?php

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Job\Database\Factories\OfferFactory;

class Offer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','salary','category','exp','user_id'];


    // protected static function newFactory(): OfferFactory
    // {
    //     return OfferFactory::new();
    // }
}
