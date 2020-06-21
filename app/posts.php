<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
   //public $timestamps = false;
   const CREATED_AT = 'publication_date';
   const UPDATED_AT = 'publication_modified_at';
   protected $casts = [
    'publication_date' => 'datetime:Y-m-d H:i:s',
    'publication_modified_at' => 'datetime:Y-m-d H:i:s',
];
    //
}
