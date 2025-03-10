<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable =[
        'name' ,
        'price',
        'description',
        'photo'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
