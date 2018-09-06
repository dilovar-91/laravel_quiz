<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Validator;


class Savol extends Model
{
    protected $table = 'savolho';
     protected $fillable = [
 
       'nomi_savol', 
      // 'id_fan', 
      // 'kategoriya',
      // 'varianti1',
       'javob',
      // 'type',
 
   ];//
}
