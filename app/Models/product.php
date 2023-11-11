<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image' , 'description' , 'price' , 'sold' , 'user_id'];

    public function seller(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
