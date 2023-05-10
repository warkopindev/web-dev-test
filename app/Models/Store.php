<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'email',
        'phone_no','bank_name','bank_no','account_name', 'address', 'city',
        'province', 'postal_code','picturePath'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
{
    return $this->hasMany(Products::class);
}

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    // public function toArray()
    // {
    //     $toArray = parent::toArray();
    //     $toArray['picturePath'] = $this->picturePath;
    // }

    public function getPicturePathAttribute()
    {
        // dd($this);
        return url('app.url') . Storage::url($this->attributes['picturePath']);
    }
}
