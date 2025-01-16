
<?php echo $this->extend('components/scripts/carregamentos') ?>

<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">




        
    <!-- MODAL PARA CANCELAMENTO DE SOLICITAÇÃO O MODAL É ACIONADO E CONSTRUÍDO PELO SCRIPT  -->
    <div class="modal fade" id="modalDinamico" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDinamicoTitulo">Cancelamento de Visita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalDinamicoCorpo">
                    <!-- Conteúdo dinâmico será preenchido via JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
                    <!-- Botão com onclick dinâmico -->
                    <button 
                        type="button" 
                        class="btn btn-primary" 
                        id="modalDinamicoConfirmar"
                        data-bs-dismiss="modal"
                    >
                        Sim, cancelar!
                    </button>
                </div>
            </div>
        </div>
    </div>

    



	<!-- row -->
	<div class="container-fluid">
		<div class="row page-titles mt-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a>Gestão de Andaimes</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Solicitação</a>
				</li>
			</ol>
		</div>

		<div class="row">
			                
				<div class="container-fluid" id="pagesolicitacao">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
							<div class="btn-group mb-1">
								<!-- <button type="button" class="btn btn-primary light btn-xs mb-1"   aria-expanded="true"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button> -->
                                <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
								    <button type="button" class="btn btn-primary light btn-xs mb-1"   aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Nova Solicitação</button>
								<?php } ?>
                                <!-- <button type="button" class="btn btn-primary light btn-xs mb-1"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel"><i type="button" class="fa fa-file-excel-o"></i></button> -->
							</div>
							<div class="btn-group mb-1">
								<!-- <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-folder"></i> 
									Status <b class="caret m-l-5"></b>
								</button> -->
								<!-- <div class="dropdown-menu" style="margin: 0px;"> 
									<a href="#navpills2-1" type="button" class="btn btn-primary light btn-xs mb-1" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-1">Em Solicitação</a> 
									<a class="dropdown-item" href="javascript: void(0);">Em Visita</a> 
									<a class="dropdown-item" href="javascript: void(0);">Em Projeto</a>
									<a class="dropdown-item" href="javascript: void(0);">Em Execução</a>
								</div> -->
								<div class="btn-group mb-1 nav">
									<button href="#navpills2-1" type="button" class="btn btn-primary light btn-xs mb-1" href="javascript:void()" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-1">Em Solicitação</button>
									<button href="#navpills2-2" type="button" class="btn btn-primary light btn-xs mb-1" href="javascript:void()" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-2" id="botaotablevisitas">Em Visita</button>
									<button href="#navpills2-3" type="button" class="btn btn-primary light btn-xs mb-1" href="javascript:void()" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3" id="botaotableexecu">Em Execução</button>
								</div>
							</div>
                        </div>
                    </div>
                </div>

                <!-- INICIO DO MENU DE PESQUISA -->
                <div id="collapsesearch" class="collapse accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-search">
                    <div class="accordion-body-text">
                        <div class="col-12">
                            <li class="nav-item d-flex align-items-center">
                                <div class="input-group search-area">
                                    <input id="conteudopesquisar" type="text" class="form-control border-light" placeholder="Pesquisar solicitações...">
                                    <span class="input-group-text border-light" id="btnPesquisar"><a href="javascript:void(0)"><i class="flaticon-381-search-2" onclick="pesquisar()"></i></a></span>
                                </div>
                            </li>
                        </div>							
                    </div>
                </div>
                <!-- FIM DO MENU DE PESQUISA -->

                <div class="card-body"><!-- INICIO MENU SUPERIOR DAS SOLICITAÇÕES -->                                 
                    <div class="col-xl-12"><!-- INICIO MENU PARA INSERIR SOLICITAÇÃO -->
                        <div class="container-fluid" id="accordion-two">                                       
                            <h4 class="card-title" aria-controls="collapse2One">
                            </h4> 					
                            <div class="accordion-item b-none">
                                <div id="collapse2One" class="collapse accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
                                    <div class="accordion-body-text">
                                    <div class=""></div>
                                </div>

                                <div class="row">   


								<!-- <div class="card">
									<div class="card-header">
										<h4 class="card-title">Data</h4>
									</div>
									<div class="card-body">
										<p class="mb-1">Default</p>
										<input name="datepicker" class="datepicker-default form-control" id="datepicker">
									</div>
								</div> -->


                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">OS cliente</h4>
                                            <input id="SAMF_CLI_OS" width="100%" class="form-control" value = " " />
                                        </div>
                                    </div>	
                                    
                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">QR CODE</h4>
                                            <input id="SAMF_CLI_QRCODE" width="100%" class="form-control" placehoolder = "0001" type="number"/>
                                        </div>
                                    </div>		
									-->
                                    
									<!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Previsão início <code2>*</code2></h4>
                                            <input id="mdate" name="datepicker" width="100%" class="form-control" placehoolder = "TOP 2024" />
                                        </div>
                                    </div>  -->

                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Previsão fim <code2>*</code2></h4>
                                            <input id="mdate2" name="datepicker2" width="100%" class="form-control" placehoolder = "TOP 2024" />
                                        </div>
                                    </div>	 -->

                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Técnico TOP <code2>*</code2></h4>
                                            </div>  
                                            <select class="form-select border-dark" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">					
                                                <option value="HARISON">HARISON</option> 								
                                            </select>
                                        </div>
                                    </div>	 -->

                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Solicitante <code2>*</code2></h4>
                                            </div>                                

                                            <select class="form-select border-dark" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">									
                                                <option value="KLABIN">KLABIN</option> 									
                                            </select>
                                        </div>
                                    </div>	 -->

                                    <!-- ABAIXO CAMPOS NOVOS --> 
                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Nome da tarefa </h4>
                                            <input id="SAMF_CLI_TEXTO_BREVE" width="100%" class="form-control" placehoolder = "0001" type="text"/>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Solicitante </h4>
                                            <input id="RDO_RESPONSAVEL_CLI2" width="100%" class="form-control" placehoolder = "0001" type="text"/>
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
                                    </div>
                                

                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Área nível 0<code2>*</code2></h4>
                                            </div>
                                            <select class="form-select border-dark" name="SAMF_CLI_AREANV0" id="SAMF_CLI_AREANV0" aria-label="Default select example">
                                                <?php foreach ($areas as $areasitem): ?>
                                                    <?php if ($areasitem['NIVEL'] == 0): ?>
                                                        <option value="<?php echo $areasitem['ID']; ?>" data-id="<?php echo $areasitem['ID']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Área nível 1<code2>*</code2></h4>
                                            </div>
                                            <select class="form-select border-dark" name="SAMF_CLI_AREANV1" id="SAMF_CLI_AREANV1" aria-label="Default select example">
                                                <option value=""></option>
                                                <?php foreach ($areas as $areasitem): ?>
                                                    <?php if ($areasitem['NIVEL'] == 1): ?>
                                                        <option value="<?php echo $areasitem['ID']; ?>" data-idnivelacima="<?php echo $areasitem['IDNIVELACIMA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                   

									<div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Área nível 2</h4> 
                                            <input id="SAMF_CLI_AREANV2" width="100%" class="form-control" type="text"/>
                                        </div>
                                    </div>

									<div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Tipo Solicitação</h4> 
                                            </div>  
                                            <select class="form-select border-dark" name = "SAMF_CLI_TIPOSC" id = "SAMF_CLI_TIPOSC"  aria-label="Default select example">					
                                                <option value="1">1 - Planejada</option> 		
                                                <option value="2">2 - Emergencial</option> 
                                                <option value="3">3 - Orçamentação</option> 	
                                            </select>
                                        </div>
                                    </div>
									
									
                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Predecessora </h4>
                                            <input id="SAMF_PREDECESSORA" width="100%" class="form-control" placehoolder = "0001" type="number"/>
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <label class="form-label">Prev. Duração Visita</label>
                                            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
                                                <input type="text" class="form-control"  id="SAMF_TEMPO_VISITA" value="00:00"> 
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Status Inicial</h4>
                                            </div>  
                                            <select class="form-select border-dark" name = "STATUS" id = "STATUS"  aria-label="Default select example">					
                                                <option value="A">A - Aberta</option> 		
                                                <option value="B">B - Bloqueada</option> 
                                                <option value="C">C - Cancelada</option> 	
                                                <option value="E">E - Em Espera</option> 					
                                            </select>
                                        </div>
                                    </div>	

									<div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Piso</h4>
                                            <input id="SAMF_VS_PISO" width="100%" class="form-control" type="text" value = "1"/>
                                        </div>
                                    </div>	 -->


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
                                            <button onclick="enviarDados()" type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo" style = "font-size: 1em;">Salvar</button>
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
                </div>
                <!-- FIM MENU PARA INSERIR SOLICITAÇÃO -->
                                              
	

				<!-- ABAS DE 3 VISÕES DIFERENTES -->								
				<div class="tab-content">

					<!-- VISÃO EM EXECUÇÃO  -->
					<div id="navpills2-3" class="tab-pane">
						<div class="col-12">
                        
							<div class="card">
								<div class="card-header">
										<h4 class="card-title">Em execução</h4>
                                        <div class="btn-group mb-1">
                                            <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_pdfEX"><i class="fa fa-file-pdf-o" aria-hidden="true"> PDF</i></button>
                                            <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_excelEX"><i type="button" class="fa fa-file-excel-o"> Excel</i></button>
                                        </div>
									<!-- <div class="dt-buttons"></div> 
										<button id="exportar_excelEX" class="btn btn-success">Exportar para Excel</button> 
                                        <button id="exportar_pdfEX" class="btn btn-primary">Exportar para PDF</button> -->
									</div>
										<div class="card-body">

                                                <div class="row mb-3">
                                                    <div class="col-3">
                                                        <h5>Filtra Área</h5>

                                                        <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
                                                        <select id="filter-gruposelectexecucao" class="default-select form-control wide mb-3 mt-3">
                                                        
                                                            <option value="">Todos</option>
                                                            <?php foreach($areas as $areasitem): ?>
                                                                <?php if ($areasitem['NIVEL'] == 0): ?> 

                                                                    <option value="<?php echo $areasitem['NOME_AREA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>	
                                                            
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>    

                                                        </select>	
                                                        <?php } ?>

                                                        <?php  if ($sessionData['CLIENTE'] === 1) { ?>  
                                                        <select id="filter-gruposelectexecucao" class="default-select form-control wide mb-3 mt-3">
                                                        
                                                            <option value="MONTE ALEGRE">MONTE ALEGRE</option>

                
                                                        </select>	
                                                        <?php } ?>





                                                    </div>
                                                </div> 


											<div class="table-responsive">
												<table id="emexecucao" class="display" style="min-width: 845px; width:100%;">
													<thead>
														<tr>
                                                            <th scope="col">STATUS</th>
                                                            <th scope="col">ÁREA</th>
                                                            <th scope="col">QR CODE</th>
                                                            <th scope="col">METRAGEM</th>                                                            
                                                            <!-- <th scope="col">METRAGEM SIS</th>                                                                                                                    -->
                                                            <!-- <th scope="col">DIFERENÇA</th> -->
															<!-- <th scope="col">OS TOP</th> -->
                                                            <th scope="col">OS TOP</th>
                                                            <!-- <th scope="col">BOLETA</th> -->
                                                            <!-- <th scope="col">BOLETA EMITIDA</th> -->
															<th scope="col">ENCARREGADO</th>
															
															<th scope="col"></th>
														</tr>
													</thead>
													<tbody>	
														<!-- CONTEÚDO DINÂMICO PROVENIENTE DO SCRIPT			 -->
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

							

								

					<!-- VISÃO EM VISITA  -->
					<div id="navpills2-2" class="tab-pane">
						<div class="col-12">
                        
							<div class="card">
								<div class="card-header">
										<h4 class="card-title">Em Visita</h4>
                                        <div class="btn-group mb-1">
                                            <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_pdfVS"><i class="fa fa-file-pdf-o" aria-hidden="true"> PDF</i></button>
                                            <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_excelVS"><i type="button" class="fa fa-file-excel-o"> Excel</i></button>
                                        </div>
									</div>
										<div class="card-body">
											<div class="table-responsive">
                                            
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <h5>Filtra Área</h5>
                                                    <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
                                                        <select id="filter-gruposelectvisita" class="default-select form-control wide mb-3 mt-3">
                                                        
                                                            <option value="">Todos</option>
                                                            <?php foreach($areas as $areasitem): ?>
                                                                <?php if ($areasitem['NIVEL'] == 0): ?> 

                                                                    <option value="<?php echo $areasitem['NOME_AREA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>	
                                                            
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>    

                                                        </select>	
                                                        <?php } ?>

                                                        <?php  if ($sessionData['CLIENTE'] === 1) { ?>  
                                                        <select id="filter-gruposelectvisita" class="default-select form-control wide mb-3 mt-3">
                                                        
                                                            <option value="MONTE ALEGRE">MONTE ALEGRE</option>

                
                                                        </select>	
                                                        <?php } ?>
                                                </div>
                                            </div>  

												<table id="emvisita" class="display" style="min-width: 845px; width:100%;">
													<thead>
														<tr>
                                                            <th scope="col">AREA 0</th>
                                                            <th scope="col">STATUS</th>
															<th scope="col">OS CLI</th>
															<th scope="col">OS TOP</th>
															<th scope="col">TAREFA</th>
															<th scope="col">DESCRIÇÃO</th>
															<th scope="col">TAG</th>
															<th scope="col">ENCARREGADO</th>
															<th scope="col"></th>
														</tr>
													</thead>
													<tbody>	
														<!-- CONTEÚDO DINÂMICO PROVENIENTE DO SCRIPT			 -->
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						



					
			
					
					<!-- VISÃO LISTA -->
					<div id="navpills2-1" class="tab-pane active">
						<div class="col-12">                        
							<div class="card">
								<div class="card-header">
                                        <h4 class="card-title">Solicitações</h4>										
                                        <div class="row">
                                            <div class="btn-group mb-1">
                                                <!-- <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> PDF</i></button> -->
                                                <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Excel</i></button>
                                                <button type="button" class="btn btn-outline-light btn-xs mb-1"  onclick="cancelarSCLote()"><i type="button" class="fa fa-trash"> Cancelar</i></button>
                                                <!-- <button type="button" class="btn btn-outline-light btn-xs mb-1"  onclick="enviarvisita()"><i type="button" class="fa fa-reply"> Visita</i></button> -->
                                            </div>
                                        </div>                                        
									</div>
										<div class="card-body">


                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <h5>Filtra Área</h5>
                                                    <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
                                                        <select id="filter-gruposelect" class="default-select form-control wide mb-3 mt-3">
                                                        
                                                            <option value="">Todos</option>
                                                            <?php foreach($areas as $areasitem): ?>
                                                                <?php if ($areasitem['NIVEL'] == 0): ?> 

                                                                    <option value="<?php echo $areasitem['NOME_AREA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>	
                                                            
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>    

                                                        </select>	
                                                        <?php } ?>

                                                        <?php  if ($sessionData['CLIENTE'] === 1) { ?>  
                                                        <select id="filter-gruposelect" class="default-select form-control wide mb-3 mt-3">
                                                        
                                                            <option value="MONTE ALEGRE">MONTE ALEGRE</option>

                
                                                        </select>	
                                                        <?php } ?>
                                                </div>
                                            </div>  
                                        
											<div class="table-responsive">
												<table id="emsolicitacao" class="display" style="min-width: 845px; width:100%;">
													<thead>
														<tr>
                                                            <th>
                                                                <div class="form-check custom-checkbox ms-2">
                                                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                                    <label class="form-check-label" for="checkAll"></label>
                                                                </div>
                                                            </th>
                                                            <th scope="col">AREA 0</th>
                                                            <th scope="col">AREA 1</th>
															<th scope="col">OS CLI</th>
															<th scope="col">OS TOP</th>
															<th scope="col">TAREFA</th>
															<th scope="col">TAG</th>
															<th scope="col"></th>
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

<!-- TRAZENDO CARREGAMENTO DO MODAL SÓ NO FIM  -->




<!-- Estrutura de modal genérica -->
<div class="modal fade" id="dynamicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Título do Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Conteúdo do modal será inserido aqui -->
            </div>
        </div>
    </div>
</div>





<script>
    
    // Função para converter status
function getStatusText(status) {
    // Converter o status para string para evitar problemas de comparação de tipo
    switch (String(status)) {
        case '1':
            return '1 - Planejada';
        case '2':
            return '2 - Emergencial';
        case '3':
            return '3 - Orçamentação';
        default:
            return '';
    }
}
console.log(item.SAMF_CLI_TIPOSC); // Para verificar o valor de SAMF_CLI_TIPOSC
console.log(getStatusText(item.SAMF_CLI_TIPOSC)); // Para verificar o retorno da função

</script>







<script>

    // Script para abrir e carregar modal
function abrirModaledit(id) {
    // Buscar os dados do item pelo ID (ajuste conforme necessário)
    const data = <?php echo json_encode($data2); ?>;
    const item = data.find(p => p.IDMOV === id);

    if (!item) {
        alert('Item não encontrado');
        return;
    }



    // Defina o título do modal
    document.getElementById('modalTitle').innerText = `Edição solicitação TOP: ${item.IDMOV} OS Cliente: ${item.SAMF_CLI_OS}`;

    // Construa o conteúdo do modal dinamicamente
    const modalBody = `
        <div class="col-12" style="margin-left: 20px; margin-top: 20px; border-top: 1px solid green; padding-top: 10px;">
            <button value="${item.IDMOV}" type="button" class="btn btn-primary btn-rounded me-2 mb-2 btn-xxs" onclick="enviarEdicao(${item.IDMOV})">Salvar</button>
        </div>
        <div class="col-xl-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">OS cliente</h4>
                            <input id="SAMF_CLI_OS${item.IDMOV}" width="100%" class="form-control bg-light" disabled="" placeholder="${item.SAMF_CLI_OS}"/>
                            <input type="hidden" name="idmov" value="${item.IDMOV}">
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Nome da tarefa</h4>
                            <input id="SAMF_CLI_TEXTO_BREVE${item.IDMOV}" width="100%" class="form-control" type="text" value="${item.SAMF_CLI_TEXTO_BREVE}"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Solicitante</h4>
                            <input id="RDO_RESPONSAVEL_CLI2${item.IDMOV}" width="100%" class="form-control" value="${item.RDO_RESPONSAVEL_CLI2}" type="text"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Descrição da ordem</h4>
                            <input id="SAMF_CLI_DESC_OP${item.IDMOV}" width="100%" class="form-control" type="text" value="${item.SAMF_CLI_DESC_OP}"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Observações </h4>
                            <input id="SAMF_OBSERVACAO${item.IDMOV}" width="100%" class="form-control" type="text" value="${item.SAMF_OBSERVACAO}"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">TAG </h4>
                            <input id="SAMF_CLI_TAG${item.IDMOV}" width="100%" class="form-control" type="text" value="${item.SAMF_CLI_TAG}"/>
                        </div>
                    </div>  

                    
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <div class="mb-4">
                                <h4 class="card-title">Área nível 0<code2>*</code2></h4>
                            </div>
                            <select class="form-select border-dark" 
                                    name="SAMF_CLI_AREANV0" 
                                    id="SAMF_CLI_AREANV0${item.IDMOV}"  
                                    aria-label="Default select example"
                                    onchange="updateAreaNv1(this, document.getElementById('SAMF_CLI_AREANV1${item.IDMOV}'));">
                                <option value="${item.ID_AREA_NIVEL0}">${item.SAMF_CLI_AREANV0}</option>
                                <?php foreach ($areas as $areasitem): ?>
                                    <?php if ($areasitem['NIVEL'] == 0): ?>
                                        <option value="<?php echo $areasitem['ID']; ?>" data-id="<?php echo $areasitem['ID']; ?>">
                                            <?php echo $areasitem['NOME_AREA']; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <div class="mb-4">
                                <h4 class="card-title">Área nível 1<code2>*</code2></h4>
                            </div>
                            <select class="form-select border-dark" 
                                    name="SAMF_CLI_AREANV1" 
                                    id="SAMF_CLI_AREANV1${item.IDMOV}"  
                                    aria-label="Default select example">
                                <option value="${item.ID_AREA_NIVEL1}">${item.SAMF_CLI_AREANV1}</option>
                                <?php foreach ($areas as $areasitem): ?>
                                    <?php if ($areasitem['NIVEL'] == 1): ?>
                                        <option value="<?php echo $areasitem['ID']; ?>" 
                                                data-idnivelacima="<?php echo $areasitem['IDNIVELACIMA']; ?>" 
                                                data-id="<?php echo $areasitem['ID']; ?>">
                                            <?php echo $areasitem['NOME_AREA']; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Área nível 2</h4> 
                            <input id="SAMF_CLI_AREANV2${item.IDMOV}" width="100%" class="form-control" type="text" value="${item.SAMF_CLI_AREANV2}"/>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <div class="mb-4">
                                <h4 class="card-title">Tipo Solicitação</h4> 
                            </div>  
                            <select class="form-select border-dark" name = "SAMF_CLI_TIPOSC" id = "SAMF_CLI_TIPOSC${item.IDMOV}"  aria-label="Default select example">	
                            
                                <option value="${item.SAMF_CLI_TIPOSC}">${getStatusText(item.SAMF_CLI_TIPOSC)}</option>                            
                            
                                <option value="1">1 - Planejada</option> 		
                                <option value="2">2 - Emergencial</option> 
                                <option value="3">3 - Orçamentação</option> 	
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <div class="mb-4">
                                <h4 class="card-title">Encarregado <code2>*</code2></h4> 
                            </div>  
                            <select class="form-select border-dark" name = "SAMF_ENCARREGADO" id = "SAMF_ENCARREGADO${item.IDMOV}"  aria-label="Default select example">	
                            
                            <option value="${item.ID_SAMF_ENCARREGADO}">${item.SAMF_ENCARREGADO}</option>
                                
                            <?php 
                                if (!empty($encarregados)): 
                                    foreach($encarregados as $e): 
                                ?>	
                            
                                        <option value="<?php echo $e['ID']; ?>"><?php echo $e['CODUSUARIO']; ?></option>
                                <?php 
                                    endforeach; 
                                endif; 
                                ?>
    
                            </select>
                        </div>
                    </div>

                    


                    <div class="col-xl-6 col-xxl-6 col-md-6">
                        <div class="card-body">
                            <form>
                                <h4 class="card-title">Andaime Aterrado</h4>
                                <div class="mb-3 mb-0">
                                    <label class="radio-inline me-3">
                                        <input type="radio" name="optradio" id="aterradosim" ${item.SAMF_VS_ATERRADO == '1' ? 'checked' : ''}> Sim
                                    </label>
                                    <label class="radio-inline me-3">
                                        <input type="radio" name="optradio" id="aterradonao" ${item.SAMF_VS_ATERRADO == '2' ? 'checked' : ''}> Não
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    

                    <div class="col-xl-6 col-xxl-6 col-md-6">
                        <div class="card-body">                    
                            <form>
                                <h4 class="card-title">Ambiente</h4> 
                                <div class="mb-3 mb-0">
                                    <label class="radio-inline me-3">
                                        <input type="radio" name="optradio" id="ambienteinterno" ${item.SAMF_VS_AMBIENTE == '1' ? 'checked' : ''}> Externo
                                    </label>
                                    <label class="radio-inline me-3">
                                        <input type="radio" name="optradio" id="ambienteexterno" ${item.SAMF_VS_AMBIENTE == '2' ? 'checked' : ''}> Interno
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Insira o conteúdo no corpo do modal
    document.getElementById('modalBody').innerHTML = modalBody;

    // Abra o modal
    new bootstrap.Modal(document.getElementById('dynamicModal')).show();
}


</script>





<!-- PEGANDO OS VALUES DO CHECKBOX MARCADOS PARA SEREM CANCELADOS  -->
<script>
    function cancelarSCLote() {
        
        const checkboxes = document.querySelectorAll('input[type="checkbox"]#check');
        
        
        const checkedValues = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

            
        const data = {
            checkedValues: checkedValues
        };

        
        const jsonData = JSON.stringify(data);

        
        console.log('Enviando JSON:', jsonData);
        // return;
        
        fetch('<?php echo base_url('cancelarSCLote'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: jsonData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registros cancelados com sucesso!", "TOP Andaimes", {
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

				btncancelar.disabled = true;
				btncancelar.innerHTML = "Visita Cancelada!";


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

				btncancelar.disabled = false;
				btncancelar.innerHTML = "Sim, cancelar!";
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
				btncancelar.disabled = false;
				btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>






<!-- CANCELAR VISITA   -->
<script>
    function cancelarSC(IDMOV) {
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

                setTimeout(datatableSC, 0);                
                setTimeout(datatableVS, 0);

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

				btncancelar.disabled = false;
				btncancelar.innerHTML = "Sim, cancelar!";
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
				btncancelar.disabled = false;
				btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>







<!-- ADICIONAR SOLICITAÇÃO -->
<script>
    function limparCampos() {
        document.getElementById('SAMF_CLI_OS').value = '';
        document.getElementById('SAMF_OBSERVACAO').value = '';
        document.getElementById('SAMF_CLI_TEXTO_BREVE').value = '';
        document.getElementById('SAMF_CLI_DESC_OP').value = '';
        document.getElementById('SAMF_CLI_TAG').value = '';
		document.getElementById('SAMF_CLI_AREANV1').value = '';
		document.getElementById('SAMF_CLI_AREANV2').value = '';
		document.getElementById('SAMF_CLI_TIPOSC').value = '1';
    }

    function enviarDados() {
        // var codccusto = '02.0181.00'; 
		var SAMF_CLI_OS = document.getElementById('SAMF_CLI_OS').value;  
		var SAMF_OBSERVACAO = document.getElementById('SAMF_OBSERVACAO').value; 
		var SAMF_CLI_TEXTO_BREVE = document.getElementById('SAMF_CLI_TEXTO_BREVE').value; 
		var SAMF_CLI_DESC_OP = document.getElementById('SAMF_CLI_DESC_OP').value; 
		var SAMF_CLI_AREANV0 = document.getElementById('SAMF_CLI_AREANV0').value; 
		var SAMF_CLI_AREANV1 = document.getElementById('SAMF_CLI_AREANV1').value; 
		var SAMF_CLI_AREANV2 = document.getElementById('SAMF_CLI_AREANV2').value; 
		var SAMF_CLI_TAG = document.getElementById('SAMF_CLI_TAG').value; 
		var SAMF_CLI_PARADA = '1';
		var SAMF_CLI_TIPOSC = document.getElementById('SAMF_CLI_TIPOSC').value; 
        var RDO_RESPONSAVEL_CLI2 = document.getElementById('RDO_RESPONSAVEL_CLI2').value;  
		 
		
        if (!SAMF_CLI_OS || !SAMF_CLI_AREANV1 || !SAMF_CLI_TIPOSC) {
            toastr.warning("Preencha os campos obrigatórios", "Campos Pendentes", {
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
			"SAMF_CLI_OS": SAMF_CLI_OS,
			"SAMF_OBSERVACAO": SAMF_OBSERVACAO,
			"SAMF_CLI_TEXTO_BREVE": SAMF_CLI_TEXTO_BREVE,
			"SAMF_CLI_DESC_OP": SAMF_CLI_DESC_OP,
			"SAMF_CLI_TAG": SAMF_CLI_TAG,
			"SAMF_CLI_PARADA": SAMF_CLI_PARADA,
            "SAMF_CLI_AREANV0": SAMF_CLI_AREANV0,
			"SAMF_CLI_AREANV1": SAMF_CLI_AREANV1,
			"SAMF_CLI_AREANV2": SAMF_CLI_AREANV2,
			"SAMF_CLI_TIPOSC": SAMF_CLI_TIPOSC,
            "RDO_RESPONSAVEL_CLI2": RDO_RESPONSAVEL_CLI2
        };

        console.log(dados);

		// return;

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
                limparCampos();
				setTimeout(datatableSC, 0);

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

    document.getElementById('incluirrdo').addEventListener('click', enviarDados);

</script>



<!-- ENVIAR SOLICITAÇÃO PARA VISITA -->

<script>
    function enviarvisita(idmovorigem) {

		// var botaoEnviar = document.getElementById('enviarvisita'.concat(idmovorigem))		
		// botaoEnviar.disabled = true;
		// botaoEnviar.innerHTML = "<i class='fa fa-check'></i> Visita Enviada";

        // var codccusto = '02.0181.00'; 
		// var SAMF_ENCARREGADO = document.getElementById('encarregado').value;

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
                setTimeout(datatableVS, 0);
                setTimeout(datatableEX, 0);
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




<script>
    function enviarEdicao(IDMOV) {
        
        var SAMF_CLI_TEXTO_BREVE  = document.getElementById('SAMF_CLI_TEXTO_BREVE'.concat(IDMOV)).value;
        var SAMF_CLI_DESC_OP  = document.getElementById('SAMF_CLI_DESC_OP'.concat(IDMOV)).value;
        var SAMF_OBSERVACAO  = document.getElementById('SAMF_OBSERVACAO'.concat(IDMOV)).value;
        var SAMF_CLI_TAG  = document.getElementById('SAMF_CLI_TAG'.concat(IDMOV)).value;
        var SAMF_CLI_AREANV1  = document.getElementById('SAMF_CLI_AREANV1'.concat(IDMOV)).value;
        var SAMF_CLI_AREANV2  = document.getElementById('SAMF_CLI_AREANV2'.concat(IDMOV)).value;
        var SAMF_CLI_AREANV0  = document.getElementById('SAMF_CLI_AREANV0'.concat(IDMOV)).value;
        var SAMF_CLI_TIPOSC  = document.getElementById('SAMF_CLI_TIPOSC'.concat(IDMOV)).value;
        var RDO_RESPONSAVEL_CLI2  = document.getElementById('RDO_RESPONSAVEL_CLI2'.concat(IDMOV)).value;
        var SAMF_ENCARREGADO  = document.getElementById('SAMF_ENCARREGADO'.concat(IDMOV)).value;   
        
        var ambienteinternoCheckbox = document.getElementById('ambienteinterno');
		var ambienteinterno = ambienteinternoCheckbox ? (ambienteinternoCheckbox.checked ? 1 : 0) : 0;

        var ambienteexternoCheckbox = document.getElementById('ambienteexterno');
		var ambienteexterno = ambienteexternoCheckbox ? (ambienteexternoCheckbox.checked ? 1 : 0) : 0;

        // VALIDANDO SE TIPO DE SOLICITACAO ESTÁ PREENCHIDO 
        if (!SAMF_CLI_TIPOSC || SAMF_CLI_TIPOSC.trim() === "" || SAMF_CLI_TIPOSC.trim() === "null" ) {
            toastr.warning( "Preencha!","TIPO SOLICITAÇÃO", {
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

        // VALIDANDO AMBIENTE
        if (ambienteinterno == 1) {
			SAMF_VS_AMBIENTE = 1;
		} else if (ambienteexterno == 1) {
			SAMF_VS_AMBIENTE = 2;
		} else {
			SAMF_VS_AMBIENTE =0;
		}

        var aterradosimCheckbox = document.getElementById('aterradosim');
		var aterradosim = aterradosimCheckbox ? (aterradosimCheckbox.checked ? 1 : 0) : 0;

        var aterradonaoCheckbox = document.getElementById('aterradonao');
		var aterradonao = aterradonaoCheckbox ? (aterradonaoCheckbox.checked ? 1 : 0) : 0;

        // VALIDANDO ATERRAMENTO
        if (aterradosim == 1) {
			SAMF_VS_ATERRADO = 1;
		} else if (aterradonao == 1) {
			SAMF_VS_ATERRADO = 2;
		} else {
			SAMF_VS_ATERRADO = 0;
		}

        var dados = {
            "SAMF_CLI_TEXTO_BREVE" : SAMF_CLI_TEXTO_BREVE,
            "SAMF_CLI_DESC_OP" : SAMF_CLI_DESC_OP,
            "SAMF_OBSERVACAO" : SAMF_OBSERVACAO,
            "SAMF_CLI_TAG" : SAMF_CLI_TAG,
            "SAMF_CLI_AREANV1" : SAMF_CLI_AREANV1,
            "SAMF_CLI_AREANV2" : SAMF_CLI_AREANV2,
            "SAMF_CLI_TIPOSC" : SAMF_CLI_TIPOSC,
            "RDO_RESPONSAVEL_CLI2": RDO_RESPONSAVEL_CLI2,
            "SAMF_CLI_AREANV0": SAMF_CLI_AREANV0,
            "SAMF_ENCARREGADO": SAMF_ENCARREGADO,
            "IDMOV": IDMOV,
            "SAMF_VS_AMBIENTE": SAMF_VS_AMBIENTE,
            "SAMF_VS_ATERRADO": SAMF_VS_ATERRADO
        };

        console.log(dados);
        // return;

        fetch('<?php echo base_url('enviarEdicao'); ?>', {
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
                toastr.success("Registro atualizado com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
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
				setTimeout(datatableSC, 0);
            } else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
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
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            toastr.error("Erro ao executar comando", "Tente novamente", {
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
        });
    }
</script>



<script>
    function datatableEX() {
        // Verifica se a DataTable já está inicializada e, se sim, a limpa e destrói.
        if ($.fn.DataTable.isDataTable('#emexecucao')) {
            $('#emexecucao').DataTable().clear().destroy();
        }

        // Inicializa a DataTable
        var table = $('#emexecucao').DataTable({
            "pageLength": 10,
            ajax: '<?php echo base_url('execucoesDatatables') ?>', 
            columns: [
                {
                    data: "STATUS",
                    render: function(data, type, row) {
                        // Aplica a regra de transformação dos valores de STATUS_PLANEJAMENTO
                        switch (data) {
                            case 'A':
                                return 'Iniciar';
                            case 'G':
                                return 'Em montagem';
                            case 'F':
                                return 'Montado';
                            case 'C':
                                return 'CANCELADO';
                            default:
                                return 'Desconhecido';
                        }
                    }
                },
                { data: "SAMF_CLI_AREANV1_NOME" },
                { data: "SAMF_CLI_QRCODE" },
                { data: "METRAGEM_LINEAR_TOTAL" },
                // { data: "LINEAR_SIS_ANTIGO" },
                // { data: "DIFERENCA_LINEAR" },
                { data: "IDMOVSOLICITACAO" },
                // {
                //         data: null,
                //         render: function(data, type, row) {
                //             // Verifica se SAMF_MTG_BOLETAEMIT é 1 para marcar o checkbox
                //             var checkbox = (row.SAMF_MTG_BOLETAEMIT == 1) ? 'checked' : '';

                //             return '<div class="d-flex">' +
                //                 '<input type="checkbox" ' + checkbox + ' id="check'+ row.IDMOVPLANEJAMENTO + '" class="form-check-input ms-2" onchange="updateCheckbox(' + row.IDMOVPLANEJAMENTO + ')"/>' +
                //                 '</div>';
                //         }
                //     },

                { data: "ENCARREGADO" },
                
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<div class="d-flex">' +
                            '<a href="atendimentoPL/' + row.IDMOVANDAIME + '"  class="btn btn-warning shadow btn-xs sharp me-1">' +
                            '<i class="fas fa-pencil-alt" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#ed' + row.IDMOVANDAIME + '" data-id="ed' + row.IDMOVANDAIME + '"></i></a>';
                    }
                }
            ],
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Exportar para Excel',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });

        $('#filter-gruposelectexecucao').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                table.column(1).search('^' + selectedValue + '$', true, false).draw();
            } else {
                table.column(1).search('').draw();
            }
        });

        
        


        // Ação para o botão de remoção (lixeira)
        $('#emexecucao').on('click', '.fa-trash', function() {
            var IDMOVORIGEM = $(this).data('id');
            $('#exampleModalCenter').data('IDMOVORIGEM', IDMOVORIGEM).modal('show');
        });

        // Coloca os botões na página
        // table.buttons().container().appendTo($('.dt-buttons'));

        // Vincula o botão manual à ação de exportação
        $('#exportar_excel').on('click', function() {
            table.buttons('.buttons-excel').trigger('click'); // Dispara o clique no botão de exportar para Excel
        });
    }

        // $('#botaotableexecu').on('click', function() {
        //     // $(document).ready(function() {
        //         datatableEX();
        // });

        // Inicializa o DataTable quando o documento estiver pronto
        // $(document).ready(function() {
        //     datatableEX();
        // });

        // var initialValue = 'MONTE ALEGRE'; // Substitua pelo valor desejado
        // $('#filter-gruposelectexecucao').val(initialValue);

        // // Aplica o filtro automaticamente no carregamento da página
        // $('#filter-gruposelectexecucao').trigger('change');

        // // Evento de mudança para aplicar o filtro quando o usuário selecionar outro valor
        // $('#filter-gruposelectexecucao').on('change', function() {
        //     var selectedValue = $(this).val();
        //     if (selectedValue) {
        //         table.column(1).search('^' + selectedValue + '$', true, false).draw();
        //     } else {
        //         table.column(1).search('').draw();
        //     }
        // });

        // // Inicializa o DataTable
        // var table = datatableEX();

        // // Executa o filtro após o carregamento completo do DataTable
        // table.on('init', function() {
        //     // Define o valor inicial do select
        //     var initialValue = 'MONTE ALEGRE'; // Substitua pelo valor desejado
        //     $('#filter-gruposelectexecucao').val(initialValue);

        //     // Aplica o filtro automaticamente após o DataTable ser carregado
        //     $('#filter-gruposelectexecucao').trigger('change');
        // });

        // // Evento de mudança para aplicar o filtro quando o usuário selecionar outro valor
        // $('#filter-gruposelectexecucao').on('change', function() {
        //     var selectedValue = $(this).val();
        //     if (selectedValue) {
        //         table.column(1).search('^' + selectedValue + '$', true, false).draw();
        //     } else {
        //         table.column(1).search('').draw();
        //     }
        // });

        $(document).ready(function() {
            datatableEX();
    });


</script>


<script>
    function datatableVS() {
        // Verifica se o DataTable já foi inicializado antes de tentar inicializá-lo novamente
        if ( $.fn.DataTable.isDataTable('#emvisita') ) {
            $('#emvisita').DataTable().clear().destroy();
        }

        var table = $('#emvisita').DataTable({
            "pageLength": 100,
            ajax: '<?php echo base_url('visitasDatatables') ?>', // URL para o script PHP que retorna os dados JSON
            columns: [
                { data: "SAMF_CLI_AREANV0" },
                {
                    data: "STATUS_VISITA",
                    render: function(data, type, row) {
                        // Aplica a regra de transformação dos valores de STATUS_PLANEJAMENTO
                        switch (data) {
                            case 'A':
                                return 'Em Aberto';
                            case 'B':
                                return 'Em Atendimento';
                            case 'F':
                                return 'Concluída';
                            case 'C':
                                return 'Cancelada';
                            default:
                                return 'Desconhecido';
                        }
                    }
                },

                { data: "SAMF_CLI_OS" },
                { data: "IDMOV" },
                { data: "SAMF_CLI_TEXTO_BREVE" },
                { data: "SAMF_CLI_DESC_OP" },
                { data: "SAMF_CLI_TAG" },
                { data: "NOME_ENCARREGADO" },
                {
                    // Coluna de ações
                    data: null,
                    render: function (data, type, row) {
                        return '<div class="d-flex">' +
                            '<a href="atendimentoVS/' + row.IDMOV + '" class="btn btn-warning shadow btn-xs sharp me-1">' +
                            '<i class="fas fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#ed' + row.IDMOV + '" data-id="ed' + row.IDMOV + '"></i></a>' +
                            '<a href="#" class="btn btn-danger shadow btn-xs sharp">' +
                            '<i class="fa fa-trash"  onclick="abrirModal(' + row.IDMOVVISITA + ')"></i></a>';
                            // '<a class="btn btn-success shadow btn-xs sharp">' +
                            // '<i class="fa fa-reply" data-bs-toggle="modal"  onclick="enviarvisita(' + row.IDMOV + ')"></i></a></div>';                                           ;
                            // '<a class="btn btn-danger shadow btn-xs sharp">'; +
                            // '<i class="fa fa-trash" data-bs-toggle="modal" data-bs-target="#vs' + row.IDMOV + '" data-id="vs' + row.IDMOV + '"></i></a>';
                    }
                }
            ]
            // ,
            // dom: 'Bfrtip', // Necessário para botões
            // buttons: [
            //     {
            //         extend: 'excelHtml5',
            //         text: 'Exportar para Excel',
            //         className: 'btn btn-success',
            //         exportOptions: {
            //             columns: ':visible'
            //         }
            //     }
            // ]
        });
        $('#filter-gruposelectvisita').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                table.column(0).search('^' + selectedValue + '$', true, false).draw();
            } else {
                table.column(0).search('').draw();
            }
        });

        // var initialValue = 'MONTE ALEGRE'; // Substitua pelo valor desejado
        // $('#filter-gruposelectvisita').val(initialValue);

        // // Aplica o filtro automaticamente no carregamento da página
        // $('#filter-gruposelectvisita').trigger('change');

        // // Evento de mudança para aplicar o filtro quando o usuário selecionar outro valor
        // $('#filter-gruposelectvisita').on('change', function() {
        //     var selectedValue = $(this).val();
        //     if (selectedValue) {
        //         table.column(0).search('^' + selectedValue + '$', true, false).draw();
        //     } else {
        //         table.column(0).search('').draw();
        //     }
        // });

//             <a href="atendimentoVS/IDMOVAQUI"><button style="margin-left: 10px;" type="button" class="btn btn-light  me-2 mb-2 btn-xxs" id="accord-2One">
// <i class="fa fa-laptop" aria-hidden="true"></i>
// </button>
// </a>

        $('#emvisita').on('click', '.fa-trash', function() {
            var idmov = $(this).data('id');
            $('#exampleModalCenter').data('idmov', idmov).modal('show');
        });

        // Coloca os botões na página
        // table.buttons().container().appendTo($('.dt-buttons'));

        // Vincula o botão manual à ação de exportação
        $('#exportar_excel').on('click', function() {
            table.button('.buttons-excel').trigger('click'); // Dispara o clique no botão de exportar para Excel
        });
    }

    // $('#botaotablevisitas').on('click', function() {
    //     // $(document).ready(function() {
    //     datatableVS();
    // });

    // Inicializa o DataTable quando o documento estiver pronto
    $(document).ready(function() {
        datatableVS();
    });
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
                            exportTableToExcel('emsolicitacao', 'solicitacoes.xlsx');
                        });

                        // Vincula o botão à função de exportação para Excel
                        $('#exportar_excelVS').on('click', function() {
                            exportTableToExcel('emvisita', 'Visitas.xlsx');
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
                            exportTableToPDF('emsolicitacao', 'solicitacoes.pdf');
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
                    function datatableSC() {
                        if ( $.fn.DataTable.isDataTable('#emsolicitacao') ) {
                            $('#emsolicitacao').DataTable().clear().destroy();
                        }

                        var table = $('#emsolicitacao').DataTable({
                            "pageLength": 10,
                            ajax: '<?php echo base_url('solicitacoesDatatables') ?>', 
                            columns: [
                                {
                                    
                                    data: null,
                                    render: function (data, type, row) {
                                        return '<div class="form-check custom-checkbox ms-2">' +
                                            '<input type="checkbox" class="form-check-input" id="check" required="" value="' + row.IDMOV + '"> </div>';                                           ;
                                    }
                                },
                                { data: "SAMF_CLI_AREANV0" },
                                { data: "SAMF_CLI_AREANV1" },
                                { data: "SAMF_CLI_OS" },
                                { data: "IDMOV" },
                                { data: "SAMF_CLI_TEXTO_BREVE" },
                                { data: "SAMF_CLI_TAG" },
                                // {
                                    
                                //     data: null,
                                //     render: function (data, type, row) {
                                //         return '<div class="d-flex">' +
                                //             '<a class="btn btn-warning shadow btn-xs sharp me-1">' +
                                //             '<i class="fas fa-pencil-alt" onclick="abrirModal(' + row.IDMOV + ')"></i></a>' +
                                //             '<a href="#" class="btn btn-danger shadow btn-xs sharp">' +
                                //             '<i class="fa fa-trash" data-bs-toggle="modal" data-bs-target="#m' + row.IDMOV + '" data-id="m' + row.IDMOV + '"></i></a>' +
                                //             '<a class="btn btn-success shadow btn-xs sharp">' +
                                //             '<i class="fa fa-reply" data-bs-toggle="modal"  onclick="enviarvisita(' + row.IDMOV + ')"></i></a></div>';                                           ;
                                //     }
                                // }
                                {
                                    
                                    data: null,
                                    render: function (data, type, row) {
                                        return '<div class="d-flex">' +
                                            '<a class="btn btn-warning shadow btn-xs sharp me-1">' +
                                            '<i class="fas fa-pencil-alt" data-id="' + row.IDMOV + '" onclick="abrirModaledit(' + row.IDMOV + ')"></i></a>' +
                                            '<a href="#" class="btn btn-danger shadow btn-xs sharp">' +
                                            '<i class="fa fa-trash" onclick="abrirModal(' + row.IDMOV + ')"></i></a>' +
                                            // Verifica se SAMF_CLI_TAG é diferente de null ou vazio
                                            (row.SAMF_ENCARREGADO !== null && row.SAMF_ENCARREGADO !== '' ?
                                                '<a class="btn btn-success shadow btn-xs sharp">' +
                                                '<i class="fa fa-reply" data-bs-toggle="modal" onclick="enviarvisita(' + row.IDMOV + ')"></i></a>' : 
                                                '') +
                                            '</div>';
                                    }

                                }
                                
                            ]
                        });

                        $('#filter-gruposelect').on('change', function() {
                            var selectedValue = $(this).val();
                            if (selectedValue) {
                                table.column(1).search('^' + selectedValue + '$', true, false).draw();
                            } else {
                                table.column(1).search('').draw();
                            }
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
                        $('#exportar_excelSC_OLD').on('click', function() {
                            table.button('.btn btn-success').trigger('click'); // Dispara o clique no botão de exportar para Excel
                        });
                    }

                    // Inicializa o DataTable quando o documento estiver pronto
                    $(document).ready(function() {
                        datatableSC();
                    });
                    </script>



<!-- PREDECESSÃO DE ÁREAS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleciona os elementos dos selects
        const areaNv0 = document.querySelector('#SAMF_CLI_AREANV0');
        const areaNv1 = document.querySelector('#SAMF_CLI_AREANV1');

        // Armazena as opções originais do nível 1 para restaurar quando necessário
        const areaNv1Options = Array.from(areaNv1.options);

        // Função para atualizar as opções de área nível 1
        function updateAreaNv1() {
            const selectedId = areaNv0.options[areaNv0.selectedIndex]?.getAttribute('data-id');

            // Remove todas as opções atuais do nível 1, exceto a primeira (vazia)
            areaNv1.innerHTML = '<option value=""></option>';

            // Se um item for selecionado em Nível 0, filtra e adiciona as opções correspondentes de Nível 1
            if (selectedId) {
                areaNv1Options.forEach(option => {
                    if (option.getAttribute('data-idnivelacima') === selectedId) {
                        areaNv1.appendChild(option);
                    }
                });
            }
        }
        // Executa a função de atualização ao carregar a página
        updateAreaNv1();

        // Adiciona um listener de mudança ao select do nível 0
        areaNv0.addEventListener('change', updateAreaNv1);

        // Observa mudanças no DOM para reexecutar a função caso novas opções sejam carregadas dinamicamente em Nível 0
        const observer = new MutationObserver(() => {
            updateAreaNv1();
        });

        // Configura o observador para monitorar mudanças nos filhos do select Nível 0
        observer.observe(areaNv0, { childList: true });
    });
</script>



<script>
    // Função que armazena as opções originais de todos os selects nível 1
    const originalOptionsMap = new Map();

    function storeOriginalOptions(areaNv1) {
        const id = areaNv1.id;
        if (!originalOptionsMap.has(id)) {
            // Armazena as opções originais apenas uma vez
            originalOptionsMap.set(id, Array.from(areaNv1.options));
        }
    }

    function updateAreaNv1(areaNv0, areaNv1) {
        // Garante que as opções originais estejam armazenadas
        storeOriginalOptions(areaNv1);

        // Recupera as opções originais sempre que a função é chamada
        const areaNv1Options = originalOptionsMap.get(areaNv1.id);
        const selectedId = areaNv0.options[areaNv0.selectedIndex]?.getAttribute('data-id');

        // Remove todas as opções atuais do nível 1, exceto a primeira (vazia)
        areaNv1.innerHTML = '<option value=""></option>';

        // Se um item for selecionado em Nível 0, filtra e adiciona as opções correspondentes de Nível 1
        if (selectedId) {
            areaNv1Options.forEach(option => {
                if (option.getAttribute('data-idnivelacima') === selectedId) {
                    areaNv1.appendChild(option);
                }
            });
        }
    }
</script>



<!-- SCRIPT PARA CRIAR O MODAL QUE ESTÁ DINAMICO PARA CANCELAR SOLICITAÇÃO -->
<script>
        function abrirModal(IDMOV) {
        // Atualiza o corpo do modal com o IDMOV
        document.getElementById('modalDinamicoCorpo').innerHTML = `
            <p>Tem certeza que deseja cancelar a solicitação TOP número: ${IDMOV}?</p>
        `;

        // Define o onclick do botão de confirmação para chamar a função cancelarSC com o IDMOV correto
        const confirmarBtn = document.getElementById('modalDinamicoConfirmar');
        confirmarBtn.setAttribute('onclick', `cancelarSC(${IDMOV})`);

        // Exibe o modal
        var myModal = new bootstrap.Modal(document.getElementById('modalDinamico'), {});
        myModal.show();
    }

</script>





<!-- ATUALIZAR EMISSÃO BOLETA  -->
<script>
    function updateCheckbox(IDMOV) {
        
        var atualizarboleta = document.getElementById('check'.concat(IDMOV));
		var atualizarboletafinal = atualizarboleta ? (atualizarboleta.checked ? 1 : 0) : 0;

        var dados = {
            IDMOV: IDMOV,             
            SAMF_MTG_BOLETAEMIT: atualizarboletafinal 
        };

        
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateBoletaEmit'); ?>', {
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
                toastr.success("Registro alterado com sucesso", "TOP Andaimes", {
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


<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>