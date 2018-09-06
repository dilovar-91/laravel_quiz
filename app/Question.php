<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['savol', 'kategoriya', 'variant_A', 'varian_B',  'varian_C', 'varian_D', 'javob'];
     protected $table = 'savolho';
    
    public function getAll()
    {
        return $this->belongsTo(1);
    }
}
