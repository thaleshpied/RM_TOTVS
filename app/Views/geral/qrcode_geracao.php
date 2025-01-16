<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">
            <label for="quantity">Quantidade de QR Codes:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1">
            <button onclick="generateQRLinks()">Gerar QR Codes</button>            
            <button onclick="generatePDF()">Gerar PDF</button>
            
        <!-- <div class="row">
            
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quantidade</h4>
                    </div>
                    <div class="card-body">
                        <div class="limit-slider">
                            <div id="slider-limit"></div>
                            <span class="example-val" id="slider-limit-value-min"></span>
                            <span class="example-val" id="slider-limit-value-max"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Seleção</h4>
                    </div>
                    <div class="card-body">
                        <div class="pip-position mb-5">
                            <div id="pips-positions"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> -->


            <table id="qrCodeTable"></table>    
    </div><!-- FIM DA ÁREA DE INFORMAÇÕES (SEPARADA DO MENU E HEADER) -->
</div>

<!-- Inclua a biblioteca html2pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
// Função para gerar os links para os QR codes
function generateQRLinks() {
  // Limpa a tabela antes de gerar os novos QR codes
  document.getElementById("qrCodeTable").innerHTML = "";
  
  // Referência à tabela onde os QR codes serão exibidos
  var table = document.getElementById("qrCodeTable");
  
  // Obtem a quantidade de QR codes desejada do campo de entrada
  var quantity = document.getElementById("quantity").value;
  
  // Define quantos QR codes serão exibidos por linha
  var qrCodesPerRow = 4;
  
  // Calcula o número total de linhas necessárias
  var totalRows = Math.ceil(quantity / qrCodesPerRow);
  
  // Loop para gerar os links sequenciais
  for (var i = 1; i <= totalRows; i++) {
    // Cria uma nova linha na tabela
    var row = table.insertRow();
    
    // Loop para inserir os QR codes na linha atual
    for (var j = 0; j < qrCodesPerRow; j++) {
      // Calcula o número de QR code atual
      var qrCodeNumber = (i - 1) * qrCodesPerRow + j + 1;
      
      // Verifica se o número do QR code está dentro do limite
      if (qrCodeNumber <= quantity) {
        // Cria uma célula para o QR code
        var qrCell = row.insertCell();
        
        // Cria uma imagem com o link para o QR code com o REF sequencial
        var qrImg = document.createElement("img");
        qrImg.src = "https://api.invertexto.com/v1/qrcode?token=7458|wAKHI63QccBbUzwbQB7W2K5YCkHDVYbz&text=http%3A%2F%2F45.164.4.254%3A8081%2Fsisandaime%2Fklabin%2Fexibir.php%3Fref%3D" + qrCodeNumber + "&scale=5&error_level=0&foreground=%23006400&background=%23FFFFFF&download=false&base64=false.jpeg";
        qrCell.appendChild(qrImg);
        
        // Cria uma quebra de linha
        qrCell.appendChild(document.createElement("br"));
        
        // Adiciona o nome do QR code abaixo da imagem
        var qrName = document.createElement("span");
        qrName.textContent = "klabin-" + qrCodeNumber;
        qrName.style.fontWeight = "bold";
        qrCell.appendChild(qrName);
      } else {
        // Se o número do QR code estiver fora do limite, cria uma célula vazia
        row.insertCell();
      }
    }
  }
}

// Função para gerar o PDF
function generatePDF() {
  // Opções para a geração do PDF
  var options = {
    filename: 'qrcodes.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait', permitirTaint: 'true' }
  };

  // Elemento HTML que você deseja converter em PDF
  var element = document.getElementById('qrCodeTable');

  // Função para criar o PDF usando html2pdf
  html2pdf()
    .from(element)
    .set(options)
    .save();
}
</script>

<?php echo $this->endSection() ?>
