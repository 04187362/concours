<?php

    ob_start();
    include('print_releveNote_concours.php');
    $content=ob_get_clean();
	
	ob_end_clean();
    
	// convert to PDF
    require_once('mpdf/mpdf.php');
    try
    {
		$mpdf = new mPDF(' ','A4-L',' ',' ','1',' 1 ','15','15','  9 ',' 9 ','L');
		$mpdf = new mPDF();
		$mpdf->PDFA = true;
		$mpdf->PDFAauto= true;
		$mpdf->setHeader('');
		$mpdf->setFooter('');
		$mpdf->SetDisplayMode(10);
		$mpdf->WriteHTML($content);
		$mpdf->Output();
    }
    catch(exception $e) {
        echo $e;
        exit;
    }
?>