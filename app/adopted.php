<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adopted extends Model
{
     protected $table = "adopted";

     protected $fillable = [ 'orphan_id' ];

     public function orphan()
     {
         return $this->belongTo('App\Orphans', 'id');
     }
}
