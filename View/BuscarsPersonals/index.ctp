<?php
echo $this->Javascript->link('jquery-1.8.3.min.js');
echo $this->Javascript->link('select2.min.js');
echo $this->Javascript->link('select2_locale_es.js');
echo $this->Html->css('select2/select2.css', 'stylesheet', array("media"=>"all" ));
echo $this->Html->css('botones_bonitos');
?>

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<div class="BuscarsPersonals index">
        <ul id="navexp">
 
        </ul>
        <br/>
        <div class="BuscarsPersonals buscar">
            <?php echo $this->Form->create('BuscarsPersonal', array('action' => 'buscar' , 'class'=>"form-signin")); ?>
            <fieldset>
                <legend><?php echo __('Ingrese un dato'); ?></legend>
                <?php
                echo $this->Form->input('BuscarsPersonal.Apellido_Nombre',array('label'=>'Apellido y Nombre','class'=>"form-control"));
				echo $this->Form->input('BuscarsPersonal.Clase',array('label'=>'Clase','class'=>"form-control"));
				echo $this->Form->input('BuscarsPersonal.DNI',array('label'=>'DNI','class'=>"form-control"));
                 ?>
				</br>
                <?php echo $this->Form->submit('Buscar',array('class'=>"btn btn-primary btn-lg"));?>
                
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
      
 	
</div>

<div class="buscar index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __(' Listado de Personal'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">
	
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<!-- <th><?php //echo $this->Paginator->sort('id'); ?></th> -->
						<th><?php echo $this->Paginator->sort('Apellido_Nombre'); ?></th>
						<th><?php echo $this->Paginator->sort('DNI'); ?></th>
						<th><?php echo $this->Paginator->sort('Legajo'); ?></th>
						<th><?php echo $this->Paginator->sort('Clase'); ?></th>
						<th><?php echo $this->Paginator->sort('Cargo'); ?></th>
						<th><?php echo $this->Paginator->sort('Estado'); ?></th>
						<th><?php echo $this->Paginator->sort('Localidad'); ?></th>
						<th><?php echo $this->Paginator->sort('Obra'); ?></th>
						<th><?php echo $this->Paginator->sort('comision_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($personals as $personal): ?>
					<tr>
						<!--<td><?php //echo h($personal['Personal']['id']); ?>&nbsp;</td> -->
						<td><?php echo h($personal['Personal']['Apellido_Nombre']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['DNI']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['Legajo']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['Clase']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['Cargo']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['Estado']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['Localidad']); ?>&nbsp;</td>
						<td><?php echo h($personal['Personal']['Obra']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($personal['Comision']['Nombre'], array('controller' => 'comisions', 'action' => 'view', $personal['Comision']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $personal['Personal']['id']), array('escape' => false)); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->
