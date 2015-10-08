<?php
App::import('Helper','pdf');
class PdfsController extends AppController {
     var  $uses = null;
     var  $helpers = array('Pdf');

     function index() {
//        $this->layout='pdf';
//     }
//}
//function pdf()
//{
     // Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
      // Operaciones que deseamos realizar y variables que pasaremos a la vista.
      $this->render();
}
}
?>
