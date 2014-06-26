<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/master.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tables.css" />
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css2/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>

<body>

	<div class="header">
   		<a href="index.php"><img src=" <?php echo Yii::app()->request->baseUrl; ?>/images/logo_esp.png" alt="Logo" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#333333"><font face="Tahoma" size="3"><? //echo "Escolar App"; ?></font></font> 
	</div>
   
   <div class="top-bar">
      <ul id="nav">
      
        <li id="user-panel">
          <img src="imagenes/iconos/pequenos/usuario.png" id="usr-avatar" alt="" />
          <div id="usr-info">
            <br><p id="usr-name">Bienvenido(a), Jorge Morales</p>
            <p><a href="#">Ver Perfil</a>
            <?php if(Yii::app()->user->isGuest){ ?>
            <a href="index.php?r=site/login">Login</a></p>
            <?php } else{?>
            <a href="index.php?r=site/logout">Cerrar sesion</a></p>
            <?php } ?>
          </div>
        </li>
        <li>
        
        <ul id="top-nav">
         <li class="nav-item">
           <a href="index.php?r=ciclo"><img src="imagenes/iconos/pequenos/admin.png"><p>Periodos</p></a>
         </li>         
         <li class="nav-item">
           <a href="index.php?r=inscripcion"><img src="imagenes/iconos/pequenos/admin.png"><p>Alumno</p></a>
         </li>
         <li class="nav-item">
           <a href="index.php?r=profesores/create"><img src="imagenes/iconos/pequenos/admin.png"><p>Profesores</p></a>
         </li>         
         <li class="nav-item">
           <a href="index.php?r=historialConducta"><img src="imagenes/iconos/pequenos/admin.png"><p>Conducta</p></a>
         </li>
         
         <li class="nav-item">
           <a href="index.php" class="menuItem"><img src="imagenes/iconos/pequenos/admin.png"><p>Administracion</p></a>
         </li>
                  
<!--          <li class="nav-item"> -->
<!--            <a href="index.php?r=grado"><img src="imagenes/iconos/pequenos/admin.png"><p>Grados</p></a> -->
<!--          </li> -->
<!--          <li class="nav-item"> -->
<!--            <a href="index.php?r=grupo"><img src="imagenes/iconos/pequenos/admin.png"><p>Grupos</p></a> -->
<!--          </li> -->
<!--          <li class="nav-item"> -->
<!--            <a href="index.php?r=materias"><img src="imagenes/iconos/pequenos/admin.png"><p>Materias</p></a> -->
<!--          </li> -->
<!--          <li class="nav-item"> -->
<!--            <a href="index.php?r=aulas"><img src="imagenes/iconos/pequenos/admin.png"><p>Aulas</p></a> -->
<!--          </li>          -->
<!--          <li class="nav-item"> -->
<!--            <a href="index.php?r=RequisitosSeccion"><img src="imagenes/iconos/pequenos/admin.png"><p>Requisitos</p></a> -->
<!--          </li> -->
         </ul>
      </li>
     </ul>
  </div>
  	
	<div class="content container_12">
      
		<div class="ad-notif-info">
	      	
	      	<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(				
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
			<?php endif?>      
	    </div>
	    
	    <div class="moduleContainer">
	    
        	<?php echo $content; ?>    
        
        </div>
        
    </div>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> SSAE.<br/>
		Todos los derechos reservados.<br/>		
	</div><!-- footer -->
	
</body>
</html>