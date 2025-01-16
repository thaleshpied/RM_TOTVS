<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="scripts.js"></script>

<!--**********************************
	Content body start
***********************************-->


<div class="content-body">
	<div class="container-fluid">

		<!-- BREADCRUMB DA PÁGINA -->
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:history.back()">RDO</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Preenchimento de RDO <small>- Referência: <?php echo $data9->DATA_REFERENCIA; ?></small></a></li>
			</ol>
		</div>

        <!-- MODAL PARA ENVIAR PARA APROVAÇÃO -->
        <div class="modal fade" id="aprovarrdo">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Enviando para aprovação</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
						<p>Tem certeza que deseja enviar o RDO para aprovação? RDO número: <?php echo $data9->NUMEROMOV; ?>?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="atualizaStatusRDO(<?php echo $data9->IDMOV; ?>,'G',<?php echo $data9->NUMEROMOV; ?>,1,'RDO','ATENDIMENTO','AP','<?php echo $data9->DATA_REFERENCIA; ?>')" id="btncancelar">Sim, enviar!</button>
					</div>
				</div>
			</div>
		</div>

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
                                <input type="hidden" name="idmov" value="<?php echo $data9->IDMOV; ?>">
                                <input type="hidden" name="FLUXO" value="1152">
                                <!-- <label for="imageFiles">Selecione as imagens:</label><br> -->
                                <input type="file" class="btn btn-outline-primary btn-sm" name="files[]" multiple accept=".jpg, .png">
                                <input type="submit" class="btn btn-primary btn-sm" value="Enviar">
                            </form>
                        </div>

					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="(<?php echo $data9->IDMOV; ?>)" id="btncancelar">Sim, enviar!</button>
					</div> -->
				</div>
			</div>
		</div>



        <!-- MODAL PARA ENVIAR IMAGENS DAS EVIDÊNCIAS SSO -->
        <div class="modal fade" id="uploadimagemsso">
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
                                <input type="hidden" name="idmov" value="<?php echo $data9->IDMOV; ?>">
                                <input type="hidden" name="FLUXO" value="11522">
                                <!-- <label for="imageFiles">Selecione as imagens:</label><br> -->
                                <input type="file" class="btn btn-outline-primary btn-sm" name="files[]" multiple accept=".jpg, .png">
                                <input type="submit" class="btn btn-primary btn-sm" value="Enviar">
                            </form>
                        </div> 

					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="(<?php echo $data9->IDMOV; ?>)" id="btncancelar">Sim, enviar!</button>
					</div> -->
				</div>
			</div>
		</div>




       

      


		<!-- MENU PRINCIPAL DA PÁGINA -->
		<div class="container-fluid" id="pagesolicitacao">
			<div class="row">
				<div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
					<div class="btn-group mb-1">
						<!-- <button type="button" class="btn btn-primary light px-3"   aria-expanded="false"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
						<button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="false"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Adicionar RDO</button> -->
					</div>
					<div class="btn-group mb-1">
						<div class="btn-group mb-1 nav">

				

						<?php if ($data9->STATUS == 'B'): ?>
							<button type="button" class="btn btn-primary light px-3 testebotao" id="botaordosalvar" class="nav-link" onclick="updateRDO(<?= $IDMOV; ?>)">
								<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações
							</button>
						<?php else: ?>
							<button type="button" id="botaordosalvar3" class="btn btn-primary light px-3 testebotao" class="nav-link" onclick="insertAtendimentoRDO(<?= $IDMOV; ?>)">
								<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações
							</button>
						<?php endif; ?>

                        <?php if ($data9->STATUS == 'B'): ?>
							<button href="#navpills2-2" id="botaordosalvar2" type="button" class="btn btn-primary light px-3" data-bs-toggle="modal" data-bs-target="#aprovarrdo" data-id="aprovarrdo"><i class="fa fa-reply"></i> Enviar para aprovação</button>
						<?php else: ?>
							
						<?php endif; ?>

						
                        
							
						
							
                            
                            <!-- <button href="#navpills2-3" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3">Aprovados</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>




        <!-- MODAL PARA ADICIONAR FUNCIONÁRIO HORA NORMAL -->
        <div id="selectRecordModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Selecionar Funcionário Hora Normal</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>

                    <div class="modal-body">

                        <div class="row mt-3">
                            <div class="col-3">
                                <h5>Filtro Grupo</h5>
                                <select id="filter-gruposelect" class="default-select form-control wide mb-3">
                                
                                    <option value="">Todos</option>
                                    <?php foreach ($gruposfiltro as $grp): ?>
                                            <option value="<?php echo $grp['NOME']; ?>"><?php echo $grp['NOME']; ?></option>
                                    <?php endforeach; ?>    

                                </select>	
                            </div>
                        </div>

                        <table id="recordsTable" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>CHAPA</th>
                                    <th>FUNCIONARIO</th>
                                    <th>FUNCAO</th>
                                    <th>GRUPO</th>
                                    <th>Adicionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados dos registros disponíveis -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closedmodalnormal()">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL PARA ADICIONAR FUNCIONÁRIO HORA NORMAL -->
        <div id="selectRecordModal_extra" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Selecionar Funcionário Hora Extra</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>

                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="col-3">
                                <h5>Filtro Grupo</h5>
                                <select id="filter-gruposelectextra2" class="default-select form-control wide mb-3">
                                
                                    <option value="">Todos</option>
                                    <?php foreach ($gruposfiltro as $grp): ?>
                                            <option value="<?php echo $grp['NOME']; ?>"><?php echo $grp['NOME']; ?></option>
                                    <?php endforeach; ?>    

                                </select>	
                            </div>
                        </div>
                        <table id="recordsTable_extra" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>CHAPA</th>
                                    <th>FUNCIONARIO</th>
                                    <th>FUNCAO</th>
                                    <th>GRUPO</th>
                                    <th>Adicionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados dos registros disponíveis -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick= "closedmodalextra()" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>



	
		<!-- DADOS DO RDO ANTIGO QUE DEVEM IR PARA O MODAL DO NOVO RDO	 -->
		<div class="card-body">
			<div class="col-xl-12 col-xxl-12 row">
							<div class="col-xl-3 col-xxl-4 col-md-6">                                
								<div class="card-body">                                
									<div class="mb-4">
										<h4 class="card-title">Responsável TOP <code2>*</code2></h4>
									</div>  
									<select class="form-control border-dark" name = "responsaveltop" id = "responsaveltop"  aria-label="Default select example">					
										<option value=""> <?php echo $data9->RESPONSAVEL_TOP; ?></option> 								
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
                                    <option value="<?php echo $data9->RDO_RESPONSAVEL_CLI2; ?>"> <?php echo $data9->RDO_RESPONSAVEL_CLI2; ?></option> 	
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

							<div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<div class="mb-4">
										<h4 class="card-title">Área nível 1<code2>*</code2></h4> 
									</div>  
									<select class="form-control border-dark" name = "SAMF_CLI_AREANV1" id = "SAMF_CLI_AREANV1"  aria-label="Default select example">		
                                        <option value="<?php echo $data9->SAMF_CLI_AREANV1; ?>"><?php echo $data9->SAMF_CLI_AREANV1; ?></option>
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
										<h4 class="card-title">Tipo Solicitação</h4> 
									</div>  
									<select type="number" class="form-control border-dark" name = "SAMF_CLI_TIPOSC" id = "SAMF_CLI_TIPOSC"  aria-label="Default select example">
										
										<?php
										$status = $data9->TIPOSOLICITACAO;
										$status_text = '';

										switch ($status) {
											case '1':
												$status_text = '1 - Planejada';
												break;
											case '2':
												$status_text = '2 - Emergencial';
												break;
											case '3':
												$status_text = '3 - Orçamentação';
												break;
                                            case '4':
                                                $status_text = '4 - Não Planejada';
                                                break;
											
											default:
												$status_text = ''; 
												break;
										}
										?>

										<option value="<?php echo $status; ?>"><?php echo $status_text; ?></option>
										<option value="1">1 - Planejada</option> 		
										<option value="2">2 - Emergencial</option> 
										<option value="3">3 - Orçamentação</option> 	
									</select>
								</div>
							</div>

                            <div class="col-xl-3 col-xxl-4 col-md-6">
                                <div class="card-body">
                                    <h4 class="">Turno de trabalho: </h4>
                                </div>

                                                <?php
                                                    $status = $data9->RDO_TURNO;
                                                    $status_text = '';

                                                    switch ($status) {
                                                        case '1':
                                                            $status_text = '1 - Dia';
                                                            break;
                                                        case '2':
                                                            $status_text = '2 - Noite';
                                                            break;                                          
                                                        default:
                                                            $status_text = ''; 
                                                            break;
                                                    }
                                                ?>


                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="mb-3 mb-0">
                                                <label class="radio-inline me-3">
                                                    <input type="radio" name="optradio" id="turnodia" <?php echo ($status == '1') ? 'checked' : ''; ?>> Dia
                                                </label>
                                                <label class="radio-inline me-3">
                                                    <input type="radio" name="optradio" id="turnonoite" <?php echo ($status == '2') ? 'checked' : ''; ?>> Noite
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                            </div>

                            <?php
                                $tipordo = $data9->SAMF_RDO_TIPORDO;
                                $tipordo_text = '';

                                switch ($tipordo) {
                                    case '1':
                                        $tipordo_text = '1 - Turno';
                                        break;
                                    case '2':
                                        $tipordo_text = '2 - ADM';
                                        break;                                          
                                    default:
                                        $tipordo_text = ''; 
                                        break;
                                }
                            ?>

                            <div class="col-xl-3 col-xxl-4 col-md-6">
								<div class="card-body">
									<h4 class="">Tipo RDO: </h4>
								</div>
								<div class="card-body">
									<div class="basic-form">
										<form>
											<div class="mb-3 mb-0">
												<label class="radio-inline me-3"><input type="radio" name="optradio" <?php echo ($tipordo == '1') ? 'checked' : ''; ?> id="tipoturno"> Turno</label>
												<label class="radio-inline me-3"><input type="radio" name="optradio" <?php echo ($tipordo == '2') ? 'checked' : ''; ?> id="tipoadm"> ADM </label>
											</div>
										</form>
									</div>
								</div>												
							</div>


							
			</div>
		</div>
		<!-- AQUI FIM DO CABEÇALHO PARA INSERIR UM RDO INICIALMENTE --> 

		

		



		
			<!-- AQUI INÍCIO DE CADA RDO INSERIDO -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="accordion accordion-primary" id="accordion-two">
							<div class="accordion-item">
								<div class="accordion-header d-none rounded-lg" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One"   aria-expanded="false"  role="button">
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

														<div class="col-xxl-4 col-lg-4 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked10 = ($data9->SAMF_VS_MONTAGEM == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_MONTAGEM" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked10; ?>>
																<label class="form-check-label" for="customCheckBox6">Montagem de Andaimes </label>
															</div>
														</div>
																	
														<div class="col-xxl-4 col-lg-4 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked11 = ($data9->SAMF_VS_DESMONTAGEM == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_DESMONTAGEM" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked11; ?>>
																<label class="form-check-label" for="customCheckBox6">Desmontagem de Andaimes</label>
															</div>
														</div>

														<div class="col-xxl-4 col-lg-4 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked12 = ($data9->SAMF_VS_MOBILIZACAO == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_MOBILIZACAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked12; ?>>
																<label class="form-check-label" for="customCheckBox6">Mob. E Desmobilização de Material</label>
															</div>
														</div>

														<div class="col-xxl-4 col-lg-4 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked13 = ($data9->SAMF_VS_ADEQUACAO == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_ADEQUACAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked13; ?>>
																<label class="form-check-label" for="customCheckBox6">Adequação</label>
															</div>
														</div>

                                                        <div class="col-xxl-4 col-lg-4 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked14 = ($data9->SAMF_VS_MANUTENCAO == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_MANUTENCAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked14; ?>>
																<label class="form-check-label" for="customCheckBox6">Manutenção</label>
															</div>
														</div>

                                                        <div class="col-xxl-4 col-lg-4 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked15 = ($data9->SAMF_VS_ATICIVIL == 1) ? 'checked' : '';?>
																<input id="SAMF_VS_ATICIVIL" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked15; ?>>
																<label class="form-check-label" for="customCheckBox6">Atividade Civil</label>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>



                                        <!-- REFERÊNCIAS DE ANDAIMES -->
<div class="accordion-header rounded-lg  collapsed text-center" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
    <span class="accordion-header-text">Referências de Atividades</span>
    <span class="accordion-header-indicator"></span>
</div>

<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
    <div class="accordion-body-text">
        <div class="col-lg-12">
        
        <!-- BOTÃO SÓ SERÁ APRESENTADO QUANDO FOR PRIMEIRA EDIÇÃO  -->
        <?php if ($data9->STATUS == 'A'): ?>
            <button id="adicionarreferencia" type="button" class="btn btn-primary light px-3"><i class="fa fa-plus-circle"></i> Adicionar </button>
        

        <div class="card">
                <div class="card-body">
							<div class="table-responsive">
								<table id="dynamicTable_referencia" class="table table-responsive-md">
									<thead>
										<tr>
											<th><strong>N° Ordem</strong></th>
											<th><strong>TAG</strong></th>
											<th><strong>Atendimento</strong></th>
											<th><strong>M³</strong></th>
											<th><strong>Atividade</strong></th>
											<th><strong></strong></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="col-2">											
												<div class="input-group"> 
													<!-- <input type="text" class="form-control" id="horaentrada" onchange="calculateWorkingTime()" value="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span> -->
													<input type="text" class="form-control" id="SAMF_CLI_OS" value="">

												</div>
											</td>
											<td class="col-2">											
												<div class="input-group">
													<input type="text" class="form-control" id="SAMF_CLI_TAG" value="">
												</div>
											</td>
											<td class="col-1">											
                                                <select id="SAMF_RDO_TIPORDO_REF" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">TURNO</option>
                                                    <option value="2">ADM</option>
                                                </select>
											</td>
                                            <td class="col-1">											
												<div class="input-group">
													<input type="text" id="SAMF_RDO_METCUB" class="form-control" value="">
												</div>
											</td>
                                            <td class="col-2">											
                                                <select id="ATIVIDADE_REF" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">MONTAGEM</option>
                                                    <option value="2">DESMONTAGEM</option>
                                                    <option value="3">ADEQUAÇÃO</option>
                                                    <option value="4">MOBILIZAÇÃO</option>                                                    
                                                    <option value="5">MANUTENÇÃO</option>
                                                </select>
											</td>
											<td class="col-1">
												<div class="">
												    <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<!-- <button id="addRow" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adicionar Funcionário</button> -->
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



                        <!-- ABAIXO É APRESENTADO QUANDO FOR SEGUNDA EDIÇÃO, OU SEJA OS DADOS SÓ APARECERAM INFORMATIVO  -->
                        <?php else: ?>
                           
                        <h5 class="text-danger"><small>Atenção, as informações abaixo não podem ser atualizadas!</small></h5>
                        <table id="dynamicTable_referencia" class="table table-responsive-md">
									<thead>
										<tr>
											<th><strong>N° Ordem</strong></th>
											<th><strong>TAG</strong></th>
											<th><strong>Atendimento</strong></th>
											<th><strong>M³</strong></th>
											<th><strong>Atividade</strong></th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($relac as $relacitem): ?>
										<tr>
											<td class="col-2">											
												<div class="input-group"> 
													<!-- <input type="text" class="form-control" id="horaentrada" onchange="calculateWorkingTime()" value="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span> -->
													<input type="text" class="form-control bg-light" id="SAMF_CLI_OS" value="<?php echo $relacitem['SAMF_CLI_OS'] ?>">

												</div>
											</td>
											<td class="col-2">											
												<div class="input-group">
													<input type="text" class="form-control bg-light" id="SAMF_CLI_TAG" value="<?php echo $relacitem['SAMF_CLI_TAG'] ?>">
												</div>
											</td>

                                            <?php
                                                $statustipordo = $relacitem['SAMF_RDO_TIPORDO'];
                                                $status_texttipordo = '';

                                                switch ($statustipordo) {
                                                    case '1':
                                                        $status_texttipordo = 'Turno';
                                                        break;
                                                    case '2':
                                                        $status_texttipordo = 'ADM';
                                                        break;                                                              
                                                    default:
                                                    $status_texttipordo = ''; 
                                                    break;
                                                }
                                            ?>

											<td class="col-1">											
                                                <select id="SAMF_RDO_TIPORDO_REF" class="form-control bg-light">
                                                    <option value="<?php echo $statustipordo; ?>"><?php echo $status_texttipordo; ?></option>
                                                    <option value="1">TURNO</option>
                                                    <option value="2">ADM</option>
                                                </select>
											</td>

                                            <td class="col-1">											
												<div class="input-group">
													<input type="" class="form-control bg-light" id="SAMF_RDO_METCUB" value="<?php echo $relacitem['SAMF_RDO_METCUB']?>">
												</div>
											</td>
        
                                            <?php
                                                $status = $relacitem['ATIVIDADE_REF'];
                                                $status_text = '';

                                                switch ($status) {
                                                    case '1':
                                                        $status_text = '1 - Montagem';
                                                        break;
                                                    case '2':
                                                        $status_text = '2 - Desmontagem';
                                                        break;
                                                    case '3':
                                                        $status_text = '3 - Adequação';
                                                        break;
                                                    case '4':
                                                        $status_text = '4 - Mobilização';
                                                        break;
                                                    case '5':
                                                        $status_text = '5 - Manutenção';
                                                        break;                                                               
                                                    default:
                                                    $status_text = ''; 
                                                    break;
                                                }
                                            ?>

                                            <td class="col-2">											
                                                <select id="ATIVIDADE_REF" class="form-control bg-light">
                                                    <option value="<?php echo $status; ?>"><?php echo $status_text; ?></option>
                                                    <option value=""></option>
                                                    <option value="1">MONTAGEM</option>
                                                    <option value="2">DESMONTAGEM</option>
                                                    <option value="3">ADEQUAÇÃO</option>
                                                    <option value="4">MOBILIZAÇÃO</option>                                                    
                                                    <option value="5">MANUTENÇÃO</option>
                                                </select>
											</td>
										</tr>
                                        <?php endforeach; ?>
									</tbody>
								</table>


                                <?php endif; ?>








                </div> 
            </div>
        </div>
        <!-- FIM REFERÊNCIAS DE ANDAIMES -->



										<div class="accordion-item">
											<div class="accordion-header rounded-lg text-center collapsed" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="false">
												<span class="accordion-header-text">Impactos na Tarefa</span>
												<span class="accordion-header-indicator"></span>
											</div>
											<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
												<div class="accordion-body-text">
													<div class="row">
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked1 = ($data9->SAMF_VS_INTERFER1 == 1) ? 'checked' : '';?>
																<input id="impactos1" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked1; ?>>
																<label class="form-check-label" for="customCheckBox9">Interferência c/ Outra Atividade </label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked2 = ($data9->SAMF_VS_INTERFER2 == 1) ? 'checked' : '';?>
																<input id="impactos2" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked2; ?>>
																<label class="form-check-label" for="customCheckBox9">Operação Não Liberou Atividade</label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked3 = ($data9->SAMF_VS_INTERFER3 == 1) ? 'checked' : '';?>
																<input id="impactos3" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked3; ?>>
																<label class="form-check-label" for="customCheckBox9">Transferência para outra Atividade </label>
															</div>
														</div>

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked4 = ($data9->SAMF_VS_INTERFER4 == 1) ? 'checked' : '';?>
																<input id="impactos4" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked4; ?>>
																<label class="form-check-label" for="customCheckBox9">Chuva</label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked5 = ($data9->SAMF_VS_INTERFER5 == 1) ? 'checked' : '';?>
																<input id="impactos5" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked5; ?>>
																<label class="form-check-label" for="customCheckBox9">Vento Forte</label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked6 = ($data9->SAMF_VS_INTERFER6 == 1) ? 'checked' : '';?>
																<input id="impactos6" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked6; ?>>
																<label class="form-check-label" for="customCheckBox9">Local Inseguro P/ Executar Ativ</label>
															</div>
														</div>

														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked7 = ($data9->SAMF_VS_INTERFER7 == 1) ? 'checked' : '';?>
																<input id="impactos7" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked7; ?>>
																<label class="form-check-label" for="customCheckBox9">Falta do Responsável Bloqueio</label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked8 = ($data9->SAMF_VS_INTERFER8 == 1) ? 'checked' : '';?>
																<input id="impactos8" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked8; ?>>
																<label class="form-check-label" for="customCheckBox9">Falta de Energia</label>
															</div>
														</div>
														<div class="col-xl-3 col-xxl-3 col-md-6">
															<div class="form-check custom-checkbox mb-3 check-xs">
																<?php $checked9 = ($data9->SAMF_VS_INTERFER9 == 1) ? 'checked' : '';?>
																<input id="impactos9" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked9; ?>>
																<label class="form-check-label" for="customCheckBox9">Falta de Equipamento Solicitado P/ Apoio</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<!-- <div class="accordion-item">
										<div class="accordion-header rounded-lg text-center collapsed" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
											<span class="accordion-header-text text-center">Andaimes</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div class="row">
											<div class="col-1 mt-3">
												<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="toastr-success-bottom-right">Incluir RDO</button>
											</div>
										</div> -->

										<!-- <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
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
																				<td><input type="text" class="form-control" placeholder="0" id="alturamontagem"></td>
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
																	<button id="addRow_old" class="btn btn-primary">Adicionar Linha</button>
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
																	<table id="dynamicTable_old" class="table table-responsive-sm">
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
										</div> -->
			<div class="accordion-item">
				<div class="accordion-header rounded-lg  collapsed text-center" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
					<span class="accordion-header-text">Horário das Atividades</span>
					<span class="accordion-header-indicator"></span>
				</div>
				
                <!-- ABAIXO MOSTRA OS FUNCIONÁRIOS JÁ INSERIDOS INICIALMENT -->
                <?php if ($data9->STATUS == 'B'): ?>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
					<div class="accordion-body-text">
					<div class="col-lg-12">
					<div class="card">
						<!-- <div class="card-header">
							<h4 class="card-title">Infor</h4>
						</div> -->
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
											<th><strong>Total</strong></th>
											<!-- <th><strong></strong></th> -->
										</tr>
									</thead>
									<tbody>
										<?php foreach($data5 as $f): ?>
										<tr>
											<td><?php echo $f['CHAPA']; ?></td>
											<td><?php echo $f['FUNCIONARIO']; ?></td>
											<td><?php echo $f['FUNCAO']; ?></td>
											<td>											
												<div class="input-group"> 
													<!-- <input type="text" class="form-control" id="horaentrada" onchange="calculateWorkingTime()" value="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span> -->
													<input type="text" class="form-control" id="horaentrada" value="<?php echo $f['RDO_FUNC_ENTRADA']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>

												</div>
											</td>
											<td>											
												<div class="input-group">
													<input type="text" class="form-control" id="horasaida" value="<?php echo $f['RDO_FUNC_SAIDA']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
												</div>
											</td>
											<td>											
												<div class="input-group">
													<input type="" class="form-control bg-light" id="QUANTIDADENORMAL" value="<?php echo $f['QUANTIDADE']; ?>">
												</div>
											</td>
											<!-- <td>
												<div class="d-flex">
													<a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
												</div>
											</td> -->
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

                               
								<!-- <button id="addRow" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adicionar Funcionário</button> -->
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
                <?php else: ?>

                <!-- CASO O STATUS DO MOVIMENTO NÃO SEJA BLOQUEADO ELE VAI TRAZER OS ELEMENTOS ABAIXO -->


					<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
					<div class="accordion-body-text">
					<div class="col-lg-12">
					<div class="card">
						<!-- <div class="card-header">
							<h4 class="card-title">Infor</h4>
						</div> -->
						<div class="card-body">

                        <button id="addRecordBtn" class="btn btn-primary light px-3"><i class="fa fa-plus-circle"></i> Adicionar Funcionário</button>

                            
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h5>Filtro Grupo</h5>
                                    <select id="filter-grupo" class="default-select form-control wide mb-3">
                                    
                                        <option value="">Todos</option>
                                        <?php foreach ($gruposfiltro as $grp): ?>
                                                <option value="<?php echo $grp['NOME']; ?>"><?php echo $grp['NOME']; ?></option>
                                        <?php endforeach; ?>    

                                    </select>	
                                </div>
                            </div>

                      
							<div class="table-responsive">                                						

                               <div>

                                <table id="dynamicTableFuncionariosGeral" class="table table-responsive-md" style="min-width: 845px; width:100%;">
                                    <thead>
                                        <tr>
                                            <th><strong>Matrícula</strong></th>
                                            <th><strong>Nome</strong></th>
                                            <th><strong>Função</strong></th>
                                            <th><strong>Grupo</strong></th>
                                            <th><strong>Entrada</strong></th>
                                            <th><strong>Saída</strong></th>
                                            <th><strong>Total</strong></th>
                                            <th><strong></strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        



                                    </tbody>
                                </table>

                                




                               </div>


								<!-- <button id="addRow" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adicionar Funcionário</button> -->
								
							</div>
						</div>
					</div>
				</div>	
						<?php endif; ?>
                        
                		
			</div>

            <?php if ($data9->STATUS == 'A'): ?>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="">Houve atuação em hora extra? </h4>
                    </div>
                    <div class="text-center">
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
            </div>
            <?php endif; ?>



			<div class="accordion-item" id="horaextrasimaccordion" >
				<div class="accordion-header rounded-lg  collapsed text-center" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
					<span class="accordion-header-text">Atividades em Horário Extra</span>
					<span class="accordion-header-indicator"></span>
				</div>
				<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
					<div class="accordion-body-text">
					<div class="col-lg-12">
					<div class="card">

                        <div class="row mt-3">
                            <div class="col-3">

                                <button id="addRecordBtnextra" class="btn btn-primary light px-3 mb-3"><i class="fa fa-plus-circle"></i> Adicionar Funcionário</button>

                                <h5>Filtro Grupo</h5>
                                <select id="filter-gruposelectextra" class="default-select form-control wide mb-3 mt-3">
                                
                                    <option value="">Todos</option>
                                    <?php foreach ($gruposfiltro as $grp): ?>
                                            <option value="<?php echo $grp['NOME']; ?>"><?php echo $grp['NOME']; ?></option>
                                    <?php endforeach; ?>    

                                </select>	
                            </div>
                        </div>  

                        <div class="table-responsive">                                						

                               <div>

                                <table id="dynamicTableFuncionariosGeral_extra" class="table table-responsive-md" style="min-width: 845px; width:100%;">
                                    <thead>
                                        <tr>
                                            <th><strong>Matrícula</strong></th>
                                            <th><strong>Nome</strong></th>
                                            <th><strong>Função</strong></th>
                                            <th><strong>Grupo</strong></th>
                                            <th><strong>Entrada</strong></th>
                                            <th><strong>Saída</strong></th>
                                            <th><strong>Total</strong></th>
                                            <th><strong></strong></th>
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
</div><!-- FIM DO ACORDION INTERNO DE CADA RDO CRIADO --> 	



            <!-- EVIDÊNCIAS COMO FOTOS E ANEXOS SOBRE AS MONTAGENS  -->
            <div class="accordion-header rounded-lg  collapsed text-center mt-5" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
					<span class="accordion-header-text">Evidências das Atividades</span>
					<span class="accordion-header-indicator"></span>
				</div>
				
                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
					<div class="accordion-body-text">
					    <div class="col-lg-12">
					        <div class="card">
                            	<!-- <div class="card-header text-center">
									<h4 class="card-title">Evidências das Atividades </h4>
								</div> -->
                                <div class="card-body">
                                    <button data-bs-toggle="modal" data-bs-target="#uploadimagem" data-id="uploadimagem" class="btn btn-primary light px-3"><i class="fa fa-plus-circle"></i> Carregar Imagem</button>
                                    <!-- <div class="basic-form custom_file_input">															
                                        <form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="idmov" value="<?php echo $data9->IDMOV; ?>">
                                            <input type="hidden" name="FLUXO" value="1152">
                                            <label for="imageFiles">Selecione as imagens:</label><br>
                                            <input type="file" class="btn btn-outline-primary btn-sm" name="files[]" multiple accept=".jpg, .png">
                                            <input type="submit" class="btn btn-primary btn-sm" value="Enviar">
                                        </form>
                                    </div> -->
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
                                        <!-- <?php foreach ($data7 as $img): ?>
                                            <?php if ($img['IDMOV'] == $data9->IDMOV && $img['FLUXO'] == 1152): ?> 
                                                <li role="presentation">
                                                    <a href="#<?php echo   $img['NOMEARQUIVO'] ?>" role="tab" data-bs-toggle="tab">
                                                        <img class="img-fluid bg-image" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" width="50">
                                                        <button style="position: absolute;margin-left: -49px;margin-top: 6px;font-size: 14px;" type="button" class="btn btn-outline-danger  me-2 mb-2 btn-xxs"  role="button" onclick="deleteIMG('<?php echo $img['NOMEARQUIVO']; ?>')">
                                                            <i class="fa fa-window-close" aria-hidden="true"></i>
                                                        </button>
                                                    </a>                                                
                                                    <input type="text" onchange="updateNomeIMG('<?php echo $img['NOMEARQUIVO']; ?>')" class="form-control" id="<?php echo $img['NOMEARQUIVO']; ?>" value="<?php echo $img['NOMEARQUIVO_EXIBIR']; ?>"/>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?> -->
                                    </ul>
                                </div>
                                
                                




                                              
                                            
                                <!-- ABAIXO NOVA OPÇÃO DE IMAGENS -->
                                <div class="row"> 
                                    <?php foreach ($data7 as $img): ?>
                                    <?php if ($img['IDMOV'] == $data9->IDMOV && $img['FLUXO'] == 1152): ?>                                
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
                        <!-- FIM DO BLOCO DE EVIDÊNCIAS -->


<!-- REGISTRO DE OCORRÊNCIAS DE SSO -->
<div class="accordion-header rounded-lg  collapsed text-center" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
    <span class="accordion-header-text">Registro SSO</span>
    <span class="accordion-header-indicator"></span>
</div>

<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
    <div class="accordion-body-text">
        <div class="col-lg-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title">Carregar foto</h4>
                </div> -->
                <div class="card-body">
                    <button data-bs-toggle="modal" data-bs-target="#uploadimagemsso" data-id="uploadimagemsso" class="btn btn-primary light px-3"><i class="fa fa-plus-circle"></i> Carregar Imagem</button>
                    <!-- <div class="basic-form custom_file_input">															
                        <form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="idmov" value="<?php echo $data9->IDMOV; ?>">
                            <input type="hidden" name="FLUXO" value="11522">
                            <label for="imageFiles">Selecione as imagens:</label><br>
                            <input type="file" class="btn btn-outline-primary btn-sm" name="files[]" multiple accept=".jpg, .png">
                            <input type="submit" class="btn btn-primary btn-sm" value="Enviar">
                        </form>
                    </div> -->
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
                        <!-- <?php foreach ($data7 as $img): ?>
                            <?php if ($img['IDMOV'] == $data9->IDMOV && $img['FLUXO'] == 11522): ?> 
                                <li role="presentation">
                                    <a href="#<NOMEARQUIVO" role="tab" data-bs-toggle="tab">
                                        <img class="img-fluid bg-image" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" width="50">
                                    </a>
                                    <input type="text" onchange="updateNomeIMG('<?php echo $img['NOMEARQUIVO']; ?>')" class="form-control" id="<?php echo $img['NOMEARQUIVO']; ?>" value="<?php echo $img['NOMEARQUIVO_EXIBIR']; ?>"/>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?> -->
                    </ul>
                </div>  

                    <!-- ABAIXO NOVA OPÇÃO DE IMAGENS -->
                    <div class="row"> 
                        <?php foreach ($data7 as $img): ?>
                        <?php if ($img['IDMOV'] == $data9->IDMOV && $img['FLUXO'] == 11522): ?>                                
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
        <!-- FIM REGISTRO DE OCORRÊNCIAS DE SSO -->



        







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
                    <button id="btncomentario" type="button" class="btn btn-primary btn-sm mt-1" onclick="enviarcomentario(<?= $IDMOV; ?>,5,0)"> Enviar </button>         
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
										<?php if ($cmt['IDMOV'] == $IDMOV): ?> 
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
							<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 150px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div>
						</div>
					</div>
				</div><!-- FIM TIMELINE ANDAIME -->
				
			</div>
		</div>
	</div><!-- FIM ACCORDION DAS OBSERVAÇÕES DA VISITA-->
















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




<script>
document.addEventListener('DOMContentLoaded', function() {
    // Função para converter hora no formato HH:MM em minutos desde o início do dia
    function convertTimeToMinutes(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours * 60 + minutes;
    }

    // Função para formatar a hora no formato HH:MM
    function formatTimeInput(input) {
        let valor = input.value.replace(/[^0-9:]/g, ''); // Remove caracteres não numéricos e ':'
        if (valor.length > 5) {
            valor = valor.slice(0, 5); // Limita a 5 caracteres (HH:MM)
        }
        if (valor.length > 2 && valor.indexOf(':') === -1) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2); // Insere ':' se não existir
        }
        input.value = valor;
    }

    // Função para calcular o tempo de trabalho
    function calculateWorkingTime() {
        // Seleciona todas as linhas da tabela
        const rows = document.querySelectorAll('#dynamicTable tbody tr');
        
        rows.forEach(row => {
            // Seleciona os campos de entrada e saída
            const entradaInput = row.querySelector('#horaentrada');
            const saidaInput = row.querySelector('#horasaida');
            const quantidadeNormalField = row.querySelector('#QUANTIDADENORMAL');
            
            // Formata os campos de entrada
            formatTimeInput(entradaInput);
            formatTimeInput(saidaInput);

            // Verifica se ambos os campos estão preenchidos
            if (entradaInput.value && saidaInput.value) {
                // Converte as horas para minutos
                const entradaMinutos = convertTimeToMinutes(entradaInput.value);
                const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
                // Calcula a diferença
                let quantidadeNormal = saidaMinutos - entradaMinutos;
                
                // Verifica se a saída é anterior à entrada (caso de turno que cruza a meia-noite)
                if (quantidadeNormal < 0) {
                    quantidadeNormal += 24 * 60; // Adiciona 24 horas em minutos
                }
                
                // Atualiza o campo QUANTIDADENORMAL
                quantidadeNormalField.value = quantidadeNormal - 60;
            }
        });
    }

    // Adiciona eventos de input para recalcular quando os horários mudarem
    document.querySelectorAll('#dynamicTable tbody tr').forEach(row => {
        const entradaInput = row.querySelector('#horaentrada');
        const saidaInput = row.querySelector('#horasaida');

        entradaInput.addEventListener('input', calculateWorkingTime);
        saidaInput.addEventListener('input', calculateWorkingTime);

        // Formata os campos de entrada inicialmente
        formatTimeInput(entradaInput);
        formatTimeInput(saidaInput);
    });

    // Calcula o tempo de trabalho ao carregar a página
    calculateWorkingTime();
});
</script>





<!-- ABAIXO FORMATACAO DOS CAMPOS DE HORA EXTRA -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Função para converter hora no formato HH:MM em minutos desde o início do dia
    function convertTimeToMinutes(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours * 60 + minutes;
    }

    // Função para formatar a hora no formato HH:MM
    function formatTimeInput(input) {
        let valor = input.value.replace(/[^0-9:]/g, ''); // Remove caracteres não numéricos e ':'
        if (valor.length > 5) {
            valor = valor.slice(0, 5); // Limita a 5 caracteres (HH:MM)
        }
        if (valor.length > 2 && valor.indexOf(':') === -1) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2); // Insere ':' se não existir
        }
        input.value = valor;
    }

    // Função para calcular o tempo de trabalho
    function calculateWorkingTime() {
        // Seleciona todas as linhas da tabela
        const rows = document.querySelectorAll('#dynamicTable_extra tbody tr');
        
        rows.forEach(row => {
            // Seleciona os campos de entrada e saída
            const entradaInput = row.querySelector('#horaentradaextra');
            const saidaInput = row.querySelector('#horasaidaextra');
            const quantidadeNormalField = row.querySelector('#QUANTIDADEEXTRA');
            
            // Formata os campos de entrada
            formatTimeInput(entradaInput);
            formatTimeInput(saidaInput);

            // Verifica se ambos os campos estão preenchidos
            if (entradaInput.value && saidaInput.value) {
                // Converte as horas para minutos
                const entradaMinutos = convertTimeToMinutes(entradaInput.value);
                const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
                // Calcula a diferença
                let quantidadeNormal = saidaMinutos - entradaMinutos;
                
                // Verifica se a saída é anterior à entrada (caso de turno que cruza a meia-noite)
                if (quantidadeNormal < 0) {
                    quantidadeNormal += 24 * 60; // Adiciona 24 horas em minutos
                }
                
                // Atualiza o campo QUANTIDADENORMAL
                quantidadeNormalField.value = quantidadeNormal - 60;
            }
        });
    }

    // Adiciona eventos de input para recalcular quando os horários mudarem
    document.querySelectorAll('#dynamicTable_extra tbody tr').forEach(row => {
        const entradaInput = row.querySelector('#horaentradaextra');
        const saidaInput = row.querySelector('#horasaidaextra');

        entradaInput.addEventListener('input', calculateWorkingTime);
        saidaInput.addEventListener('input', calculateWorkingTime);

        // Formata os campos de entrada inicialmente
        formatTimeInput(entradaInput);
        formatTimeInput(saidaInput);
    });

    // Calcula o tempo de trabalho ao carregar a página
    calculateWorkingTime();
});
</script>









<!-- Inclua o jQuery -->

    <!-- Adicione o script para manipulação da tabela -->
    <script>
        $(document).ready(function() {
            // Função para adicionar nova linha na tabela
            $('#addRow').click(function() {
                adicionarLinha();
            });

            // Função para adicionar nova linha na tabela
            function adicionarLinha() {
                // Obter a tabela e o corpo da tabela
                var table = $('#dynamicTable');
                var tbody = table.find('tbody');
                // Contar o número de linhas para definir o índice
                var rowCount = tbody.find('tr').length + 1;

                // Criar a nova linha
                var newRow = `
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Matrícula"></td>
                        <td><input type="text" class="form-control" placeholder="Nome"></td>
                        <td><input type="text" class="form-control" placeholder="Função"></td>
                        <td>
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" placeholder="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </td>
                        <td>
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" placeholder="18:00"><span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>`;

                // Adicionar a nova linha ao final do corpo da tabela
                tbody.append(newRow);
            }

            // Função para remover a linha
            $(document).on('click', '.remove-row', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                // Recontar as linhas após a remoção para manter a numeração correta
                $('#dynamicTable tbody tr').each(function(index) {
                    $(this).find('th').text(index + 1);
                });
            });
        });
    </script>



<script>
        $(document).ready(function() {
            // Função para adicionar nova linha na tabela
            $('#addRow').click(function() {
                adicionarLinha();
            });

            // Função para adicionar nova linha na tabela
            function adicionarLinha() {
                // Obter a tabela e o corpo da tabela
                var table = $('#dynamicTable');
                var tbody = table.find('tbody');
                // Contar o número de linhas para definir o índice
                var rowCount = tbody.find('tr').length + 1;

                // Criar a nova linha
                var newRow = `
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Matrícula"></td>
                        <td><input type="text" class="form-control" placeholder="Nome"></td>
                        <td><input type="text" class="form-control" placeholder="Função"></td>
                        <td>
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" placeholder="08:00"><span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </td>
                        <td>
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" placeholder="18:00"><span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>`;

                // Adicionar a nova linha ao final do corpo da tabela
                tbody.append(newRow);
            }

            // Função para remover a linha
            $(document).on('click', '.remove-row', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                // Recontar as linhas após a remoção para manter a numeração correta
                $('#dynamicTable tbody tr').each(function(index) {
                    $(this).find('th').text(index + 1);
                });
            });
        });
    </script>





<script>
	$(document).ready(function() {

		$('input[name="optradio"]').on('change', function() {
			if ($('#horaextrasim').is(':checked')) {
				$('#horaextrasimaccordion').slideDown(); 
			} else {
				$('#horaextrasimaccordion').slideUp(); 
			}
		});
		
		
		if ($('#horaextrasim').is(':checked')) {
			$('#horaextrasimaccordion').slideDown(); 
		} else {
			$('#horaextrasimaccordion').slideUp(); 
		}
	});
</script>





<!-- ENVIAR RDO PARA APROVAÇÃO DO GESTOR TOP  -->
<script>

        

    function enviarAprovRDO(IDMOV) {
        var STATUS = 'G';
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
            "REF": 'B'
        };

        var botaordosalvar_js = document.getElementById('botaordosalvar');
		botaordosalvar_js.disabled = true;
        botaordosalvar_js.innerHTML = "Edição bloqueada!";

        var botaordosalvar2_js = document.getElementById('botaordosalvar2');
		botaordosalvar2_js.disabled = true;
        botaordosalvar2_js.innerHTML = "<i class='fa fa-reply'></i> Enviando...";


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

                // setTimeout(datatableRDO, 0);
				// setTimeout(datatableRDOAprov, 0);

                botaordosalvar2_js.innerHTML = "Enviado!";

                var newUrl = "<?php echo base_url('rdo/'); ?>";

				setTimeout(function() {
					window.location.href = newUrl;
				}, 3000); 

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



<!-- SCRIPT PARA ADICIONAR UMA REFERENCIA DE TAREFA NO RDO  -->
<script>
    document.getElementById("adicionarreferencia").addEventListener("click", function() {
        
    var table = document.getElementById("dynamicTable_referencia").getElementsByTagName('tbody')[0];
    
    // Clona a última linha
    var newRow = table.rows[table.rows.length - 1].cloneNode(true);    
    
    var inputs = newRow.getElementsByTagName('input');
    for(var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
    
    var selects = newRow.getElementsByTagName('select');
    for(var i = 0; i < selects.length; i++) {
        selects[i].selectedIndex = 0;
    }
    
    table.appendChild(newRow);    
    
    var removeButtons = table.getElementsByClassName("remove-row");
    for(var i = 1; i < removeButtons.length; i++) {  
        removeButtons[i].onclick = function() {
            this.closest('tr').remove();
        }
    }
});


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








<!-- SCRIPT PARA ADICIONAR FUNCIONÁRIO HORA NORMAL  -->
<script>

function closedmodalnormal(){        
    // Fechar o modal
    $('#selectRecordModal').modal('hide');
}

var dataReferencia = "<?php echo $data9->DATA_REFERENCIA; ?>";  // Garante que a data seja passada como string
var partesData = dataReferencia.split('/');  // Divide a data no formato dd/mm/aaaa
var mesDATAREFERENCIA = partesData[1];  
var anoDATAREFERENCIA = partesData[2];  


$(document).ready(function() {
    // Inicializar DataTable para o modal
    var recordsTable = $('#recordsTable').DataTable({
        "lengthChange": false,
        'ajax': '<?php echo base_url('RDOFuncionariosGeral') ?>' + '?mes=' + mesDATAREFERENCIA + '&ano=' + anoDATAREFERENCIA + '&_=' + new Date().getTime(),
        "columns": [
            { data: "CHAPA" },
            { data: "FUNCIONARIO" },
            { data: "FUNCAO" },
            { data: "NOME_GRUPO" },
            {
                data: null,
                defaultContent: '<button class="btn btn-primary select-row">Selecionar</button>'
            }
        ]
    });

    $('#filter-gruposelect').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            recordsTable.column(3).search('^' + selectedValue + '$', true, false).draw();
        } else {
            recordsTable.column(3).search('').draw();
        }
    });

    // Abrir o modal ao clicar no botão de adicionar
    $('#addRecordBtn').on('click', function() {
        $('#selectRecordModal').modal('show');
    });

    // Lidar com a seleção de um registro
    $('#recordsTable').on('click', '.select-row', function() {
        var row = recordsTable.row($(this).parents('tr')).data();
        
        // Criar uma nova linha na tabela principal
        var newRow = `
            <tr>
                <td>${row.CHAPA}</td>
                <td>${row.FUNCIONARIO}</td>
                <td>${row.FUNCAO}</td>
                <td>${row.NOME_GRUPO}</td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control horaentrada" value="08:00">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control horasaida" value="18:00">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light quantidadeNormal" value="">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </td>
                <td>
                    <div class="d-flex">
                        <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        `;

        // Adicionar a nova linha à tabela principal
        $('#dynamicTableFuncionariosGeral tbody').append(newRow);
        calculateWorkingTime();

        // ALERTA INDICANDO QUE FOI ADICIONARO 
        toastr.success("Funcionário adicionado com sucesso!", "TOP Andaimes", {
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

        // // Fechar o modal
        // $('#selectRecordModal').modal('hide');
    });

    // Opcional: Lógica para remover uma linha da tabela principal
    $('#dynamicTableFuncionariosGeral').on('click', '.remove-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });


    function convertTimeToMinutes(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours * 60 + minutes;
    }

    function formatTimeInput(input) {
        let valor = input.value.replace(/[^0-9:]/g, ''); // Remove caracteres não numéricos e ':'
        if (valor.length > 5) {
            valor = valor.slice(0, 5); // Limita a 5 caracteres (HH:MM)
        }
        if (valor.length > 2 && valor.indexOf(':') === -1) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2); // Insere ':' se não existir
        }
        input.value = valor;
    }
    
    function calculateWorkingTime() {
        
        $('#dynamicTableFuncionariosGeral tbody tr').each(function() {
            
            const entradaInput = $(this).find('.horaentrada').get(0);
            const saidaInput = $(this).find('.horasaida').get(0);
            const quantidadeNormalField = $(this).find('.quantidadeNormal').get(0);
            
            
            formatTimeInput(entradaInput);
            formatTimeInput(saidaInput);

            
            if (entradaInput.value && saidaInput.value) {
                
                const entradaMinutos = convertTimeToMinutes(entradaInput.value);
                const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
                
                let quantidadeNormal = saidaMinutos - entradaMinutos;
                
                
                if (quantidadeNormal < 0) {
                    quantidadeNormal += 24 * 60; 
                }                
                
                quantidadeNormalField.value = quantidadeNormal - 60; 
            }
        });
    }


});
</script>






<!-- SCRIPT PARA ADICIONAR FUNCIONÁRIO HORA EXTRA  -->
<script>

function closedmodalextra(){        
    // Fechar o modal
    $('#selectRecordModal_extra').modal('hide');
}

$(document).ready(function() {

    var dataReferencia = "<?php echo $data9->DATA_REFERENCIA; ?>";  // Garante que a data seja passada como string
    var partesData = dataReferencia.split('/');  // Divide a data no formato dd/mm/aaaa
    var mesDATAREFERENCIA = partesData[1];  
    var anoDATAREFERENCIA = partesData[2];  

    var url = '<?php echo base_url('RDOFuncionariosGeral') ?>' + '?mes=' + mesDATAREFERENCIA + '&ano=' + anoDATAREFERENCIA;
    console.log(url); 

    // Inicializar DataTable para o modal
    var recordsTableextra2 = $('#recordsTable_extra').DataTable({
        "lengthChange": false,
        'ajax': '<?php echo base_url('RDOFuncionariosGeral') ?>' + '?mes=' + mesDATAREFERENCIA + '&ano=' + anoDATAREFERENCIA + '&_=' + new Date().getTime(),
        "columns": [
            { data: "CHAPA" },
            { data: "FUNCIONARIO" },
            { data: "FUNCAO" },
            { data: "NOME_GRUPO" },
            {
                data: null,
                defaultContent: '<button class="btn btn-primary select-row-extra">Selecionar</button>'
            }
        ]
    });

    $('#filter-gruposelectextra2').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            recordsTableextra2.column(3).search('^' + selectedValue + '$', true, false).draw();
        } else {
            recordsTableextra2.column(3).search('').draw();
        }
    });

    // Abrir o modal ao clicar no botão de adicionar
    $('#addRecordBtnextra').on('click', function() {
        $('#selectRecordModal_extra').modal('show');
    });

    // Lidar com a seleção de um registro
    $('#recordsTable_extra').on('click', '.select-row-extra', function() {
        var row = recordsTableextra2.row($(this).parents('tr')).data();
        
        // Criar uma nova linha na tabela principal
        var newRow = `
            <tr>
                <td>${row.CHAPA}</td>
                <td>${row.FUNCIONARIO}</td>
                <td>${row.FUNCAO}</td>
                <td>${row.NOME_GRUPO}</td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control horaentrada" value="18:00">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control horasaida" value="20:00">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light quantidadeNormal" value="">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </td>
                <td>
                    <div class="d-flex">
                        <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        `;

        // Adicionar a nova linha à tabela principal
        $('#dynamicTableFuncionariosGeral_extra tbody').append(newRow);
        calculateWorkingTime();

        // ALERTA INDICANDO QUE FOI ADICIONARO 
        toastr.success("Funcionário adicionado com sucesso!", "TOP Andaimes", {
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
    });

    // Opcional: Lógica para remover uma linha da tabela principal
    $('#dynamicTableFuncionariosGeral_extra').on('click', '.remove-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    function convertTimeToMinutes(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours * 60 + minutes;
    }

    function formatTimeInput(input) {
        let valor = input.value.replace(/[^0-9:]/g, ''); // Remove caracteres não numéricos e ':'
        if (valor.length > 5) {
            valor = valor.slice(0, 5); // Limita a 5 caracteres (HH:MM)
        }
        if (valor.length > 2 && valor.indexOf(':') === -1) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2); // Insere ':' se não existir
        }
        input.value = valor;
    }
    
    function calculateWorkingTime() {
        
        $('#dynamicTableFuncionariosGeral_extra tbody tr').each(function() {
            
            const entradaInput = $(this).find('.horaentrada').get(0);
            const saidaInput = $(this).find('.horasaida').get(0);
            const quantidadeNormalField = $(this).find('.quantidadeNormal').get(0);
            
            
            formatTimeInput(entradaInput);
            formatTimeInput(saidaInput);

            
            if (entradaInput.value && saidaInput.value) {
                
                const entradaMinutos = convertTimeToMinutes(entradaInput.value);
                const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
                
                let quantidadeNormal = saidaMinutos - entradaMinutos;
                
                
                if (quantidadeNormal < 0) {
                    quantidadeNormal += 24 * 60; 
                }
                
                
                quantidadeNormalField.value = quantidadeNormal - 60; 
            }
        });
    }
});
</script>






<!-- SCRIPT PARA FUNCIONÁRIOS GERAIS  -->
<script>
function datatableFuncionariosGeral() {
    if ($.fn.DataTable.isDataTable('#dynamicTableFuncionariosGeral')) {
        $('#dynamicTableFuncionariosGeral').DataTable().clear().destroy();
    }

    var dataReferencia = "<?php echo $data9->DATA_REFERENCIA; ?>";  // Garante que a data seja passada como string
    var partesData = dataReferencia.split('/');  // Divide a data no formato dd/mm/aaaa
    var mesDATAREFERENCIA = partesData[1];  
    var anoDATAREFERENCIA = partesData[2];  

    var url = '<?php echo base_url('RDOFuncionariosGeral') ?>' + '?mes=' + mesDATAREFERENCIA + '&ano=' + anoDATAREFERENCIA;
    console.log(url); 

    var table = $('#dynamicTableFuncionariosGeral').DataTable({
        "pageLength": 200,
        "lengthChange": false,
        // ajax: '<?php echo base_url('RDOFuncionariosGeral') ?>',
        ajax: '<?php echo base_url('RDOFuncionariosGeral') ?>' + '?mes=' + mesDATAREFERENCIA + '&ano=' + anoDATAREFERENCIA + '&_=' + new Date().getTime(),
       
        columns: [
            { data: "CHAPA" },
            { data: "FUNCIONARIO" },
            { data: "FUNCAO" },
            { data: "NOME_GRUPO" },
            {
                data: "RDO_FUNC_ENTRADA",
                render: function(data, type, row) {
                    return `<div class="input-group">
                                <input type="text" class="form-control horaentrada" value="08:00">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>`;
                }
            },
            {
                data: "RDO_FUNC_SAIDA",
                render: function(data, type, row) {
                    return `<div class="input-group">
                                <input type="text" class="form-control horasaida" value="18:00">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>`;
                }
            },
            {
                data: "QUANTIDADE",
                render: function(data, type, row) {
                    return `<div class="input-group">
                                <input type="text" class="form-control bg-light quantidadeNormal" value="">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>`;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="d-flex">
                                <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                            </div>`;
                }
            }
        ]

        
    });

    $('#filter-grupo').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            table.column(3).search('^' + selectedValue + '$', true, false).draw();
        } else {
            table.column(3).search('').draw();
        }
    });

    // Função para converter hora no formato HH:MM em minutos desde o início do dia
    function convertTimeToMinutes(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours * 60 + minutes;
    }

    // Função para formatar a hora no formato HH:MM
    function formatTimeInput(input) {
        let valor = input.value.replace(/[^0-9:]/g, ''); // Remove caracteres não numéricos e ':'
        if (valor.length > 5) {
            valor = valor.slice(0, 5); // Limita a 5 caracteres (HH:MM)
        }
        if (valor.length > 2 && valor.indexOf(':') === -1) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2); // Insere ':' se não existir
        }
        input.value = valor;
    }

    // Função para calcular o tempo de trabalho
    function calculateWorkingTime() {
        // Seleciona todas as linhas da tabela
        $('#dynamicTableFuncionariosGeral tbody tr').each(function() {
            // Seleciona os campos de entrada e saída
            const entradaInput = $(this).find('.horaentrada').get(0);
            const saidaInput = $(this).find('.horasaida').get(0);
            const quantidadeNormalField = $(this).find('.quantidadeNormal').get(0);
            
            // Formata os campos de entrada
            formatTimeInput(entradaInput);
            formatTimeInput(saidaInput);

            // Verifica se ambos os campos estão preenchidos
            if (entradaInput.value && saidaInput.value) {
                // Converte as horas para minutos
                const entradaMinutos = convertTimeToMinutes(entradaInput.value);
                const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
                // Calcula a diferença
                let quantidadeNormal = saidaMinutos - entradaMinutos;
                
                // Verifica se a saída é anterior à entrada (caso de turno que cruza a meia-noite)
                if (quantidadeNormal < 0) {
                    quantidadeNormal += 24 * 60; // Adiciona 24 horas em minutos
                }
                   
             
                // Atualiza o campo QUANTIDADENORMAL
                // Atualiza o campo QUANTIDADENORMAL
                let novaQuantidade = quantidadeNormal - 60; // Ajuste de horas de almoço

                if (novaQuantidade < 0) {
                    quantidadeNormalField.value = 0; // Define como zero se a nova quantidade for negativa
                } else {
                    quantidadeNormalField.value = novaQuantidade; // Mantém o valor se for maior ou igual a zero
                }





            }
        });
    }

    // Evento para executar a formatação e o cálculo após o DataTable ser desenhado
    table.on('draw', function() {
        calculateWorkingTime();
    });

    // Adiciona eventos de input para recalcular quando os horários mudarem
    $('#dynamicTableFuncionariosGeral').on('input', '.horaentrada, .horasaida', function() {
        calculateWorkingTime();
    });
}

// Inicializa o DataTable quando o documento estiver pronto
$(document).ready(function() {
    datatableFuncionariosGeral();
});
</script>












<!-- ABAIXO SCRIPT PARA FUNCIONARIOS EXTRA  -->
 
<script>
function datatableFuncionariosGeral_extra() {
    if ($.fn.DataTable.isDataTable('#dynamicTableFuncionariosGeral_extra')) {
        $('#dynamicTableFuncionariosGeral_extra').DataTable().clear().destroy();
    }

    var dataReferencia = "<?php echo $data9->DATA_REFERENCIA; ?>";  // Garante que a data seja passada como string
    var partesData = dataReferencia.split('/');  // Divide a data no formato dd/mm/aaaa
    var mesDATAREFERENCIA = partesData[1];  
    var anoDATAREFERENCIA = partesData[2];  


    var table = $('#dynamicTableFuncionariosGeral_extra').DataTable({
        "pageLength": 200,
        "lengthChange": false,
        'ajax': '<?php echo base_url('RDOFuncionariosGeral') ?>' + '?mes=' + mesDATAREFERENCIA + '&ano=' + anoDATAREFERENCIA + '&_=' + new Date().getTime(),
        columns: [
            { data: "CHAPA" },
            { data: "FUNCIONARIO" },
            { data: "FUNCAO" },
            { data: "NOME_GRUPO" },
            {
                data: "RDO_FUNC_ENTRADA",
                render: function(data, type, row) {
                    return `<div class="input-group">
                                <input type="text" class="form-control horaentrada" value="18:00">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>`;
                }
            },
            {
                data: "RDO_FUNC_SAIDA",
                render: function(data, type, row) {
                    return `<div class="input-group">
                                <input type="text" class="form-control horasaida" value="20:00">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>`;
                }
            },
            {
                data: "QUANTIDADE",
                render: function(data, type, row) {
                    return `<div class="input-group">
                                <input type="text" class="form-control bg-light quantidadeNormal" value="">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>`;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<div class="d-flex">
                                <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                            </div>`;
                }
            }
        ]
    });

    $('#filter-gruposelectextra').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            table.column(3).search('^' + selectedValue + '$', true, false).draw();
        } else {
            table.column(3).search('').draw();
        }
    });

    // Função para converter hora no formato HH:MM em minutos desde o início do dia
    function convertTimeToMinutes(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours * 60 + minutes;
    }

    // Função para formatar a hora no formato HH:MM
    function formatTimeInput(input) {
        let valor = input.value.replace(/[^0-9:]/g, ''); // Remove caracteres não numéricos e ':'
        if (valor.length > 5) {
            valor = valor.slice(0, 5); // Limita a 5 caracteres (HH:MM)
        }
        if (valor.length > 2 && valor.indexOf(':') === -1) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2); // Insere ':' se não existir
        }
        input.value = valor;
    }

    // Função para calcular o tempo de trabalho
    function calculateWorkingTime() {
        // Seleciona todas as linhas da tabela
        $('#dynamicTableFuncionariosGeral_extra tbody tr').each(function() {
            // Seleciona os campos de entrada e saída
            const entradaInput = $(this).find('.horaentrada').get(0);
            const saidaInput = $(this).find('.horasaida').get(0);
            const quantidadeNormalField = $(this).find('.quantidadeNormal').get(0);
            
            // Formata os campos de entrada
            formatTimeInput(entradaInput);
            formatTimeInput(saidaInput);

            // Verifica se ambos os campos estão preenchidos
            if (entradaInput.value && saidaInput.value) {
                // Converte as horas para minutos
                const entradaMinutos = convertTimeToMinutes(entradaInput.value);
                const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
                // Calcula a diferença
                let quantidadeNormal = saidaMinutos - entradaMinutos;
                
                // Verifica se a saída é anterior à entrada (caso de turno que cruza a meia-noite)
                if (quantidadeNormal < 0) {
                    quantidadeNormal += 24 * 60; // Adiciona 24 horas em minutos
                }
                
                // Atualiza o campo QUANTIDADENORMAL
                let novaQuantidade = quantidadeNormal - 60; // Ajuste de horas de almoço

                if (novaQuantidade < 0) {
                    quantidadeNormalField.value = 0; // Define como zero se a nova quantidade for negativa
                } else {
                    quantidadeNormalField.value = novaQuantidade; // Mantém o valor se for maior ou igual a zero
                }



            }
        });
    }

    // Evento para executar a formatação e o cálculo após o DataTable ser desenhado
    table.on('draw', function() {
        calculateWorkingTime();
    });

    // Adiciona eventos de input para recalcular quando os horários mudarem
    $('#dynamicTableFuncionariosGeral_extra').on('input', '.horaentrada, .horasaida', function() {
        calculateWorkingTime();
    });
}

// Inicializa o DataTable quando o documento estiver pronto
$(document).ready(function() {
    datatableFuncionariosGeral_extra();
});
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



<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>