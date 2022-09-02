<?php

namespace App\Models;

use CodeIgniter\Model;

class LivrosModel extends Model
{    
    protected $DBGroup = "default";
    protected $table      = 'livros';
    protected $primaryKey = 'id_livro';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id_livro','livro_nome','livro_capa','livro_autor','livro_criadoem' ];


}

