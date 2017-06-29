<?php
	class Inscricao {

		public $id;
		public $id_tipo_ingresso;
		public $id_congressista;
		public $pagamento;
		public $presenca;
		
		function inserir(){
			$bd = new ConexaoDB;
			$sql = "INSERT INTO inscricao(id_tipo_ingresso, id_congressista, pagamento, presenca) 
			VALUES ('$this->id_tipo_ingresso', '$this->id_congressista', 'Aguardando', 'Pendente')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function listar(){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM inscricao");
			$bd->fechar();
		}

		function listarByIdCongressista($id_congressista){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM inscricao WHERE id_congressista='$id_congressista'");
			$bd->fechar();
		}

		function listarInscritosByIdEvento($id_evento){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT inscricao.id as id_inscricao, congressista.id as id_congressista, congressista.nome, congressista.instituicao, congressista.estado, congressista.email, tipo_ingresso.descricao, inscricao.pagamento, inscricao.presenca FROM evento, congressista, tipo_ingresso, inscricao
				WHERE inscricao.id_tipo_ingresso = tipo_ingresso.id
				AND inscricao.id_congressista = congressista.id
				AND evento.id = tipo_ingresso.id_evento
				AND evento.id = '$id_evento'
				ORDER BY congressista.nome;");
			$bd->fechar();
		}

		function getDadosParaCongressista($id_tipo_ingresso, $id_congressista){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT congressista.nome AS nome_congressista, congressista.email AS email, cpf, evento.nome AS nome_evento, dataRealizacao, cargaHoraria, local, tipo_ingresso.descricao 
				FROM evento, inscricao, congressista, tipo_ingresso
				WHERE inscricao.id_congressista = congressista.id
				AND tipo_ingresso.id_evento = evento.id
				AND inscricao.id_tipo_ingresso = tipo_ingresso.id
				AND tipo_ingresso.id = '$id_tipo_ingresso'
				AND congressista.id = '$id_congressista'");
			$bd->fechar();
		}

		function verificaVagasDisponiveis($id_tipo_ingresso){
			$bd = new ConexaoDB;
			$bd->conectar();

			$numInscritos = mysqli_fetch_array( $bd->query("SELECT COUNT(*) FROM inscricao, tipo_ingresso 
				WHERE tipo_ingresso.id = inscricao.id_tipo_ingresso 
				AND inscricao.id_tipo_ingresso = '$id_tipo_ingresso'") );

			$vagas = mysqli_fetch_array( $bd->query("SELECT vagas from tipo_ingresso 
				WHERE tipo_ingresso.id = '$id_tipo_ingresso';") );

			if($numInscritos[0] < $vagas[0]) {
				return true;
			} else {
				return false;
			}
			$bd->fechar();
		}

		function getNumTotalInscritos($id_evento){
			$bd = new ConexaoDB;
			$bd->conectar();

			$numInscritos = mysqli_fetch_array( $bd->query("SELECT COUNT(*) FROM evento, congressista, tipo_ingresso, inscricao
				WHERE inscricao.id_tipo_ingresso = tipo_ingresso.id
				AND inscricao.id_congressista = congressista.id
				AND evento.id = tipo_ingresso.id_evento
				AND evento.id = '$id_evento'
				ORDER BY congressista.nome;") );

			return $numInscritos[0];
			$bd->fechar();
		}

		function setPagamento($id_inscricao, $situacao_pagamento){
			$bd = new ConexaoDB;
			$sql = "UPDATE inscricao SET pagamento='$situacao_pagamento' WHERE id='$id_inscricao';";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function setPresenca($id_inscricao, $situacao_presenca){
			$bd = new ConexaoDB;
			$sql = "UPDATE inscricao SET presenca='$situacao_presenca' WHERE id='$id_inscricao';";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
	}
?>