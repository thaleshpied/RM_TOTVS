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
    async function generatePDF() {
        const { jsPDF } = window.jspdf;
        const content = document.getElementById('content');
        const rodape = document.getElementById('rodape');

        // Função para capturar imagem de um elemento com resolução reduzida
        async function captureImage(element, scale = 1.0) {
            const canvas = await html2canvas(element, { scale });
            return canvas.toDataURL('image/jpeg');  // O TRECHO A SEGUIR AUMENTA OU REDUZ A QUALIDADE DO PDF ('image/jpeg', 0.85) CHOOORA
        }

        var NOMEARQUIVO = document.getElementById('QRCODEARQUIVO').value;
        var NOMEOBRA = document.getElementById('NOMEOBRA').value;
        
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

        // pdf.save('CONTROLE_RDO_' + NOMEARQUIVO + NOMEARQUIVO + '.pdf');
        pdf.save('['+ NOMEOBRA + ']' + ' - CONTROLE RDO ' + NOMEARQUIVO + '.pdf');
        
        // setTimeout(function() {
        //     window.close();
        // }, 1000);
        // window.close();

    }
    
    // DESCOMENTAR A LINHA ABAIXO PARA GERAR O PDF AUTOMATICAMENTE AO ABRIR A PÁGINA
    // document.addEventListener('DOMContentLoaded', generatePDF);
     
</script>





    <div class="row">
        <a style="margin-left = 30px;" onclick="generatePDF()" class="mt-5">    <button  type="button" class="btn btn-primary light px-3"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Gerar PDF
        </button>
        </a>    
    </div>
    <!-- <button onclick="generatePDF()" class="mt-5">Gerar PDF</button> -->

    <div class="content-body bg-white" id="content" >
        
        <?php if (!empty($data9)): ?>            
            
                <input type="hidden" id="QRCODEARQUIVO" value="<?php echo $data9->NUMEROMOV; ?>">
                <input type="hidden" id="NOMEOBRA" value="<?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?>">
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
                            <h2>RDO - RELATÓRIO DIÁRIO DE OBRA  <small>  </small></h2>
                        </div>     
                     
                    </div>


                        


                        <div class="col-lg-12 bg-white mt-3" style="border: solid 1px black;">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="">INFORMAÇÕES DO RDO</h1>
                                                       
                                            <!-- Compartilhar -->
                                            <div class="post-input"></div>
                                            <!-- Fim Compartilhar -->
                                            <div class="product-detail-content">
                                                <div class="new-arrival-content pr">
                                                    <h4 class="mt-4"> &nbsp; &nbsp; &nbsp; ORDEM DE SERVIÇO TOP: <?php echo $data9->NUMEROMOV; ?> </h4>
                                                    <p><h4 class="mt-4"> &nbsp; &nbsp; &nbsp; RESPONSÁVEL CONTRATADA: <?php echo $data9->RDO_RESPONSAVEL_CLI2; ?> </span></p></h4>
                                                    <p><h4 class="mt-4"> &nbsp; &nbsp; &nbsp; RESPONSÁVEL CONTRATANTE: <?php echo $data9->RESPONSAVEL_TOP; ?></span></p></h4>
                                                    <p><h4 class="mt-4"> &nbsp; &nbsp; &nbsp; DATA REFERÊNCIA: <?php echo $data9->DATA_REFERENCIA; ?> </span></p></h4>  
                                                    <p><h4 class="mt-4"> &nbsp; &nbsp; &nbsp; ÁREA: <?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?> </span></p></h4>                                  
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
                                            <h1 class="">CONDIÇÕES</h1>
                                        </div>
                                        <div class="accordion-item">
											<!-- <div class="accordion-header rounded-lg text-center collapsed" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne"   aria-expanded="false" role="button">
												<span class="accordion-header-icon"></span>
												<span class="accordion-header-text text-right">Atividades Executadas</span>
												<span class="accordion-header-indicator"></span>                                                
											</div> -->
                                            <h3 class="mt-3">Atividades executadas</h3>
											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
												<div class="accordion-body-text">
													<div class="row">

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked10 = ($data9->SAMF_VS_MONTAGEM == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_MONTAGEM" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked10; ?>>
																<label class="form-check-label" for="customCheckBox6"><h5>Montagem de Andaimes</h5> </label>
															</div>
														</div>
																	
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked11 = ($data9->SAMF_VS_DESMONTAGEM == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_DESMONTAGEM" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked11; ?>>
																<label class="form-check-label" for="customCheckBox6"> <h5>Desmontagem de Andaimes</h5></label>
															</div>
														</div>

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked12 = ($data9->SAMF_VS_MOBILIZACAO == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_MOBILIZACAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked12; ?>>
																<label class="form-check-label" for="customCheckBox6"> <h5>Mob. E Desmobilização de Material</h5></label>
															</div>
														</div>

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked13 = ($data9->SAMF_VS_ADEQUACAO == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_ADEQUACAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked13; ?>>
																<label class="form-check-label" for="customCheckBox6"> <h5>Adequação</h5></label>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>

                                        <div class="accordion-item">
											<!-- <div class="accordion-header rounded-lg text-center collapsed" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="false">
												<span class="accordion-header-text">Impactos na Tarefa</span>
												<span class="accordion-header-indicator"></span>
											</div> -->
                                            <h3 class="mt-3">Impactos na tarefa</h3>
											<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
												<div class="accordion-body-text">
													<div class="row">
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked1 = ($data9->SAMF_VS_INTERFER1 == 1) ? 'checked' : '';?>
																<input id="impactos1" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked1; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Interferência c/ Outra Atividade  </h5></label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked2 = ($data9->SAMF_VS_INTERFER2 == 1) ? 'checked' : '';?>
																<input id="impactos2" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked2; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Operação Não Liberou Atividade </h5></label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked3 = ($data9->SAMF_VS_INTERFER3 == 1) ? 'checked' : '';?>
																<input id="impactos3" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked3; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Transferência para outra Atividade  </h5></label>
															</div>
														</div>

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked4 = ($data9->SAMF_VS_INTERFER4 == 1) ? 'checked' : '';?>
																<input id="impactos4" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked4; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Chuva </h5></label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked5 = ($data9->SAMF_VS_INTERFER5 == 1) ? 'checked' : '';?>
																<input id="impactos5" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked5; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Vento Forte </h5></label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked6 = ($data9->SAMF_VS_INTERFER6 == 1) ? 'checked' : '';?>
																<input id="impactos6" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked6; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Local Inseguro P/ Executar Ativ </h5></label>
															</div>
														</div>

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked7 = ($data9->SAMF_VS_INTERFER7 == 1) ? 'checked' : '';?>
																<input id="impactos7" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked7; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Falta do Responsável Bloqueio </h5></label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked8 = ($data9->SAMF_VS_INTERFER8 == 1) ? 'checked' : '';?>
																<input id="impactos8" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked8; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Falta de Energia </h5></label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked9 = ($data9->SAMF_VS_INTERFER9 == 1) ? 'checked' : '';?>
																<input id="impactos9" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked9; ?>>
																<label class="form-check-label" for="customCheckBox9"><h4>Falta de Equipamento Solicitado P/ Apoio </h5></label>
															</div>
														</div>
													</div>
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
                                            <h1 class="">ATUAÇÃO HOMEM HORA</h1>
                                           
                                            
                                            <div class="card-body">
							<div class="table-responsive">
								<table id="dynamicTable" class="table table-responsive-md">
									<thead>
										<tr>
											<th><strong>Matrícula</strong></th>
											<th><strong>Nome</strong></th>
											<th><strong>Função</strong></th>
											<th><strong>Entrada</strong></th>
											<th><strong>Saída</strong></th>
											<!-- <th><strong>Tempo de trabalho</strong></th> -->
											<th><strong>Assinatura</strong></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($data5 as $f): ?>
										<tr>
											<td class="h5"><?php echo $f['CHAPA']; ?></td>
											<td class="h5"><?php echo $f['FUNCIONARIO']; ?></td>
											<td class="h5"><?php echo $f['FUNCAO']; ?></td>
											<td class="h5">											
												<div class="input-group"> 
													<!-- <input type="text" class="form-control" id="horaentrada" onchange="calculateWorkingTime()" value="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span> -->
													<input type="text" class="form-control" id="horaentrada" value="<?php echo $f['RDO_FUNC_ENTRADA']; ?>">

												</div>
											</td>
											<td class="h5">											
												<div class="input-group">
													<input type="text" class="form-control" id="horasaida" value="<?php echo $f['RDO_FUNC_SAIDA']; ?>">
												</div>
											</td>
											<!-- <td>											
												<div class="input-group">
													<input type="" class="form-control bg-light" id="QUANTIDADENORMAL" value="<?php echo $f['QUANTIDADE']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
												</div>
											</td> -->
											<!-- <td>
												<div class="d-flex">
													<a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
												</div>
											</td> -->
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<!-- <button id="addRow" class="btn btn-primary">Adicionar Funcionário</button> -->
								<!-- <div class="row">
									<div class="col-6">
										<div class="card-header">
											<h4 class="">Houve atuação em hora extra? </h4>
										</div>
										<div class="card-body">
											<div class="basic-form">
												<form>
													<div class="mb-3 mb-0">
														<label class="radio-inline me-3"><input type="radio" name="optradio" id="horaextrasim"> Sim</label>
														<label class="radio-inline me-3"><input type="radio" checked name="optradio" id="horaextranao"> Não</label>
													</div>
												</form>
											</div>
										</div>
									</div>			
								</div> -->
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
                                            <!-- <h1 class="">OBSERVAÇÕES</h1> -->
                                           
                                                <div class="">                                                    
                                                    <div class="">
                                                        <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll ps ps--active-y">
                                                            <ul class="timeline">								
                                                                <?php foreach ($cmt as $cmtitem): ?>
                                                                    <?php if ($cmtitem['IDMOV'] == $data9->IDMOV): ?> 
                                                                        <li>
                                                                            <!-- <div class="timeline-badge primary"></div> -->
                                                                            <!-- <a class="timeline-panel text-muted" href="#"> -->
                                                                                <!-- <span></span> -->
                                                                                <!-- <h6 class="mb-0">Usuário: <strong class="text-primary"><?php echo $cmtitem['RECCREATEDBY'];?></strong></h6> -->
                                                                                <h6 class="mb-0"><br>Observação: <?php echo $cmtitem['COMENTARIO'];?></h6>
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <!-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 150px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div> -->
                                                    </div>
                                                </div>
                                           
                                                 
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        
                        


                    </div><!-- Fim Detalhes do Andaime IMG -->
                </div><!-- Fim da Área de Informações (Separada do Menu e Header) -->
            
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
        <h2 class="mt-4">RESPONSÁVEL <?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?></span></p></h2>
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


