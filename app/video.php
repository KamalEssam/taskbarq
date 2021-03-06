<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = ['keyword',
        'type',
        'video_url',
        'image_url', 'created_by'];

public function user(){
    return $this->belongsTo(User::class,'created_by');
}
}
