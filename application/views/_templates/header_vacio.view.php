<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->titulo_vista;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    
    <?php foreach ($this->css_array as $css): ?>          
        <?php if(file_exists('public/css/' . $css)):?>
        	<link rel="stylesheet" type="text/css" href="<?php echo ASSET_ROOT. 'css/' . $css ;?>">  
		<?php endif;?>
		<?php if(file_exists('public/css/libs/' . $css)):?>
        	<link rel="stylesheet" type="text/css" href="<?php echo ASSET_ROOT. 'css/libs/' . $css ;?>">  
		<?php endif;?>
    <?php endforeach;?>
    
</head>
<body>

<!-- seccion nav -->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" di="logo">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php?seccion=inicio">
        <img src="public/img/logo.png" alt="" id="logo">
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

         
      </ul>
    </div>
  </div>
</nav>
