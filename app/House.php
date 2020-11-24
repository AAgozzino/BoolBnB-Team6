<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{

    protected $fillable = [
        'type',
        'guests',
        'address',
        // 'latitude',    CONTROLLO
        // 'longitude',   CONTROLLO
        'bedrooms',
        'beds',
        'bathrooms',
        'mq',
        'price',
        'name_serv',
        // 'slug',    CONTROLLO
        'description',
        'image'
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function views()
    {
        return $this->hasMany('App\View');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function sponsors()
    {
        return $this->belongsToMany('App\Sponsor');
    }
}
