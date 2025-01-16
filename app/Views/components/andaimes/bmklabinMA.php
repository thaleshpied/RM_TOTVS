<?php echo $this->extend('layouts/default2') ?>
<?php echo $this->section('content') ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>



<style>
    /* #content {
        max-height: 100vh !important;
        min-height: 100vh !important;
        overflow-y: auto; 
    } */
    body{
        background-color: white !important;
    }

    /* 2480px X 3508px */

    /* #rodape {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: white;
    } */
</style>



<div class="content-body">


<!-- <div class="row">

  <div class="text-center">
    <h1>teste</h1>
		<table id="qrCodeTable" class="text-center"></table>
	</div>
   
</div> -->

<iframe src="http://45.164.4.254:3275/ReportServer/Pages/ReportViewer.aspx?rs:embed=true&%2f%C3%81rea+do+Cliente%2f0181+-+KLABIN%2fBoletim+de+Medi%C3%A7%C3%A3o+-+0181&rs:Command=Render&AREA0=12" 
    width="100%" height="600px" style="border: none;"></iframe>







    <!-- <button onclick="generatePDF()" class="mt-5">Gerar PDF</button> -->

    
</div>






<?php echo $this->endSection() ?>
<?php echo $this->section('scripts') ?>
<!-- DESATIVADO POIS ESTAVA IMPACTANDO NO INSERT DO MOVIMENTO. PRECISA VALIDAR A AÇÃO DO SCRIPT PARA VIABILIZAR OU NÃO 
<script>
    $(document).ready(function(){
        // SmartWizard initialize
        $('#smartwizard').smartWizard(); 
    });
</script>
-->
<?php echo $this->endSection() ?>


