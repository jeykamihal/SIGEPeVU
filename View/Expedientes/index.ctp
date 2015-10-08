<?php
echo $this->Javascript->link('jquery-1.8.3.min.js');
echo $this->Javascript->link('select2.min.js');
echo $this->Javascript->link('select2_locale_es.js');
echo $this->Html->css('select2/select2.css', 'stylesheet', array("media"=>"all" ));
echo $this->Html->css('botones_bonitos');
?>
<script>
$(document).ready(function () {
  // toggle the search form
    $('.buscar-toggle').click(function(){
        $('#EquipoBuscarForm').toggle();
    });
    $('#EquipoBuscarForm').hide();

  $('#titular-select2').select2({
    placeholder: "Buscar un titular...",
    minimumInputLength: 1,
    initSelection: function(element, callback) {
        var id;
        id = $(element).val();
        if (id !== "") {
            return $.ajax({
                url: "<?php echo $this->base; ?>/Equipos/buscartitular",
                type: "POST",
                dataType: "json",
                data: {
                    id: id
                }
            }).done(function(data) {

                callback(data[0]);
            });
        }
    },
    ajax: {
      url: "<?php echo $this->base; ?>/Equipos/buscartitular",
      dataType: 'json',
      data: function (term, page) {
        return {
          q: term
        };
      },
      results: function (data, page) {
        return { results: data };
      }
    }
  });
  
  $('#productor-select2').select2({
    placeholder: "Buscar un productor...",
    minimumInputLength: 1,
        initSelection: function(element, callback) {
        var id;
        id = $(element).val();
        if (id !== "") {
            return $.ajax({
                url: "<?php echo $this->base; ?>/Equipos/buscarproductor",
                type: "POST",
                dataType: "json",
                data: {
                    id: id
                }
            }).done(function(data) {

                callback(data[0]);
            });
        }
    },
    ajax: {
      url: "<?php echo $this->base; ?>/Equipos/buscarproductor",
      dataType: 'json',
      data: function (term, page) {
        return {
          q: term
        };
      },
      results: function (data, page) {
        return { results: data };
      }
    }
  });
  
        $('#oficina-select2').select2({
        placeholder: "Buscar una oficina...",
        minimumInputLength: 1,
        initSelection: function(element, callback) {
            var id;
            id = $(element).val();
            if (id !== "") {
                return $.ajax({
                    url: "<?php echo $this->base; ?>/Equipos/buscaroficina",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id: id
                    }
                }).done(function(data) {

                    callback(data[0]);
                });
            }
        },
        ajax: {
            url: "<?php echo $this->base; ?>/Equipos/buscaroficina",
            dataType: 'json',
            data: function (term, page) {
                return {
                    q: term
                };
            },
            results: function (data, page) {
                return { results: data };
            }
        }
        }) ;

});

</script>
<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<div class="Equipos index">
	<h2><?php echo __('Equipos');?></h2>
        <ul id="navexp">
        <li><?php echo $this->Html->link(__('Buscar', true), 'javascript:void(0)', array('class'=>'buscar-toggle')); ?></li>
        <li><?php echo $this->Html->link(__('Nuevo Equipo'), array('action' => 'add')); ?></li>
        </ul>
        <br/>
        <div class="Equipos buscar">
            <?php echo $this->Form->create('Equipo', array('action' => 'buscar')); ?>
            <fieldset>
                <legend><?php echo __('Buscar Equipo'); ?></legend>
                <?php
//                $input = $this->Form->input('check',array('label'=>'numeroooooo','type'=>'checkbox','name'=>'checboknumero'));
                echo $this->Form->input('Buscar.numerosolicitud',array('label'=>'Nº de Solicutud'));
                echo $this->Form->input('Buscar.numeroEquipo',array('label'=>'Equipo'));
                echo $this->Form->input('Buscar.titular',array('label'=>'Titular','id'=>'titular-select2'));
                echo $this->Form->label('Fecha');
                echo $this->Form->date('Buscar.fecha');
                //echo $this->Form->dateTime('Buscar.fecha','DMY',null);
                echo $this->Form->input('Buscar.productor',array('label'=>'Productor','id'=>'productor-select2'));
                echo $this->Form->input('Buscar.oficina',array('label'=>'Oficina','id'=>'oficina-select2'));
                echo $this->Form->submit('Buscar');
                ?>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
      
        <div class="Equipos main">
	<table cellpadding="0" cellspacing="0">
	<tr>
<!--			<th><?php echo $this->Paginator->sort('id');?></th>-->
			<th><?php echo $this->Paginator->sort('numerosolicitud','Nº de Solicitud');?></th>
			<th><?php echo $this->Paginator->sort('numeroexp','Equipo');?></th>
<!--			<th><?php echo $this->Paginator->sort('iniciadorexp','Titular');?></th>-->
<!--			<th><?php echo $this->Paginator->sort('dnicuitexp','DNI/CUIT');?></th>-->
                        <th class="actions"><?php echo __('Titulares/es');?></th>
                        <th><?php echo $this->Paginator->sort('fechaexp','Fecha');?></th>
<!--                        <th><?php echo $this->Paginator->sort('extractoexp');?></th>-->
                        <th class="actions"><?php echo __('Productor/es');?></th>
			<th><?php echo $this->Paginator->sort('tenenciatierra_id');?></th>
			<th><?php echo $this->Paginator->sort('tipoplane_id');?></th>
			<th><?php echo $this->Paginator->sort('predio');?></th>
			<th><?php echo $this->Paginator->sort('departamento_id');?></th>
<!--			<th><?php echo $this->Paginator->sort('superficiecatastral');?></th>
			<th><?php echo $this->Paginator->sort('superficieautorizada');?></th>-->
			<th><?php echo $this->Paginator->sort('tecnico_id');?></th>
			<th><?php echo $this->Paginator->sort('estado_id');?></th>
			<th><?php echo $this->Paginator->sort('oficina_id');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	foreach ($Equipos as $Equipo): ?>
	<tr>
<!--		<td><?php echo h($Equipo['Equipo']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($Equipo['Equipo']['numerosolicitud']); ?>&nbsp;</td>
		<td><?php echo h($Equipo['Equipo']['numeroexp']); ?>&nbsp;</td>
<!--		<td><?php echo h($Equipo['Equipo']['iniciadorexp']); ?>&nbsp;</td>
		<td><?php echo h($Equipo['Equipo']['dnicuitexp']); ?>&nbsp;</td>-->
                <td>
                    <?php 
                        $nombrestitular = "";
                        foreach ($Equipostitulares as $titular):
                            if ($Equipo['Equipo']['id']==$titular['EquiposTitulare']['Equipo_id']){
                                (empty($nombrestitular))? $nombrestitular = $titular['Titulare']['nombretitular']:$nombrestitular .= ' - '.$titular['Titulare']['nombretitular'];
                            }
                        endforeach;
                        echo $nombrestitular;
//                        print_r($Equipostitulares);
                    ?>&nbsp;
                </td>
		<td><?php 
                        $f=explode('-',$Equipo['Equipo']['fechaexp']);
                        $fecha=$f[2].'/'.$f[1].'/'.$f[0];
                        echo $fecha; 
                    ?>&nbsp;
                </td>
<!--		<td><?php echo h($Equipo['Equipo']['extractoexp']); ?>&nbsp;</td>-->
                <td>
                    <?php 
                        $nombresproductor = "";
                        foreach ($Equiposproductores as $productor):
                            if ($Equipo['Equipo']['id']==$productor['EquiposProductore']['Equipo_id']){
                                (empty($nombresproductor))? $nombresproductor = $productor['Productore']['nombreproductor']:$nombresproductor .= ' - '.$productor['Productore']['nombreproductor'];
                            }
                        endforeach;
                        echo $nombresproductor;
//                        print_r($productores);
                    ?>&nbsp;
                </td>
		<td>
			<?php echo $this->Html->link($Equipo['Tenenciatierra']['descripciontenencia'], array('controller' => 'tenenciatierras', 'action' => 'view', $Equipo['Tenenciatierra']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Equipo['Tipoplane']['descripciontipoplan'], array('controller' => 'tipoplanes', 'action' => 'view', $Equipo['Tipoplane']['id'])); ?>
		</td>
		<td><?php echo h($Equipo['Equipo']['predio']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($Equipo['Departamento']['descripciondepto'], array('controller' => 'departamentos', 'action' => 'view', $Equipo['Departamento']['id'])); ?>
		</td>
<!--		<td><?php echo h($Equipo['Equipo']['superficiecatastral']); ?>&nbsp;</td>
		<td><?php echo h($Equipo['Equipo']['superficieautorizada']); ?>&nbsp;</td>-->
		<td>
			<?php echo $this->Html->link($Equipo['Tecnico']['nombretecnico'], array('controller' => 'tecnicos', 'action' => 'view', $Equipo['Tecnico']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Equipo['Estado']['descripcionestado'], array('controller' => 'estados', 'action' => 'view', $Equipo['Estado']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Equipo['Oficina']['descripcionoficina'], array('controller' => 'oficinas', 'action' => 'view', $Equipo['Oficina']['id'])); ?>
		</td>
		<td class="actions">
                        <?php 
                        $imagenseguimiento = $this->Html->image('btns.png',array('class'=>'btn btnrefresh','alt'=>'Seguimiento','title'=>'Seguimiento Equipo'));
                        echo $this->Html->link($imagenseguimiento, array('controller'=>'seguimientos','action' => 'seguimientoEquipo', $Equipo['Equipo']['id']),array('escape'=>false)); ?>
			<?php 
                        $imagenver = $this->Html->image('btns.png',array('class'=>'btn btnfind','alt'=>'Ver','title'=>'Ver Equipo','border'=>'0'));
                        echo $this->Html->link($imagenver, array('action' => 'view', $Equipo['Equipo']['id']),array('escape'=>false)); ?>
			<?php 
                        $imageneditar = $this->Html->image('btns.png',array('class'=>'btn btnsave','alt'=>'Editar','title'=>'Editar Equipo'));
                        echo $this->Html->link($imageneditar, array('action' => 'edit', $Equipo['Equipo']['id']),array('escape'=>false)); ?>
			<?php 
                        $imagenborrar = $this->Html->image('btns.png',array('class'=>'btn btndelete','alt'=>'Borrar','title'=>'Borrar Equipo'));
                        echo $this->Form->postLink($imagenborrar, array('action' => 'delete', $Equipo['Equipo']['id']), array('escape'=>false), __('¿Está seguro de borrar el Equipo %s?', $Equipo['Equipo']['numeroexp'])); ?>
                        
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pág. {:page} de {:pages}, mostrando {:current} filas devueltas de {:count} en total, empezando en la fila {:start}, terminando en {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('<< ' . __('Anterior |'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '|'));
		echo $this->Paginator->next(__('| Siguiente') . ' >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
        </div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Equipo'), array('action' => 'add')); ?></li>
<!--		<li><?php echo $this->Html->link(__('List Tenenciatierras'), array('controller' => 'tenenciatierras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tenenciatierra'), array('controller' => 'tenenciatierras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoplanes'), array('controller' => 'tipoplanes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoplane'), array('controller' => 'tipoplanes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamento'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tecnicos'), array('controller' => 'tecnicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tecnico'), array('controller' => 'tecnicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oficinas'), array('controller' => 'oficinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oficina'), array('controller' => 'oficinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productores'), array('controller' => 'productores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productore'), array('controller' => 'productores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Titulares'), array('controller' => 'titulares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Titulare'), array('controller' => 'titulares', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
