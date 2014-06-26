<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $content; ?>         		

<div class="box grid_2"> 
	<div class="box-head "><h2>Operaciones</h2></div>
	<div class="box-content ">       	
	<?php 		
		$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
		));	
	?>         		
	</div>
</div>
<?php $this->endContent(); ?>


<!-- <div class="span-19"> -->
<!-- 	<div id="content"> -->
		<?php //echo $content; ?>		
<!-- 	</div> -->
<!-- </div> -->

<!-- <div class="span-5 last"> -->
<!-- 	<div id="sidebar"> -->
	<?php
// 		$this->beginWidget('zii.widgets.CPortlet', array(
// 			'title'=>'Operaciones',
// 		));
// 		$this->widget('zii.widgets.CMenu', array(
// 			'items'=>$this->menu,
// 			'htmlOptions'=>array('class'=>'operations'),
// 		));
// 		$this->endWidget();
	?>
<!-- 	</div> -->
<!-- </div> -->

<?php //$this->endContent(); ?>