<?php echo $this->extend('layouts/default') ?>
<?php echo $this->section('content') ?>

<div class="content-body">
    <div class="row container-fluid">

    <!-- BREADCRUMB  -->
    <!-- <div class="row page-titles mt-3">
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
    </div> -->

    <!-- DIV DO PDF A SER GERADO NO QUAL TRAZ DA DIRETA PARA ESQUERDA UMA TELA PARA EMISSÃO DA BOLETA  -->
    <div id="gerarpdfdiv">
        <button type="button" class="btn btn-danger light" onclick="removerEfeito()" id="fecharboletimpdf">Fechar</button>
        <iframe src="http://45.164.4.254:3275/ReportServer/Pages/ReportViewer.aspx?rs:embed=true&rc:Parameters=false&rc:Zoom=110&%2fGest%c3%a3o+de+Obras%2fSISANDAIMES%2fBoleta_Individual+-+02.0181&rs:Command=Render&IDMOVANDAIME=
        
           <!-- aqui o idmov  -->

            width="100%" height="90%" style="border: none; margin-top:10px;">
        </iframe>
    </div>


    <div class="col-12">
        <div class="card" style="    height: 230px;         width: 100%;    margin-top: -30px !important;">
            <div class="card-body" style="max-height: 210px;">

                <!-- CARD COM METRAGEM -->
                <div class="profile" style="margin-top: -44px;">
                    <div class="pt-4 border-bottom-1 pb-3 row">
                        <!-- <h4 class="form-label"><code3>Medidas </code3></h4> -->
                        <p class="mb-2">

                            <!-- INDICADOR METRAGEM TOTAL DO ANDAIME  -->
                            <div class="col-3">
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
                                                <!-- <small>** Representa % do total</small> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="widget-stat card bg-success">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="fa fa-area-chart"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Metragem Cúbica</p>
                                                <h3 class="text-white"><?php echo $data9->SAMF_MTG_MTCUBIC ?? 0; ?></h3>
                                                <div class="progress mb-2 bg-primary">
                                                    <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                                </div>
                                                <!-- <small>** Representa % do total</small> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">Status Atual</h4>

                                    <?php
                                        $status = $data9->STATUS;
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
                                                $status_text = 'Status desconhecido'; 
                                                break;
                                        }
                                        ?>
                                        <p><?php echo $status_text ?? '?';?></p> 


                                    <h4 class="text-primary mb-0">Data Montagem</h4>
                                    <p><?php echo $data9->DATA_MONTAGEM ?? '*'; ?></p>
                                    <h4 class="text-primary mb-0">Data Desmontagem</h4>
                                    <p><?php echo $data9->DATA_DESMONTAGEM ?? '*'; ?></p>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">Encarregado TOP</h4>
                                    <p><?php echo $data9->NOME_ENCARREGADO ?? '*'; ?></p>
                                    <h4 class="text-primary mb-0">Número OS TOP</h4>
                                    <p><?php echo $data9->IDMOV ?? '*'; ?></p>
                                    <h4 class="text-primary mb-0">Diferença Metragem</h4>
                                    <p>*</p>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">Gerência</h4>
                                    <p><?php echo $data9->SAMF_CLI_GERENCIA ?? '*'; ?></p>
                                    <h4 class="text-primary mb-0">Área</h4>
                                    <p><?php echo $data9->SAMF_CLI_AREANV1_NOME ?? '*'; ?></p>
                                    <h4 class="text-primary mb-0">Revisar</h4>
                                    <p><?php echo $data9->SAMF_MTG_PROXIMAREV ?? '*'; ?></p>
                                </div>
                            </div>

                        </p>
                    </div>
                </div>

              
              
               
                <!-- <div class="dropdown ms-auto">
                    <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                        <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
                        <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                        <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                    </ul>
                </div> -->





            </div>
        </div>
    </div>

    <!-- ABAIXO NOVA FORMA DE POSTAR ANDAIME COM ITENS  -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#infogerais" data-bs-toggle="tab" class="nav-link">Informações Gerais</a>
                            </li>
                            <li class="nav-item">
                                <a href="#equipamentos" data-bs-toggle="tab" class="nav-link">Equipamentos e Medidas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#my-posts" data-bs-toggle="tab" class="nav-link">Imagens</a>
                            </li>
                            <li class="nav-item">
                                <a href="#my-loc" data-bs-toggle="tab" class="nav-link">Localização</a>
                            </li>
                            <li class="nav-item">
                                <a href="#my-rev" data-bs-toggle="tab" class="nav-link">Revisão</a>
                            </li>
                            <li class="nav-item">
                                <a href="#my-obs" data-bs-toggle="tab" class="nav-link">Observações</a>
                            </li>
                        </ul>
                        <div class="tab-content">



                            <!-- INFORMAÇÕES GERAIS -->
                            <div id="infogerais" class="tab-pane fade">
                                <div class="infogerais pt-3">
                                    <div class="">

                                    <?php foreach($data9 as $p) ?>

                                        <div class="row">
                                        
                                            <!-- <h4 class="form-label"><code3>Dados da Montagem </code3></h4>	 -->
                                            <div class="col-xl-3 col-xxl-3 col-md-6">                                          

                                                <div class="col mt-3">
                                                    <label class="form-label">Data Montagem</label>
                                                    <input id="mdate" onchange="updateDateTime(<?php echo $data9->IDMOV; ?>)" name="" width="100%" class="form-control form-control-sm" value="<?php echo $data9->DATA_MONTAGEM; ?>"/>
                                                </div>
                                                <div class="col mt-3">
                                                    <label class="form-label">Data Desmontagem</label>
                                                    <input id="mdate2" onchange="updateDateTime2(<?php echo $data9->IDMOV; ?>)" name="" width="100%" class="form-control form-control-sm" value="<?php echo $data9->DATA_DESMONTAGEM; ?>"/>
                                                </div>

                                                <div class="col mt-3">
                                                    <label class="form-label">Previsão Data Montagem</label>
                                                    <input id="mdate3" onchange="updateDateTime3(<?php echo $data9->IDMOV; ?>)" name="" width="100%" class="form-control form-control-sm" value="<?php echo $data9->SAMF_MTG_PREVMTG; ?>"/>
                                                </div>

                                                <div class="col mt-3">
                                                    <label class="form-label">Previsão Data Desmontagem</label>
                                                    <input id="mdate4" onchange="updateDateTime4(<?php echo $data9->IDMOV; ?>)" name="" width="100%" class="form-control form-control-sm" value="<?php echo $data9->SAMF_MTG_PREVDES; ?>"/>
                                                </div>

                                                <div class="col mt-3">
                                                    <input  width="100%" hidden id="DATAEXTRA1" class="form-control bg-light" disabled value="<?php echo $data9->DATA_MONTAGEM ? : ''; ?>"/>
                                                </div>

                                                <div class="col mt-3">
                                                    <label class="form-label">QR CODE </label>
                                                    <input id="SAMF_CLI_QRCODE" width="100%" value ="<?php echo $data9->SAMF_CLI_QRCODE; ?>" class="form-control form-control-sm" placehoolder = "0001" type="number" onchange="updateQrCode(<?php echo $data9->IDMOV; ?>)"/>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-xxl-3 col-md-6 ">                                               

                                                <div class="col mt-3">
                                                    <label class="form-label">Hora Montagem</label>
                                                    <input class="form-control form-control-sm" onchange="updateDateTime(<?php echo $data9->IDMOV; ?>)" id="timepicker" placeholder="00:00" value="<?php echo $data9->HORA_MONTAGEM ? : '00:00'; ?> ">
                                                </div>

                                                <div class="col mt-3">
                                                    <label class="form-label">Hora Desmontagem</label>
                                                    <input class="form-control form-control-sm" onchange="updateDateTime2(<?php echo $data9->IDMOV; ?>)" id="timepicker2" placeholder="00:00" value="<?php echo $data9->HORA_DESMONTAGEM ? : '00:00'; ?> ">
                                                </div>

                                                <div class="col mt-3">
                                                    <label class="form-label">Prev Hora Montagem</label>
                                                    <input class="form-control form-control-sm" onchange="updateDateTime3(<?php echo $data9->IDMOV; ?>)" id="timepicker3" placeholder="00:00" value="<?php echo $data9->HORA_PREV_MTG ? : '00:00'; ?> ">
                                                </div>

                                                <div class="col mt-3">
                                                    <label class="form-label">Prev Hora Desmontagem</label>
                                                    <input class="form-control form-control-sm" onchange="updateDateTime4(<?php echo $data9->IDMOV; ?>)" id="timepicker4" placeholder="00:00" value="<?php echo $data9->HORA_PREV_DES ? : '00:00'; ?> ">
                                                </div>

                                                <div class="col mt-3">
                                                    <input  width="100%" hidden id="DATAEXTRA2" class="form-control bg-light" disabled value="<?php echo $data9->HORA_MONTAGEM ?  : ''; ?>"/>
                                                </div>

                                                <div class="col mt-3">
                                                    <input  width="100%" hidden id="SAMF_MTG_PREVMTG" class="form-control bg-light" disabled value="<?php echo $data9->HORA_MONTAGEM ?  : ''; ?>"/>
                                                </div>

                                                <div class="col mt-3">
                                                    <input  width="100%" hidden id="SAMF_MTG_PREVDES" class="form-control bg-light" disabled value="<?php echo $data9->HORA_MONTAGEM ?  : ''; ?>"/>
                                                </div>


                                                
                                                <div class="col mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Status do Andaime </label>
                                                        <!-- <p>Selecione os <code>produtos</code> </p> -->
                                                    </div>  
                                                    <select class="form-select border-dark" name = "STATUS" id = "STATUSMONTAGEM"  aria-label="Default select example" onchange="updateStatus(<?php echo $data9->IDMOV; ?>)">		
                                                        
                                                            <?php
                                                            $status = $data9->STATUS;
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
                                                        
                                                                
                                                        <option value="A">Iniciar</option> 		
                                                        <option value="G">Em montagem</option> 
                                                        <option value="F">Montado</option> 		
                                                        <option value="B">Desmontado</option> 				
                                                    </select>
                                                </div>

                                            </div>
                                            
                                            


                                            <div class="col-xl-6 col-xxl-6 col-md-12">
                                                <div class="card-body">
                                                    <form>
                                                        <label class="form-label">Andaime Aterrado</label>
                                                        <div class="mb-3 mb-0">
                                                            <label class="radio-inline me-3">
                                                                <input type="radio" name="optradio" id="aterradosim" onchange="updateAmbienteAterrado(<?php echo $data9->IDMOV; ?>)" <?php echo ($data9->SAMF_VS_ATERRADO == 1) ? 'checked' : ''; ?>> Sim
                                                            </label>
                                                            <label class="radio-inline me-3">
                                                                <input type="radio" name="optradio" id="aterradonao" onchange="updateAmbienteAterrado(<?php echo $data9->IDMOV; ?>)" <?php echo ($data9->SAMF_VS_ATERRADO == 2) ? 'checked' : ''; ?>> Não
                                                            </label>
                                                        </div>
                                                    </form>

                                                    <form>
                                                        <label class="form-label">Ambiente</label> 
                                                        <div class="mb-3 mb-0">
                                                            <label class="radio-inline me-3">
                                                                <input type="radio" name="optradio" id="ambienteinterno" onchange="updateAmbienteAterrado(<?php echo $data9->IDMOV; ?>)" <?php echo ($data9->SAMF_VS_AMBIENTE == 1) ? 'checked' : ''; ?>> Externo
                                                            </label>
                                                            <label class="radio-inline me-3">
                                                                <input type="radio" name="optradio" id="ambienteexterno" onchange="updateAmbienteAterrado(<?php echo $data9->IDMOV; ?>)" <?php echo ($data9->SAMF_VS_AMBIENTE == 2) ? 'checked' : ''; ?>> Interno
                                                            </label>
                                                        </div>
                                                    </form>

                                                    <form>
                                                        <label class="form-label">Contexto</label> 
                                                        <div class="mb-3 mb-0">
                                                        <?php
                                                            $checkedparada1 = ($data9->SAMF_CLI_PARADA == 1) ? 'checked' : '';
                                                            $checkedparada2 = ($data9->SAMF_CLI_PARADA == 2) ? 'checked' : '';
                                                            ?>

                                                            <label class="radio-inline me-3">
                                                                <input type="radio" name="optradio" id="parada1<?php echo $data9->IDMOV; ?>" <?php echo $checkedparada1; ?> onclick="updateParada(<?php echo $data9->IDMOV; ?>, 1)"> Parada
                                                            </label>

                                                            <label class="radio-inline me-3">
                                                                <input type="radio" name="optradio" id="parada2<?php echo $data9->IDMOV; ?>" <?php echo $checkedparada2; ?> onclick="updateParada(<?php echo $data9->IDMOV; ?>, 2)"> Pré-parada
                                                            </label>

                                                            <!-- <label class="radio-inline me-3"><input type="radio" name="optradio" id="parada1<?php echo $data9->IDMOV; ?>"  onclick="updateParada(<?php echo $data9->IDMOV; ?>,1)">  Parada </label>
                                                            <label class="radio-inline me-3"><input type="radio" name="optradio" id="parada2<?php echo $data9->IDMOV; ?>" onclick="updateParada(<?php echo $data9->IDMOV; ?>,2)"> Pré-parada </label> -->
                                                        </div>
                                                    </form>

                                                    <div class="col mt-1">
                                                        <label class="form-label">Gerência</label>
                                                        <input class="form-control form-control-sm" onchange="updateGerencia(<?php echo $data9->IDMOV; ?>)" id="SAMF_CLI_GERENCIA" value="<?php echo $data9->SAMF_CLI_GERENCIA ? : ''; ?> ">
                                                    </div>

                                                    <div class="col mt-1">
                                                        <label class="form-label">Observações sobre a montagem </label>
                                                        <input id="SAMF_CLI_BMOBS" width="100%" value ="<?php echo $data9->SAMF_CLI_BMOBS; ?>" class="form-control" placehoolder = "0001" type="text" onchange="updateOBS(<?php echo $data9->IDMOV; ?>)"/>
                                                    </div>

                                                    <div class="col mt-1">
                                                            <label class="form-label">Área nível 1</label> 
                                                        <select onchange="updateNV1(<?php echo $data9->IDMOV; ?>)" class="form-select border-dark" name = "SAMF_CLI_AREANV1" id = "SAMF_CLI_AREANV1"  aria-label="Default select example">		
                                                        <option value="<?php echo $data9->SAMF_CLI_AREANV1; ?>">ÁREA ATUAL - <?php echo $data9->SAMF_CLI_AREANV0_NOME; ?> - <?php echo $data9->SAMF_CLI_AREANV1_NOME; ?></option>

                                                                    
                                                            <?php foreach ($areas as $areasitem): ?>

                                                                <?php if ($areasitem['NIVEL'] == 1): ?>
                                                                    <option value="<?php echo $areasitem['ID']; ?>" data-idnivelacima="<?php echo $areasitem['IDNIVELACIMA']; ?>"> <?php echo $areasitem['NOME_NIVELACIMA']; ?> - <?php echo $areasitem['NOME_AREA']; ?></option>
                                                                <?php endif; ?>
                                                                
                                                            <?php endforeach; ?>


                                                        </select>
                                                    </div>
                                                    

                                                </div>


                                                    
                                             

                                                


                                            </div>

                                                    


                                            

                                        </div>







                                        
                                    </div>
                                </div>
                            </div>
                            <!-- FIM INFORMAÇÕES GERAIS  -->


                            
                            <div id="my-posts" class="tab-pane fade">
                                <div class="my-post-content pt-3">
                                    <div class="">
                                        <!-- <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>  -->
                                        <!-- <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#linkModal"><i class="fa fa-link m-0"></i> </a> -->
                                        <!-- Modal -->
                                        <!-- <div class="modal fade" id="linkModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Social Links</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a class="btn-social facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                                        <a class="btn-social google-plus" href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
                                                        <a class="btn-social linkedin" href="javascript:void(0)" ><i class="fab fa-linkedin"></i></a>
                                                        <a class="btn-social instagram" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                                                        <a class="btn-social twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                                        <a class="btn-social youtube" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                                        <a class="btn-social whatsapp" href="javascript:void(0)"><i class="fab fa-whatsapp"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#cameraModal"><i class="fa fa-camera m-0"></i> </a>
                                        
                                        <div class="modal fade" id="cameraModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Upload imagens e arquivos</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-group mb-3">

                                                            
                                                                <form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="idmov" value="<?php echo $data9->IDMOV; ?>">
                                                                    <input type="hidden" name="FLUXO" value="4">
                                                                    <label for="imageFiles">Selecione as imagens:</label><br>
                                                                    <input type="file" name="files[]" multiple accept=".jpg, .png"><br><br>
                                                                    <input type="submit" value="Enviar">
                                                                </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">Post</a> -->
                                      
                                        <!-- <div class="modal fade" id="postModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Post</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
                                                            <a class="btn btn-primary btn-rounded" href="javascript:void(0)">Post</a>																		 
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                        <img src="<?php echo base_url('public/assets/images/profile/8.jpg'); ?>" alt="" class="img-fluid w-100 rounded">
                                        <a class="post-title" href="<?php echo site_url('/post-details'); ?>"><h3 class="text-black">Collection of textile samples lay spread</h3></a>
                                        <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                            of spare which enjoy whole heart.</p>
                                        <button class="btn btn-primary me-2"><span class="me-2"><i
                                                    class="fa fa-heart"></i></span>Like</button>
                                        <button class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i
                                                    class="fa fa-reply"></i></span>Reply</button>
                                    </div> -->


                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="form-label">Fotos do Andaime Montado</h4>
                                            </div>
                                            <div class="card-body pb-1">
                                                <!-- <div class="card-body">
                                                    <div class="basic-form custom_file_input">															
                                                        <form action="<?php echo base_url('uploadimagem'); ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="idmov" value="<?php echo $data9->IDMOV; ?>">
                                                            <input type="hidden" name="FLUXO" value="4">
                                                            <label for="imageFiles">Selecione as imagens:</label><br>
                                                            <input type="file" name="files[]" multiple accept=".jpg, .png"><br><br>
                                                            <input type="submit" value="Enviar">
                                                        </form>
                                                    </div>
                                                </div>	 -->
                                                <div id="lightgallery" class="row" style="max-width: 1200px;">
                                                    <?php foreach ($data7 as $img): ?>
                                                        <?php if ($img['IDMOV'] == $data9->IDMOV): ?> 
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
                            </div>


                            <!-- TAB LOCALIZAÇÃO  -->
                            <div id="my-loc" class="tab-pane fade">
                                <div class="my-post-content pt-3">                                       
                                    <div class="col">
                                        <div class="card-body">
                                            <label class="form-label">Localização </label>
                                            <div class="input-group">
                                                <input id="SAMF_CLI_LOCANDAIME" type="text" class="form-control" >
                                                <button class="btn btn-primary" type="button" onclick="localizacao(<?php echo $data9->IDMOV; ?>)">Salvar</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group" id="mapa" style="margin-top:-35px;">									
                                                <?php echo $data9->SAMF_CLI_LOCANDAIME2; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM TAB PARA LOCALIZAÇÃO  -->



                            <!-- TAB LOCALIZAÇÃO  -->
                            <div id="my-rev" class="tab-pane fade">
                                <div class="my-post-content pt-3">                                       
                                    <div class="col">
                                        <div class="card-body">
                                        <label class="form-check-label" for="ap2">Última revisão em: <?php echo $data9->SAMF_MTG_ULTIMAREV; ?> <br> Próxima revisão em: <?php echo $data9->SAMF_MTG_PROXIMAREV; ?></label>
                                            <!-- <label class="form-label">Revisões </label> -->
                                            
                                                <div class="col-6 mt-3">
                                                    <!-- <label class="form-label">Última Revisão</label>
                                                    <input id="mdate5" onchange="updateDateTime4_old(<?php echo $data9->IDMOV; ?>)" name="" width="100%" class="form-control form-control-sm" value="<?php echo $data9->SAMF_MTG_PREVDES; ?>"/> -->
                                               
                                                    <label class="form-label">Revisado em</label>
                                                    <input id="revisadoem"  name="" width="100%" class="form-control form-control-sm"/>
                                                    <label class="form-label mt-2">Próxima revisão</label>
                                                    <input id="proximarevisao"  name="" width="100%" class="form-control form-control-sm"/>

                                                </div>
                                        </div>
                                        <div class="card-body">

                                                <div class="mb-3">
                                                    <label class="form-check-label" for="ap2">Observações</label>
                                                    <textarea class="form-control" id="observacaorevisao" rows="3"></textarea>
                                                    <div class="form-check custom-checkbox mb-3 check-xs">
                                                        <!-- <input type="checkbox" class="form-check-input"  id="contextocomentario" checked> -->
                                                        <!-- <label class="form-check-label" for="ap2">Registro de </label> -->
                                                    </div>
                                                    <button id="btnrevisao" type="button" class="btn btn-primary btn-sm mt-1" onclick="enviarrevisao(<?= $data9->IDMOV; ?>,10)"> Salvar </button>         
                                                </div>

                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header border-0 pb-0">
                                                            <h4 class="card-title">Histórico de Revisões</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height1000 ps ps--active-y">
                                                                <ul class="timeline">								
                                                                    <?php foreach ($comentarios as $cmt): ?>
                                                                        <?php if ($cmt['IDMOV'] == $data9->IDMOV && $cmt['FLUXO'] == 10): ?> 
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
                                </div>
                            </div>
                            <!-- FIM TAB PARA LOCALIZAÇÃO  -->




                            <!-- TAB OBSERVAÇÕES  -->
                            <div id="my-obs" class="tab-pane fade">
                                <div class="my-post-content pt-3">
                                    
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
                                                <button id="btncomentario" type="button" class="btn btn-primary btn-sm mt-1" onclick="enviarcomentariotwo(<?= $data9->IDMOV; ?>,101)"> Enviar </button>         
                                            </div>

                                            

                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">Histórico de observações</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height370 ps ps--active-y">
                                                            <ul class="timeline">								
                                                                <?php foreach ($comentarios as $cmt): ?>
                                                                    <?php if ($cmt['IDMOV'] == $data9->IDMOV && $cmt['FLUXO'] == 101): ?> 
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



                                    
                                </div>
                            </div>
                            <!-- FIM TAB PARA OBSERVAÇÕES  -->

                            </div><!-- NÃO REMOVER SE NÃO QUEBRA O LAYOUT NÃO SEI O PQ FIQUEI COM PREGUIÇA DE ANALISAR -->


                            <div id="equipamentos" class="tab-pane fade">
                                
                                
                                <div class="profile-personal-info">
                                    <!-- <h4 class="form-label"><code3>Equipamentos </code3></h4> -->
                                    <button type="button" class="btn btn-primary light btn-xs mb-1 mt-3" onclick="insertItens(<?php echo $data9->IDMOV; ?>)"><i class="fa fa-plus"></i> Salvar Informações </button>
                                                                        
                                    
                                    <div class="row mb-2">
                                        <div class="col mt-3">
                                            <label class="form-label">Altura </label>
                                            <input id="alturamontagemPL"  width="100%" class="form-control" value="<?php echo $data9->SAMF_MTG_ALTURA; ?>"  onchange="updateDimAndaimePL(<?php echo $data9->IDMOV; ?>)"/>
                                        </div>

                                        <div class="col mt-3">
                                            <label class="form-label">Largura </label>
                                            <input  id="larguramontagemPL"  width="100%" class="form-control" value="<?php echo $data9->SAMF_MTG_LARGURA; ?>" placehoolder = "TOP 2024" onchange="updateDimAndaimePL(<?php echo $data9->IDMOV; ?>)"/>
                                        </div>
                                        
                                        <div class="col mt-3">
                                            <label class="form-label">Comprimento</label>
                                            <input  id="comprimentomontagePL" width="100%" class="form-control" value="<?php echo $data9->SAMF_MTG_COMPRIMENTO; ?>"  onchange="updateDimAndaimePL(<?php echo $data9->IDMOV; ?>)"/>
                                        </div>
                                    

                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="basic-list-group">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-xl-2">
                                                                <div class="list-group mb-4 " id="list-tab" role="tablist">                                                                    
                                                                    <a class="list-group-item list-group-item-action active" id="list-tubo-list" data-bs-toggle="list" href="#list-tubo" role="tab">Tubo</a>
                                                                    <a class="list-group-item list-group-item-action" id="list-travessa-list" data-bs-toggle="list" href="#list-travessa" role="tab">Travessa</a>
                                                                    <a class="list-group-item list-group-item-action" id="list-poste-list" data-bs-toggle="list" href="#list-poste" role="tab">Poste</a>                                                                      
                                                                    <a class="list-group-item list-group-item-action" id="list-diagonal-list" data-bs-toggle="list" href="#list-diagonal" role="tab">Diagonal</a>  
                                                                    <a class="list-group-item list-group-item-action" id="list-longarina-list" data-bs-toggle="list" href="#list-longarina" role="tab">Longarina</a>
                                                                    <a class="list-group-item list-group-item-action" id="list-perfil-list" data-bs-toggle="list" href="#list-perfil" role="tab">Perfil</a>
                                                                    <a class="list-group-item list-group-item-action" id="list-rodape-list" data-bs-toggle="list" href="#list-rodape" role="tab">Rodapé</a>  
                                                                    <a class="list-group-item list-group-item-action" id="list-pranchao-list" data-bs-toggle="list" href="#list-pranchao" role="tab">Pranchão</a>   
                                                                    <a class="list-group-item list-group-item-action" id="list-acessorios-list" data-bs-toggle="list" href="#list-acessorios" role="tab">Acessórios</a>                                         
                                                                </div>
                                                            </div>
                                                            

                                                            
                                                            <div class="col-lg-6 col-xl-10">
                                                                <div class="tab-content" id="nav-tabContent">
                                                                    <div class="tab-pane fade show active" id="list-tubo">
                                                                        <h4 class="mb-4">Tubos</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'TUBOS'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    <div class="tab-pane fade" id="list-travessa" role="tabpanel">
                                                                        <h4 class="mb-4">Travessa</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'TRAVESSA'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    <div class="tab-pane fade" id="list-poste" role="tabpanel">
                                                                        <h4 class="mb-4">Poste</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'POSTE'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    </div><div class="tab-pane fade" id="list-diagonal" role="tabpanel">
                                                                        <h4 class="mb-4">Diagonal</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'DIAGONAL'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    </div><div class="tab-pane fade" id="list-longarina" role="tabpanel">
                                                                        <h4 class="mb-4">Longarina</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'LONGARINA'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    </div><div class="tab-pane fade" id="list-perfil" role="tabpanel">
                                                                        <h4 class="mb-4">Perfil</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'PERFIL'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    </div><div class="tab-pane fade" id="list-rodape" role="tabpanel">
                                                                        <h4 class="mb-4">Rodapé</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'RODAPÉ MADEIRA'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    </div><div class="tab-pane fade" id="list-pranchao" role="tabpanel">
                                                                        <h4 class="mb-4">Pranchão</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'PRANCHÃO MADEIRA'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                    </div><div class="tab-pane fade" id="list-acessorios" role="tabpanel">
                                                                        <h4 class="mb-4">Acessórios</h4>
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
                                                                                                    <!-- <th>Diâmetro REMOVER</th> -->
                                                                                                    <!-- <th>Largura</th> -->
                                                                                                    <th>Lançado</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Quantidade</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php foreach ($itensAndaimes as $itens): ?>
                                                                                                    <?php if (isset($itens['GRUPO']) && $itens['GRUPO'] == 'GERAL'): ?>
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle" width="35" src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['IDPRD']; ?></strong></a></td>
                                                                                                        <td><a href="javascript:void(0);"><strong><?php echo $itens['NOMEFANTASIA']; ?></strong></a></td>
                                                                                                        <td><?php echo $itens['COMPRIMENTO']; ?></td>
                                                                                                        <!-- <td><?php echo $itens['DIAMETRO']; ?></td> -->
                                                                                                        <!-- <td><?php echo $itens['LARGURA']; ?></td> -->
                                                                                                        <td><?php echo $itens['QUANTIDADE']; ?></td>
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
                                                                                                    <?php endif; ?>  
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
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIM POSTAGEM DO ANDAIME COM ITENS  -->

                                </div>
                                    
                            </div>
                        </div>
                            
                            
                    </div>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="replyModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <textarea class="form-control" rows="4">Mensagem</textarea>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-primary">Compartilhar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
		// var IDMOV2 = idmovorigem;
		

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
		// var IDMOV2 = idmovorigem;
		

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


<!-- ABAIXO ATUALIZANDO GERÊNCIA  --> 
<script>
    function updateGerencia(IDMOV) {

		var SAMF_CLI_GERENCIA = document.getElementById('SAMF_CLI_GERENCIA').value;
		
		console.log('Dados a serem enviados:', SAMF_CLI_GERENCIA, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOV2 = idmovorigem;
		

        var dados = {
			"SAMF_CLI_GERENCIA": SAMF_CLI_GERENCIA,
			"IDMOV": IDMOV,	
        };


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('updateGerencia'); ?>', {
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
		// var IDMOV2 = idmovorigem;
		

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
		// var IDMOV2 = idmovorigem;
		

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
    // Selecionar os campos de entrada
    var alturaInput = document.getElementById('alturamontagemPL');
    var larguraInput = document.getElementById('larguramontagemPL');
    var comprimentoInput = document.getElementById('comprimentomontagePL');

    // Formatar os valores antes de capturá-los
    formatarCampo(alturaInput);
    formatarCampo(larguraInput);
    formatarCampo(comprimentoInput);

    // Obter os valores formatados
    var SAMF_MTG_ALTURA = alturaInput.value;
    var SAMF_MTG_LARGURA = larguraInput.value;
    var SAMF_MTG_COMPRIMENTO = comprimentoInput.value;

    // Calcular o valor cúbico
    var SAMF_MTG_MTCUBIC = parseFloat(SAMF_MTG_ALTURA) * parseFloat(SAMF_MTG_LARGURA) * parseFloat(SAMF_MTG_COMPRIMENTO);
    var SAMF_MTG_MTCUBIC_VARCHAR = SAMF_MTG_MTCUBIC.toFixed(2); // Garantir o formato como string

    // Dados para envio
    var dados = {
        "SAMF_MTG_ALTURA": SAMF_MTG_ALTURA,
        "SAMF_MTG_LARGURA": SAMF_MTG_LARGURA,
        "SAMF_MTG_COMPRIMENTO": SAMF_MTG_COMPRIMENTO,
        "SAMF_MTG_MTCUBIC": SAMF_MTG_MTCUBIC_VARCHAR,
        "IDMOV": IDMOV,    
    };

    console.log('Dados a serem enviados:', dados);

    // Envio via fetch
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
            toastr.success("Registro incluído com sucesso", "TOP Andaimes", { /* Configurações do toastr */ });
        } else {
            console.error('Erro ao inserir registro:', data.message);
            toastr.error("Erro ao executar comando", "Tente novamente", { /* Configurações do toastr */ });
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        toastr.error("Erro ao executar comando", "Tente novamente", { /* Configurações do toastr */ });
    });
}

// Função para formatar o campo
function formatarCampo(input) {
    var valor = input.value;
    // Remover qualquer caractere que não seja número ou ponto
    valor = valor.replace(/[^\d.]/g, '');
    // Adicionar a formatação desejada (duas casas decimais)
    if (valor) {
        valor = parseFloat(valor).toFixed(2);
    }
    input.value = valor;
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
		// var IDMOV2 = idmovorigem;
		

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
		// var IDMOV2 = idmovorigem;
		

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







<script>
    function updatePrevDataMontagem(IDMOV) {

		var SAMF_MTG_PREVMTG = document.getElementById('SAMF_MTG_PREVMTG').value;		
		console.log('Dados a serem enviados:', SAMF_MTG_PREVMTG, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOV2 = idmovorigem;
		

        var dados = {
			"SAMF_MTG_PREVMTG": SAMF_MTG_PREVMTG,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updatePrevDataMontagem'); ?>', {
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
    function updatePrevDataDesmontagem(IDMOV) {

		var SAMF_MTG_PREVDES = document.getElementById('SAMF_MTG_PREVDES').value;		
		console.log('Dados a serem enviados:', SAMF_MTG_PREVDES, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOV2 = idmovorigem;
		

        var dados = {
			"SAMF_MTG_PREVDES": SAMF_MTG_PREVDES,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updatePrevDataDesmontagem'); ?>', {
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
		// var SAMF_CLI_AREANV2 = document.getElementById('SAMF_CLI_AREANV2').value;	
		console.log('Dados a serem enviados:', SAMF_CLI_AREANV1, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOV2 = idmovorigem;
		

        var dados = {
			"SAMF_CLI_AREANV1": SAMF_CLI_AREANV1,
			// "SAMF_CLI_AREANV2": SAMF_CLI_AREANV2,
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
		// var IDMOV2 = idmovorigem;
		

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
		// var IDMOV2 = idmovorigem;
		

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
		// var IDMOV2 = idmovorigem;
		

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
		// var IDMOV2 = idmovorigem;
		

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
		var IDMOV2 = idmovorigem;
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
			'IDMOV2': idmovorigem,
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
    function enviarcomentariotwo(idmovorigem, fluxo) {
        var CODCOLIGADA = 1;
        var IDMOV = idmovorigem;
        var COMENTARIO = document.getElementById('comentarioconteudo').value;

        var btncomentario = document.getElementById('btncomentario');        
        btncomentario.disabled = true;
        
        var areacomentario = document.getElementById('comentarioconteudo');
        areacomentario.readOnly = true;

        var CONTEXTO = document.getElementById('contextocomentario')?.checked ? 2 : 1;

        // VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (!COMENTARIO) {
            toastr.warning("Comentário vazio!", "Observações", {
                positionClass: "toast-top-right",
                timeOut: 5e3
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
                    timeOut: 5e3
                });
                btncomentario.disabled = false;
                document.getElementById('comentarioconteudo').value = '';
                areacomentario.readOnly = false;

                // Chame a função para adicionar o comentário na timeline usando os dados reais
                adicionarComentario(new Date().toLocaleString(), "<?php echo isset($sessionData['USUARIO']) ? $sessionData['USUARIO'] : ''; ?>", COMENTARIO);

            } else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3
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
                timeOut: 5e3
            });
            btncomentario.disabled = false;
            btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
            areacomentario.readOnly = false;
        });
    }

    // Função para adicionar o comentário na timeline
    function adicionarComentario(dataHora, usuario, comentario) {
        var li = document.createElement("li");
        var divBadge = document.createElement("div");
        divBadge.className = "timeline-badge primary";

        var a = document.createElement("a");
        a.className = "timeline-panel text-muted";
        a.href = "#";

        var span = document.createElement("span");
        span.textContent = dataHora;

        var h6Usuario = document.createElement("h6");
        h6Usuario.className = "mb-0";
        h6Usuario.innerHTML = `Usuário: <strong class="text-primary">${usuario}</strong>`;

        var h6Comentario = document.createElement("h6");
        h6Comentario.className = "mb-0";
        h6Comentario.textContent = `Comentário: ${comentario}`;

        a.appendChild(span);
        a.appendChild(h6Usuario);
        a.appendChild(h6Comentario);

        li.appendChild(divBadge);
        li.appendChild(a);

        var ul = document.querySelector(".timeline");
        ul.appendChild(li);
    }
</script>



<!-- ABAIXO ENVIO DE REVISÃO  -->
<script>
    
    function enviarrevisao(idmovorigem, fluxo) {

        // ATUALIZANDO A DATA
        function updateDataRevisao(idmovorigem) {

            var SAMF_MTG_ULTIMAREV = document.getElementById('revisadoem').value;	
            var SAMF_MTG_PROXIMAREV = document.getElementById('proximarevisao').value;		

            var dados = {
                "SAMF_MTG_ULTIMAREV": SAMF_MTG_ULTIMAREV,
                "SAMF_MTG_PROXIMAREV": SAMF_MTG_PROXIMAREV,
                "IDMOV": IDMOV,	
            };

            fetch('<?php echo base_url('updateDataRevisao'); ?>', {
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
                        positionClass: "toast-bottom-left"
                    });
                
                } else {
                    console.error('Erro ao inserir registro:', data.message);
                    toastr.error("Erro ao executar comando", "Tente novamente", {
                        positionClass: "toast-bottom-right"
                    });
                }
            })
            .catch(error => {
                console.error('Erro ao enviar dados:', error);
                // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-top-right"
                });
            });
        }


        var CODCOLIGADA = 1;
        var IDMOV = idmovorigem;
        var COMENTARIO = document.getElementById('observacaorevisao').value;
		var DATAREVISAO = document.getElementById('revisadoem').value;
        var DATAPROXIMAREVISAO = document.getElementById('proximarevisao').value;	

        // VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (!DATAREVISAO  || !DATAPROXIMAREVISAO ) {
            toastr.warning("Campo não preenchido!", "DATAS REVISÃO", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
            btnrevisao.disabled = false;
            btnrevisao.innerHTML = "<i class='fa fa-reply'></i> Salvar";
            areacomentario.readOnly = false;
            return; 
        }
        if (!COMENTARIO) {
            toastr.warning("Campo não preenchido!", "COMENTÁRIO", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
            btnrevisao.disabled = false;
            btnrevisao.innerHTML = "<i class='fa fa-reply'></i> Salvar";
            areacomentario.readOnly = false;
            return; 
        }        
        
        function adicionarRevisao(comentario, dataRevisao) {
            return "<br><p>[ROTINA REVISÃO DE ANDAIME] - Revisado em: " 
            + dataRevisao 
            + "<br><p>Próxima revisão: " + DATAPROXIMAREVISAO
            + "<br><p> [COMENTÁRIO] - " + comentario;
        }

        let COMENTARIOFINAL = adicionarRevisao(COMENTARIO, DATAREVISAO);

        var btnrevisao = document.getElementById('btnrevisao');        
        btnrevisao.disabled = true;
        
        var areacomentario = document.getElementById('observacaorevisao');
        areacomentario.readOnly = true;

        // var CONTEXTO = document.getElementById('contextocomentario')?.checked ? 2 : 1;
        var CONTEXTO = 1; // TRATANDO COMO EXTERNO document.getElementById('contextocomentario')?.checked ? 2 : 1;        

        var dados = {
            "IDMOV": IDMOV,
            "CODCOLIGADA": CODCOLIGADA,
            "COMENTARIO": COMENTARIOFINAL,
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
                    timeOut: 5e3
                });
                updateDataRevisao(IDMOV);

                btnrevisao.disabled = false;
                document.getElementById('comentarioconteudo').value = '';
                areacomentario.readOnly = false;

                // Chame a função para adicionar o comentário na timeline usando os dados reais
                adicionarComentario(new Date().toLocaleString(), "<?php echo isset($sessionData['USUARIO']) ? $sessionData['USUARIO'] : ''; ?>", COMENTARIO);

            } else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3
                });
                btnrevisao.disabled = false;
                btnrevisao.innerHTML = "<i class='fa fa-reply'></i> Salvar";
                areacomentario.readOnly = false;
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
            btnrevisao.disabled = false;
            btnrevisao.innerHTML = "<i class='fa fa-reply'></i> Salvar";
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


<!-- VALOR DO PRÓXIMO NSEQ -->
<input type="hidden" name="NSEQITMMOV" id="NSEQITMMOV" value="<?= esc($NSEQITMMOV) ?>">


<!-- SCRIPT PARA INSERIR OS ITENS  --> 
<script>
    function insertItens(IDMOV) {
        
        // var botaordosalvar_js = document.getElementById('botaordosalvar3');
		// botaordosalvar_js.disabled = true;
        // botaordosalvar_js.innerHTML = "Enviando Edição!";

        var NSEQITMMOV = document.getElementById('NSEQITMMOV').value;
        var tabelaItens = [];      
        var tabelaItensUpdate = []; 
        var rows = document.querySelectorAll('#tabelaItens tbody tr');

		
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
            // var DIAMETRO = row.cells[4].textContent.trim();   
            // var LARGURA = row.cells[5].textContent.trim();
            var QUANTIDADE = row.cells[6].querySelector('input').value.trim();
            var STATUS = row.cells[7].querySelector('input').value.trim();  
        
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
                    COMPRIMENTO: COMPRIMENTO
                    // DIAMETRO: DIAMETRO,
                    // LARGURA: LARGURA
                });

                // INCREMENTANDO PARA PODER GERAR O VALOR DO PRÓXIMO ITEM 
                NSEQITMMOV++; 
            }

            // ABAIXO VALIDO SE O ITEM JÁ EXISTE CONSIDERANDO O STATUS = "S" E PEGANDO TUDO QUE EXISTE E ATUALIZANDO 
            if (STATUS === 'S' || QUANTIDADE != '') {
                tabelaItensUpdate.push({
                    IDMOV: IDMOV,
                    IDPRD: IDPRD,
                    QUANTIDADE: QUANTIDADE
                    // DIAMETRO: DIAMETRO,
                    // LARGURA: LARGURA
                });

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



<script>
    function updateDateTime3(IDMOV) {
        const dateValue = document.getElementById("mdate3").value;
        const timeValue = document.getElementById("timepicker3").value;

        if (dateValue && timeValue) {
            const dateTime = dateValue + ' ' + timeValue;
            document.getElementById("SAMF_MTG_PREVMTG").value = dateTime;

            // Após atualizar o valor de DATAEXTRA1, chama a função para enviar os dados
            updatePrevDataMontagem(IDMOV);
        }
    }
</script>


<script>
    function updateDateTime4(IDMOV) {
        const dateValue = document.getElementById("mdate4").value;
        const timeValue = document.getElementById("timepicker4").value;

        if (dateValue && timeValue) {
            const dateTime = dateValue + ' ' + timeValue;
            document.getElementById("SAMF_MTG_PREVDES").value = dateTime;

            // Após atualizar o valor de DATAEXTRA1, chama a função para enviar os dados
            updatePrevDataDesmontagem(IDMOV);
        }
    }
</script>





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





<!-- SCRIPT PARA MANTER A ÚLTIMA ABA ABERTA AO ATUALIZAR A PÁGINA  -->
<script> 
    document.addEventListener("DOMContentLoaded", function () {
        // Verifica se há uma aba salva no localStorage
        const lastTab = localStorage.getItem("lastTab");

        if (lastTab) {
            // Remove a classe 'active show' de todas as abas
            document.querySelectorAll('.nav-link').forEach(tab => tab.classList.remove('active', 'show'));

            // Ativa a aba salva no localStorage
            const tabToActivate = document.querySelector(`a[href="${lastTab}"]`);
            if (tabToActivate) {
                tabToActivate.classList.add('active', 'show');
                const tabContent = document.querySelector(lastTab);
                if (tabContent) {
                    tabContent.classList.add('active', 'show');
                }
            }
        }

        // Adiciona um evento a todas as abas para salvar no localStorage quando clicadas
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function () {
                const selectedTab = this.getAttribute('href');
                localStorage.setItem("lastTab", selectedTab);
            });
        });
    });
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


