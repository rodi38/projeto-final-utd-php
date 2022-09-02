<?php

namespace App\Controllers;


use App\Libraries\Datatables; // Datatables
use App\Controllers\LoginController;
use App\Models\LivrosModel;
use \DateTime;


class LivrosController extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new LivrosModel();
    }

    # CARREGA TELA
    public function listar()
    {

    	# Verifica se existe alguem logado
        if(!LoginController::isLogged()){
            return redirect()->to("/logar");
        }

       	
        # Objetos criados para o controlador atual
        $datatable = new DataTables();

                
        # Rendereização dos escripts de JS E CSS
        $this->setJs($datatable->render()['js']);
        $this->setCss($datatable->render()['css']);
        $this->setJs(base_url() . "/public/services/example/index.js");

        $data['title'] = "Tabela Examplo";
        $data['result'] = $this->model->findAll();
        # Carregamento da view...
        echo $this->load("livros", "listar", $data);
    }

     public function form($id = null){
        //var_dump($livrosCadastrados);
        if($id != null){
            $data['result'] = $this->model->where('id_livro',$id)->first();
            $data['sub'] = "Editar Livro";
        }else{
            $data['result'] = array("id_livro"=>'', "livro_nome"=>"", "livro_capa"=>"","livro_autor"=>"");
            $data['sub'] = "Inserir Livro";
        }

        $data['title'] = "Formulario";

        echo $this->load("livros", "form", $data);

    }

    public function save(){

        $data = $this->request->getPost();
        $ret = $this->model->save($data);

        if($ret){
            $this->setMessage("success", "Dados salvos com sucesso!");
        }else{
            $this->setMessage("error", "Erro na operação!");            
        }
        return redirect()->to('/livros/listar');


    }

    public function delete($id = null){
        $livro = new LivrosModel();
        $livro->delete($id);
        

        return redirect()->back()->with('setmessage', "livro deletado com sucesso");
    }
    

}

