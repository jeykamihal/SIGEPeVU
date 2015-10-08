<?php
App::import('Vendor','TCPDF',array('file' => 'tcpdf/tcpdf.php'));   //1
class PdfHelper  extends AppHelper                                  //2
{
    var $core;

    function PdfHelper() {
        $this->core = new TCPDF();                                  //3
    }

}
?>
