<?php
    // get the HTML
    ob_start();    
	echo $this->renderPartial('pdf', array(	"model"=>$model, "alumno"=>$alumno, "personal"=>$personal), true);
    $content = ob_get_clean();
 
    // convert in PDF
    Yii::import('application.extensions.tcpdf.HTML2PDF');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');	      	
		
		$html2pdf->writeHTML($content, false);
		
		$html2pdf->Output("name.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit; 
    }
?>