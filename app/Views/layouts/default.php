
<?php 

	$router     	= service('router');
    $action     	= class_basename($router->controllerName()).'_'.$router->methodName();	
	$globalCss  	= config('DzConfig')->dzAssets['public']['global']['css'];
    $pageLevelCss 	= config('DzConfig')->dzAssets['public']['pagelevel']['css'][$action];
    $globalJs  		= config('DzConfig')->dzAssets['public']['global']['js'];
    $pageLevelJs 	= config('DzConfig')->dzAssets['public']['pagelevel']['js'][$action];

?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <meta name="keywords" content="" /> -->
	<meta name="author" content="Sis Andaimes - Thales Henrique" />
	<!-- <meta name="robots" content="" /> -->
	<meta name="description" content="Sis Andaimes - TOP ANDAIMES" />
	<meta property="og:title" content="Sis Andaimes - TOP ANDAIMES" />
	<meta property="og:description" content="Sis Andaimes - TOP ANDAIMES" />
	<!-- <meta property="og:image" content="imagem.png" /> -->
	<meta name="format-detection" content="telephone=no">

    <!-- PRÓPRIOS -->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- GERAR PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>    
    
    <!-- DESATIVADO POR DESEMPENHO -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.22/jspdf.plugin.autotable.min.js"></script>



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.0/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


    
    <!-- GERAR PDF 
    <script src = "html2pdf.bundle.min.js"></script>
    <script src = "es6-promise.auto.min.js"> </script> 
    <script src = "jspdf.min.js"> </script> 
    <script src = "html2canvas.min.js"> </script> 
    <script src = "html2pdf.min.js"> </script> 
    -->

    <!-- SERVICE PARA MANIFESTO -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#317EFB"/>       
    

	<!-- PAGE TITLE HERE -->
	<title>FISCAL</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONT AWESOME #DESEMPENHO -->
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
	
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('public/assets/images/icon.ico'); ?>">

    <?php foreach($pageLevelCss as $css){
            if(strpos($css, 'http') !== false){
                $css_url = $css;    
            }else{
                $css_url = base_url($css);
            } 
        ?>	
            <link href="<?php echo $css_url ?>" rel="stylesheet" type="text/css"/>	
    <?php } ?>
    <?php foreach($globalCss as $css){ ?>	
            <link href="<?php echo base_url($css) ?>" rel="stylesheet" type="text/css"/>		
    <?php } ?>  


    
    </head>
    <body>
    
    <!-- DIV PARA BASE DA URL PUXADA PELO ARQUIVO ROTINAS JAVASCRIP -->
    <div id="base-url" data-url="<?php echo base_url(); ?>">           
        <input type="hidden" name="CODCCUSTOEMAIL" id="CODCCUSTOEMAIL" value="<?php echo isset($sessionData['CODCCUSTO']) ? $sessionData['CODCCUSTO'] : ''; ?>">
    </div>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
         
		</div>
        <!-- <div class="text-center mb-3 lds-ripple">
            <a href="<?php echo site_url('/index'); ?>"><img src="<?php echo base_url('public/assets/images/logo.png'); ?>" alt=""></a>
        </div> -->
    </div>
    <!--*******************
        Preloader end
    ********************-->
	

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?php echo base_url('public/assets/images/logo.png'); ?>" width="100" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
                


        <!-- INCLUINDO SIDEBAR -->
        <?php echo $this->include('elements/sidebar') ?>





        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li> -->
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="#" target="_blank" class="btn btn-primary">Opção</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?php echo base_url('assets2/images/profile/user-1.jpg'); ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        
        
        
      <?php echo $this->renderSection('content') ?>

      <!-- INCLUINDO FOOTER  -->
      <?php echo $this->include('elements/footer') ?>
      











	<?php foreach($globalJs['top'] as $js){ ?>
		<script src="<?php echo base_url($js); ?>"></script>
	<?php } ?>	

	<?php foreach($pageLevelJs as $js){
        
        if(strpos($js, 'http') !== false){
            ?>
        <script src="<?php echo $js; ?>"></script>
        <?php }
        else{
            ?>
        <script src="<?php echo base_url($js); ?>"></script>
    <?php
        }
    } 
    ?>	
	<?php foreach($globalJs['bottom'] as $js){ ?>
		<script src="<?php echo base_url($js); ?>"></script>
	<?php } ?>
	<?php echo $this->renderSection('scripts') ?>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>
