<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>

<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">

		<!-- BREADCRUMB DA PÁGINA -->
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">RDO</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Gestão de RDO</a>
				</li>
			</ol>
		</div>

		<!-- MODAIS PARA CANCELAMENTO DE RDO - CANCELAMENTO = TIRAR DO STATUS DE PENDENTE E COLOCAR C-->	
		<?php foreach($data2 as $p): ?>
		<div class="modal fade" id="m<?php echo $p['IDMOV']; ?>">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Canelamento de RDO</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<p>Tem certeza que deseja cancelar o RDO número: <?php echo $p['NUMEROMOV']; ?>?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="cancelarRDO(<?php echo $p['IDMOV']; ?>)" id="btncancelar">Sim, cancelar!</button>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?> 

		<!-- MODAIS PARA ENVIAR A O RDO PARA APROVAÇÃO -->	
		<?php foreach($data2 as $p): ?>
		<div class="modal fade" id="rdoaprov<?php echo $p['IDMOV']; ?>">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Enviando para aprovação</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<p>Tem certeza que deseja enviar o RDO para aprovação? RDO número: <?php echo $p['NUMEROMOV']; ?>?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="enviarAprovRDO(<?php echo $p['IDMOV']; ?>)" id="btncancelar">Sim, enviar!</button>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?> 

		<!-- MODAIS PARA REGISTROS EM APROVAÇÃO DO GESTOR -->	
		<?php foreach($emaprovacao as $p): ?>
		<div class="modal fade" id="rdoaprov<?php echo $p['IDMOV']; ?>">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Enviando para aprovação</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<p>Tem certeza que deseja enviar o RDO para aprovação do cliente? RDO número: <?php echo $p['NUMEROMOV']; ?>?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="enviarAprovRDOCliente(<?php echo $p['IDMOV']; ?>)" id="btncancelar">Sim, enviar!</button>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?> 


		<!-- MODAIS PARA REGISTROS EM APROVAÇÃO DO CLIENTE -->	
		<?php foreach($emaprovacaocliente as $p): ?>
		<div class="modal fade" id="rdoaprov<?php echo $p['IDMOV']; ?>">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Enviando para aprovação</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<p>Tem certeza que deseja aprovar o RDO número: <?php echo $p['NUMEROMOV']; ?>?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="enviarAprovRDOFinal(<?php echo $p['IDMOV']; ?>)" id="btncancelar">Sim, enviar!</button>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?> 

		<!-- MODAL PARA NOVO RDO  -->
		<div class="modal fade" id="novordomodal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Novo RDO</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<!-- INICIO MENU SUPERIOR DAS SOLICITAÇÕES --> 		
				<div class="container-fluid">                                       
					<h4 class="card-title">
					</h4> 					
					<div class="b-none">
						<div id="collapse2One" class="">
							<div class="accordion-body-text">
							<div class=""></div>
						</div>

						<div class="row">  

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<div class="mb-4">
										<h4 class="card-title">Responsável TOP <code2>*</code2></h4>
									</div>  
									<select class="form-control border-dark" name = "responsaveltop" id = "responsaveltop"  aria-label="Default select example">					
										<option value=""><?php echo isset($sessionData['USUARIO']) ? $sessionData['USUARIO'] : ''; ?></option> 								
									</select>
								</div>
							</div>	

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<div class="mb-4">
										<h4 class="card-title">Responsável Cliente <code2>*</code2></h4>
										<!-- <p>Selecione os <code>produtos</code> </p> -->
									</div>                                

									<select class="form-control border-dark" name="RDO_RESPONSAVEL_CLI2" id="RDO_RESPONSAVEL_CLI2"  aria-label="Default select example">									
									<option value=""></option>
									<option value="Joao">João</option>
									
									<?php 
									if (!empty($data4)): 
										foreach($data4 as $e): 
									?>	
										<option value="<?php echo $e['NOME']; ?>"><?php echo $e['NOME']; ?></option>
									<?php 
										endforeach; 
									endif; 
									?>
									</select>
								</div>
							</div>	

							<!-- ABAIXO CAMPOS NOVOS --> 
							<!-- <div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="card-title">Nome da tarefa </h4>
									<input id="SAMF_CLI_TEXTO_BREVE" width="100%" class="form-control" placehoolder = "0001" type="text"/>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="card-title">Descrição da ordem</h4>
									<input id="SAMF_CLI_DESC_OP" width="100%" class="form-control" placehoolder = "0001" type="text"/>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="card-title">Observações </h4>
									<input id="SAMF_OBSERVACAO" width="100%" class="form-control" placehoolder = "0001" type="text"/>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="card-title">TAG </h4>
									<input id="SAMF_CLI_TAG" width="100%" class="form-control" placehoolder = "0001" type="text"/>
								</div>
							</div> -->

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<div class="mb-4">
										<h4 class="card-title">Área nível 1<code2>*</code2></h4> 
									</div>  
									<select class="form-control border-dark" name = "SAMF_CLI_AREANV1" id = "SAMF_CLI_AREANV1"  aria-label="Default select example">		
										<option value="1"><?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?></option>		
									</select>
								</div>
							</div>

							<!-- <div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="card-title">Área nível 2<code2>*</code2></h4> 
									<input id="SAMF_CLI_AREANV2" width="100%" class="form-control" type="text"/>
								</div>
							</div> -->

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<div class="mb-4">
										<h4 class="card-title">Tipo Solicitação<code2>*</code2></h4> 
									</div>  
									<select class="form-control border-dark" name = "SAMF_CLI_TIPOSC" id = "SAMF_CLI_TIPOSC"  aria-label="Default select example">					
										<option value="1">1 - Planejada</option> 		
										<option value="2">2 - Emergencial</option> 
										<option value="3">3 - Orçamentação</option> 	
									</select>
								</div>
							</div>

							
							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
								<h4 class="card-title">Data referência<code2>*</code2></h4>
								<input id="mdate" name="datepicker" width="100%" class="form-control" placehoolder = "TOP 2024" />
								<script>
									$('#datepicker').datepicker({
										uiLibrary: 'bootstrap5'
									});
								</script>
								</div>
							</div>

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="">Turno de trabalho <code2>*</code2></h4>
								</div>
								<div class="card-body">
									<div class="basic-form">
										<form>
											<div class="mb-3 mb-0">
												<label class="radio-inline me-3"><input type="radio" name="optradio" id="turnodia"> Dia</label>
												<label class="radio-inline me-3"><input type="radio" name="optradio" id="turnonoite"> Noite </label>
											</div>
										</form>
									</div>
								</div>												
							</div>

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="">Tipo RDO <code2>*</code2> </h4>
								</div>
								<div class="card-body">
									<div class="basic-form">
										<form>
											<div class="mb-3 mb-0">
												<label class="radio-inline me-3"><input type="radio" name="optradio" id="tipoturno"> Turno</label>
												<label class="radio-inline me-3"><input type="radio" name="optradio" id="tipoadm"> ADM </label>
											</div>
										</form>
									</div>
								</div>												
							</div>


							<div class="card-header">
							
								<div class="row">
									<!-- <button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo" style = "font-size: 1em;">Incluir RDO</button> -->
								<div class="col-12">
									
							</div>				
						
						</div>
							
						</div>
					</div>
							</div>
						</div>
				</div>
			
		<!-- FIM MENU PARA INSERIR SOLICITAÇÃO -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal"  onclick="enviarDadosRDO()" id="btncancelar">Salvar</button>
					</div>
				</div>
			</div>
		</div>







		<!-- MENU PRINCIPAL DA PÁGINA -->
		<!-- <div class="container-fluid" id="pagesolicitacao">
			<div class="row">
				<div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
					<div class="btn-group">
						<button type="button" class="btn btn-primary light px-3"   aria-expanded="false"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
						<button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="false"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Adicionar RDO</button>
					</div>
					<div class="btn-group mb-1">
						<div class="btn-group mb-1 nav">
							<button href="#navpills2-1" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-1">Em Criação</button>
							<button href="#navpills2-2" type="button" class="btn btn-primary light px-3" class="nav-link active" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-2">Em Aprovação</button>
							<button href="#navpills2-3" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3">Aprovados</button>
						</div>
					</div>
				</div>
			</div>
		</div> -->

				

		<!-- MODAL PARA NOVO RDO -->
		<div class="modal fade" id="exampleModalpopover">
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
										<!-- <p>Selecione os <code>produtos</code> </p> -->
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
		</div>
		<!-- FIM MODAL PARA NOVO RDO -->


		
		<div class="container-fluid" id="pagesolicitacao">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
							<div class="btn-group mb-1">
								<button type="button" class="btn btn-primary light px-3"   aria-expanded="true"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
								<button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="modal" data-bs-target="#novordomodal" data-id="novordomodal"><i class="fa fa-plus"></i> Novo RDO</button>
								<!-- <button type="button" class="btn btn-primary light px-3"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel"><i type="button" class="fa fa-file-excel-o"></i></button> -->
							</div>
							<div class="btn-group mb-1">
								<button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-folder"></i> <b class="caret m-l-5"></b>
								</button>
								<div class="dropdown-menu" style="margin: 0px;"> 
									<a class="dropdown-item" href="javascript: void(0);">1</a> 
									<a class="dropdown-item" href="javascript: void(0);">2</a> 
									<a class="dropdown-item" href="javascript: void(0);">3</a>
									<a class="dropdown-item" href="javascript: void(0);">4</a>
								</div>
							</div>
							<div class="btn-group mb-1">
								<button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
									<i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
								</button>
								<div class="dropdown-menu"> 
									<a class="dropdown-item" href="javascript: void(0);">1</a> 
									<a class="dropdown-item" href="javascript: void(0);">2</a> 
									<a class="dropdown-item" href="javascript: void(0);">3</a>
									<a class="dropdown-item" href="javascript: void(0);">4</a>
								</div>
							</div>
							<div class="btn-group mb-1">
								<button type="button" class="btn btn-primary light dropdown-toggle v" data-bs-toggle="dropdown">Mais <span class="caret m-l-5"></span>
								</button>
								<div class="dropdown-menu"> 
									<a class="dropdown-item" href="javascript: void(0);">1</a> 
									<a class="dropdown-item" href="javascript: void(0);">2</a>
									<a class="dropdown-item" href="javascript: void(0);">3</a> 
									<a class="dropdown-item" href="javascript: void(0);">4</a>
								</div>
							</div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-xxl-2 col-md-2 text-center mb-3">
							<div class="btn-group mb-1 nav">
								<button href="#visaotabela" type="button" class="btn btn-primary light px-3 nav-link active" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#visaotabela"><i class="fa fa-align-justify" aria-hidden="false"></i> Tabela</button>
								<button href="#visaoresponsivo" type="button" class="btn btn-primary light px-3  nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#visaoresponsivo"><i class="fa fa-list-ul" aria-hidden="false"></i> Responsivo</button>
								<!-- <button href="#navpills2-3" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3"><i class="fa fa-list-ul" aria-hidden="true"></i> Dinâmico</button> -->
							</div>
                        </div>
                    </div>
                </div>

				<div class="tab-content">
					<div id="visaotabela" class="tab-pane active">
						<div class="row">
							<div class="col-md-12"> 


								<!-- <h1>abaixo tabela</h1> -->


								

								<div class="card">
											<!-- <div class="card-header">
												<h4 class="card-title">Gestão de RDO </h4><button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="false"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Adicionar RDO</button>
											</div> -->
											<div class="card-body">
												<ul class="nav nav-pills justify-content mb-4">
													<?php  if ($sessionData['CLIENTE'] === 0) { ?> 				
													<li class="nav-item">
														<a href="#navpills2-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Em criação tabela</a>
													</li>
													<li class="nav-item">
														<a href="#navpills2-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Em aprovação TOP</a>
													</li>
													<?php } ?>
													<?php  if ($sessionData['CLIENTE'] === 1 || $sessionData['CLIENTE'] === 0) { ?>  
													<li class="nav-item">
														<a href="#navpills2-4" class="nav-link <?php  if ($sessionData['CLIENTE'] === 1) { ?> active<?php } ?>" data-bs-toggle="tab" aria-expanded="false">Em aprovação Cliente</a>
													</li>
													<li class="nav-item">
														<a href="#navpills2-3" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Aprovados</a>
													</li>
													<?php } ?>

												</ul>
												<div class="tab-content" id="visaotabela" class="tab-pane active">
													<!-- RDO EM CRIAÇÃO -->
													<div id="navpills2-1" class="tab-pane <?php  if ($sessionData['CLIENTE'] === 0) { ?> active<?php } ?>">
														<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">

																		<select id="filter-codusuario" class="form-control">
																			<option value="">Todos</option>
																			<option value="Preenchido">Preenchido</option>
																			<option value="2">A preencher</option>
																			<option value="3">Ordem 3</option>
																		</select>


																		<div class="table-responsive">
																			<table id="emrdo_OLD" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col">OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>
													<!-- RDO EM APROVAÇÃO TOP -->
													<div id="navpills2-2" class="tab-pane">
													<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table id="emaprov_OLD" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col"><a>OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>

													<!-- RDO EM APROVAÇÃO DO CLIENTE -->
													<div id="navpills2-4" class="tab-pane <?php  if ($sessionData['CLIENTE'] === 1) { ?> active<?php } ?>">
														<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table id="emcliente_OLD" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col"><a>OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>


													<!-- RDO APROVADOS -->
													<div id="navpills2-3" class="tab-pane">
													<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table id="aprovados_OLD" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col"><a>OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
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
						</div>
					</div>




					<div id="visaoresponsivo" class="tab-pane">
						<div class="row">
							<div class="col-md-12"> 
										<!-- INÍCIO DOS DADOS RESPOSIVOS  -->

										<!-- <h1>Abaixo responsivo</h1> -->

										





										<div class="card">
											<!-- <div class="card-header">
												<h4 class="card-title">Gestão de RDO </h4><button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="false"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Adicionar RDO</button>
											</div> -->
											<div class="card-body">
												<ul class="nav nav-pills justify-content mb-4">
													<?php  if ($sessionData['CLIENTE'] === 0) { ?> 				
													<li class=" nav-item">
														<a href="#navpills2-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Em criação responsivo</a>
													</li>
													<li class="nav-item">
														<a href="#navpills2-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Em aprovação TOP</a>
													</li>
													<?php } ?>
													<?php  if ($sessionData['CLIENTE'] === 1 || $sessionData['CLIENTE'] === 0) { ?>  
													<li class="nav-item">
														<a href="#navpills2-4" class="nav-link <?php  if ($sessionData['CLIENTE'] === 1) { ?> active<?php } ?>" data-bs-toggle="tab" aria-expanded="false">Em aprovação Cliente</a>
													</li>
													<li class="nav-item">
														<a href="#navpills2-3" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Aprovados</a>
													</li>
													<?php } ?>

												</ul>
												<div class="tab-content" id="visaotabela" class="tab-pane active">
													<!-- RDO EM CRIAÇÃO -->
													<div id="navpills2-1" class="tab-pane <?php  if ($sessionData['CLIENTE'] === 0) { ?> active<?php } ?>">
														<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">

																		<select id="filter-codusuario" class="form-control">
																			<option value="">Todos</option>
																			<option value="Preenchido">Preenchido</option>
																			<option value="2">A preencher</option>
																			<option value="3">Ordem 3</option>
																		</select>


																		<div class="table-responsive">
																			<table id="emrdo" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col">OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>
													<!-- RDO EM APROVAÇÃO TOP -->
													<div id="navpills2-2" class="tab-pane">
													<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table id="emaprov" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col"><a>OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>

													<!-- RDO EM APROVAÇÃO DO CLIENTE -->
													<div id="navpills2-4" class="tab-pane <?php  if ($sessionData['CLIENTE'] === 1) { ?> active<?php } ?>">
														<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table id="emcliente_OLD" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col"><a>OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>


													<!-- RDO APROVADOS -->
													<div id="navpills2-3" class="tab-pane">
													<div class="row">
															<!-- INÍCIO DO DATATABLE -->
															<div class="col-12">                        
																<div class="card">
																	<div class="card-header">
																		<!-- <h4 class="card-title">RDO EM CRIAÇÃO</h4> -->
																		<div class="row">
																			<div class="btn-group mb-1">
																				<!-- <button type="button" class="btn btn-light light px-3"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> Exportar PDF</i></button>
																				<button type="button" class="btn btn-light light px-3"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Exportar Excel</i></button> -->
																				<!-- <button type="button" class="btn btn-outline-dark px-3"  onclick="cancelarSCLote_OLD()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
																				<button type="button" class="btn btn-outline-dark px-3"  onclick="enviarvisita_OLD()"><i type="button" class="fa fa-reply"> Enviar para Aprovação</i></button> -->
																			</div>
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table id="aprovados_OLD" class="display" style="min-width: 845px; width:100%;">
																				<thead>
																					<tr>
																						<!-- <th>
																							<div class="form-check custom-checkbox ms-2">
																								<input type="checkbox" class="form-check-input" id="checkAll" required="">
																								<label class="form-check-label" for="checkAll"></label>
																							</div>
																						</th> -->
																						<th scope="col"></th>
																						<th scope="col"><a>OS TOP</a></th>
																						<th scope="col">RESPONSÁVEL TOP</th>
																						<th scope="col">DATA REFERÊNCIA</th>
																						<th scope="col">STATUS</th>
																					</tr>
																				</thead>
																				<tbody>													
																									
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>			
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>



								

														


														
									














										<!-- FIM DOS DADOS RESPONSIVOS --> 






							
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






	
		<!-- DADOS DO RDO ANTIGO QUE DEVEM IR PARA O MODAL DO NOVO RDO	 -->
		<div class="card-body d-none">
			<div class="col-xl-12 col-xxl-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Criação de RDO - <?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?></h4></small></h4> 
							
							<div class="row">
								<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo">Incluir RDO</button>
							<div class="col-12">                            
						</div>
					</div>
				</div>             
				<div class="row">    					
					<div class="col-xl-3">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Gestor da obra</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>   
							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
								
									<option value="">foreach</option>
								
							</select>
						</div>
					</div>

					<div class="col-xl-3">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Local de débito</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-3">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Classe de custo</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-3">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Supervisor solicitante</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>		

					<!-- ABAIXO DADOS DA TOP -->

					<div class="col-xl-4">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Cordenador da obra</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
								<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-4">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Setor</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-4">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Encarregado do trabalho</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>
										
					<div class="col-xl-12">                           
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Descrição das atividades</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>
							<div class="mb-3">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							</div>
						</div>                           
					</div>

					<div class="col-xl-2">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Area</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-2">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Local</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-2">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Empresa</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-2">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Piso</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-2">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">N° Equipamento</h4>
								<!-- <p>Selecione os <code>produtos</code> </p> -->
							</div>                                

							<select class="form-control" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
							<option value="">foreach</option>
							</select>
						</div>
					</div>

					<div class="col-xl-2">
						<div class="card-body">
							<h4 class="card-title">Data referência</h4>
							<input id="mdate" name="datepicker" width="100%" class="form-control" placehoolder = "TOP 2024" />
							<script>
								$('#datepicker').datepicker({
									uiLibrary: 'bootstrap5'
								});
							</script>
						</div>


							<!-- <input type="text" class="form-control datepicker" placeholder="2024 TOP Andaimes" id="mdate">-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- AQUI FIM DO CABEÇALHO PARA INSERIR UM RDO INICIALMENTE --> 
		
			<!-- AQUI INÍCIO DE CADA RDO INSERIDO -->
			<div class="col-12 d-none">
				<div class="card">
					<div class="card-body">
						<div class="accordion accordion-primary" id="accordion-two">
							<div class="accordion-item">
								<div class="accordion-header  rounded-lg" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One"   aria-expanded="false"  role="button">
									<!-- <span class="accordion-header-text">RDO [ID] DATA [DIA]</span> -->
									<span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2One" class="collapse accordion__body show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
									<!-- ABAIXO CONTEÚDO DE CADA RDO -->
									<div class="accordion accordion-primary" id="accordion-one">
										<div class="accordion-item">
											<div class="accordion-header rounded-lg text-center collapsed" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne"   aria-expanded="false" role="button">
												<span class="accordion-header-icon"></span>
												<span class="accordion-header-text">Atividades Executadas</span>
												<span class="accordion-header-indicator"></span>
											</div>
											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
												<div class="accordion-body-text">
													<div class="row">

														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox6" required>
																<label class="form-check-label" for="customCheckBox6">Montagem de Andaimes </label>
															</div>
														</div>
																	
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox6" required>
																<label class="form-check-label" for="customCheckBox6">Desmontagem de Andaimes</label>
															</div>
														</div>

														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox6" required>
																<label class="form-check-label" for="customCheckBox6">Mob. E Desmobilização de Material</label>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<div class="accordion-header rounded-lg text-center collapsed" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="false">
												<span class="accordion-header-text">Impactos na Tarefa</span>
												<span class="accordion-header-indicator"></span>
											</div>
											<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
												<div class="accordion-body-text">
													<div class="row">
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Interferência c/ Outra Atividade </label>
															</div>
														</div>
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Operação Não Liberou Atividade</label>
															</div>
														</div>
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Transferência para outra Atividade </label>
															</div>
														</div>

														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Chuva</label>
															</div>
														</div>
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Vento Forte</label>
															</div>
														</div>
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Local Inseguro P/ Executar Ativ</label>
															</div>
														</div>

														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Falta do Responsável Bloqueio</label>
															</div>
														</div>
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Falta de Energia</label>
															</div>
														</div>
														<div class="col-4">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<input type="checkbox" class="form-check-input"  id="customCheckBox9" required>
																<label class="form-check-label" for="customCheckBox9">Falta de Equipamento Solicitado P/ Apoio</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<div class="accordion-item">
										<div class="accordion-header rounded-lg text-center collapsed" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
											<span class="accordion-header-text text-center">Andaimes</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div class="row">
											<div class="col-1 mt-3">
												<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="toastr-success-bottom-right">Incluir RDO</button>
											</div>
										</div>

										<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
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
																				<th>QR</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			
																			<tr>
																				<th>1</th>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td><input type="text" class="form-control bg-light" disabled placeholder="0"></td>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																					</div>
																				</td>
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
																				<th>QR</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			
																			<tr>
																				<th>1</th>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td><input type="text" class="form-control bg-light" disabled placeholder="0"></td>
																				<td><input type="text" class="form-control" placeholder="0"></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																					</div>
																				</td>
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
										</div>
			<div class="accordion-item">
			<div class="accordion-header rounded-lg  collapsed text-center" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
				<span class="accordion-header-text">Atividades em Horário Comum</span>
				<span class="accordion-header-indicator"></span>
			</div>
			<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
				<div class="accordion-body-text">
				<div class="col-lg-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h4 class="card-title">Infor</h4>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Matrícula</strong></th>
                                        <th><strong>Nome</strong></th>
                                        <th><strong>Função</strong></th>
                                        <th><strong>Início</strong></th>
										<th><strong>Fim</strong></th>
                                        <th><strong></strong></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($data3 as $f): ?>
                                    <tr>
										<td><?php echo $f['CHAPA']; ?></td>
                                        <td><?php echo $f['FUNCIONARIO']; ?></td>
                                        <td><?php echo $f['FUNCAO']; ?></td>
                                        <td>											
											<div class="input-group clockpicker">
												<input type="text" class="form-control" value="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span>
											</div>
										</td>
										<td>											
											<div class="input-group clockpicker">
												<input type="text" class="form-control" value="18:00"><span class="input-group-text"><i class="far fa-clock"></i></span>
											</div>
										</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>			
		</div>
	</div>
</div>
</div><!-- FIM DO ACORDION INTERNO DE CADA RDO CRIADO --> 	

					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- AQUI FIM DE CADA RDO INSERIDO -->



			</div>	
		</div>
	</div>
</div>


<!-- SCRIPT PARA ADICIONAR MOVIMENTO DO RDO -->
<script>
    function enviarDadosRDO() {

        var SAMF_CLI_AREANV1 = document.getElementById('SAMF_CLI_AREANV1').value; 
        // var SAMF_CLI_AREANV2 = document.getElementById('SAMF_CLI_AREANV2').value; 
        var SAMF_CLI_TIPOSC = document.getElementById('SAMF_CLI_TIPOSC').value; 		
        var DATAEXTRA1 = document.getElementById('mdate').value; 
		var RDO_RESPONSAVEL_CLI2 = document.getElementById('RDO_RESPONSAVEL_CLI2').value; 
		
		var turnodiaCheckbox = document.getElementById('turnodia');
		var turnodia = turnodiaCheckbox ? (turnodiaCheckbox.checked ? 1 : 0) : 0;
		
		var turnonoiteCheckbox = document.getElementById('turnonoite');
		var turnonoite = turnonoiteCheckbox ? (turnonoiteCheckbox.checked ? 1 : 0) : 0;

		var tipoturnoCheckbox = document.getElementById('tipoturno');
		var tipoturno = tipoturnoCheckbox ? (tipoturnoCheckbox.checked ? 1 : 0) : 0;

		var tipoadmCheckbox = document.getElementById('tipoadm');
		var tipoadm = tipoadmCheckbox ? (tipoadmCheckbox.checked ? 1 : 0) : 0;

		
		if (turnodia == 1) {
			RDO_TURNO = 1;
		} else if (turnonoite == 1) {
			RDO_TURNO = 2;
		} else {
			toastr.warning( "Turno não preenchido!","TURNO", {
				positionClass: "toast-top-right",
				timeOut: 5000,
				closeButton: true,
				debug: false,
				newestOnTop: true,
				progressBar: true,
				preventDuplicates: true,
				onclick: null,
				showDuration: "300",
				hideDuration: "1000",
				extendedTimeOut: "1000",
				showEasing: "swing",
				hideEasing: "linear",
				showMethod: "fadeIn",
				hideMethod: "fadeOut",
				tapToDismiss: false
			});
			return; 
		}

		if (tipoturno == 1) {
			SAMF_RDO_TIPORDO = 1;
		} else if (tipoadm == 1) {
			SAMF_RDO_TIPORDO = 2;
		} else {
			toastr.warning( "Tipo não preenchido!","TIPO RDO", {
				positionClass: "toast-top-right",
				timeOut: 5000,
				closeButton: true,
				debug: false,
				newestOnTop: true,
				progressBar: true,
				preventDuplicates: true,
				onclick: null,
				showDuration: "300",
				hideDuration: "1000",
				extendedTimeOut: "1000",
				showEasing: "swing",
				hideEasing: "linear",
				showMethod: "fadeIn",
				hideMethod: "fadeOut",
				tapToDismiss: false
			});
			return; 
		}


        
        if (!DATAEXTRA1) {
            toastr.warning("DATA REFERÊNCIA", "Data não preenchida!", {
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

		if (!RDO_RESPONSAVEL_CLI2) {
            toastr.warning("RESPONSÁVEL CLIENTE", "Informação não preenchida!", {
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
            "SAMF_CLI_AREANV1": SAMF_CLI_AREANV1,
            // "SAMF_CLI_AREANV2": SAMF_CLI_AREANV2,
            "SAMF_CLI_TIPOSC": SAMF_CLI_TIPOSC,
            "DATAEXTRA1": DATAEXTRA1,
			"RDO_RESPONSAVEL_CLI2": RDO_RESPONSAVEL_CLI2,
			"RDO_TURNO": RDO_TURNO,
			"SAMF_RDO_TIPORDO": SAMF_RDO_TIPORDO
        };

        console.log(dados);
		// return;

        fetch('<?php echo base_url('insertRDO'); ?>', {
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
                
                // Limpa os campos após o envio bem-sucedido
                // limparCampos();
				setTimeout(datatableRDO, 0);

            } else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.warning("Erro ao executar comando**", "Tente novamente", {
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


</script>







<!-- ENVIAR SOLICITAÇÃO PARA VISITA -->

<script>
    function enviarvisita(idmovorigem) {

		// var botaoEnviar = document.getElementById('enviarvisita'.concat(idmovorigem))		
		// botaoEnviar.disabled = true;
		// botaoEnviar.innerHTML = "<i class='fa fa-check'></i> Visita Enviada";

        // var codccusto = '02.0181.00'; 
		// var SAMF_ENCARREGADO = document.getElementById('encarregado').value;
		// var SAMF_ENCARREGADO = parseInt(document.getElementById('encarregado' + idmovorigem).value);


		//var SAMF_ENCARREGADO = 2;
		var IDMOV = idmovorigem;
		var CODCOLIGADA = 1;


		
        // Dados a serem enviados no corpo da solicitação fetch
        var dados = {
            "IDMOVORIGEM": idmovorigem
			// "IDMOV": IDMOV,
			// "CODCOLIGADA": CODCOLIGADA
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
                setTimeout(datatableSC, 0);
				// botaoEnviar.value = "Visita Enviada";
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
				// botaoEnviar.disabled = false;
				// botaoEnviar.innerHTML = "<i class='fa fa-reply'></i> Enviar Visita";


				// var proximoIDMOVAndaime = data.proximoIDMOVAndaime;
				// console.log (proximoIDMOVAndaime);


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
			// botaoEnviar.disabled = false;
			// botaoEnviar.innerHTML = "<i class='fa fa-reply'></i> Enviar Visita";

			// var proximoIDMOVAndaime = data.proximoIDMOVAndaime;
			// 	console.log (proximoIDMOVAndaime);
        });
    }
</script>





<!-- CANCELAR RDO -->
<script>
    function cancelarRDO(IDMOV) {
        var STATUS = 'C';
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('cancelarSC'); ?>', {
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
                toastr.success("Registro cancelado com sucesso!", "TOP Andaimes", {
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

                setTimeout(datatableRDO, 0);

				// btncancelar.disabled = true;
				// btncancelar.innerHTML = "Visita Cancelada!";


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

				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
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
				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>







<!-- ENVIAR RDO PARA APROVAÇÃO DO GESTOR TOP  -->
<script>
    function enviarAprovRDO(IDMOV) {
        var STATUS = 'G';
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('cancelarSC'); ?>', {
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
                toastr.success("Registro enviado com sucesso!", "TOP Andaimes", {
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

                setTimeout(datatableRDO, 0);
				setTimeout(datatableRDOAprov, 0);				
				setTimeout(RDODatatableCliente, 0);

				// btncancelar.disabled = true;
				// btncancelar.innerHTML = "Visita Cancelada!";


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

				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
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
				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>








<!-- ENVIAR RDO PARA APROVAÇÃO DO CLIENTE  -->
<script>
    function enviarAprovRDOCliente(IDMOV) {
        var STATUS = 'F';
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('cancelarSC'); ?>', {
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
                toastr.success("Registro enviado com sucesso!", "TOP Andaimes", {
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

                setTimeout(datatableRDO, 0);
				setTimeout(datatableRDOAprov, 0);
				setTimeout(RDODatatableCliente, 0);
				setTimeout(datatableRDOFinal, 0);
				

				// btncancelar.disabled = true;
				// btncancelar.innerHTML = "Visita Cancelada!";


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

				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
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
				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>




<!-- ENVIAR RDO PARA APROVAÇÃO FINAL  -->
<script>
    function enviarAprovRDOFinal(IDMOV) {
        var STATUS = 'Q';
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('cancelarSC'); ?>', {
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
                toastr.success("Registro enviado com sucesso!", "TOP Andaimes", {
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

                setTimeout(datatableRDO, 0);
				setTimeout(datatableRDOAprov, 0);
				setTimeout(RDODatatableCliente, 0);
				setTimeout(datatableRDOFinal, 0);
				

				// btncancelar.disabled = true;
				// btncancelar.innerHTML = "Visita Cancelada!";


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

				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
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
				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>


                <!-- GERACAO DO PDF E EXCEL -->
                <script>
                    $(document).ready(function() {
                        // Função para exportar a tabela para Excel usando SheetJS
                        function exportTableToExcel(tableID, filename = ''){
                            var wb = XLSX.utils.book_new();
                            var table = document.getElementById(tableID);
                            var ws = XLSX.utils.table_to_sheet(table);
                            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
                            XLSX.writeFile(wb, filename || 'export.xlsx');
                        }

                        // Vincula o botão à função de exportação para Excel
                        $('#exportar_excelSC').on('click', function() {
                            exportTableToExcel('emrdo', 'solicitacoes.xlsx');
                        });

                        

                         // Vincula o botão à função de exportação para Excel
                         $('#exportar_excelEX').on('click', function() {
                            exportTableToExcel('emexecucao', 'Execucoes.xlsx');
                        });

                        // Função para exportar a tabela para PDF usando jsPDF
                        async function exportTableToPDF(tableID, filename = ''){
                            const { jsPDF } = window.jspdf;
                            var doc = new jsPDF('p', 'pt', 'a4'); // Instancia o jsPDF
                            var table = document.getElementById(tableID); // Obtém a tabela
                            var rows = [];
                            var headers = [];

                            // Adiciona os cabeçalhos da tabela
                            $(table).find('thead th').each(function() {
                                headers.push($(this).text());
                            });
                            rows.push(headers);

                            // Adiciona os dados da tabela
                            $(table).find('tbody tr').each(function() {
                                var row = [];
                                $(this).find('td').each(function() {
                                    row.push($(this).text());
                                });
                                rows.push(row);
                            });

                            // Configurações para a tabela no PDF
                            doc.autoTable({
                                head: [headers],
                                body: rows,
                                startY: 20,
                                theme: 'grid'
                            });

                            // Salva o PDF com o nome especificado
                            doc.save(filename || 'export.pdf');
                        }

                        // Vincula o botão à função de exportação para PDF
                        $('#exportar_pdfSC').on('click', function() {
                            exportTableToPDF('emrdo', 'solicitacoes.pdf');
                        });

                        // Vincula o botão à função de exportação para PDF
                        $('#exportar_pdfVS').on('click', function() {
                            exportTableToPDF('emvisita', 'Visitas.pdf');
                        });

                        // Vincula o botão à função de exportação para PDF
                        $('#exportar_pdfEX').on('click', function() {
                            exportTableToPDF('emexecucao', 'Execucoes.pdf');
                        });
                    });
                    </script>




                <script>
                    function datatableRDO() {
						
                        if ( $.fn.DataTable.isDataTable('#emrdo') ) {
                            $('#emrdo').DataTable().clear().destroy();
                        }

                        var table = $('#emrdo').DataTable({
							"pageLength": 200,
                            ajax: '<?php echo base_url('RDODatatables') ?>',
                            columns: [
                                // {
                                    
                                //     data: null,
                                //     render: function (data, type, row) {
                                //         return '<div class="form-check custom-checkbox ms-2">' +
                                //             '<input type="checkbox" class="form-check-input" id="check" required="" value="' + row.IDMOV + '"> </div>';                                           
                                //     }
                                // },
								{
									data: null,
									render: function (data, type, row) {
										var replyButton = '';
										if (row.STATUS !== 'A') {
											replyButton = '<a class="btn btn-success shadow btn-xs sharp">' +
												'<i class="fa fa-reply" data-bs-toggle="modal" data-bs-target="#rdoaprov' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>';
										}

										return '<div class="d-flex">' +
											'<a href="atendimentoRDO/' + row.IDMOV + '" class="btn btn-warning shadow btn-xs sharp me-1">' +
											'<i class="fas fa-pencil-alt"></i></a>' +
											'<a href="#" class="btn btn-danger shadow btn-xs sharp">' +
											'<i class="fa fa-trash" data-bs-toggle="modal" data-bs-target="#m' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>' +
											replyButton + '</div>';
									}
								},
                                { data: "NUMEROMOV" },
                                { data: "CODUSUARIO" },
                                { data: "DATAEXTRA1" },
								{data: "STATUS",
									render: function(data, type, row) {
										// Aplica a regra de transformação dos valores de STATUS
										switch (data) {
										case 'A':
										return 'A preencher';
										case 'B':
										return 'Preenchido';
										return 'Desconhecido';
									}
								}
								}
                                
                                
                            ]
                        });

					// Filtrar a tabela com base na seleção do usuário
					$('#filter-codusuario').on('change', function() {
						var selectedValue = $(this).val();
						if (selectedValue) {
							table.column(1).search('^' + selectedValue + '$', true, false).draw();
						} else {
							table.column(1).search('').draw();
						}
					});
									}

					// Inicializa o DataTable quando o documento estiver pronto
					$(document).ready(function() {
						datatableRDO();
					});	

                        // <td>
                        //                     <div class="form-check custom-checkbox ms-2">
                        //                         <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                        //                         <label class="form-check-label" for="customCheckBox2"></label>
                        //                     </div>
                        //                 </td>

                        // Coloca os botões na página
                        // table.buttons().container().appendTo($('.dt-buttons'));

                        // Vincula o botão manual à ação de exportação
                        // $('#exportar_excelSC_OLD').on('click', function() {
                        //     table.button('.btn btn-success').trigger('click'); // Dispara o clique no botão de exportar para Excel
                        // });
                   				
					

							// 	$(document).ready(function() {
							// 	var table = $('#emrdo').DataTable({
							// 		"pageLength": 200,
							// 		ajax: '<?php echo base_url('RDODatatables') ?>',
							// 		columns: [
							// 			// Suas colunas aqui
							// 			{ data: "NUMEROMOV" },
							// 			{ data: "CODUSUARIO" },
							// 			{ data: "DATAEXTRA1" },
							// 			{
							// 				data: "STATUS",
							// 				render: function(data, type, row) {
							// 					switch (data) {
							// 						case 'A':
							// 							return 'A preencher';
							// 						case 'B':
							// 							return 'Preenchido';
							// 						default:
							// 							return 'Desconhecido';
							// 					}
							// 				}
							// 			}
							// 		]
							// 	});

							// 	// Filtrar a tabela com base na seleção do usuário
							// 	$('#filter-codusuario').on('change', function() {
							// 		var selectedValue = $(this).val();
							// 		if (selectedValue) {
							// 			table.column(1).search('^' + selectedValue + '$', true, false).draw();
							// 		} else {
							// 			table.column(1).search('').draw();
							// 		}
							// 	});
							// });



                </script>



				<script>
                    function datatableRDOAprov() {
						
                        if ( $.fn.DataTable.isDataTable('#emaprov') ) {
                            $('#emaprov').DataTable().clear().destroy();
                        }

                        var table = $('#emaprov').DataTable({
							"pageLength": 200,
                            ajax: '<?php echo base_url('RDODatatablesAprov') ?>',
                            columns: [
                                // {
                                    
                                //     data: null,
                                //     render: function (data, type, row) {
                                //         return '<div class="form-check custom-checkbox ms-2">' +
                                //             '<input type="checkbox" class="form-check-input" id="check" required="" value="' + row.IDMOV + '"> </div>';                                           
                                //     }
                                // },
								{
									data: null,
									render: function (data, type, row) {
										var replyButton = '';
										if (row.STATUS !== 'A') {
											replyButton = '<a class="btn btn-success shadow btn-xs sharp">' +
												'<i class="fa fa-reply" data-bs-toggle="modal" data-bs-target="#rdoaprov' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>';
										}

										return '<div class="d-flex">' +
											'<a href="atendimentoRDOGestor/' + row.IDMOV + '" class="btn btn-warning shadow btn-xs sharp me-1">' +
											'<i class="fa fa-laptop"></i></a>' +
											'<a href="#" class="btn btn-danger shadow btn-xs sharp">' +
											'<i class="fa fa-trash" data-bs-toggle="modal" data-bs-target="#m' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>' +
											replyButton + '</div>';
									}
								},
                                { data: "NUMEROMOV" },
                                { data: "CODUSUARIO" },
                                { data: "DATAEXTRA1" }
                                
                                
                            ]
                        });

                        // <td>
                        //                     <div class="form-check custom-checkbox ms-2">
                        //                         <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                        //                         <label class="form-check-label" for="customCheckBox2"></label>
                        //                     </div>
                        //                 </td>

                        // Coloca os botões na página
                        // table.buttons().container().appendTo($('.dt-buttons'));

                        // Vincula o botão manual à ação de exportação
                        // $('#exportar_excelSC_OLD').on('click', function() {
                        //     table.button('.btn btn-success').trigger('click'); // Dispara o clique no botão de exportar para Excel
                        // });
                    }

                    // Inicializa o DataTable quando o documento estiver pronto
                    $(document).ready(function() {
                        datatableRDOAprov();
                    });
                    </script>




				<script>
                    function datatableRDOFinal() {
						
                        if ( $.fn.DataTable.isDataTable('#aprovados') ) {
                            $('#aprovados').DataTable().clear().destroy();
                        }

                        var table = $('#aprovados').DataTable({
							"pageLength": 200,
                            ajax: '<?php echo base_url('RDODatatableFinal') ?>',
                            columns: [
                                // {
                                    
                                //     data: null,
                                //     render: function (data, type, row) {
                                //         return '<div class="form-check custom-checkbox ms-2">' +
                                //             '<input type="checkbox" class="form-check-input" id="check" required="" value="' + row.IDMOV + '"> </div>';                                           
                                //     }
                                // },
								{
									data: null,
									render: function (data, type, row) {
										var replyButton = '';
										if (row.STATUS !== 'A') {
											replyButton = '<a class="btn btn-success shadow btn-xs sharp">' +
												'<i class="fa fa-reply" data-bs-toggle="modal" data-bs-target="#rdoaprov' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>';
										}

										return '<div class="d-flex">' +
											'<a href="RDOPDF/' + row.IDMOV + '" class="btn btn shadow btn-xs sharp me-1">' +
											'<i class="fa fa-file-pdf-o"> PDF</i></a>';
									}
								},
                                { data: "NUMEROMOV" },
                                { data: "CODUSUARIO" },
                                { data: "DATAEXTRA1" }
                                
                                
                            ]
                        });

                        // <td>
                        //                     <div class="form-check custom-checkbox ms-2">
                        //                         <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                        //                         <label class="form-check-label" for="customCheckBox2"></label>
                        //                     </div>
                        //                 </td>

                        // Coloca os botões na página
                        // table.buttons().container().appendTo($('.dt-buttons'));

                        // Vincula o botão manual à ação de exportação
                        // $('#exportar_excelSC_OLD').on('click', function() {
                        //     table.button('.btn btn-success').trigger('click'); // Dispara o clique no botão de exportar para Excel
                        // });
                    }

                    // Inicializa o DataTable quando o documento estiver pronto
                    $(document).ready(function() {
                        datatableRDOFinal();
                    });
                    </script>





<script>
                    function RDODatatableCliente() {
						
                        if ( $.fn.DataTable.isDataTable('#emcliente') ) {
                            $('#emcliente').DataTable().clear().destroy();
                        }

                        var table = $('#emcliente').DataTable({
							"pageLength": 200,
                            ajax: '<?php echo base_url('RDODatatableCliente') ?>',
                            columns: [
                                // {
                                    
                                //     data: null,
                                //     render: function (data, type, row) {
                                //         return '<div class="form-check custom-checkbox ms-2">' +
                                //             '<input type="checkbox" class="form-check-input" id="check" required="" value="' + row.IDMOV + '"> </div>';                                           
                                //     }
                                // },
								{
									data: null,
									render: function (data, type, row) {
										var replyButton = '';
										if (row.STATUS !== 'A') {
											replyButton = '<a class="btn btn-success shadow btn-xs sharp">' +
												'<i class="fa fa-reply" data-bs-toggle="modal" data-bs-target="#rdoaprov' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>';
										}

										return '<div class="d-flex">' +
											'<a href="atendimentoRDOCliente/' + row.IDMOV + '" class="btn btn-warning shadow btn-xs sharp me-1">' +
											'<i class="fa fa-laptop"></i></a>' +
											replyButton + '</div>';
									}
								},
                                { data: "NUMEROMOV" },
                                { data: "CODUSUARIO" },
                                { data: "DATAEXTRA1" }
                                
                                
                            ]
                        });

                        // <td>
                        //                     <div class="form-check custom-checkbox ms-2">
                        //                         <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                        //                         <label class="form-check-label" for="customCheckBox2"></label>
                        //                     </div>
                        //                 </td>

                        // Coloca os botões na página
                        // table.buttons().container().appendTo($('.dt-buttons'));

                        // Vincula o botão manual à ação de exportação
                        // $('#exportar_excelSC_OLD').on('click', function() {
                        //     table.button('.btn btn-success').trigger('click'); // Dispara o clique no botão de exportar para Excel
                        // });
                    }

                    // Inicializa o DataTable quando o documento estiver pronto
                    $(document).ready(function() {
                        RDODatatableCliente();
                    });
                    </script>




<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>