<?php echo $this->extend('layouts/default') ?>
<?php echo $this->section('content') ?>

<div class="content-body">
	
	<!-- MODAL PARA IMPORTAR EXCEL -->
<div class="modal fade" id="modalexcel">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Importar Arquivo</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal">
				</button>
			</div>
			<div class="modal-body">
				<h2>Upload de Planilha Excel</h2>
				<form action="<?php echo base_url('import'); ?>" method="post" enctype="multipart/form-data">
					<label for="excelFile">Selecione o arquivo Excel:</label><br>
					<input type="file" id="excelFile" name="file" accept=".xlsx, .csv"><br><br>
					<input type="submit" value="Enviar">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary">Transferir</button>
			</div>
		</div>
	</div>
</div>

<!-- INÍCIO DO MENU DE PESQUISA -->

<div class="accordion-item b-none">
					<div id="collapsesearch" class="collapse accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-search">
						<div class="accordion-body-text">
							<div class="col-12 mb-3">
								<li class="nav-item d-flex align-items-center">
									<div class="input-group search-area">
										<input id="conteudopesquisar" type="text" class="form-control border-light" placeholder="Pesquisar solicitações...">
										<span class="input-group-text border-light" id="btnPesquisar"><a href="javascript:void(0)"><i class="flaticon-381-search-2" onclick="pesquisar()"></i></a></span>
									</div>
								</li>
							</div>
							<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
							<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
							<table id="listarpesquisa" class="display" style="width:100%">
									<thead>
										<tr>
									<!-- <th>REF</th>
											<th>ORDEM</th> -->
											<!-- <th>O.S</th>
											<th>BOLETA</th>
											<th>MONT</th>
											
											<th>AREA</th>
											<th>LOCAL</th>
											<th>TIPO</th>
											<th>TAG</th>
											
											<th>ESCOPO</th>
											<th>PREV</th>
											<th>COND</th>
											<th>DESM</th> -->
											
										</tr>
									</thead>
									
									
								</table>
							</table>
						</div>
					</div>
					
					<script type="text/javascript" language="javascript">
					$(document).ready(function() {
						$('#listarpesquisa').DataTable({			
							"processing": true,
							"serverSide": true,
							"ajax": {
								"url": "pequisa",
								"type": "POST"
							}
						});
					} );
					</script>

				<!-- FIM DO MENU DE PESQUISA -->

	<div class="container-fluid" id="pagesolicitacao">
			<div class="row">
							
							

							</div>
					</div>

					<div class="container-fluid mb-2 bg-white" id="menusc">

						<!-- ABAIXO ICONES DO MENU -->
						<i class="flaticon-381-search-2"  aria-expanded="true"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"></i>
						<!-- <i class="fa fa-plus"   aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"></i>
						<i type="button" class="fa fa-file-excel-o"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel"></i> -->

					</div>

			<!-- <div class="row">
				<div class="col-12">           
					<button type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" id="toastr-success-bottom-right"><i class="fa fa-reply" data-bs-toggle="modal" data-bs-target="#exampleModalpopover"></i></button>                                  
					<button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" id="toasttoastr-danger-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"></i></button>
				</div>
			</div>  -->


			<!-- Modal -->
			<!-- <div class="modal fade" id="exampleModalpopover">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Novo RDO <p> <small> Selecione a data correspondente </small></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal">
							</button>
						</div>
						<div class="modal-body">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="mb-4">
											<h4 class="card-title">Competência 2</h4>
										</div>
										
										<input id="datepickerold" name="datepicker" width="100%" />
										<script>
											$('#datepicker').datepicker({
												uiLibrary: 'bootstrap5'
											});
										</script>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" id="toastr-success-bottom-right"><i class="fa fa-reply"></i></button>                                  
							<button type="button" data-bs-dismiss="modal" class="btn btn-danger  me-2 mb-2 btn-xxs" id="toasttoastr-danger-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>
			</div> -->

	
	<div class="card-body"><!-- INICIO MENU SUPERIOR DAS SOLICITAÇÕES --> 
		
	
		<div class="col-xl-12"><!-- INICIO MENU PARA INSERIR SOLICITAÇÃO -->
											
		
			<div class="container-fluid" id="accordion-two">
			
			<h4 class="card-title" aria-controls="collapse2One">
					
					<!-- <a class="has-arrow " href="javascript:void()" aria-expanded="true"  aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One">
					<i class="fa fa-arrow-right" aria-hidden="true"></i> Solicitação de Andaime
					</a> -->


				</h4> 					
				<div class="accordion-item b-none">
					<div id="collapse2One" class="collapse accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
						<div class="accordion-body-text">
						<div class="">
					
                    </div>
					</div>

                    <!-- resources/views/components/table/rotina_rb_solicitacao.blade.php -->
            
                    <!-- <div class="card-body">
                        <h5>Usuário: [VAR_NOMEUSUARIO] - Centro de custo: [VAR_CENTRO_DE_CUSTO]</h5>
					</div>   -->

                    <div class="row">   

						<div class="col-xl-3 col-xxl-4 col-md-6">
							<div class="card-body">
								<h4 class="card-title">OS cliente <code2>*</code2></h4>
								<input id="SAMF_CLI_OS" width="100%" class="form-control" placehoolder = "0001" type="number"/>
							</div>
                        </div>	
						
						<div class="col-xl-3 col-xxl-4 col-md-6">
							<div class="card-body">
								<h4 class="card-title">QR CODE</h4>
								<input id="SAMF_CLI_QRCODE" width="100%" class="form-control" placehoolder = "0001" type="number"/>
							</div>
                        </div>		

						<div class="col-xl-3 col-xxl-4 col-md-6">
							<div class="card-body">
								<h4 class="card-title">Previsão início <code2>*</code2></h4>
								<input id="mdate" name="datepicker" width="100%" class="form-control" placehoolder = "TOP 2024" />
							</div>
                        </div>

						<div class="col-xl-3 col-xxl-4 col-md-6">
							<div class="card-body">
								<h4 class="card-title">Previsão fim <code2>*</code2></h4>
								<input id="mdate2" name="datepicker2" width="100%" class="form-control" placehoolder = "TOP 2024" />
							</div>
                        </div>
					
						

						<div class="col-xl-3 col-xxl-4 col-md-6">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Técnico TOP <code2>*</code2></h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>  
								<select class="form-select border-dark" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">					
									<option value="HARISON">HARISON</option> 								
								</select>
							</div>
                        </div>	

						<div class="col-xl-3 col-xxl-4 col-md-6">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Solicitante <code2>*</code2></h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select border-dark" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">									
									<option value="KLABIN">KLABIN</option> 									
								</select>
							</div>
                        </div>	

						<!-- <div class="col-xl-12 col-xxl-12 col-md-4">                           
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Descrição das atividades</h4>
								</div>
								<div class="mb-3">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
							</div>                           
                        </div> -->

						<div class="card-header">
						
							<div class="row">
								<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo" style = "font-size: 1em;">Incluir</button>
							<div class="col-12">
								
						</div>				
                       
					</div>
                        
                    </div>
                    <!-- <div class="row">
                        <div class="container">
                            <div class="col-12">  
                                    <button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="toastr-success-bottom-right">Incluir</button>
                            </div>
                        </div>
                    </div> -->
                </div>




				



						
						</div>
					</div>
				</div>
			</div>				
		</div><!-- FIM MENU PARA INSERIR SOLICITAÇÃO -->












	<div class="card-body">
	<div class="col-xl-12 col-xxl-12">


	<!-- INICIO DE CADA SOLICITAÇÃO INSERIDA --> 

	<?php 
foreach($resultado as $p): 
    if ($p['VALIDACAO'] == 1): 
?>
    <div class="row" style="
    margin-top: -117px;">
    <div class="col-lg-12">
		<div class="row">
				<div class="col-lg-12">
					<div class="card" styler="margin-bottom: 2.875rem; background-color: #fff; transition: all .5s ease-in-out; position: relative; border-radius: 1.25rem; box-shadow: 0rem 0.3125rem 0.3125rem 0rem rgba(82, 63, 105, 0.05); height: calc(100% - 30px);">
							<div class="col-12" style="    margin-left: 20px;    margin-top: 20px;    border-top: 1px solid green;    padding-top: 10px;">           
								
							<?php if ($p['STATUS'] == 'C') { ?> 
							
								<h2><code>Visita Cancelada</code></h2>
							
							<?php } else { ?>
								<button id="enviarvisita<?php echo $p['IDMOV']; ?>" value="<?php echo $p['IDMOV']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="enviarvisita(<?php echo $p['IDMOV']; ?>)"><i class="fa fa-reply"></i> Enviar Visita</button>                                  
							<?php } ?>										
											
								<!-- <button type="button" class="btn btn-warning  me-2 mb-2 btn-xxs" id="toasttoastr-warning-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"> Editar</i></button>
								<button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" id="toasttoastr-danger-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"> Cancelar</i></button> -->
							</div>
						
							<div class="card-header">
								<div class="product-detail-content"><!-- INÍCIO DAS NOVAS INFORMAÇÕES -->
									<div class="new-arrival-content row">
										<div class="col-xl-6 col-xxl-12 col-md-6">
											<h4>CLIENTE</h4>
											<span class="item">Ordem: </span><a href="<?php echo base_url('pesquisar/') ?><?php echo $p['SAMF_CLI_OS']; ?>"><?php echo $p['SAMF_CLI_OS']; ?></a><p>
											<span class="item">Nome da tarefa </span> - <?php echo $p['SAMF_CLI_TEXTO_BREVE']; ?> <p>
											<span class="item">Descrição da ordem </span> - <?php echo $p['SAMF_CLI_DESC_OP']; ?> <p>
											<span class="item">Observações </span> - <?php echo $p['SAMF_OBSERVACAO']; ?> <p>
											<span class="item">TAG </span> - <?php echo $p['SAMF_CLI_TAG']; ?> <p>
											<span class="item">Predecessora </span> - <?php echo $p['SAMF_PREDECESSORA']; ?> <p>
											<span class="item">Previsão de início </span> - <?php echo $p['DATA_INICIO']; ?> <p>
											<span class="item">Previsão fim </span> - <?php echo $p['DATA_FIM']; ?> <p>
											<span class="item">Previsão de tempo </span> - <?php echo $p['SAMF_PREV_VISITANOVO']; ?> <p>
										</div>

										<div class="col-xl-6 col-xxl-12 col-md-6">
											<h4>TOP ANDAIMES</h4>
											<span class="item">Ordem: </span> - <code2><?php echo $p['IDMOV']; ?></code2><p>
											<span class="item">Centro de Custo </span> - <?php echo $p['CODCCUSTO']; ?> <p>
											<span class="item">Data de entrada </span> - <?php echo $p['DATAEMISSAO']; ?><p>

											<h4 class="card-title">Encarregado Visita</h4>
											
											
											<?php if ($p['STATUS'] == 'C') { ?> 
							
												
											
											<?php } else { ?>
												<select class="form-select border-dark" name = "encarregado" id = "encarregado<?php echo $p['IDMOV']; ?>"  aria-label="Default select example">
												<!-- <option value="6"> JOÃO LEANDRO </option>
												<option value="8"> JEAN.CARLOS </option>-->
												<option value=""></option>
												<?php 
												if (!empty($data9)): 
													foreach($data9 as $e): 
												?>	
											
														<option value="<?php echo $e['ID']; ?>"><?php echo $e['CODUSUARIO']; ?></option>
												<?php 
													endforeach; 
												endif; 
												?>

												</select>
											<?php } ?>	
										</div>

										<div class="col-xl-12 col-xxl-12 col-md-12">
											<h4 class="mt-3">Observações</h4>
											<span class="item">Observações feitas pelo time TOP</span> 
										</div>

										<div class="col-xl-6 col-xxl-12 col-md-6">
											<h4 class="mt-3">TAGS&nbsp;&nbsp;
											<span class="badge badge-success light"><?php echo $p['SAMF_CLI_TAG']; ?></span>
										</div>

										<div class="col-xl-6 col-xxl-12 col-md-6">
											<div class="d-flex">
												<span><i class="far fa-clock scale5 text-primary mt-2 me-3"></i></span>
												<div>
													<h4 class="fs-18 font-w500 text-black">Atualizado em <small><?php echo $p['RECMODIFIEDON']; ?></small></h4>
												</div>
											</div>
										</div>
									</div>		
								</div><!-- FIM DAS NOVAS INFORMAÇÕES --> 
							</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-responsive-md">


								<!-- <div class="col-xl-6 col-lg-12">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Carregar foto</h4>
										</div>
										<div class="card-body">
											<div class="basic-form custom_file_input">
												<form action="#">
													<div class="input-group mb-3">
														<button class="btn btn-primary btn-sm" type="button">Enviar</button>
														<div class="form-file">
															<input type="file" class="form-file-input form-control">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div> -->

									<!-- <thead>
										<tr>
											<th style="width:50px;">
												<div class="form-check custom-checkbox checkbox-success check-lg me-3">
													<input type="checkbox" class="form-check-input" id="checkAll" required="">
													<label class="form-check-label" for="checkAll"></label>
												</div>
											</th>
											<th><strong>Id Produto</strong></th>
											<th><strong>Nome</strong></th>
											<th><strong>Quantidade</strong></th>
											<th><strong>Observação</strong></th>
											<th><strong>Status</strong></th>
											<th><strong></strong></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="form-check custom-checkbox checkbox-success check-lg me-3">
													<input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
													<label class="form-check-label" for="customCheckBox2"></label>
												</div>
											</td>
											<td><strong>02.00058.50222</strong></td>
											<td><div class="d-flex align-items-center"><img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-lg me-2" width="24" alt=""/> <span class="w-space-no">Luva X</span></div></td>
											<td>Luva	</td>
											<td>Detalhes do ítem</td>
											<td><div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> Disponível</div></td>
											<td>
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr> -->
									</tbody> 
								</table>
							</div>
						</div>   
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    elseif ($p['VALIDACAO'] == 2): 
?>
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
					<div class="row" styler="margin-left:20px;">
						<div class="col-12">         
							<button style="margin-left: 10px;" type="button" class="btn btn-warning  me-2 mb-2 btn-xxs" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapse2One<?php echo $p['IDMOVDESTINO']; ?>"   aria-expanded="true"  role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
						</div>
					</div> 

					<!-- MODAL COM O MENU PARA TRANSFERIR DE ENCARREGADO -->
					<div class="modal fade" id="exampleModalCenter">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Transferir Visita</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<p>Selecione o encarregado</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary">Transferir</button>
								</div>
							</div>
						</div>
					</div>

					<!-- MODAL COM O MENU PARA CANCELAR A VISITA -->
					<div class="modal fade" id="modalcancelarvisita">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Cancelar Visita</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<p>Mensagem indicando que o cancelamento permanente. </p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary">Cancelar Visita</button>
								</div>
							</div>
						</div>
					</div>

					

					
                    <div class="card-header">
                        <h5>Solicitação TOP: <small><?php echo $p['IDMOVDESTINO']; ?>  </small></h5>
                        <h5>OS Cliente TOP: <small><?php echo $p['SAMF_CLI_OS']; ?>  </small></h5>
                        <h5>Previsão de visita: <small><?php echo $p['DATA_INICIO']; ?>  </small></h5>
                        <h5>Tarefa: <small><?php echo $p['SAMF_CLI_TEXTO_BREVE']; ?>  </small></h5>
                        <h5>Descrição: <small><?php echo $p['SAMF_CLI_DESC_OP']; ?>  </small></h5>
                    </div>


					<div class="col-12"><!-- AQUI INÍCIO DE CADA VISITA -->
					<div class="card">
						<div class="card-body">
							<div class="accordion accordion-start-indicator" id="accordion-two">
								<div class="accordion-item">
								<div class="accordion-header  rounded-lg collapsed d-none">
									<span class="accordion-header-text">Preencher informações</span>
									<span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2One<?php echo $p['IDMOVDESTINO']; ?>" class="accordion__body collapse show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
								
								
								<div class="accordion accordion-primary" id="accordion-one">
									<!-- ACCORDION DOS DADOS DE ENTRADA -->
									<div class="accordion-item">
										<button id="enviarvisita2<?php echo $p['IDMOVDESTINO']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="postprojeto(<?php echo $p['IDMOVDESTINO']; ?>)"><i class="fa fa-reply"></i></button>                                  
										<!-- <button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalcancelarvisita"><i class="fa fa-times" aria-hidden="true"></i></button>	 -->
										<button type="button" class="btn btn-info  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fas fa-user-check"></i></button>								
										<div class="accordion-header  rounded-lg text-center collapsed" id="hd1<?php echo $p['IDMOVDESTINO']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd1<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapsehd1<?php echo $p['IDMOVDESTINO']; ?>"   aria-expanded="false" role="button">
											<span class="accordion-header-icon"></span>
											<span class="accordion-header-text">Dados de Entrada</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd1<?php echo $p['IDMOVDESTINO']; ?>" class="collapse show" aria-labelledby="hd1<?php echo $p['IDMOVDESTINO']; ?>" data-bs-parent="#accordion-one<?php echo $p['IDMOVDESTINO']; ?>">
											<div class="accordion-body-text">
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada1<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada1<?php echo $p['IDMOVDESTINO']; ?>">Andaime Apoiado </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada2<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada2<?php echo $p['IDMOVDESTINO']; ?>">Andaime Suspenso</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada3<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada3<?php echo $p['IDMOVDESTINO']; ?>">Andaime Balanço</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada4<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada4<?php echo $p['IDMOVDESTINO']; ?>">Andaime Pau de carga </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada5<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada5<?php echo $p['IDMOVDESTINO']; ?>">Escoramento em viga</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada6<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada6<?php echo $p['IDMOVDESTINO']; ?>">Escoramento em laje</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada7<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada7<?php echo $p['IDMOVDESTINO']; ?>">Escoramento de equipamento </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada8<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada8<?php echo $p['IDMOVDESTINO']; ?>">Travamento próprio andaime</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada9<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada9<?php echo $p['IDMOVDESTINO']; ?>">Travamento em estruturas</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada10<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada10<?php echo $p['IDMOVDESTINO']; ?>">Avaliação Estrutural </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada11<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada11<?php echo $p['IDMOVDESTINO']; ?>">Linha de Vida</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada12<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada12<?php echo $p['IDMOVDESTINO']; ?>">Espaço Confinado</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada13<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada13<?php echo $p['IDMOVDESTINO']; ?>">Necessário bloqueio do equipamento </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada14<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="dadosdeentrada14<?php echo $p['IDMOVDESTINO']; ?>">Local da Montagem é Aberto</label>
														</div>
													</div>												
												</div>
											</div>
										</div>
									</div><!-- FIM ACCORDION DOS DADOS DE ENTRADA -->
								
									<!-- PRÉ PROGRAMAÇÃO -->
									<div class="accordion-item">
										<div class="accordion-header rounded-lg text-center collapsed" id="hd2<?php echo $p['IDMOVDESTINO']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd2<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapsehd2<?php echo $p['IDMOVDESTINO']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Pré Programação</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd2<?php echo $p['IDMOVDESTINO']; ?>" class="collapse show" aria-labelledby="hd2<?php echo $p['IDMOVDESTINO']; ?>" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input type="checkbox" class="form-check-input" id="pp1<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="pp1<?php echo $p['IDMOVDESTINO']; ?>">Necessário Guindaste </label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input type="checkbox" class="form-check-input" id="pp2<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="pp2<?php echo $p['IDMOVDESTINO']; ?>">Necessário Empilhadeira</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input type="checkbox" class="form-check-input" id="pp3<?php echo $p['IDMOVDESTINO']; ?>">
															<label class="form-check-label" for="pp3<?php echo $p['IDMOVDESTINO']; ?>">Necessário Caminhão </label>
														</div>
													</div>	
													<div class="col-6">
														<label class="form-label">Tempo de mobilização</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp4<?php echo $p['IDMOVDESTINO']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>	
													<div class="col-6">
														<label class="form-label">Tempo de desmobilização</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp5<?php echo $p['IDMOVDESTINO']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>		
													<div class="col-6">
														<label class="form-label">Tempo de montagem</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp6<?php echo $p['IDMOVDESTINO']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>
													<div class="col-6">
														<label class="form-label">Tempo de desmontagem</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp7<?php echo $p['IDMOVDESTINO']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>	
													<div class="card col-12">
													<div class="card-header">
														<h4 class="card-title">Complexidade</h4>
													</div>
													<div class="card-body">
														<div class="basic-form">
															<form>
																<div class="mb-3 mb-0">
																	<label class="radio-inline me-3"><input type="radio" name="optradio" checked id="pp8<?php echo $p['IDMOVDESTINO']; ?>"> Baixa </label>
																	<label class="radio-inline me-3"><input type="radio" name="optradio" id="pp9<?php echo $p['IDMOVDESTINO']; ?>"> Média </label>
																	<label class="radio-inline me-3"><input type="radio" name="optradio" id="pp10<?php echo $p['IDMOVDESTINO']; ?>"> Alta </label>
																</div>
															</form>
														</div>
													</div>
												</div>							
												</div>
											</div>
										</div>
									</div><!-- FIM PRÉ PROGRAMAÇÃO -->

									<!-- DIMENSÕES DO ANDAIME -->
									<div class="accordion-item">
										<div class="accordion-header rounded-lg text-center collapsed" id="hd3<?php echo $p['IDMOVDESTINO']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd3<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapsehd3<?php echo $p['IDMOVDESTINO']; ?>"  role="button"  aria-expanded="false">
											<span class="accordion-header-text text-center">Dimensões do Andaime</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd3<?php echo $p['IDMOVDESTINO']; ?>" class="collapse show" aria-labelledby="hd3<?php echo $p['IDMOVDESTINO']; ?>" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row text-center">
												<div class="col-6 text-center">
													<div class="col-lg-12 text-center">
														<div class="card text-center">
															<div class="card-header">
																<h4 class="card-title">Montagem</h4>
															</div>
															<div class="card-body">
																<div class="table-responsive">
																	<table class="table table-responsive-sm">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Altura</th>
																				<th>Largura</th>
																				<th>Comp.</th>
																				<th>Total</th>
																				<!-- <th></th> -->
																			</tr>
																		</thead>
																		<tbody>
																			
																			<tr>
																				<th>1</th>
																				<td><input value="1" type="text" class="form-control" placeholder="0" id="alturamontagem<?php echo $p['IDMOVDESTINO']; ?>"></td>
																				<td><input value="1" type="text" class="form-control" placeholder="0" id="larguramontagem<?php echo $p['IDMOVDESTINO']; ?>"></td>
																				<td><input value="1" type="text" class="form-control" placeholder="0" id="comprimentomontagem<?php echo $p['IDMOVDESTINO']; ?>"></td>
																				<td><input  type="text" class="form-control bg-light" disabled placeholder="0"></td>
																				<!-- <td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																					</div>
																				</td> -->
																			</tr>

																		</tbody>
																	</table>																
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="col-lg-12">
														<div class="card">
															<div class="card-header">
																<h4 class="card-title">Desmontagem</h4>
															</div>
															<div class="card-body">
																<div class="table-responsive">
																	<table class="table table-responsive-sm">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Altura</th>
																				<th>Largura</th>
																				<th>Comp.</th>
																				<th>Total</th>
																				<!-- <th>QR</th>
																				<th></th> -->
																			</tr>
																		</thead>
																		<tbody>
																			
																			<tr>
																				<th>1</th>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagem<?php echo $p['IDMOVDESTINO']; ?>"></td>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagem<?php echo $p['IDMOVDESTINO']; ?>"></td>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagem<?php echo $p['IDMOVDESTINO']; ?>"></td>
																				<td><input type="text" class="form-control bg-light" disabled placeholder="0"></td>
																				<!-- <td><input type="text" class="form-control" placeholder="0"></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																					</div>
																				</td> -->
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>				
										</div>
									</div><!-- FIM DIMENSÕES DO ANDAIME -->	

									<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
									<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
									<script>
										$(document).ready(function(){
											$('#alturamontagem<?php echo $p['IDMOVDESTINO']; ?>').on('blur', function() {
												formatarCampo(this);
											});

											$('#larguramontagem<?php echo $p['IDMOVDESTINO']; ?>').on('blur', function() {
												formatarCampo(this);
											});

											$('#comprimentomontagem<?php echo $p['IDMOVDESTINO']; ?>').on('blur', function() {
												formatarCampo(this);
											});

											function formatarCampo(input) {
												var valor = $(input).val();
												// Remover qualquer caractere que não seja número ou ponto
												valor = valor.replace(/[^\d.]/g, '');
												// Adicionar a formatação desejada
												valor = parseFloat(valor).toFixed(2);
												$(input).val(valor);
											}
										});
										</script>
			
									<!-- ACCORDION DAS OBSERVAÇÕES DA VISITA-->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center collapsed" id="hd4" data-bs-toggle="collapse" data-bs-target="#collapsehd4<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapsehd4<?php echo $p['IDMOVDESTINO']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Observações</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd4<?php echo $p['IDMOVDESTINO']; ?>" class="collapse show" aria-labelledby="hd4" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
												<div class="row">
													<div class="mb-4">
														<h4 class="card-title">Observações da visita</h4>
														<!-- <p>Selecione os <code>produtos</code> </p> -->
													</div>
												<div class="mb-3">
													<textarea class="form-control" id="comentarioconteudo<?php echo $p['IDMOVDESTINO']; ?>" rows="3"></textarea>
													<button id="btncomentario<?php echo $p['IDMOVDESTINO']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs mt-2" onclick="enviarcomentario(<?php echo $p['IDMOVDESTINO']; ?>,2)"><i class="fa fa-reply"> Salvar</i></button>         
												</div>

												

												<div class="col-12">
													<div class="card">
														<div class="card-header border-0 pb-0">
															<h4 class="card-title">Histórico de observações</h4>
														</div>
														<div class="card-body">
															<div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height370 ps ps--active-y">
																<ul class="timeline">
																	
																<?php foreach ($data8 as $cmt): ?>
																	<?php if ($cmt['IDMOV'] == $p['IDMOVDESTINO']): ?> 
																		<li>
																			<div class="timeline-badge primary"></div>
																			<a class="timeline-panel text-muted" href="#">
																				<span><?php echo $cmt['RECCREATEDON'];?></span>
																				<h6 class="mb-0">Usuário: <strong class="text-primary"><?php echo $cmt['RECCREATEDBY'];?></strong></h6>
																				<h6 class="mb-0">Comentário: <?php echo $cmt['COMENTARIO'];?></h6>
																			</a>
																		</li>
																	<?php endif; ?>
																<?php endforeach; ?>


																</ul>
															<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 150px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div>
														</div>
													</div>
												</div><!-- FIM TIMELINE ANDAIME -->
												
											</div>
										</div>
									</div><!-- FIM ACCORDION DAS OBSERVAÇÕES DA VISITA-->


									<!-- INFORMAÇÕES DOS ÍTENS A SEREM UTILIZADOS -->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center collapsed" id="hd5<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd5<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Informações de Anteprojeto</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd5<?php echo $p['IDMOV']; ?>" class="collapse" aria-labelledby="hd5<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row">
												<div class="col-6">
														<div class="card-header">
															<h4 class="card-title">Necessita Projeto</h4>
														</div>
														<div class="card-body">
															<div class="basic-form">
																<form>
																	<div class="mb-3 mb-0">
																		<label class="radio-inline me-3"><input type="radio" name="app1" id="app1<?php echo $p['IDMOVDESTINO']; ?>"> Sim </label>
																		<label class="radio-inline me-3"><input type="radio" checked name="app2" id="app2<?php echo $p['IDMOVDESTINO']; ?>"> Não </label>
																	</div>
																</form>
															</div>
																<h4 class="card-title">Detalhe os ítens a serem utilizados</h4>
															<textarea class="form-control" id="detalhamentoitens<?php echo $p['IDMOVDESTINO']; ?>" rows="3"></textarea>
														</div>
												</div>
															
												<div class="col-6">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<input type="checkbox" class="form-check-input"  id="ap2off<?php echo $p['IDMOVDESTINO']; ?>" required>
														<label class="form-check-label" for="ap2<?php echo $p['IDMOVDESTINO']; ?>">Necessita de memória de cálculo</label>
													</div>
												</div>					
											</div>
										</div>
									</div><!-- FIM INFORMAÇÕES DE ANTEPROJETO -->



						<!-- DESENHO A SER CRIADO -->
						<!-- <div class="accordion-item mt-4">
							<div class="accordion-header rounded-lg text-center collapsed show" id="hd5<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd5<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
								<span class="accordion-header-text">Anexo Croqui</span>
								<span class="accordion-header-indicator"></span>
							</div>
						<div id="collapsehd5<?php echo $p['IDMOV']; ?>" class="collapse" aria-labelledby="hd5<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
							<div class="accordion-body-text">
								<div class="row">
									
								<h1>Croqui</h1>
								<canvas id="drawingCanvas" width="500" height="500"></canvas>
									<input type="hidden" name="idmov" id="IDMOVCROQUI" value="<?php echo $p['IDMOVDESTINO']; ?>">
									<input type="hidden" name="FLUXO" value="2" id="FLUXOCROQUI">
								<br>
								
								<button id="saveButton" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs"><i class="fa fa-reply"></i> Salvar </button>                                  
								
								<button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" id="clearButton"><i class="fa fa-times" aria-hidden="true"> Limpar</i></button>

								<script src="path/to/your/javascript/file.js"></script>





								</div>
							</div>
						</div> -->
						<!-- DESENHO A SER CRIADO -->

						<style>
							canvas {
								border: 1px solid black;
							}
						</style>

						<!-- SCRIPT PARA CRIAR O DESENHO -->
						<script>
							document.addEventListener('DOMContentLoaded', (event) => {
								const canvas = document.getElementById('drawingCanvas');
								if (!canvas) {
									console.error('Canvas element not found');
									return;
								}

								const context = canvas.getContext('2d');
								if (!context) {
									console.error('Failed to get canvas context');
									return;
								}

								let drawing = false;
								let lastX, lastY;

								// Evita que a tela seja arrastada enquanto desenha no canvas
								canvas.addEventListener('touchstart', (e) => {
									e.preventDefault();
									drawing = true;
									const touch = e.touches[0];
									const rect = canvas.getBoundingClientRect();
									lastX = touch.clientX - rect.left;
									lastY = touch.clientY - rect.top;
									context.beginPath();
									context.moveTo(lastX, lastY);
								});

								canvas.addEventListener('touchmove', (e) => {
									if (!drawing) return;
									e.preventDefault();
									const touch = e.touches[0];
									const rect = canvas.getBoundingClientRect();
									const currentX = touch.clientX - rect.left;
									const currentY = touch.clientY - rect.top;
									drawLine(lastX, lastY, currentX, currentY);
									lastX = currentX;
									lastY = currentY;
								});

								canvas.addEventListener('touchend', () => {
									drawing = false;
									context.closePath();
								});

								function drawLine(x1, y1, x2, y2) {
									context.lineWidth = 2;
									context.lineCap = 'round';
									context.strokeStyle = 'black';
									context.beginPath();
									context.moveTo(x1, y1);
									context.lineTo(x2, y2);
									context.stroke();
									context.closePath();
								}

								document.getElementById('clearButton').addEventListener('click', () => {
									context.clearRect(0, 0, canvas.width, canvas.height);
								});

								document.getElementById('saveButton').addEventListener('click', () => {
								try {
									// Obter os valores dos elementos HTML com os IDs IDMOVCROQUI e FLUXOCROQUI
									const idMovCroqui = document.getElementById('IDMOVCROQUI').value;
									const fluxoCroqui = document.getElementById('FLUXOCROQUI').value;

									// Verificar se os valores foram obtidos corretamente
									if (!idMovCroqui || !fluxoCroqui) {
										alert('Por favor, preencha os campos IDMOVCROQUI e FLUXOCROQUI.');
										return;
									}

									const dataURL = canvas.toDataURL('image/png');
									const formData = new FormData();
									
									// Anexar a imagem e os valores dos elementos ao FormData
									formData.append('image', dataURL);
									formData.append('IDMOVCROQUI', idMovCroqui);
									formData.append('FLUXOCROQUI', fluxoCroqui);

									fetch('<?php echo base_url('save_image') ?>', {
										method: 'POST',
										body: formData
									})
									.then(response => response.json())
									.then(data => {
										if (data.success) {
											alert('Imagem salva com sucesso! Nome do arquivo: ' + data.fileName);
										} else {
											alert('Falha ao salvar a imagem.');
										}
									});
								} catch (error) {
									console.error('Error generating data URL:', error);
								}
							});
							});
						</script>


									<!-- INFORMAÇÕES DE ANTEPROJETO -->
									<!-- <div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center collapsed" id="it5<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapseit5<?php echo $p['IDMOV']; ?>" aria-controls="collapseit5<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Ítens do Projeto</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapseit5<?php echo $p['IDMOV']; ?>" class="collapse" aria-labelledby="it5<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row">
												<div class="col-12">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-responsive-sm">
																<thead>
																	<tr>
																		<th class="col-6">
																			<select class="single-select-placeholder js-states form-control">
																				<option value=""></option>
																				<?php 
																				if (!empty($itensAndaimes)): 
																					foreach($itensAndaimes as $e): 
																				?>	

																						<option id="itemadd" value="<?php echo $e['IDPRD']; ?>"><?php echo $e['NOME']; ?></option>
																				<?php 
																					endforeach; 
																				endif; 
																				?>
																			</select>
																		</th>
																		<th>
																		<input class="form-control" type="number" name="qtditem" id="qtditem">
																		</th>
																		<th>
																			<button id="btnquantidadeitem" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs mt-2"><i class="fa fa-plus"> Adicionar</i></button>         
																		</th>
																		
																	</tr>
																</thead>
																
															</table>
															

															<div class="card-body">
										<div class="table-responsive recentOrderTable">
											<table class="table verticle-middle table-responsive-md">
												<thead>
													<tr>
														<th scope="col">#</th>
														<th scope="col">Ítem</th>
														<th scope="col">Quantidade</th>
													</tr>
												</thead>
												<tbody id="itenstbody">													
													
														
														
													
												</tbody>
											</table>
										</div>
									</div>


									<script>
										
										let ultimoValor = 0; // Define ultimoValor como 0 inicialmente

										document.getElementById('btnquantidadeitem').addEventListener('click', function() {
											let qtdItemValor = document.getElementById('qtditem').value;
											let itemAddValor = document.getElementById('itemadd').innerText;

											if (typeof ultimoValor === 'undefined') {
												ultimoValor = 0; // Define ultimoValor como 0 se não estiver definido
											}

											let novoTr = document.createElement('tr');
											
											let novoTd1 = document.createElement('td');
											novoTd1.textContent = ultimoValor + 1;

											let novoTd2 = document.createElement('td');
											novoTd2.textContent = itemAddValor;

											let novoTd3 = document.createElement('td');
											novoTd3.textContent = qtdItemValor;

											let novoTd4 = document.createElement('td');
											// let editarBtn = document.createElement('button');
											// editarBtn.textContent = "Editar";
											// editarBtn.addEventListener('click', function() {
											// 	// Lógica para editar o item
											// 	console.log("Editar item: " + novoTd1.textContent);
											// });
											// novoTd4.appendChild(editarBtn);

											let novoTd5 = document.createElement('td');
											let excluirBtn = document.createElement('button');
											excluirBtn.textContent = "Excluir";
											excluirBtn.addEventListener('click', function() {
												// Lógica para excluir o item
												novoTr.remove();
												console.log("Excluir item: " + novoTd1.textContent);
											});
											novoTd5.appendChild(excluirBtn);

											novoTr.appendChild(novoTd1);
											novoTr.appendChild(novoTd2);
											novoTr.appendChild(novoTd3);
											novoTr.appendChild(novoTd4);
											novoTr.appendChild(novoTd5);

											document.getElementById('itenstbody').appendChild(novoTr);

											ultimoValor++;
										});
									</script>
														</div>
													</div>

																			

														
															
												</div>

												




																
											</div>
										</div>
									</div>FIM INFORMAÇÕES DE ANTEPROJETO -->



									
									<!-- DOCUMENTOS ANEXOS AQUI --> 
									<!-- DOCUMENTOS ANEXOS -->
<div class="accordion-item mt-4">
									<div class="accordion-header rounded-lg text-center collapsed" id="hd6<?php echo $p['IDMOVDESTINO']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd6<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapsehd6<?php echo $p['IDMOVDESTINO']; ?>"   role="button" aria-expanded="false">
										<span class="accordion-header-text">Documentos Anexos</span>
										<span class="accordion-header-indicator"></span>
									</div>
									<div id="collapsehd6<?php echo $p['IDMOVDESTINO']; ?>" class="collapse show" aria-labelledby="hd6<?php echo $p['IDMOVDESTINO']; ?>" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row"><!-- FOTOS E DOCUMENTOS AQUI --> 
												<div class="col-xl-6 col-lg-6">
													<!-- Tab panes -->
													<div class="tab-content">
														<!-- <div role="tabpanel" class="tab-pane fade show active" id="first">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/4.jpg'); ?>" alt="">
														</div>
														<div role="tabpanel" class="tab-pane fade" id="second">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/2.jpg'); ?>" alt="">
														</div>
														<div role="tabpanel" class="tab-pane fade" id="third">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/3.jpg'); ?>" alt="">
														</div>
														<div role="tabpanel" class="tab-pane fade" id="for">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/4.jpg'); ?>" alt="">
														</div> -->
														

															<?php foreach ($data7 as $img): ?>
																<?php if ($img['IDMOV'] == $p['IDMOVDESTINO']): ?> 
																	<div role="tabpanel" class="tab-pane fade" id="<?php echo $img['NOMEARQUIVO'];?>">
																		<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/'). $img['NOMEARQUIVO'];?>" alt="">
																	</div>
																<?php endif; ?>
															<?php endforeach; ?>

													</div>								
												</div>

											<div class="col-xl-6 col-lg-12">
												<div class="card">
													<div class="card-header">
														<h4 class="card-title">Carregar foto</h4>
													</div>
													<div class="card-body">
														<div class="basic-form custom_file_input">															
															<form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
																<input type="hidden" name="idmov" value="<?php echo $p['IDMOVDESTINO']; ?>">
																<label for="imageFiles">Selecione as imagens:</label><br>
																<input type="file" name="files[]" multiple accept=".jpg, .png"><br><br>
																<input type="submit" value="Enviar">
															</form>
														</div>
													</div>							
													<div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
														<!-- Nav tabs -->
														<ul class="nav slide-item-list mt-3" role="tablist">
															<!-- <li role="presentation" class="show">
																<a href="#first" role="tab" data-bs-toggle="tab">
																	<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/4.jpg'); ?>" alt="" width="50">
																</a>
															</li> -->
															<!-- <li role="presentation">
																<a href="#second" role="tab" data-bs-toggle="tab">
																	<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/2.jpg'); ?>" alt="" width="50"></a>
															</li>
															<li role="presentation">
																<a href="#third" role="tab" data-bs-toggle="tab">
																	<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/3.jpg'); ?>" alt="" width="50"></a>
															</li>
															<li role="presentation">
																<a href="#for" role="tab" data-bs-toggle="tab"><img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/4.jpg'); ?>" alt="" width="50"></a>
															</li> -->
														

															<?php foreach ($data7 as $img): ?>
																<?php if ($img['IDMOV'] == $p['IDMOVDESTINO']): ?> 
																	<li role="presentation">
																		<a href="#<?php echo $img['NOMEARQUIVO'];?>" role="tab" data-bs-toggle="tab">
																			<img class="img-fluid bg-image" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" width="50">
																		</a>
																	</li>
																<?php endif; ?>
															<?php endforeach; ?>



														</ul>

														

													</div>
												</div>
											</div>
										</div>											
									</div><!-- FIM DOCUMENTOS ANEXOS -->

















									<!-- APROVAÇÃO -->
									<!-- <div class="accordion-item mt-4">
									<div class="accordion-header rounded-lg text-center collapsed" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="false">
										<span class="accordion-header-text">Aprovação</span>
										<span class="accordion-header-indicator"></span>
									</div>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row">
												<h3>EM DESENVOLVIMENTO</h3>
											</div>
										</div> -->
									</div>


								</div>
							</div>
						</div>
					</div><!-- FIM DE CADA VISITA  --> 	
							


									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- AQUI FIM DE CADA RDO INSERIDO -->
			</div>
<?php 
    elseif ($p['VALIDACAO'] == 3): 
?>
    <div class="row" style="
    margin-top: -117px;">
    <div class="col-lg-12">
		<div class="row">
				<div class="col-lg-12">
					<div class="card" styler="margin-bottom: 2.875rem; background-color: #fff; transition: all .5s ease-in-out; position: relative; border-radius: 1.25rem; box-shadow: 0rem 0.3125rem 0.3125rem 0rem rgba(82, 63, 105, 0.05); height: calc(100% - 30px);">
							<div class="col-12" style="    margin-left: 20px;    margin-top: 20px;    border-top: 1px solid green;    padding-top: 10px;">           
								<!-- <button disable = true id="enviarvisita<?php echo $p['IDMOV']; ?>" value="<?php echo $p['IDMOV']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" disable><i class="fa fa-reply"></i> Finalizar Projeto</button>                                   -->
								<!-- <button type="button" class="btn btn-warning  me-2 mb-2 btn-xxs" id="toasttoastr-warning-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"> Editar</i></button>
								<button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" id="toasttoastr-danger-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"> Cancelar</i></button> -->
							</div>
						
							<div class="card-header">
								<div class="product-detail-content"><!-- INÍCIO DAS NOVAS INFORMAÇÕES -->
									<div class="new-arrival-content row">
										<div class="col-xl-6 col-xxl-12 col-md-6">
										<?php if ($p['STATUS'] == 'C') { ?> 
											<div>
												<h2><code>Visita Cancelada</code></h2>
											</div>
										<?php } ?>

											<h4>CLIENTE</h4><?php echo $p['STATUS']; ?>
											<span class="item">Ordem: </span> - <code2><?php echo $p['SAMF_CLI_OS']; ?></code2><p>
											<span class="item">Nome da tarefa </span> - <?php echo $p['SAMF_CLI_TEXTO_BREVE']; ?> <p>
											<span class="item">Descrição da ordem </span> - <?php echo $p['SAMF_CLI_DESC_OP']; ?> <p>
											<span class="item">Observações </span> - <?php echo $p['SAMF_OBSERVACAO']; ?> <p>
											<span class="item">TAG </span> - <?php echo $p['SAMF_CLI_TAG']; ?> <p>
											<span class="item">Predecessora </span> - <?php echo $p['SAMF_PREDECESSORA']; ?> <p>
											<span class="item">Previsão de início </span> - <?php echo $p['DATA_INICIO']; ?> <p>
											<span class="item">Previsão fim </span> - <?php echo $p['DATA_FIM']; ?> <p>
											<span class="item">Previsão de tempo </span> - <?php echo $p['SAMF_PREV_VISITANOVO']; ?> <p>
										</div>

										<div class="col-xl-6 col-xxl-12 col-md-6">
											<h4>TOP ANDAIMES</h4>
											<span class="item">Ordem: </span> - <code2><?php echo $p['IDMOV']; ?></code2><p>
											<span class="item">Centro de Custo </span> - <?php echo $p['CODCCUSTO']; ?> <p>
											<span class="item">Data de entrada </span> - <?php echo $p['DATAEMISSAO']; ?><p>

											<h4 class="card-title">Encarregado Visita</h4>
											<!-- <select class="form-select border-dark" name = "encarregado" id = "encarregado<?php echo $p['IDMOV']; ?>"  aria-label="Default select example">
												
												<option></option>
												<?php foreach($data9 as $e): ?>
													<option value="<?php echo $e['ID']; ?>"><?php echo $e['CODUSUARIO']; ?></option>
												<?php endforeach; ?>
											</select> -->
										</div>

										<div class="col-xl-12 col-xxl-12 col-md-12">
											<h4 class="mt-3">Observações</h4>
											<span class="item">Observações feitas pelo time TOP</span> 
										</div>

										<div class="col-xl-6 col-xxl-12 col-md-6">
											<h4 class="mt-3">TAGS&nbsp;&nbsp;
											<span class="badge badge-success light"><?php echo $p['SAMF_CLI_TAG']; ?></span>
										</div>

										<div class="col-xl-6 col-xxl-12 col-md-6">
											<div class="d-flex">
												<span><i class="far fa-clock scale5 text-primary mt-2 me-3"></i></span>
												<div>
													<h4 class="fs-18 font-w500 text-black">Atualizado em <small><?php echo $p['RECMODIFIEDON']; ?></small></h4>
												</div>
											</div>
										</div>
									</div>		
								</div><!-- FIM DAS NOVAS INFORMAÇÕES --> 
							</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-responsive-md">


								<!-- <div class="col-xl-6 col-lg-12">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Carregar foto</h4>
										</div>
										<div class="card-body">
											<div class="basic-form custom_file_input">
												<form action="#">
													<div class="input-group mb-3">
														<button class="btn btn-primary btn-sm" type="button">Enviar</button>
														<div class="form-file">
															<input type="file" class="form-file-input form-control">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div> -->

									<!-- <thead>
										<tr>
											<th style="width:50px;">
												<div class="form-check custom-checkbox checkbox-success check-lg me-3">
													<input type="checkbox" class="form-check-input" id="checkAll" required="">
													<label class="form-check-label" for="checkAll"></label>
												</div>
											</th>
											<th><strong>Id Produto</strong></th>
											<th><strong>Nome</strong></th>
											<th><strong>Quantidade</strong></th>
											<th><strong>Observação</strong></th>
											<th><strong>Status</strong></th>
											<th><strong></strong></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="form-check custom-checkbox checkbox-success check-lg me-3">
													<input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
													<label class="form-check-label" for="customCheckBox2"></label>
												</div>
											</td>
											<td><strong>02.00058.50222</strong></td>
											<td><div class="d-flex align-items-center"><img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-lg me-2" width="24" alt=""/> <span class="w-space-no">Luva X</span></div></td>
											<td>Luva	</td>
											<td>Detalhes do ítem</td>
											<td><div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> Disponível</div></td>
											<td>
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr> -->
									</tbody> 
								</table>
							</div>
						</div>   
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    endif; 
endforeach; 
?>






		



	</div>














	
		<!-- row -->
		<div class="row">
			<!-- <div class="col-xl-12 col-xxl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Orçamento</h4>
					</div>
					<div class="card-body">
						<div id="smartwizard" class="form-wizard order-create">
							<ul class="nav nav-wizard">
								<li><a class="nav-link" href="#wizard_Service"> 
									<span>1</span> 
								</a></li>
								<li><a class="nav-link" href="#wizard_Time">
									<span>2</span>
								</a></li>
								<li><a class="nav-link" href="#wizard_Details">
									<span>3</span>
								</a></li>
								<li><a class="nav-link" href="#wizard_Payment">
									<span>4</span>
								</a></li>
							</ul>
							<div class="tab-content">
								<div id="wizard_Service" class="tab-pane" role="tabpanel">
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">First Name*</label>
												<input type="text" name="firstName" class="form-control" placeholder="Parsley" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Last Name*</label>
												<input type="text" name="lastName" class="form-control" placeholder="Montana" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Email Address*</label>
												<input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="example@example.com.com" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Phone Number*</label>
												<input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required>
											</div>
										</div>
										<div class="col-lg-12 mb-3">
											<div class="mb-3">
												<label class="text-label form-label">Where are you from*</label>
												<input type="text" name="place" class="form-control" required>
											</div>
										</div>
									</div>
								</div>
								<div id="wizard_Time" class="tab-pane" role="tabpanel">
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Company Name*</label>
												<input type="text" name="firstName" class="form-control" placeholder="Cellophane Square" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Company Email Address*</label>
												<input type="email" class="form-control" id="emial1" placeholder="example@example.com.com" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Company Phone Number*</label>
												<input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="mb-3">
												<label class="text-label form-label">Your position in Company*</label>
												<input type="text" name="place" class="form-control" required>
											</div>
										</div>
									</div>
								</div>
								<div id="wizard_Details" class="tab-pane" role="tabpanel">
									<div class="row">
										<div class="col-sm-4 mb-2">
											<h4>Monday *</h4>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="9.00" type="number" name="input1" id="input1">
											</div>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="6.00" type="number" name="input2" id="input2">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4 mb-2">
											<h4>Tuesday *</h4>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="9.00" type="number" name="input3" id="input3">
											</div>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="6.00" type="number" name="input4" id="input4">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4 mb-2">
											<h4>Wednesday *</h4>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="9.00" type="number" name="input5" id="input5">
											</div>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="6.00" type="number" name="input6" id="input6">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4 mb-2">
											<h4>Thrusday *</h4>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="9.00" type="number" name="input7" id="input7">
											</div>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="6.00" type="number" name="input8" id="input8">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4 mb-2">
											<h4>Friday *</h4>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="9.00" type="number" name="input9" id="input9">
											</div>
										</div>
										<div class="col-6 col-sm-4 mb-2">
											<div class="mb-3">
												<input class="form-control" value="6.00" type="number" name="input10" id="input10">
											</div>
										</div>
									</div>
								</div>
								<div id="wizard_Payment" class="tab-pane" role="tabpanel">
									<div class="row emial-setup">
										<div class="col-lg-3 col-sm-6 col-6">
											<div class="mb-3">
												<label for="mailclient11" class="mailclinet mailclinet-gmail">
													<input type="radio" name="emailclient" id="mailclient11">
													<span class="mail-icon">
														<i class="mdi mdi-google-plus" aria-hidden="true"></i>
													</span>
													<span class="mail-text">I'm using Gmail</span>
												</label>
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-6">
											<div class="mb-3">
												<label for="mailclient12" class="mailclinet mailclinet-office">
													<input type="radio" name="emailclient" id="mailclient12">
													<span class="mail-icon">
														<i class="mdi mdi-office" aria-hidden="true"></i>
													</span>
													<span class="mail-text">I'm using Office</span>
												</label>
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-6">
											<div class="mb-3">
												<label for="mailclient13" class="mailclinet mailclinet-drive">
													<input type="radio" name="emailclient" id="mailclient13">
													<span class="mail-icon">
														<i class="mdi mdi-google-drive" aria-hidden="true"></i>
													</span>
													<span class="mail-text">I'm using Drive</span>
												</label>
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-6">
											<div class="mb-3">
												<label for="mailclient14" class="mailclinet mailclinet-another">
													<input type="radio" name="emailclient" id="mailclient14">
													<span class="mail-icon">
														<i class="fa fa-question-circle-o"
															aria-hidden="true"></i>
													</span>
													<span class="mail-text">Another Service</span>
												</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<div class="skip-email text-center">
												<p>Or if want skip this step entirely and setup it later</p>
												<a href="javascript:void(0)">Skip step</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>

<!-- ABRE SOLICITACAO  -->
<script>
    function pesquisar() {
       //ABAIXO PEGANDO VALORES DOS CHECKBOX DE DADOS DE ENTRADA 
		var CONTEUDOPESQUISAR = document.getElementById('conteudopesquisar').value;
        
		
		// VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (!CONTEUDOPESQUISAR) {
			
            toastr.warning("Sem valor para pesquisa", "PESQUISA", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            return; 
        }
		

        var dados = {
			"CONTEUDOPESQUISAR": CONTEUDOPESQUISAR
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

		fetch('pesquisar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (response.ok) {
                // Redirecionamento para a página controlada pelo método Qrcodeler,
                // passando o parâmetro na URL
                window.location.href = '<?php echo base_url('pesquisar'); ?>' + CONTEUDOPESQUISAR;
            } else {
                // Tratamento de erros, se necessário
                console.error('Erro na requisição:', response.status);
            }
        })
        .catch(error => console.error('Erro:', error));
    }

	
</script>


<!-- ADICIONAR SOLICITAÇÃO -->
<script>
    function lerqrcode_old() {
       
		var qrcodelido = document.getElementById('qrcodelido').value; 
		
        
        // // Verifica se o campo datepicker está preenchido
        // if (!DATAEXTRA1 || !SAMF_CLI_OS || !DATAEXTRA2) {
        //     alert('Por favor, preencha todos os campos obrigatórios!');
        //     return; // Impede o envio dos dados se o campo não estiver preenchido
        // }

        var dados = {
            "qrcode": qrcodelido
        };

        // Exibir o JSON no console para verificação
        console.log(dados);

        fetch('<?php echo base_url('Qr_code_ler'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registro incluído com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            } else {
                // Caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.warning("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.warning("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        });
    }

    document.getElementById('incluirrdo').addEventListener('click', enviarDados);

</script>



<!-- ADICIONAR SOLICITAÇÃO -->
<script>
    function enviarDados() {
        var codccusto = '02.0181.00'; //document.getElementById('codccusto').value; 
        //var tipocompra = document.getElementById('tipocompra').value; 
        var DATAEXTRA1 = document.getElementById('mdate').value; 
		var DATAEXTRA2 = document.getElementById('mdate2').value; 
		var SAMF_CLI_OS = document.getElementById('SAMF_CLI_OS').value; 
		var SAMF_CLI_QRCODE = document.getElementById('SAMF_CLI_QRCODE').value; 
		
        
        // // Verifica se o campo datepicker está preenchido
        // if (!DATAEXTRA1 || !SAMF_CLI_OS || !DATAEXTRA2) {
        //     alert('Por favor, preencha todos os campos obrigatórios!');
        //     return; // Impede o envio dos dados se o campo não estiver preenchido
        // }

        var dados = {
            "CODCCUSTO": codccusto,
            "DATAEXTRA1": DATAEXTRA1,
			"DATAEXTRA2": DATAEXTRA2,
			"SAMF_CLI_OS": SAMF_CLI_OS,
			"SAMF_CLI_QRCODE": SAMF_CLI_QRCODE
        };

        // Exibir o JSON no console para verificação
        console.log(dados);

        fetch('<?php echo base_url('insertSV'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registro incluído com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            } else {
                // Caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.warning("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.warning("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        });
    }

    document.getElementById('incluirrdo').addEventListener('click', enviarDados);

</script>


<!-- ENVIA COMENTÁRIO  -->
<script>
    function enviarcomentario(idmovorigem, fluxo) {
        var codccusto = '02.0181.00'; 
		var CODCOLIGADA = 1;
		var IDMOV = idmovorigem;
		var COMENTARIO = document.getElementById('comentarioconteudo'.concat(idmovorigem)).value;

		var btncomentario = document.getElementById('btncomentario'.concat(idmovorigem));		
		btncomentario.disabled = true;
		
		var areacomentario = document.getElementById('comentarioconteudo'.concat(idmovorigem));
		areacomentario.readOnly = true;

		
		// VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (!COMENTARIO) {
			
            toastr.warning("Comentário vazio!", "Observações", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				btncomentario.disabled = false;
				btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
				areacomentario.readOnly = false;
            return; 
        }


        var dados = {
			"CODCCUSTO": codccusto,
			"IDMOV": IDMOV,
			"CODCOLIGADA": CODCOLIGADA,
			"COMENTARIO": COMENTARIO,
			"FLUXO": fluxo
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('insertCMT'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registro incluído com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				btncomentario.disabled = true;
				btncomentario.innerHTML = "<i class='fa fa-check'></i> Comentário enviado com sucesso. Será apresentado após atualizar a página!";

            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				btncomentario.disabled = false;
				btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
				areacomentario.readOnly = false;
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
			btncomentario.disabled = false;
			btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
			areacomentario.readOnly = false;
        });
    }

	
</script>





<!-- ENVIAR SOLICITAÇÃO PARA VISITA -->

<script>
    function enviarvisita(idmovorigem) {

		var botaoEnviar = document.getElementById('enviarvisita'.concat(idmovorigem))		
		botaoEnviar.disabled = true;
		botaoEnviar.innerHTML = "<i class='fa fa-check'></i> Visita Enviada";

        var codccusto = '02.0181.00'; 
		// var SAMF_ENCARREGADO = document.getElementById('encarregado').value;
		var SAMF_ENCARREGADO = parseInt(document.getElementById('encarregado' + idmovorigem).value);


		//var SAMF_ENCARREGADO = 2;
		var IDMOV = idmovorigem;
		var CODCOLIGADA = 1;

		// Verifica se o campo datepicker está preenchido
        if (!SAMF_ENCARREGADO) {
            toastr.warning("Preencha o encarregado!", "Campo Pendente", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });

			botaoEnviar.disabled = false;
			botaoEnviar.innerHTML = "<i class='fa fa-reply'></i> Enviar Visita";
            return; // Impede o envio dos dados se o campo não estiver preenchido
        }
		
        // Dados a serem enviados no corpo da solicitação fetch
        var dados = {
            "IDMOVORIGEM": idmovorigem,
			"SAMF_ENCARREGADO": SAMF_ENCARREGADO,
			"IDMOV": IDMOV,
			"CODCOLIGADA": CODCOLIGADA
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('insertGV1'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registro incluído com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				botaoEnviar.value = "Visita Enviada";
            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				botaoEnviar.disabled = false;
				botaoEnviar.innerHTML = "<i class='fa fa-reply'></i> Enviar Visita";
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
			botaoEnviar.disabled = false;
			botaoEnviar.innerHTML = "<i class='fa fa-reply'></i> Enviar Visita";
        });
    }
</script>

<!-- ENVIA MOVIMENTO PARA O PROJETO  -->
<script>
    function postprojeto(idmovorigem) {

		// var enviarvisita = document.getElementById('enviarvisita'.concat(idmovorigem));		
		// enviarvisita.disabled = true;

		var enviarvisita2 = document.getElementById('enviarvisita2'.concat(idmovorigem));		
		enviarvisita2.disabled = true;

		var detalhamentoitens = document.getElementById('detalhamentoitens'.concat(idmovorigem)).value;
		
        var codccusto = '02.0181.00'; 
		var CODCOLIGADA = 1;
		var IDMOVORIGEM2 = idmovorigem;
		// // var SAMF_ENCARREGADO = document.getElementById('encarregado').value;
		// //var SAMF_ENCARREGADO = parseInt(document.getElementById('encarregado').value);
	
		// // //ABAIXO PEGANDO VALORES DOS CHECKBOX DE DADOS DE ENTRADA 
		var dadosdeentrada1Checkbox = document.getElementById('dadosdeentrada1'.concat(idmovorigem));
		var dadosdeentrada1 = dadosdeentrada1Checkbox ? (dadosdeentrada1Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada2Checkbox = document.getElementById('dadosdeentrada2'.concat(idmovorigem));
		var dadosdeentrada2 = dadosdeentrada2Checkbox ? (dadosdeentrada2Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada3Checkbox = document.getElementById('dadosdeentrada3'.concat(idmovorigem));
		var dadosdeentrada3 = dadosdeentrada3Checkbox ? (dadosdeentrada3Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada4Checkbox = document.getElementById('dadosdeentrada4'.concat(idmovorigem));
		var dadosdeentrada4 = dadosdeentrada4Checkbox ? (dadosdeentrada4Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada5Checkbox = document.getElementById('dadosdeentrada5'.concat(idmovorigem));
		var dadosdeentrada5 = dadosdeentrada5Checkbox ? (dadosdeentrada5Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada6Checkbox = document.getElementById('dadosdeentrada6'.concat(idmovorigem));
		var dadosdeentrada6 = dadosdeentrada6Checkbox ? (dadosdeentrada6Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada7Checkbox = document.getElementById('dadosdeentrada7'.concat(idmovorigem));
		var dadosdeentrada7 = dadosdeentrada7Checkbox ? (dadosdeentrada7Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada8Checkbox = document.getElementById('dadosdeentrada8'.concat(idmovorigem));
		var dadosdeentrada8 = dadosdeentrada8Checkbox ? (dadosdeentrada8Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada9Checkbox = document.getElementById('dadosdeentrada9'.concat(idmovorigem));
		var dadosdeentrada9 = dadosdeentrada9Checkbox ? (dadosdeentrada9Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada10Checkbox = document.getElementById('dadosdeentrada10'.concat(idmovorigem));
		var dadosdeentrada10 = dadosdeentrada10Checkbox ? (dadosdeentrada10Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada11Checkbox = document.getElementById('dadosdeentrada11'.concat(idmovorigem));
		var dadosdeentrada11 = dadosdeentrada11Checkbox ? (dadosdeentrada11Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada12Checkbox = document.getElementById('dadosdeentrada12'.concat(idmovorigem));
		var dadosdeentrada12 = dadosdeentrada12Checkbox ? (dadosdeentrada12Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada13Checkbox = document.getElementById('dadosdeentrada13'.concat(idmovorigem));
		var dadosdeentrada13 = dadosdeentrada13Checkbox ? (dadosdeentrada13Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada14Checkbox = document.getElementById('dadosdeentrada14'.concat(idmovorigem));
		var dadosdeentrada14 = dadosdeentrada14Checkbox ? (dadosdeentrada14Checkbox.checked ? 1 : 0) : 0;

		// ABAIXO ANTEPROJETO
		var app1Checkbox = document.getElementById('app1'.concat(idmovorigem));
		var app1 = app1Checkbox ? (app1Checkbox.checked ? 1 : 0) : 0;
		var app2Checkbox = document.getElementById('app2'.concat(idmovorigem));
		var app2 = app2Checkbox ? (app2Checkbox.checked ? 1 : 0) : 0;
		
		var ap2Checkbox = document.getElementById('ap2'.concat(idmovorigem));
		var ap2 = ap2Checkbox ? (ap2Checkbox.checked ? 1 : 0) : 0;


		// ABAIXO DADOS DA PRE PROGRAMAÇÃO 
		var pp1Checkbox = document.getElementById('pp1'.concat(idmovorigem));
		var pp1 = pp1Checkbox ? (pp1Checkbox.checked ? 1 : 0) : 0;

		var pp2Checkbox = document.getElementById('pp2'.concat(idmovorigem));
		var pp2 = pp2Checkbox ? (pp2Checkbox.checked ? 1 : 0) : 0;

		var pp3Checkbox = document.getElementById('pp3'.concat(idmovorigem));
		var pp3 = pp3Checkbox ? (pp3Checkbox.checked ? 1 : 0) : 0;

		var pp4 = document.getElementById('pp4'.concat(idmovorigem)).value;
		var pp5 = document.getElementById('pp5'.concat(idmovorigem)).value;
		var pp6 = document.getElementById('pp6'.concat(idmovorigem)).value;
		var pp7 = document.getElementById('pp7'.concat(idmovorigem)).value;

		
		var pp8Checkbox = document.getElementById('pp8'.concat(idmovorigem));
		var pp8 = pp8Checkbox ? (pp8Checkbox.checked ? 1 : 0) : 0;
		var pp9Checkbox = document.getElementById('pp9'.concat(idmovorigem));
		var pp9 = pp9Checkbox ? (pp9Checkbox.checked ? 1 : 0) : 0;
		var pp10Checkbox = document.getElementById('pp10'.concat(idmovorigem));
		var pp10 = pp10Checkbox ? (pp10Checkbox.checked ? 1 : 0) : 0;

		

		console.log(app1,app2,pp8,pp9,pp10,idmovorigem, detalhamentoitens);
	
		var complexidade;
		if (pp8 === 1) {
			complexidade = 1;
		} else if (pp9 === 1) {
			complexidade = 2;
		} else if (pp10 === 1) {
			complexidade = 3;
		} else {
			toastr.warning("Marque ao menos uma opção", "COMPLEXIDADE", {
					positionClass: "toast-top-right",
					timeOut: 5e3,
					closeButton: !0,
					debug: !1,
					newestOnTop: !0,
					progressBar: !0,
					preventDuplicates: !0,
					onclick: null,
					showDuration: "300",
					hideDuration: "1000",
					extendedTimeOut: "1000",
					showEasing: "swing",
					hideEasing: "linear",
					showMethod: "fadeIn",
					hideMethod: "fadeOut",
					tapToDismiss: !1
				});
				// enviarvisita.disabled = false;
				enviarvisita2.disabled = false;
			return; 
		}

		var anteprojeto;
		if (app1 === 1) {
			anteprojeto = 1;
		} else if (app2 === 1) {
			anteprojeto = 0;
		} else {
			toastr.warning("Marque ao menos uma opção", "NECESSITA PROJETO", {
					positionClass: "toast-top-right",
					timeOut: 5e3,
					closeButton: !0,
					debug: !1,
					newestOnTop: !0,
					progressBar: !0,
					preventDuplicates: !0,
					onclick: null,
					showDuration: "300",
					hideDuration: "1000",
					extendedTimeOut: "1000",
					showEasing: "swing",
					hideEasing: "linear",
					showMethod: "fadeIn",
					hideMethod: "fadeOut",
					tapToDismiss: !1
				});
				// enviarvisita.disabled = false;
				enviarvisita2.disabled = false;
			return; 
		}

		var anteprojeto;
		if (app1 === 1 && !detalhamentoitens) {
			toastr.warning("Quando necessitar de projeto, deve indicar quais ítens serão necessários!", "NECESSITA PROJETO", {
					positionClass: "toast-top-right",
					timeOut: 5e3,
					closeButton: !0,
					debug: !1,
					newestOnTop: !0,
					progressBar: !0,
					preventDuplicates: !0,
					onclick: null,
					showDuration: "300",
					hideDuration: "1000",
					extendedTimeOut: "1000",
					showEasing: "swing",
					hideEasing: "linear",
					showMethod: "fadeIn",
					hideMethod: "fadeOut",
					tapToDismiss: !1
				});
				enviarvisita2.disabled = false;
			return; 
		} 
		
			
		

		



		//ABAIXO DADOS DO PRODUTO MONTAGEM E DESMONTAGEM
		var codigoprdmontagem = '40.01.00001';
		var codigoprddesmontagem = '40.02.00001';

		var alturamontagem = document.getElementById('alturamontagem'.concat(idmovorigem)).value;
		var larguramontagem = document.getElementById('larguramontagem'.concat(idmovorigem)).value;
		var comprimentomontagem = document.getElementById('comprimentomontagem'.concat(idmovorigem)).value;
		// var andaimetotalmontagem = document.getElementById('andaimetotalmontagem'.concat(idmovorigem)).value;

		// var alturadesmontagem = document.getElementById('alturadesmontagem'.concat(idmovorigem)).value;
		// var larguradesmontagem = document.getElementById('larguradesmontagem'.concat(idmovorigem)).value;
		// var comprimentodesmontagem = document.getElementById('comprimentodesmontagem'.concat(idmovorigem)).value;
		// var andaimetotaldesmontagem = document.getElementById('andaimetotaldesmontagem'.concat(idmovorigem)).value;



		// // Pegando o valor do campo de texto

		// console.log('Valor do campo:', valorCampo);
		

		// // console.log('Dados de entrada:', SAMF_VS_DE1, desmontagemandaime, mobilizacao);


		// // // VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        // // if (mobilizacao == 0 && SAMF_VS_DE1 == 0 && desmontagemandaime == 0) {
			
        // //     toastr.warning("Marque ao menos uma opção", "Dados de Entrada", {
        // //             positionClass: "toast-top-right",
        // //             timeOut: 5e3,
        // //             closeButton: !0,
        // //             debug: !1,
        // //             newestOnTop: !0,
        // //             progressBar: !0,
        // //             preventDuplicates: !0,
        // //             onclick: null,
        // //             showDuration: "300",
        // //             hideDuration: "1000",
        // //             extendedTimeOut: "1000",
        // //             showEasing: "swing",
        // //             hideEasing: "linear",
        // //             showMethod: "fadeIn",
        // //             hideMethod: "fadeOut",
        // //             tapToDismiss: !1
        // //         });
        // //     return; 
        // // }


        var dados = {
			"CODCCUSTO": codccusto,
			"SAMF_VS_INTERFER1": dadosdeentrada1,
			"SAMF_VS_INTERFER2": dadosdeentrada2,
			"SAMF_VS_INTERFER3": dadosdeentrada3,
			"SAMF_VS_INTERFER4": dadosdeentrada4,
			"SAMF_VS_INTERFER5": dadosdeentrada5,
			"SAMF_VS_INTERFER6": dadosdeentrada6,
			"SAMF_VS_INTERFER7": dadosdeentrada7,
			"SAMF_VS_INTERFER8": dadosdeentrada8,
			"SAMF_VS_INTERFER9": dadosdeentrada9,
			"SAMF_VS_INTERFER10": dadosdeentrada10,
			"SAMF_VS_INTERFER11": dadosdeentrada11,
			"SAMF_VS_INTERFER12": dadosdeentrada12,
			"SAMF_VS_INTERFER13": dadosdeentrada13,
			"SAMF_VS_INTERFER14": dadosdeentrada14,
			"SAMF_VS_PP1": pp1,
			"SAMF_VS_PP2": pp2,
			"SAMF_VS_PP3": pp3,
			"SAMF_VS_PP4": pp4,
			"SAMF_VS_PP5": pp5,
			"SAMF_VS_PP6": pp6,
			"SAMF_VS_PP7": pp7,
			"SAMF_VS_COMPLX": complexidade,
			"SAMF_VS_AP1": anteprojeto,
			"SAMF_VS_AP2": ap2,
			'IDMOVORIGEM2': idmovorigem,
			'BM_ALTURA': alturamontagem,
			'BM_LARGURA': larguramontagem,
			'BM_COMPRIMENTO': comprimentomontagem

        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('insertGV2'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registro incluído com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				// enviarvisita.disabled = true;
				// enviarvisita.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";

				enviarvisita2.disabled = true;
				enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";


				var proximoIDMOVAndaime = data.proximoIDMOVAndaime;
				// var newUrl = <?php echo base_url('atendimentoPL/'); ?> + proximoIDMOVAndaime;

				var newUrl = "<?php echo base_url('atendimentoPL/'); ?>" + proximoIDMOVAndaime;

				setTimeout(function() {
					window.location.href = newUrl;
				}, 3000); // 3000 milissegundos = 3 segundos



            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
				// enviarvisita.disabled = false;
				enviarvisita2.disabled = false;
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
			// enviarvisita.disabled = false;
				enviarvisita2.disabled = false;
        });
    }

	
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