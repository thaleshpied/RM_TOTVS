<?php echo $this->extend('layouts/default') ?>
<?php echo $this->section('content') ?>

<div class="content-body">
	<div class="container-fluid">	

	<!-- BREADCRUMB DA PÁGINA -->
	<div class="row page-titles">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active"><a href="<?php echo base_url('SCAndaimes'); ?>">Andaimes</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Visita</a>
			</li>
		</ol>
	</div>



	<!-- CAMPOS DA SOLICITAÇÃO -->

		<input hidden id="SAMF_CLI_LOC" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_LOC ?  : ''; ?>"/>
		<input hidden id="SAMF_OBSERVACAO" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_OBSERVACAO ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_OS" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_OS ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_TEXTO_BREVE" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_TEXTO_BREVE ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_DESC_OP" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_DESC_OP ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_DENOMINACAO" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_DENOMINACAO ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_CENTRAB_RES" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_CENTRAB_RES ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_CENTRAB_OP" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_CENTRAB_OP ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_AREANV0" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_AREANV0 ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_AREANV1" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_AREANV1 ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_AREANV2" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_AREANV2 ?  : ''; ?>"/>
		<input hidden id="SOLICITACAO_SAMF_VS_AMBIENTE" class="form-control bg-light" disabled value="<?php echo $resultado->SOLICITACAO_SAMF_VS_AMBIENTE ?  : ''; ?>"/>
		<input hidden id="SAMF_VS_ATERRADO" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_VS_ATERRADO ?  : ''; ?>"/>
		<input hidden id="SAMF_CLI_TAG" class="form-control bg-light" disabled value="<?php echo $resultado->SAMF_CLI_TAG ?  : ''; ?>"/>


	<!-- FIM CAMPOS DA SOLICITAÇÃO -->




	<!-- MODAL PARA ENVIAR IMAGENS DAS MONTAGENS -->
	<div class="modal fade" id="uploadimagem">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title text-danger text-center">Atenção, salve todas alterações antes de realizar upload de imagem!</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						
                        <div class="basic-form custom_file_input">															
                            <form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="idmov" value="<?php echo $resultado->IDMOVVISITA; ?>">
                                <input type="hidden" name="FLUXO" value="2">
                                <!-- <label for="imageFiles">Selecione as imagens:</label><br> -->
                                <input type="file" class="btn btn-outline-primary btn-sm" name="files[]" multiple accept=".jpg, .png">
                                <input type="submit" class="btn btn-primary btn-sm" value="Enviar">
                            </form>
                        </div>

					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="(<?php echo $resultado->IDMOVVISITA; ?>)" id="btncancelar">Sim, enviar!</button>
					</div> -->
				</div>
			</div>
		</div>

		<!-- MODAL PARA ENVIAR IMAGENS DAS MONTAGENS -->
	<div class="modal fade" id="enviarmontagem">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title text-danger text-center">Atenção, certifique-se de salvar todas alterações!</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<p><h3>Tem certeza que deseja enviar a visita para montagem?</h3></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="enviarmontagem(<?php echo $resultado->IDMOVVISITA; ?>,<?php echo $resultado->IDMOVMONTAGEM; ?>)" id="btncancelar">Sim, enviar!</button>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="(<?php echo $resultado->IDMOVVISITA; ?>)" id="btncancelar">Sim, enviar!</button>
					</div> -->
				</div>
			</div>
		</div>





	
		<!-- MENU PRINCIPAL DA PÁGINA -->
		<div class="container-fluid mb-5" id="pagesolicitacao">
			<div class="row">
				<div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
					<div class="btn-group mb-1">
						<!-- <button type="button" class="btn btn-primary light px-3"   aria-expanded="false"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
						<button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="false"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Adicionar RDO</button> -->
					</div>
					<div class="btn-group mb-1">
						<div class="btn-group mb-1 nav">
						<?php if ($resultado->STATUS_VISITA == 'B'): ?>
							<button type="button" class="btn btn-primary light px-3 testebotao" id="botaordosalvar" class="nav-link" onclick="segundoenvio(<?= $resultado->IDMOVVISITA; ?>)">
								<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações
							</button>
						<?php else: ?>
							<button type="button" id="botaordosalvar3" class="btn btn-primary light px-3" class="nav-link" onclick="primeiroenvio(<?= $resultado->IDMOVVISITA; ?>)">
								<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações
							</button>
						<?php endif; ?>

                        <?php if ($resultado->STATUS_VISITA == 'B'): ?>
							<button href="#navpills2-2" id="botaordosalvar2" type="button" class="btn btn-primary light px-3" data-bs-toggle="modal" data-bs-target="#enviarmontagem" data-id="enviarmontagem"><i class="fa fa-reply"></i> Enviar para montagem</button>
						<?php else: ?>
							
						<?php endif; ?>
                            
                            <!-- <button href="#navpills2-3" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3">Aprovados</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	

<!-- INÍCIO DO MENU DE PESQUISA -->

<div class="accordion-item b-none">


	<div class="card-body">
		<div class="col-xl-12 col-xxl-12">

					<div class="col-xl-3 col-xxl-4 col-md-6">
						<div class="card-body">
							<div class="mb-4">
								<h4 class="card-title">Encarregado</h4> 
							</div>  
							<select class="form-select border-dark" name = "SAMF_ENCARREGADO" id = "SAMF_ENCARREGADO"  aria-label="Default select example">	
							
							<option value="<?php echo $resultado->ID_ENCARREGADO?>"><?php echo $resultado->NOME_ENCARREGADO?></option>
							
								<!-- <?php 
								if (!empty($encarregados)): 
									foreach($encarregados as $e): 
								?>	
							
										<option value="<?php echo $e['ID']; ?>"><?php echo $e['CODUSUARIO']; ?></option>
								<?php 
									endforeach; 
								endif; 
								?> -->

							</select>
						</div>
					</div>


	<!-- INICIO DE CADA SOLICITAÇÃO INSERIDA --> 



    <div class="row">
            <div class="col-lg-12">
                <div class="card">
					<div class="row" styler="margin-left:20px;">
						<div class="col-12">         
							<!-- <button style="margin-left: 10px;" type="button" class="btn btn-warning  me-2 mb-2 btn-xxs" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One"   aria-expanded="true"  role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
							<!-- <button id="enviarvisita2" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="postprojeto()"><i class="fa fa-reply"></i> Enviar projeto/montagem</button>                                   -->
							<!-- <button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalcancelarvisita"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>	 -->
							<!-- <button type="button" class="btn btn-dark  me-2 mb-2 btn-xxs bh-light" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fas fa-user-check"></i> Salvar Alterações</button> -->
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
									<h5 class="modal-title">Canelamento de Visita</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<p>Tem certeza que deseja cancelar a solicitação TOP número: ?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary" onclick="cancelarSC()" id="btncancelar">Sim, cancelar!</button>
								</div>
							</div>
						</div>
					</div>

					

					
                    <div class="card-header">
                        <h5>Solicitação TOP: <small>  </small></h5>
                        <h5>OS Cliente TOP: <small><?php echo $resultado->SAMF_CLI_OS; ?>  </small></h5>
                        <h5>Tarefa: <small><?php echo $resultado->SAMF_CLI_TEXTO_BREVE; ?>  </small></h5>
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
								<div id="collapse2One" class="accordion__body collapse show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
								
								
								<div class="accordion accordion-primary" id="accordion-one">
									<!-- ACCORDION DOS DADOS DE ENTRADA -->
									<div class="accordion-item">
										<div class="accordion-header  rounded-lg text-center collapsed" id="hd1" data-bs-toggle="collapse" data-bs-target="#collapsehd1" aria-controls="collapsehd1"   aria-expanded="false" role="button">
											<span class="accordion-header-icon"></span>
											<span class="accordion-header-text">Dados de Entrada</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd1" class="collapse show" aria-labelledby="hd1" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
											<div class="row">
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked1 = ($resultado->SAMF_VS_INTERFER1 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada1" <?php echo $checked1; ?>>
														<label class="form-check-label" for="dadosdeentrada1">Andaime Apoiado</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked2 = ($resultado->SAMF_VS_INTERFER2 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada2" <?php echo $checked2; ?>>
														<label class="form-check-label" for="dadosdeentrada2">Andaime Suspenso</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked3 = ($resultado->SAMF_VS_INTERFER3 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada3" <?php echo $checked3; ?>>
														<label class="form-check-label" for="dadosdeentrada3">Andaime Balanço</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked4 = ($resultado->SAMF_VS_INTERFER4 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada4" <?php echo $checked4; ?>>
														<label class="form-check-label" for="dadosdeentrada4">Andaime Pau de carga</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked5 = ($resultado->SAMF_VS_INTERFER5 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada5" <?php echo $checked5; ?>>
														<label class="form-check-label" for="dadosdeentrada5">Escoramento em viga</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked6 = ($resultado->SAMF_VS_INTERFER6 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada6" <?php echo $checked6; ?>>
														<label class="form-check-label" for="dadosdeentrada6">Escoramento em laje</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked7 = ($resultado->SAMF_VS_INTERFER7 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada7" <?php echo $checked7; ?>>
														<label class="form-check-label" for="dadosdeentrada7">Escoramento de equipamento</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked8 = ($resultado->SAMF_VS_INTERFER8 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada8" <?php echo $checked8; ?>>
														<label class="form-check-label" for="dadosdeentrada8">Travamento próprio andaime</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked9 = ($resultado->SAMF_VS_INTERFER9 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada9" <?php echo $checked9; ?>>
														<label class="form-check-label" for="dadosdeentrada9">Travamento em estruturas</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked10 = ($resultado->SAMF_VS_INTERFER10 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada10" <?php echo $checked10; ?>>
														<label class="form-check-label" for="dadosdeentrada10">Avaliação Estrutural</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked11 = ($resultado->SAMF_VS_INTERFER11 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada11" <?php echo $checked11; ?>>
														<label class="form-check-label" for="dadosdeentrada11">Linha de Vida</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked12 = ($resultado->SAMF_VS_INTERFER12 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada12" <?php echo $checked12; ?>>
														<label class="form-check-label" for="dadosdeentrada12">Espaço Confinado</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked13 = ($resultado->SAMF_VS_INTERFER13 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada13" <?php echo $checked13; ?>>
														<label class="form-check-label" for="dadosdeentrada13">Necessário bloqueio do equipamento</label>
													</div>
												</div>
												<div class="col-4">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<?php $checked14 = ($resultado->SAMF_VS_INTERFER14 == 1) ? 'checked' : ''; ?>
														<input type="checkbox" class="form-check-input" id="dadosdeentrada14" <?php echo $checked14; ?>>
														<label class="form-check-label" for="dadosdeentrada14">Local da Montagem é Aberto</label>
													</div>
												</div>
											</div>

											</div>
										</div>
									</div><!-- FIM ACCORDION DOS DADOS DE ENTRADA -->
								
									<!-- PRÉ PROGRAMAÇÃO -->
									<div class="accordion-item">
										<div class="accordion-header rounded-lg text-center collapsed" id="hd2" data-bs-toggle="collapse" data-bs-target="#collapsehd2" aria-controls="collapsehd2"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Pré Programação</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd2" class="collapse show" aria-labelledby="hd2" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked15 = ($resultado->SAMF_VS_PP1 == 1) ? 'checked' : ''; ?>
															<input type="checkbox" class="form-check-input" id="pp1" <?php echo $checked15; ?>>
															<label class="form-check-label" for="pp1">Necessário Guindaste </label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked16 = ($resultado->SAMF_VS_PP2 == 1) ? 'checked' : ''; ?>
															<input type="checkbox" class="form-check-input" id="pp2" <?php echo $checked16; ?>>
															<label class="form-check-label" for="pp2">Necessário Empilhadeira</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked17 = ($resultado->SAMF_VS_PP3 == 1) ? 'checked' : ''; ?>
															<input type="checkbox" class="form-check-input" id="pp3" <?php echo $checked17; ?>>
															<label class="form-check-label" for="pp3">Necessário Caminhão </label>
														</div>
													</div>	
													<div class="col-6">
														<label class="form-label">Tempo de mobilização</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  placeholder="00:00" id="pp4" value="<?php echo $resultado->SAMF_VS_PP4 ?>"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>	
													<div class="col-6">
														<label class="form-label">Tempo de desmobilização</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  placeholder="00:00" id="pp5" value="<?php echo $resultado->SAMF_VS_PP5 ?>"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>		
													<div class="col-6">
														<label class="form-label">Tempo de montagem</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  placeholder="00:00" id="pp6" value="<?php echo $resultado->SAMF_VS_PP6 ?>"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>
													<div class="col-6">
														<label class="form-label">Tempo de desmontagem</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp7" placeholder="00:00" value="<?php echo $resultado->SAMF_VS_PP7 ?>"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>	
													
													<script>
														function updateDateTime() {
															const dateValue = document.getElementById("mdate").value;
															const timeValue = document.getElementById("timepicker").value;
															
															if (dateValue && timeValue) {
																const dateTime = dateValue + ' ' + timeValue;

																document.getElementById("DATAEXTRA1").value = dateTime;
															}
														}
													</script>

													<script>
														function updateDateTime2() {
															const dateValue = document.getElementById("mdate2").value;
															const timeValue = document.getElementById("timepicker2").value;
															
															if (dateValue && timeValue) {
																const dateTime = dateValue + ' ' + timeValue;

																document.getElementById("DATAEXTRA2").value = dateTime;
															}
														}
													</script>

													<h4 class="mt-5">Previsão</h4>
													<div class="col-3 mt-1">
														<label class="form-label">Data Montagem</label>
														<input id="mdate" onchange="updateDateTime()" name="" width="100%" class="form-control" value="<?php echo $resultado->DATAEXTRA1 ?>"/>
													</div>
													<div class="col-3 mt-1">
														<label class="form-label">Hora Montagem</label>
														<input class="form-control" onchange="updateDateTime()" id="timepicker" placeholder="00:00" value="<?php echo $resultado->HORADATAEXTRA1 ? : '00:00'; ?> ">
													</div>
													<div class="col-3 mt-1">
														<label class="form-label">Data Desmontagem</label>
														<input id="mdate2" onchange="updateDateTime2()" name="datepicker" width="100%" class="form-control" value="<?php echo $resultado->DATAEXTRA2 ?>"/>
													</div>

													<div class="col-3 mt-1">
														<label class="form-label">Hora Dsmonatagem</label>
														<input class="form-control" onchange="updateDateTime2()" id="timepicker2" placeholder="00:00" value="<?php echo $resultado->HORADATAEXTRA2 ? : '00:00'; ?> ">
													</div>

													<div class="col-6 mt-1">
														<input  width="100%" hidden id="DATAEXTRA1" class="form-control bg-light" disabled value="<?php echo $resultado->DATAEXTRA1EXIBIR ? : ''; ?>"/>
													</div>

													<div class="col-6 mt-1">
														<input  width="100%" hidden id="DATAEXTRA2" class="form-control bg-light" disabled value="<?php echo $resultado->DATAEXTRA2EXIBIR ?  : ''; ?>"/>
													</div>


													<div class="card col-6">
													<div class="card-header">
														<h4 class="card-title">Complexidade</h4>
													</div>
													<div class="card-body">
														<div class="basic-form">
															<form>
																<div class="mb-3 mb-0">
																	<label class="radio-inline me-3"><input type="radio" name="optradio" id="pp8" <?php echo ($resultado->SAMF_VS_COMPLX == 1) ? 'checked' : ''; ?>> Baixa </label>
																	<label class="radio-inline me-3"><input type="radio" name="optradio" CHECKED id="pp9" <?php echo ($resultado->SAMF_VS_COMPLX == 2) ? 'checked' : ''; ?>> Média </label>
																	<label class="radio-inline me-3"><input type="radio" name="optradio" id="pp10" <?php echo ($resultado->SAMF_VS_COMPLX == 3) ? 'checked' : ''; ?>> Alta </label>
																</div>
															</form>
														</div>
													</div>
													<div class="col-6">
													<div class="card-body">                    
														<form>
															<h4 class="card-title">Ambiente</h4> 
															<div class="mb-3 mb-0">
																<label class="radio-inline me-3">
																	<input type="radio" name="optradio" id="ambienteinterno" <?php echo ($resultado->SAMF_VS_AMBIENTE == 1) ? 'checked' : ''; ?>> Externo
																</label>
																<label class="radio-inline me-3">
																	<input type="radio" name="optradio" id="ambienteexterno" <?php echo ($resultado->SAMF_VS_AMBIENTE == 2) ? 'checked' : ''; ?>> Interno
																</label>
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
										<div class="accordion-header rounded-lg text-center collapsed" id="hd3" data-bs-toggle="collapse" data-bs-target="#collapsehd3" aria-controls="collapsehd3"  role="button"  aria-expanded="false">
											<span class="accordion-header-text text-center">Dimensões do Andaime</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd3" class="collapse show" aria-labelledby="hd3" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row text-center">
												<div class="col-12 text-center">
													<div class="col-lg-12 text-center">
														<div class="card text-center">
															<!-- <div class="card-header">
																<h4 class="card-title">Montagem</h4>
															</div> -->
															<div class="card-body">
																<div class="table-responsive">
																	<table class="table table-responsive-sm">
																		<thead>
																			<tr>
																				<th></th>
																				<th>Altura</th>
																				<th>Largura</th>
																				<th>Comp.</th>
																				<!-- <th>Total</th> -->
																				<!-- <th></th> -->
																			</tr>
																		</thead>
																		<tbody>
																			
																			<tr>
																				<th>1</th>
																				<td><input value="<?php echo $resultado->BM_ALTURA ?>" type="text" class="form-control" placeholder="0" id="alturamontagem"></td>
																				<td><input value="<?php echo $resultado->BM_LARGURA ?>" type="text" class="form-control" placeholder="0" id="larguramontagem"></td>
																				<td><input value="<?php echo $resultado->BM_COMPRIMENTO ?>" type="text" class="form-control" placeholder="0" id="comprimentomontagem"></td>
																				<!-- <td><input  type="text" class="form-control bg-light" disabled placeholder="0"></td> -->
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
												<!-- <div class="col-6">
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
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagemOFF"></td>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagemOFF"></td>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagemOFF"></td>
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
												</div> -->
											</div>				
										</div>
									</div><!-- FIM DIMENSÕES DO ANDAIME -->	

									<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
									<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
									<script>
										$(document).ready(function(){
											$('#alturamontagem').on('blur', function() {
												formatarCampo(this);
											});

											$('#larguramontagem').on('blur', function() {
												formatarCampo(this);
											});

											$('#comprimentomontagem').on('blur', function() {
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
										<div class="accordion-header rounded-lg text-center collapsed" id="hd4" data-bs-toggle="collapse" data-bs-target="#collapsehd4" aria-controls="collapsehd4"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Observações</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd4" class="collapse show" aria-labelledby="hd4" data-bs-parent="#accordion-one">
			<div class="accordion-body-text">
				<div class="row">
					
				<div class="mb-3">
					<textarea class="form-control" id="comentarioconteudo" rows="3"></textarea>
					<div class="form-check custom-checkbox mb-3 check-xs">
                        <input type="checkbox" class="form-check-input"  id="contextocomentario" checked>
                        <label class="form-check-label" for="ap2">Comentário Interno</label>
                    </div>
                    <button id="btncomentario" type="button" class="btn btn-primary btn-sm mt-1" onclick="enviarcomentario(<?= $resultado ->IDMOVVISITA; ?>,2)"> Enviar </button>         
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
										<?php if ($cmt['IDMOV'] == $resultado ->IDMOVVISITA): ?> 
											<li>
												<div class="
												
												<?php if ($cmt['CONTEXTO'] == 2): ?> 
                                                    timeline-badge dark
                                                <?php else: ?> 
                                                    timeline-badge primary
                                                <?php endif; ?>                                               
                                                
                                                "></div>

												<a class="timeline-panel text-muted" href="#">
													<span><?php echo $cmt['RECCREATEDON'];?>
                                                    
                                                    <?php if ($cmt['CONTEXTO'] == 2): ?> 
                                                        - COMENTÁRIO INTERNO	
                                                    <?php endif; ?>
                                                    
                                                    </span>
													<h6 class="mb-0">Usuário: <strong class="text-primary"><?php echo $cmt['RECCREATEDBY'];?></strong></h6>
													<h6 class="mb-0">Comentário: <?php echo $cmt['COMENTARIO'];?></h6>
												</a>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">								
							</div></div><div class="ps__rail-y" style="top: 0px; height: 150px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div>
						</div>
					</div>
				</div><!-- FIM TIMELINE ANDAIME -->
				
			</div>
		</div>
									</div><!-- FIM ACCORDION DAS OBSERVAÇÕES DA VISITA-->


									<!-- INFORMAÇÕES DOS ÍTENS A SEREM UTILIZADOS -->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center collapsed" id="hd5<?php echo $resultado->IDMOVVISITA; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $resultado->IDMOVVISITA; ?>" aria-controls="collapsehd5<?php echo $resultado->IDMOVVISITA; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Informações de Anteprojeto</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd5<?php echo $resultado->IDMOVVISITA; ?>" class="collapse" aria-labelledby="hd5<?php echo $resultado->IDMOVVISITA; ?>" data-bs-parent="#accordion-one">
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
																		<label class="radio-inline me-3"><input type="radio" name="app1" id="app1"> Sim </label>
																		<label class="radio-inline me-3"><input type="radio" checked name="app2" id="app2"> Não </label>
																	</div>
																</form>
															</div>
																<h4 class="card-title">Detalhe os ítens a serem utilizados</h4>
															<textarea class="form-control" id="detalhamentoitens" rows="3"></textarea>
														</div>
												</div>
															
												<div class="col-6">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<input type="checkbox" class="form-check-input"  id="ap2off" required>
														<label class="form-check-label" for="ap2">Necessita de memória de cálculo</label>
													</div>
												</div>					
											</div>
										</div>
									</div>
									<!-- FIM INFORMAÇÕES DE ANTEPROJETO -->



						<!-- DESENHO A SER CRIADO -->
						<!-- <div class="accordion-item mt-4">
							<div class="accordion-header rounded-lg text-center collapsed show" id="hd5<?php echo $resultado->IDMOVVISITA; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $resultado->IDMOVVISITA; ?>" aria-controls="collapsehd5<?php echo $resultado->IDMOVVISITA; ?>"   role="button" aria-expanded="false">
								<span class="accordion-header-text">Anexo Croqui</span>
								<span class="accordion-header-indicator"></span>
							</div>
						<div id="collapsehd5<?php echo $resultado->IDMOVVISITA; ?>" class="collapse" aria-labelledby="hd5<?php echo $resultado->IDMOVVISITA; ?>" data-bs-parent="#accordion-one">
							<div class="accordion-body-text">
								<div class="row">
									
								<h1>Croqui</h1>
								<canvas id="drawingCanvas" width="500" height="500"></canvas>
									<input type="hidden" name="idmov" id="IDMOVCROQUI" value="">
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



									
									<!-- DOCUMENTOS ANEXOS AQUI --> 
									<!-- DOCUMENTOS ANEXOS -->
<div class="accordion-item mt-4">
									<div class="accordion-header rounded-lg text-center collapsed" id="hd6" data-bs-toggle="collapse" data-bs-target="#collapsehd6" aria-controls="collapsehd6"   role="button" aria-expanded="false">
										<span class="accordion-header-text">Documentos Anexos</span>
										<span class="accordion-header-indicator"></span>
									</div>
									<div id="collapsehd6" class="collapse show" aria-labelledby="hd6" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row"><!-- FOTOS E DOCUMENTOS AQUI --> 
												

											<div class="col-12">
												

												<div class="row">
													
												<div class="card-body">
                                    <button data-bs-toggle="modal" data-bs-target="#uploadimagem" data-id="uploadimagem" class="btn btn-primary light px-3"><i class="fa fa-plus-circle"></i> Carregar Imagem</button>
                                    <!-- <div class="basic-form custom_file_input">															
                                        <form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="idmov" value="<?php echo $resultado->IDMOVVISITA; ?>">
                                            <input type="hidden" name="FLUXO" value="1152">
                                            <label for="imageFiles">Selecione as imagens:</label><br>
                                            <input type="file" class="btn btn-outline-primary btn-sm" name="files[]" multiple accept=".jpg, .png">
                                            <input type="submit" class="btn btn-primary btn-sm" value="Enviar">
                                        </form>
                                    </div> -->
                                </div>


                                    <?php foreach ($data7 as $img): ?>
                                    <?php if ($img['IDMOV'] == $resultado->IDMOVVISITA && $img['FLUXO'] == 2): ?>                                
                                    <div class="col-xl-4 col-lg-4 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">                                            
                                                <div class="new-arrival-product">
                                                    <button style="position: absolute;margin-left: -49px;margin-top: 6px;font-size: 14px;" type="button" class="btn btn-outline-danger  me-2 mb-2 btn-xxs"  role="button" onclick="deleteIMG('<?php echo $img['NOMEARQUIVO']; ?>')">
                                                        <i class="fa fa-window-close" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="new-arrivals-img-contnent">
                                                        <img class="img-fluid" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="">
                                                    </div>
                                                    <div class="new-arrival-content text-center mt-3">
                                                        <h4><a href="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>"></a></h4>
                                                        <input type="text" onchange="updateNomeIMG('<?php echo $img['NOMEARQUIVO']; ?>')" class="form-control" id="<?php echo $img['NOMEARQUIVO']; ?>" value="<?php echo $img['NOMEARQUIVO_EXIBIR']; ?>"/>
                                                        <h5 class="text-danger">
                                                            <small>
                                                                <?php 
                                                                echo !empty($img['NOMEARQUIVO_EXIBIR']) ? '' : 'Descreva a imagem!'; 
                                                                ?>
                                                            </small>
                                                        </h5>                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
									
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
        var CODCOLIGADA = 1;
        var IDMOV = idmovorigem;
        var COMENTARIO = document.getElementById('comentarioconteudo').value;

        var btncomentario = document.getElementById('btncomentario');        
        btncomentario.disabled = true;
        
        // var areacomentario = document.getElementById('comentarioconteudo');
        // areacomentario.readOnly = true;

        var CONTEXTO = document.getElementById('contextocomentario')?.checked ? 2 : 1;

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
            "IDMOV": IDMOV,
            "CODCOLIGADA": CODCOLIGADA,
            "COMENTARIO": COMENTARIO,
            "FLUXO": fluxo,
            "CONTEXTO": CONTEXTO
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

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
                btncomentario.disabled = false;
                document.getElementById('comentarioconteudo').value = '';

                // Chame a função para adicionar o comentário na timeline usando os dados reais
                (new Date().toLocaleString(), "<?php echo isset($sessionData['USUARIO']) ? $sessionData['USUARIO'] : ''; ?>", COMENTARIO, CONTEXTO);

            } else {
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

    // Função para adicionar o comentário na timeline
    function adicionarComentario(dataHora, usuario, comentario, contexto) {
	
		let li = document.createElement("li");
		let divBadge = document.createElement("div");
		
		divBadge.className = (contexto == 2) ? "timeline-badge dark" : "timeline-badge primary";

		let a = document.createElement("a");
		a.className = "timeline-panel text-muted";
		a.href = "#";

		let span = document.createElement("span");
		span.textContent = dataHora;

		let h6Usuario = document.createElement("h6");
		h6Usuario.className = "mb-0";
		h6Usuario.innerHTML = `Usuário: <strong class="text-primary">${usuario}</strong>`;

		h6Usuario.innerHTML = (contexto == 2) ? " - COMENTÁRIO INTERNO" : " ";

		let h6Comentario = document.createElement("h6");
		h6Comentario.className = "mb-0";
		h6Comentario.textContent = `Comentário: ${comentario}`;

		a.appendChild(span);
		a.appendChild(h6Usuario);
		a.appendChild(h6Comentario);

		li.appendChild(divBadge);
		li.appendChild(a);

		let ul = document.querySelector(".timeline");
		if (ul) {
			ul.appendChild(li);
		} else {
			console.error("Elemento '.timeline' não encontrado.");
		}
	}


</script>






<!-- ENVIAR SOLICITAÇÃO PARA VISITA -->

<script>
    function enviarvisita_old(idmovorigem) {

		var botaoEnviar = document.getElementById('botaordosalvar3');	
		botaoEnviar.disabled = true;
		botaoEnviar.innerHTML = "<i class='fa fa-check'></i> Salvando...";

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
		return;

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

























<!-- PRIMEIRO ENVIO  -->
<script>
    function enviarvisita(idmovorigem) {

		// var enviarvisita = document.getElementById('enviarvisita');		
		// enviarvisita.disabled = true;

		var enviarvisita2 = document.getElementById('enviarvisita2');		
		enviarvisita2.disabled = true;

		var detalhamentoitens = document.getElementById('detalhamentoitens').value;
		
        var codccusto = '02.0181.00'; 
		var CODCOLIGADA = 1;
		var IDMOVORIGEM2 = idmovorigem;
		// // var SAMF_ENCARREGADO = document.getElementById('encarregado').value;
		// //var SAMF_ENCARREGADO = parseInt(document.getElementById('encarregado').value);
	
		// // //ABAIXO PEGANDO VALORES DOS CHECKBOX DE DADOS DE ENTRADA 
		var dadosdeentrada1 = document.getElementById('dadosdeentrada1')?.checked ? 1 : 0;
		var dadosdeentrada2 = document.getElementById('dadosdeentrada2')?.checked ? 1 : 0;
		var dadosdeentrada3 = document.getElementById('dadosdeentrada3')?.checked ? 1 : 0;
		var dadosdeentrada4 = document.getElementById('dadosdeentrada4')?.checked ? 1 : 0;
		var dadosdeentrada5 = document.getElementById('dadosdeentrada5')?.checked ? 1 : 0;
		var dadosdeentrada6 = document.getElementById('dadosdeentrada6')?.checked ? 1 : 0;
		var dadosdeentrada7 = document.getElementById('dadosdeentrada7')?.checked ? 1 : 0;
		var dadosdeentrada8 = document.getElementById('dadosdeentrada8')?.checked ? 1 : 0;
		var dadosdeentrada9 = document.getElementById('dadosdeentrada9')?.checked ? 1 : 0;
		var dadosdeentrada10 = document.getElementById('dadosdeentrada10')?.checked ? 1 : 0;
		var dadosdeentrada11 = document.getElementById('dadosdeentrada11')?.checked ? 1 : 0;
		var dadosdeentrada12 = document.getElementById('dadosdeentrada12')?.checked ? 1 : 0;
		var dadosdeentrada13 = document.getElementById('dadosdeentrada13')?.checked ? 1 : 0;
		var dadosdeentrada14 = document.getElementById('dadosdeentrada14')?.checked ? 1 : 0;
		
		// ABAIXO ANTEPROJETO
		var app1 = document.getElementById('app1')?.checked ? 1 : 0;

		var app2Checkbox = document.getElementById('app2');
		var app2 = app2Checkbox ? (app2Checkbox.checked ? 1 : 0) : 0;
		
		var ap2Checkbox = document.getElementById('ap2');
		var ap2 = ap2Checkbox ? (ap2Checkbox.checked ? 1 : 0) : 0;


		// ABAIXO DADOS DA PRE PROGRAMAÇÃO 
		var pp1Checkbox = document.getElementById('pp1');
		var pp1 = pp1Checkbox ? (pp1Checkbox.checked ? 1 : 0) : 0;

		var pp2Checkbox = document.getElementById('pp2');
		var pp2 = pp2Checkbox ? (pp2Checkbox.checked ? 1 : 0) : 0;

		var pp3Checkbox = document.getElementById('pp3');
		var pp3 = pp3Checkbox ? (pp3Checkbox.checked ? 1 : 0) : 0;

		var pp4 = document.getElementById('pp4').value;
		var pp5 = document.getElementById('pp5').value;
		var pp6 = document.getElementById('pp6').value;
		var pp7 = document.getElementById('pp7').value;

		
		var pp8Checkbox = document.getElementById('pp8');
		var pp8 = pp8Checkbox ? (pp8Checkbox.checked ? 1 : 0) : 0;
		var pp9Checkbox = document.getElementById('pp9');
		var pp9 = pp9Checkbox ? (pp9Checkbox.checked ? 1 : 0) : 0;
		var pp10Checkbox = document.getElementById('pp10');
		var pp10 = pp10Checkbox ? (pp10Checkbox.checked ? 1 : 0) : 0;

	
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

		var alturamontagem = document.getElementById('alturamontagem').value;
		var larguramontagem = document.getElementById('larguramontagem').value;
		var comprimentomontagem = document.getElementById('comprimentomontagem').value;
		// var andaimetotalmontagem = document.getElementById('andaimetotalmontagem').value;

		// var alturadesmontagem = document.getElementById('alturadesmontagem').value;
		// var larguradesmontagem = document.getElementById('larguradesmontagem').value;
		// var comprimentodesmontagem = document.getElementById('comprimentodesmontagem').value;
		// var andaimetotaldesmontagem = document.getElementById('andaimetotaldesmontagem').value;



		// // Pegando o valor do campo de texto

		// console.log('Valor do campo:', valorCampo);
		

		// // console.log('Dados de entrada:', SAMF_VS_DE1, desmontagemandaime, mobilizacao);


		// // // VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        // if (mobilizacao == 0 && SAMF_VS_DE1 == 0 && desmontagemandaime == 0) {
			
        //     toastr.warning("Marque ao menos uma opção", "Dados de Entrada", {
        //             positionClass: "toast-top-right",
        //             timeOut: 5e3,
        //             closeButton: !0,
        //             debug: !1,
        //             newestOnTop: !0,
        //             progressBar: !0,
        //             preventDuplicates: !0,
        //             onclick: null,
        //             showDuration: "300",
        //             hideDuration: "1000",
        //             extendedTimeOut: "1000",
        //             showEasing: "swing",
        //             hideEasing: "linear",
        //             showMethod: "fadeIn",
        //             hideMethod: "fadeOut",
        //             tapToDismiss: !1
        //         });
        //     return; 
        // }


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
		return;

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








<input type="hidden" id="IDMOVSOLICITACAO" value="<?php echo $resultado->IDMOVSOLICITACAO?>" />
<input type="hidden" id="IDMOVVISITA" value="<?php echo $resultado->IDMOVVISITA?>" />
<input type="hidden" id="IDMOVPROJETO" value="<?php echo $resultado->IDMOVPROJETO?>" />
<!-- SALVANDO INFORMAÇÕES NA TMOVCOMPL (PRIMEIRO INSERT) E JÁ CRIANDO NO MOVIMENTO DE PROJETO  -->
 
<!-- ENVIA MOVIMENTO PARA O PROJETO  -->
<script>
    function primeiroenvio(idmovorigem) {



		// ABAIXO CAMPOS DA SOLICITACAO PARA REPLICAR NO MOVIMENTO
		var SAMF_CLI_LOC = document.getElementById('SAMF_CLI_LOC').value;
		var SAMF_OBSERVACAO = document.getElementById('SAMF_OBSERVACAO').value;
		var SAMF_CLI_OS = document.getElementById('SAMF_CLI_OS').value;
		var SAMF_CLI_TEXTO_BREVE = document.getElementById('SAMF_CLI_TEXTO_BREVE').value;
		var SAMF_CLI_DESC_OP = document.getElementById('SAMF_CLI_DESC_OP').value;
		var SAMF_CLI_DENOMINACAO = document.getElementById('SAMF_CLI_DENOMINACAO').value;
		var SAMF_CLI_CENTRAB_RES = document.getElementById('SAMF_CLI_CENTRAB_RES').value;
		var SAMF_CLI_CENTRAB_OP = document.getElementById('SAMF_CLI_CENTRAB_OP').value;
		var SAMF_CLI_TAG = document.getElementById('SAMF_CLI_TAG').value;
		var SAMF_CLI_AREANV0 = document.getElementById('SAMF_CLI_AREANV0').value;
		var SAMF_CLI_AREANV1 = document.getElementById('SAMF_CLI_AREANV1').value;
		var SAMF_CLI_AREANV2 = document.getElementById('SAMF_CLI_AREANV2').value;
		// var SAMF_VS_AMBIENTE = document.getElementById('SOLICITACAO_SAMF_VS_AMBIENTE').value;
		var SAMF_VS_ATERRADO = document.getElementById('SAMF_VS_ATERRADO').value;


			
        var DATAEXTRA1 = document.getElementById('DATAEXTRA1').value; 			
        var DATAEXTRA2 = document.getElementById('DATAEXTRA2').value; 
		var IDMOVSOLICITACAO = document.getElementById('IDMOVSOLICITACAO').value;

		// var enviarvisita = document.getElementById('enviarvisita');		
		// enviarvisita.disabled = true;

		var enviarvisita2 = document.getElementById('botaordosalvar3');		
		enviarvisita2.disabled = true;

		var detalhamentoitens = document.getElementById('detalhamentoitens').value;
		
		var codccusto = '<?php echo $sessionData['CODCCUSTO']?>'; 
		
		var CODCOLIGADA = 1;
		var IDMOVORIGEM2 = idmovorigem;
		// // var SAMF_ENCARREGADO = document.getElementById('encarregado').value;
		// //var SAMF_ENCARREGADO = parseInt(document.getElementById('encarregado').value);
	
		// // //ABAIXO PEGANDO VALORES DOS CHECKBOX DE DADOS DE ENTRADA 
		var dadosdeentrada1Checkbox = document.getElementById('dadosdeentrada1');
		var dadosdeentrada1 = dadosdeentrada1Checkbox ? (dadosdeentrada1Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada2Checkbox = document.getElementById('dadosdeentrada2');
		var dadosdeentrada2 = dadosdeentrada2Checkbox ? (dadosdeentrada2Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada3Checkbox = document.getElementById('dadosdeentrada3');
		var dadosdeentrada3 = dadosdeentrada3Checkbox ? (dadosdeentrada3Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada4Checkbox = document.getElementById('dadosdeentrada4');
		var dadosdeentrada4 = dadosdeentrada4Checkbox ? (dadosdeentrada4Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada5Checkbox = document.getElementById('dadosdeentrada5');
		var dadosdeentrada5 = dadosdeentrada5Checkbox ? (dadosdeentrada5Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada6Checkbox = document.getElementById('dadosdeentrada6');
		var dadosdeentrada6 = dadosdeentrada6Checkbox ? (dadosdeentrada6Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada7Checkbox = document.getElementById('dadosdeentrada7');
		var dadosdeentrada7 = dadosdeentrada7Checkbox ? (dadosdeentrada7Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada8Checkbox = document.getElementById('dadosdeentrada8');
		var dadosdeentrada8 = dadosdeentrada8Checkbox ? (dadosdeentrada8Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada9Checkbox = document.getElementById('dadosdeentrada9');
		var dadosdeentrada9 = dadosdeentrada9Checkbox ? (dadosdeentrada9Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada10Checkbox = document.getElementById('dadosdeentrada10');
		var dadosdeentrada10 = dadosdeentrada10Checkbox ? (dadosdeentrada10Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada11Checkbox = document.getElementById('dadosdeentrada11');
		var dadosdeentrada11 = dadosdeentrada11Checkbox ? (dadosdeentrada11Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada12Checkbox = document.getElementById('dadosdeentrada12');
		var dadosdeentrada12 = dadosdeentrada12Checkbox ? (dadosdeentrada12Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada13Checkbox = document.getElementById('dadosdeentrada13');
		var dadosdeentrada13 = dadosdeentrada13Checkbox ? (dadosdeentrada13Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada14Checkbox = document.getElementById('dadosdeentrada14');
		var dadosdeentrada14 = dadosdeentrada14Checkbox ? (dadosdeentrada14Checkbox.checked ? 1 : 0) : 0;

		var SAMF_ENCARREGADO = document.getElementById('SAMF_ENCARREGADO').value;	

		// ABAIXO ANTEPROJETO
		var app1Checkbox = document.getElementById('app1');
		var app1 = app1Checkbox ? (app1Checkbox.checked ? 1 : 0) : 0;
		var app2Checkbox = document.getElementById('app2');
		var app2 = app2Checkbox ? (app2Checkbox.checked ? 1 : 0) : 0;
		
		var ap2Checkbox = document.getElementById('ap2');
		var ap2 = ap2Checkbox ? (ap2Checkbox.checked ? 1 : 0) : 0;


		// ABAIXO DADOS DA PRE PROGRAMAÇÃO 
		var pp1Checkbox = document.getElementById('pp1');
		var pp1 = pp1Checkbox ? (pp1Checkbox.checked ? 1 : 0) : 0;

		var pp2Checkbox = document.getElementById('pp2');
		var pp2 = pp2Checkbox ? (pp2Checkbox.checked ? 1 : 0) : 0;

		var pp3Checkbox = document.getElementById('pp3');
		var pp3 = pp3Checkbox ? (pp3Checkbox.checked ? 1 : 0) : 0;

		var pp4 = document.getElementById('pp4').value;
		var pp5 = document.getElementById('pp5').value;
		var pp6 = document.getElementById('pp6').value;
		var pp7 = document.getElementById('pp7').value;
		
		var pp8Checkbox = document.getElementById('pp8');
		var pp8 = pp8Checkbox ? (pp8Checkbox.checked ? 1 : 0) : 0;
		var pp9Checkbox = document.getElementById('pp9');
		var pp9 = pp9Checkbox ? (pp9Checkbox.checked ? 1 : 0) : 0;
		var pp10Checkbox = document.getElementById('pp10');
		var pp10 = pp10Checkbox ? (pp10Checkbox.checked ? 1 : 0) : 0;
	
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

		var alturamontagem = document.getElementById('alturamontagem').value;
		var larguramontagem = document.getElementById('larguramontagem').value;
		var comprimentomontagem = document.getElementById('comprimentomontagem').value;

		function ajustarCamposVazios() {

			if (!alturamontagem) {
				alturamontagem = "0.00";
			}
			if (!larguramontagem) {
				larguramontagem = "0.00";
			}
			if (!comprimentomontagem) {
				comprimentomontagem = "0.00";
			}
		}
		ajustarCamposVazios();




		// var andaimetotalmontagem = document.getElementById('andaimetotalmontagem').value;

		// var alturadesmontagem = document.getElementById('alturadesmontagem').value;
		// var larguradesmontagem = document.getElementById('larguradesmontagem').value;
		// var comprimentodesmontagem = document.getElementById('comprimentodesmontagem').value;
		// var andaimetotaldesmontagem = document.getElementById('andaimetotaldesmontagem').value;



		// // Pegando o valor do campo de texto

		// console.log('Valor do campo:', valorCampo);
		

		// // console.log('Dados de entrada:', SAMF_VS_DE1, desmontagemandaime, mobilizacao);


		// VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (SAMF_ENCARREGADO == '') {
			
            toastr.warning("Informação obrigatória!", "ENCARREGADO", {
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

		var ambienteinternoCheckbox = document.getElementById('ambienteinterno');
		var ambienteinterno = ambienteinternoCheckbox ? (ambienteinternoCheckbox.checked ? 1 : 0) : 0;

        var ambienteexternoCheckbox = document.getElementById('ambienteexterno');
		var ambienteexterno = ambienteexternoCheckbox ? (ambienteexternoCheckbox.checked ? 1 : 0) : 0;


		// VALIDANDO AMBIENTE
		if (ambienteinterno == 1) {
					SAMF_VS_AMBIENTE = 1;
				} else if (ambienteexterno == 1) {
					SAMF_VS_AMBIENTE = 2;
				} else {
					SAMF_VS_AMBIENTE =0;
				}



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
			'BM_COMPRIMENTO': comprimentomontagem,
			'SAMF_ENCARREGADO': SAMF_ENCARREGADO,
			'SAMF_VS_AMBIENTE': SAMF_VS_AMBIENTE,
			'DATAEXTRA1': DATAEXTRA1,
			'DATAEXTRA2':DATAEXTRA2,
			'IDMOVSOLICITACAO': IDMOVSOLICITACAO,
			'SAMF_CLI_LOC': SAMF_CLI_LOC,
			'SAMF_OBSERVACAO': SAMF_OBSERVACAO,
			'SAMF_CLI_OS': SAMF_CLI_OS,
			'SAMF_CLI_TEXTO_BREVE': SAMF_CLI_TEXTO_BREVE,
			'SAMF_CLI_DESC_OP': SAMF_CLI_DESC_OP,
			'SAMF_CLI_DENOMINACAO': SAMF_CLI_DENOMINACAO,
			'SAMF_CLI_CENTRAB_RES': SAMF_CLI_CENTRAB_RES,
			'SAMF_CLI_CENTRAB_OP': SAMF_CLI_CENTRAB_OP,
			'SAMF_CLI_TAG': SAMF_CLI_TAG,
			'SAMF_CLI_AREANV0': SAMF_CLI_AREANV0,
			'SAMF_CLI_AREANV1': SAMF_CLI_AREANV1,
			'SAMF_CLI_AREANV2': SAMF_CLI_AREANV2,
			'SAMF_VS_ATERRADO': SAMF_VS_ATERRADO
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
		// return;

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

				// enviarvisita2.disabled = true;
				// enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";



				setTimeout(function() {
					location.reload();
				}, 1000); // 3000 milissegundos = 3 segundos



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

<!-- UPDATE NÍVEL 1  -->
<script>
    function updateNomeIMG(NOMEARQUIVO) {

		var NOMEARQUIVO_EXIBIR = document.getElementById(NOMEARQUIVO).value;	
		
        console.log('Dados a serem enviados:', NOMEARQUIVO_EXIBIR, NOMEARQUIVO);
        // return;

        var dados = {
			"NOMEARQUIVO": NOMEARQUIVO,
			"NOMEARQUIVO_EXIBIR": NOMEARQUIVO_EXIBIR,
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;
        
        fetch('<?php echo base_url('updateNomeIMG'); ?>', {
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

				// enviarvisita2.disabled = true;
				// enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";
				


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
				// enviarvisita2.disabled = false;
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
			// 	enviarvisita2.disabled = false;
        });
    }

	
</script>






<script>
    function segundoenvio(IDMOV) {

        // var enviarvisita = document.getElementById('enviarvisita');		
		// enviarvisita.disabled = true;

		// var enviarvisita2 = document.getElementById('botaordosalvar');		
		// enviarvisita2.disabled = true;

		// REFERÊNCIAS DOS IDMOV 
		

		var IDMOVSOLICITACAO = document.getElementById('IDMOVSOLICITACAO').value;
		var IDMOVVISITA = document.getElementById('IDMOVVISITA').value;
		var IDMOVPROJETO = document.getElementById('IDMOVPROJETO').value;

		var detalhamentoitens = document.getElementById('detalhamentoitens').value;
		
        var codccusto = '<?php echo $sessionData['CODCCUSTO']?>'; 
		var CODCOLIGADA = 1;

		
        var DATAEXTRA1 = document.getElementById('DATAEXTRA1').value; 			
        var DATAEXTRA2 = document.getElementById('DATAEXTRA2').value; 
		
		// // var SAMF_ENCARREGADO = document.getElementById('encarregado').value;
		// //var SAMF_ENCARREGADO = parseInt(document.getElementById('encarregado').value);
	
		// // //ABAIXO PEGANDO VALORES DOS CHECKBOX DE DADOS DE ENTRADA 
		var dadosdeentrada1Checkbox = document.getElementById('dadosdeentrada1');
		var dadosdeentrada1 = dadosdeentrada1Checkbox ? (dadosdeentrada1Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada2Checkbox = document.getElementById('dadosdeentrada2');
		var dadosdeentrada2 = dadosdeentrada2Checkbox ? (dadosdeentrada2Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada3Checkbox = document.getElementById('dadosdeentrada3');
		var dadosdeentrada3 = dadosdeentrada3Checkbox ? (dadosdeentrada3Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada4Checkbox = document.getElementById('dadosdeentrada4');
		var dadosdeentrada4 = dadosdeentrada4Checkbox ? (dadosdeentrada4Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada5Checkbox = document.getElementById('dadosdeentrada5');
		var dadosdeentrada5 = dadosdeentrada5Checkbox ? (dadosdeentrada5Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada6Checkbox = document.getElementById('dadosdeentrada6');
		var dadosdeentrada6 = dadosdeentrada6Checkbox ? (dadosdeentrada6Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada7Checkbox = document.getElementById('dadosdeentrada7');
		var dadosdeentrada7 = dadosdeentrada7Checkbox ? (dadosdeentrada7Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada8Checkbox = document.getElementById('dadosdeentrada8');
		var dadosdeentrada8 = dadosdeentrada8Checkbox ? (dadosdeentrada8Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada9Checkbox = document.getElementById('dadosdeentrada9');
		var dadosdeentrada9 = dadosdeentrada9Checkbox ? (dadosdeentrada9Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada10Checkbox = document.getElementById('dadosdeentrada10');
		var dadosdeentrada10 = dadosdeentrada10Checkbox ? (dadosdeentrada10Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada11Checkbox = document.getElementById('dadosdeentrada11');
		var dadosdeentrada11 = dadosdeentrada11Checkbox ? (dadosdeentrada11Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada12Checkbox = document.getElementById('dadosdeentrada12');
		var dadosdeentrada12 = dadosdeentrada12Checkbox ? (dadosdeentrada12Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada13Checkbox = document.getElementById('dadosdeentrada13');
		var dadosdeentrada13 = dadosdeentrada13Checkbox ? (dadosdeentrada13Checkbox.checked ? 1 : 0) : 0;
		
		var dadosdeentrada14Checkbox = document.getElementById('dadosdeentrada14');
		var dadosdeentrada14 = dadosdeentrada14Checkbox ? (dadosdeentrada14Checkbox.checked ? 1 : 0) : 0;

		var SAMF_ENCARREGADO = document.getElementById('SAMF_ENCARREGADO').value;	

		// ABAIXO ANTEPROJETO
		var app1Checkbox = document.getElementById('app1');
		var app1 = app1Checkbox ? (app1Checkbox.checked ? 1 : 0) : 0;
		var app2Checkbox = document.getElementById('app2');
		var app2 = app2Checkbox ? (app2Checkbox.checked ? 1 : 0) : 0;
		
		var ap2Checkbox = document.getElementById('ap2');
		var ap2 = ap2Checkbox ? (ap2Checkbox.checked ? 1 : 0) : 0;


		// ABAIXO DADOS DA PRE PROGRAMAÇÃO 
		var pp1Checkbox = document.getElementById('pp1');
		var pp1 = pp1Checkbox ? (pp1Checkbox.checked ? 1 : 0) : 0;

		var pp2Checkbox = document.getElementById('pp2');
		var pp2 = pp2Checkbox ? (pp2Checkbox.checked ? 1 : 0) : 0;

		var pp3Checkbox = document.getElementById('pp3');
		var pp3 = pp3Checkbox ? (pp3Checkbox.checked ? 1 : 0) : 0;

		var pp4 = document.getElementById('pp4').value;
		var pp5 = document.getElementById('pp5').value;
		var pp6 = document.getElementById('pp6').value;
		var pp7 = document.getElementById('pp7').value;
		
		var pp8Checkbox = document.getElementById('pp8');
		var pp8 = pp8Checkbox ? (pp8Checkbox.checked ? 1 : 0) : 0;
		var pp9Checkbox = document.getElementById('pp9');
		var pp9 = pp9Checkbox ? (pp9Checkbox.checked ? 1 : 0) : 0;
		var pp10Checkbox = document.getElementById('pp10');
		var pp10 = pp10Checkbox ? (pp10Checkbox.checked ? 1 : 0) : 0;		
	
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

		var alturamontagem = document.getElementById('alturamontagem').value;
		var larguramontagem = document.getElementById('larguramontagem').value;
		var comprimentomontagem = document.getElementById('comprimentomontagem').value;

		function ajustarCamposVazios() {

			if (!alturamontagem) {
				alturamontagem = "0.00";
			}
			if (!larguramontagem) {
				larguramontagem = "0.00";
			}
			if (!comprimentomontagem) {
				comprimentomontagem = "0.00";
			}
		}
		ajustarCamposVazios();

		// VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (SAMF_ENCARREGADO == '') {
			
            toastr.warning("Informação obrigatória!", "ENCARREGADO", {
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

		var ambienteinternoCheckbox = document.getElementById('ambienteinterno');
		var ambienteinterno = ambienteinternoCheckbox ? (ambienteinternoCheckbox.checked ? 1 : 0) : 0;

        var ambienteexternoCheckbox = document.getElementById('ambienteexterno');
		var ambienteexterno = ambienteexternoCheckbox ? (ambienteexternoCheckbox.checked ? 1 : 0) : 0;


		// VALIDANDO AMBIENTE
		if (ambienteinterno == 1) {
					SAMF_VS_AMBIENTE = 1;
				} else if (ambienteexterno == 1) {
					SAMF_VS_AMBIENTE = 2;
				} else {
					SAMF_VS_AMBIENTE =0;
				}



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
			"IDMOVSOLICITACAO": IDMOVSOLICITACAO,
			"IDMOVVISITA": IDMOVVISITA,
			'IDMOVPROJETO': IDMOVPROJETO,
			'BM_ALTURA': alturamontagem,
			'BM_LARGURA': larguramontagem,
			'BM_COMPRIMENTO': comprimentomontagem,
			'SAMF_ENCARREGADO': SAMF_ENCARREGADO,
			'CODCOLIGADA': CODCOLIGADA,
			'SAMF_VS_AMBIENTE': SAMF_VS_AMBIENTE,
			'DATAEXTRA1': DATAEXTRA1,
			'DATAEXTRA2': DATAEXTRA2
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
		// return;

        fetch('<?php echo base_url('updateGV2'); ?>', {
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

				// enviarvisita2.disabled = true;
				// enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";


				// var proximoIDMOVAndaime = data.proximoIDMOVAndaime;
				// // var newUrl = <?php echo base_url('atendimentoPL/'); ?> + proximoIDMOVAndaime;

				// var newUrl = "<?php echo base_url('atendimentoPL/'); ?>" + proximoIDMOVAndaime;

				// setTimeout(function() {
				// 	window.location.href = newUrl;
				// }, 3000); // 3000 milissegundos = 3 segundos



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
				// enviarvisita2.disabled = false;
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
				// enviarvisita2.disabled = false;
        });
    }

</script>



<!-- DELETANDO IMAGEM  -->
<script>
    function deleteIMG(NOMEARQUIVO) {
	
		console.log('Dados a serem enviados:', NOMEARQUIVO);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var NOMEARQUIVOORIGEM2 = NOMEARQUIVOorigem;
		

        var dados = {
			"NOMEARQUIVO": NOMEARQUIVO,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('deleteIMG'); ?>', {
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
				setTimeout(function() {
					location.reload();
				}, 1000); 
				// enviarvisita.disabled = true;
				// enviarvisita.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";

				// enviarvisita2.disabled = true;
				// enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";
				


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
				// enviarvisita2.disabled = false;
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
			// 	enviarvisita2.disabled = false;
        });
    }

	
</script>



<!-- SCRIPT PARA MONITORAR A ALTURA DO BOTÃO DE ADICIONAR PARA MUDAR A CLASSE  -->
<script>
    $(document).ready(function() {
        // Monitorar o evento de rolagem da janela
        $(window).scroll(function() {
            // Verificar se a rolagem vertical é maior que 50px
            if ($(this).scrollTop() > 150) {
                // Adicionar a classe que fixa o botão
                $('.testebotao').addClass('fixed');
                $('.testebotao').removeClass('light');
            } else {
                // Remover a classe fixa quando o scroll for menor que 50px
                $('.testebotao').removeClass('fixed');
                $('.testebotao').addClass('light');
            }
        });
    });
</script>




<script>

        

    function enviarmontagem(IDMOVVISITA,IDMOVMONTAGEM) {

        var STATUSVISITA = 'F';
		var STATUSMONTAGEM = 'A';

        var dados = {
            "STATUSVISITA": STATUSVISITA,
            "IDMOVVISITA": IDMOVVISITA,
			"IDMOVMONTAGEM": IDMOVMONTAGEM,
			"STATUSMONTAGEM": STATUSMONTAGEM,
        };

        var botaordosalvar_js = document.getElementById('botaordosalvar');
		botaordosalvar_js.disabled = true;
        botaordosalvar_js.innerHTML = "Edição bloqueada!";

        var botaordosalvar2_js = document.getElementById('botaordosalvar2');
		botaordosalvar2_js.disabled = true;
        botaordosalvar2_js.innerHTML = "<i class='fa fa-reply'></i> Enviando...";


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('enviarmontagem'); ?>', {
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

                // setTimeout(datatableRDO, 0);
				// setTimeout(datatableRDOAprov, 0);

                botaordosalvar2_js.innerHTML = "Enviado!";

                var newUrl = "<?php echo base_url('SCAndaimes/'); ?>";

				setTimeout(function() {
					window.location.href = newUrl;
				}, 2000); 

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