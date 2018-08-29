<?php	
include_once '../config.php';
  get_file('controller/GetByIdController');
  $getAllCtrl = new GetByIdController();
  $servicos = $getAllCtrl->getById($_GET['id'], 'servicos');

	$html = '<table style="margin: 0 auto;">';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th style="text-align:center; padding-right: 20px;">Código</th>';
	$html .= '<th style="text-align:center; padding-right: 20px;">Cliente</th>';
	$html .= '<th style="text-align:center; padding-right: 20px;">Entrada</th>';
	$html .= '<th style="text-align:center; padding-right: 20px;">Saída</th>';
	$html .= '<th style="text-align:center; padding-right: 20px;">Tempo</th>';
	
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	foreach ($servicos as $servico) {
		
		$clientes = $getAllCtrl->getById($servico['id_cliente'], 'cliente');
		foreach ($clientes as $cliente) {
			$c = $cliente['nomeCliente'];
		}

		$html .= '<tr><td style="text-align:center; padding-right: 20px;">'.$servico['id'] . "</td>";
		$html .= '<td style="text-align:center; padding-right: 20px;">'.$c . "</td>";
		$html .= '<td style="text-align:center; padding-right: 20px;">'.date('d/m/Y - H:i:s', strtotime($servico["data_hora_entrada"])) . "</td>";
		$html .= '<td style="text-align:center; padding-right: 20px;">'.date('d/m/Y - H:i:s', strtotime($servico["data_hora_saida"])) . "</td>";
		$html .= '<td style="text-align:center; padding-right: 20px;">'.$servico['tempo'] . "</td></tr>";

	}
	
	$html .= '</tbody>';
	$html .= '</table';

	$html2 = '<table style="margin: 0 auto;">';	
	$html2 .= '<tbody style="font-size:25px;">';

	foreach ($servicos as $servico) {
		$html2 .= '<td colspan="2" style="text-align:center; padding-right: 20px;"><b>Total = R$ '.number_format($servico['valor'],2,",",".") . "</b></td>";
	}

	$html2 .= '</tbody>';
	$html2 .= '</table';
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<img src="images/logo.png" style="width:300px; margin-left: 200px;">
			<h1 style="text-align: center;">Comprovante de Serviço</h1>
			'. $html .'
			<p style="text-align: center;">_____________________________________________________________________________</p>
			'. $html2 .'
	');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>