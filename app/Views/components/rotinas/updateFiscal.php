<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>


		<!-- BREADCRUMB DA PÁGINA -->
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Update Fiscal</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Alteração de Registro RM - IDMOV <?php echo $data[0]['IDMOV'] ?? 'Nulo'; ?></a></li>
			</ol>
		</div>


        <div class="col-12">
        <div class="card" style="    height: 500px;         width: 100%; ">
            <div class="card-body">

                <!-- CARD COM METRAGEM -->
                <div class="profile-about-me" style="margin-top: -44px;">
                    <div class="pt-4 border-bottom-1 pb-3 row">
                        <!-- <h4 class="card-title"><code3>Medidas </code3></h4> -->
                        <p class="mb-2">

                            <!-- INDICADOR METRAGEM TOTAL DO ANDAIME  -->
                            <div class="col-3">
                                <div class="widget-stat card bg-primary">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="fa fa-area-chart"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Ações</p>
                                                <!-- <h3 class="text-white">????</h3> -->
                                                <div class="progress mb-2 bg-primary">
                                                    <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                                </div>
                                                <!-- <small>** Representa % do total</small> -->
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"  onclick="updateNatbccredLancamento(<?php echo $IDMOV; ?>)" id="btncancelar">ATUALIZAR NAT BASE LANÇAMENTO</button>
                                        <button type="button" class="btn btn-primary mt-1" data-bs-dismiss="modal"  onclick="updateSittributariaLancamento(<?php echo $IDMOV; ?>)" id="btncancelar">ATUALIZAR SIT TRIBT LANÇAMENTO</button>
                                    </div>
                                </div>
                                <!-- <div class="profile-name px-3 pt-2">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"  onclick="updateNatbccredLancamento(<?php echo $IDMOV; ?>)" id="btncancelar">ATUALIZAR LANÇAMENTO</button>
                                    <button type="button" class="btn btn-primary mt-1" data-bs-dismiss="modal"  onclick="updateSittributariaLancamento(<?php echo $IDMOV; ?>)" id="btncancelar">ATUALIZAR LANÇAMENTO</button>
                                </div> -->
                            </div>

                            <div class="col-2">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0 mt-2">*Data Emissão - <?php echo $data[0]['DATAEMISSAO'] ?? 'Nulo'; ?> </h4> 
                                    <input onchange="updateDataEmissao(<?php echo $data[0]['IDMOV']; ?>)" id="dataemissaofiscal"  width="100%" class="form-control" placehoolder = "TOP 2024" />
                                    <h4 class="text-primary mb-0 mt-2">*Data lançamento - <?php echo $data[0]['DATALANCAMENTO'] ?? 'Nulo'; ?> </h4> 
                                    <input onchange="updateDataLancamento(<?php echo $data[0]['IDMOV']; ?>)" id="dataentradafiscal" width="100%" class="form-control" placehoolder = "TOP 2024" />
                                    <!-- <h4 class="text-primary mb-0 mt-2">Cod Natureza - <?php echo $data[0]['INDNATREC'] ?? 'Nulo'; ?> </h4> 
                                    <input width="100%" class="form-control" placehoolder = "TOP 2024" /> -->
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0 mt-2">*N° Movimento - <?php echo $data[0]['NUMEROMOV'] ?? 'Nulo'; ?> </h4> 
                                    <input onchange="updateNumeroMov(<?php echo $data[0]['IDMOV'] ?? 'Nulo'; ?>)"  id="numeromov" width="100%" class="form-control" placehoolder = "TOP 2024" />
                                    <h4 class="text-primary mb-0 mt-2">*Indicativo de Frete - <?php echo $data[0]['INDNATFRETE'] ?? 'Nulo'; ?></h4>
                                    
                                    <select class="form-select border-dark" name="INDNATFRETE" id="INDNATFRETE" aria-label="Default select example" onchange="updateFrete(<?php echo $data[0]['IDMOV'] ?? 'Nulo'; ?>)">
                                        <option selected>Selecione</option>
                                        <option value="">Nullo</option>
                                        <option value="9">9 - Outros</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-2">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0 mt-2">*CFOP - <?php echo $data[0]['CFOP'] ?? 'Nulo'; ?> </h4>
                                 
                                    <select class="form-select border-dark" name="CFOP" id="CFOP" aria-label="Default select example" onchange="updateCFOP(<?php echo $data[0]['IDMOV'] ?? 'Nulo'; ?>)">
                                        <option selected>Selecione o CFOP</option>
                                        <?php foreach ($CFOP as $CFOPitem): ?>
                                            <option value="<?php echo $CFOPitem['IDNAT']; ?>" data-id="<?php echo $CFOPitem['IDNAT']; ?>"><?php echo $CFOPitem['CODNAT']; ?> - <?php echo $CFOPitem['NOME']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0 mt-2">*Chave de Acesso - <?php echo $data[0]['CHAVE_DE_ACESSO'] ?? 'Nulo'; ?></h4>
                                    <input width="100%" class="form-control" placehoolder = "TOP 2024" id="CHAVEACESSONFE"  onchange="updateChaveAcesso(<?php echo $data[0]['IDMOV'] ?? 'Nulo'; ?>)"/>
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



   
        <!-- <h5>Atenção, você está em uma tela de alteração de registros do RM!</h5> -->

        <div class="card-body">
            <div class="table-responsive">
                <table id="registrofiscais" class="display" style="min-width: 845px; width:100%;">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <!-- <th scope="col"><a>IDMOV</a></th> -->
                            <th scope="col"><a>IDPRD</a></th>
                            <th scope="col"><a>PRODUTO</a></th>
                            <!-- <th scope="col">CHAVEACESSO</th> -->
                            <th scope="col">NAT BASE</th>
                            <!-- <th scope="col">FRETE</th>  -->
                            <th scope="col">SIT TRIBUT</th>
                            <th scope="col">IDNAT</th>                                                  
                            <!-- <th scope="col">BASE</th>                             -->
                            <!-- <th scope="col">TRIBUTO</th>                        -->
                            <!-- <th scope="col">VALOR</th>                        -->
                            <!-- <th scope="col">ALÍQUOTA</th>                        -->
                        </tr>
                    </thead>
                    <tbody>													
                                        
                    </tbody>
                </table>
            </div>
        </div>


        <script>
            function registroFiscalDatatable() {
                if ($.fn.DataTable.isDataTable('#registrofiscais')) {
                    $('#registrofiscais').DataTable().clear().destroy();
                }

                const IDMOV = <?= json_encode($IDMOV) ?>;
                const url = `<?= base_url('registroFiscalDatatable') ?>?IDMOV=${IDMOV}`;

                console.log('URL da requisição:', url);

                var table = $('#registrofiscais').DataTable({
                    // "pageLength": '',
                    "searching": false, // Remove a barra de pesquisa
                    "info": false, // Remove a informação sobre registros carregados
                    "lengthChange": false,
                    "paging": false,
                    ajax: url,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row) {

                                botaodetalhes = '<div class="d-flex">' +
                                            '<a class="btn btn-rounded btn-light">' +
                                            '<i class="fa fa-upload color-success" data-id="' + row.IDMOV + '" onclick="abrirModaledit(' + row.IDMOV + ')">Tributos</i></a>';

                             


                                
                                return '<div class="d-flex">' +
                                            '<a class="btn btn-xs btn-warning">' +
                                            '<i class="fas fa-pencil-alt" data-id="' + row.IDMOV + '" onclick="abrirModaledit(' + row.IDMOV + ')"></i></a>';
                                            
                            }
                        },

                //         {
                //     className: 'dt-controlmyaprov',
                //     orderable: false,
                //     data: null,
                //     botaodetalhes: '<button type="button" class="btn btn-rounded btn-light">' +
                //         '<span class="btn-icon-start text-dark"><i class="fa fa-upload color-success"></i></span>' +
                //         '<font style="vertical-align: inherit;" class="text-dark">Detalhes</font>' +
                //         '</button>'
                // }


                        { data: "IDPRD" },
                        { data: "NOMEFANTASIA" },
                        // { data: "CHAVE_DE_ACESSO" },
                        { data: "NATBCCRED" },
                        // { data: "INDNATFRETE" },  
                        { data: "SITTRIBUTARIA" }, 
                        { data: "IDNAT" }, 
                        // { data: "BASEDECALCULO" },
                        // { data: "VALOR" },
                        // { data: "ALIQUOTA" },
                    ]
                });
            }

            $(document).ready(function () {
                registroFiscalDatatable();
            });
        </script>


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



<!-- SCRIPT PARA ABRIR O MODAL  -->
 
<script>

// Script para abrir e carregar modal
function abrirModaledit(id) {
// Buscar os dados do item pelo ID (ajuste conforme necessário)
const data = <?php echo json_encode($data); ?>;
const item = data.find(p => p.IDMOV === id);

if (!item) {
    alert('Item não encontrado');
    return;
}

// <button value="${item.IDMOV}" type="button" class="btn btn-primary btn-rounded me-2 mb-2 btn-xxs" onclick="enviarEdicao(${item.IDMOV})">Salvar</button>

// Defina o título do modal
document.getElementById('modalTitle').innerText = `Edição movimento TOP: ${item.IDMOV} Movimento: ${item.CODTMV}`;

// Construa o conteúdo do modal dinamicamente
const modalBody = `
    <div class="col-12" style="margin-left: 20px; margin-top: 20px; border-top: 1px solid green; padding-top: 10px;">
        
    </div>
    <div class="col-xl-12">
        <div class="container-fluid">
            <div class="row">
            
                <div class="col-6">
                    <div class="card-body">
                        <h4 class="card-title">Situação tributária</h4>
                        <input id="SITTRIBUTARIAPIS" width="100%" class="form-control" value="${item.SITTRIBUTARIA}" type="text" onchange="updateTributNatbc(${item.IDPRD})"/>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card-body">
                        <h4 class="card-title">Natureza de base</h4>
                        <input id="NATBCCRED" width="100%" class="form-control" value="${item.NATBCCRED}" type="text" onchange="updateTributNatbc(${item.IDPRD})"/>
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





    
	</div>
    
<!-- <h3 style="margin-top: 100px;">ORIENTAÇÕES</h3>
<H5>A edição do registro permite: Alterar Natueza de base, situação tributária, chave de acesso e indicativo de frete (que nos casos necessário o valor correto é 9).
    <p>
A rotina Atualizar Lançamento pega natureza de base do cadastro do produto e atualiza para o lançamento <p>
A rotina Atualizar Escrituração pega a situação tributária do item e alimenta o DTRBITEM que é tabela de escrituração. <p>
Importante só executar rotinas caso seja necessário puxar para lançamento e escrituração
</H5> -->

</div>



<!-- ATUALIZANDO CHAVE DE ACESSO -->
 
<!-- ATUALIZAR CHAVE DE ACESSO  -->
<script>
    function updateChaveAcesso(IDMOV) {

		var CHAVEACESSONFE = document.getElementById('CHAVEACESSONFE').value;

        var dados = {
			"CHAVEACESSONFE": CHAVEACESSONFE,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateChaveAcesso'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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



<!-- //ATUALIZANDO NUMERO MOV  -->
 
<script>
    function updateNumeroMov(IDMOV) {

		var NUMEROMOV = document.getElementById('numeromov').value;

        var dados = {
			"NUMEROMOV": NUMEROMOV,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateNumeroMov'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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
    function updateCFOP(IDMOV) {

		var IDNAT = document.getElementById('CFOP').value;

        var dados = {
			"IDNAT": IDNAT,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateCFOP'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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
    function updateFrete(IDMOV) {

		var INDNATFRETE = document.getElementById('INDNATFRETE').value;

        var dados = {
			"INDNATFRETE": INDNATFRETE,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateFrete'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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




<!-- ATUALIZAR INDICATIVO DE FRETE  -->
<script>
    function updateIndnatfrete(IDMOV) {

        var INDNATFRETE = document.getElementById('INDNATFRETE').value;

        var dados = {
			"INDNATFRETE": INDNATFRETE,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateIndnatfrete'); ?>', {
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
				
                setTimeout(registroFiscalDatatable, 0);

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


<!-- ATUALIZANDO SITUAÇÃO TRIBUTÁRIA E NATUREZA DE BASE  -->
<script>
    function updateTributNatbc(IDPRD) {

		var SITTRIBUTARIAPIS = document.getElementById('SITTRIBUTARIAPIS').value;
        var NATBCCRED = document.getElementById('NATBCCRED').value;

        var dados = {
			"NATBCCRED": NATBCCRED,
            "SITTRIBUTARIAPIS": SITTRIBUTARIAPIS,
			"IDPRD": IDPRD,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateTributNatbc'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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



<!-- - atualizando geral lancamento e escrituracao   -->
<script>
    function updateNatbccredLancamento(IDMOV) {

        var dados = {
			"IDMOV": IDMOV
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateNatbccredLancamento'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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
    function updateSittributariaLancamento(IDMOV) {

        var dados = {
			"IDMOV": IDMOV
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateSittributariaLancamento'); ?>', {
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
                
				setTimeout(registroFiscalDatatable, 0);


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
    function updateDataEmissao(IDMOV) {

		var DATAEMISSAO = document.getElementById('dataemissaofiscal').value;		
		console.log('Dados a serem enviados:', DATAEMISSAO, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOV2 = idmovorigem;
		

        var dados = {
			"DATAEMISSAO": DATAEMISSAO,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateDataEmissao'); ?>', {
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
    function updateDataLancamento(IDMOV) {

		var DATALANCAMENTO = document.getElementById('dataentradafiscal').value;		
		console.log('Dados a serem enviados:', DATALANCAMENTO, IDMOV);

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOV2 = idmovorigem;
		

        var dados = {
			"DATALANCAMENTO": DATALANCAMENTO,
			"IDMOV": IDMOV,	
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateDataLancamento'); ?>', {
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


<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>