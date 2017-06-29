<?php
	class TipoIngresso {

		public $id;
		public $id_evento;
		public $descricao;
		public $valor;
		public $vagas;
		public $detalhes;
		
		function inserir(){
			$bd = new ConexaoDB;
			$sql = "INSERT INTO tipo_ingresso (id_evento, descricao, valor, vagas, detalhes)
			VALUES ('$this->id_evento', '$this->descricao', '$this->valor', '$this->vagas', '$this->detalhes')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function editar(){
			$bd = new ConexaoDB;
			$sql = "UPDATE tipo_ingresso SET (descricao, valor, vagas, detalhes) VALUES descricao='$this->descricao', valor='$this->valor', vagas='$this->vagas', detalhes='$this->detalhes' WHERE id='$this->id')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function listar($id_evento){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT tipo_ingresso.id AS id, COUNT(*) AS qtd_vendida, descricao, valor, vagas, detalhes 
				FROM tipo_ingresso
				LEFT JOIN inscricao ON tipo_ingresso.id = inscricao.id_tipo_ingresso
				AND tipo_ingresso.id_evento = '$id_evento'
				GROUP BY id;");
			$bd->fechar();
		}

		function listarTipoIngressoByIdEvento($id_evento){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM tipo_ingresso WHERE id_evento='$id_evento'");
			$bd->fechar();
		}
	}
?>