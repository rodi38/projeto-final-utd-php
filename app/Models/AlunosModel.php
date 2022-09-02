<?php

namespace App\Models;

use CodeIgniter\Model;

class AlunosModel extends Model
{
    protected $DBGroup = "default";
    protected $table      = 'alunos';
    protected $primaryKey = 'id_aluno';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = [ 'id_aluno', 'aluno_nome', 'aluno_cpf', 'aluno_contato'];


    public function dadosUsuario($id){
    	return $this->where("ID_USER", $id)->findAll();
    }

}
