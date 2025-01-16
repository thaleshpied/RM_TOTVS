<?php echo $this->extend('layouts/default') ?>
<?php echo $this->section('content') ?>

<div class="content-body">




<div id="gerarpdfdiv">
<button type="button" class="btn btn-danger light" onclick="removerEfeito()" id="fecharboletimpdf">Fechar</button>
<iframe src="http://45.164.4.254:3275/ReportServer/Pages/ReportViewer.aspx?rs:embed=true&rc:Parameters=false&rc:Zoom=110&%2fGest%c3%a3o+de+Obras%2fSISANDAIMES%2fBoleta_Individual+-+02.0181&rs:Command=Render&IDMOVANDAIME=
   
    <?php if (!empty($data9)): ?>
    <?php echo $data9[0]['IDMOVPLANEJAMENTO']; ?>
<?php endif; ?>" 
    width="100%" height="90%" style="border: none; margin-top:10px;"></iframe>
</div>


<script>
    // Função para adicionar a classe "efeito"
function adicionarEfeito() {
  document.getElementById('gerarpdfdiv').classList.add('efeito');
}

// Função para remover a classe "efeito"
function removerEfeito() {
  document.getElementById('gerarpdfdiv').classList.remove('efeito');
}

</script>



	<!-- http://45.164.4.254:3275/ReportServer/Pages/ReportViewer.aspx?rs:embed=true&rc:Toolbar=false&%2f%C3%81rea+do+Cliente%2f0181+-+KLABIN%2fBoletim+de+Medi%C3%A7%C3%A3o+-+0181&rs:Command=Render&AREA0=12 -->

	<!-- ABAIXO ICONES DO MENU
	<div class="container-fluid mb-3 bg-white" id="menusc">		
		<i class="flaticon-381-search-2"  aria-expanded="false"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"></i>
		
	</div> -->

	<div class="row page-titles mt-3">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active"><a href="javascript:history.back()">Planejamento de Andaimes</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Montagem 
			<?php
			if (isset($data7['SAMF_CLI_QR_CODE'])) {
				echo  $data7['SAMF_CLI_QR_CODE'];
			} else {
				echo "";
			}
			?>	
			</a>
			</li>
		</ol>
	</div>

 <!-- ABAIXO NOVA FORMA DE POSTAR ANDAIME COM ITENS  -->
<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="card-title"><code3>Materiais Utilizados </code3></h4>	
					</div>
					<div class="card-body">
						<div class="basic-list-group">
							<div class="row">
								<div class="col-lg-6 col-xl-2">
									<div class="list-group mb-4 " id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab">Acessórios</a> 
                                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab">Tubos</a> 
                                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab">Diversos</a>
										<a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab">Rodapé</a>                                        
									</div>
								</div>
								<div class="col-lg-6 col-xl-10">
									<div class="tab-content" id="nav-tabContent">
										<div class="tab-pane fade show active" id="list-home">
											<h4 class="mb-4">Acessórios Gerais</h4>
                                            <button type="button" class="btn btn-primary light btn-xs mb-1" onclick="insertItens(<?php foreach ($data9 as $t): ?><?php echo $t['IDMOVPLANEJAMENTO']; ?><?php endforeach; ?>)"><i class="fa fa-plus"></i> Salvar Informações </button>
											
                                            <!-- DATATABLE PARA ACESSÓRIOS  -->
                                            <div class="col-12">
                                                <div class="">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="tabelaItens" class="display" style="width:100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th> 
                                                                        <th>ID</th>
                                                                        <th>Nome</th>
                                                                        <th>Comprimento</th>
                                                                        <th>Diâmetro REMOVER</th>
                                                                        <th>Largura</th>
                                                                        <th>Lançado</th>
                                                                        <th>Status</th>
                                                                        <th>Quantidade</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($itensAndaimes as $itens): ?>
                                                                    <tr>
                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                        <td><?php echo $itens['DIAMETRO']; ?></td>
                                                                        <td><?php echo $itens['LARGURA']; ?></td>
                                                                        <td>00</td>
                                                                        <td>
                                                                            <span class="badge light <?php echo ($itens['EXISTE_EM_TITMMOV'] == 'N') ? 'badge-danger' : 'badge-success'; ?>">
                                                                                <i class="fa fa-circle <?php echo ($itens['EXISTE_EM_TITMMOV'] == 'N') ? 'text-danger' : 'text-success'; ?> me-1"></i>
                                                                                <!-- <?php echo $itens['EXISTE_EM_TITMMOV']; ?> -->
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <input type="text" class="form-control quantidadeNormal mb-3" value="<?php echo $itens['QUANTIDADE']; ?>" style="width:50%;">
                                                                            </div>												
                                                                        </td>
                                                                        <td style="display: none;">
                                                                            <div class="d-flex">
                                                                                <input type="text" class="form-control quantidadeNormal mb-3" value="<?php echo $itens['EXISTE_EM_TITMMOV']; ?>" style="width:50%;">
                                                                            </div>												
                                                                        </td>
												
                                                                    </tr>
                                                                    <?php endforeach; ?>    
                                                                </tbody>
                                                                <!-- <tfoot class="mt-5">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Nome</th>
                                                                        <th>Comprimento</th>
                                                                        <th>Altura</th>
                                                                        <th>Largura</th>
                                                                        <th>Lançado</th>
                                                                        <th>Saldo</th>
                                                                        <th>Quantidade</th>
                                                                    </tr>
                                                                </tfoot> -->
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIM DATATABLE PARA ACESSÓRIOS -->




										</div>
										<div class="tab-pane fade" id="list-profile" role="tabpanel">
											<h4 class="mb-4">Tubos Galvanizados</h4>
											<p>2</p>
										</div>
										<div class="tab-pane fade" id="list-messages">
											<h4 class="mb-4">Poste, Travessas, Piso, Diagonal, Pranchão, Panatrapo</h4>
											<p>3</p>
										</div>
										<div class="tab-pane fade" id="list-settings">
											<h4 class="mb-4">Rodapé de Madeira e Metálico</h4>
											<p>4.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- FIM POSTAGEM DO ANDAIME COM ITENS  -->

        
	
	<div class="container-fluid bg-white" id="pagesolicitacao">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
							<div class="btn-group mb-1">
								<!-- <button type="button" class="btn btn-primary light px-3"   aria-expanded="true"  aria-hidden="false"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i> Pesquisar OS Cliente</button> -->
								<!-- <button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-primary light px-3"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel"><i type="button" class="fa fa-file-excel-o"></i></button> -->
								
							</div>





                        

							<?php foreach ($data9 as $t): ?>									

								<!-- <a href="<?php echo base_url('BMKlabin/') ?><?php echo $t['IDMOVPLANEJAMENTO']; ?>">	
                                    <button  type="button" class="btn btn-primary light px-3"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Gerar PDF Medição
									</button>
                                </a> -->
                              
                                <a>	
                                    <button  type="button" id="gerarboletim" onclick="adicionarEfeito()" class="btn btn-primary light px-3"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF Boletim
									</button>
                                   
                                </a>
                                
                               
                            
                  

                               
                                
                                
							<?php endforeach; ?>
							<!-- <div class="btn-group mb-1">
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
							</div> -->
                        </div>
                        <!-- <div class="col-xl-2 col-lg-2 col-xxl-2 col-md-2 text-center">
							<div class="btn-group mb-1 nav">
								<button href="#navpills2-1" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-1"><i class="fa fa-th-large" aria-hidden="true"></i></button>
								<button href="#navpills2-2" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-2"><i class="fa fa-align-justify" aria-hidden="true"></i></button>
								<button href="#navpills2-3" type="button" class="btn btn-primary light px-3" class="nav-link active" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
							</div>
                        </div> -->
                    </div>
                </div>

    
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
							<!-- <th>REF</th> -->
							<!-- <th>ALT</th>
							<th>O.S</th>
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
			</div>
		</div><!-- FIM DO MENU DE PESQUISA -->					
		
		<div class="container-fluid" id="pagesolicitacao">
			<div class="row">
				

	<div class="card-body">




            

<!-- VISÃO KANBAN -->
<!-- <div id="navpills2-1" class="tab-pane">
						<div class="row">
							<div class="row kanban-bx">
							
								<div class="col cardpl">
									<div class="kanbanPreview-bx">
										<div class="draggable-zone dropzoneContainer">
											<div class="sub-card align-items-center d-flex justify-content-between mb-4">
												<div>
													<h4 class="fs-20 mb-0 font-w600">Iniciar(<span class="totalCount">24</span>)</h4>
												</div>
												<div class="plus-bx">
													<a href="javascript:void(0)"><i class="fas fa-plus"></i></a>
												</div>
											</div>
											
                                            

										</div>
									</div>
								</div>
								<div class="col cardpl">
									<div class="kanbanPreview-bx">

                                        
										<div class="draggable-zone dropzoneContainer">
											<div class="sub-card align-items-center d-flex justify-content-between mb-4">
												<div>
													<h4 class="fs-20 mb-0 font-w600">Em Montagem(<span class="totalCount">2</span>)</h4>
												</div>
												<div class="plus-bx">
													<a href="javascript:void(0)"><i class="fas fa-plus"></i></a>
												</div>
											</div>

                                           

									</div>
								</div>
								<div class="col cardpl">
									<div class="kanbanPreview-bx">
										<div class="draggable-zone dropzoneContainer">
											<div class="sub-card align-items-center d-flex justify-content-between mb-4">
												<div>
													<h4 class="fs-20 mb-0 font-w600">Montados(<span class="totalCount">3</span>)</h4>
												</div>
												<div class="plus-bx">
													<a href="javascript:void(0)"><i class="fas fa-plus"></i></a>
												</div>
											</div>
											
                                            
										</div>
									</div>
								</div>

                                <div class="col cardpl">
									<div class="kanbanPreview-bx">
										<div class="draggable-zone dropzoneContainer">
											<div class="sub-card align-items-center d-flex justify-content-between mb-4">
												<div>
													<h4 class="fs-20 mb-0 font-w600">Cancelados(<span class="totalCount">2</span>)</h4>
												</div>
												<div class="plus-bx">
													<a href="javascript:void(0)"><i class="fas fa-plus"></i></a>
												</div>
											</div>
											
                                            

										</div>
									</div>
								</div>
													
											
							</div>	
						</div>
					</div> -->








            

		<div class="col-xl-12 col-xxl-12">
            

           

		<!-- INICIO DE CADA SOLICITAÇÃO INSERIDA -->
		
		<?php foreach($data9 as $p){ ?>

		<div class="row">
            

			<h4 class="card-title"><code3>Dados da Montagem </code3></h4>	
			<div class="col-xl-3 col-xxl-3 col-md-6">
                <div class="card-body">
                    <h4 class="card-title">Boleta emitida </h4> 
                    <input type="checkbox" 
                    <?php echo ($p['SAMF_MTG_BOLETAEMIT'] == 1) ? 'checked' : ''; ?>
                    id="check" class="form-check-input ms-2" onchange="updateCheckbox(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
                </div>
				<!-- <div class="card-body">
					<h4 class="card-title">Montado Em </h4>
					<input id="mdate" name="datepickerE" width="100%" class="form-control" value="<?php echo $p['DATA_MONTAGEM']; ?>" placehoolder = "TOP 2024" onchange="updateDataMontagem(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div> -->

                <div class="col-5">
                    <label class="form-label">Data Montagem</label>
                    <input id="mdate" onchange="updateDateTime(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)" name="" width="100%" class="form-control" value="<?php echo $p['DATA_MONTAGEM']; ?>"/>
                </div>
                <div class="col-5">
                    <label class="form-label">Hora Montagem</label>
                    <input class="form-control" onchange="updateDateTime(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)" id="timepicker" placeholder="00:00" value="<?php echo $p['HORA_MONTAGEM'] ? : '00:00'; ?> ">
                </div>


                <div class="col-6 mt-1">
                    <input  width="100%" hidden id="DATAEXTRA1" class="form-control bg-light" disabled value="<?php echo $p['DATA_MONTAGEM'] ? : ''; ?>"/>
                </div>






				<div class="card-body">
					<h4 class="card-title">QR CODE </h4>
					<input id="SAMF_CLI_QRCODE" width="100%" value ="<?php echo $p['SAMF_CLI_QRCODE']; ?>" class="form-control" placehoolder = "0001" type="number" onchange="updateQrCode(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
				<div class="card-body">
					<h4 class="card-title">Altura </h4>
					<input id="alturamontagemPL"  width="100%" class="form-control" value="<?php echo $p['ALTURA_PLANEJAMENTO']; ?>"  onchange="updateDimAndaimePL(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
				<div class="card-body">
					<h4 class="card-title">Comprimento</h4>
					<input  id="comprimentomontagePL" width="100%" class="form-control" value="<?php echo $p['COMPRIMENTO_PLANEJAMENTO']; ?>"  onchange="updateDimAndaimePL(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
				<!-- <div class="card-body"> -->
				<!-- <div class="card-header">
					<h4 class="card-title">Complexidade</h4>
				</div> -->
				<div class="card-body">
					<div class="basic-form">						
						<form>
							<div class="mb-3 mb-0">
							<?php
								$checkedparada1 = ($p['SAMF_CLI_PARADA'] == 1) ? 'checked' : '';
								$checkedparada2 = ($p['SAMF_CLI_PARADA'] == 2) ? 'checked' : '';
								?>

								<label class="radio-inline me-3">
									<input type="radio" name="optradio" id="parada1<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checkedparada1; ?> onclick="updateParada(<?php echo $p['IDMOVORIGEM']; ?>, 1)"> Parada
								</label>

								<label class="radio-inline me-3">
									<input type="radio" name="optradio" id="parada2<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checkedparada2; ?> onclick="updateParada(<?php echo $p['IDMOVORIGEM']; ?>, 2)"> Pré-parada
								</label>

								<!-- <label class="radio-inline me-3"><input type="radio" name="optradio" id="parada1<?php echo $p['IDMOVORIGEM']; ?>"  onclick="updateParada(<?php echo $p['IDMOVORIGEM']; ?>,1)">  Parada </label>
								<label class="radio-inline me-3"><input type="radio" name="optradio" id="parada2<?php echo $p['IDMOVORIGEM']; ?>" onclick="updateParada(<?php echo $p['IDMOVORIGEM']; ?>,2)"> Pré-parada </label> -->
							</div>
						</form>
					</div>
				</div>
				<div class="card-body">
					<div class="mb-4">
						<h4 class="card-title">Área nível 1</h4> 
					</div>  
					<select onchange="updateNV1(<?php echo $p['IDMOVORIGEM']; ?>)" class="form-select border-dark" name = "SAMF_CLI_AREANV1" id = "SAMF_CLI_AREANV1"  aria-label="Default select example">		

					<?php foreach($data9 as $e): ?>
							<?php
							$status = $e['SAMF_CLI_AREANV1'];
							$status_text = '';

							switch ($status) {
								case '1':
									$status_text = '1 - Área Comum';
									break;
								case '2':
									$status_text = '2 - Processamento de Madeira';
									break;
								case '3':
									$status_text = '3 - Fibras';
									break;
								case '4':
									$status_text = '4 - Secagem';
									break;
								case '5':
									$status_text = '5 - Máquinas de Papel';
									break;
									case '6':
										$status_text = '6 - Forno / Recuperação';
										break;
										case '7':
											$status_text = '7 - Meio Ambiente';
											break;
											case '8':
												$status_text = '8 - Utilidades';
												break;
												case '9':
													$status_text = '9 - Planta Química';
													break;
													case '10':
														$status_text = '10 - Indiretos e Contigência';
														break;
								default:
									$status_text = ''; // Opcional, para tratar valores inesperados
									break;
							}
							?>

						<option value="<?php echo $p['SAMF_CLI_AREANV1']; ?>"><?php echo $p['SAMF_CLI_AREANV0_NOME']; ?> - <?php echo $p['SAMF_CLI_AREANV1_NOME']; ?></option>
    
						<?php endforeach; ?> 
								
                        <?php foreach ($areas as $areasitem): ?>

                            <?php if ($areasitem['NIVEL'] == 1): ?>
                                <option value="<?php echo $areasitem['ID']; ?>" data-idnivelacima="<?php echo $areasitem['IDNIVELACIMA']; ?>"> <?php echo $areasitem['NOME_NIVELACIMA']; ?> - <?php echo $areasitem['NOME_AREA']; ?></option>
                            <?php endif; ?>
                            
                        <?php endforeach; ?>



					</select>
				</div>
                <div class="card-body">
					<h4 class="card-title">Metragem Linear </h4>
					<input id="SAMF_MTG_MTLINEAR" width="100%" value ="<?php echo $p['SAMF_MTG_MTLINEAR']; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updatemtgoperacao(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
			</div>

			<div class="col-xl-3 col-xxl-3 col-md-6">
				<!-- <div class="card-body">
					<h4 class="card-title">Desmontado Em <a class="btn btn-danger  me-2 mb-2 btn-xxs"> <i class="fa fa-trash" onclick="limpadesmontado(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)" id="limpadesmontado"></i></a></h4>
					<input id="mdate2" width="100%" class="form-control" value="<?php echo $p['DATA_DESMONTAGEM']; ?>" placehoolder = "TOP 2024" onchange="updateDataDesmontagem(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div> -->

                <div class="col-5">
                    <label class="form-label">Data Desmontagem</label>
                    <input id="mdate2" onchange="updateDateTime2(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)" name="" width="100%" class="form-control" value="<?php echo $p['DATA_DESMONTAGEM']; ?>"/>
                </div>
                <div class="col-5">
                    <label class="form-label">Hora Desmontagem</label>
                    <input class="form-control" onchange="updateDateTime2(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)" id="timepicker2" placeholder="00:00" value="<?php echo $p['HORA_DESMONTAGEM'] ? : '00:00'; ?> ">
                </div>


                <div class="col-6 mt-1">
                    <input  width="100%" hidden id="DATAEXTRA2" class="form-control bg-light" disabled value="<?php echo $p['HORA_DESMONTAGEM'] ?  : ''; ?>"/>
                </div>


				
				<div class="card-body">
					<div class="mb-3">
						<h4 class="card-title">Status do Andaime </h4>
						<!-- <p>Selecione os <code>produtos</code> </p> -->
					</div>  
					<select class="form-select border-dark" name = "STATUS" id = "STATUSMONTAGEM"  aria-label="Default select example" onchange="updateStatus(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)">		
						
						<?php foreach($data9 as $e): ?>
							<?php
							$status = $e['STATUS_PLANEJAMENTO'];
							$status_text = '';

							switch ($status) {
								case 'A':
									$status_text = 'Iniciar Montagem';
									break;
								case 'B':
									$status_text = 'Desmontado';
									break;
								case 'C':
									$status_text = 'Cancelado';
									break;
								case 'G':
									$status_text = 'Em Montagem';
									break;
								case 'F':
									$status_text = 'Montado';
									break;
								default:
									$status_text = 'Status desconhecido'; // Opcional, para tratar valores inesperados
									break;
							}
							?>

							<option value="<?php echo $status; ?>">STATUS ATUAL = <?php echo $status_text; ?></option>
						<?php endforeach; ?> 
								
						<option value="A">Iniciar</option> 		
						<option value="G">Em montagem</option> 
						<option value="F">Montado</option> 		
						<option value="B">Desmontado</option> 				
					</select>
				</div>
				<div class="card-body">
					<h4 class="card-title">Largura </h4>
					<input  id="larguramontagemPL"  width="100%" class="form-control" value="<?php echo $p['LARGURA_PLANEJAMENTO']; ?>" placehoolder = "TOP 2024" onchange="updateDimAndaimePL(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
				<div class="card-body">
					<h4 class="card-title">Total M³ </h4>
					<input id="metragemPL" width="100%" class="form-control" value="<?php echo $p['METRAGEM_PLANEJAMENTO']; ?>" placehoolder = "TOP 2024" onchange="updateDataDesmontagem(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
				<div class="card-body">
					<h4 class="card-title">Pisos </h4>
					<input type="number" id="SAMF_VS_PISO" name="SAMF_VS_PISO" width="100%" class="form-control" value="<?php echo $p['SAMF_VS_PISO']; ?>" placehoolder = "TOP 2024" onchange="updatePiso(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
				<div class="card-body">
					<h4 class="card-title">Área nível 2 </h4>
					<input id="SAMF_CLI_AREANV2" width="100%" value ="<?php echo $p['SAMF_CLI_AREANV2']; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updateNV1(<?php echo $p['IDMOVORIGEM']; ?>)"/>
				</div>
                <div class="card-body">
					<h4 class="card-title">Tipo Andaime </h4>
					<input id="SAMF_MTG_TIPOAND" width="100%" value ="<?php echo $p['SAMF_MTG_TIPOAND']; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updatetipoand(<?php echo $p['IDMOVPROJETO']; ?>)"/>
				</div>
                <div class="card-body">
					<h4 class="card-title">Operação </h4>
					<input id="SAMF_MTG_OPERACAO" width="100%" value ="<?php echo $p['SAMF_MTG_OPERACAO']; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updatemtgoperacao(<?php echo $p['IDMOVPLANEJAMENTO']; ?>)"/>
				</div>
			</div>
			
			<div class="col-xl-6 col-xxl-6 col-md-12">
				<div class="card-body">
					<h4 class="card-title">Localização </h4>
					<div class="input-group">
						<input id="SAMF_CLI_LOCANDAIME" type="text" class="form-control" >
						<button class="btn btn-primary" type="button" onclick="localizacao(<?php echo $p['IDMOVORIGEM']; ?>)">Salvar</button>
					</div>
				</div>
				<div class="card-body">
					<div class="input-group" id="mapa" style="margin-top:-35px;">									
						<?php echo $p['SAMF_CLI_LOCANDAIME2']; ?>
					</div>
				</div>
			</div>


            <div class="col-xl-6 col-xxl-6 col-md-12">
                <div class="card-body">
                    <form>
                        <h4 class="card-title">Andaime Aterrado</h4>
                        <div class="mb-3 mb-0">
                            <label class="radio-inline me-3">
                                <input type="radio" name="optradio" id="aterradosim" onchange="updateAmbienteAterrado(<?php echo $p['IDMOVPROJETO']; ?>)" <?php echo ($p['SAMF_VS_ATERRADO'] == 1) ? 'checked' : ''; ?>> Sim
                            </label>
                            <label class="radio-inline me-3">
                                <input type="radio" name="optradio" id="aterradonao" onchange="updateAmbienteAterrado(<?php echo $p['IDMOVPROJETO']; ?>)" <?php echo ($p['SAMF_VS_ATERRADO'] == 2) ? 'checked' : ''; ?>> Não
                            </label>
                        </div>
                    </form>
                </div>
            </div>

                    

            <div class="col-xl-6 col-xxl-6 col-md-12">
                <div class="card-body">                    
                    <form>
                        <h4 class="card-title">Ambiente</h4> 
                        <div class="mb-3 mb-0">
                            <label class="radio-inline me-3">
                                <input type="radio" name="optradio" id="ambienteinterno" onchange="updateAmbienteAterrado(<?php echo $p['IDMOVPROJETO']; ?>)" <?php echo ($p['SAMF_VS_AMBIENTE'] == 1) ? 'checked' : ''; ?>> Externo
                            </label>
                            <label class="radio-inline me-3">
                                <input type="radio" name="optradio" id="ambienteexterno" onchange="updateAmbienteAterrado(<?php echo $p['IDMOVPROJETO']; ?>)" <?php echo ($p['SAMF_VS_AMBIENTE'] == 2) ? 'checked' : ''; ?>> Interno
                            </label>
                        </div>
                    </form>
                </div>
            </div>

            



            <div class="col-12">
				<div class="card-body">
					<h4 class="card-title">Descrição das peças</h4>
					<input id="SAMF_VS_DESCPECAS" width="100%" value ="<?php echo $p['SAMF_VS_DESCPECAS']; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updateDescpecas(<?php echo $p['IDMOVPROJETO']; ?>)"/>
				</div>
			</div>


			<div class="col-12">
				<div class="card-body">
					<h4 class="card-title">Observações sobre a montagem </h4>
					<input id="SAMF_CLI_BMOBS" width="100%" value ="<?php echo $p['SAMF_CLI_BMOBS']; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updateOBS(<?php echo $p['IDMOVORIGEM']; ?>)"/>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Fotos do Andaime Montado</h4>
					</div>
					<div class="card-body pb-1">
						<div class="card-body">
							<div class="basic-form custom_file_input">															
								<form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="idmov" value="<?php echo $p['IDMOVDESTINO']; ?>">
									<input type="hidden" name="FLUXO" value="4">
									<label for="imageFiles">Selecione as imagens:</label><br>
									<input type="file" name="files[]" multiple accept=".jpg, .png"><br><br>
									<input type="submit" value="Enviar">
								</form>
							</div>
						</div>	
						<div id="lightgallery" class="row">
							<?php foreach ($data7 as $img): ?>
								<?php if ($img['IDMOV'] == $p['IDMOVDESTINO']): ?> 
									<a class="col-lg-3 col-md-6 mb-4">
										<img src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" style="width:100%;"/>
									
										<button style="position: absolute;margin-left: -49px;margin-top: 6px;font-size: 14px;" type="button" class="btn btn-danger  me-2 mb-2 btn-xxs"  role="button" onclick="deleteIMG('<?php echo $img['NOMEARQUIVO']; ?>')">
											<i class="fa fa-window-close" aria-hidden="true"></i>
										</button>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

		</div>



        <div class="row mt-5">
			<h4 class="card-title"><code3>Dados da Solicitação e Visita </code3></h4>
            <div class="col-lg-12">

                <div class="card">
					
                    <div class="row" styler="margin-left:20px;">
						<div class="col-12">         
							<!-- <button style="margin-left: 10px; color:black;" type="button" 
							class="btn btn-info  me-2 mb-2 btn-xxs" id="accord-2One" data-bs-toggle="collapse" 
							data-bs-target="#collapse2One<?php echo $p['IDMOVORIGEM']; ?>" 
							aria-controls="collapse2One<?php echo $p['IDMOVORIGEM']; ?>"   
							aria-expanded="true"  role="button"><i class="fa fa-pencil-square-o" 
							aria-hidden="false"> Expandir Informações</i></button> -->
							<!-- <a href="atendimentoVS/<?php echo $p['IDMOVPLANEJAMENTO']; ?>"><button style="margin-left: 10px;" type="button" class="btn btn-light  me-2 mb-2 btn-xxs" id="accord-2One">
							<i class="fa fa-laptop" aria-hidden="true"></i>
							</button>
							</a> -->
							<button style="margin-left: 10px; color:black;" type="button" class="btn btn-info me-2 mb-2 btn-xxs d-none" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One140241466" aria-controls="collapse2One140241466" aria-expanded="true" role="button"><i class="fa fa-pencil-square-o" aria-hidden="false"> Expandir Informações</i></button>
						</div>
					</div> 

                    <div class="card-header">
					<!-- <span class="item">Solicitação TOP: </span><a href="<?php echo base_url('BMKlabin/') ?><?php echo $p['IDMOVPLANEJAMENTO']; ?>"><?php echo $p['IDMOVORIGEM']; ?></a><p> -->
                        <!-- <h5>Solicitação TOP: <small><?php echo $p['IDMOVORIGEM']; ?>  </small></h5> --><p>
						<h5>OS TOP ANDAIMES: <small><?php echo $p['IDMOVORIGEM']; ?>  </small></h5>
                        <h5>OS Cliente TOP: <small><?php echo $p['SAMF_CLI_OS']; ?>  </small></h5>
                        <!-- <h5>Previsão de visita: <small> [AJUSTE]  </small></h5> -->
                        <!-- <h5>Tarefa: <small><?php echo $p['SAMF_CLI_TEXTO_BREVE']; ?>  </small></h5>
                        <h5>Descrição: <small><?php echo $p['SAMF_CLI_DESC_OP']; ?>  </small></h5> -->
                    </div>

                    

					

					
                


					<div class="col-12"><!-- AQUI INÍCIO DE CADA VISITA -->
					<div class="card">
						<div class="card-body">
							<div class="accordion accordion-start-indicator" id="accordion-two">
								<div class="accordion-item">
								<div class="accordion-header  rounded-lg  d-none">
									<span class="accordion-header-text">Preencher informações</span>
									<span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2One<?php echo $p['IDMOVORIGEM']; ?>" class="collapse show accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
								



								
								<div class="accordion accordion-primary" id="accordion-one">


								
								<!-- DOCUMENTOS ANEXOS -->
<div class="accordion-item mt-4">
<div class="accordion-header rounded-lg text-center " id="hd6<?php echo $p['IDMOVDESTINO']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd6<?php echo $p['IDMOVDESTINO']; ?>" aria-controls="collapsehd6<?php echo $p['IDMOVDESTINO']; ?>"   role="button" aria-expanded="true">
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
																<input type="hidden" name="FLUXO" value="3">
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
																	<li role="presentation" style="border: solid 3px #0000003d;">
																		<button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs"  role="button" onclick="deleteIMG('<?php echo $img['NOMEARQUIVO']; ?>')">
																			<i class="fa fa-window-close" aria-hidden="true"></i>
																		</button>
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






									<!-- ACCORDION DOS DADOS DE ENTRADA -->
									<div class="accordion-item">
										<!-- <button id="enviarvisita2<?php echo $p['IDMOVORIGEM']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="postprojeto_OLD(<?php echo $p['IDMOVORIGEM']; ?>)"><i class="fa fa-reply"></i></button>                                   -->
										<!-- <button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalcancelarvisita"><i class="fa fa-times" aria-hidden="true"></i></button>	 -->
										<!-- <button type="button" class="btn btn-info  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fas fa-user-check"></i></button> -->
																		
										<div class="accordion-header  rounded-lg text-center " id="hd1<?php echo $p['IDMOVORIGEM']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd1<?php echo $p['IDMOVORIGEM']; ?>" aria-controls="collapsehd1<?php echo $p['IDMOVORIGEM']; ?>"   aria-expanded="false" role="button">
											<span class="accordion-header-icon"></span>
											<span class="accordion-header-text">Dados de Entrada</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd1<?php echo $p['IDMOVORIGEM']; ?>" class="collapse show" aria-labelledby="hd1<?php echo $p['IDMOVORIGEM']; ?>" data-bs-parent="#accordion-one<?php echo $p['IDMOVORIGEM']; ?>">
											<div class="accordion-body-text">
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked1 = ($p['SAMF_VS_INTERFER1'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada1<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked1; ?>>
															<label class="form-check-label" for="dadosdeentrada1<?php echo $p['IDMOVORIGEM']; ?>">Andaime Apoiado </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked2 = ($p['SAMF_VS_INTERFER2'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada2<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked2; ?>>
															<label class="form-check-label" for="dadosdeentrada2<?php echo $p['IDMOVORIGEM']; ?>">Andaime Suspenso</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked3 = ($p['SAMF_VS_INTERFER3'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada3<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked3; ?>>
															<label class="form-check-label" for="dadosdeentrada3<?php echo $p['IDMOVORIGEM']; ?>">Andaime Balanço</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked4 = ($p['SAMF_VS_INTERFER4'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada4<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked4; ?>>
															<label class="form-check-label" for="dadosdeentrada4<?php echo $p['IDMOVORIGEM']; ?>">Andaime Pau de carga </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked5 = ($p['SAMF_VS_INTERFER5'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada5<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked5; ?>>
															<label class="form-check-label" for="dadosdeentrada5<?php echo $p['IDMOVORIGEM']; ?>">Escoramento em viga</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked6 = ($p['SAMF_VS_INTERFER6'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada6<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked6; ?>>
															<label class="form-check-label" for="dadosdeentrada6<?php echo $p['IDMOVORIGEM']; ?>">Escoramento em laje</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked7 = ($p['SAMF_VS_INTERFER7'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada7<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked7; ?>>
															<label class="form-check-label" for="dadosdeentrada7<?php echo $p['IDMOVORIGEM']; ?>">Escoramento de equipamento </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked8 = ($p['SAMF_VS_INTERFER8'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada8<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked8; ?>>
															<label class="form-check-label" for="dadosdeentrada8<?php echo $p['IDMOVORIGEM']; ?>">Travamento próprio andaime</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked9 = ($p['SAMF_VS_INTERFER9'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada9<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked9; ?>>
															<label class="form-check-label" for="dadosdeentrada9<?php echo $p['IDMOVORIGEM']; ?>">Travamento em estruturas</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked10 = ($p['SAMF_VS_INTERFER10'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada10<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked10; ?>>
															<label class="form-check-label" for="dadosdeentrada10<?php echo $p['IDMOVORIGEM']; ?>">Avaliação Estrutural </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked11 = ($p['SAMF_VS_INTERFER11'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada11<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked11; ?>>
															<label class="form-check-label" for="dadosdeentrada11<?php echo $p['IDMOVORIGEM']; ?>">Linha de Vida</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked12 = ($p['SAMF_VS_INTERFER12'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada12<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked12; ?>>
															<label class="form-check-label" for="dadosdeentrada12<?php echo $p['IDMOVORIGEM']; ?>">Espaço Confinado</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked13 = ($p['SAMF_VS_INTERFER13'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada13<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked13; ?>>
															<label class="form-check-label" for="dadosdeentrada13<?php echo $p['IDMOVORIGEM']; ?>">Necessário bloqueio do equipamento </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<?php $checked14 = ($p['SAMF_VS_INTERFER14'] == 1) ? 'checked' : '';?>
															<input  disabled type="checkbox" class="form-check-input" id="dadosdeentrada14<?php echo $p['IDMOVORIGEM']; ?>" <?php echo $checked14; ?>>
															<label class="form-check-label" for="dadosdeentrada14<?php echo $p['IDMOVORIGEM']; ?>">Local da Montagem é Aberto</label>
														</div>
													</div>												
												</div>
											</div>
										</div>
									</div><!-- FIM ACCORDION DOS DADOS DE ENTRADA -->
								
									<!-- DIMENSÕES DO ANDAIME -->
									<div class="accordion-item">
										<div class="accordion-header rounded-lg text-center " id="hd3<?php echo $p['IDMOVORIGEM']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd3<?php echo $p['IDMOVORIGEM']; ?>" aria-controls="collapsehd3<?php echo $p['IDMOVORIGEM']; ?>"  role="button"  aria-expanded="false">
											<span class="accordion-header-text text-center">Dimensões do Andaime</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd3<?php echo $p['IDMOVORIGEM']; ?>" class="collapse show" aria-labelledby="hd3<?php echo $p['IDMOVORIGEM']; ?>" data-bs-parent="#accordion-one">
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
																				<td><input disabled value="<?php echo $p['BM_ALTURA']; ?>" type="text" class="form-control" placeholder="0" id="alturamontagem<?php echo $p['IDMOVORIGEM']; ?>"></td>
																				<td><input disabled value="<?php echo $p['BM_LARGURA']; ?>"type="text" class="form-control" placeholder="0" id="larguramontagem<?php echo $p['IDMOVORIGEM']; ?>"></td>
																				<td><input disabled value="<?php echo $p['BM_COMPRIMENTO']; ?>"="text" class="form-control" placeholder="0" id="comprimentomontagem<?php echo $p['IDMOVORIGEM']; ?>"></td>
																				<td><input disabled type="text" class="form-control bg-light" disabled placeholder="0"></td>
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
																				<td><input disabled value="0" type="text" class="form-control" placeholder="0" id="alturamontagem<?php echo $p['IDMOVORIGEM']; ?>"></td>
																				<td><input disabled value="0" type="text" class="form-control" placeholder="0" id="alturamontagem<?php echo $p['IDMOVORIGEM']; ?>"></td>
																				<td><input disabled value="0" type="text" class="form-control" placeholder="0" id="alturamontagem<?php echo $p['IDMOVORIGEM']; ?>"></td>
																				<td><input disabled type="text" class="form-control bg-light" disabled placeholder="0"></td>
																			
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
			
									<!-- ACCORDION DAS OBSERVAÇÕES DA VISITA-->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center " id="hd4" data-bs-toggle="collapse" data-bs-target="#collapsehd4<?php echo $p['IDMOVORIGEM']; ?>" aria-controls="collapsehd4<?php echo $p['IDMOVORIGEM']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Observações</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd4<?php echo $p['IDMOVORIGEM']; ?>" class="collapse show" aria-labelledby="hd4" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
												<div class="row">
													<div class="mb-4">
														<h4 class="card-title">Observações da visita</h4>
														<!-- <p>Selecione os <code>produtos</code> </p> -->
													</div>
												<div class="mb-3">
													<textarea class="form-control" id="comentarioconteudo<?php echo $p['IDMOVDESTINO']; ?>" rows="3"></textarea>
													<button id="btncomentario<?php echo $p['IDMOVDESTINO']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs mt-2" onclick="enviarcomentario(<?php echo $p['IDMOVDESTINO']; ?>)"><i class="fa fa-reply"> Salvar</i></button>         
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
																				<h6 class="mb-0">Comentário: 
																					
																					<?php echo $cmt['COMENTARIO'];?></h6>
																			</a>
																		</li>
																	<?php endif; ?>
																<?php endforeach; ?>


																</ul>
															<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 324px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div>
														</div>
													</div>
												</div><!-- FIM TIMELINE ANDAIME -->
												
											</div>
										</div>
									</div><!-- FIM ACCORDION DAS OBSERVAÇÕES DA VISITA-->

									<!-- INFORMAÇÕES DE ANTEPROJETO -->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center " id="hd5<?php echo $p['IDMOVORIGEM']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $p['IDMOVORIGEM']; ?>" aria-controls="collapsehd5<?php echo $p['IDMOVORIGEM']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Informações de Anteprojeto</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd5<?php echo $p['IDMOVORIGEM']; ?>" class="collapse show" aria-labelledby="hd5<?php echo $p['IDMOVORIGEM']; ?>" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row">
											<div class="col-6">
													<div class="form-check custom-checkbox mb-3 check-xs">
													<?php $checked = ($p['SAMF_VS_AP1'] == 1) ? 'checked' : '';?>
													<input disabled type="checkbox" class="form-check-input" id="ap1<?php echo $p['IDMOVORIGEM']; ?>"  <?php echo $checked; ?> disable = true>

													<!-- <input disabled type="checkbox" class="form-check-input"  id="ap1<?php echo $p['IDMOVORIGEM']; ?>" required> -->
													<label class="form-check-label" for="ap1<?php echo $p['IDMOVORIGEM']; ?>">Necessita de projeto </label>
													</div>
												</div>
															
												<div class="col-6">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<input disabled type="checkbox" class="form-check-input"  id="ap2<?php echo $p['IDMOVORIGEM']; ?>" required>
														<label class="form-check-label" for="ap2<?php echo $p['IDMOVORIGEM']; ?>">Necessita de memória de cálculo</label>
													</div>
												</div>					
											</div>
										</div>
									</div><!-- FIM INFORMAÇÕES DE ANTEPROJETO -->

									
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

			<?php } ?> <!-- AQUI FIM DE CADA SOLICITAÇÃO INSERIDA -->

		</div>	
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function alertadecampo{
            toastr.warning("Existe campos irregulares!", "Alerta de Campo", {
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
</script>




<!-- LIMITAR O CHECKBOX -->
<!-- <script>
	function limitarCheckbox(checkbox) {
		// Se o checkbox atual estiver marcado
		if (checkbox.) {
			// Desmarca os outros checkboxes
			var checkboxes = document.querySelectorAll('input[disabled type="checkbox"]');
			checkboxes.forEach(function(cb) {
				if (cb !== checkbox) {
					cb. = false;
				}
			});
		}
	}
</script> -->



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
                window.location.href = 'pesquisar/' + CONTEUDOPESQUISAR;
            } else {
                // Tratamento de erros, se necessário
                console.error('Erro na requisição:', response.status);
            }
        })
        .catch(error => console.error('Erro:', error));
    }

	
</script>



<script>

function limparCampos() {
        document.getElementById('SAMF_CLI_LOCANDAIME').value = '';
    }

    function localizacao(IDMOV) {
        var SAMF_CLI_LOCANDAIME = document.getElementById('SAMF_CLI_LOCANDAIME').value;
        
        console.log('Dados a serem enviados:', SAMF_CLI_LOCANDAIME, IDMOV);

        var dados = {
            "SAMF_CLI_LOCANDAIME": SAMF_CLI_LOCANDAIME,
            "IDMOV": IDMOV,    
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('localizacao'); ?>', {
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
                // Inserir o iframe na div com id 'mapa'
                var mapaDiv = document.getElementById('mapa');
                // Limpa o conteúdo anterior da div
                mapaDiv.innerHTML = '';
                // Define o innerHTML com o código do iframe
                mapaDiv.innerHTML = SAMF_CLI_LOCANDAIME;

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
				limparCampos();

                // Desabilitar botões ou realizar outras ações, se necessário
                // setTimeout(function() {
                //     location.reload();
                // }, 2000); 

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
            // enviarvisita2.disabled = false;
        });
    }
</script>




<!-- ATUALIZAR LOCALIZAÇÃO  -->
<script>
    function localizacao_old(IDMOV) {

		var SAMF_CLI_LOCANDAIME = document.getElementById('SAMF_CLI_LOCANDAIME').value;
		
		console.log('Dados a serem enviados:', SAMF_CLI_LOCANDAIME, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_CLI_LOCANDAIME": SAMF_CLI_LOCANDAIME,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('localizacao'); ?>', {
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

				document.getElementById('mapa').innerText = SAMF_CLI_LOCANDAIME;

				// setTimeout(function() {
				// 	location.reload();
				// }, 2000); 

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








<!-- ATUALIZAR QUANTIDADE DE PISOS  -->
<script>
    function updatePiso(IDMOV) {
		
		var SAMF_VS_PISO = document.getElementById('SAMF_VS_PISO').value;
		
        var dados = {
			"SAMF_VS_PISO": SAMF_VS_PISO,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('updatePiso'); ?>', {
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

<!-- ATUALIZAR SE É PARADA OU NÃO   -->
<script>
    function updateParada(IDMOV,VALOR) {

		var SAMF_CLI_PARADA = VALOR;
		var SAMF_CLI_PARADA2 = SAMF_CLI_PARADA.toString();
		
        var dados = {
			"SAMF_CLI_PARADA": SAMF_CLI_PARADA2,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('updateParada'); ?>', {
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

<!-- ATUALIZAR QR CODE  -->
<script>
    function updateQrCode(IDMOV) {

		var SAMF_CLI_QRCODE = document.getElementById('SAMF_CLI_QRCODE').value;
		
		console.log('Dados a serem enviados:', SAMF_CLI_QRCODE, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_CLI_QRCODE": SAMF_CLI_QRCODE,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('updateQrCode'); ?>', {
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
    function updatetipoand(IDMOV) {

		var SAMF_MTG_TIPOAND = document.getElementById('SAMF_MTG_TIPOAND').value;
		
		console.log('Dados a serem enviados:', SAMF_MTG_TIPOAND, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_MTG_TIPOAND": SAMF_MTG_TIPOAND,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('updatetipoand'); ?>', {
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
    function updatemtgoperacao(IDMOV) {

		var SAMF_MTG_OPERACAO = document.getElementById('SAMF_MTG_OPERACAO').value;
		var SAMF_MTG_MTLINEAR = document.getElementById('SAMF_MTG_MTLINEAR').value;
        
		
		console.log('Dados a serem enviados:', SAMF_MTG_OPERACAO, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_MTG_OPERACAO": SAMF_MTG_OPERACAO,
            "SAMF_MTG_MTLINEAR": SAMF_MTG_MTLINEAR,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('updatemtgoperacao'); ?>', {
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




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- <script>
			$(document).ready(function(){
				$('#alturamontagemPL').on('blur', function() {
					formatarCampo(this);
				});

				$('#larguramontagemPL').on('blur', function() {
					formatarCampo(this);
				});

				$('#comprimentomontagemPL').on('blur', function() {
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
			</script> -->
<!-- ATUALIZAR DIMENSÕES DO ANDAIME  -->
<script>
	
    function updateDimAndaimePL(IDMOV) {	
		
		

		var BM_ALTURA = document.getElementById('alturamontagemPL').value;
		var BM_LARGURA = document.getElementById('larguramontagemPL').value;
		var BM_COMPRIMENTO = document.getElementById('comprimentomontagePL').value;	


		var BM_TOTAL = BM_ALTURA * BM_LARGURA * BM_COMPRIMENTO; // document.getElementById('metragemPL').value;	

		console.log('Dados a serem enviados:', BM_ALTURA, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"BM_ALTURA": BM_ALTURA,
			"BM_LARGURA": BM_LARGURA,
			"BM_COMPRIMENTO": BM_COMPRIMENTO,
			"BM_TOTAL": BM_TOTAL,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('updateDimAndaimePL'); ?>', {
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
                document.getElementById('metragemPL').value = BM_TOTAL;
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



<!-- ATUALIZAR DATA DE MONTAGEM  -->
<script>
    function updateStatus(IDMOV) {

		var STATUSMONTAGEM = document.getElementById('STATUSMONTAGEM').value;		
		console.log('Dados a serem enviados:', STATUSMONTAGEM, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"STATUS": STATUSMONTAGEM,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('updateStatus'); ?>', {
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



<!-- ATUALIZAR DATA DE MONTAGEM  -->
<script>
    function updateDataMontagem(IDMOV) {

		var DATAEXTRA1 = document.getElementById('DATAEXTRA1').value;		
		console.log('Dados a serem enviados:', DATAEXTRA1, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"DATAEXTRA1": DATAEXTRA1,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateDataMontagem'); ?>', {
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







<!-- UPDATE NÍVEL 1  -->
<script>
    function updateNV1(IDMOV) {

		var SAMF_CLI_AREANV1 = document.getElementById('SAMF_CLI_AREANV1').value;	
		var SAMF_CLI_AREANV2 = document.getElementById('SAMF_CLI_AREANV2').value;	
		console.log('Dados a serem enviados:', SAMF_CLI_AREANV1, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_CLI_AREANV1": SAMF_CLI_AREANV1,
			"SAMF_CLI_AREANV2": SAMF_CLI_AREANV2,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
// return;
        fetch('<?php echo base_url('updateNV1'); ?>', {
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






<!-- ATUALIZAR OBSERVAÇÃO  -->
<script>
    function updateOBS(IDMOV) {

		var SAMF_CLI_BMOBS = document.getElementById('SAMF_CLI_BMOBS').value;		
		console.log('Dados a serem enviados:', SAMF_CLI_BMOBS, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_CLI_BMOBS": SAMF_CLI_BMOBS,
			"IDMOV": IDMOV,	

        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('updateOBS'); ?>', {
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
    function updateDescpecas(IDMOV) {

		var SAMF_VS_DESCPECAS = document.getElementById('SAMF_VS_DESCPECAS').value;		
		console.log('Dados a serem enviados:', SAMF_VS_DESCPECAS, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"SAMF_VS_DESCPECAS": SAMF_VS_DESCPECAS,
			"IDMOV": IDMOV,	

        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('updateDescpecas'); ?>', {
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



<!-- ATUALIZAR DATA DE MONTAGEM  -->
<script>
    function updateDataDesmontagem(IDMOV) {

		var DATAEXTRA2 = document.getElementById('DATAEXTRA2').value;		
		console.log('Dados a serem enviados:', DATAEXTRA2, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"DATAEXTRA2": DATAEXTRA2,
			"IDMOV": IDMOV,	

        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('updateDataDesmontagem'); ?>', {
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
    function updateAmbienteAterrado(IDMOV) {

		
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

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"IDMOV": IDMOV,	
            "SAMF_VS_AMBIENTE": SAMF_VS_AMBIENTE,
            "SAMF_VS_ATERRADO": SAMF_VS_ATERRADO

        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);

        fetch('<?php echo base_url('updateambienteaterrado'); ?>', {
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






<!-- ENVIA MOVIMENTO PARA O PROJETO  -->
<script>
    function postprojeto(idmovorigem) {

		var enviarvisita = document.getElementById('enviarvisita'.concat(idmovorigem));		
		enviarvisita.disabled = true;

		var enviarvisita2 = document.getElementById('enviarvisita2'.concat(idmovorigem));		
		enviarvisita2.disabled = true;
		
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
		var ap1Checkbox = document.getElementById('ap1'.concat(idmovorigem));
		var ap1 = ap1Checkbox ? (ap1Checkbox.checked ? 1 : 0) : 0;
		
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
				enviarvisita.disabled = false;
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
			"SAMF_VS_AP1": ap1,
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
				enviarvisita.disabled = true;
				enviarvisita.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";

				enviarvisita2.disabled = true;
				enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";
				


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
				enviarvisita.disabled = false;
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
			enviarvisita.disabled = false;
				enviarvisita2.disabled = false;
        });
    }

	
</script>



<!-- ENVIA COMENTÁRIO  -->
<script>
    function enviarcomentario(idmovorigem) {
        var codccusto = '02.0181.00'; 
		var CODCOLIGADA = 1;
		var IDMOV = idmovorigem;
		var COMENTARIO = document.getElementById('comentarioconteudo'.concat(idmovorigem)).value;

		var btncomentario = document.getElementById('btncomentario'.concat(idmovorigem));		
		btncomentario.disabled = true;
		
		var areacomentario = document.getElementById('comentarioconteudo'.concat(idmovorigem));
		areacomentario.readOnly = true;

        var FLUXO = 4;

		
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
            "FLUXO": FLUXO
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





<!-- <script>
   $(document).ready(function(){

// Cadastrar
$('#enviarfoto').on('click', function(){

	console.log ("Botão de envio acionado!");

	// Pegando valores dos inputs
	var NOMEARQUIVO = 'TESTENOME'; //$('#nome').val();
	var imagem = $('#imagem')[0].files[0];

	console.log (NOMEARQUIVO);
	console.log (imagem);

	// Verificando se um arquivo foi selecionado
	if (!imagem) {
		alert('Selecione uma imagem!');
		return;
	}

	// Obtendo a extensão do arquivo
	var extensao = imagem.name.split('.').pop().toLowerCase();

	console.log(extensao);

	// Criando um novo nome para o arquivo combinando o nome e a extensão
	var novoNomeArquivo = NOMEARQUIVO + '.' + extensao;

	console.log(novoNomeArquivo);

	// Criando um objeto FormData para enviar dados e arquivo
	var formData = new FormData();
	formData.append('NOMEARQUIVO', NOMEARQUIVO);
	formData.append('imagem', imagem, novoNomeArquivo);


	console.log(formData);


	// Ajax envia os dados para o Painel/add
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('uploadimagem')?>",
		data: formData,
		processData: false,
		contentType: false,
		success: function(data){
			alert(data);
		}
	});

	// Limpando o formulário
	$('#form-cadastro')[0].reset();
});

// Mascaras nos inputs
$('#preco').mask('#.##0,00', {reverse: true});

});

</script> -->




<!-- <script type="text/javascript">

$(document).ready(function(){

// Cadastrar
$('#botao').on('click', function(){

    // Pegando valores dos inputs
    var nome = $('#nome').val();
    var imagem = $('#imagem')[0].files[0];

    // Verificando se um arquivo foi selecionado
    if (!imagem) {
        alert('Selecione uma imagem!');
        return;
    }

    // Obtendo a extensão do arquivo
    var extensao = imagem.name.split('.').pop().toLowerCase();

    // Criando um novo nome para o arquivo combinando o nome e a extensão
    var novonome = nome + '.' + extensao;


	console.log(nome);
	
	console.log(imagem);
	
	console.log('EXTENSAO',extensao);

	console.log(novonome);


    // Criando um objeto FormData para enviar dados e arquivo
    var formData = new FormData();
    formData.append('nome', nome);
    formData.append('imagem', imagem, novonome);

	console.log(formData);

    // Ajax envia os dados para o uploadimagem
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('uploadimagem')?>",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            alert(data);
        }
    });

    // Limpando o formulário
    $('#form-cadastro')[0].reset();
});


});


</script> -->



<script>
        document.addEventListener('DOMContentLoaded', function() {
            
            var BM_ALTURA = document.getElementById('alturamontagemPL').value;
            var BM_LARGURA = document.getElementById('larguramontagemPL').value;
            var BM_COMPRIMENTO = document.getElementById('comprimentomontagePL').value;	
            var botaogerarpdf = document.getElementById('gerarpdfbotao');            
            
            if (BM_COMPRIMENTO > 0 && BM_LARGURA > 0 && BM_ALTURA > 0) { 
                botaogerarpdf.classList.remove('d-none');
                botaogerarpdf.style.display = 'inline'; 
            }
        });
    </script>











<!-- ENVIA COMENTÁRIO  -->
<script>
    function enviarcomentario(idmovorigem, fluxo) {
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















<!-- SCRIPT PARA OBTER A LOCALIZAÇÃO DO DISPOSITIVO -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCqSadzca7Hx2OUFaJqgWC_xd5ao25EXE&libraries=geometry"></script>
<script>
	function obterLocalizacao() {
		var geocoder = new google.maps.Geocoder();
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var latitude = position.coords.latitude;
				var longitude = position.coords.longitude;
				var latlng = new google.maps.LatLng(latitude, longitude);

				// Geocodificação reversa para obter o endereço
				geocoder.geocode({'location': latlng}, function(results, status) {
					if (status === 'OK') {
						if (results[0]) {
							var endereco = results[0].formatted_address;
							console.log("Endereço: " + endereco); //RECEBENDO O NOME DA RUA 

							// Cria um mapa e o coloca na div #map
							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 15,
								center: latlng
							});

							// Adiciona um marcador no mapa
							var marker = new google.maps.Marker({
								position: latlng,
								map: map
							});
						} else {
							console.error('Nenhum resultado encontrado.');
						}
					} else {
						console.error('Geocodificação falhou devido a: ' + status);
					}
				});
			}, function(error) {
				console.error("Erro ao obter localização: " + error.message);
			}, {
				enableHighAccuracy: true
			});
		} else {
			console.error("Geolocalização não é suportada neste navegador.");
		}
	}
</script>

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



<script>
        // Função para limpar o campo mdate2 e chamar updateDataDesmontagem2
        function limpadesmontado(IDMOV) {		
            const campoParaLimpar = document.getElementById('mdate2');
            campoParaLimpar.value = '';

            console.log("IDMOV recebido:", IDMOV);
            updateDataDesmontagem2(IDMOV);
        }

        // Função para limpar o campo mdate
        function limpamontado() {		
            const campoParaLimpar = document.getElementById('mdate');
            campoParaLimpar.value = '';
        }
        
        // Função updateDataDesmontagem2 que será chamada após limpar o campo mdate2
        function updateDataDesmontagem2(IDMOV) {


            var dados = {
                "IDMOV": IDMOV
            };

            console.log('Dados a serem enviados:', dados);

            fetch('<?php echo base_url('updateDataDesmontagemClean'); ?>', {
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
                        timeOut: 5000,
                        closeButton: true,
                        newestOnTop: true,
                        progressBar: true,
                        preventDuplicates: true,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut"
                    });
                } else {
                    console.error('Erro ao inserir registro:', data.message);
                    toastr.error("Erro ao executar comando", "Tente novamente", {
                        positionClass: "toast-bottom-right",
                        timeOut: 5000,
                        closeButton: true,
                        newestOnTop: true,
                        progressBar: true,
                        preventDuplicates: true,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut"
                    });
                }
            })
            .catch(error => {
                console.error('Erro ao enviar dados:', error);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-top-right",
                    timeOut: 5000,
                    closeButton: true,
                    newestOnTop: true,
                    progressBar: true,
                    preventDuplicates: true,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut"
                });
            });
        }
        
        // Adicionar eventos de clique aos botões
        document.getElementById('limpadesmontadoBtn').addEventListener('click', function() {
            const IDMOV = this.getAttribute('data-idmov');
            limpadesmontado(IDMOV);
        });
        document.getElementById('limpamontadoBtn').addEventListener('click', limpamontado);
    </script>






<!-- ATUALIZAR EMISSÃO BOLETA  -->
<script>
    function updateCheckbox(IDMOV) {
        
        var atualizarboleta = document.getElementById('check');
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




<!-- ATUALIZAR EMISSÃO BOLETA  -->
<script>
    function updateCheckbox(IDMOV) {
        
        var atualizarboleta = document.getElementById('check');
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




<!-- SCRIPT PARA INSERIR OS ITENS  --> 
<script>
    function insertItens(IDMOV) {
        
        // var botaordosalvar_js = document.getElementById('botaordosalvar3');
		// botaordosalvar_js.disabled = true;
        // botaordosalvar_js.innerHTML = "Enviando Edição!";

        var tabelaItens = [];      
        var tabelaItensUpdate = []; 
        var rows = document.querySelectorAll('#tabelaItens tbody tr');

        var NSEQITMMOV = 10; 
		
        // BUSCA TUDO DA (tabelaItens)
        rows.forEach(row => {
            var CODUND = 'UN';
            var PRECOUNITARIO = '1';
            var CODCOLIGADA = 1;
            var INTEGRAAPLICACAO = 'T';
            var PRODUTOSUBSTITUTO = 0;
            var IDPRD = row.cells[1].textContent.trim();            
            var NOMEFANTASIA = row.cells[2].textContent.trim();   
            var COMPRIMENTO = row.cells[3].textContent.trim();   
            var DIAMETRO = row.cells[4].textContent.trim();   
            var LARGURA = row.cells[5].textContent.trim();
            var QUANTIDADE = row.cells[8].querySelector('input').value.trim();
            var STATUS = row.cells[9].querySelector('input').value.trim();  
        
            // console.log(STATUS); 

            // VERIFICANDO SE O STATUS DO ITEM É "N" E SE POSSUI VALOR POIS ESTES SÃO ITENS NOVOS QUE SERÃO INSERIDOS PELA
            // PRIMEIRA VEZ ENTÃO NESTE CASO SERÃO DESTINADOS PARA UM INSERT 
            if (STATUS === 'N' && QUANTIDADE && QUANTIDADE > 0) {
                tabelaItens.push({
                    IDMOV: IDMOV,
                    IDPRD: IDPRD,
                    CODUND: CODUND,
                    NUMEROSEQUENCIAL: NSEQITMMOV,
                    QUANTIDADE: QUANTIDADE,
                    PRECOUNITARIO: PRECOUNITARIO,
                    CODCOLIGADA: CODCOLIGADA,
                    INTEGRAAPLICACAO: INTEGRAAPLICACAO,
                    PRODUTOSUBSTITUTO: PRODUTOSUBSTITUTO,
                    NSEQITMMOV: NSEQITMMOV,
                    NOMEFANTASIA: NOMEFANTASIA,
                    COMPRIMENTO: COMPRIMENTO,
                    DIAMETRO: DIAMETRO,
                    LARGURA: LARGURA
                });

                // INCREMENTANDO PARA PODER GERAR O VALOR DO PRÓXIMO ITEM 
                NSEQITMMOV++; 
            }

            // ABAIXO VALIDO SE O ITEM JÁ EXISTE CONSIDERANDO O STATUS = "S" E PEGANDO TUDO QUE EXISTE E ATUALIZANDO 
            if (STATUS === 'S') {
                tabelaItensUpdate.push({
                    IDMOV: IDMOV,
                    IDPRD: IDPRD,
                    CODUND: CODUND,
                    NUMEROSEQUENCIAL: NSEQITMMOV,
                    QUANTIDADE: QUANTIDADE,
                    PRECOUNITARIO: PRECOUNITARIO,
                    CODCOLIGADA: CODCOLIGADA,
                    INTEGRAAPLICACAO: INTEGRAAPLICACAO,
                    PRODUTOSUBSTITUTO: PRODUTOSUBSTITUTO,
                    NSEQITMMOV: NSEQITMMOV,
                    NOMEFANTASIA: NOMEFANTASIA,
                    COMPRIMENTO: COMPRIMENTO,
                    DIAMETRO: DIAMETRO,
                    LARGURA: LARGURA
                });

                // INCREMENTANDO PARA PODER GERAR O VALOR DO PRÓXIMO ITEM 
                NSEQITMMOV++; 
            }

        });
        
        var dados = {
            tabelaItens: tabelaItens,
            tabelaItensUpdate: tabelaItensUpdate
        };

        console.log(dados); 
        // return;

        fetch('<?php echo base_url('rotinaItensAndaime'); ?>', {
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

                // Recarrega a página após 1 segundo (opcional)
                setTimeout(() => {
                    location.reload();
                }, 1000);

            } else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.warning("Erro ao executar comando", "Tente novamente", {
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
            toastr.warning("Erro ao executar comando", "Tente novamente", {
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
    function updateDateTime(IDMOV) {
        const dateValue = document.getElementById("mdate").value;
        const timeValue = document.getElementById("timepicker").value;

        if (dateValue && timeValue) {
            const dateTime = dateValue + ' ' + timeValue;
            document.getElementById("DATAEXTRA1").value = dateTime;

            // Após atualizar o valor de DATAEXTRA1, chama a função para enviar os dados
            updateDataMontagem(IDMOV);
        }
    }
</script>


<script>
    function updateDateTime2(IDMOV) {
        const dateValue = document.getElementById("mdate2").value;
        const timeValue = document.getElementById("timepicker2").value;
        
        if (dateValue && timeValue) {
            const dateTime = dateValue + ' ' + timeValue;

            document.getElementById("DATAEXTRA2").value = dateTime;

            updateDataDesmontagem(IDMOV);
        }
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


