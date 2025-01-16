// PEGANDO A URL BASE
const baseUrl = document.getElementById('base-url')?.getAttribute('data-url') || '';


// FUNÇÕES AUXILIARES
// function closedmodalnormal(){$('#selectRecordModal').modal('hide');

function getCheckboxValue(id) {
    return document.getElementById(id)?.checked ? 1 : 0;
}


// ABAIXO MENSAGENS DE ALERTA
function showToast(type, mensagem, titulo) {
    toastr[type](mensagem, titulo, {
        positionClass: "toast-top-right",
        timeOut: 5000,
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        preventDuplicates: true,
        showDuration: 300,
        hideDuration: 1000,
        extendedTimeOut: 1000,
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: false
    });
}

function msgAlerta(mensagem, titulo = "Aviso") {
    showToast("warning", mensagem, titulo);
}

function msgSucesso(mensagem, titulo = "Sucesso") {
    showToast("success", mensagem, titulo);
}

function msgErro(mensagem, titulo = "Erro") {
    showToast("error", mensagem, titulo);
}
// FIM MENSAGENS DE ALERT
    //// FIM FUNÇÕES AUXILIARES







// SALVANDO O CADASTRO INICIAL DE UM RDO
function enviarDadosRDO() {
    const SAMF_CLI_AREANV0 = document.getElementById('SAMF_CLI_AREANV0')?.value || '';
    const SAMF_CLI_AREANV1 = document.getElementById('SAMF_CLI_AREANV1')?.value || '';
    const SAMF_CLI_TIPOSC = document.getElementById('SAMF_CLI_TIPOSC')?.value || '';
    const DATAEXTRA1 = document.getElementById('mdate')?.value || '';
    const RDO_RESPONSAVEL_CLI2 = document.getElementById('RDO_RESPONSAVEL_CLI2')?.value || '';

    const turnodia = getCheckboxValue('turnodia');
    const turnonoite = getCheckboxValue('turnonoite');
    const tipoturno = getCheckboxValue('tipoturno');
    const tipoadm = getCheckboxValue('tipoadm');
    const tipocontrato1 = getCheckboxValue('SAMF_RDO_TPCONT1');
    const tipocontrato2 = getCheckboxValue('SAMF_RDO_TPCONT2');

    let RDO_TURNO, SAMF_RDO_TIPORDO, SAMF_RDO_TPCONT;

    if (turnodia) {
        RDO_TURNO = 1;
    } else if (turnonoite) {
        RDO_TURNO = 2;
    } else {
        return msgAlerta("Turno não preenchido!", "TURNO");
    }

    if (tipoturno) {
        SAMF_RDO_TIPORDO = 1;
    } else if (tipoadm) {
        SAMF_RDO_TIPORDO = 2;
    } else {
        return msgAlerta("Tipo não preenchido!", "TIPO RDO");
    }

    SAMF_RDO_TPCONT = tipocontrato1 ? 'MANUTENCAO' : (tipocontrato2 ? 'SUSTAINING' : 'NAO APLICA');

    if (!DATAEXTRA1) return msgAlerta("Data não preenchida!", "DATA REFERÊNCIA");
    if (!RDO_RESPONSAVEL_CLI2) return msgAlerta("Informação não preenchida!", "RESPONSÁVEL CLIENTE");

    const dados = {
        SAMF_CLI_AREANV0, SAMF_CLI_AREANV1, SAMF_CLI_TIPOSC, DATAEXTRA1,
        RDO_RESPONSAVEL_CLI2, RDO_TURNO, SAMF_RDO_TIPORDO, SAMF_RDO_TPCONT
    };

    fetch(`${baseUrl}/insertRDO`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(dados)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            msgSucesso("Registro incluído com sucesso", "TOP Andaimes");
            setTimeout(datatableRDO, 0);
        } else {
            msgErro("Erro ao executar comando", "Tente novamente");
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        msgErro("Erro ao executar comando", "Tente novamente");
    });
}
// FIM SALVANDO O CADASTRO INICIAL DE UM RDO


// function enviarvisita(idmovorigem) {
//     const dados = { "IDMOVORIGEM": idmovorigem };
//     fetch(`${baseUrl}/insertGV1`, {
//         method: 'POST',
//         headers: { 'Content-Type': 'application/json' },
//         body: JSON.stringify(dados)
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.status === 'success') {
//             msgSucesso("Registro incluído com sucesso", "TOP Andaimes");
//             setTimeout(datatableRDO, 0);
//             setTimeout(datatableRDOAprov, 0);
//             setTimeout(RDODatatableCliente, 0);
//             setTimeout(datatableRDOFinal, 0);
//         } else {
//             msgErro("Erro ao executar comando", "Tente novamente");
//         }
//     })
//     .catch(error => {
//         console.error('Erro ao enviar dados:', error);
//         msgErro("Erro ao executar comando", "Tente novamente");
//     });
// }



// ATUALIZAR STATUS DO MOVIMENTO
function atualizaStatusRDO(IDMOV, STATUS, NUMEROMOV, GERACOMENTARIO, MACRO, CONTEXTO, APROVAOUREPROVA, DATAREFERENCIA) {
    
    var CODCCUSTOEMAIL = document.getElementById('CODCCUSTOEMAIL').value;
    
    var dados = {
        "STATUS": STATUS,
        "IDMOV": IDMOV,
        "NUMEROMOV": NUMEROMOV,
        "GERACOMENTARIO": GERACOMENTARIO,
        "MACRO": MACRO,
        "APROVAOUREPROVA": APROVAOUREPROVA
    };



    console.log('Dados atualizaStatusRDO:', dados);
    // return;

    fetch(`${baseUrl}atualizaStatusRDO`, {
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

            // SE A AÇÃO É DE UM ATENDIMENTO UNICO
            if (CONTEXTO === 'ATENDIMENTO'){
                msgSucesso("Registro atualizado com sucesso!", "TOP Andaimes");
                
                //VALIDANDO SE CENTOR DE CUSTO É ITAQUI PARA ENVIAR EMAIL NOTIFICANDO 
                if(CODCCUSTOEMAIL == '02.0183.00'){
                    enviaremail(STATUS, IDMOV, APROVAOUREPROVA, NUMEROMOV, DATAREFERENCIA, CONTEXTO);
                }                

            // SE A AÇÃO É DA VISÃO DE TABELAS (VISÃO GERAL)
            }else if (CONTEXTO === 'GESTAO'){
                
                msgSucesso("Registro atualizado com sucesso!", "TOP Andaimes");
                setTimeout(datatableRDO, 0);
                setTimeout(datatableRDOAprov, 0);
                setTimeout(RDODatatableCliente, 0);
                setTimeout(datatableRDOFinal, 0);

                //VALIDANDO SE CENTOR DE CUSTO É ITAQUI PARA ENVIAR EMAIL NOTIFICANDO 
                if(CODCCUSTOEMAIL == '02.0183.00'){
                    enviaremail(STATUS, IDMOV, APROVAOUREPROVA, NUMEROMOV, DATAREFERENCIA, CONTEXTO);
                }  else {
                    setTimeout(function() {
                        window.location.href = newUrl;
                    }, 3000); 
                }
            }

            setTimeout(function() {
                window.location.href = newUrl;
            }, 3000); 

        } else {
            msgErro("Erro ao executar comando", "Tente novamente");
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        msgErro("Erro ao executar comando", "Tente novamente");
    });
}
// FIM ATUALIZAR STATUS DO MOVIMENTO


// INSERINDO INFORMAÇÕES DO RDO APÓS SER CADASTRADO. TRATA SE DO PRIMEIRO ENVIO NO QUAL É FEITO INSERT E UPDATE DE ALGUMAS TABELAS
function insertAtendimentoRDO(IDMOV) {
        
    var botaordosalvar_js = document.getElementById('botaordosalvar3');
    botaordosalvar_js.disabled = true;
    botaordosalvar_js.innerHTML = "Enviando Edição!";

    var tableData = [];  
    var TableReferencia = [];      
    var rows = document.querySelectorAll('#dynamicTableFuncionariosGeral tbody tr');
    var rowsExtra = document.querySelectorAll('#dynamicTableFuncionariosGeral_extra tbody tr');
    var rowsreferencia = document.querySelectorAll('#dynamicTable_referencia tbody tr');

    var horaextraSimCheckbox = document.getElementById('horaextrasim');
    var horaextraSim = horaextraSimCheckbox ? (horaextraSimCheckbox.checked ? 1 : 0) : 0;
    
    var turnodiaCheckbox = document.getElementById('turnodia');
    var turnodia = turnodiaCheckbox ? (turnodiaCheckbox.checked ? 1 : 0) : 0;
    
    var turnonoiteCheckbox = document.getElementById('turnonoite');
    var turnonoite = turnonoiteCheckbox ? (turnonoiteCheckbox.checked ? 1 : 0) : 0;

    var tipoturnoCheckbox = document.getElementById('tipoturno');
    var tipoturno = tipoturnoCheckbox ? (tipoturnoCheckbox.checked ? 1 : 0) : 0;

    var tipoadmCheckbox = document.getElementById('tipoadm');
    var tipoadm = tipoadmCheckbox ? (tipoadmCheckbox.checked ? 1 : 0) : 0;

    if (turnodia == 1) {
        RDO_TURNO = 1;
    } else if (turnonoite == 1) {
        RDO_TURNO = 2;
    } else {
        msgAlerta("Turno não preenchido!","TURNO");
        return; 
    }

    if (tipoturno == 1) {
        SAMF_RDO_TIPORDO = 1;
    } else if (tipoadm == 1) {
        SAMF_RDO_TIPORDO = 2;
    } else {           
        msgAlerta("Tipo não preenchido!","TIPO RDO");
        return; 
    }

    
    // OBRIGANDO A PREENCHER AO MENOS UMA ATIVIDADE EXECUTADA
    var SAMF_VS_MONTAGEM_VALID = document.getElementById('SAMF_VS_MONTAGEM')?.checked ? 1 : 0;
    var SAMF_VS_MOBILIZACAO_VALID = document.getElementById('SAMF_VS_MOBILIZACAO')?.checked ? 1 : 0;
    var SAMF_VS_DESMONTAGEM_VALID = document.getElementById('SAMF_VS_DESMONTAGEM')?.checked ? 1 : 0;
    var SAMF_VS_ADEQUACAO_VALID = document.getElementById('SAMF_VS_ADEQUACAO')?.checked ? 1 : 0;
    var SAMF_VS_MANUTENCAO_VALID = document.getElementById('SAMF_VS_MANUTENCAO')?.checked ? 1 : 0;
    var SAMF_VS_ATICIVIL_VALID = document.getElementById('SAMF_VS_ATICIVIL')?.checked ? 1 : 0;

    if (SAMF_VS_MONTAGEM_VALID == 0 && SAMF_VS_MOBILIZACAO_VALID == 0 && SAMF_VS_DESMONTAGEM_VALID == 0 && SAMF_VS_ADEQUACAO_VALID == 0 && SAMF_VS_MANUTENCAO_VALID == 0 && SAMF_VS_ATICIVIL_VALID == 0) {
        msgAlerta("Preencha ao menos uma informação!","ATIVIDADES");
        botaordosalvar_js.innerHTML = '<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações';
        botaordosalvar_js.disabled = false;
        return; 
    }

    var NSEQITMMOV = 1; // Inicializa o contador para NSEQITMMOV

    // PEGANDO OS VALORES DAS ATIVIDADES EXECUTADAS
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
        SAMF_VS_MANUTENCAO: document.getElementById('SAMF_VS_MANUTENCAO')?.checked ? 1 : 0,
        SAMF_VS_ATICIVIL: document.getElementById('SAMF_VS_ATICIVIL')?.checked ? 1 : 0,
        IDMOV: IDMOV,
        SAMF_CLI_TIPOSC: parseInt(document.getElementById('SAMF_CLI_TIPOSC').value, 10),
        RDO_RESPONSAVEL_CLI2: document.getElementById('RDO_RESPONSAVEL_CLI2').value,
        RDO_TURNO: RDO_TURNO,
        SAMF_RDO_TIPORDO: SAMF_RDO_TIPORDO,
        // SAMF_CLI_TIPOSC_value = parseInt(element.value, 10)
        CODCOLIGADA: 1
    };

    rowsreferencia.forEach(row => {
        // Captura os valores dos inputs e selects usando querySelector e remove espaços desnecessários
        var SAMF_CLI_OS = row.querySelector('input[id="SAMF_CLI_OS"]').value.trim();
        var SAMF_CLI_TAG = row.querySelector('input[id="SAMF_CLI_TAG"]').value.trim();
        var SAMF_RDO_TIPORDO = row.querySelector('select[id="SAMF_RDO_TIPORDO_REF"]').value.trim();
        var SAMF_RDO_METCUB = row.querySelector('input[id="SAMF_RDO_METCUB"]').value.trim();
        var ATIVIDADE_REF = row.querySelector('select[id="ATIVIDADE_REF"]').value.trim();
      
        // VALIDANDO O QUE FOI PREENCHIDO NA LISTA DE ATIVIDADES PARA RELACIONAR COM A ATIVIDADE CORRETA 

        let SAMF_VS_MONTAGEM_REF = 0;
        let SAMF_VS_DESMONTAGEM_REF = 0;
        let SAMF_VS_ADEQUACAO_REF = 0;
        let SAMF_VS_MOBILIZACAO_REF = 0;
        let SAMF_VS_MANUTENCAO_REF = 0;

        if (ATIVIDADE_REF == 1) {
            SAMF_VS_MONTAGEM_REF = 1;
        } else if (ATIVIDADE_REF == 2) {
            SAMF_VS_DESMONTAGEM_REF = 1;
        } else if (ATIVIDADE_REF == 3) {
            SAMF_VS_ADEQUACAO_REF = 1;
        } else if (ATIVIDADE_REF == 4) {
            SAMF_VS_MOBILIZACAO_REF = 1;
        } else if (ATIVIDADE_REF == 5) {
            SAMF_VS_MANUTENCAO_REF = 1;
        } else {
            // msgAlerta("Informação não preenchida!", "ATIVIDADE REFERÊNCIA");
            // return; 
        }
        
        // Define IDMOVORIGEM com base no valor de SAMF_CLI_OS
        var IDMOVORIGEM = SAMF_CLI_OS ? IDMOV : '';

        TableReferencia.push({
            SAMF_CLI_OS: SAMF_CLI_OS,
            SAMF_CLI_TAG: SAMF_CLI_TAG,
            SAMF_RDO_TIPORDO: SAMF_RDO_TIPORDO,
            SAMF_RDO_METCUB: SAMF_RDO_METCUB,
            IDMOVORIGEM: IDMOVORIGEM,
            SAMF_VS_MONTAGEM_REF: SAMF_VS_MONTAGEM_REF,
            SAMF_VS_DESMONTAGEM_REF: SAMF_VS_DESMONTAGEM_REF,
            SAMF_VS_ADEQUACAO_REF: SAMF_VS_ADEQUACAO_REF,
            SAMF_VS_MOBILIZACAO_REF: SAMF_VS_MOBILIZACAO_REF,
            SAMF_VS_MANUTENCAO_REF: SAMF_VS_MANUTENCAO_REF
        });
    });

    
    // BUSCA TUDO DA (dynamicTableFuncionariosGeral)
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
        var RDO_FUNC_ENTRADA = row.cells[4].querySelector('input').value.trim();
        var RDO_FUNC_SAIDA = row.cells[5].querySelector('input').value.trim();			
        var quantidade = row.cells[6].querySelector('input').value.trim();
        
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

    // console.log(tableData);

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
            var RDO_FUNC_ENTRADA = row.cells[4].querySelector('input').value.trim();
            var RDO_FUNC_SAIDA = row.cells[5].querySelector('input').value.trim();	
            var quantidade = row.cells[6].querySelector('input').value.trim();
            
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
        informacoescomplementares: informacoescomplementares,
        TableReferencia: TableReferencia 
    };

    console.log(dados); 
    // return;

    fetch(`${baseUrl}/insertAtendimentoRDO`, {
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
            msgSucesso("Registro incluído com sucesso", "TOP Andaimes");
            
            setTimeout(() => {
                location.reload();
            }, 1000);

        } else {
            msgErro("Erro ao executar comando", "Tente novamente");
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        msgErro("Erro ao executar comando", "Tente novamente");
    });
}
// FIM INSERINDO INFORMAÇÕES DO RDO APÓS SER CADASTRADO. TRATA SE DO PRIMEIRO ENVIO NO QUAL É FEITO INSERT E UPDATE DE ALGUMAS TABELAS


// ATUALIZANDO INFORMAÇÕES DO RDO 
function updateRDO(IDMOV) {

    var botaordosalvar_js = document.getElementById('botaordosalvar');
    botaordosalvar_js.disabled = true;
    botaordosalvar_js.innerHTML = "Enviando edição...";

    var botaordosalvar2_js = document.getElementById('botaordosalvar2');
    botaordosalvar2_js.disabled = true;
    botaordosalvar2_js.innerHTML = "Ação Bloqueada";        


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

    var tipoturnoCheckbox = document.getElementById('tipoturno');
    var tipoturno = tipoturnoCheckbox ? (tipoturnoCheckbox.checked ? 1 : 0) : 0;

    var tipoadmCheckbox = document.getElementById('tipoadm');
    var tipoadm = tipoadmCheckbox ? (tipoadmCheckbox.checked ? 1 : 0) : 0;

    if (turnodia == 1) {
        RDO_TURNO = 1;
    } else if (turnonoite == 1) {
        RDO_TURNO = 2;
    } else {
        return msgAlerta("Turno não preenchido!", "TURNO");
    }

    if (tipoturno == 1) {
        SAMF_RDO_TIPORDO = 1;
    } else if (tipoadm == 1) {
        SAMF_RDO_TIPORDO = 2;
    } else {
        return msgAlerta("Tipo não preenchido!", "TIPO RDO");
    }

    // OBRIGANDO A PREENCHER AO MENOS UMA ATIVIDADE EXECUTADA
    var SAMF_VS_MONTAGEM_VALID = document.getElementById('SAMF_VS_MONTAGEM')?.checked ? 1 : 0;
    var SAMF_VS_MOBILIZACAO_VALID = document.getElementById('SAMF_VS_MOBILIZACAO')?.checked ? 1 : 0;
    var SAMF_VS_DESMONTAGEM_VALID = document.getElementById('SAMF_VS_DESMONTAGEM')?.checked ? 1 : 0;
    var SAMF_VS_ADEQUACAO_VALID = document.getElementById('SAMF_VS_ADEQUACAO')?.checked ? 1 : 0;
    var SAMF_VS_MANUTENCAO_VALID = document.getElementById('SAMF_VS_MANUTENCAO')?.checked ? 1 : 0;
    var SAMF_VS_ATICIVIL_VALID = document.getElementById('SAMF_VS_ATICIVIL')?.checked ? 1 : 0;
    
    if (SAMF_VS_MONTAGEM_VALID == 0 && SAMF_VS_MOBILIZACAO_VALID == 0 && SAMF_VS_DESMONTAGEM_VALID == 0 && SAMF_VS_ADEQUACAO_VALID == 0 && SAMF_VS_MANUTENCAO_VALID == 0  && SAMF_VS_ATICIVIL_VALID == 0) {
           
        botaordosalvar_js.innerHTML = '<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações';
        botaordosalvar_js.disabled = false;

        return msgAlerta("Preencha ao menos uma informação!","ATIVIDADES");

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
        SAMF_VS_MANUTENCAO: document.getElementById('SAMF_VS_MANUTENCAO')?.checked ? 1 : 0,
        SAMF_VS_ATICIVIL: document.getElementById('SAMF_VS_ATICIVIL')?.checked ? 1 : 0,
        SAMF_CLI_TIPOSC: parseInt(document.getElementById('SAMF_CLI_TIPOSC').value, 10),
        RDO_RESPONSAVEL_CLI2: document.getElementById('RDO_RESPONSAVEL_CLI2').value,
        IDMOV: IDMOV,
        RDO_TURNO: RDO_TURNO,
        SAMF_RDO_TIPORDO: SAMF_RDO_TIPORDO,
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
    fetch(`${baseUrl}/updateRDO`, {
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
            msgSucesso("Registro incluído com sucesso", "TOP Andaimes");

             botaordosalvar2_js.innerHTML = '<i class="fa fa-reply"></i> Enviar para aprovação';
             botaordosalvar2_js.disabled = false;

             botaordosalvar_js.innerHTML = '<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações';
             botaordosalvar_js.disabled = false;
            // botaordosalvar2_js.innerHTML = "Enviar para aprovação";

            // // Recarrega a página após 1 segundo (opcional)
            // setTimeout(() => {
            //     location.reload();
            // }, 1000);

        } else {
            msgErro("Erro ao executar comando", "Tente novamente");

            botaordosalvar2_js.innerHTML = '<i class="fa fa-reply"></i> Enviar para aprovação';
            botaordosalvar2_js.disabled = false;

            botaordosalvar_js.innerHTML = '<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações';
            botaordosalvar_js.disabled = false;
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        msgErro("Erro ao executar comando", "Tente novamente");
        botaordosalvar2_js.innerHTML = '<i class="fa fa-reply"></i> Enviar para aprovação';
        botaordosalvar2_js.disabled = false;

        botaordosalvar_js.innerHTML = '<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações';
        botaordosalvar_js.disabled = false;
    });
}
// FIM ATUALIZANDO INFORMAÇÕES DO RDO 




// INICIO ENVIO DE COMENTÁRIO 
function enviarcomentario(idmovorigem, fluxo, internoobrigatorio) {

    // var contexto = '';

    if(internoobrigatorio === 1){
        var CONTEXTO = 2;
    }else{
        var CONTEXTO = document.getElementById('contextocomentario')?.checked ? 2 : 1;
    };

    var CODCOLIGADA = 1;
    var IDMOV = idmovorigem;
    var COMENTARIO = document.getElementById('comentarioconteudo').value;
    var FORMATADO = COMENTARIO
    .trim()
    .replace(/\n/g, '<br>');

    var btncomentario = document.getElementById('btncomentario');        
    btncomentario.disabled = true;
    
    var areacomentario = document.getElementById('comentarioconteudo');
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
        "IDMOV": IDMOV,
        "CODCOLIGADA": CODCOLIGADA,
        "COMENTARIO": FORMATADO,
        "FLUXO": fluxo,
        "CONTEXTO": CONTEXTO
    };

    // Exibir o JSON no console para verificação
    console.log('Dados a serem enviados:', dados);
    // return;

    fetch(`${baseUrl}insertCMT`, {
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
            msgSucesso("Registro incluído com sucesso", "TOP Andaimes");
            btncomentario.disabled = false;
            document.getElementById('comentarioconteudo').value = '';

            adicionarComentario(new Date().toLocaleString(), "<?php echo isset($sessionData['USUARIO']) ? $sessionData['USUARIO'] : ''; ?>", COMENTARIO);

        } else {
            console.error('Erro ao inserir registro:', data.message);
            msgErro("Erro ao executar comando", "Tente novamente");
            btncomentario.disabled = false;
            btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
            areacomentario.readOnly = false;
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        msgErro("Erro ao executar comando", "Tente novamente");
        btncomentario.disabled = false;
        btncomentario.innerHTML = "<i class='fa fa-reply'></i> Salvar";
        areacomentario.readOnly = false;
    });
}

// FUNCAO PARA ADICIONAR AO TIME LINE O COMENTARIO SEM TER QUE ATUALIZAR A TELA #AJUSTAR/VALIDAR
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
// FIM ENVIO DE COMENTARIO 


// FUNÇÃO PARA ENVIO DE EMAIL
function enviaremail(STATUS, IDMOV, APROVAOUREPROVA, NUMEROMOV, DATAREFERENCIA, CONTEXTO) {
    // const to = document.getElementById('to').value;
    // const subject = document.getElementById('subject').value;
    // const message = document.getElementById('message').value;
    
    // var DATAREFERENCIA = document.getElementById('DATAREFERENCIAEMAIL').value;

    // console.log(`Enviando e-mail com STATUS: ${STATUS}, NUMEROMOV: ${NUMEROMOV}, APROVAOUREPROVA: ${APROVAOUREPROVA}, IDMOV: ${IDMOV}`
    // );
    // return;

    let to, NOMECLIENTE, subject, message2, contexto; 

    switch (true) {
        case (STATUS === 'F' && APROVAOUREPROVA === 'AP'):
            to = 'ludson.moreno@timenow.com.br'; // EMAIL DO APROVADOR NÍVEL 1
            NOMECLIENTE = 'Ludson';
            subject = 'RDO PENDENTE';
            message2 = '<p style="color: #555;">Você recebeu um novo <strong>RDO (Relatório Diário de Obra)</strong> para aprovação nível 1. </p>';
            contexto = 'atendimentoRDOCliente';
            break;
        case (STATUS === 'R' && APROVAOUREPROVA === 'AP'):
            to = 'marcos.roliveira@eneva.com.br, aginaldo.junior@eneva.com.br'; // EMAIL DO APROVADOR NÍVEL 2
            NOMECLIENTE = 'Cliente';
            subject = 'RDO PENDENTE';
            message2 = '<p style="color: #555;">Você recebeu um novo <strong>RDO (Relatório Diário de Obra)</strong> aprovado pelo nível 1. </p>';
            contexto = 'atendimentoRDOCliente';
            break;
        case (STATUS === 'F' && APROVAOUREPROVA === 'RP'):
            to = 'ludson.moreno@timenow.com.br'; // EMAIL DO APROVADOR NÍVEL 1
            NOMECLIENTE = 'Ludson';
            subject = 'RDO REPROVADO NÍVEL 2';
            message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Reprovado pelo nível 2 </p>';
            contexto = 'atendimentoRDOCliente';
            break;
        case (STATUS === 'G' && APROVAOUREPROVA === 'RP'):
            to = 'max.silva@topandaimes.com.br,maicon.alvarenga@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
            NOMECLIENTE = 'Max Silva';
            subject = 'RDO REPROVADO';
            message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Reprovado pelo cliente </p>';
            contexto = 'atendimentoRDOGestor';
            break;
        case (STATUS === 'G' && APROVAOUREPROVA === 'AP'):
            to = 'max.silva@topandaimes.com.br,maicon.alvarenga@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
            NOMECLIENTE = 'Max Silva';
            subject = 'RDO PENDENTE';
            message2 = '<p style="color: #555;">Você recebeu um novo <strong>RDO (Relatório Diário de Obra)</strong> de um usuário TOP Andaimes. </p>';
            contexto = 'atendimentoRDOGestor';
            break;
        case (STATUS === 'Q' && APROVAOUREPROVA === 'AP'):
            to = 'max.silva@topandaimes.com.br,maicon.alvarenga@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
            NOMECLIENTE = 'Max Silva';
            subject = 'RDO APROVADO NÍVEL 2';
            message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Aprovado pelo nível 2 cliente</p>';
            contexto = 'RDOPDF';
            break;
        default:
            console.error("Condição não tratada. STATUS:", STATUS, "APROVAOUREPROVA:", APROVAOUREPROVA);
    }


    // switch (true) {
    //     case (STATUS === 'F' && APROVAOUREPROVA === 'AP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
    //         NOMECLIENTE = 'Ludson';
    //         subject = 'RDO PENDENTE';
    //         message2 = '<p style="color: #555;">Você recebeu um novo <strong>RDO (Relatório Diário de Obra)</strong> para aprovação nível 1. </p>';
    //         contexto = 'atendimentoRDOCliente';
    //         break;
    //     case (STATUS === 'R' && APROVAOUREPROVA === 'AP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 2
    //         NOMECLIENTE = 'Marcos';
    //         subject = 'RDO PENDENTE';
    //         message2 = '<p style="color: #555;">Você recebeu um novo <strong>RDO (Relatório Diário de Obra)</strong> aprovado pelo nível 1. </p>';
    //         contexto = 'atendimentoRDOCliente';
    //         break;
    //     case (STATUS === 'F' && APROVAOUREPROVA === 'RP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
    //         NOMECLIENTE = 'Ludson';
    //         subject = 'RDO REPROVADO NÍVEL 2';
    //         message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Reprovado pelo nível 2 </p>';
    //         contexto = 'atendimentoRDOCliente';
    //         break;
    //     case (STATUS === 'G' && APROVAOUREPROVA === 'RP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
    //         NOMECLIENTE = 'Max Silva';
    //         subject = 'RDO REPROVADO';
    //         message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Reprovado pelo cliente </p>';
    //         contexto = 'atendimentoRDOGestor';
    //         break;
    //     case (STATUS === 'G' && APROVAOUREPROVA === 'AP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
    //         NOMECLIENTE = 'Max Silva';
    //         subject = 'RDO PENDENTE';
    //         message2 = '<p style="color: #555;">Você recebeu um novo <strong>RDO (Relatório Diário de Obra)</strong> de um usuário TOP Andaimes. </p>';
    //         contexto = 'atendimentoRDOGestor';
    //         break;
    //     case (STATUS === 'Q' && APROVAOUREPROVA === 'AP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
    //         NOMECLIENTE = 'Max Silva';
    //         subject = 'RDO APROVADO NÍVEL 2';
    //         message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Aprovado pelo nível 2 cliente</p>';
    //         contexto = 'RDOPDF';
    //         break;
    //     case (STATUS === 'B' && APROVAOUREPROVA === 'RP'):
    //         to = 'thales.piedade@topandaimes.com.br'; // EMAIL DO APROVADOR NÍVEL 1
    //         NOMECLIENTE = 'Thales';
    //         subject = 'RDO REPROVADO PELO GESTOR TOP';
    //         message2 = '<p style="color: #555;"><strong>RDO (Relatório Diário de Obra)</strong> Aprovado pelo nível 2 cliente</p>';
    //         contexto = 'RDOPDF';
    //         break;
    //     default:
    //         console.error("Condição não tratada. STATUS:", STATUS, "APROVAOUREPROVA:", APROVAOUREPROVA);
    // }



    // const to = 'thales.piedade@topandaimes.com.br';

    // const message = `
    // <html>
    // <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    //     <table style="width: 100%; max-width: 600px; background-color: #ffffff; margin: 0 auto; border-collapse: collapse;">
    //         <tr>
    //             <td style="padding: 20px; text-align: left;">
    //                 <img src="http://45.164.4.254:85/SisAndaimes/SAMF/public/assets/images/logosf.png" alt="Logo" style="max-width: 150px;">
    //             </td>
    //         </tr>
    //         <tr>
    //             <td style="padding: 20px;">
    //                 <h1 style="color: #555;">Prezado(a) ${NOMECLIENTE} ,</h1>
    //                 <p style="color: #555;">Este é um e-mail automático do <strong>SISANDAIMES - TOP ANDAIMES</strong>.</p>
    //                 ${message2}
    //                 <br>
    //                 <p style="color: #555;"><strong> Detalhes do documento:</strong></p>

    //                     <p style="color: #555; margin-left:10px;"><strong> Projeto:</strong> Eneva Itaqui - 02.0183.00</p>
    //                     <p style="color: #555; margin-left:10px;"><strong> N° do RDO:</strong>  ${NUMEROMOV} </p>
    //                     <p style="color: #555; margin-left:10px;"><strong> Data do RDO:</strong> ${DATAREFERENCIA} </p>

    //                 <p>Clique no botão abaixo para acessar o RDO e realizar a aprovação:</p>
    //             </td>
    //         </tr>
    //         <tr>
    //             <td style="padding: 20px; text-align: center;">
    //                 <a href="${baseUrl}${contexto}/${IDMOV}" style="background-color: #00a15d; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Acessar RDO</a>
    //             </td>
    //         </tr>

    //         <tr>
    //             <td style="padding: 20px; text-align: center;">
    //                 <p style="color: #555;">
    //                     Se tiver dúvidas ou precisar de mais informações, entre em contato com nossa equipe de suporte.
    //                 </p>
    //                 <p style="color: #555;">
    //                     Atenciosamente,
    //                 </p>
    //                 <p style="color: green;">
    //                     Equipe TOP Andaimes
    //                 </p>
    //             </td>
    //         </tr>

    //     </table>
    // </body>
    // </html>
    // `;

    
    const message = `
    <html>
    <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
        <table style="width: 100%; max-width: 600px; background-color: #ffffff; margin: 0 auto; border-collapse: collapse;">
            <tr>
                <td style="padding: 20px; text-align: left;">
                    <img src="http://45.164.4.254:85/SisAndaimes/SAMF/public/assets/images/logosf.png" alt="Logo" style="max-width: 150px;">
                </td>
            </tr>
            <tr>
                <td style="padding: 20px;">
                    <h1 style="color: #555;">Prezado(a) ${NOMECLIENTE} ,</h1>
                    <p style="color: #555;">Este é um e-mail automático do <strong>SISANDAIMES - TOP ANDAIMES</strong>.</p>
                    ${message2}
                    <br>
                    <p style="color: #555;"><strong> Detalhes do documento:</strong></p>

                        <p style="color: #555; margin-left:10px;"><strong> Projeto:</strong> Eneva Itaqui - 02.0183.00</p>
                        <p style="color: #555; margin-left:10px;"><strong> N° do RDO:</strong>  ${NUMEROMOV} </p>
                        <p style="color: #555; margin-left:10px;"><strong> Data do RDO:</strong> ${DATAREFERENCIA} </p>

                    <p>Clique no botão abaixo para acessar o RDO e realizar a aprovação:</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px; text-align: center;">
                    <a href="${baseUrl}${contexto}/${IDMOV}" style="background-color: #00a15d; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Acessar RDO</a>
                </td>
            </tr>

            <tr>
                <td style="padding: 20px; text-align: center;">
                    <p style="color: #555;">
                        Se tiver dúvidas ou precisar de mais informações, entre em contato com nossa equipe de suporte.
                    </p>
                    <p style="color: #555;">
                        Atenciosamente,
                    </p>
                    <p style="color: green;">
                        Equipe TOP Andaimes
                    </p>
                </td>
            </tr>

        </table>
    </body>
    </html>
    `;


    dados = {
        "to": to,
        "subject": subject,
        "message": message
    };

    // console.log(dados);
    // return;

    fetch(`${baseUrl}enviandoemail`, {
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
             // SE A AÇÃO É DE UM ATENDIMENTO UNICO
             if (CONTEXTO === 'ATENDIMENTO'){
                msgSucesso("Registro atualizado com sucesso!", "TOP Andaimes");
                
                var newUrl = `${baseUrl}rdo`;
    
                setTimeout(function() {
                    window.location.href = newUrl;
                }, 1000);              

            // SE A AÇÃO É DA VISÃO DE TABELAS (VISÃO GERAL)
            }else if (CONTEXTO === 'GESTAO'){
                
                msgSucesso("Registro atualizado com sucesso!", "TOP Andaimes");
                setTimeout(datatableRDO, 0);
                setTimeout(datatableRDOAprov, 0);
                setTimeout(RDODatatableCliente, 0);
                setTimeout(datatableRDOFinal, 0);

                //VALIDANDO SE CENTOR DE CUSTO É ITAQUI PARA ENVIAR EMAIL NOTIFICANDO 
                if(CODCCUSTOEMAIL == '02.0183.00'){
                    enviaremail(STATUS, IDMOV, APROVAOUREPROVA, NUMEROMOV, DATAREFERENCIA, CONTEXTO);
                }   else {
                    var newUrl = `${baseUrl}rdo`;
                    setTimeout(function() {
                        window.location.href = newUrl;
                    }, 3000); 
                }
                var newUrl = `${baseUrl}rdo`;
                setTimeout(function() {
                    window.location.href = newUrl;
                }, 3000); 
            }

        } else {
            console.error('Erro ao inserir registro:', data.message);
            // toastr.error("Erro envio e-mail", "E-MAIL", {
            //     positionClass: "toast-bottom-right",
            //     timeOut: 5e3
            // });

            // setTimeout(function() {
            //     window.location.href = newUrl;
            // }, 1000); 
        }
    })
    .catch(error => {
        console.error('Erro ao enviar dados:', error);
        // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
        // toastr.error("Erro ao executar comando", "Tente novamente", {
        //     positionClass: "toast-top-right",
        //     timeOut: 5e3
        // });

        // setTimeout(function() {
        //     window.location.href = newUrl;
        // }, 1000); 
    });
    var newUrl = `${baseUrl}rdo`;
    setTimeout(function() {
        window.location.href = newUrl;
    }, 3000); 
}