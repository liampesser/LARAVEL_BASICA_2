<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'categorie_id'];

    /**
     * GETTER de la catégorie du post
     * @return [type] [description]
     */
    public function categorie() {
      return $this->belongsTo('App\Models\Categorie');
    }


}
