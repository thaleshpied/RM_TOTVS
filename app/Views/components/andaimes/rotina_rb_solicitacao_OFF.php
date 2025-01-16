<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">

	<!-- <div class="row">
		<div class="col-12">           
			<button type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" id="toastr-success-bottom-right"><i class="fa fa-reply" data-bs-toggle="modal" data-bs-target="#exampleModalpopover"></i></button>                                  
			<button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" id="toasttoastr-danger-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"></i></button>
		</div>
	</div>  -->


	<!-- Modal -->
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
									<h4 class="card-title">Competência</h4>
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
	
	<div class="card-body">
	<div class="col-xl-12 col-xxl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Criação de RDO <small>n° <code>2024001</code></h4></small></h4> 
						
                        <div class="row">
							<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo">Incluir RDO</button>
                        <div class="col-12">
                            
                    </div>
                    </div>
					</div>

                    <!-- resources/views/components/table/rotina_rb_solicitacao.blade.php -->
            
                    <!-- <div class="card-body">
                        <h5>Usuário: [VAR_NOMEUSUARIO] - Centro de custo: [VAR_CENTRO_DE_CUSTO]</h5>
					</div>   -->

                    <div class="row">    
					
						<div class="col-xl-3">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Gestor do contrato</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-3">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Local de débito</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-3">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Classe de custo</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-3">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Supervisor solicitante</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
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

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-4">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Setor</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-4">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Encarregado do trabalho</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
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

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-2">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Local</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-2">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Empresa</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-2">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">Piso</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

						<div class="col-xl-2">
							<div class="card-body">
								<div class="mb-4">
									<h4 class="card-title">N° Equipamento</h4>
									<!-- <p>Selecione os <code>produtos</code> </p> -->
								</div>                                

								<select class="form-select" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">
									<?php foreach($data as $p): ?>
										<option value="<?php echo $p['CODTB1FLX']; ?>"><?php echo $p['LABEL']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                        </div>

                        <div class="col-xl-2">
							<div class="card-body">
								<h4 class="card-title">Data referência1</h4>
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
                    <!-- <div class="row">
                        <div class="container">
                            <div class="col-12">  
                                    <button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="toastr-success-bottom-right">Incluir</button>
                            </div>
                        </div>
                    </div> -->
                </div>
			</div><!-- AQUI FIM DO CABEÇALHO PARA INSERIR UM RDO INICIALMENTE --> 
		
			<div class="col-12"><!-- AQUI INÍCIO DE CADA RDO INSERIDO -->
				<div class="card">
					<div class="card-body">
						
						<div class="accordion accordion-danger-solid" id="accordion-two">
							<div class="accordion-item">
							<div class="accordion-header  rounded-lg collapsed" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One"   aria-expanded="true"  role="button">
								<span class="accordion-header-text">RDO [ID] DATA [DIA]</span>
								<span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse2One" class="collapse accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
							<!-- ABAIXO CONTEÚDO DE CADA RDO -->
							<div class="accordion accordion-primary" id="accordion-one">
			<div class="accordion-item">
			
			<div class="accordion-header  rounded-lg text-center" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne"   aria-expanded="true" role="button">
			
				<span class="accordion-header-icon"></span>
				<span class="accordion-header-text">Atividades Executadas</span>
				<span class="accordion-header-indicator"></span>
				
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
				<div class="accordion-body-text">
					<div class="row">

						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox6" required>
								<label class="form-check-label" for="customCheckBox6">Montagem de Andaimes </label>
							</div>
						</div>
									
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox6" required>
								<label class="form-check-label" for="customCheckBox6">Desmontagem de Andaimes</label>
							</div>
						</div>

						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox6" required>
								<label class="form-check-label" for="customCheckBox6">Mob. E Desmobilização de Material</label>
							</div>
						</div>

					</div>
				</div>
			</div>
			</div>
			<div class="accordion-item">
			<div class="accordion-header rounded-lg text-center" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="true">
				<span class="accordion-header-text">Impactos na Tarefa</span>
				<span class="accordion-header-indicator"></span>
			</div>
			<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
				<div class="accordion-body-text">
					<div class="row">
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Interferência c/ Outra Atividade </label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Operação Não Liberou Atividade</label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Transferência para outra Atividade </label>
							</div>
						</div>

						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Chuva</label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Vento Forte</label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Local Inseguro P/ Executar Ativ</label>
							</div>
						</div>

						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Falta do Responsável Bloqueio</label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Falta de Energia</label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-check custom-checkbox mb-3 check-xs">
								<input type="checkbox" class="form-check-input" checked id="customCheckBox9" required>
								<label class="form-check-label" for="customCheckBox9">Falta de Equipamento Solicitado P/ Apoio</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="accordion-item">
			<div class="accordion-header rounded-lg text-center" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="true">
				<span class="accordion-header-text text-center">Andaimes</span>
				<span class="accordion-header-indicator"></span>
			</div>

			<div class="row">
				<div class="col-1 mt-3">
					<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="toastr-success-bottom-right">Incluir</button>
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
			<div class="accordion-header rounded-lg" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="true">
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
                                        <th><strong>QTD</strong></th>
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
										<td><?php echo $f['QTD']; ?></td>
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


<!-- ADICIONAR MOVIMENTO DO RDO -->
<script>
    function enviarDados() {
        var codccusto = '02.0075.00'; //document.getElementById('codccusto').value; 
        var tipocompra = document.getElementById('tipocompra').value; 
        var datepicker = document.getElementById('mdate').value; 
        
        // Verifica se o campo datepicker está preenchido
        if (!datepicker) {
            alert('Por favor, preencha o campo Data de competência.');
            return; // Impede o envio dos dados se o campo não estiver preenchido
        }

        var dados = {
            "CODCCUSTO": codccusto,
            "CODTB1FLX": tipocompra,
            "DATAEXTRA1": datepicker
        };

        // Exibir o JSON no console para verificação
        console.log(dados);

        fetch('http://localhost/SisAndaimes/SAMF/SAMF/insertSV', {
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
                // Trate o caso em que a resposta do backend não for 'success'
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