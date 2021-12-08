<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $table = "arquivo";
    protected $fillable = ['nome','aula_id', 'arquivo_id'];

	public function aula() {
		return $this->belongsTo("App\Aula");
	}
}
