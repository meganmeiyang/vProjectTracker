<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<script src="https://use.fontawesome.com/9c43870ba3.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
		      <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
	</script>
	
<style>
	

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #E60026;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #F0F0F0;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 30px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.button3 {
color: white;
background-color: #E60026;} /* Red */
</style>

	

</head>
<body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "160px";
  document.getElementById("main").style.marginLeft = "160px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "25px";
  document.getElementById("main").style.marginLeft= "25px";
}
</script>
	
<?php $this->beginBody() ?>

	
<!--START BODY-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
	<?php echo "<a href=\"". Url::to(['/']) ." \">" ?>  
	<i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Home</a>
	
	<?php echo "<a href=\"". Url::to(['project/index']) ." \">" ?>  
	<i class="fa fa-th-list fa-fw" aria-hidden="true"></i>&nbsp; Project</a> 
	
	<?php echo "<a href=\"". Url::to(['weekly/index']) ." \">" ?> 
	<i class="fa fa-calendar fa-fw" aria-hidden="true"></i>&nbsp; Weekly</a>

	<?php 
				
	if(Yii::$app->user->isGuest){
	echo "<a href=\"". Url::to(['site/login']) ." \">  
		<i class=\"fa fa-user fa-fw\" aria-hidden=\"true\"></i>&nbsp; Login</a> " ;
	}
	
	else {
		
		echo " <br>
			
			<form action=\"/index.php?r=site%2Flogout\" method=\"post\">
				<input type=\"hidden\" name=\"_csrf\" >
			<button type=\"submit\" class=\"btn\" align=\"center\"><i class=\"fa fa-user fa-fw\"></i>Logout(". Yii::$app->user->identity->username . ")</button>	
			</form> 
				
			
			"
			;
			
			
			/*
			Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-warning logoutbtn',
					'align'=> 'center',
					]
                )
					. Html::endForm();
			*/		
	}
	?>		
	
</div>


<div id="main">
	<div class="container-fluid">
		
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>
	<div class="row">
		
		<?= $content ?>
			
	</div>
	</div>
</div><!--content-->



<!--END BODY-->

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; vCodes Co <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>



    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	
<?php $this->endBody() ?>

</body>


</html>
<?php $this->endPage() ?>
