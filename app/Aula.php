<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
      protected $table = "aula";
      protected $fillable = ['descricao' ,'valor'];

      public function produtos()
        {
            return $this->hasMany("App\AulaMaterias");
        }
}
