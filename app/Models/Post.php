<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // GETTER de la catégorie du post
    public function categorie() {
      return $this->belongsTo('App\Models\Categorie');
    }
}
