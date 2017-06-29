<?php
	class Evento {
		public $id;
		public $id_organizador;
		public $nome;
		public $descricao;
		public $local;
		public $cargaHoraria;
		public $dataRealizacao;
		public $periodoInscricao;
		public $imagem;

		function inserir(){
			$bd = new ConexaoDB;
			$sql = "INSERT INTO evento (id_organizador, nome, descricao, local, cargaHoraria, dataRealizacao, periodoInscricao, imagem)
			VALUES ('$this->id_organizador', '$this->nome', '$this->descricao', '$this->local', '$this->cargaHoraria', '$this->dataRealizacao', '$this->periodoInscricao', '$this->imagem')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function listarByIdOrganizador($id){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM evento WHERE id_organizador = '$id';");
			$bd->fechar();
		}

		function listarByIdCongressista($id){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT evento.id AS id, nome, dataRealizacao, local, tipo_ingresso.descricao AS descricao_tipo_ingresso, tipo_ingresso.id AS id_tipo_ingresso, pagamento, presenca, imagem  FROM evento, inscricao, tipo_ingresso WHERE 
				tipo_ingresso.id = inscricao.id_tipo_ingresso
				AND tipo_ingresso.id_evento = evento.id
				AND inscricao.id_congressista = '$id';");
			$bd->fechar();
		}

		function listar(){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM evento;");
			$bd->fechar();
		}

		function listarEventoById($id){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM evento WHERE id = '$id';");
			$bd->fechar();
		}

		function listarPorOrganizador($id){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM evento WHERE id_organizador='$id'");
			$bd->fechar();
		}

	}
?>