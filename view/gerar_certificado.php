<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../dompdf/autoload.inc.php");
	require_once("../model/ConexaoDB.class.php");
	require_once("../model/Inscricao.class.php");

	$inscricao = new Inscricao();

	session_start();

    $id_tipo_ingresso = $_GET['id_tipo_ingresso'];
    $id_congressista = $_SESSION['id_usuario'];

    $inscricao->id_tipo_ingresso = $id_tipo_ingresso;
    $inscricao->id_congressista = $id_congressista;

    $res = $inscricao->getDadosParaCongressista($id_tipo_ingresso, $id_congressista);

    $li = mysqli_fetch_assoc($res);

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
		<link href="../css/style.css" rel="stylesheet">

		<div style="text-align: center; font-family: "Gudea"">
			<h1 style="text-align: center; color: black;">CERTIFICADO</h1><br><br><br>
			
			<h2>Certificamos que <b>'.$li['nome_congressista'].'</b>, CPF '.$li['cpf'].', participou do evento "'.$li['nome_evento'].'", ocorrido em '.$li['local'].'</h2>.
			<h2>Data: '.$li['dataRealizacao'].'</h2>
			<h2>Carga horária: '.$li['cargaHoraria'].' horas</h2>
		</div>
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"certificado".$li['nome_congressista'].".pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>