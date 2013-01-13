<?php
App::import('Vendor','Tcpdf/tcpdf');
App::import('Vendor','Fpdi/fpdi');

class XTCPDF extends FPDI
{

    var $xheadertext  = 'Construcciones y Soluciones del Norte S.A.P.I de C.V.';
    var $xheadercolor = array(0,0,200);
    var $xfootertext  = 'Copyright © %d Construcciones y Soluciones del Norte S.A.P.I de C.V. Todos los Derechos Reservados.';
    var $xfooterfont  = PDF_FONT_NAME_MAIN ;
    var $xfooterfontsize = 8 ;
    
    var $_tplIdx;


    /**
    * Overwrites the default header
    * set the text in the view using
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION';
    * set the fill color in the view using
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b)
    * set the font in the view using
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize));
    */
    function Header()
    {

        //list($r, $b, $g) = $this->xheadercolor;
        //$this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top
        //$this->SetFillColor($r, $b, $g);
        //$this->SetTextColor(0 , 0, 0);
        //$this->Cell(0,20, '', 0,1,'C', 1);
        //$this->Text(15,26,$this->xheadertext );
        if (is_null($this->_tplIdx)) {
	            switch (strtoupper($this->templateName)) {
					case 'ORDENDECOMPRA':
						$this->setSourceFile('files/templates/ordendecompra.pdf');
					break; 
					case 'REMISION':
						$this->setSourceFile('files/templates/remision.pdf');
					break;
					case 'RECIBODENOMINA':
						$this->setSourceFile('files/templates/recibodenomina.pdf');
					break;
					case 'FACTURA':
						$this->setSourceFile('files/templates/factura.pdf');
					break;
					case 'REPORTE':
						$this->setSourceFile('files/templates/reporte.pdf');
					break;
					case 'DEFAULT':
					default:
						$this->setSourceFile('files/templates/default.pdf');
					break;
				}
	            $this->_tplIdx = $this->importPage(1);
	        }
	        $this->useTemplate($this->_tplIdx); 
	        //$this->SetFont('freesans', 'B', 9); 
	        //$this->SetTextColor(255); 
	        //$this->SetXY(60.5, 24.8); 
	        //$this->Cell(0, 8.6, "TCPDF and FPDI");

    }

    /**
    * Overwrites the default footer
    * set the text in the view using
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.';
    */
    function Footer()
    {
        /*$year = date('Y');
        $footertext = sprintf($this->xfootertext, $year);
        $this->SetY(-20);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
        $this->Cell(0,8, $footertext,'T',1,'C');*/
    }

	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}
	/*
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L', $fill = false, $bkcolor = array('255','255','255')) {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$bkcolor = array('255','0','0');
		$this->SetFillColorArray($bkcolor);
		$this->Cell($width, $height, $textval, 0, false, $align, $fill);
	}
	*/
}
?>