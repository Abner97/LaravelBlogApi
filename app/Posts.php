<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
   //public $timestamps = false;
   //protected $table="posts";
   protected $primaryKey = 'post_id';
   protected $fillable = ['title'];
   const CREATED_AT = 'publication_date';
   const UPDATED_AT = 'publication_modified_at';
   protected $casts = [
    'publication_date' => 'datetime:Y-m-d H:i:s',
    'publication_modified_at' => 'datetime:Y-m-d H:i:s',
];
    public function users(){
        return $this->belongsTo(User::class);
    }
}
