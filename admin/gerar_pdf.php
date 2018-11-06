<?php

include("../includes/banco.php"); 
$con = conectar();

require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ULBRA - Campus Guaíba');
$pdf->SetTitle('Relatório de conversas');
$pdf->SetSubject('Relatório de conversas');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

if(isset($_GET['id'])){
	$usuario_conversa = $_GET['id'];
	$q1 = mysqli_query($con, "SELECT nome FROM `usuarios` WHERE id='$usuario_conversa'");

	while($row = mysqli_fetch_assoc($q1)){
		$nome_remet = $row['nome'];		
	}
	

	// Set some content to print
	$head = "<table border='1'>
	<center><h4>Mensagem enviada pelo usuário ".$nome_remet."</h4></center>
	<br>

	<br>
	<br>
		
			<tr>
				<th> ID do destinatario</th>
				<th> Nome do destinatario</th>
				<th> Mensagem</th>
				<th> Horário de envio</th>
				<th> Visualizada pelo destinatário</th>
							
			</tr>";
	//$pdf->writeHTML($head, 0, 1, 0, true, '', true);	
	$aux = 0;

	$q3 = mysqli_query($con, "SELECT `usuario_destino`,`mensagens`,`timestamp`,`lida` FROM `mensagens` 
						WHERE `usuario_envio`='$usuario_conversa'");

						
		while($row = mysqli_fetch_assoc($q3)){
			$id_usuario_destino = $row['usuario_destino'];
			$mensagem = $row['mensagens'];
			$timestamp = $row['timestamp'];
			$lida = $row['lida'];
			
			$body = "<tr>
				<td>".$id_usuario_destino."</td>
				<td>".$mensagem."</td>
				<td>".$timestamp."</td>";
	
			if($lida == "1"){
				$body2 = "<td>Sim</td>";
			}else{
				$body2 = "<td>Não</td>";
			}
				$end = "</tr>
						</table>";

			$pdf->writeHTML($head.$body.$body2.$end,  0, 1, 0, true, '', true);		
				
		}
			
}
// Print text using writeHTMLCell()




// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
