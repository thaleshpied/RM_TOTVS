<?php echo $this->extend('layouts/andaimecliente') ?>
        
<?php echo $this->section('content') ?>

<div class="content-body" style="margin-top:-70px;">




<div class="content-body" style="margin-top:-70px;">
    <?php if (!empty($resultado)): ?>
        <?php foreach($resultado as $t): ?>
            <div class="col-12 text-center mt-3">
				<img src="<?php echo base_url('public/assets/images/logo.png'); ?>" width="50" alt=""/>
                <h4 class="mb-0">O.S.: <?php echo $t['IDMOVORIGEM']; ?></h4></i> <br>   
            </div>
            <div class="col-12 text-center mt-3">	

		
			
	</div>
	
    <div class="container-fluid">
    <div class="row"><!-- INÍCIO DETALHES DO ANDAIME IMG -->
			<div class="col-lg-12">



				<div class="card">
					<div class="card-body">
						<div class="row">

							<!-- <div id="lightgallery" class="row">
								<?php foreach ($data7 as $img): ?>
									<?php if ($img['IDMOV'] == $t['IDMOVDESTINO'] && $img['FLUXO'] == '4'): ?> 
										<a class="col-lg-3 col-md-6 mb-4">
											<img src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" style="width:100%;"/>
										</a>
									<?php endif; ?>
								<?php endforeach; ?>
							</div> -->
							

							<div class="new-arrival-content pr text-center">
								<hr>
								<h4>
									Altura: <?php echo $t['ALTURA_PLANEJAMENTO']; ?> -
									Largura: <?php echo $t['LARGURA_PLANEJAMENTO']; ?>  - 
									Comprimento: <?php echo $t['COMPRIMENTO_PLANEJAMENTO']; ?>  - 
									Largura: <?php echo $t['METRAGEM_PLANEJAMENTO']; ?>m³ </p>
								</h4>		
								
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

								<h4>STATUS ATUAL:  <?php echo $status_text; ?></h4>
			
							</div>



							<div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 mt-3">
								<!-- Tab panes -->
								<div class="tab-content text-center">
									<?php 
									$first = true;
									foreach ($data7 as $img): ?>
										<?php if ($img['IDMOV'] == $t['IDMOVDESTINO'] && $img['FLUXO'] == '4'): ?> 
											<div role="tabpanel" class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>" id="IMG<?php echo $img['ID']; ?>">
												<img class="img-fluid" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="">
											</div>
											<?php $first = false; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>

								<div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
									<!-- Nav tabs -->
									<ul class="nav slide-item-list mt-3" role="tablist">
										<?php foreach ($data7 as $img): ?>
										<?php if ($img['IDMOV'] == $t['IDMOVDESTINO'] && $img['FLUXO'] == '4'): ?> 
											<li role="presentation" class="show">
												<a href="#IMG<?php echo $img['ID'];?>" role="tab" data-bs-toggle="tab">
													<img style="max-height: 200px;" class="img-fluid" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" width="50">
												</a>
											</li>
										<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
							<!--Tab slider End-->
							<div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                


									<!-- COMPARTILHAR -->
									<div class="post-input">
												<!-- <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>  -->
												<!-- <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#linkModal"><i class="fa fa-link m-0"></i> </a> -->
												<!-- Modal -->
												<!-- <div class="modal fade" id="linkModal">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Compartilhar</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal">
																</button>
															</div>
															<div class="modal-body">
																<a class="btn-social facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
																<a class="btn-social google-plus" href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
																<a class="btn-social linkedin" href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
																<a class="btn-social instagram" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
																<a class="btn-social twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
																<a class="btn-social youtube" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
																<a class="btn-social whatsapp" href="javascript:void(0)"><i class="fab fa-whatsapp"></i></a>
															</div>
														</div>
													</div>
												</div> -->
												<!-- <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#cameraModal"><i class="fa fa-camera m-0"></i> </a> -->
												<!-- Modal -->
												<!-- <div class="modal fade" id="cameraModal">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Upload images</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal">
																</button>
															</div>
															<div class="modal-body">
																<div class="input-group mb-3">
																	<span class="input-group-text">Upload</span>
																	<div class="form-file">
																		<input type="file" class="form-file-input form-control">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div> -->

                        
												<!-- <a href="javascript:void(0);" class="btn btn-primary light btn-rounded"><i class="fas fa-clone scale2 me-3"></i>Solicitar</a>       -->
												<!-- <a href="javascript:void(0);" class="btn btn-primary light btn-rounded" data-bs-toggle="modal" data-bs-target="#postModal"><i class="fas fa-clone scale2 me-3"></i>Ver Todos</a> -->
												<!-- Modal -->
												<!-- <div class="modal fade" id="postModal">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<i class="fas fa-clone scale2 me-3"></i>
																<h5 class="modal-title">Ver Todos Andaimes</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal">
																</button>
															</div>
															<div class="modal-body">
																<a class="btn btn-primary btn-rounded" href="javascript:void(0)">Ver Todos Andaimes</a>																		 
															</div>
														</div>
													</div>
												</div> -->
											</div><!-- FIM COMPARTILHAR -->
								<hr>
								<div class="product-detail-content">
									<!--Product details-->
									<div class="new-arrival-content pr">
										<h4>OS CLIENTE - <small> <?php echo $t['SAMF_CLI_OS']; ?></small></h4>
										
										<h4>
											Atividade
											<p>
											Tarefa: <?php echo $t['SAMF_CLI_TEXTO_BREVE']; ?> - 
											<p>
											Descrição: <?php echo $t['SAMF_CLI_DESC_OP']; ?>

                                        
										<!-- <span class="review-text">Observações</span>
					                    <p><span class="item"><?php echo $t['SAMF_OBSERVACAO']; ?></span> </p> -->
										
										<p>
										<span class="review-text mt-3">Tag de andaime:</span>&nbsp;&nbsp;
                    					<span class="badge badge-success light"><?php echo $t['SAMF_CLI_TAG']; ?></span>
                    
										
                    			<!-- <div class="col-xl-6 mt-4 col-sm-6">
										<div class="d-flex">
											<span><i class="far fa-clock scale5 text-primary mt-2 me-3"></i></span>
											<div>
												<h4 class="fs-18 font-w500 text-black">Atualizado em <small></small></h4>
											</div>
										</div>
									</div> -->

                  					<!-- <div class="col-xl-6 mt-4 col-sm-12">
										<div class="mb-3">
											<span class="fs-18 font-w500 text-black">Progresso 60%</span>
										</div>
										<div class="progress default-progress1">
											<div class="progress-bar progress-animated" style="width: 60%; height:14px;" role="progressbar">
												
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
			<!-- review -->
			<!-- <div class="modal fade" id="reviewModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Review</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal">
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="text-center mb-4">
									<img class="img-fluid rounded" width="78" src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" alt="DexignZone">
								</div>
								<div class="mb-3">
									<div class="rating-widget mb-4 text-center">
										<div class="rating-stars">
											<ul id="stars">
												<li class="star" title="Poor" data-value="1">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="Fair" data-value="2">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="Good" data-value="3">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="Excellent" data-value="4">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="WOW!!!" data-value="5">
													<i class="fa fa-star fa-fw"></i>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<textarea class="form-control" placeholder="Comment" rows="5"></textarea>
								</div>
								<button class="btn btn-success btn-block">RATE</button>
							</form>
						</div>
					</div>
				</div>
			</div> -->
		</div><!-- FIM DETALHES DO ANDAIME IMG -->

		<!-- INÍCIO DADOS DA LOCALIZAÇÃO -->
		<div class="col-12 card">
			<div class="card-body">
				<h4 class="card-title">Localização </h4>
			</div>
			<div class="card-body">
				<div class="input-group" id="mapa" style="margin-top:-35px;">									
					<?php echo $t['SAMF_CLI_LOCANDAIME2']; ?>
				</div>
			</div>
		</div>
		<!-- FIM DADOS DA LOCALIZAÇÃO -->


        <!-- INÍCIO TIMELINE ANDAIME -->
        <!-- <div class="col-12">
				<div class="card">
					<div class="card-header border-0 pb-0">
						<h4 class="card-title">Histórico do andaime</h4>
					</div>
					<div class="card-body">
						<div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height370 ps ps--active-y">
							<ul class="timeline">
								<li>
									<div class="timeline-badge primary"></div>
									<a class="timeline-panel text-muted" href="#">
										<span>[DATA E HORA]</span>
										<h6 class="mb-0">Solicitação <strong class="text-primary">[USUARIO DE CRIAÇÃO]</strong></h6>
									</a>
								</li>
                <li>
									<div class="timeline-badge primary"></div>
									<a class="timeline-panel text-muted" href="#">
										<span>[DATA E HORA]</span>
										<h6 class="mb-0">Solicitação <strong class="text-primary">[USUARIO DE CRIAÇÃO]</strong></h6>
									</a>
								</li>
								<li>
									<div class="timeline-badge dark">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>[DATA E HORA]</span>
										<h6 class="mb-0">Visita técnica<strong class="text-primary">[USUARIO DE CRIAÇÃO]</strong></h6>
									</a>
								</li>
                <li>
									<div class="timeline-badge dark">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>[DATA E HORA]</span>
										<h6 class="mb-0">Visita técnica<strong class="text-primary">[USUARIO DE CRIAÇÃO]</strong></h6>
									</a>
								</li>
                <li>
									<div class="timeline-badge warning">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>[DATA E HORA]</span>
										<h6 class="mb-0">Desenvolvimento do projeto<strong class="text-primary">[USUARIO DE CRIAÇÃO]</strong></h6>
									</a>
								</li>
                <li>
									<div class="timeline-badge warning">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>[DATA E HORA]</span>
										<h6 class="mb-0">Desenvolvimento do projeto<strong class="text-primary">[USUARIO DE CRIAÇÃO]</strong></h6>
									</a>
								</li>								
							</ul>
						<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 324px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div>
					</div>
				</div>
			</div> -->
			<!-- FIM TIMELINE ANDAIME -->




      <!-- <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Localização</h6>
          </div>
        </div>
      </div> -->



	  <!-- <div class="col-12">
        <div class="card">
          <div class="card-body">
		  	<img class="img-fluid" src="<?php echo base_url('public/assets/images/qr.png'); ?>" alt="">
          </div>
        </div>
      </div> -->





       
    </div>
</div><!-- FIM DA ÁREA DE INFORMAÇÕES (SEPARADA DO MENU E HEADER) -->










        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-center">
            <p>Não há informações para exibir. Dados de montagem em preenchimento! 
				Tente novamente mais tarde.
			</p>
        </div>
    <?php endif; ?>
</div>




<!-- Inclua a biblioteca html2pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
// Função para gerar os links para os QR codes
function generateQRLinks() {
  // Limpa a tabela antes de gerar os novos QR codes
  document.getElementById("qrCodeTable").innerHTML = "";
  
  // Referência à tabela onde os QR codes serão exibidos
  var table = document.getElementById("qrCodeTable");
  
  // Obtem a quantidade de QR codes desejada do campo de entrada
  var quantity = document.getElementById("quantity").value;
  
  // Define quantos QR codes serão exibidos por linha
  var qrCodesPerRow = 4;
  
  // Calcula o número total de linhas necessárias
  var totalRows = Math.ceil(quantity / qrCodesPerRow);
  
  // Loop para gerar os links sequenciais
  for (var i = 1; i <= totalRows; i++) {
    // Cria uma nova linha na tabela
    var row = table.insertRow();
    
    // Loop para inserir os QR codes na linha atual
    for (var j = 0; j < qrCodesPerRow; j++) {
      // Calcula o número de QR code atual
      var qrCodeNumber = (i - 1) * qrCodesPerRow + j + 1;
      
      // Verifica se o número do QR code está dentro do limite
      if (qrCodeNumber <= quantity) {
        // Cria uma célula para o QR code
        var qrCell = row.insertCell();
        
        // Cria uma imagem com o link para o QR code com o REF sequencial
        var qrImg = document.createElement("img");
        qrImg.src = "https://api.invertexto.com/v1/qrcode?token=7458|wAKHI63QccBbUzwbQB7W2K5YCkHDVYbz&text=http%3A%2F%2F45.164.4.254%3A8081%2Fsisandaime%2Fklabin%2Fexibir.php%3Fref%3D" + qrCodeNumber + "&scale=5&error_level=0&foreground=%23006400&background=%23FFFFFF&download=false&base64=false.jpeg";
        qrCell.appendChild(qrImg);
        
        // Cria uma quebra de linha
        qrCell.appendChild(document.createElement("br"));
        
        // Adiciona o nome do QR code abaixo da imagem
        var qrName = document.createElement("span");
        qrName.textContent = "klabin-" + qrCodeNumber;
        qrName.style.fontWeight = "bold";
        qrCell.appendChild(qrName);
      } else {
        // Se o número do QR code estiver fora do limite, cria uma célula vazia
        row.insertCell();
      }
    }
  }
}

// Função para gerar o PDF
function generatePDF() {
  // Opções para a geração do PDF
  var options = {
    filename: 'qrcodes.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait', permitirTaint: 'true' }
  };

  // Elemento HTML que você deseja converter em PDF
  var element = document.getElementById('qrCodeTable');

  // Função para criar o PDF usando html2pdf
  html2pdf()
    .from(element)
    .set(options)
    .save();
}
</script>

<?php echo $this->endSection() ?>
