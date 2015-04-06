<?php 
$this->load->helper('network');

$this->load->library('javascript');
$this->load->library('networking');
header('X-DasHome-Version: 0.1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="900">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> 
<link href="<?php echo $this->config->base_url(); ?>application/views/css/theme.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<title>DasHome | <?php echo $title; ?></title>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">d&auml;sHome</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php 
            $pagename = basename($_SERVER['PHP_SELF']);
            $page = explode(".", $pagename);

            ?>
            <li><a href="<?php echo $this->config->base_url(); ?>index.php/weather/">Weather</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>index.php/traffic/">Traffic</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>index.php/network/">Network</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><i class="fa fa-user fa-fw"></i>LAN IP: <?php echo $this->networking->getLAN(); ?>
          <br />
          <i class="fa fa-globe fa-fw"></i>Global IP: <?php echo $this->networking->getWAN(); ?></a></li>
        </div><!--/.nav-collapse -->
      </div>
    </div>
