<?php 

//echo $this->renderPartial('pdf', array("model"=>$model,"alumno"=>$alumno,"personal"=>$personal), true);

# mPDF
$mPDF1 = Yii::app()->ePdf->mpdf();

# You can easily override default constructor's params
$mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'Letter', 0, '', 10, 10, 10, 10); 

# Load a stylesheet
$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '2/report.css');
$mPDF1->WriteHTML($stylesheet, 1);

# renderPartial (only 'view' of current controller)
$mPDF1->WriteHTML($this->renderPartial('pdf', array(
												"model"=>$model,
												"alumno"=>$alumno,
												"personal"=>$personal,
													), true));

# Renders image
//$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));

# Outputs ready PDF
$mPDF1->Output();

?>

