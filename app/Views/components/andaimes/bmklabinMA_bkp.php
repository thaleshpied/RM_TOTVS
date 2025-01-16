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

<iframe src="http://srvapl/ReportServer/Pages/ReportViewer.aspx?rs:embed=true&%2f%c3%81rea+do+Cliente%2f0181+-+KLABIN%2fBoletim+de+Medi%c3%a7%c3%a3o+-+0181&rs:Command=Render" width="100%" height="600px" style="border: none;"></iframe>





<script type="text/javascript">

  function generateQRLinks() {

  var table = document.getElementById("qrCodeTable");

  var qrcodelido2 = document.getElementById("SAMF_CLI_QRCODE").value;
  
 

  // VARIÁVEIS
  var primeiroQRCode = 0; 
  var ultimoQRCode = 1;
  var totalQRCodes = ultimoQRCode - primeiroQRCode;
  var obra = 'samarco';//PREENCHER COM O NOME DA OBRA DE ACORDO COM O NOME DA PASTA NO SISANDAIMES


  // Define quantos QR codes serão exibidos por linha
  var qrCodesPerRow = 3;
  
  // Calcula o número total de linhas necessárias
  var totalRows = Math.ceil(totalQRCodes / qrCodesPerRow);  
 
  
  for (var i = 1; i <= totalRows; i++) {
    
    var row = table.insertRow();
    
    for (var j = 0; j < qrCodesPerRow; j++) {
      // QR code atual
      var qrCodeNumber = (i - 1) * qrCodesPerRow + j + primeiroQRCode; // Adicionando primeiroQRCode
      
      // VALIDA O LIMITE
      if (qrCodeNumber <= ultimoQRCode) { // Alterado para ultimoQRCode
        
        var qrCell = row.insertCell();
        
        var qrImg = document.createElement("img");
        qrImg.src = "https://api.invertexto.com/v1/qrcode?token=7458|wAKHI63QccBbUzwbQB7W2K5YCkHDVYbz&text=http://45.164.4.254:85/SisAndaimes/SAMF/Qrcodeler/" + qrcodelido2 + "/&scale=5&error_level=0&foreground=%23006400&background=%23FFFFFF&download=false&base64=false";
        qrCell.appendChild(qrImg);
        
        // Cria uma quebra de linha
        qrCell.appendChild(document.createElement("br"));
        
        // Adiciona o nome do QR code abaixo da imagem
        var qrName = document.createElement("span");
        qrName.textContent = obra + "-" + qrCodeNumber;
        qrName.style.fontWeight = "bold";
        qrCell.appendChild(qrName);
      } else {
        // Se o número do QR code estiver fora do limite, cria uma célula vazia
        row.insertCell();
      }
    }
  }
  
  console.log("Primeiro QR Code: " + primeiroQRCode);
  console.log("Último QR Code: " + ultimoQRCode);
}

// Chama a função para gerar os links para os QR codes quando a página carregar
window.onload = generateQRLinks;


</script>








<script>
    async function generatePDF_old() {
        const { jsPDF } = window.jspdf;
        const content = document.getElementById('content');
        const rodape = document.getElementById('rodape');

        // Função para capturar imagem de um elemento
        async function captureImage(element) {
            const canvas = await html2canvas(element);
            return canvas.toDataURL('image/png');
        }

        var NOMEARQUIVO = document.getElementById('QRCODEARQUIVO').value;
        
        const contentImgData = await captureImage(content);
        const rodapeImgData = await captureImage(rodape);

        const pdf = new jsPDF('p', 'pt', 'a4');
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        // Adiciona imagem de conteúdo
        const contentImgProps = pdf.getImageProperties(contentImgData);
        const contentAspectRatio = contentImgProps.width / contentImgProps.height;
        const contentPdfHeight = pageWidth / contentAspectRatio;

        // Verifica se o conteúdo ocupa mais de uma página
        if (contentPdfHeight > pageHeight) {
            pdf.addImage(contentImgData, 'PNG', 0, 0, pageWidth, pageHeight);
            pdf.addPage();
            pdf.addImage(contentImgData, 'PNG', 0, -pageHeight, pageWidth, pageHeight * 2);
        } else {
            pdf.addImage(contentImgData, 'PNG', 0, 0, pageWidth, contentPdfHeight);
        }

        // Adiciona imagem de rodapé na última página, com altura máxima de 200px
        const rodapeMaxHeight = 200;
        const rodapeImgProps = pdf.getImageProperties(rodapeImgData);
        const rodapeAspectRatio = rodapeImgProps.width / rodapeImgProps.height;
        let rodapePdfHeight = pageWidth / rodapeAspectRatio;

        // Ajusta altura do rodapé se exceder 200px
        if (rodapePdfHeight > rodapeMaxHeight) {
            rodapePdfHeight = rodapeMaxHeight;
        }
        const rodapePdfWidth = rodapePdfHeight * rodapeAspectRatio;

        // Verifica se o rodapé cabe na última página
        if (contentPdfHeight + rodapePdfHeight <= pageHeight) {
            pdf.addImage(rodapeImgData, 'PNG', 0, pageHeight - rodapePdfHeight, pageWidth, rodapePdfHeight);
        } else {
            pdf.addPage();
            pdf.addImage(rodapeImgData, 'PNG', 0, pageHeight - rodapePdfHeight, pageWidth, rodapePdfHeight);
        }

        pdf.save('CONTROLE_MEDICAO_QRCODE_' + NOMEARQUIVO + '.pdf');
    }
</script>



<script>
    async function generatePDF() {
        const { jsPDF } = window.jspdf;
        const content = document.getElementById('content');
        const rodape = document.getElementById('rodape');

        // Função para capturar imagem de um elemento com resolução reduzida
        async function captureImage(element, scale = 0.5) {
            const canvas = await html2canvas(element, { scale });
            return canvas.toDataURL('image/jpeg', 0.75);  // Reduz a qualidade da imagem
        }

        var NOMEARQUIVO = document.getElementById('QRCODEARQUIVO').value;
        
        const contentImgData = await captureImage(content);
        const rodapeImgData = await captureImage(rodape);

        const pdf = new jsPDF('p', 'pt', 'a4');
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        // Adiciona imagem de conteúdo
        const contentImgProps = pdf.getImageProperties(contentImgData);
        const contentAspectRatio = contentImgProps.width / contentImgProps.height;
        const contentPdfHeight = pageWidth / contentAspectRatio;

        // Verifica se o conteúdo ocupa mais de uma página
        if (contentPdfHeight > pageHeight) {
            pdf.addImage(contentImgData, 'JPEG', 0, 0, pageWidth, pageHeight);
            pdf.addPage();
            pdf.addImage(contentImgData, 'JPEG', 0, -pageHeight, pageWidth, pageHeight * 2);
        } else {
            pdf.addImage(contentImgData, 'JPEG', 0, 0, pageWidth, contentPdfHeight);
        }

        // Adiciona imagem de rodapé na última página, com altura máxima de 200px
        const rodapeMaxHeight = 200;
        const rodapeImgProps = pdf.getImageProperties(rodapeImgData);
        const rodapeAspectRatio = rodapeImgProps.width / rodapeImgProps.height;
        let rodapePdfHeight = pageWidth / rodapeAspectRatio;

        // Ajusta altura do rodapé se exceder 200px
        if (rodapePdfHeight > rodapeMaxHeight) {
            rodapePdfHeight = rodapeMaxHeight;
        }
        const rodapePdfWidth = rodapePdfHeight * rodapeAspectRatio;

        // Verifica se o rodapé cabe na última página
        if (contentPdfHeight + rodapePdfHeight <= pageHeight) {
            pdf.addImage(rodapeImgData, 'JPEG', 0, pageHeight - rodapePdfHeight, pageWidth, rodapePdfHeight);
        } else {
            pdf.addPage();
            pdf.addImage(rodapeImgData, 'JPEG', 0, pageHeight - rodapePdfHeight, pageWidth, rodapePdfHeight);
        }

        pdf.save('CONTROLE_MEDICAO_QRCODE_' + NOMEARQUIVO + '.pdf');
    }
</script>





    <div class="row">
        <a style="margin-left = 30px;" onclick="generatePDF()" class="mt-5">    <button  type="button" class="btn btn-primary light px-3"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Gerar PDF Medição
        </button>
        </a>    
    </div>
    <input type="text">
    <!-- <button onclick="generatePDF()" class="mt-5">Gerar PDF</button> -->

    <div class="content-body bg-white" id="content" >
        
        <?php if (!empty($data9)): ?>            
            <?php foreach($data9 as $t): ?>
                <input type="hidden" id="QRCODEARQUIVO" value="<?php echo $t['SAMF_CLI_QRCODE']; ?>">
                <input type="hidden" id="SAMF_CLI_QRCODE" value="<?php echo $t['SAMF_CLI_QRCODE']; ?>">
                <!-- Começa a área de informações principais -->
                <div class="container-fluid bg-white">
                    <div class="row bg-white">
                     
                    <div style="border: solid 1px black;">
                    
                        <div class="col-5"></div>
                        <div class="col-5"></div>
                        <div class="col-2 text-right mt-3" id="qrcode"></div>

                        <!-- Início Detalhes do Andaime IMG -->
                        <div class="col-12 text-center" id="TOPQRCODE" style="margin-top: -120px;">
                            <img src="<?php echo site_url('/public/assets/images/logo2.png'); ?>" alt="image" class="logo-abbr">
                        </div>
                        <div class="col-12 mt-3  text-center">
                            <h2>BOLETIM DE MEDIÇÃO ANDAIMES / PARADA GERAL N°<small> <?php echo $t['IDMOVORIGEM']; ?></small></h2>
                        </div>     
                     
                    </div>


                        <script>
                        
                        // Função para gerar o QR Code
                        function gerarQRCode(texto) {
                            // Seleciona o elemento onde o QR Code será gerado
                            var qrcodeContainer = document.getElementById("qrcode");

                            // Limpa qualquer QR Code anterior (caso haja)
                            qrcodeContainer.innerHTML = "";

                            // Cria um novo QR Code
                            new QRCode(qrcodeContainer, {
                                text: texto,
                                width: 128,  // Largura do QR Code
                                height: 128, // Altura do QR Code
                                colorDark : "#000000", // Cor do QR Code
                                colorLight : "#ffffff", // Cor do fundo
                                correctLevel : QRCode.CorrectLevel.H // Nível de correção de erros
                            });
                        }

                        
                        var qrcodelido = document.getElementById("QRCODEARQUIVO").value;

                        // URL que você deseja transformar em QR Code
                        // var enderecoWeb = "https://www.google.com";

                         // URL base fornecida pelo PHP
                         var baseUrl = "<?php echo base_url('Qrcodeler/'); ?>";

                        // URL completa
                        var enderecoWeb = baseUrl + qrcodelido;

                        // Chama a função para gerar o QR Code
                        gerarQRCode(enderecoWeb);
                    </script>

                        <div class="col-lg-12 bg-white" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="">Descrição:</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 bg-white text-end" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="">QR CODE:</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 bg-white" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><h5> DATA MONTAGEM: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> LOCAL: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> TAG: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> ÁREA: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 bg-white" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><h5> OM: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> OP: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> ANDAIME ATERRADO:                                             
                                            <label class="radio-inline me-3">
                                                <input type="radio" name="optradio" id="aterradosim" <?php echo ($t['SAMF_VS_ATERRADO'] == 1) ? 'checked' : ''; ?>> Sim
                                            </label>
                                            <label class="radio-inline me-3">
                                                <input type="radio" name="optradio" id="aterradonao" <?php echo ($t['SAMF_VS_ATERRADO'] == 2) ? 'checked' : ''; ?>> Não
                                            </label>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 bg-white" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><h5> AMBIENTE: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> TIPO ANDAIME: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                        <div class="col"><h5> SOLICITANTE: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 bg-white" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><h5> SITUAÇÃO:                                             
                                            <label class="radio-inline me-3">
                                                <input type="radio" name="optradio" id="aterradosim" <?php echo ($t['SAMF_VS_ATERRADO'] == 1) ? 'checked' : ''; ?>> PRÉ
                                            </label>
                                            <label class="radio-inline me-3">
                                                <input type="radio" name="optradio" id="aterradonao" <?php echo ($t['SAMF_VS_ATERRADO'] == 2) ? 'checked' : ''; ?>> PG
                                            </label>                                        
                                        </div>
                                        <div class="col"><h5> ENCARREGADO: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 bg-white text-center" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="">METRAGEM DOS ANDAIMES</h1>
                                        </div>
                                            <div class="col text-center" style="border: solid 1px black;"><h5 class="mt-5"> Andaime m³: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                            <div class="col">
                                                <h5> Largura: <?php echo $t['SAMF_VS_PISO']; ?>
                                                <h5> Comprimento: <?php echo $t['SAMF_VS_PISO']; ?>
                                                <h5> Altura: <?php echo $t['SAMF_VS_PISO']; ?>
                                                <h5> Total: <?php echo $t['SAMF_VS_PISO']; ?>
                                            </div>
                                            <div class="col"><h5> SOLICITANTE: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                            <div class="col"><h5> SOLICITANTE: <?php echo $t['SAMF_VS_PISO']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 bg-white text-center" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="">DESCRIÇÃO DAS PEÇAS:</h1>
                                                       
                                            <!-- Fim Compartilhar -->
                                            <div class="product-detail-content">
                                                <div class="new-arrival-content pr">
                                                  


                                                     

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 container-fluid" style="border: solid 1px black;">
                            <h1 class="mt-5">FOTOS DO ANDAIME</h1>
                            
                            <div class="tab-slide-content new-arrival-product mb-4 row">                
                                <ul class="nav slide-item-list mt-3" role="tablist" class="row">
                                    <?php
                                        $count = 0; // Inicializa o contador

                                        foreach ($data7 as $img):
                                            if ($img['IDMOV'] == $t['IDMOVDESTINO'] && $img['FLUXO'] == '4'):
                                                if ($count >= 3) break; // Interrompe o loop após 4 registros

                                                $count++; // Incrementa o contador
                                        ?>
                                                <li role="presentation" class="col" style="flex: 0 0 33%;">
                                                    <a href="#<?php echo $img['NOMEARQUIVO'];?>" role="tab" data-bs-toggle="tab">
                                                        <img style="height: 300px !important;" class="img-fluid bg-image" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" width="200">
                                                    </a>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div> 


                        
                        <div class="col-lg-12 bg-white mt-3" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="">OBSERVAÇÕES</h1>
                                           
                                            <h4><?php echo $t['SAMF_CLI_BMOBS'];?></h4>
                                                 
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        
                        


                    </div><!-- Fim Detalhes do Andaime IMG -->
                </div><!-- Fim da Área de Informações (Separada do Menu e Header) -->
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center">
                <p>Não há informações para exibir.</p>
            </div>
        <?php endif; ?>

        
    </div><!-- FIM DO CONTENT -->
</div>



<div class="row text-center col-12 mt-5" id="rodape">
                            <div class="col-6">
                                <h2 class="mt-4">__________________________________</span></p></h2>
                                <h2 class="mt-4">RESPONSÁVEL KLABIN</span></p></h2>
                            </div>
                            <div class="col-6">
                                <h2 class="mt-4">__________________________________</span></p></h2>
                                <h2 class="mt-4">RESPONSÁVEL TOP ANDAIMES</span></p></h2>      
                            </div>
                        </div>





<div class="row text-center" id="rodape">
    <!-- <div class="col-6">
        <h2 class="mt-4">__________________________________</span></p></h2>
        <h2 class="mt-4">RESPONSÁVEL KLABIN</span></p></h2>
    </div>
    <div class="col-6">
        <h2 class="mt-4">__________________________________</span></p></h2>
        <h2 class="mt-4">RESPONSÁVEL TOP ANDAIMES</span></p></h2>      
    </div> -->.
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


