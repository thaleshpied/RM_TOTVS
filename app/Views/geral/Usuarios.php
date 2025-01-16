<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
    
	<div class="container-fluid" id="pagesolicitacao">


    <?php foreach($usuarios as $p): ?>
        <div class="modal fade" id="m<?php echo $p['USUARIO']; ?>">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Canelamento de RDO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja cancelar o RDO número: <?php echo $p['USUARIO']; ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="atualizaStatusRDO(<?php echo $p['USUARIO']; ?>,'C',<?php echo $p['USUARIO']; ?>,1,'RDO','GESTAO','AP','<?php echo $p['USUARIO']; ?>')" id="btncancelar">Sim, cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?> 

            <!-- BREADCRUMB DA PÁGINA -->
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Usuários</a></li>
                </ol>
            </div>

            <!-- MENU SUPERIOR  -->
            <!-- <div class="toolbar container-fluid" role="toolbar">
                <div class="btn-group mb-1">
                    <button type="button" class="btn btn-primary light px-3"   aria-expanded="true"  aria-hidden="true"   role="button"  data-bs-toggle="collapse" data-bs-target="#collapsesearch"><i class="flaticon-381-search-2"></i></button>
                    <button type="button" class="btn btn-primary light px-3"   aria-hidden="true"  aria-expanded="true"  role="button"  data-bs-toggle="collapse" data-bs-target="#collapse2One"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-primary light px-3"  aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#modalexcel"><i type="button" class="fa fa-file-excel-o"></i></button>
                </div>
            </div>      -->

    
            <div class="container-fluid">
                <div class="card-header">
                    <h4 class="card-title">Usuário Cadastrados</h4>										
                    <div class="row">
                            <div class="btn-group mb-1">
                                <!-- <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_pdfSC"><i class="fa fa-file-pdf-o" aria-hidden="true"> PDF</i></button> -->
                                <!-- <button type="button" class="btn btn-outline-light btn-xs mb-1"  id="exportar_excelSC"><i type="button" class="fa fa-file-excel-o"> Excel</i></button>
                                <button type="button" class="btn btn-outline-light btn-xs mb-1"  onclick="cancelarSCLote()"><i type="button" class="fa fa-trash"> Cancelar</i></button> -->
                                <!-- <button type="button" class="btn btn-outline-light btn-xs mb-1"  onclick="enviarvisita()"><i type="button" class="fa fa-reply"> Visita</i></button> -->
                            </div>
                        </div>                                        
                    </div>
                    <div class="card-body">

                        <!-- <div class="row mb-3">
                            <div class="col-3">
                                <h5>Filtra Área</h5>
                                
                            </div>
                        </div>   -->
                     
                                        
                        <div class="table-responsive">
                            <table id="usuariosdatatable" class="display" style="min-width: 845px; width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">TIPO</th>
                                        <th scope="col">NOME</th>
                                        <th scope="col">EMAIL</th>
                                        <!-- <th scope="col">USUARIO</th> -->
                                        <th scope="col">COORD.</th>
                                        <th scope="col">TÉC. PL.</th>
                                        <th scope="col">ENCARR.</th>
                                        <th scope="col">GERENTE</th>
                                        <th scope="col">APROVADOR 1</th>
                                        <th scope="col">APROVADOR 2</th>
                                        <!-- <th scope="col">USUÁRIO SUGERIDO</th> -->
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody>													
                                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        
            <?php  if ($sessionData['USUARIO'] == 'THALES.PIEDADE') { ?> 
            <!-- DADOS DOS USUÁRIOS NOVO --> 
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                        <h4 class="card-title">Funcionários Disponíveis</h4>										
                        <div class="row">
                            
                        </div>                                        
                    </div>
                        <div class="card-body">

                        
                            <div class="table-responsive">
                                <table id="funcionariosdatatable" class="display" style="min-width: 845px; width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">NOME</th>
                                            <th scope="col">CHAPA</th>
                                            <th scope="col">FUNÇÃO</th>
                                            <th scope="col">EMAIL SUGERIDO</th>
                                            <th scope="col">USUÁRIO SUGERIDO</th>
                                            <th scope="col">CPF</th>
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
                <?php } ?>




                                



                                
						











	<div class="card-body">
	<div class="col-xl-12 col-xxl-12">





<!-- function enviarDados() {
    var NOMEUSUARIO = document.getElementById('NOMEUSUARIO').value;
    var USUARIO = document.getElementById('USUARIO').value;
    var EMAIL = document.getElementById('EMAIL').value;

    // Obtém o valor dos checkboxes
    var PLANEJADOR = document.querySelector('.PLANEJADOR input[type="checkbox"]').checked ? 1 : 0;
    var ENCARREGADO = document.querySelector('.ENCARREGADO input[type="checkbox"]').checked ? 1 : 0;
    var GERENTE = document.querySelector('.GERENTE input[type="checkbox"]').checked ? 1 : 0;

    var dados = {
        "NOMEUSUARIO": NOMEUSUARIO,
        "USUARIO": USUARIO,
        "EMAIL": EMAIL,
        "PLANEJADOR": PLANEJADOR,
        "ENCARREGADO": ENCARREGADO,
        "GERENTE": GERENTE
    };

    // Restante do seu código...
} -->



<script>
    
        function validarEmailSimples(email) {
            
            const atPosition = email.indexOf('@');
            const dotPosition = email.lastIndexOf('.');

            return atPosition > 0 && dotPosition > atPosition + 1 && dotPosition < email.length - 1;
        }

        
        function validarEmailSimplesOnChange(event) {

            // Selecionar o campo de email e o campo de usuário
            const emailElementvalidacao = document.getElementById('EMAIL');
            const usuarioElement = document.getElementById('USUARIO');

            // Verificar se o campo de email tem um valor válido
            if (emailElementvalidacao.value.includes('@')) {
                // Dividir o email na posição do '@'
                const emailParte = emailElementvalidacao.value.split('@')[0];

                // Definir o valor do campo USUARIO com a parte antes do '@'
                usuarioElement.value = emailParte;
            } else {
                // Se o email não for válido (sem '@'), limpar o campo de usuário
                usuarioElement.value = '';
            }


            const email = event.target.value;
            const mensagemErro = document.getElementById('EMAIL');
            
            if (validarEmailSimples(email)) {
                mensagemErro.textContent = 'Email válido';
                mensagemErro.style.color = 'green';
            } else {
                mensagemErro.textContent = 'Email inválido. Por favor, insira um email válido.';
                mensagemErro.style.color = 'red';

                // Selecionar os elementos por seus IDs
                const cpfElement = document.getElementById('CPF');
                const senhaElement = document.getElementById('SENHA');
                const senha2Element = document.getElementById('SENHA2');

                
                if (cpfElement) {
                    
                    cpfElement.classList.add('bg-light');
                    cpfElement.setAttribute('disabled', true);
                }

                if (senhaElement) {
                    
                    senhaElement.classList.add('bg-light');
                    senhaElement.setAttribute('disabled', true);
                }

                if (senha2Element) {
                    
                    senha2Element.classList.add('bg-light');
                    senha2Element.setAttribute('disabled', true);
                }

                return;
            }

            var EMAIL = document.getElementById('EMAIL').value;  

            var dados = {
            "EMAIL": EMAIL
            };

            fetch('<?php echo base_url('verificaemail'); ?>', {
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
                
                toastr.warning("E-mail já cadastrado", "TOP Andaimes", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5000,
                    closeButton: true,
                    progressBar: true,
                });

                // Selecionar os elementos por seus IDs
                const cpfElement = document.getElementById('CPF');
                const senhaElement = document.getElementById('SENHA');
                const senha2Element = document.getElementById('SENHA2');
                const adduserElement = document.getElementById('adduser');

                
                if (cpfElement) {
                    
                    cpfElement.classList.add('bg-light');
                    cpfElement.setAttribute('disabled', true);
                }

                if (senhaElement) {
                    
                    senhaElement.classList.add('bg-light');
                    senhaElement.setAttribute('disabled', true);
                }

                if (senha2Element) {
                    
                    senha2Element.classList.add('bg-light');
                    senha2Element.setAttribute('disabled', true);
                }

                if (adduserElement) {
                    
                    adduserElement.setAttribute('disabled', true);
                }

                return;
            } 

            else {
                
                const cpfElement = document.getElementById('CPF');
                const senhaElement = document.getElementById('SENHA');
                const senha2Element = document.getElementById('SENHA2');
                const adduserElement = document.getElementById('adduser');

                cpfElement.classList.remove('bg-light');
                cpfElement.removeAttribute('disabled');

                senhaElement.classList.remove('bg-light');
                senhaElement.removeAttribute('disabled');

                senha2Element.classList.remove('bg-light');
                senha2Element.removeAttribute('disabled');
                
                adduserElement.removeAttribute('disabled');

             


            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5000,
                closeButton: true,
                progressBar: true,
            });
        });


        }

        

    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

<script>
    function addUser() {
        
        // var CPF = document.getElementById('CPF').value;

        // if (!CPF) {
        // toastr.warning("CPF é obrigatório!", {
        //     positionClass: "toast-top-right",
        //     timeOut: 5000,
        //     closeButton: true,
        //     progressBar: true,
        // });
        // return;
        // }
        
        // // REMOVE CARACTERES NAO NUMERICOS
        // var CPFNum = CPF.replace(/\D/g, '');

        // // VALIDA SE CPF TEM 11 DIGITOS
        // if (CPFNum.length !== 11) {
        //     toastr.warning("O CPF deve ter exatamente 11 dígitos.", "Erro de Validação", {
        //         positionClass: "toast-top-right",
        //         timeOut: 5000,
        //         closeButton: true,
        //         progressBar: true,
        //     });
        //     return; 
        // }
           
        
        // if (SENHA !== SENHA2 || (!SENHA && !SENHA2 )) {
        //     toastr.warning("Confirmação de senha incorreta ou não preenchida.", "Tente novamente", {
        //         positionClass: "toast-top-right",
        //         timeOut: 5000,
        //         closeButton: true,
        //         progressBar: true,
        //     });
        //     return;
        // }

        // VALIDA QUANTIDADE DE CARACTERES DA SENHA
        // if (SENHA.length!== 8) {
        //     toastr.warning("A senha deve ter no mínimo 8 dígitos.", "Senha Fraca", {
        //         positionClass: "toast-top-right",
        //         timeOut: 5000,
        //         closeButton: true,
        //         progressBar: true,
        //     });
        //     return; 
        // }
        
        
        // if (!NOMEUSUARIO || !USUARIO || !EMAIL || !CPF) {
        //     toastr.warning("Campos obrigatórios não foram preenchidos.", {
        //         positionClass: "toast-top-right",
        //         timeOut: 5000,
        //         closeButton: true,
        //         progressBar: true,
        //     });
        //     return;
        // }

        

        // var PLANEJADORCheckbox = document.getElementById('PLANEJADOR');
        // var ENCARREGADOCheckbox = document.getElementById('ENCARREGADO');
        // var GERENTECheckbox = document.getElementById('GERENTE');
        // var CLIENTECheckbox = document.getElementById('CLIENTE');

        // var PLANEJADOR = PLANEJADORCheckbox ? (PLANEJADORCheckbox.checked ? 1 : 0) : 0;
        // var ENCARREGADO = ENCARREGADOCheckbox ? (ENCARREGADOCheckbox.checked ? 1 : 0) : 0;
        // var GERENTE = GERENTECheckbox ? (GERENTECheckbox.checked ? 1 : 0) : 0;
        // var CLIENTE = CLIENTECheckbox ? (CLIENTECheckbox.checked ? 1 : 0) : 0;

        // if (PLANEJADOR == 0 && ENCARREGADO == 0 && GERENTE == 0) {
        //     toastr.warning("Selecione ao menos uma permissão para o usuário!", "Permissões", {
        //         positionClass: "toast-top-right",
        //         timeOut: 5000,
        //         closeButton: true,
        //         progressBar: true,
        //     });
        //     return;
        // }

        

        var NOME = document.getElementById('NOME').value; 
        var USUARIO = document.getElementById('USUARIO').value; 
        var EMAIL = document.getElementById('EMAIL').value;  
        var SENHA = document.getElementById('SENHA').value;      
        var CPF  = document.getElementById('CPF').value;           
        // var SENHAFINAL = CryptoJS.MD5(SENHA).toString();

        var dados = {
            "NOME": NOME,
            "USUARIO": USUARIO,
            "EMAIL": EMAIL,
            "ATIVO": 1,
            "CPF": CPF,
            "CLIENTE": 0,
            "CODCOLIGADA": 1,
            "SENHAOLD": CPF
        };

        
        console.log(dados);
        // return;

        fetch('<?php echo base_url('add_Usuario'); ?>', {
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
                    progressBar: true,
                });

                setTimeout(function() {
					location.reload();
				}, 2000); 
                
            } 
            else if (data.status === 'true') {
                
                console.error('Usuário já cadastrado!', data.message);
                toastr.warning("Usuário já cadastrado! " , "Tente novamente", {
                    positionClass: "toast-top-right",
                    timeOut: 5000,
                    closeButton: true,
                    progressBar: true,
                });
            }
            else {
                
                console.error('Erro desconhecido ao inserir registro:', data);
                toastr.warning("Erro desconhecido!", "Tente novamente", {
                    positionClass: "toast-top-right",
                    timeOut: 5000,
                    closeButton: true,
                    progressBar: true,
                });
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5000,
                closeButton: true,
                progressBar: true,
            });
        });
    }

</script>






    <!-- DATATABLE LISTA DE FUNCIONÁRIOS DISPONÍVEIS  -->
    <script>
        function funcionariosdatatable() {
            if ( $.fn.DataTable.isDataTable('#funcionariosdatatable') ) {
                $('#funcionariosdatatable').DataTable().clear().destroy();
            }

            var table = $('#funcionariosdatatable').DataTable({
                "pageLength": 5,
                ajax: '<?php echo base_url('funcionariosdatatable') ?>', 
                columns: [
                    { data: "NOME" },
                    { data: "CHAPA" },
                    { data: "NOME_FUNCAO" },
                    { data: "EMAIL" },
                    { data: "USUARIO" },
                    { data: "CPF" },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<div class="d-flex">' +
                                '<button type="button" class="btn btn-primary btn-rounded btn-xxs" style="font-size: 1em;" onclick="abrirModal(\'' + row.CPF + '\')">Adicionar</button>' +
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
            funcionariosdatatable();
        });
        </script>

        
    <!-- DATATABLE LISTA DE FUNCIONÁRIOS DISPONÍVEIS  -->
    <script>
        function usuariosdatatable() {
            if ( $.fn.DataTable.isDataTable('#usuariosdatatable') ) {
                $('#usuariosdatatable').DataTable().clear().destroy();
            }

            var table = $('#usuariosdatatable').DataTable({
                "pageLength": 10,
                ajax: '<?php echo base_url('usuariosdatatable') ?>', 
                columns: [

                    {
                        data: "ATIVO",
                        render: function(data, type, row) {
                            // Verifica se o valor não é nulo ou indefinido
                            if (data === null || data === undefined) {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                            
                            // Aplica a regra de transformação dos valores de ATIVO
                            if (data == 1) {
                                return `
                                    <span class="badge light badge-success">
                                        <i class="fa fa-circle text-success me-1"></i> 
                                    </span>`;
                            } else if (data == 0) {
                                return `
                                    <span class="badge light badge-danger">
                                        <i class="fa fa-circle text-danger me-1"></i> 
                                    </span>`;
                            } else {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                        }
                    },
                    {
                        data: "CLIENTE",
                        render: function(data, type, row) {
                            switch (data) {
                                case 1:
                                    return 'Cliente';
                                case 0:
                                    return 'TOP';
                                default:
                                    return 'N/A'; 
                            }
                        }
                    },
                    { data: "NOME"},
                    { data: "EMAIL"},
                    { data: "COORDENADOR",
                        render: function(data, type, row) {
                            // Verifica se o valor não é nulo ou indefinido
                            if (data === null || data === undefined) {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                            
                            // Aplica a regra de transformação dos valores de ATIVO
                            if (data == 1) {
                                return `
                                    <span class="badge text-success">
                                        SIM
                                    </span>`;
                            } else if (data == 0) {
                                return `
                                    <span class="badge text-danger">
                                        NÃO
                                    </span>`;
                            } else {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                        }
                    },
                    { data: "PLANEJADOR",
                        render: function(data, type, row) {
                            // Verifica se o valor não é nulo ou indefinido
                            if (data === null || data === undefined) {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                            
                            // Aplica a regra de transformação dos valores de ATIVO
                            if (data == 1) {
                                return `
                                    <span class="badge text-success">
                                        SIM
                                    </span>`;
                            } else if (data == 0) {
                                return `
                                    <span class="badge text-danger">
                                        NÃO
                                    </span>`;
                            } else {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                        }
                    },
                    { data: "ENCARREGADO",
                        render: function(data, type, row) {
                            // Verifica se o valor não é nulo ou indefinido
                            if (data === null || data === undefined) {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                            
                            // Aplica a regra de transformação dos valores de ATIVO
                            if (data == 1) {
                                return `
                                    <span class="badge text-success">
                                        SIM
                                    </span>`;
                            } else if (data == 0) {
                                return `
                                    <span class="badge text-danger">
                                        NÃO
                                    </span>`;
                            } else {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                        }
                    },
                    { data: "GERENTE",
                        render: function(data, type, row) {
                            // Verifica se o valor não é nulo ou indefinido
                            if (data === null || data === undefined) {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                            
                            // Aplica a regra de transformação dos valores de ATIVO
                            if (data == 1) {
                                return `
                                    <span class="badge text-success">
                                        SIM
                                    </span>`;
                            } else if (data == 0) {
                                return `
                                    <span class="badge text-danger">
                                        NÃO
                                    </span>`;
                            } else {
                                return '<span class="badge light badge-secondary">N/A</span>';
                            }
                        }
                    },
                    // { data: "APROVA_RDO_NV1",
                    //     render: function(data, type, row) {
                            
                    //         if (data === null || data === undefined) {
                    //             return '<span class="badge light badge-secondary">N/A</span>';
                    //         }
                            
                    //         if (data == 1) {
                    //             return `
                    //                 <span class="badge text-success">
                    //                     SIM
                    //                 </span>`;
                    //         } else if (data == 0) {
                    //             return `
                    //                 <span class="badge text-danger">
                    //                     NÃO
                    //                 </span>`;
                    //         } else {
                    //             return '<span class="badge light badge-secondary">N/A</span>';
                    //         }
                    //     }
                    //  },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Verifica se APROVA_RDO_NV1 é 1 para marcar o checkbox
                            var checkbox = (row.APROVA_RDO_NV1 == 1) ? 'checked' : '';

                            return '<div class="d-flex">' +
                                '<input type="checkbox" ' + checkbox + ' id="check'+ row.APROVA_RDO_NV1 + '" class="form-check-input ms-2" onchange="updateAPROVA_RDO_NV1(\'' + row.USUARIO.replace(/'/g, "\\'") + '\')"/>' +
                                '</div>';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Verifica se APROVA_RDO_NV1 é 1 para marcar o checkbox
                            var checkbox = (row.APROVA_RDO_NV2 == 1) ? 'checked' : '';

                            return '<div class="d-flex">' +
                                '<input type="checkbox" ' + checkbox + ' id="check'+ row.APROVA_RDO_NV2 + '" class="form-check-input ms-2" onchange="updateAPROVA_RDO_NV2(\'' + row.USUARIO.replace(/'/g, "\\'") + '\')"/>' +
                                '</div>';
                        }
                    },
                    

                    // {
                    //     data: null,
                    //     render: function (data, type, row) {
                    //         return '<div class="d-flex">' +
                    //             '<button type="button" class="btn btn-primary btn-rounded btn-xxs" style="font-size: 1em;" onclick="abrirModal(\'' + row.CPF + '\')">Acessos</button>' +
                    //             '</div>';
                    //     }
                    // }

                    
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
            usuariosdatatable();
        });
        </script>


        <!-- MODAL PARA CANCELAMENTO DE SOLICITAÇÃO O MODAL É ACIONADO E CONSTRUÍDO PELO SCRIPT  -->
       
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



        <!-- SCRIP PARA CADASTRO DE FUNCIONÁRIO COM BASE NOS LISTADOS DO DATATABLE FUNCIONÁRIOS -->
        <script>

            // Script para abrir e carregar modal
            function abrirModal(cpf) {

               
            // Buscar os dados do item pelo CPF
            const data = <?php echo json_encode($data2); ?>;
            const item = data.find(p => p.CPF === cpf);

            if (!item) {
                alert('Item não encontrado');
                return;
            }

            // Defina o título do modal
            document.getElementById('modalTitle').innerText = `Cadastro de usuário com base nos funcionários`;

            // Construa o conteúdo do modal dinamicamente
            const modalBody = `
                
                <div class="col-xl-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-body">
                                    <h4 class="card-title">NOME: <small>${item.NOME}</small></h4>
                                    <h4 class="card-title">CHAPA: <small>${item.CHAPA}</small></h4>
                                    <h4 class="card-title">CPF: <small>${item.CPF}</small></h4>
                                    <h4 class="card-title">EMAIL:</h4><input id="EMAIL" width="50%" class="form-control"  value="${item.EMAIL}"/>
                                    <h4 class="card-title">USUÁRIO:</h4><input id="USUARIO" width="50%" class="form-control"  value="${item.USUARIO}"/>

                                    <input hidden id="NOME" width="100%" class="form-control bg-light" disabled="" value="${item.NOME}"/>                            
                                    <input hidden id="CHAPA" width="100%" class="form-control bg-light" disabled="" value="${item.CHAPA}"/>
                                    <input hidden id="CPF" width="100%" class="form-control bg-light" disabled="" value="${item.CPF}"/>
                                    <input hidden id="SENHA" width="100%" class="form-control bg-light" disabled="" value="${item.SENHA}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="margin-left: 20px; margin-top: 20px; border-top: 1px solid green; padding-top: 10px;">
                        <button value="${item.CPF}" type="button"class="btn btn-primary btn-rounded btn-xxs" style="font-size: 1em;" onclick="addUser()">Cadastrar</button>
                    </div>
                </div>

            `;

            // Insira o conteúdo no corpo do modal
            document.getElementById('modalBody').innerHTML = modalBody;

            // Abra o modal
            new bootstrap.Modal(document.getElementById('dynamicModal')).show();
            }

        </script>







<!-- ATUALIZA PERMISSÃO NÍVEL 1  -->
<script>
    function updateAPROVA_RDO_NV1(CODUSUARIO) {
		

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"CODUSUARIO": CODUSUARIO
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateAPROVA_RDO_NV1'); ?>', {
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

                
                setTimeout(usuariosdatatable, 0);


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





<!-- ATUALIZA PERMISSÃO NÍVEL 1  -->
<script>
    function updateAPROVA_RDO_NV2(CODUSUARIO) {
		

        // var codccusto = '02.0181.00'; 
		// var CODCOLIGADA = 1;
		// var IDMOVORIGEM2 = idmovorigem;
		

        var dados = {
			"CODUSUARIO": CODUSUARIO
        };

        // Exibir o JSON no console para verificação
        console.log('Dados a serem enviados:', dados);
        // return;

        fetch('<?php echo base_url('updateAPROVA_RDO_NV2'); ?>', {
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
				
                setTimeout(usuariosdatatable, 0);


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