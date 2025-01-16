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

     <!-- MODAL PARA CADSTRO INICIAL DE ANDAIME  -->
     <div class="modal fade" id="modalandaime" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDinamicoTitulo">Cadastro Andaime</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalDinamicoCorpo">
                    
                



                <div class="row">   
                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">OS cliente<code2>*</code2></h4>
                            <input id="SAMF_CLI_OS" width="100%" class="form-control"/>
                        </div>
                    </div>	

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
                            <h4 class="card-title">Gerência </h4>
                            <input id="SAMF_CLI_GERENCIA" width="100%" class="form-control" placehoolder = "0001" type="text"/>
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
                            <select onchange="carganivel1()" class="form-select border-dark" name="SAMF_CLI_AREANV1" id="SAMF_CLI_AREANV1" aria-label="Default select example">
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
                            <div class="mb-4">
                                <h4 class="card-title">Área nível 2</h4>
                            </div>
                            <select class="form-select border-dark" name="SAMF_CLI_AREANV2" id="SAMF_CLI_AREANV2" aria-label="Default select example">
                                <option value=""></option>
                                <?php foreach ($areas as $areasitem): ?>
                                    <?php if ($areasitem['NIVEL'] == 2): ?>
                                        <option value="<?php echo $areasitem['ID']; ?>" data-idnivelacima="<?php echo $areasitem['IDNIVELACIMA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <div class="mb-4">
                                <h4 class="card-title">Área nível 3</h4>
                            </div>
                            <select class="form-select border-dark" name="SAMF_CLI_AREANV3" id="SAMF_CLI_AREANV3" aria-label="Default select example">
                                <option value=""></option>
                                <?php foreach ($areas as $areasitem): ?>
                                    <?php if ($areasitem['NIVEL'] == 3): ?>
                                        <option value="<?php echo $areasitem['ID']; ?>" data-idnivelacima="<?php echo $areasitem['IDNIVELACIMA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-md-6">
                        <div class="card-body">
                            <h4 class="">Tipo Contrato </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    <div class="mb-3 mb-0">
                                        <label class="radio-inline me-3"><input type="radio" name="optradio" id="SAMF_RDO_TPCONT1"> Manutenção </label>
                                        <label class="radio-inline me-3"><input type="radio" name="optradio" id="SAMF_RDO_TPCONT2"> Sustaining </label>
                                    </div>
                                </form>
                            </div>
                        </div>												
                    </div>

		
                </div>                

                </div>
                <div class="modal-footer">
                    <button onclick="enviarDados()" type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo" style = "font-size: 1em;">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    
	<!-- row -->
	<div class="container-fluid">
		<!-- <div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a>Gestão de Andaimes</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Solicitação</a>
				</li>
			</ol>
		</div> -->

		<div class="row">
			                
				<div class="container-fluid" id="pagesolicitacao">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
							<div class="btn-group mb-1">
								<!-- <button type="button" class="btn btn-primary light btn-xs mb-1"   aria-expanded="true"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button> -->
                                <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
								    <button type="button" class="btn btn-primary light mb-1" aria-expanded="true"  role="button"  data-bs-toggle="modal" data-bs-target="#modalandaime" data-id="modalandaime"><i class="fa fa-plus"></i> Novo Andaime</button>
								<?php } ?>
                                <button type="button" class="btn btn-primary light mb-1"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel" id="exportar_excelEX"><i type="button" class="fa fa-file-excel-o"></i></button>
                                <button type="button" class="btn btn-primary light mb-1"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel" id="exportar_pdfEX"><i type="button" class="fa fa-file-pdf-o"></i></button>
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
									<!-- <button href="#navpills2-1" type="button" class="btn btn-primary light btn-xs mb-1" href="javascript:void()" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-1">Em Solicitação</button>
									<button href="#navpills2-2" type="button" class="btn btn-primary light btn-xs mb-1" href="javascript:void()" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-2" id="botaotablevisitas">Em Visita</button>
									<button href="#navpills2-3" type="button" class="btn btn-primary light btn-xs mb-1" href="javascript:void()" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3" id="botaotableexecu">Em Execução</button> -->
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

                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">OS cliente</h4>
                                            <input id="SAMF_CLI_OS" width="100%" class="form-control" value = " " />
                                        </div>
                                    </div>	
                                    
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
                                              
	

<!-- 
                <div class="col-12">
                    <div class="card" style="    height: 230px;         width: 100%;    margin-top: -30px !important;">
                        <div class="card-body" style="max-height: 210px;"> -->

                            <!-- CARD COM METRAGEM -->
                            <!-- <div class="profile-about-me" style="margin-top: -44px;">
                                <div class="pt-4 border-bottom-1 pb-3 row"> -->
                                    <!-- <h4 class="card-title"><code3>Medidas </code3></h4> -->
                                    <!-- <p class="mb-2"> -->

                                        <!-- INDICADOR METRAGEM TOTAL DO ANDAIME  -->
                                        <!-- <div class="col-4">
                                            <div class="widget-stat card bg-success">
                                                <div class="card-body p-4">
                                                    <div class="media">
                                                        <span class="me-3">
                                                            <i class="fa fa-area-chart"></i>
                                                        </span>
                                                        <div class="media-body text-white">
                                                            <p class="mb-1">Metragem Linear</p>
                                                            <h3 class="text-white"><?php echo $TotalizadorAndaimes->METRAGEM_LINEAR_TOTAL ?? 0; ?></h3>
                                                            <div class="progress mb-2 bg-primary">
                                                                <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                                            </div>
                                                            <small>** Representa % do total</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="profile-name px-3 pt-2">
                                                <h4 class="text-primary mb-0">Status Atual</h4>
                                                <p><?php echo $data9->SAMF_CLI_QRCODE ?? '*'; ?></p>
                                                <h4 class="text-primary mb-0">Data Montagem</h4>
                                                <p><?php echo $data9->IDMOV ?? '*'; ?></p>
                                                <h4 class="text-primary mb-0">Data Desmontagem</h4>
                                                <p><?php echo $data9->IDMOV ?? '*'; ?></p>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="profile-name px-3 pt-2">
                                                <h4 class="text-primary mb-0">Encarregado TOP</h4>
                                                <p><?php echo $data9->IDMOV ?? '*'; ?></p>
                                                <h4 class="text-primary mb-0">Número OS TOP</h4>
                                                <p><?php echo $data9->IDMOV ?? '*'; ?></p>
                                                <h4 class="text-primary mb-0">Diferença Metragem</h4>
                                                <p><?php echo $data9->IDMOV ?? '*'; ?></p>
                                            </div>
                                        </div> -->



                                    <!-- </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                

				<!-- ABAS DE 3 VISÕES DIFERENTES -->								
				<div class="tab-content" style="margin-top: -80px;">

					<!-- VISÃO EM EXECUÇÃO  -->
					<div id="navpills2-3" class="tab-pane active">
						<div class="col-12">
                        
							<div class="card">
								<div class="card-header">
                                                


                                        <!-- <div class="btn-group mb-1">
                                            <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_pdfEX"><i class="fa fa-file-pdf-o" aria-hidden="true"> PDF</i></button>
                                            <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_excelEX"><i type="button" class="fa fa-file-excel-o"> Excel</i></button>
                                        </div> -->
									<!-- <div class="dt-buttons"></div> 
										<button id="exportar_excelEX" class="btn btn-success">Exportar para Excel</button> 
                                        <button id="exportar_pdfEX" class="btn btn-primary">Exportar para PDF</button> -->
									</div>
										<div class="card-body">

                                                

                                        <div class="row mb-3">
                                            <div class="col-2 mt-3">
                                                <h5>Área</h5>

                                                <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
                                                <select id="filter-gruposelectexecucao" class="default-select form-control wide mb-3 mt-3">
                                                
                                                    <!-- <option value="">TODOS</option> -->
                                                    <?php foreach($areas as $areasitem): ?>

                                                        <?php if ($areasitem['NIVEL'] == 1): ?> 

                                                            <option value="<?php echo $areasitem['NOME_AREA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>	
                                                    
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>    

                                                </select>	

                                                <?php } ?>

                                               


                                            </div>


                                            <div class="col-2 mt-3">                                                
                                                <h5>Status</h5>                                                 
                                                <select id="filter-status" class="default-select form-control wide mb-3 mt-3">
                                                    <option value="F">MONTADO</option>
                                                    <option value="B">DESMONTADO</option>
                                                    <option value="A">INICIAR</option>
                                                    <option value="G">EM MONTAGEM</option>
                                                    <option value="C">CANCELADO</option>
                                                </select>	
                                            </div>

                                            <!-- <div class="col-5">
                                                <h5>Data Montagem</h5>                                                 
                                                <input class="form-control input-limit-datepicker mt-4" type="text" name="daterange" value="06/01/2015 - 06/07/2015">
                                            </div> -->

                                            <div class="col-6 row">
                                                <h5><small>Data montagem entre:</small></h5>
                                                <div class="col-6">
                                                    <h5 for="startDate"><small>Início:</small></h5>
                                                    <input type="date" id="startDate" class="form-control wide mb-3 ">
                                                </div>
                                                <div class="col-6">
                                                    <h5 for="endDate"><small>Fim:</small></h5>
                                                    <input type="date" id="endDate" class="form-control wide mb-3 ">
                                                </div>
                                            
                                            </div>

                                            <div class="col-2 mt-3">                                                
                                                <h5>Contrato</h5>                                                 
                                                <select id="filter-contrato" class="default-select form-control wide mb-3 mt-3">
                                                    <option value="">TODOS</option>
                                                    <option value="SUSTAINING">SUSTAINING</option>
                                                    <option value="MANUTENCAO">MANUTENCAO</option>
                                                </select>	
                                            </div>






                                        </div> 


											<div class="table-responsive">
												<table id="emexecucao" class="display" style="min-width: 845px; width:100%;">
													<thead>
														<tr>
                                                            <th></th>                     
															<th scope="col">STATUS</th>   
                                                            <th scope="col">FATURADO</th>                                                 
															<th scope="col">OS TOP</th>
															<th scope="col">OS CLI</th>
                                                            <th scope="col">QR</th>
                                                            <th scope="col">ENCARREGADO</th>
                                                            <th scope="col">METRAGEM INF</th>
                                                            <th scope="col">METRAGEM CALC</th>  
															<th scope="col">ÁREA</th>
                                                            <th scope="col">MONTADO</th>
                                                            <th scope="col">DESMONTADO</th>
															<th scope="col">CONTADOR</th>
															<th scope="col">CONTRATO</th>
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
                                                <div class="col-6">
                                                    <h5>Filtra Área</h5>
                                                    <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
                                                        <select id="filter-gruposelectvisita" class="default-select_old form-control wide mb-3 mt-3">
                                                        
                                                            <option value="">Todos</option>
                                                            <?php foreach($areas as $areasitem): ?>
                                                                <?php if ($areasitem['NIVEL'] == 0): ?> 

                                                                    <option value="<?php echo $areasitem['NOME_AREA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>	
                                                            
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>    

                                                        </select>	
                                                        <?php } ?>

                                                        <?php  if ($sessionData['CLIENTE'] === 1) { ?>  
                                                        <select id="filter-gruposelectvisita" class="default-select_old form-control wide mb-3 mt-3">
                                                        
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
					<div id="navpills2-1" class="tab-pane">
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
                                                        <select id="filter-gruposelect" class="default-select_old form-control wide mb-3 mt-3">
                                                        
                                                            <option value="">Todos</option>
                                                            <?php foreach($areas as $areasitem): ?>
                                                                <?php if ($areasitem['NIVEL'] == 0): ?> 

                                                                    <option value="<?php echo $areasitem['NOME_AREA']; ?>"><?php echo $areasitem['NOME_AREA']; ?></option>	
                                                            
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>    

                                                        </select>	
                                                        <?php } ?>

                                                        <?php  if ($sessionData['CLIENTE'] === 1) { ?>  
                                                        <select id="filter-gruposelect" class="default-select_old form-control wide mb-3 mt-3">
                                                        
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
// console.log(item.SAMF_CLI_TIPOSC); // Para verificar o valor de SAMF_CLI_TIPOSC
// console.log(getStatusText(item.SAMF_CLI_TIPOSC)); // Para verificar o retorno da função

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

        
        // console.log('Enviando JSON:', jsonData);
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
            // console.log('Resposta do backend:', data);
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
        // console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('cancelarSC'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            // console.log('Resposta do backend:', data);
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
        document.getElementById('RDO_RESPONSAVEL_CLI2').value = '';
        // document.getElementById('SAMF_CLI_GERENCIA').value = '';
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
		// var SAMF_CLI_GERENCIA = document.getElementById('SAMF_CLI_GERENCIA').value; 
		var SAMF_CLI_AREANV0 = document.getElementById('SAMF_CLI_AREANV0').value; 
		var SAMF_CLI_AREANV1 = document.getElementById('SAMF_CLI_AREANV1').value; 
		var SAMF_CLI_AREANV2 = document.getElementById('SAMF_CLI_AREANV2').value; 
		var SAMF_CLI_TAG = document.getElementById('SAMF_CLI_TAG').value; 
		var SAMF_CLI_PARADA = '1';
		var SAMF_CLI_TIPOSC = document.getElementById('SAMF_CLI_TIPOSC').value; 
        var RDO_RESPONSAVEL_CLI2 = document.getElementById('RDO_RESPONSAVEL_CLI2').value;         
        
        const tipocontrato1 = getCheckboxValue('SAMF_RDO_TPCONT1');
        const tipocontrato2 = getCheckboxValue('SAMF_RDO_TPCONT2');
        
        SAMF_RDO_TPCONT = tipocontrato1 ? 'MANUTENCAO' : (tipocontrato2 ? 'SUSTAINING' : 'NAO APLICA');		 
		
        if (!SAMF_CLI_OS || !SAMF_CLI_AREANV1 || !SAMF_CLI_TIPOSC || !SAMF_CLI_OS) {
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
            // "SAMF_CLI_GERENCIA": SAMF_CLI_GERENCIA,
			"SAMF_CLI_TAG": SAMF_CLI_TAG,
			"SAMF_CLI_PARADA": SAMF_CLI_PARADA,
            "SAMF_CLI_AREANV0": SAMF_CLI_AREANV0,
			"SAMF_CLI_AREANV1": SAMF_CLI_AREANV1,
			"SAMF_CLI_AREANV2": SAMF_CLI_AREANV2,
			"SAMF_CLI_TIPOSC": SAMF_CLI_TIPOSC,
            "RDO_RESPONSAVEL_CLI2": RDO_RESPONSAVEL_CLI2,
            "SAMF_RDO_TPCONT": SAMF_RDO_TPCONT
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
            // console.log('Resposta do backend:', data);
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
				setTimeout(datatableEX, 0);

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
        // console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('insertGV1'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            // console.log('Resposta do backend:', data);
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
				console.log (proximoIDMOVAndaime);


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
				console.log (proximoIDMOVAndaime);
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

        // console.log(dados);
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
            // console.log('Resposta do backend:', data);
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

        var areaselecionadaREF = document.getElementById('filter-gruposelectexecucao').value;
        var statusselecionadoREF = document.getElementById('filter-status').value;
     
        var table = $('#emexecucao').DataTable({
            "pageLength": 10,
            // ajax: '<?php echo base_url('execucoesDatatables') ?>', 
            ajax: {
            url: '<?php echo base_url('execucoesDatatables') ?>',
            type: 'GET',
            data: function(d) {
                d.AREA = areaselecionadaREF,
                d.STATUS = statusselecionadoREF; // Adiciona o valor da variável como parâmetro
            }
        },
            columns: [
                {
                    data: null,
                    render: function(data, type, row) {
                        var botaostatus = '';
                        switch (row.STATUS) {
                            case 'A':
                                botaostatus = 
                                    '<i class="fa fa-circle text-blue me-1 mt-2"></i>';
                                break;
                            case 'G':
                                botaostatus = '<i class="fa fa-circle text-warning me-1 mt-2"></i>';
                                break;
                            case 'Q':
                                botaostatus = 
                                    '<i class="fa fa-circle text-danger me-1 mt-2"></i>';
                                break;
                            case 'F':
                                botaostatus =
                                    '<i class="fa fa-circle text-success me-1 mt-2"></i>';
                                break;
                            case 'C':
                                botaostatus = '<i class="fa fa-circle text-danger me-1 mt-2"></i>';
                                break;
                            case 'B':
                                botaostatus = '<i class="fa fa-circle text-light me-1 mt-2"></i>';
                                break;
                            default:
                                botaostatus = 'Desconhecido';
                        }

                        var INDICADORSTATUS = '';

                        // Exibir o botão apenas se o STATUS for diferente de "C"
                        if (row.STATUS !== 'C') {
                            INDICADORSTATUS = 
                                
                                    '<a href="atendimentoPL/' + row.IDMOV + '" class="btn btn-xs btn-warning me-4 mx-2">' +
                                        '<i class="fas fa-pencil-alt" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#ed' + row.IDMOV + '" data-id="ed' + row.IDMOV + '"></i>' +
                                    '</a>';
                        }

                        return '<div class="d-flex">' + INDICADORSTATUS + botaostatus + '</div>';;

                    }
                },
                {data: "STATUS",
                    render: function(data, type, row) {
                        // Aplica a regra de transformação dos valores de STATUS
                        switch (data) {
                        case 'A':
                        return 'Iniciar';
                        case 'B':
                        return 'Desmontado';
                        case 'C':
                        return 'Cancelado';
                        case 'F':
                        return 'Montado';
                        case 'G':
                        return 'Em Montagem';
                        return 'Desconhecido';
                    }
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        // Verifica se SAMF_MTG_BOLETAEMIT é 1 para marcar o checkbox
                        var checkbox = (row.SAMF_MTG_BOLETAEMIT == 1) ? 'checked' : '';

                        return '<div class="d-flex">' +
                            '<input type="checkbox" ' + checkbox + ' id="check'+ row.IDMOV + '" class="form-check-input ms-2" onchange="updateCheckbox(' + row.IDMOV + ')"/>' +
                            '</div>';
                    }
                },
                { data: "NUMEROMOV" },
                { data: "SAMF_CLI_OS" },
                { data: "SAMF_CLI_QRCODE" },
                { data: "ENCARREGADO" },
                { data: "SAMF_MTG_MTLINEAR" },
                { data: "METRAGEM_LINEAR" },
                { data: "SAMF_CLI_AREANV1_NOME" },
                { data: "MONTADO_EM" },
                { data: "DESMONTADO_EM" },
                { data: "DIAS_MONTADOS" },
                { data: "SAMF_RDO_TPCONT" }
                
                // { data: "METRAGEM_LINEAR_TOTAL" },
                // { data: "LINEAR_SIS_ANTIGO" },
                // { data: "DIFERENCA_LINEAR" },
                
                
                
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

        // Evento de mudança no filtro para recarregar a tabela
        $('#filter-gruposelectexecucao').on('change', function() {
            // table.ajax.reload(); // Recarrega a tabela com os novos parâmetros
            datatableEX();
        });
        

        $('#filter-status').on('change', function() {
            // var selectedValue = $(this).val();
            // if (selectedValue) {
            //     table.column(1).search('^' + selectedValue + '$', true, false).draw();
            // } else {
            //     table.column(1).search('').draw();
            // }
            datatableEX();
        }); 
        
        $('#filter-contrato').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                table.column(13).search('^' + selectedValue + '$', true, false).draw();
            } else {
                table.column(13).search('').draw();
            }
        });


        // Evento de filtro por data
        $('#startDate, #endDate').off('change').on('change', function() {
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();

            // Remove filtros personalizados anteriores
            $.fn.dataTable.ext.search = [];

            // Adiciona o novo filtro personalizado
            if (startDate || endDate) {
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    var date = data[10]; // Índice da coluna "MONTADO_EM"
                    if (!date) return false;

                    var dateMoment = moment(date, 'DD-MM-YYYY'); // Ajuste o formato conforme necessário
                    var startDateMoment = startDate ? moment(startDate) : null;
                    var endDateMoment = endDate ? moment(endDate) : null;

                    if (
                        (!startDateMoment || dateMoment.isSameOrAfter(startDateMoment)) &&
                        (!endDateMoment || dateMoment.isSameOrBefore(endDateMoment))
                    ) {
                        return true;
                    }

                    return false;
                });
            }

            table.draw(); // Atualiza a tabela com o novo filtro
        });




    }

    // Inicializa a DataTable quando o documento estiver pronto
    $(document).ready(function() {
        datatableEX();
    });
</script>

<!-- <script>
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
    </script> -->



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


                <!-- <script>
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
                    </script> -->



<!-- PREDECESSÃO DE ÁREAS -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleciona os elementos dos selects
        const areaNv0 = document.querySelector('#SAMF_CLI_AREANV0');
        const areaNv1 = document.querySelector('#SAMF_CLI_AREANV1');
        const areaNv2 = document.querySelector('#SAMF_CLI_AREANV2');

        // Armazena as opções originais de cada nível para restaurar quando necessário
        const areaNv1Options = Array.from(areaNv1.options);
        const areaNv2Options = Array.from(areaNv2.options);

        // Função para atualizar as opções de Nível 1 com base na seleção de Nível 0
        function updateAreaNv1() {
            const selectedIdNv0 = areaNv0.options[areaNv0.selectedIndex]?.getAttribute('data-id');

            // Limpa as opções de Nível 1 e Nível 2
            areaNv1.innerHTML = '<option value=""></option>';
            areaNv2.innerHTML = '<option value=""></option>';

            // Filtra e adiciona as opções de Nível 1 que correspondem ao Nível 0 selecionado
            if (selectedIdNv0) {
                areaNv1Options.forEach(option => {
                    if (option.getAttribute('data-idnivelacima') === selectedIdNv0) {
                        areaNv1.appendChild(option);
                    }
                });
            }
        }

        // Função para atualizar as opções de Nível 2 com base na seleção de Nível 1
        function updateAreaNv2() {
            const selectedIdNv1 = areaNv1.options[areaNv1.selectedIndex]?.getAttribute('data-id');

            // Limpa as opções de Nível 2
            areaNv2.innerHTML = '<option value=""></option>';

            // Filtra e adiciona as opções de Nível 2 que correspondem ao Nível 1 selecionado
            if (selectedIdNv1) {
                areaNv2Options.forEach(option => {
                    if (option.getAttribute('data-idnivelacima') === selectedIdNv1) {
                        areaNv2.appendChild(option);
                    }
                });
            }
        }

        // Executa as funções de atualização ao carregar a página
        updateAreaNv1();
        updateAreaNv2();

        // Adiciona listeners de mudança para atualizar os selects
        areaNv0.addEventListener('change', () => {
            updateAreaNv1(); // Atualiza Nível 1 com base no Nível 0
            updateAreaNv2(); // Limpa Nível 2, já que Nível 1 mudou
        });

        areaNv1.addEventListener('change', updateAreaNv2); // Atualiza Nível 2 com base no Nível 1

        // Observa mudanças no DOM para reexecutar as funções caso novas opções sejam carregadas dinamicamente
        const observer = new MutationObserver(() => {
            updateAreaNv1();
            updateAreaNv2();
        });

        // Configura o observador para monitorar mudanças nos filhos do select Nível 0
        observer.observe(areaNv0, { childList: true });
    });
</script> -->





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

        
        // console.log('Dados a serem enviados:', dados);
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
            // console.log('Resposta do backend:', data);
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleciona os elementos dos selects
        const areaNv0 = document.querySelector('#SAMF_CLI_AREANV0');
        const areaNv1 = document.querySelector('#SAMF_CLI_AREANV1');
        const areaNv2 = document.querySelector('#SAMF_CLI_AREANV2');
        const areaNv3 = document.querySelector('#SAMF_CLI_AREANV3'); // Novo nível

        // Armazena as opções originais de cada nível
        const areaNv1Options = Array.from(areaNv1.querySelectorAll('option'));
        const areaNv2Options = Array.from(areaNv2.querySelectorAll('option'));
        const areaNv3Options = Array.from(areaNv3.querySelectorAll('option')); // Opções do nível 3

        // Atualiza as opções de Nível 1 com base na seleção de Nível 0
        function updateAreaNv1() {
            const selectedIdNv0 = areaNv0.options[areaNv0.selectedIndex]?.getAttribute('data-id');

            // Limpa as opções de Nível 1, Nível 2 e Nível 3
            areaNv1.innerHTML = '<option value=""></option>';
            areaNv2.innerHTML = '<option value=""></option>';
            areaNv3.innerHTML = '<option value=""></option>';

            // Adiciona as opções de Nível 1 que pertencem ao Nível 0 selecionado
            if (selectedIdNv0) {
                areaNv1Options.forEach(option => {
                    if (option.getAttribute('data-idnivelacima') === selectedIdNv0) {
                        areaNv1.appendChild(option.cloneNode(true)); // Clona para evitar remover das opções originais
                    }
                });
            }
        }

        // Atualiza as opções de Nível 2 com base na seleção de Nível 1
        function updateAreaNv2() {
            const selectedIdNv1 = areaNv1.options[areaNv1.selectedIndex]?.getAttribute('value');

            // Limpa as opções de Nível 2 e Nível 3
            areaNv2.innerHTML = '<option value=""></option>';
            areaNv3.innerHTML = '<option value=""></option>';

            // Adiciona as opções de Nível 2 que pertencem ao Nível 1 selecionado
            if (selectedIdNv1) {
                areaNv2Options.forEach(option => {
                    if (option.getAttribute('data-idnivelacima') === selectedIdNv1) {
                        areaNv2.appendChild(option.cloneNode(true)); // Clona para evitar remover das opções originais
                    }
                });
            }
        }

        // Atualiza as opções de Nível 3 com base na seleção de Nível 2
        function updateAreaNv3() {
            const selectedIdNv2 = areaNv2.options[areaNv2.selectedIndex]?.getAttribute('value');

            // Limpa as opções de Nível 3
            areaNv3.innerHTML = '<option value=""></option>';

            // Adiciona as opções de Nível 3 que pertencem ao Nível 2 selecionado
            if (selectedIdNv2) {
                areaNv3Options.forEach(option => {
                    if (option.getAttribute('data-idnivelacima') === selectedIdNv2) {
                        areaNv3.appendChild(option.cloneNode(true)); // Clona para evitar remover das opções originais
                    }
                });
            }
        }

        // Adiciona listeners de mudança
        areaNv0.addEventListener('change', () => {
            updateAreaNv1(); // Atualiza Nível 1
            updateAreaNv2(); // Limpa Nível 2
            updateAreaNv3(); // Limpa Nível 3
        });

        areaNv1.addEventListener('change', () => {
            updateAreaNv2(); // Atualiza Nível 2
            updateAreaNv3(); // Limpa Nível 3
        });

        areaNv2.addEventListener('change', updateAreaNv3); // Atualiza Nível 3

        // Inicializa os selects no carregamento
        updateAreaNv1();
        updateAreaNv2();
        updateAreaNv3();
    });
</script>

<!-- script para areas  -->
<!-- <script>
//     document.addEventListener('DOMContentLoaded', () => {

    const nivel1Select = document.getElementById('SAMF_CLI_AREANV1').value;
    const nivel2Select = document.getElementById('SAMF_CLI_AREANV2').value;

    console.log(nivel1Select, nivel2Select);

    nivel1Select.addEventListener('change', () => {
        const selectedNivel1Id = nivel1Select.value;

        // Limpa as opções do nível 2
        nivel2Select.innerHTML = '<option value=""></option>';

        // Recupera todas as opções do nível 2
        const nivel2Options = Array.from(nivel2Select.querySelectorAll('option[data-idnivelacima]'));

        // Filtra e adiciona apenas as opções com o data-idnivelacima correspondente ao nível 1 selecionado
        nivel2Options.forEach(option => {
            if (option.dataset.idnivelacima === selectedNivel1Id) {
                nivel2Select.appendChild(option);
            }
        });

        // Caso queira desabilitar o nível 2 quando não há opções
        nivel2Select.disabled = nivel2Select.options.length === 1;

        console.log(nivel1Select, nivel2Select);
    });



// });





    function carganivel1(){

        
        const nivel1Select = document.getElementById('SAMF_CLI_AREANV1');
        const nivel2Select = document.getElementById('SAMF_CLI_AREANV2');

        const selectedNivel1Id = nivel1Select.value;
        const selectedNivel2Id = nivel2Select.value;

        // Limpa as opções do nível 2
        nivel2Select.innerHTML = '<option value=""></option>';

        // Recupera todas as opções do nível 2
        const nivel2Options = Array.from(nivel2Select.querySelectorAll('option[data-idnivelacima]'));

        // Filtra e adiciona apenas as opções com o data-idnivelacima correspondente ao nível 1 selecionado
        nivel2Options.forEach(option => {
            if (option.dataset.idnivelacima === selectedNivel1Id) {
                nivel2Select.appendChild(option);
            }
        });

        // Caso queira desabilitar o nível 2 quando não há opções
        nivel2Select.disabled = nivel2Select.options.length === 1;

        console.log(nivel1Select, nivel2Select);



    }




</script> -->
























<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>