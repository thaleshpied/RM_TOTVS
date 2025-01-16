<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>

<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
<div class="container-fluid">

<!-- <img src="<?php echo site_url('/public/assets/images/logo.png'); ?>" alt="image" class="logo-abbr mb-4 mt-4" width="100" height="55" viewBox="0 0 80 80"> -->
    <!-- <div class="brand-title">
        <h2 class="">TOP</h2>
        <span class="brand-sub-title">SIS ANDAIMES</span>
    </div> -->


    <!-- BREADCRUMB DA PÁGINA -->
    <!-- <div class="row page-titles mt-4 text-center">
        <ol class="breadcrumb text-center">
            <li class="breadcrumb-item active"><a href="">Aprovação do RDO número: <?php echo $data9->NUMEROMOV; ?> - Referente ao dia: <?php echo $data9->DATA_REFERENCIA; ?></a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Aprovação de RDO <small>- Referência: <?php echo $data9->DATA_REFERENCIA; ?></small></a></li>
        </ol>
    </div> -->

    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:history.back()">RDO</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Aprovação de RDO <small>- Referência: <?php echo $data9->DATA_REFERENCIA; ?></small></a></li>
        </ol>
    </div>
    
    <input type="hidden" name="DATAREFERENCIAEMAIL" id="DATAREFERENCIAEMAIL" value="<?php echo isset($data9->DATA_REFERENCIA) ? $data9->DATA_REFERENCIA : ''; ?>">
        

 



    <!-- MENU PRINCIPAL DA PÁGINA -->
    <div class="container-fluid" id="pagesolicitacao">
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
                <!-- <div class="btn-group mb-1">
                    <button type="button" class="btn btn-primary light px-3"   aria-expanded="false"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
                    <button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="false"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i> Adicionar RDO</button>
                </div> -->
                <!-- <div class="btn-group mb-1">
                    <button type="button" class="btn btn-primary light dropdown-toggle v show" data-bs-toggle="dropdown" aria-expanded="true">More <span class="caret m-l-5"></span>
                    </button>
                    <div class="dropdown-menu show" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 49.2px);"> <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                        <a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                    </div>
                </div> -->
                <div class="btn-group mb-1">
                    <div class="btn-group mb-1 nav">
                        <!-- <button type="button" class="btn btn-primary light px-3" id="btnaprovar" data-bs-toggle="modal" data-bs-target="#aprovarrdo" data-id="aprovarrdo"><i class="fa fa-reply"></i> Aprovar</button>
                        <button type="button" class="btn btn-danger light px-3" id="btnreprovar" data-bs-toggle="modal" data-bs-target="#reprovarrdo" data-id="reprovarrdo"><i class="fa fa-times"></i> Reprovar</button> -->
                        <!-- <button type="button" class="btn btn-primary light px-3" class="nav-link active" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-2"><i class="fa fa-times"></i> Reprovar </button> -->
                        <!-- <button href="#navpills2-3" type="button" class="btn btn-primary light px-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false" data-bs-target="#navpills2-3">Aprovados</button> -->
                    
                        <?php
                        
                            $status = $data9->STATUS; 
                            
                            if ($status === 'G') {
                                ?>
                                    <button type="button" class="btn btn-primary light px-3" id="btnaprovar" data-bs-toggle="modal" data-bs-target="#aprovarrdo" data-id="aprovarrdo"><i class="fa fa-reply"></i> Aprovar</button>
                                    <button type="button" class="btn btn-danger light px-3" id="btnreprovar" data-bs-toggle="modal" data-bs-target="#reprovarrdo" data-id="reprovarrdo"><i class="fa fa-times"></i> Reprovar</button>
                                <?php
                                
                                } elseif ($status === 'F') {
                                ?>   
                                    <button type="button" class="btn btn-warning  px-3" >Aguardando aprovação cliente</button>                                     
                                    
                                <?php
                                
                                } else {
                                ?>
                                    <p>Sem ações disponíveis para o RDO atual.</p>
                                <?php
                            }
                        ?>



</div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PARA APROVAÇÃO -->
    <div class="modal fade" id="aprovarrdo">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aprovação de RDO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja aprovar o RDO?</p>

                    <div class="form-check custom-checkbox mb-3 check-xs">
                        <input type="checkbox" class="form-check-input"  id="contextocomentario" checked>
                        <label class="form-check-label" for="ap2">Comentário Interno</label>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" id="comentarioconteudo" rows="3"></textarea>
                        <button id="btncomentario" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs mt-2" onclick="enviarcomentario(<?= $IDMOV; ?>,2,2)">Enviar</button>         
                    </div>


                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" 
                    onclick="atualizaStatusRDO(<?php echo $data9->IDMOV; ?>,'F',<?php echo $data9->NUMEROMOV; ?>,1,'RDO','ATENDIMENTO','AP','<?php echo $data9->DATA_REFERENCIA; ?>')"  
                        id="btnaprovarmodal">
                        Sim, enviar!
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PARA REPROVAÇÃO -->
    <div class="modal fade" id="reprovarrdo">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reprovação de RDO - <small>Tem certeza que deseja aprovar o RDO?</small></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <h5>
                        <small>
                        <p>A reprovação retorna o RDO para o encarregado ajustar informações. 
                        É necessário justificar a reprovação!</p>
                        </small>
                    </h5>
                   

                    <div class="mb-3">
                        <textarea class="form-control" id="comentarioconteudoreprov" rows="3"></textarea>
                        <button id="btncomentario" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs mt-2" onclick="enviarcomentarioreprov(<?= $IDMOV; ?>,2,1)">Enviar</button>         
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
                    <!-- <button id="btnreprovarmodal" disabled type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="gestorreprovarRDO(<?php echo $data9->IDMOV; ?>)">Sim, reprovar!</button> -->

                    <button id="btnreprovarmodal" disabled type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="atualizaStatusRDO(<?php echo $data9->IDMOV; ?>,'B',<?php echo $data9->NUMEROMOV; ?>,1,'RDO','ATENDIMENTO','RP','<?php echo $data9->DATA_REFERENCIA; ?>')" >Sim, reprovar!
                    </button>

                </div>
            </div>
        </div>
    </div>





    <!-- DADOS DO RDO ANTIGO QUE DEVEM IR PARA O MODAL DO NOVO RDO	 -->
    <div class="card-body">
        <div class="col-xl-12 col-xxl-12 row">
                        <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4 class="card-title">Solicitação inicial </h4>
                                </div>  
                                <select class="form-control border-dark" name = "idmovsolicitacao" id = "idmovsolicitacao"  aria-label="Default select example">					
                                    <option value="">opções</option> 								
                                </select>
                            </div>
                        </div>	 -->
                        

                        <div class="col-12">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4 class="card-title">Responsável TOP: <small><?php echo $data9->RESPONSAVEL_TOP; ?></small></h4>
                                    <h4 class="card-title">Responsável Cliente: <small><?php echo $data9->RDO_RESPONSAVEL_CLI2; ?></small></h4>
                                    <h4 class="card-title">Área nível 1: <small><?php echo $data9->SAMF_CLI_AREANV1; ?></small></h4>
                                        <?php
                                        $status = $data9->TIPOSOLICITACAO;
                                        $status_textipo = '';

                                        switch ($status) {
                                            case '1':
                                                $status_textipo = 'Planejada';
                                                break;
                                            case '2':
                                                $status_textipo = 'Emergencial';
                                                break;
                                            case '3':
                                                $status_textipo = 'Orçamentação';
                                                break;
                                            
                                            default:
                                                $status_textipo = ''; 
                                                break;
                                        }
                                        ?>
                                    <h4 class="card-title">Tipo Solicitação: <small><?php echo $status_textipo; ?></small></h4>
                                    <?php
                                                $status = $data9->RDO_TURNO;
                                                $status_text = '';

                                                switch ($status) {
                                                    case '1':
                                                        $status_text = 'Dia';
                                                        break;
                                                    case '2':
                                                        $status_text = 'Noite';
                                                        break;                                          
                                                    default:
                                                        $status_text = ''; 
                                                        break;
                                                }
                                            ?>
                                    <h4 class="card-title">Turno de trabalho: <small><?php echo $status_text; ?></small></h4>
                                </div>  
                            </div>
                        </div>	

                    
                    

                        <!-- <div class="col-xl-3 col-xxl-4 col-md-6">
                            <div class="card-body">
                                <h4 class="card-title">Área nível 2<code2>*</code2></h4> 
                                <input id="SAMF_CLI_AREANV2" width="100%" class="form-control" type="text"/>
                            </div>
                        </div> -->

                                                                    
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

                                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked10 = ($data9->SAMF_VS_MONTAGEM == 1) ? 'checked' : '';?>
                                                            <input disabled id="SAMF_VS_MONTAGEM" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked10; ?>>
                                                            <label class="form-check-label" for="customCheckBox6">Montagem de Andaimes </label>
                                                        </div>
                                                    </div>
                                                                
                                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked11 = ($data9->SAMF_VS_DESMONTAGEM == 1) ? 'checked' : '';?>
                                                            <input disabled id="SAMF_VS_DESMONTAGEM" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked11; ?>>
                                                            <label class="form-check-label" for="customCheckBox6">Desmontagem de Andaimes</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked12 = ($data9->SAMF_VS_MOBILIZACAO == 1) ? 'checked' : '';?>
                                                            <input disabled id="SAMF_VS_MOBILIZACAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked12; ?>>
                                                            <label class="form-check-label" for="customCheckBox6">Mob. E Desmobilização de Material</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked13 = ($data9->SAMF_VS_ADEQUACAO == 1) ? 'checked' : '';?>
                                                            <input disabled id="SAMF_VS_ADEQUACAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked13; ?>>
                                                            <label class="form-check-label" for="customCheckBox6">Adequação</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked14 = ($data9->SAMF_VS_MANUTENCAO == 1) ? 'checked' : '';?>
                                                            <input disabled id="SAMF_VS_MANUTENCAO" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked14; ?>>
                                                            <label class="form-check-label" for="customCheckBox6">Manutenção</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4 col-lg-4 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked15 = ($data9->SAMF_VS_ATICIVIL == 1) ? 'checked' : '';?>
                                                            <input disabled id="SAMF_VS_ATICIVIL" type="checkbox" class="form-check-input"  id="customCheckBox6" required <?php echo $checked15; ?>>
                                                            <label class="form-check-label" for="customCheckBox6">Atividade Civil</label>
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
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked1 = ($data9->SAMF_VS_INTERFER1 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos1" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked1; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Interferência c/ Outra Atividade </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked2 = ($data9->SAMF_VS_INTERFER2 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos2" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked2; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Operação Não Liberou Atividade</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked3 = ($data9->SAMF_VS_INTERFER3 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos3" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked3; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Transferência para outra Atividade </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked4 = ($data9->SAMF_VS_INTERFER4 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos4" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked4; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Chuva</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked5 = ($data9->SAMF_VS_INTERFER5 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos5" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked5; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Vento Forte</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked6 = ($data9->SAMF_VS_INTERFER6 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos6" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked6; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Local Inseguro P/ Executar Ativ</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked7 = ($data9->SAMF_VS_INTERFER7 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos7" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked7; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Falta do Responsável Bloqueio</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked8 = ($data9->SAMF_VS_INTERFER8 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos8" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked8; ?>>
                                                            <label class="form-check-label" for="customCheckBox9">Falta de Energia</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-3 col-md-6">
                                                        <div class="form-check custom-checkbox mb-3 check-xs">
                                                            <?php $checked9 = ($data9->SAMF_VS_INTERFER9 == 1) ? 'checked' : '';?>
                                                            <input disabled id="impactos9" type="checkbox" class="form-check-input"  id="customCheckBox9" required <?php echo $checked9; ?>>
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
                <span class="accordion-header-text">Atividades em Horário Comum</span>
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
                                        <th><strong>Tempo de trabalho</strong></th>
                                        <th><strong></strong></th>
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
                                                <input disabled type="text" class="form-control bg-light" id="horaentrada" value="<?php echo $f['RDO_FUNC_ENTRADA']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>

                                            </div>
                                        </td>
                                        <td>											
                                            <div class="input-group">
                                                <input disabled type="text" class="form-control bg-light" id="horasaida" value="<?php echo $f['RDO_FUNC_SAIDA']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </td>
                                        <td>											
                                            <div class="input-group">
                                                <input disabled type="" class="form-control bg-light" id="QUANTIDADENORMAL" value="<?php echo $f['TOTAL_HORAS_REALIZADAS']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
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
                            <!-- <button id="addRow" class="btn btn-primary">Adicionar Funcionário</button> -->
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
                                        <th><strong>Tempo de trabalho</strong></th>
                                        <th><strong></strong></th>
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
                                                <input type="text" class="form-control" id="horaentrada" value="<?php echo $f['RDO_FUNC_ENTRADA']; ?>" readonly>
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </td>
                                        <td>											
                                            <div class="input-group">
                                                <input readonly type="text" class="form-control" id="horasaida" value="<?php echo $f['RDO_FUNC_SAIDA']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </td>
                                        <td>											
                                            <div class="input-group">
                                                <input readonly type="" class="form-control" id="QUANTIDADENORMAL" value="<?php echo $f['TOTAL_HORAS_REALIZADAS']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
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
                            <!-- <button id="addRow" class="btn btn-primary">Adicionar Funcionário</button> -->
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
                    <?php endif; ?>
                    
                    
        </div>

        <div class="accordion-item" id="horaextrasimaccordion" >
            <div class="accordion-header rounded-lg  collapsed text-center" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
                <span class="accordion-header-text">Atividades em Horário Extra</span>
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
                            <table id="dynamicTable_extra" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Matrícula</strong></th>
                                        <th><strong>Nome</strong></th>
                                        <th><strong>Função</strong></th>
                                        <th><strong>Entrada</strong></th>
                                        <th><strong>Saída</strong></th>
                                        <th><strong>Tempo de trabalho</strong></th>
                                        <th><strong></strong></th>
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
                                                <input type="text" class="form-control" id="horaentrada" value="<?php echo $f['RDO_FUNC_ENTRADA']; ?>">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>

                                            </div>
                                        </td>
                                        <td>											
                                            <div class="input-group">
                                                <input readonly type="text" class="form-control" id="horasaida" value="<?php echo $f['RDO_FUNC_SAIDA']; ?>"><span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </td>
                                        <td>											
                                            <div class="input-group">
                                                <input readonly type="" class="form-control bg-light" id="QUANTIDADENORMAL" value=""><span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp remove-row"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- <button id="addRow" class="btn btn-primary">Adicionar Funcionário</button> -->
                        </div>
                    </div>
                </div>
            </div>			
        </div>

        








</div>
</div>
</div><!-- FIM DO ACORDION INTERNO DE CADA RDO CRIADO --> 	


<!-- ACCORDION DAS OBSERVAÇÕES DA VISITA-->
<div class="accordion-item mt-4">
    <div class="accordion-header rounded-lg text-center collapsed" id="hd4" data-bs-toggle="collapse" data-bs-target="#collapsehd4" aria-controls="collapsehd4"   role="button" aria-expanded="false">
        <span class="accordion-header-text">Observações</span>
        <span class="accordion-header-indicator"></span>
    </div>
    <div id="collapsehd4" class="collapse show" aria-labelledby="hd4" data-bs-parent="#accordion-one">
        <div class="accordion-body-text">
            <div class="row">
                <!-- <div class="mb-4">
                    <h4 class="card-title">Comentários / Ocorrências</h4>
                </div> -->
            <div class="mb-3">
                <textarea class="form-control" id="comentarioconteudotwo" rows="3"></textarea>
                <div class="form-check custom-checkbox mb-3 check-xs">
                    <input type="checkbox" class="form-check-input"  id="contextocomentariotwo" checked>
                    <label class="form-check-label" for="ap2">Comentário Interno</label>
                </div>
                <button id="btncomentariotwo" type="button" class="btn btn-primary btn-sm mt-1" onclick="enviarcomentariotwo(<?= $IDMOV; ?>,5,2)"> Enviar </button>         
            </div>

            

            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header border-0 pb-0">
                        <h4 class="card-title">Histórico de observações</h4>
                    </div> -->
                    <div class="card-body">
                        <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height400 ps ps--active-y">
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

                                            <a class="timeline-panel text-muted">
                                                <span><?php echo $cmt['RECCREATEDON'];?>
                                                
                                                <?php if ($cmt['CONTEXTO'] == 2): ?> 
                                                    
                                                    - COMENTÁRIO INTERNO	
                                                <?php endif; ?>
                                                
                                                </span>
                                                <h6 class="mb-0">Usuário: <strong class="text-primary"><?php echo $cmt['RECCREATEDBY'];?></strong></h6>
                                                <h6 id="comentariotexto<?php echo $cmt['ID'];?>" class="mb-0">Comentário: <?php echo $cmt['COMENTARIO'];?></h6>
                                                <button class="btn btn-primary btn-sm mt-1 mt-5"  onclick="copiarComentario(<?php echo $cmt['ID'];?>)" href="#comentarioconteudotwo">
                                                <i class="fa fa-files-o" aria-hidden="true"></i>
                                                </button>
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



        <!-- EVIDÊNCIAS COMO FOTOS E ANEXOS SOBRE AS MONTAGENS  -->
        <div class="accordion-header rounded-lg  collapsed text-center mt-5" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="false">
                <span class="accordion-header-text">Evidências das Atividades</span>
                <span class="accordion-header-indicator"></span>
            </div>
            
            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
                <div class="accordion-body-text">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- ABAIXO NOVA OPÇÃO DE IMAGENS -->
                            <div class="row"> 
                                <?php foreach ($data7 as $img): ?>
                                <?php if ($img['IDMOV'] == $data9->IDMOV && $img['FLUXO'] == 1152): ?>                                
                                <div class="col-xl-4 col-lg-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">                                            
                                            <div class="new-arrival-product">
                                                <!-- <button style="position: absolute;margin-left: -49px;margin-top: 6px;font-size: 14px;" type="button" class="btn btn-outline-danger  me-2 mb-2 btn-xxs"  role="button" onclick="deleteIMG('<?php echo $img['NOMEARQUIVO']; ?>')">
                                                    <i class="fa fa-window-close" aria-hidden="true"></i>
                                                </button> -->
                                                <div class="new-arrivals-img-contnent">
                                                    <img class="img-fluid" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="">
                                                </div>
                                                <div class="new-arrival-content text-center mt-3">
                                                    <h4><a href="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>"></a></h4>
                                                    <!-- <input type="text" onchange="updateNomeIMG('<?php echo $img['NOMEARQUIVO']; ?>')" class="form-control" id="<?php echo $img['NOMEARQUIVO']; ?>" value="<?php echo $img['NOMEARQUIVO_EXIBIR']; ?>"/> -->
                                                    <?php echo $img['NOMEARQUIVO_EXIBIR']; ?>
                                                    <h5 class="text-danger">
                                                        <small>
                                                            <?php 
                                                            echo !empty($img['NOMEARQUIVO_EXIBIR']) ? '' : 'Imagem sem Descrição!'; 
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
                </div>
            </div>
        </div>
        <!-- FIM DO BLOCO DE EVIDÊNCIAS -->





<script>
    function copiarComentario(ID) {
        const comentarioId = 'comentariotexto' + ID;

        console.log(comentarioId);

        const comentarioElemento = document.getElementById(comentarioId);
        if (comentarioElemento) {
            const comentarioTexto = comentarioElemento.innerText.replace('Comentário: ', '');

                const textarea = document.getElementById('comentarioconteudotwo');
            textarea.value = '';

                textarea.value = comentarioTexto;
        } else {
            console.error('Elemento com ID ' + comentarioId + ' não encontrado.');
        }
    }
</script>
















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
    function updateRDO(IDMOV) {
        var tableData = [];        
        var rows = document.querySelectorAll('#dynamicTable tbody tr');
        var rowsExtra = document.querySelectorAll('#dynamicTable_extra tbody tr');
        var horaextraSimCheckbox = document.getElementById('horaextrasim');
        var horaextraSim = horaextraSimCheckbox ? (horaextraSimCheckbox.checked ? 1 : 0) : 0;
		
        var turnodiaCheckbox = document.getElementById('turnodia');
		var turnodia = turnodiaCheckbox ? (turnodiaCheckbox.checked ? 1 : 0) : 0;
		
		var turnonoiteCheckbox = document.getElementById('turnonoite');
		var turnonoite = turnonoiteCheckbox ? (turnonoiteCheckbox.checked ? 1 : 0) : 0;

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

        var NSEQITMMOV = 1; // Inicializa o contador para NSEQITMMOV

        // Captura os valores dos checkboxes de dados de entrada
        var informacoescomplementares = {
            SAMF_VS_INTERFER1: document.getElementById('impactos1')?.checked ? 1 : 0,
            SAMF_VS_INTERFER2: document.getElementById('impactos2')?.checked ? 1 : 0,
            SAMF_VS_INTERFER3: document.getElementById('impactos3')?.checked ? 1 : 0,
            SAMF_VS_INTERFER4: document.getElementById('impactos4')?.checked ? 1 : 0,
            SAMF_VS_INTERFER5: document.getElementById('impactos5')?.checked ? 1 : 0,
            SAMF_VS_INTERFER6: document.getElementById('impactos6')?.checked ? 1 : 0,
            SAMF_VS_INTERFER7: document.getElementById('impactos7')?.checked ? 1 : 0,
            SAMF_VS_INTERFER8: document.getElementById('impactos8')?.checked ? 1 : 0,
            SAMF_VS_INTERFER9: document.getElementById('impactos9')?.checked ? 1 : 0,			
            SAMF_VS_MONTAGEM: document.getElementById('SAMF_VS_MONTAGEM')?.checked ? 1 : 0,
            SAMF_VS_MOBILIZACAO: document.getElementById('SAMF_VS_MOBILIZACAO')?.checked ? 1 : 0,
            SAMF_VS_DESMONTAGEM: document.getElementById('SAMF_VS_DESMONTAGEM')?.checked ? 1 : 0,
            SAMF_VS_ADEQUACAO: document.getElementById('SAMF_VS_ADEQUACAO')?.checked ? 1 : 0,
			IDMOV: IDMOV,
			SAMF_CLI_TIPOSC: parseInt(document.getElementById('SAMF_CLI_TIPOSC').value, 10),
            RDO_RESPONSAVEL_CLI2: document.getElementById('RDO_RESPONSAVEL_CLI2').value,
            RDO_TURNO: RDO_TURNO,
			// SAMF_CLI_TIPOSC_value = parseInt(element.value, 10)
			CODCOLIGADA: 1
        };
		
        // Itera sobre as linhas da tabela principal (dynamicTable)
        rows.forEach(row => {
            var IDPRD = 4366;
			var CODUND = 'UN';
            var PRECOUNITARIO = '1';
            var CODCOLIGADA = 1;
            var INTEGRAAPLICACAO = 'T';
            var PRODUTOSUBSTITUTO = 0;
            var CODTB5FAT = row.cells[0].textContent.trim();
            var nome = row.cells[1].textContent.trim();
            var funcao = row.cells[2].textContent.trim();
            var RDO_FUNC_ENTRADA = row.cells[3].querySelector('input').value.trim();
            var RDO_FUNC_SAIDA = row.cells[4].querySelector('input').value.trim();			
            var quantidade = row.cells[5].querySelector('input').value.trim();
            
            tableData.push({
                IDMOV: IDMOV,
                IDPRD: IDPRD,
				CODUND: CODUND,
                NUMEROSEQUENCIAL: NSEQITMMOV,
                QUANTIDADE: quantidade,
                PRECOUNITARIO: PRECOUNITARIO,
                CODCOLIGADA: CODCOLIGADA,
                INTEGRAAPLICACAO: INTEGRAAPLICACAO,
                PRODUTOSUBSTITUTO: PRODUTOSUBSTITUTO,
                NSEQITMMOV: NSEQITMMOV,
                CODTB5FAT: CODTB5FAT,
                nome: nome,
                funcao: funcao,
                RDO_FUNC_ENTRADA: RDO_FUNC_ENTRADA,
                RDO_FUNC_SAIDA: RDO_FUNC_SAIDA
            });

            NSEQITMMOV++;
        });

        // Verifica se horaextraSim é 1 e adiciona dados de dynamicTable_extra
        if(horaextraSim === 1){
            rowsExtra.forEach(row => {
                var IDPRD = 4363; 
				var CODUND = 'UN';
                var PRECOUNITARIO = '1'; 
                var CODCOLIGADA = 1; 
                var INTEGRAAPLICACAO = 'T'; 
                var PRODUTOSUBSTITUTO = 0; 
                var CODTB5FAT = row.cells[0].textContent.trim();
                var nome = row.cells[1].textContent.trim();
                var funcao = row.cells[2].textContent.trim();
                var RDO_FUNC_ENTRADA = row.cells[3].querySelector('input').value.trim();
                var RDO_FUNC_SAIDA = row.cells[4].querySelector('input').value.trim();	
                var quantidade = row.cells[5].querySelector('input').value.trim();
                
                tableData.push({
                    IDMOV: IDMOV,
                    IDPRD: IDPRD,
					CODUND: CODUND,
                    NUMEROSEQUENCIAL: NSEQITMMOV,
                    QUANTIDADE: quantidade,
                    PRECOUNITARIO: PRECOUNITARIO,
                    CODCOLIGADA: CODCOLIGADA,
                    INTEGRAAPLICACAO: INTEGRAAPLICACAO,
                    PRODUTOSUBSTITUTO: PRODUTOSUBSTITUTO,
                    NSEQITMMOV: NSEQITMMOV,
                    CODTB5FAT: CODTB5FAT,
                    nome: nome,
                    funcao: funcao,
                    RDO_FUNC_ENTRADA: RDO_FUNC_ENTRADA,
                    RDO_FUNC_SAIDA: RDO_FUNC_SAIDA
                });

                NSEQITMMOV++;
            });
        }

        var dados = {
            tableData: tableData,
            informacoescomplementares: informacoescomplementares 
        };

        console.log(dados); 
        // return;

        // Envio via POST
        fetch('<?php echo base_url('insertAtendimentoRDO'); ?>', {
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

                // // Recarrega a página após 1 segundo (opcional)
                // setTimeout(() => {
                //     location.reload();
                // }, 1000);

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
    function updateRDO2(IDMOV) {
        var tableData = [];        
        var rows = document.querySelectorAll('#dynamicTable tbody tr');
        var rowsExtra = document.querySelectorAll('#dynamicTable_extra tbody tr');
        var horaextraSimCheckbox = document.getElementById('horaextrasim');
        var horaextraSim = horaextraSimCheckbox ? (horaextraSimCheckbox.checked ? 1 : 0) : 0;

        var NSEQITMMOV = 1; // Inicializa o contador para NSEQITMMOV
		// var SAMF_CLI_TIPOSC = document.getElementById('SAMF_CLI_TIPOSC').value;
        // Captura os valores dos checkboxes de dados de entrada

        
		var turnodiaCheckbox = document.getElementById('turnodia');
		var turnodia = turnodiaCheckbox ? (turnodiaCheckbox.checked ? 1 : 0) : 0;
		
		var turnonoiteCheckbox = document.getElementById('turnonoite');
		var turnonoite = turnonoiteCheckbox ? (turnonoiteCheckbox.checked ? 1 : 0) : 0;

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


        var informacoescomplementares = {
            SAMF_VS_INTERFER1: document.getElementById('impactos1')?.checked ? 1 : 0,
            SAMF_VS_INTERFER2: document.getElementById('impactos2')?.checked ? 1 : 0,
            SAMF_VS_INTERFER3: document.getElementById('impactos3')?.checked ? 1 : 0,
            SAMF_VS_INTERFER4: document.getElementById('impactos4')?.checked ? 1 : 0,
            SAMF_VS_INTERFER5: document.getElementById('impactos5')?.checked ? 1 : 0,
            SAMF_VS_INTERFER6: document.getElementById('impactos6')?.checked ? 1 : 0,
            SAMF_VS_INTERFER7: document.getElementById('impactos7')?.checked ? 1 : 0,
            SAMF_VS_INTERFER8: document.getElementById('impactos8')?.checked ? 1 : 0,
            SAMF_VS_INTERFER9: document.getElementById('impactos9')?.checked ? 1 : 0,			
            SAMF_VS_MONTAGEM: document.getElementById('SAMF_VS_MONTAGEM')?.checked ? 1 : 0,
            SAMF_VS_MOBILIZACAO: document.getElementById('SAMF_VS_MOBILIZACAO')?.checked ? 1 : 0,
            SAMF_VS_DESMONTAGEM: document.getElementById('SAMF_VS_DESMONTAGEM')?.checked ? 1 : 0,
            SAMF_VS_ADEQUACAO: document.getElementById('SAMF_VS_ADEQUACAO')?.checked ? 1 : 0,
			SAMF_CLI_TIPOSC: parseInt(document.getElementById('SAMF_CLI_TIPOSC').value, 10),
			RDO_RESPONSAVEL_CLI2: document.getElementById('RDO_RESPONSAVEL_CLI2').value,
			IDMOV: IDMOV,
            RDO_TURNO: RDO_TURNO,
			CODCOLIGADA: 1
        };

        // Itera sobre as linhas da tabela principal (dynamicTable)
        rows.forEach(row => {
            var IDPRD = 4366;
            var PRECOUNITARIO = '1';
            var CODCOLIGADA = 1;
            var INTEGRAAPLICACAO = 'T';
            var PRODUTOSUBSTITUTO = 0;
            var CODTB5FAT = row.cells[0].textContent.trim();
            var nome = row.cells[1].textContent.trim();
            var funcao = row.cells[2].textContent.trim();
            var RDO_FUNC_ENTRADA = row.cells[3].querySelector('input').value.trim();
            var RDO_FUNC_SAIDA = row.cells[4].querySelector('input').value.trim();			
            var quantidade = row.cells[5].querySelector('input').value.trim();
            
            tableData.push({
                IDMOV: IDMOV,
                IDPRD: IDPRD,
                NUMEROSEQUENCIAL: NSEQITMMOV,
                QUANTIDADE: quantidade,
                PRECOUNITARIO: PRECOUNITARIO,
                CODCOLIGADA: CODCOLIGADA,
                INTEGRAAPLICACAO: INTEGRAAPLICACAO,
                PRODUTOSUBSTITUTO: PRODUTOSUBSTITUTO,
                NSEQITMMOV: NSEQITMMOV,
                CODTB5FAT: CODTB5FAT,
                nome: nome,
                funcao: funcao,
                RDO_FUNC_ENTRADA: RDO_FUNC_ENTRADA,
                RDO_FUNC_SAIDA: RDO_FUNC_SAIDA
            });

            NSEQITMMOV++;
        });

        // Verifica se horaextraSim é 1 e adiciona dados de dynamicTable_extra
        if(horaextraSim === 1){
            rowsExtra.forEach(row => {
                var IDPRD = 4363; 
                var PRECOUNITARIO = '1'; 
                var CODCOLIGADA = 1; 
                var INTEGRAAPLICACAO = 'T'; 
                var PRODUTOSUBSTITUTO = 0; 
                var CODTB5FAT = row.cells[0].textContent.trim();
                var nome = row.cells[1].textContent.trim();
                var funcao = row.cells[2].textContent.trim();
                var RDO_FUNC_ENTRADA = row.cells[3].querySelector('input').value.trim();
                var RDO_FUNC_SAIDA = row.cells[4].querySelector('input').value.trim();	
                var quantidade = row.cells[5].querySelector('input').value.trim();
                
                tableData.push({
                    IDMOV: IDMOV,
                    IDPRD: IDPRD,
                    NUMEROSEQUENCIAL: NSEQITMMOV,
                    QUANTIDADE: quantidade,
                    PRECOUNITARIO: PRECOUNITARIO,
                    CODCOLIGADA: CODCOLIGADA,
                    INTEGRAAPLICACAO: INTEGRAAPLICACAO,
                    PRODUTOSUBSTITUTO: PRODUTOSUBSTITUTO,
                    NSEQITMMOV: NSEQITMMOV,
                    CODTB5FAT: CODTB5FAT,
                    nome: nome,
                    funcao: funcao,
					RDO_FUNC_ENTRADA: RDO_FUNC_ENTRADA,
					RDO_FUNC_SAIDA: RDO_FUNC_SAIDA
                });
                NSEQITMMOV++;
            });
        }

        var dados = {
            tableData: tableData,
            informacoescomplementares: informacoescomplementares 
        };

        console.log(dados); 
        // return;

        // Envio via POST
        fetch('<?php echo base_url('insertAtendimentoRDO2'); ?>', {
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

                // // Recarrega a página após 1 segundo (opcional)
                // setTimeout(() => {
                //     location.reload();
                // }, 1000);

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





<!-- ENVIAR RDO PARA APROVAÇÃO DO GESTOR TOP  -->
<script>
    function gestoraprovarRDO(IDMOV,USUARIO,CODCCUSTO) {

        
        var ROTINA = 'APROVAÇÃO DE RDO';
        var COMENTARIO = '[INFORMAÇÃO AUTOMÁTICA: APROVAÇÃO DE RDO]';
        var OBSERVACOES = 'Aprovação do RDO IDMOV = ' + IDMOV;
        var STATUS = 'F';
        
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
            "RECCREATEDBY": USUARIO,
            "RECMODIFIEDBY": USUARIO,
            "CODCCUSTO": CODCCUSTO,
            "ROTINA": ROTINA,
            "OBSERVACOES": OBSERVACOES,
            "GERALOG": 1,
            "CONTEXTO": 1,
            "FLUXO": 5,
            "GERACOMENTARIO": 1,
            "COMENTARIO": COMENTARIO,
            "REF": 'B'
        };

        var btnenviaraprovacao2 = document.getElementById('btnaprovar');		
		btnenviaraprovacao2.disabled = true;
        btnenviaraprovacao2.innerHTML = "RDO Aprovado!";


        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

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
                toastr.success("RDO aprovado!", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3
                });

                // AQUI CHAMA A FUNÇÃO PARA ENVIAR E-MAIL
                // enviaremail();

                // setTimeout(datatableRDO, 0);

				btnenviaraprovacao2.disabled = true;
				btnenviaraprovacao2.innerHTML = "RDO Aprovado!";

				// // var newUrl = <?php echo base_url('rdo'); ?> + proximoIDMOVAndaime;

				var newUrl = "<?php echo base_url('rdo/'); ?>";

				setTimeout(function() {
					window.location.href = newUrl;
				}, 3000); // 3000 milissegundos = 3 segundos

                // location.reload();

            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3
                });

				btnenviaraprovacao2.disabled = false;
				btnenviaraprovacao2.innerHTML = "<i class='fa fa-reply'></i> Aprovar";
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
                btnenviaraprovacao2.disabled = false;
                btnenviaraprovacao2.innerHTML = "<i class='fa fa-reply'></i> Aprovar";
        });
    }



	function gestorreprovarRDO(IDMOV,USUARIO,CODCCUSTO) {


        var RECCREATEDBY = USUARIO;
        var RECMODIFIEDBY = USUARIO;
        var CODCCUSTO = CODCCUSTO; 
        var OBSERVACOES = 'Reprovação do RDO IDMOV = ' + IDMOV;
        var ROTINA = 'REPROVAÇÃO DE RDO';


        var STATUS = 'B';
        var dados = {
            "STATUS": STATUS,
            "IDMOV": IDMOV,
            "RECCREATEDBY": RECCREATEDBY,
            "RECMODIFIEDBY": RECMODIFIEDBY,
            "CODCCUSTO": CODCCUSTO,
            "ROTINA": ROTINA,
            "OBSERVACOES": OBSERVACOES,
            "GERALOG": 1,
            "REF": 'B'
        };

        var btnenviaraprovacao2 = document.getElementById('btnaprovar');		
		btnenviaraprovacao2.disabled = true;
        btnenviaraprovacao2.innerHTML = "RDO Aprovado!";


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
                toastr.success("RDO reprovado!", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3
                });

                // setTimeout(datatableRDO, 0);

				btnenviaraprovacao2.disabled = true;
				btnenviaraprovacao2.innerHTML = "RDO Aprovado!";

				var newUrl = "<?php echo base_url('rdo/'); ?>";

				setTimeout(function() {
					window.location.href = newUrl;
				}, 1000); // 3000 milissegundos = 3 segundos




            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3
                });

				btnenviaraprovacao2.disabled = false;
				btnenviaraprovacao2.innerHTML = "<i class='fa fa-reply'></i> Aprovar";
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
                btnenviaraprovacao2.disabled = false;
                btnenviaraprovacao2.innerHTML = "<i class='fa fa-reply'></i> Aprovar";
        });
    }

    // FUNÇÃO PARA ENVIO DE EMAIL
    function enviaremail() {
        const to = document.getElementById('to').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        // const csrfToken = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

        dados = {
            "to": to,
            "subject": subject,
            "message": message
        };

        console.log(dados);
        // return;

        fetch('<?php echo base_url('enviandoemail'); ?>', {
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
                toastr.success("E-mail enviado", "TOP Andaimes", {
               

                    positionClass: "toast-bottom-left",
                    timeOut: 5e3
                });
               // enviarvisita.disabled = true;
				// enviarvisita.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";

				// enviarvisita2.disabled = true;
				// enviarvisita2.innerHTML = "<i class='fa fa-check'></i> Enviado para Projeto!";
				


            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro envio e-mail", "E-MAIL", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3
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
                timeOut: 5e3
            });
			// enviarvisita.disabled = false;
			// 	enviarvisita2.disabled = false;
        });
    }



</script>



<script>
    // FUNÇÃO PARA ENVIO DE EMAIL
    function enviaremail() {
        const to = document.getElementById('to').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        // const csrfToken = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

        dados = {
            "to": to,
            "subject": subject,
            "message": message
        };

        console.log(dados);
        // return;

        fetch('<?php echo base_url('enviandoemail'); ?>', {
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
                    timeOut: 5e3
                });

            } else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3
                });
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
        });
    }

</script>


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

    // funcao para colcoar valor total das horas 
    // // Função para calcular o tempo de trabalho
    // function calculateWorkingTime() {
    //     // Seleciona todas as linhas da tabela
    //     const rows = document.querySelectorAll('#dynamicTable tbody tr');
        
    //     rows.forEach(row => {
    //         // Seleciona os campos de entrada e saída
    //         const entradaInput = row.querySelector('#horaentrada');
    //         const saidaInput = row.querySelector('#horasaida');
    //         const quantidadeNormalField = row.querySelector('#QUANTIDADENORMAL');
            
    //         // Formata os campos de entrada
    //         formatTimeInput(entradaInput);
    //         formatTimeInput(saidaInput);

    //         // Verifica se ambos os campos estão preenchidos
    //         if (entradaInput.value && saidaInput.value) {
    //             // Converte as horas para minutos
    //             const entradaMinutos = convertTimeToMinutes(entradaInput.value);
    //             const saidaMinutos = convertTimeToMinutes(saidaInput.value);
                
    //             // Calcula a diferença
    //             let quantidadeNormal = saidaMinutos - entradaMinutos;
                
    //             // Verifica se a saída é anterior à entrada (caso de turno que cruza a meia-noite)
    //             if (quantidadeNormal < 0) {
    //                 quantidadeNormal += 24 * 60; // Adiciona 24 horas em minutos
    //             }
                
    //             // Atualiza o campo QUANTIDADENORMAL
    //             quantidadeNormalField.value = quantidadeNormal - 60;
    //         }
    //     });
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











<!-- ENVIA COMENTÁRIO  -->
<script>
    function enviarcomentariotwo(idmovorigem, fluxo) {
        var CODCOLIGADA = 1;
        var IDMOV = idmovorigem;
        var COMENTARIO = document.getElementById('comentarioconteudotwo').value;

        var btncomentario = document.getElementById('btncomentariotwo');        
        btncomentario.disabled = true;
        
        var areacomentario = document.getElementById('comentarioconteudotwo');
        areacomentario.readOnly = true;

        var CONTEXTO = document.getElementById('contextocomentariotwo')?.checked ? 2 : 1;

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











<!-- ENVIA COMENTÁRIO  -->
<script>
    function enviarcomentarioreprov(idmovorigem, fluxo, tipo) {
		
        var CODCOLIGADA = 1;
        // var validacao = tipo;

		var IDMOV = idmovorigem;
        
        
        if(tipo == 0){
            
            var COMENTARIO2 = document.getElementById('comentarioconteudo').value;

        }else if (tipo == 1){
            var COMENTARIO2 = document.getElementById('comentarioconteudoreprov').value;
        }		

		var btncomentario = document.getElementById('btncomentario');		
		btncomentario.disabled = true;
		
		// var areacomentario = document.getElementById('comentarioconteudo');
		// areacomentario.readOnly = true;        

        var btnaprovarmodal_js = document.getElementById('btnreprovarmodal');

        var CONTEXTO = document.getElementById('contextocomentario')?.checked ? 2 : 1;

		
        // return;

		
		// VALIDANDO SE OS CAMPOS DE ENTRADA ESTÃO PREENCHIDOS
        if (!COMENTARIO2) {
			
            toastr.warning("Comentário vazio!", "Observações", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3
                });
				btncomentario.disabled = false;
				btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
				areacomentario.readOnly = false;
            return; 
        }


        if (tipo == 0){
        
            
            var COMENTARIO2 = document.getElementById('comentarioconteudo').value;        
            var COMENTARIO = COMENTARIO2 + '<br><br>[INFORMAÇÃO AUTOMÁTICA: COMENTÁRIO DE APROVAÇÃO DE RDO]';


        }else{
        
            var COMENTARIO2 = document.getElementById('comentarioconteudoreprov').value;        
            var COMENTARIO = COMENTARIO2 + '<br><br>[INFORMAÇÃO AUTOMÁTICA: REPROVAÇÃO DE RDO]';
            var CONTEXTO = 2;

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
                // Executa o comando toastr apenas se a resposta do backend for 'success'
                toastr.success("Registro incluído com sucesso", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3
                });
                btnaprovarmodal_js.disabled = false;
				btncomentario.disabled = true;
				btncomentario.innerHTML = "<i class='fa fa-check'></i> Comentário enviado com sucesso. Será apresentado após atualizar a página!";

            } else {
                // Trate o caso em que a resposta do backend não for 'success'
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
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3
            });
			btncomentario.disabled = false;
			btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
			areacomentario.readOnly = false;
        });
    }

	
</script>







<!-- Inclua o jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Inclua o arquivo scripts.js -->
    <script src="scripts.js"></script>
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
				$('#horaextrasimaccordion').show(); 
			} else {
				$('#horaextrasimaccordion').hide(); 
			}
		});
		
		if ($('#horaextrasim').is(':checked')) {
			$('#horaextrasimaccordion').show();
		} else {
			$('#horaextrasimaccordion').hide();
		}
	});
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
                    timeOut: 5e3
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
                    timeOut: 5e3
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
                timeOut: 5e3
            });
			// enviarvisita.disabled = false;
			// 	enviarvisita2.disabled = false;
        });
    }

</script>

<!-- SCRTIP PARA ENVIO DE E-MAIL  -->
<!-- <div class="container">
    <h1 class="mt-5">Enviar E-mail</h1>
    <?php if (session()->getFlashdata('status')): ?>
        <div class="alert alert-info mt-3">
            <?= session()->getFlashdata('status') ?>
        </div>
    <?php endif; ?>
    <form action="<?= site_url('enviandoemail') ?>" method="post" class="mt-4">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="to">Para</label>
            <input type="email" class="form-control" id="to" name="to" required value="thales.piedade@topandaimes.com.br">
        </div>
        <div class="form-group">
            <label for="subject">Assunto</label>
            <input type="text" class="form-control" id="subject" name="subject" value="RDO PENDENTE" required>
        </div>
        <div class="form-group">
            <label for="message">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="4" required>
            <html>
                <body>
                    <h1>Olá,</h1>
                    <p>Este é um <strong>e-mail</strong> com <em>formatação HTML</em>.</p>
                    <p>Atenciosamente,</p>
                    <p><strong>Equipe TOP Andaimes</strong></p>
                </body>
                </html>
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div> -->



    <!-- <textarea name="message">
    <html>
    <body>
        <h1>Olá,</h1>
        <p>Este é um <strong>e-mail</strong> com <em>formatação HTML</em>.</p>
        <p>Atenciosamente,</p>
        <p><strong>Equipe TOP Andaimes</strong></p>
    </body>
    </html>
</textarea>

 -->

<!-- <button style="margin-left:100px;" type="button" class="btn btn-primary" onclick="enviaremail()">Enviar sc</button> -->
 


<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>