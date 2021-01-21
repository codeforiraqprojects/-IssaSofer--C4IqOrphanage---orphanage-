<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orphans extends Model
{
    //
    protected $fillable = [
        'image', 'name', 'age', 'id_number', 'governorate', 'hobbies', 'case'
    ];

    public function myorphan()
    {
        return $this->hasMany('App\Nyorphan', 'orphan_id');
    }

    public function adopted()
    {
        return $this->hasMany('App\adopted', 'orphan_id');
    }
}
