<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function joined(){

        return $this->belongsTo(Cro::class,'joined_id','id');
    }
    public function trainer(){

        return $this->belongsTo(Cro::class,'trainer_id','id');
    }
    public function cro(){

        return $this->belongsTo(Cro::class,'cro_id','id');
    }
    public function customer(){

        return $this->belongsTo(Customer::class);
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}