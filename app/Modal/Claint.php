<?php

namespace App\Modal;

use Illuminate\Database\Eloquent\Model;

class Claint extends Model{
    
    protected $table='claints';

 	protected $fillable = [
 		'name',
        'ord_num',
        'phone',
        'address',
        'point',
        'del_count',
        'item',
        'total',
        'count',
        'notes',
        'user_id'
 	];
    
    public function user(){
    
        return $this->belongsTo('App\User');
    
    }

    public function getItemAttribute($total){
        
        return str_replace('$*#$', '  ', $total);

    }

   public function item(){
        return explode("  ",$this->item);
   }
    public function getTotalAttribute($total){
        
        return explode("$*#$",$total);

    }

    public function getCountAttribute($total){
        
        return explode("$*#$",$total);

    }

}
