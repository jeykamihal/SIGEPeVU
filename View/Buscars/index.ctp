<?php
echo $this->Javascript->link('jquery-1.8.3.min.js');
echo $this->Javascript->link('select2.min.js');
echo $this->Javascript->link('select2_locale_es.js');
echo $this->Html->css('select2/select2.css', 'stylesheet', array("media"=>"all" ));
echo $this->Html->css('botones_bonitos');
?>

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<div class="Buscars index">
        <ul id="navexp">
 
        </ul>
        <br/>
        <div class="Buscars buscar">
            <?php echo $this->Form->create('Buscar', array('action' => 'buscar' , 'class'=>"form-signin")); ?>
            <fieldset>
                <legend><?php echo __('Ingrese un dato'); ?></legend>
                <?php
                echo $this->Form->input('Buscar.equPatente',array('label'=>'Patente','class'=>"form-control"));
                echo $this->Form->input('Buscar.equCodigo',array('label'=>'Codigo Equipo','class'=>"form-control"));
                echo $this->Form->input('Buscar.equTipo',array('label'=>'Tipo','class'=>"form-control"));
                ?>
				</br>
                <?php echo $this->Form->submit('Buscar',array('class'=>"btn btn-primary btn-lg"));?>
                
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
      
 	
</div>

<div class="equipos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Equipos'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Equipo'), array('action' => 'add'), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
<!--						<th><?php echo $this->Paginator->sort('id'); ?></th>-->
						<th><?php echo $this->Paginator->sort('equCodigo','Codigo'); ?></th>
						<th><?php echo $this->Paginator->sort('equPatente','Patente'); ?></th>
						<th><?php echo $this->Paginator->sort('equTipo','Tipo'); ?></th>
						<th><?php echo $this->Paginator->sort('equEstado','Estado'); ?></th>
					<!--	<th><?php echo $this->Paginator->sort('equFecRevTecnica','Fecha Rev. Tecnica'); ?></th> -->
						<th><?php echo $this->Paginator->sort('Personal.Apellido_Nombre','Apellido y Nomnbre'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($equipos as $equipo): ?>
					<tr>
<!--						<td><?php echo h($equipo['Equipo']['id']); ?>&nbsp;</td>-->
						<td><?php echo h($equipo['Equipo']['equCodigo']); ?>&nbsp;</td>
						<td><?php echo h($equipo['Equipo']['equPatente']); ?>&nbsp;</td>
						<td><?php echo h($equipo['Equipo']['equTipo']); ?>&nbsp;</td>
						<td><?php echo h($equipo['Equipo']['equEstado']); ?>&nbsp;</td>
					<!--	<td><?php echo h($equipo['Equipo']['equFecRevTecnica']); ?>&nbsp;</td> -->
								<td>
			<?php echo $this->Html->link($equipo['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $equipo['Personal']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $equipo['Equipo']['id']), array('escape' => false)); ?>							
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
