
	<div class="container-fluid bg-white" id="pagesolicitacao">
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
                <div class="btn-group mb-1">
                    </div>
                        <?php foreach ($data9 as $t): ?>	
                            <a><button  type="button" id="gerarboletim" onclick="adicionarEfeito()" class="btn btn-primary light px-3"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF Boletim</button></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item b-none">		
		        <div class="container-fluid" id="pagesolicitacao">
			        <div class="row">				
	                    <div class="card-body">
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



				</div><!-- AQUI FIM DE CADA RDO INSERIDO -->
			</div>

			<?php } ?> <!-- AQUI FIM DE CADA SOLICITAÇÃO INSERIDA -->

		</div>	
	</div>
</div>
</div>
</div>