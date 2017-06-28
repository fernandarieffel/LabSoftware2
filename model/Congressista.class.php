<?php
	class Congressista {
		public $id;
		public $nome;
		public $instituicao;
		public $rg;
		public $cpf;
		public $endereco;
		public $numero;
		public $complemento;
		public $cidade;
		public $estado;
		public $email;
		public $senha;
		public $tipoInstiuicao;
		public $telefone;
		
		function inserir(){
			$bd = new ConexaoDB;
			$sql = "INSERT INTO congressista (nome, instituicao, rg, cpf, endereco, numero, complemento, cidade, estado, telefone, email, senha)
			VALUES ( '$this->nome', '$this->instituicao', '$this->rg', '$this->cpf', '$this->endereco', '$this->numero', '$this->complemento', '$this->cidade', '$this->estado', '$this->telefone','$this->email', '$this->senha')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		
		function listar(){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM congressista");
			$bd->fechar();
		}

		function entrar(){
			$bd = new ConexaoDB;
			$bd->conectar();
			return $bd->query("SELECT * FROM congressista WHERE  senha='$this->senha' AND email='$this->email'");
			$bd->fechar();
		}
		
	}


?>