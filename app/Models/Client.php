<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * GETTER des works du client
     * @return [type] [description]
     */
    public function works() {
      return $this->hasMany('App\Models\Work');
    }
}
