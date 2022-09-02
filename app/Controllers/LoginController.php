<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class LoginController extends BaseController
{

    private $model = array();
    private $session = null;
    public static $sessionName = 'sistema';

    public function __construct()
    {
        $this->model = new UsuariosModel();
        $this->session = \Config\Services::session();
    }

    public function logar()
    {

        //VERIFICA SE JÁ ESTA LOGADO
        if ($this->isLogged()) {
            return redirect()->to('/');
        }

        # Carregando os componentes de Helpper do Codeigniter
        helper(['form', 'text']);
        
        $data = array(
            "title" => "Bem Vindo - Fazer Login",
            "logo" => base_url() . "/public/assets/images/logo.png",
            "mensagens" => []
        );

        if ($this->request->getMethod() ==  'post') {


            $validate = \Config\Services::validation();

            $validation = array(
                "usuario" => ["rules" => "required", "errors" => ["required" => "Campo usuario é obrigatorio"]],
                "senha" => ["rules" => "required", "errors" => ["required" => "Campo senha é obrigatorio"]],
            );

            if ($this->validate($validation)) {

                if ($usuario = $this->model->where("USER_LOGIN", $this->request->getVar("usuario"))
                    ->where("USER_PASSWORD", sha1($this->request->getVar("senha")))
                    ->first()
                ) {

                    //CRIA A SESSÃO
                    $sessao = array(
                        'logado' => true,
                        'usuario' => $usuario['USER_NAME'],
                        'id_usuario' => $usuario['ID_USER'],                        
                    );

                    $this->session->set([self::$sessionName => $sessao]);

                    return redirect()->to('/');
                } else {
                    array_push($data['mensagens'], ['tipo' => 'warning', 'descricao' => "usuario ou senha invalidos"]);
                }
            } else {
                foreach ($validate->getErrors() as $erro) {
                    array_push($data['mensagens'], ['tipo' => 'danger', 'descricao' => $erro]);
                }
            }
        } else {
            array_push($data['mensagens'], ['tipo' => 'secondary', 'descricao' => "Entre com seu usuario e senha"]);
        }

        return view("pages/login", $data);
    }


    public function logout()
    {
        $this->session->set(self::$sessionName, array());
        $this->session->destroy();

        return redirect()->to('/');
    }


    public static function isLogged()
    {

        $session = \Config\Services::session();
        $sessao = $session->get(self::$sessionName);

        if (isset($sessao) && $sessao['logado'] == true) {
            return true;
        }

        return false;
    }
}
