<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected $fillable     =   ['title','slug','user_id','image'];
    protected $table        =   'albums';
    public    $timestamps   =   true;

    public function user( ){
        return $this->belongsTo(User::class);
    }

}
