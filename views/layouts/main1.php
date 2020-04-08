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
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
	</script>
	
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.3em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}
.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}
#sidebar {
background: #E5274D;
    color: #fff;
    transition: all 0.3s;
    min-width: 150px;
    max-width: 150px;
    min-height: 100vh;
}
#sidebar.active {
    margin-left: -150px;
}
#sidebar .sidebar-header {
    padding: 20px;
    background: #E5274D;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 0px solid #E5274D;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.3em;
    display: block;
}
#sidebar ul li a:hover {
    color: #E5274D;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #E5274D;
}
ul ul a {
    font-size: 1.3em !important;
    padding-left: 30px !important;
    background: #E5274D;
}
a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}

</style>

	

</head>
<body>

<script>
$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});

</script>	
	
<?php $this->beginBody() ?>

	
<!--START BODY-->

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Menu</h3>
        </div>

        <ul class="list-unstyled components">
            
            <li>
				<?php echo "<a href=\"". Url::to(['site']) ." \">" ?>  
				<i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Home</a>
                
            </li>
			
			<li>
				<?php echo "<a href=\"". Url::to(['project/index']) ." \">" ?>  
				<i class="fa fa-th-list fa-fw" aria-hidden="true"></i>&nbsp; Project</a> 
            </li>
			<li>
				<?php echo "<a href=\"". Url::to(['weekly/index']) ." \">" ?> 
				<i class="fa fa-calendar fa-fw" aria-hidden="true"></i>&nbsp; Weekly</a>
			</li>
		
			<li>
				
				<?php 
				
				if(Yii::$app->user->isGuest){
				echo "<a href=\"". Url::to(['site/login']) ." \">  
					<i class=\"fa fa-user fa-fw\" aria-hidden=\"true\"></i>&nbsp; Login</a> " ;
				}
				
				else {
					echo "<a href=\"". Url::to(['site/logout'],'post') ." \">  
						<i class=\"fa fa-user fa-fw\" aria-hidden=\"true\"></i>&nbsp; Logout(".Yii::$app->user->identity->username  .") </a> " ;
					/*
					echo Html::beginForm(['/site/logout'], 'post'). 
						Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
							['class' => 'btn btn-link logout'] )
								. Html::endForm() ;
								*/
				}
				/* 
				Yii::$app->user->isGuest ? ( echo "<a href=\"". Url::to(['site/login']) ." \">  
						<i class=\"fa fa-user fa-fw\" aria-hidden=\"true\"></i>&nbsp; Login</a> ")
					:(
					
						 echo Html::beginForm(['/site/logout'], 'post'). 
						Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
							['class' => 'btn btn-link logout'] )
						. Html::endForm()
					); */
						
				?>	
				
			</li>
			
        </ul>
    </nav>

	
	
	
	
	<div id="content">
		
			
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
			

			<div class="row">
				<button type="button" id="sidebarCollapse" class="btn btn-default">
                <i class="fas fa-align-left fa-3x"></i>
               
            	</button>
			
				
					<?= $content ?>
			
			</div>
			
        </div>
    </nav>
	
	
	
	
	
	</div>
	
	
	
	

</div>





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
