<!--**********************************
    Footer start
***********************************-->
<div class="footer">
    <div class="copyright">
        <p>SisAndaimes <a href="" target="_blank"> </a> </p>
    </div>
</div>

<!-- DESATIVANDO PESQUISA DO TOPO POIS JÁ EXISTE OUTRAS FORMAS DE PESQUSIA MAS MANTEREMOS O SCRIPT NO CÓDIGO  -->
<!-- <script>
    function pesquisarheader() {
       //ABAIXO PEGANDO VALORES DOS CHECKBOX DE DADOS DE ENTRADA 
		var CONTEUDOPESQUISAR = document.getElementById('pesquisarheader').value;
        
		
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

	
</script> -->


<!-- <script>
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

	
</script> -->

<!--**********************************
    Footer end
***********************************-->

<!-- CARREGANDO ARQUIVOS ABAIXO NA PÁGINA ESPECÍFICA QUE IRÁ GERAR EXCEL -->
<!-- <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> -->