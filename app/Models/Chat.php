<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('content','id');
    }
    public function message($id){
        return $this->belongsToMany(User::class)->withPivot('content','id')->wherePivot('id',$id);
    }
}
