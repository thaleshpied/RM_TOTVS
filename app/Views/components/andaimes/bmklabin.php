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
    <!-- <button onclick="generatePDF()" class="mt-5">Gerar PDF</button> -->

    <div class="content-body bg-white" id="content" >
        
        <?php if (!empty($data9)): ?>            
            <?php foreach($data9 as $t): ?>
                <input type="hidden" id="QRCODEARQUIVO" value="<?php echo $t['SAMF_CLI_QRCODE']; ?>">
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
                            <h2>CONTROLE DE MEDIÇÃO - TOP ANDAIMES <small> <?php echo $t['IDMOVORIGEM']; ?></small></h2>
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


                        <div class="col-lg-12 bg-white mt-3" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="">INFORMAÇÕES DO CONTROLE</h1>
                                                       
                                            <!-- Compartilhar -->
                                            <div class="post-input"></div>
                                            <!-- Fim Compartilhar -->
                                            <div class="product-detail-content">
                                                <div class="new-arrival-content pr">
                                                    <h2 class="mt-4"> &nbsp; &nbsp; &nbsp; ORDEM DE SERVIÇO CLIENTE: <?php echo $t['SAMF_CLI_OS']; ?></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; ORDEM DE SERVIÇO  TOP ANDAIMES:  <?php echo $t['IDMOVORIGEM']; ?></span></p></h2>
                                                    <!-- <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; RESPONSÁVEL MONTAGEM:  <?php echo $t['IDMOVORIGEM']; ?></span></p></h2> -->
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; CLIENTE:  KLABIN </span></p></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; TAG CLIENTE:  <?php echo $t['SAMF_CLI_TAG']; ?></span></p></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; ATIVIDADE:  <?php echo $t['SAMF_CLI_TEXTO_BREVE']; ?></span></p></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; DESCRIÇÃO OPERAÇÃO:  <?php echo $t['SAMF_CLI_TEXTO_BREVE']; ?></span></p></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; QR CODE:  <?php echo $t['SAMF_CLI_QRCODE']; ?></span></p></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; PISOS:  <?php echo $t['SAMF_VS_PISO']; ?></span></p></h2>
                                                    <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; CONTEXTO DE DEMANDA:  
                                                    
                                                    <?php if ($t['SAMF_CLI_PARADA'] == 1): ?> 
                                                        Parada </span></p></h2>
                                                    <?php endif; ?>

                                                    <?php if ($t['SAMF_CLI_PARADA'] == 2): ?> 
                                                        Pré Parada </span></p></h2>
                                                    <?php endif; ?>
                                                     <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; Área:  


                                                     <?php foreach($data9 as $e): ?>
                                                        <?php
                                                        $status = $e['SAMF_CLI_AREANV1'];
                                                        $status_text = '';

                                                        switch ($status) {
                                                            case '1':
                                                                $status_text = 'Área Comum';
                                                                break;
                                                            case '2':
                                                                $status_text = 'Processamento de Madeira';
                                                                break;
                                                            case '3':
                                                                $status_text = 'Fibras';
                                                                break;
                                                            case '4':
                                                                $status_text = 'Secagem';
                                                                break;
                                                            case '5':
                                                                $status_text = 'Máquinas de Papel';
                                                                break;
                                                                case '6':
                                                                    $status_text = 'Forno / Recuperação';
                                                                    break;
                                                                    case '7':
                                                                        $status_text = 'Meio Ambiente';
                                                                        break;
                                                                        case '8':
                                                                            $status_text = 'Utilidades';
                                                                            break;
                                                                            case '9':
                                                                                $status_text = 'Planta Química';
                                                                                break;
                                                                                case '10':
                                                                                    $status_text = 'Indiretos e Contigência';
                                                                                    break;
                                                            default:
                                                                $status_text = ''; // Opcional, para tratar valores inesperados
                                                                break;
                                                        }
                                                        ?>

                                                       <?php echo $status_text; ?>
                                                    <?php endforeach; ?> 


                    </span></p></h2>
                                                     <p><h2 class="mt-4"> &nbsp; &nbsp; &nbsp; Subárea:  <?php echo $t['SAMF_CLI_AREANV2']; ?></span></p></h2>


                                                    
                                                

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 bg-white mt-3" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="">DIMENSÕES DO ANDAIME</h1>
                                    <div class="row text-center">
                                      
                                            <div class="col">
                                            <h2> PISO <p>
                                                        <?php echo $t['SAMF_VS_PISO']; ?>
                                                        </h2>
                                                </div>
                                                <div class="col">
                                                        <h2> ALTURA <p>
                                                        <?php echo $t['ALTURA_PLANEJAMENTO']; ?>
                                                        </h2>
                                                </div>
                                                <div class="col">
                                                <h2> LARGURA <p>
                                                        <?php echo $t['LARGURA_PLANEJAMENTO']; ?>
                                                        </h2>
                                                </div>
                                                <div class="col">
                                                <h2> COMPRIMENTO <p>
                                                        <?php echo $t['COMPRIMENTO_PLANEJAMENTO']; ?>
                                                        </h2>
                                                </div>
                                                <div class="col">
                                                <h2> METRAGEM (m³)<p>
                                                        <?php echo $t['METRAGEM_PLANEJAMENTO']; ?>
                                                        </h2>
                                                </div>
                                                </div>
                                            <div class="table-responsive">                                                
                                                <!-- <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th style="font-size: 23px;">Piso</th>
                                                            <th style="font-size: 23px;">Altura</th>
                                                            <th style="font-size: 23px;">Largura</th>
                                                            <th style="font-size: 23px;">Comprimento.</th>
                                                            <th style="font-size: 23px;">Total m³</th>                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input style="font-size: 40px; color: black; height: 80px; width: 160px;" value="<?php echo $t['SAMF_VS_PISO']; ?>" id="metragemPL" type="text" class="form-control" disabled ></td>
                                                            <td><input style="font-size: 40px; color: black; height: 80px; width: 160px;" value="<?php echo $t['ALTURA_PLANEJAMENTO']; ?>" type="text" class="form-control"  id="alturamontagemPL" onchange="updateDimAndaimePL(<?php echo $t['IDMOVPLANEJAMENTO']; ?>)"></td>
                                                            <td><input style="font-size: 40px; color: black; height: 80px; width: 160px;" value="<?php echo $t['LARGURA_PLANEJAMENTO']; ?>" type="text" class="form-control"  id="larguramontagemPL" onchange="updateDimAndaimePL(<?php echo $t['IDMOVPLANEJAMENTO']; ?>)"></td>
                                                            <td><input style="font-size: 40px; color: black; height: 80px; width: 160px;" value="<?php echo $t['COMPRIMENTO_PLANEJAMENTO']; ?>" type="text" class="form-control"  id="comprimentomontagePL" onchange="updateDimAndaimePL(<?php echo $t['IDMOVPLANEJAMENTO']; ?>)"></td>
                                                            <td><input style="font-size: 40px; color: black; height: 80px; width: 160px;" value="<?php echo $t['METRAGEM_PLANEJAMENTO']; ?>" id="metragemPL" type="text" class="form-control" disabled ></td>
                    
                                                        </tr>
                                                    </tbody>
                                                </table> -->
                                            </div>         
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 container-fluid mt-3" style="border: solid 1px black;">
                            <h1 class="mt-5">FOTOS DO ANDAIME</h1>
                            <?php
                            $status = $t['STATUS_PLANEJAMENTO'];
                            $status_text = '';

                            switch ($status) {
                                case 'A':
                                    $status_text = 'Iniciar';
                                    break;
                                case 'G':
                                    $status_text = 'Em montagem';
                                    break;
                                case 'F':
                                    $status_text = 'Montado';
                                    break;
                                case 'C':
                                    $status_text = 'CANCELADO';
                                    break;
                                default:
                                    $status_text = 'Desconhecido'; // Para qualquer status não esperado
                                    break;
                            }
                            ?>

                            <h5>STATUS ATUAL:  <?php echo $status_text; ?></h5>

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


