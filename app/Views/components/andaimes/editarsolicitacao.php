<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">

				<div class="container-fluid" id="pagesolicitacao">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-xxl-10 col-md-10">
							<div class="btn-group mb-1">
								<button type="button" class="btn btn-primary light px-3"   aria-expanded="true"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
								<button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-primary light px-3"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel"><i type="button" class="fa fa-file-excel-o"></i></button>
							</div>
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
				
                
				<div class="row">
							<div class="card-body">
							
								<div class="col-xl-12 col-xxl-12">

				<?php foreach($resultado as $p): ?>
					<div class="col-12" style="    margin-left: 20px;    margin-top: 20px;    border-top: 1px solid green;    padding-top: 10px;">           
						<button value="<?php echo $p['IDMOV']; ?>" type="button" class="btn btn-primary btn-rounded  me-2 mb-2 btn-xxs" onclick="enviarEdicao(<?php echo $p['IDMOV']; ?>)"><i class="fa fa-reply"></i> Salvar </button>
						<!-- <button type="button" class="btn btn-danger  me-2 mb-2 btn-xxs" id="toasttoastr-danger-top-rightr-success-bottom-info"><i class="fa fa-times" aria-hidden="true"> </i></button> -->
					</div>
					<div class="col-xl-12"><!-- INICIO MENU PARA INSERIR SOLICITAÇÃO -->
                        <div class="container-fluid">                           
							<div class="row"> 
                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">OS cliente <code2>*</code2></h4>
                                            <input id="SAMF_CLI_OS" width="100%" class="form-control bg-light" disabled="" placeholder="<?php echo $p['SAMF_CLI_OS']; ?>"/>
											<input type="hidden" name="idmov" value="<?php echo $p['IDMOV']; ?>">
                                        </div>
                                    </div>	                                   	

                                    <!-- ABAIXO CAMPOS NOVOS --> 
                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Nome da tarefa </h4>
                                            <input id="SAMF_CLI_TEXTO_BREVE" width="100%" class="form-control" type="text" value="<?php echo $p['SAMF_CLI_TEXTO_BREVE']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Descrição da ordem</h4>
                                            <input id="SAMF_CLI_DESC_OP" width="100%" class="form-control" type="text" value="<?php echo $p['SAMF_CLI_DESC_OP']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Observações </h4>
                                            <input id="SAMF_OBSERVACAO" width="100%" class="form-control" type="text" value="<?php echo $p['SAMF_OBSERVACAO']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">TAG </h4>
                                            <input id="SAMF_CLI_TAG" width="100%" class="form-control" type="text" value="<?php echo $p['SAMF_CLI_TAG']; ?>"/>
                                        </div>
                                    </div>  

                                    <div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Área nível 1<code2>*</code2></h4> 
                                            </div>  
                                            <select class="form-select border-dark" name = "SAMF_CLI_AREANV1" id = "SAMF_CLI_AREANV1"  aria-label="Default select example">		
                                            <?php foreach($resultado as $e): ?>
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

                                                <option value="<?php echo $status; ?>"><?php echo $status_text; ?></option>
                                            <?php endforeach; ?> 			

                                                <option value="1">1 - Área Comum</option> 		
                                                <option value="2">2 - Processamento de Madeira</option> 
                                                <option value="3">3 - Fibras</option> 	
                                                <option value="4">4 - Secagem</option> 					
												<option value="5">5 - Máquinas de Papel</option>
												<option value="6">6 - Forno / Recuperação</option>
												<option value="7">7 - Meio Ambiente</option>
												<option value="8">8 - Utilidades</option>
												<option value="9">9 - Planta Química</option>
												<option value="10">10 - Indiretos e Contigência</option>
                                            </select>
                                        </div>
                                    </div>

									<div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <h4 class="card-title">Área nível 2<code2>*</code2></h4> 
                                            <input id="SAMF_CLI_AREANV2" width="100%" class="form-control" type="text" value="<?php echo $p['SAMF_CLI_AREANV2']; ?>"/>
                                        </div>
                                    </div>

									<div class="col-xl-3 col-xxl-4 col-md-6">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h4 class="card-title">Tipo Solicitação</h4> 
                                            </div>  
                                            <select class="form-select border-dark" name = "SAMF_CLI_TIPOSC" id = "SAMF_CLI_TIPOSC"  aria-label="Default select example">	
                                            <?php foreach($resultado as $e): ?>
                                                <?php
                                                $status = $e['SAMF_CLI_TIPOSC'];
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
                                                    default:
                                                        $status_text = '';
                                                        break;
                                                }
                                                ?>

                                                <option value="<?php echo $status; ?>"><?php echo $status_text; ?></option>
                                            <?php endforeach; ?> 				
                                                <option value="1">1 - Planejada</option> 		
                                                <option value="2">2 - Emergencial</option> 
                                                <option value="3">3 - Orçamentação</option> 	
                                            </select>
                                        </div>
                                    </div>

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
			
                                
                                </div>
                                    
                                </div>
                            
                           
                                    </div>
                                </div>
                        </div>
                    </div>	
					<?php endforeach; ?> 





							

								
							</div>
							</div>
							</div>
						</div>
				

		</div>
	</div>
</div>



<!-- ENVIAR EDIÇÃO -->
<script>
   
    function enviarEdicao_old(idmov) {
        var codccusto = '02.0181.00'; 
        var DATAEXTRA1 = document.getElementById('mdate').value; 
		var DATAEXTRA2 = document.getElementById('mdate2').value; 
		// var SAMF_CLI_OS = document.getElementById('SAMF_CLI_OS').value; 
		var SAMF_CLI_QRCODE = document.getElementById('SAMF_CLI_QRCODE').value; 
		var SAMF_OBSERVACAO = document.getElementById('SAMF_OBSERVACAO').value; 
		var SAMF_CLI_TEXTO_BREVE = document.getElementById('SAMF_CLI_TEXTO_BREVE').value; 
		var SAMF_CLI_DESC_OP = document.getElementById('SAMF_CLI_DESC_OP').value; 
		var SAMF_PREDECESSORA = document.getElementById('SAMF_PREDECESSORA').value; 
		var SAMF_CLI_TAG = document.getElementById('SAMF_CLI_TAG').value; 
		// var SAMF_TEMPO_VISITA = document.getElementById('SAMF_TEMPO_VISITA').value; 
		var STATUS = document.getElementById('STATUS').value;
		var SAMF_VS_PISO = document.getElementById('SAMF_VS_PISO').value;
		 

        var dados = {
            // "CODCCUSTO": codccusto,
            // "DATAEXTRA1": DATAEXTRA1,
			// "DATAEXTRA2": DATAEXTRA2,
			// "SAMF_CLI_QRCODE": SAMF_CLI_QRCODE,
			// "SAMF_OBSERVACAO": SAMF_OBSERVACAO,
			// "SAMF_CLI_TEXTO_BREVE": SAMF_CLI_TEXTO_BREVE,
			// "SAMF_CLI_DESC_OP": SAMF_CLI_DESC_OP,
			// "SAMF_PREDECESSORA": SAMF_PREDECESSORA,
			// "SAMF_CLI_TAG": SAMF_CLI_TAG,
			"STATUS": STATUS,
			// "SAMF_VS_PISO": SAMF_VS_PISO,
            "IDMOV": idmov
        };

        console.log(dados);

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
                console.error('Erro ao inserir registro:', data.message);
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
        });
    }

    
</script>






<script>
    function enviarEdicao(IDMOV) {
        
        var SAMF_CLI_TEXTO_BREVE  = document.getElementById('SAMF_CLI_TEXTO_BREVE').value;
        var SAMF_CLI_DESC_OP  = document.getElementById('SAMF_CLI_DESC_OP').value;
        var SAMF_OBSERVACAO  = document.getElementById('SAMF_OBSERVACAO').value;
        var SAMF_CLI_TAG  = document.getElementById('SAMF_CLI_TAG').value;
        var SAMF_CLI_AREANV1  = document.getElementById('SAMF_CLI_AREANV1').value;
        var SAMF_CLI_AREANV2  = document.getElementById('SAMF_CLI_AREANV2').value;
        var SAMF_CLI_TIPOSC  = document.getElementById('SAMF_CLI_TIPOSC').value;


        var dados = {
            "IDMOV": IDMOV,
            "SAMF_CLI_TEXTO_BREVE" : SAMF_CLI_TEXTO_BREVE,
            "SAMF_CLI_DESC_OP" : SAMF_CLI_DESC_OP,
            "SAMF_OBSERVACAO" : SAMF_OBSERVACAO,
            "SAMF_CLI_TAG" : SAMF_CLI_TAG,
            "SAMF_CLI_AREANV1" : SAMF_CLI_AREANV1,
            "SAMF_CLI_AREANV2" : SAMF_CLI_AREANV2,
            "SAMF_CLI_TIPOSC" : SAMF_CLI_TIPOSC
        };

        console.log(dados);


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





































<!-- ENVIAR SOLICITAÇÃO PARA VISITA -->

<script>
    function enviarvisita(idmovorigem) {

		var botaoEnviar = document.getElementById('enviarvisita'.concat(idmovorigem))		
		botaoEnviar.disabled = true;
		botaoEnviar.innerHTML = "<i class='fa fa-check'></i> Visita Enviada";

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




<?php echo $this->endSection() ?>


<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>