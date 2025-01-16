<?php echo $this->extend('layouts/default') ?>
<?php echo $this->section('content') ?>

<div class="content-body">
	
	<!-- ABAIXO ICONES DO MENU -->
	<div class="container-fluid mb-3 bg-white" id="menusc">		
		<i class="flaticon-381-search-2"  aria-expanded="false"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"></i>
		<!-- <i class="fa fa-plus" role="button"></i> -->
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
		<div class="col-xl-12 col-xxl-12">

		<!-- INICIO DE CADA SOLICITAÇÃO INSERIDA -->
		
		<?php foreach($resultado as $p){ ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
					<div class="row" styler="margin-left:20px;">
						<div class="col-12">         
							<button style="margin-left: 10px;" type="button" class="btn btn-warning  me-2 mb-2 btn-xxs" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One<?php echo $p['IDMOV']; ?>" aria-controls="collapse2One<?php echo $p['IDMOV']; ?>"   aria-expanded="false"  role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
							<button id="enviarvisita2<?php echo $p['IDMOV']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="postprojeto(<?php echo $p['IDMOV']; ?>)"><i class="fa fa-reply"></i></button>                                  
										
						</div>
					</div> 

					<!-- MODAL COM O MENU PARA TRANSFERIR DE ENCARREGADO
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
					</div>-->

					<!-- MODAL COM O MENU PARA CANCELAR A VISITA -->
					<!-- <div class="modal fade" id="modalcancelarvisita">
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
					</div>  -->

					<!-- MODAL ENVIAR PARA PROJETO OU ENCARREGADO -->
					<!-- <div class="modal fade" id="modalenviarprojeto">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Enviar para projeto/planejamento</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<p>Mensagem indicando que será enviado para Projeto/Planejamento</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
									<button id="enviarvisita<?php echo $p['IDMOV']; ?>" value="<?php echo $p['IDMOV']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="postprojeto(<?php echo $p['IDMOV']; ?>)"><i class="fa fa-reply"> Enviar Projeto</i></button>
								</div>
							</div>
						</div>
					</div> -->

					
                    <div class="card-header">
                        <h5>Solicitação TOP: <small><?php echo $p['IDMOV']; ?>  </small></h5>
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
								<div class="accordion-header  rounded-lg d-none">
									<span class="accordion-header-text">Preencher informações</span>
									<span class="accordion-header-indicator"></span>
								</div>
								<div id="collapse2One<?php echo $p['IDMOV']; ?>" class="collapse show accordion__body" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
								
								
								<div class="accordion accordion-primary" id="accordion-one">
									<!-- ACCORDION DOS DADOS DE ENTRADA -->
									<div class="accordion-item">
										<!-- <button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalcancelarvisita"><i class="fa fa-times" aria-hidden="true"></i></button>	 -->
										<!-- <button type="button" class="btn btn-info  me-2 mb-2 btn-xxs" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fas fa-user-check"></i></button>								 -->
										<div class="accordion-header  rounded-lg text-center" id="hd1<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd1<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd1<?php echo $p['IDMOV']; ?>"   aria-expanded="false" role="button">
											<span class="accordion-header-icon"></span>
											<span class="accordion-header-text">Dados de Entrada</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd1<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd1<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one<?php echo $p['IDMOV']; ?>">
											<div class="accordion-body-text">
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada1<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada1<?php echo $p['IDMOV']; ?>">Andaime Apoiado </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada2<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada2<?php echo $p['IDMOV']; ?>">Andaime Suspenso</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada3<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada3<?php echo $p['IDMOV']; ?>">Andaime Balanço</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada4<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada4<?php echo $p['IDMOV']; ?>">Andaime Pau de carga </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada5<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada5<?php echo $p['IDMOV']; ?>">Escoramento em viga</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada6<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada6<?php echo $p['IDMOV']; ?>">Escoramento em laje</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada7<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada7<?php echo $p['IDMOV']; ?>">Escoramento de equipamento </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada8<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada8<?php echo $p['IDMOV']; ?>">Travamento próprio andaime</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada9<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada9<?php echo $p['IDMOV']; ?>">Travamento em estruturas</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada10<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada10<?php echo $p['IDMOV']; ?>">Avaliação Estrutural </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada11<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada11<?php echo $p['IDMOV']; ?>">Linha de Vida</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada12<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada12<?php echo $p['IDMOV']; ?>">Espaço Confinado</label>
														</div>
													</div>												
												</div>
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada13<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada13<?php echo $p['IDMOV']; ?>">Necessário bloqueio do equipamento </label>
														</div>
													</div>																
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input  type="checkbox" class="form-check-input" id="dadosdeentrada14<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="dadosdeentrada14<?php echo $p['IDMOV']; ?>">Local da Montagem é Aberto</label>
														</div>
													</div>												
												</div>
											</div>
										</div>
									</div><!-- FIM ACCORDION DOS DADOS DE ENTRADA -->
								
									<!-- PRÉ PROGRAMAÇÃO -->
									<div class="accordion-item">
										<div class="accordion-header rounded-lg text-center" id="hd2<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd2<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd2<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Pré Programação</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd2<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd2<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
												<div class="row">
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input type="checkbox" class="form-check-input" id="pp1<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="pp1<?php echo $p['IDMOV']; ?>">Necessário Guindaste </label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input type="checkbox" class="form-check-input" id="pp2<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="pp2<?php echo $p['IDMOV']; ?>">Necessário Empilhadeira</label>
														</div>
													</div>
													<div class="col-4">
														<div class="form-check custom-checkbox mb-3 check-xs">
															<input type="checkbox" class="form-check-input" id="pp3<?php echo $p['IDMOV']; ?>">
															<label class="form-check-label" for="pp3<?php echo $p['IDMOV']; ?>">Necessário Caminhão </label>
														</div>
													</div>	
													<div class="col-6">
														<label class="form-label">Tempo de mobilização</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp4<?php echo $p['IDMOV']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>	
													<div class="col-6">
														<label class="form-label">Tempo de desmobilização</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp5<?php echo $p['IDMOV']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>		
													<div class="col-6">
														<label class="form-label">Tempo de montagem</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp6<?php echo $p['IDMOV']; ?>" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>
													<div class="col-6">
														<label class="form-label">Tempo de desmontagem</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="pp7<?php echo $p['IDMOV']; ?>" value="00:00"> 
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
																	<label class="radio-inline me-3"><input type="radio" name="optradio" checked id="pp8<?php echo $p['IDMOV']; ?>"> Baixa </label>
																	<label class="radio-inline me-3"><input type="radio" name="optradio" id="pp9<?php echo $p['IDMOV']; ?>"> Média </label>
																	<label class="radio-inline me-3"><input type="radio" name="optradio" id="pp10<?php echo $p['IDMOV']; ?>"> Alta </label>
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
										<div class="accordion-header rounded-lg text-center" id="hd3<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd3<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd3<?php echo $p['IDMOV']; ?>"  role="button"  aria-expanded="false">
											<span class="accordion-header-text text-center">Dimensões do Andaime</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd3<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd3<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
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
																				<td><input  value = "1" type="text" class="form-control"  id="alturamontagem<?php echo $p['IDMOV']; ?>"></td>
																				<td><input  value="1"type="text" class="form-control" placeholder="0" id="larguramontagem<?php echo $p['IDMOV']; ?>"></td>
																				<td><input  value="1" type="text" class="form-control" placeholder="0" id="comprimentomontagem<?php echo $p['IDMOV']; ?>"></td>
																				<td><input type="text" class="form-control bg-light" disabled placeholder="0"></td>
																				<!-- <td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
																					</div>
																				</td> -->
																			</tr>
																			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
																			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
																			<script>
																				$(document).ready(function(){
																					$('#alturamontagem<?php echo $p['IDMOV']; ?>').on('blur', function() {
																						formatarCampo(this);
																					});

																					$('#larguramontagem<?php echo $p['IDMOV']; ?>').on('blur', function() {
																						formatarCampo(this);
																					});

																					$('#comprimentomontagem<?php echo $p['IDMOV']; ?>').on('blur', function() {
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
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagem<?php echo $p['IDMOV']; ?>"></td>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagem<?php echo $p['IDMOV']; ?>"></td>
																				<td><input value="1" type="text" class="form-control bg-light" disabled placeholder="0" id="alturamontagem<?php echo $p['IDMOV']; ?>"></td>
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
			
									<!-- ACCORDION DAS OBSERVAÇÕES DA VISITA-->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center" id="hd4" data-bs-toggle="collapse" data-bs-target="#collapsehd4<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd4<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Observações</span>
											<span class="accordion-header-indicator"></span>
										</div>
										<div id="collapsehd4<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd4" data-bs-parent="#accordion-one">
											<div class="accordion-body-text">
												<div class="row">
													<div class="mb-4">
														<h4 class="card-title">Observações da visita</h4>
														<!-- <p>Selecione os <code>produtos</code> </p> -->
													</div>
												<div class="mb-3">
													<textarea class="form-control" id="comentarioconteudo<?php echo $p['IDMOV']; ?>" rows="3"></textarea>
													<button id="btncomentario<?php echo $p['IDMOV']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs mt-2" onclick="enviarcomentario(<?php echo $p['IDMOV']; ?>)"><i class="fa fa-reply"> Salvar</i></button>         
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
																	<?php if ($cmt['IDMOV'] == $p['IDMOV']): ?> 
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
															<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 324px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 177px;"></div></div></div>
														</div>
													</div>
												</div><!-- FIM TIMELINE ANDAIME -->
												
											</div>
										</div>
									</div><!-- FIM ACCORDION DAS OBSERVAÇÕES DA VISITA-->

									<!-- INFORMAÇÕES DE ANTEPROJETO -->
									<!-- INFORMAÇÕES DOS ÍTENS A SEREM UTILIZADOS -->
									<div class="accordion-item mt-4">
										<div class="accordion-header rounded-lg text-center" id="hd5<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd5<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
											<span class="accordion-header-text">Informações de Anteprojeto</span>
											<span class="accordion-header-indicator"></span>
										</div>
									<div id="collapsehd5<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd5<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
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
																		<label class="radio-inline me-3"><input type="radio" name="app1" id="app1<?php echo $p['IDMOV']; ?>"> Sim </label>
																		<label class="radio-inline me-3"><input type="radio" name="app1" id="app2<?php echo $p['IDMOV']; ?>"> Não </label>
																	</div>
																</form>
															</div>
																<h4 class="card-title">Detalhe os ítens a serem utilizados</h4>
															<textarea class="form-control" id="detalhamentoitens<?php echo $p['IDMOV']; ?>" rows="3"></textarea>
														</div>
												</div>
															
												<div class="col-6">
													<div class="form-check custom-checkbox mb-3 check-xs">
														<input type="checkbox" class="form-check-input"  id="ap2off<?php echo $p['IDMOV']; ?>" required>
														<label class="form-check-label" for="ap2<?php echo $p['IDMOV']; ?>">Necessita de memória de cálculo</label>
													</div>
												</div>					
											</div>
										</div>
									</div><!-- FIM INFORMAÇÕES DE ANTEPROJETO -->



						<!-- DESENHO A SER CRIADO -->
						<!-- <div class="accordion-item mt-4">
							<div class="accordion-header rounded-lg text-center" id="hd5<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd5<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd5<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
								<span class="accordion-header-text">Anexo Croqui</span>
								<span class="accordion-header-indicator"></span>
							</div>
						<div id="collapsehd5<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd5<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
							<div class="accordion-body-text">
								<div class="row">
									
								<h1>Croqui</h1>
								<canvas id="drawingCanvas" width="500" height="500"></canvas>
									<input type="hidden" name="idmov" id="IDMOVCROQUI" value="<?php echo $p['IDMOV']; ?>">
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
									<div class="accordion-header rounded-lg text-center" id="hd6<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd6<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd6<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
										<span class="accordion-header-text">Documentos Anexos</span>
										<span class="accordion-header-indicator"></span>
									</div>
									<div id="collapsehd6<?php echo $p['IDMOV']; ?>" class="collapse show" aria-labelledby="hd6<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
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
																<?php if ($img['IDMOV'] == $p['IDMOV']): ?> 
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
																<input type="hidden" name="idmov" value="<?php echo $p['IDMOV']; ?>">
																<input type="hidden" name="FLUXO" value="2">
																<label for="imageFiles">Selecione as imagens:</label><br>
																<input type="file" name="files[]" multiple accept=".jpg, .png"><br><br>
																<input class="btn btn-primary btn-sm" type="submit" value="Enviar">
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
																<?php if ($img['IDMOV'] == $p['IDMOV']): ?> 
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
									<div class="accordion-header rounded-lg text-center" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="false">
										<span class="accordion-header-text">Aprovação</span>
										<span class="accordion-header-indicator"></span>
									</div>
									<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
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
			var checkboxes = document.querySelectorAll('input[type="checkbox"]');
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



<!-- ENVIA COMENTÁRIO  -->
<script>
    function enviarcomentario(idmovorigem) {
        var codccusto = '02.0181.00'; 
		var CODCOLIGADA = 1;
		var FLUXO = 2;
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