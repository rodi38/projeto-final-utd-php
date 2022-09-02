<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $DBGroup = "default";
    protected $table      = 'logins';
    protected $primaryKey = 'ID_USER';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = [ 'ID_USER', 'USER_NAME','USER_LOGIN','USER_EMAIL','USER_PASSWORD','USER_FUNCTIONS','USER_CREATED'];


    public function dadosUsuario($id){
    	return $this->where("ID_USER", $id)->findAll();
    }

}
