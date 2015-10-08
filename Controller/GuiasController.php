<?php
App::uses('AppController', 'Controller','Xml','Utility');
/**
 * Guias Controller
 *
 * @property Guia $Guia
 */
 
 
class GuiasController extends AppController {

 public $components = array('Paginator');
 
 public $uses = array('Ftp.Ftp');
 public $paginate = array(
                            'limit' => 5,
                            //'contain' => array('Article')
                        );
 
 
	/*public function viewpdf($id = null) {
            
        Configure::write('debug', 0);
            
        $this->loadModel('Guia');
        $this->loadModel('Cupotemp');
        $this->loadModel('Stocktemp');
        $this->loadModel('Envioproducto');
        $this->loadModel('Origen');

        $this->Guia->id = $id;
        if (!$this->Guia->exists()) {
            //throw new NotFoundException(__('guia no valida'));
        }

        $this->loadModel('Guiaproducto');
        $guia = $this->Guia->read(null, $id);

        if ($guia['Guia']['impreso']) {
            //echo "Debe refrescar la Página";
            $this->redirect(array('action' => 'index'));
        }


        $this->set('guia', $guia);

        $guiaproductos = $this->Guiaproducto->find("all", array(
            'conditions' => array('guia_id' => "$id", 'tipotransp' => 1), //Productos Chasis
        ));
        $this->set('guiaproductos', $guiaproductos);

        $guiaproductos1 = $this->Guiaproducto->find("all", array(//Productos Acoplado
            'conditions' => array('guia_id' => "$id", 'tipotransp' => 2),
        ));
        $this->set('guiaproductos1', $guiaproductos1);

        $this->Guia->saveField('impreso', date('Y-m-d H:i:s'));

        $user = $this->Session->read('Auth.User');
        $parUser = $user['id'];
        
        //// Recupero el tipo de destino de la guia para obtener los datos de la guia externa o de consumidor final ---> OFB (03-02-15)
        if ($guia['Guia']['tipodestino']=='Establecimiento'){
            $destinotipo = 2;
        }
        else{
            $destinotipo = $guia['Guia']['destinoExt'];
        
        }
        $this->loadModel('Seldestino');   //Detrminar el tipo de destino

        $seldestinos = $this->Seldestino->find("first", array(
            'conditions' => array('Seldestino.user_id' => $parUser,'Seldestino.destinotipo'=>$destinotipo)
        ));
        
        switch ($destinotipo){
            case 5:
                    $destinoexternos = null;
                    $this->loadModel('Destinoexterno');
                    $destinoexternos = $this->Destinoexterno->find('first', array(
                                                                                          'conditions' => array('Destinoexterno.id' => $seldestinos['Seldestino']['destinoexterno_id']),
                                                                                         ));
                    $this->set('destinoexternos', $destinoexternos);                
                    break;
            case 7:
                    $destinoexportacions = null;
                    $this->loadModel('Destinoexportacion');
                    $destinoexportacions = $this->Destinoexportacion->find('first', array(
                                                                                          'conditions' => array('Destinoexportacion.id' => $seldestinos['Seldestino']['destinoexportacion_id']),
                                                                                         ));
                    $this->set('destinoexportacions', $destinoexportacions);
                    break;
            case 6:
                    $destinoconsumidors = null;
                    $this->loadModel('Destinoconsumidor');
                    $destinoconsumidors = $this->Destinoconsumidor->find('first', array(
                                                                                          'conditions' => array('Destinoconsumidor.id' => $seldestinos['Seldestino']['destinoconsumidor_id']),
                                                                                         ));
                    $this->set('destinoconsumidors', $destinoconsumidors);
                    break;
        }
        
       
        



        $origen = $this->Origen->find("first", array(
            'conditions' => array('Origen.user_id' => $parUser)
        ));
        $this->Origen->id = $origen['Origen']['user_id'];
        $this->Origen->saveField('controlenvprod', 0);

        $this->set("generaguia", 0);

        $this->Cupotemp->deleteAll(array('Cupotemp.user_id' => $guia['Guia']['user_id']), false); //Borrado de registros cuando se requiera 
        $this->Stocktemp->deleteAll(array('Stocktemp.user_id' => $guia['Guia']['user_id']), false); //Borrado de registros cuando se requiera
        $this->Envioproducto->deleteAll(array('Envioproducto.user_id' => $guia['Guia']['user_id']), false); //Borrado de registros cuando se requiera




        App::import('Vendor', 'fpdf', array('file' => 'fpdf/fpdf.php'));
        App::import('Vendor', 'pdf', array('file' => 'fpdf/pdf/fpdi.php'));

        $this->render('pdf');
    }*/

 /* function index() {
//        $this->layout='pdf';
//     }
//}
//function pdf()
//{
     // Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
      // Operaciones que deseamos realizar y variables que pasaremos a la vista.
   
}
*/
}
