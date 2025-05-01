<?php echo $this->extend('layouts/default') ?>	

<?php echo $this->section('content') ?>


<div class="content-body">
	<div class="container-fluid">

<h1>Gestão NFe</h1>

<div class="modal-body">
    <div class="row mt-3">
        <table id="tabelaDocumentos" class="display">
            <thead>
                <tr>
                    <th></th>
                    <th>Ordem Pendente</th>
                    <th>ID</th>
                    <th>empresa</th>
                    <th>empresa_cnpj</th>
                    <th>emitente_nome</th>
                    <th>emitente_cnpj</th>
                    <th>emitente_municipio</th>
                    <th>emitente_uf</th>
                    <th>destinatario_nome</th>
                    <th>destinatario_cnpj</th>
                    <th>destinatario_municipio</th>
                    <th>destinatario_uf</th>
                    <th>transportador_nome</th>
                    <th>transportador_cnpj</th>
                    <th>tomador_nome</th>
                    <th>tomador_cnpj</th>
                    <th>numero</th>
                    <th>chave_acesso</th>
                    <th>data_emissao</th>
                    <th>data_recebimento</th>
                    <th>hora_recebimento</th>
                    <th>valor</th>
                    <th>peso</th>
                    <th>origem</th>
                    <th>modelo</th>
                    <th>situacao</th>
                    <th>status</th>
                    <th>cfop</th>
                    <th>placa</th>
                    <th>tipo_consulta</th>
                    <th>marcadores</th>
                </tr>
            </thead>
            <tbody>
                <!-- Os dados serão inseridos aqui -->
            </tbody>
        </table>
    </div>
</div>




<script>
    $(document).ready(function() {
        var tabela = $('#tabelaDocumentos').DataTable({
            columns: [                
                { title: 'Ações' },
                { title: 'Ordem' }, 
                { title: 'ID' },
                { title: 'Empresa' },
                { title: 'CNPJ Empresa' },
                { title: 'Emitente Nome' },
                { title: 'Emitente CNPJ' },
                { title: 'Emitente Município' },
                { title: 'Emitente UF' },
                { title: 'Destinatário Nome' },
                { title: 'Destinatário CNPJ' },
                { title: 'Destinatário Município' },
                { title: 'Destinatário UF' },
                { title: 'Transportador Nome' },
                { title: 'Transportador CNPJ' },
                { title: 'Tomador Nome' },
                { title: 'Tomador CNPJ' },
                { title: 'Número' },
                { title: 'Chave de Acesso' },
                { title: 'Data de Emissão' },
                { title: 'Data de Recebimento' },
                { title: 'Hora de Recebimento' },
                { title: 'Valor' },
                { title: 'Peso' },
                { title: 'Origem' },
                { title: 'Modelo' },
                { title: 'Situação' },
                { title: 'Status' },
                { title: 'CFOP' },
                { title: 'Placa' },
                { title: 'Tipo Consulta' },
                { title: 'Marcadores' }
            ]
        });

        $.ajax({
            url: '<?php echo base_url('api/documentos'); ?>', 
            method: 'GET',
            success: function(response) {
                response.forEach(function(doc) {
                    var botaostatus = '';
                    switch (doc.status) {
                        case 'A':
                            botaostatus = '<i class="fa fa-circle text-blue me-1 mt-2"></i>';
                            break;
                        case 'G':
                            botaostatus = '<i class="fa fa-circle text-warning me-1 mt-2"></i>';
                            break;
                        case 'Q':
                            botaostatus = '<i class="fa fa-circle text-danger me-1 mt-2"></i>';
                            break;
                        case 'F':
                            botaostatus = '<i class="fa fa-circle text-success me-1 mt-2"></i>';
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
                    if (doc.status !== 'C') {
                        INDICADORSTATUS = `
                            <div class="d-flex">
                                <a href="http://localhost:86/RM_TOTVS/baixar-xml/${doc.id}" class="btn btn-xs btn-success me-2 mx-2" title="Baixar XML">
                                    <i class="fas fa-file-code" aria-hidden="true"></i>
                                </a>
                                <a onclick="enviarDados(${doc.id})" class="btn btn-xs btn-info me-2 mx-2" title="Pré Recebimento">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                </a>
                                <a onclick="verificarOrdens(${doc.emitente_cnpj},${doc.valor})" class="btn btn-xs btn-light me-2 mx-2" title="Ordens">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        `;
                    }

                    var resultadoValidacao = !doc.pendente
    ? '<span class="badge bg-danger">NÃO</span>'
    : '<span class="badge bg-success">SIM</span>';


                    tabela.row.add([
                        INDICADORSTATUS,
                        resultadoValidacao, // Nova coluna adicionada
                        doc.id || "N/A",
                        doc.empresa || "N/A",
                        doc.empresa_cnpj || "N/A",
                        doc.emitente_nome || "N/A",
                        doc.emitente_cnpj || "N/A",
                        doc.emitente_municipio || "N/A",
                        doc.emitente_uf || "N/A",
                        doc.destinatario_nome || "N/A",
                        doc.destinatario_cnpj || "N/A",
                        doc.destinatario_municipio || "N/A",
                        doc.destinatario_uf || "N/A",
                        doc.transportador_nome || "N/A",
                        doc.transportador_cnpj || "N/A",
                        doc.tomador_nome || "N/A",
                        doc.tomador_cnpj || "N/A",
                        doc.numero || "N/A",
                        doc.chave_acesso || "N/A",
                        doc.data_emissao || "N/A",
                        doc.data_recebimento || "N/A",
                        doc.hora_recebimento || "N/A",
                        doc.valor || "N/A",
                        doc.peso || "N/A",
                        doc.origem || "N/A",
                        doc.modelo || "N/A",
                        doc.situacao || "N/A",
                        doc.status || "N/A",
                        botaostatus,
                        doc.cfop || "N/A",
                        doc.placa || "N/A",
                        doc.tipo_consulta || "N/A",
                        doc.marcadores || "N/A"
                    ]).draw();
                });
            },
            error: function(xhr, status, error) {
                console.error("Erro ao buscar documentos:", error);
            }
        });
    });
</script>




<script>
    function enviarDados(id) {

        var dados = {
			"ID": id
        };

        console.log(dados);
		// return;

        fetch('<?php echo base_url('PreRecebimento'); ?>', {
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
                
                // // MOSTRANDO OS ITENS RETORNADOS
                // if (data.Mensagem && Array.isArray(data.Mensagem)) {
                //     data.Mensagem.forEach(item => {
                //         console.log(item);
                //     });
                // }



            } else if(data.status === 'item'){
                console.error('Erro no Item:', data.message);
                toastr.warning("Valide Item", "Tente novamente", {
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
            else {
                console.error('Erro ao inserir registro:', data.message);
                toastr.warning("Erro Crítico", "Tente novamente", {
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

</script>





</div>
</div>


<?php echo $this->endSection() ?>