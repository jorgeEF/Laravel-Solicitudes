<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function scopeStatus($query, $filter){

        return Pedido::all()->where('status',$filter);

    }

    public function scopeSearch($query, $tracking){
        $tracked = Pedido::all()->where('tracking_no',$tracking);
        if ($tracked->isNotEmpty()){
            return $tracked;
        }   else {
                return null;
            }
    }

}
