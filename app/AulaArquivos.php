<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AulaArquivos extends Model
{
    protected $table = "arquivo";
    protected $fillable = ['aula_id', 'arquivo_id'];

	public function aula() {
		return $this->belongsTo("App\Aula");
	}
}
