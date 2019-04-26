<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $table = 'clientes';
    protected $fillable = ['nome','telefone','endereco','cidade','escolaridade','email','estado_civil','sexo','filhos','identidade','cpf','image'];

    public $rules = ['nome' => 'required|min:3|max:30',
						'telefone' => 'required|min:7|max:20',
						'endereco' => 'required|min:5|max:40',
						'cidade' => 'required|min:3|max:30',
						'estado_civil' => 'required',
						'sexo' => 'required',
						'identidade' => 'required|min:7|max:20',
						'cpf' => 'required|min:7|max:15',
						'image' => 'required'];

	public $edit_rules = ['cidade' => 'required|min:3|max:30',
							'endereco' => 'required|min:5|max:40',
							'estado_civil' => 'required|',
							'sexo' => 'required',
							'escolaridade' => 'required',
							'identidade' => 'required|min:7|max:30',
							'cpf' => 'required|min:7|max:15',
							'telefone' => 'required|min:7|max:20'];
}
