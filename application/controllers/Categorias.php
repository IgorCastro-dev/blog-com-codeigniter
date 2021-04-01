<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("categorias_models",'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}
	public function index($id, $slug=NULL)
	{	
        $dados['categorias'] = $this->categorias;
		$this->load->model('publicacoes_models','modelpublicacoes');
		$dados['postagem'] = $this->modelpublicacoes->categoria_pub($id);
		
        //dados do cabeçalho		
        $dados['titulo']= "Categorias";
		$dados["subtitulo"] = "";
        $dados["subtitulodb"] = $this->modelcategorias->listar_titulo($id);
		
		$this->load->view('frontend/template/html-header',$dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/categorias');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
