<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Informacoes_gerenciais;
Use App\Models\Rotinas_usuarios;
Use App\Models\Rotinas_fiscais;
Use App\Models\Rotinas_tmov;
Use App\Models\Rotinas_titmmov;

class Work extends BaseController
{

	protected $apiUrl = 'https://api.nsdocs.com.br/v2/documentos';
    protected $empresaId;
    protected $empresaCnpj;
    protected $token;

    public function __construct()
    {
        // Carregar variáveis do .env
        $this->empresaId = getenv('NSDOCS_EMPRESA_ID');
        $this->empresaCnpj = getenv('NSDOCS_EMPRESA_CNPJ');
        $this->token = getenv('NSDOCS_TOKEN');
    }

    public function buscarDocumentos($filtro = '', $campos = '', $quantidade = 100, $deslocamento = 0)
    {
        $client = service('curlrequest');
        
        $response = $client->get($this->apiUrl, [
            'query' => [
                'filtro' => $filtro,
                'campos' => $campos,
                'quantidade' => $quantidade,
                'deslocamento' => $deslocamento
            ],
            'headers' => [
                'Accept-Encoding' => 'gzip',
                'Empresa-Id' => $this->empresaId,
                'Empresa-Cnpj' => $this->empresaCnpj,
                'Accept' => 'application/json; charset=utf-8',
                'Authorization' => 'Bearer ' . $this->token
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

		
	
	// ABAIXO METODOS ALGUNS PARA INDEX OUTROS SERVEM PARA GERAL 
	private function checkUserSession()
	{
		$session = session();
		$userID = $session->get('IDCLIENTE');
		if (empty($userID)) {
			return redirect()->to(site_url('page-login'));
		}
	}

	//DADOS DE LOG DA OBRA
	public function logObrasController()
	{
		$CODCCUSTO = session()->get('CODCCUSTO');
		$Informacoes_gerenciais = new Informacoes_gerenciais();
        $this->log = $Informacoes_gerenciais->logAcoesObra($CODCCUSTO);
	}


	public function logObrasGeralDatatable()
	{
		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$data = [
			"data" => $Informacoes_gerenciais->logAcoesObraCompleto()
		];
		
		return $this->response->setJSON($data);


	}



	//ENCAPSULANDO DADOS DO CHAT BOX PARA FACILITAR MANUTENÇÃO 
	public function dadosChatBox()
	{
		// $CODCCUSTO = session()->get('CODCCUSTO');
		// $Informacoes_gerenciais = new Informacoes_gerenciais();
        // $this->log = $Informacoes_gerenciais->logAcoesObra($CODCCUSTO);
	}

	

	
	private function getInformacoesGerenciais($model, $CODCCUSTO)
	{
		return [
			'data5' => $model->getTotalMovimentos($CODCCUSTO),
			'data6' => $model->getTotal7($CODCCUSTO),
			'data7' => $model->getTotal7repete($CODCCUSTO),
			'data8' => $model->getTotalAtrasadosSC($CODCCUSTO),
			'data9' => $model->getTotalMovimentosVisitas($CODCCUSTO),
			'data10' => $model->getTotamMovimentosProjetos($CODCCUSTO),
			'prevfaturamentohoras' => $model->getPrevFaturamentoHoras($CODCCUSTO),
		];
	}

	
	private function getMovimentosRDOAprov($model, $CODCCUSTO, $CLIENTE)
	{
		if ($CLIENTE == 1) {
			return $model->getMovimentosRDOAprovCliente($CODCCUSTO);
		} elseif ($CLIENTE == 0) {
			return $model->getMovimentosRDOAprov($CODCCUSTO);
		}
		return null;
	}

	
	function index()
	{	
		
		// $session = session();
		// $userID = $session->get('IDCLIENTE'); 	
		
		// if (empty($userID)) {
		// 	$session->set('redirect_url', current_url());
		// 	return redirect()->to(site_url('page-login'));
		// }
		// $sessionData = $this->get_session_data();
		
		$action = __FUNCTION__;
		$page_title = 'RM Fiscal - Totvs';
		
				
		// CARREGANDO OS LOGS DA OBRA 
		$this->logObrasController();

		return view('dashboard/index', [
            'action' => $action,
            'page_title' => $page_title,
            'log' => $this->log
        ]);
	}


	function index_oldok (){
			

	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://api.nsdocs.com.br/v2/documentos?quantidade=100',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => array(
		'Accept-Encoding: gzip',
		'Empresa-Id: <string>',
		'Empresa-Cnpj: <string>',
		'Accept: application/json; charset=utf-8',
		'Authorization: Bearer cd58f063f8698d91aeb140cb4ec351db52d74fcb4bd3482f32'
	),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;


	}


	public function NFRecebidas()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nsdocs.com.br/v2/documentos?campos=,empresa,empresa_cnpj,emitente_nome,emitente_cnpj,emitente_municipio,emitente_uf,destinatario_nome,destinatario_cnpj,destinatario_municipio,destinatario_uf,transportador_nome,transportador_cnpj,tomador_nome,tomador_cnpj,numero,chave_acesso,data_emissao,data_recebimento,hora_recebimento,valor,peso,origem,modelo,situacao,status,cfop,placa,tipo_consulta,marcadores',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept-Encoding: gzip',
                // 'Empresa-Id: <string>',
                'Empresa-Cnpj: 09360928000151',
                'Accept: application/json; charset=utf-8',
                'Authorization: Bearer cd58f063f8698d91aeb140cb4ec351db52d74fcb4bd3482f32'
            ),
        ));

        // Executa o cURL
        $response = curl_exec($curl);
        curl_close($curl);

        // Se a resposta for válida, retorne para o frontend
        if ($response) {
            return $this->response->setJSON(json_decode($response, true)); // Retorna o JSON como resposta
        } else {
            return $this->response->setJSON(['error' => 'Erro ao obter dados da API']);
        }
    }







	// RECEBIMENTO DE NFE 
	function RecebimentoNFe_controller()
	{	
		
		// $session = session();
		// $userID = $session->get('IDCLIENTE'); 
		
		// if (empty($userID)) {
		// 	return redirect()->to(site_url('page-login'));
		// }
		// $sessionData = $this->get_session_data();

		// $CODCCUSTO = $session->get('CODCCUSTO'); 	
		// $USUARIO = $session->get('USUARIO'); 	
		// $CLIENTE = $session->get('CLIENTE'); 
		
		$action = __FUNCTION__;
		$page_title = 'RM Fiscal - Recebimento NFe';
		
				
		// CARREGANDO OS LOGS DA OBRA 
		$this->logObrasController();

		return view('NFE/RecebimentoNFeView', [
            'action' => $action,
            'page_title' => $page_title,
            'log' => $this->log
        ]);
	}




	// ATUALIZANDO INFORMAÇÕES DE MOVIMENTOS SENDO ALTERANDO DADOS DOS ITENS UTILIZADOS E OUTROS DADOS DO MOVIMENTO EM SI 
	public function UpdatesMovimentos()
	{
		// $session = session();
		// $userID = $session->get('IDCLIENTE'); 	
		
		// if (empty($userID)) {
		// 	$session->set('redirect_url', current_url());
		// 	return redirect()->to(site_url('page-login'));
		// }
		// $sessionData = $this->get_session_data();


		$IDMOV = $this->request->getGet('IDMOV');
		// var_dump($IDMOV);

		$action = __FUNCTION__;
	
		$page_title = 'Rotinas Fiscais';
		
		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$Rotinas_fiscalModel = new Rotinas_fiscais();
		
		$getRegistroFiscalModel = $Informacoes_gerenciais->getRegistroFiscal($IDMOV);		
		$IndicativoDeFrete = $Informacoes_gerenciais->getIndicativoDeFrete($IDMOV);
		$ItensRegistroFiscal = $Informacoes_gerenciais->getItensRegistroFiscal($IDMOV);	
		$CFOP = $Rotinas_fiscalModel->getCFOP();
		
		return view('components/rotinas/updateFiscal', [
			'action' => $action,
			'page_title' => $page_title,
			'IDMOV' => $IDMOV,
			'data'=> $getRegistroFiscalModel,
			'CFOP' => $CFOP,
			'IndicativoDeFrete' => $IndicativoDeFrete,
			'ItensRegistroFiscal' => $ItensRegistroFiscal
		]);
	}
	

	// ROTA PARA UPDATES FISCAIS 
	public function updateFiscal()
	{
		$IDMOV = $this->request->getGet('IDMOV');
		
		$USUARIO = 'CONVIDADO';
		$action = __FUNCTION__;
		$page_title = 'SisAndaimes';
		
		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$Rotinas_usuariosModel = new Rotinas_usuarios();
		$Rotinas_fiscalModel = new Rotinas_fiscais();

		$getRegistroFiscalModel = $Informacoes_gerenciais->getRegistroFiscal($IDMOV);	
		$ItensRegistroFiscal = $Informacoes_gerenciais->getItensRegistroFiscal($IDMOV);	
		$chatData2 = $Rotinas_usuariosModel->listarCCUserLogado($USUARIO);
		$CFOP = $Rotinas_fiscalModel->getCFOP();
		
		return view('components/rotinas/updateFiscal', [
			'action' => $action,
			'page_title' => $page_title,
			'chatData2' => $chatData2,
			'IDMOV' => $IDMOV,
			'data'=>$getRegistroFiscalModel,
			'ItensRegistroFiscal' => $ItensRegistroFiscal,
			'CFOP' => $CFOP
		]);
	}

	public function registroFiscalDatatable()
	{ 
		$IDMOV = $this->request->getGet('IDMOV');			

		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$data = [
			"data" => $Informacoes_gerenciais->getItensRegistroFiscal($IDMOV)
		];
		
		return $this->response->setJSON($data);
	}


	public function getItensRMFiscalDatatable()
	{ 		

		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$data = [
			"data" => $Informacoes_gerenciais->getItensRMFiscal()
		];		
		return $this->response->setJSON($data);
	}


	// ROTA PARA ITENS UTILIZADOS NO RM 
	public function ItensRMFiscal()
	{
		$IDMOV = $this->request->getGet('IDMOV');
		
		$USUARIO = 'CONVIDADO';
		$action = __FUNCTION__;
		$page_title = 'SisAndaimes';
		
		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$Rotinas_usuariosModel = new Rotinas_usuarios();

		
		$getItensRM = $Informacoes_gerenciais->getItensRMFiscal();		
		$chatData2 = $Rotinas_usuariosModel->listarCCUserLogado($USUARIO);
		
		return view('components/rotinas/itensRM', [
			'action' => $action,
			'page_title' => $page_title,
			'chatData2' => $chatData2,
			'IDMOV' => $IDMOV,
			'data'=>$getItensRM
		]);
	}



	//ABAIXO UPDATES LANÇAMENTO
	
	//ATUALIZANDO DATA EMISSAO NA TMOV PARA FISCAL
	public function updateDataEmissao() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		$DATAEMISSAO = date('Y-m-d H:i:s', strtotime($data->DATAEMISSAO));

		$datamodelUpdateMontagem = new Rotinas_tmov();
		$datamodelUpdateMontagem->updateDataEmissao($DATAEMISSAO,$data->IDMOV);

		return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
	}

	//ATUALIZANDO DATA LANCAMENTO 
	public function updateDataLancamento() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		$DATALANCAMENTO = date('Y-m-d H:i:s', strtotime($data->DATALANCAMENTO));

		$datamodelUpdateMontagem = new Rotinas_tmov();
		$datamodelUpdateMontagem->updateDataLancamento($DATALANCAMENTO,$data->IDMOV);

		return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
	}

	// ALTERANDO A CHAVE DE ACESSO 
	public function updateChaveAcesso() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		if (!isset($data->IDMOV, $data->CHAVEACESSONFE)) {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Dados incompletos']);
		}

		$updateChaveAcesso = new Rotinas_tmov();
		$result = $updateChaveAcesso->updateChaveAcesso($data->IDMOV, $data->CHAVEACESSONFE);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}

	public function updateNumeroMov() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		if (!isset($data->IDMOV, $data->NUMEROMOV)) {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Dados incompletos']);
		}

		$updateNumeroMov = new Rotinas_tmov();
		$result = $updateNumeroMov->updateNumeroMov($data->IDMOV, $data->NUMEROMOV);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}

	public function updateCFOP() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		if (!isset($data->IDMOV, $data->IDNAT)) {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Dados incompletos']);
		}

		$updateCFOP = new Rotinas_tmov();
		$result = $updateCFOP->updateCFOP($data->IDMOV, $data->IDNAT);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}

	public function updateFrete() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		if (!isset($data->IDMOV, $data->INDNATFRETE)) {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Dados incompletos']);
		}

		$updateFrete = new Rotinas_tmov();
		$result = $updateFrete->updateFrete($data->IDMOV, $data->INDNATFRETE);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}


	// ATUALIZANDO INDICATIVO DE FRETE 
	public function updateIndnatfrete() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		if (!isset($data->IDMOV, $data->INDNATFRETE)) {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Dados incompletos']);
		}

		$updateIndicativoFrete = new Rotinas_tmov();
		$result = $updateIndicativoFrete->updateIndnatfrete($data->IDMOV, $data->INDNATFRETE);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}

	// ATUALIZANDO SITUAÇÃO TRIBUTARIA E NATBCCRED NO CADASTRO DO PRODUTO 
	public function updateTributNatbc() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		$updateTributNatbc = new Rotinas_tmov();
		$result = $updateTributNatbc->updateTributNatbc($data->SITTRIBUTARIAPIS, $data->NATBCCRED, $data->IDPRD);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}

	// ATUALIZANDO NATBCCRED DO LANÇAMENTO COM BASE NO REGISTRO AJUSTADO 
	public function updateNatbccredLancamento() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		$updateNatbccredLancamento = new Rotinas_tmov();
		$result = $updateNatbccredLancamento->updateNatbccredLancamento($data->IDMOV);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}

	// ATUALIZANDO SITUAÇÃO TRIBUTÁRIA COM BASE NA ALTERAÇÃO DO REGISTRO
	public function updateSittributariaLancamento() 
	{
		date_default_timezone_set('America/Sao_Paulo');  

		$data = $this->request->getJSON();

		$updateTributNatbc = new Rotinas_tmov();
		$result = $updateTributNatbc->updateSittributariaLancamento($data->IDMOV);

		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Dados inseridos com sucesso']);
		} else {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao atualizar os dados']);
		}
	}


	//ROTA PARA ERRO
	public function page_error_404()
    {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Página não encontrada']);
    }

	// PEGANDO OS DADOS DO USUÁRIO LOGADO
	public function get_session_data()
	{
		$session = session();
		$sessionData = [
			'IDCLIENTE' => $session->get('IDCLIENTE'),
			'USUARIO' => $session->get('USUARIO'),
			'CODCCUSTO' => $session->get('CODCCUSTO'),
			'CLIENTE' => $session->get('CLIENTE'),
			'NOME_CENTRO_CUSTO' => $session->get('NOME_CENTRO_CUSTO'),
			'APROVA_RDO_NV1' => $session->get('APROVA_RDO_NV1'),
			'APROVA_RDO_NV2' => $session->get('APROVA_RDO_NV2')
		];

		return $sessionData;
	}
	

	public function page_login()
	{
		
		$sessionData = $this->get_session_data();
		
		$userID = $sessionData['IDCLIENTE']; 
		
		if (!empty($userID)) {
			return redirect()->to(site_url('index'));
		}

		return view('components/pages/page-login', $sessionData);
	}
	
	// LOGIN DE USUÁRIOS
	public function logando()
	{
		$EMAIL = $this->request->getPost('EMAIL');
		$SENHA = md5($this->request->getPost('SENHA'));

		$logandomodel = new Rotinas_usuarios();
		$usuario = $logandomodel->logar_usuario($EMAIL, $SENHA);

		if ($usuario['USUARIO'] != 'THALES.PIEDADE' && $usuario['USUARIO'] != 'LARISSA.VIEIRA') {
			return $this->response->setJSON(['status' => 'warning', 'message' => 'Usuário sem permissão!']);
		}
		
		// EM DESENVOLVIMENTO PARA PEGAR SE O ACESSO É MOBILE OU DESKTOP 
		// $plataformaAcesso = '';

		// $agent = $this->request->getUserAgent();

		// if ($agent->isMobile()) {
		// 	$plataformaAcesso = 'MOBILE';
		// } elseif ($agent->isDesktop()) {
		// 	$plataformaAcesso = 'DESKTOP';
		// } else {
		// 	$plataformaAcesso = 'INDEFINIDO';
		// }

		if ($usuario) {
			if ($usuario['ATIVO'] == '1') {
				// Atualizando os dados da sessão
				$session = session();
				$session->set([
					'IDCLIENTE' => $usuario['IDCLIENTE'],
					'USUARIO' => $usuario['USUARIO'],
					'EMAIL' => $usuario['EMAIL'],
					'ATIVO' => $usuario['ATIVO'],
					'CLIENTE' => $usuario['CLIENTE'],
					'CODCCUSTO' => $usuario['CODCCUSTO'],
					'NOME_CENTRO_CUSTO' => $usuario['NOME_CENTRO_CUSTO'],
					'APROVA_RDO_NV1' => $usuario['APROVA_RDO_NV1'],
					'APROVA_RDO_NV2' => $usuario['APROVA_RDO_NV2'],
				]);


				// INSERINDO LOG DE LOGIN
				date_default_timezone_set('America/Sao_Paulo');
				$now = date('Y-m-d H:i:s');
				$dadoslog = [
					'CODCOLIGADA' => 1,
					'RECCREATEDON' => $now,
					'RECMODIFIEDON' => $now,
					'RECCREATEDBY' => $usuario['USUARIO'],
					'RECMODIFIEDBY' => $usuario['USUARIO'],
					'ROTINA' => 'LOGIN',
					'CODCCUSTO' => $usuario['CODCCUSTO'],
					'OBSERVACOES' => 'LOGIN REALIZADO COM SUCESSO USUÁRIO ' . $usuario['USUARIO']
				];

				// $Logs_samf = new Logs_samf();
				// $Logs_samf->insertLog($dadoslog);

				// Redirecionar para URL salva ou index
				$redirectUrl = $session->get('redirect_url') ?? site_url('index');
				// // $session->remove('redirect_url');
				// return redirect()->to($redirectUrl);
				// return redirect()->to(site_url('index'));
				return $this->response->setJSON([
					'status' => 'success',
					'message' => 'Dados inseridos com sucesso',
					'redirect_url' => $redirectUrl
				]);

			} else {
				return redirect()->back()->with('error', 'Usuário inativo ou bloqueado.');
			}
		} else {
			return redirect()->back()->with('error', 'Email ou senha incorretos.');
		}
	}

	
	public function logout()
	{	

		// Inicializa a sessão
		$session = session();

		// Destrói a sessão
		$destroyed = $session->destroy();

		if ($destroyed) {
			echo "Sessão destruída com sucesso.";
		} else {
			echo "Falha ao destruir a sessão.";
		}

		// Redireciona para a página inicial
		// return redirect()->to(site_url('index'));
	}



	//FUNÇÃO DE PRÉ RECEBIMENTO DA NOTA 
	public function PreRecebimento() 
	{
		try {
			date_default_timezone_set('America/Sao_Paulo');  
			$now = date('Y-m-d H:i:s');

			// Simulação de sessão até autenticação ser implementada
			$CODCCUSTO = '01.0001.00'; 
			$SERIE = '001';

			// Dados enviados via JSON
			$DadosPreRecebimento = $this->request->getJSON(); 
			$idDocumento = $DadosPreRecebimento->ID;

			// Chamada do XML via cURL
			$NSDOCS_TOKEN = env('NSDOCS_TOKEN');
			$url = "https://api.nsdocs.com.br/v2/documentos/$idDocumento/xml?status=Pendente";

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_HTTPHEADER => array(
					'Accept: application/xml',
					'Authorization: Bearer ' . $NSDOCS_TOKEN
				),
			));

			$response = curl_exec($curl);
			$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);

			if ($http_code !== 200 || !$response) {
				return $this->response->setJSON(['status' => 'error', 'message' => 'Erro ao buscar XML do documento.']);
			}

			// Corrigindo XML malformado
			$pos = strpos($response, '<?xml');
			if ($pos !== false) {
				$response = substr($response, $pos);
			} else {
				return $this->response->setJSON(['status' => 'error', 'message' => 'XML malformado.']);
			}

			// Transformando XML em array
			$xmlObj = simplexml_load_string($response);
			$json = json_encode($xmlObj);
			$array = json_decode($json, true); 

			$rotinasTmovModel = new Rotinas_tmov(); 
			$ultimoValor = $rotinasTmovModel->buscarUltimoVALOR(); 

			if (!$ultimoValor) {
				return $this->response->setJSON(['status' => 'error', 'message' => 'Não foi possível gerar o próximo IDMOV']);
			}

			$proximoIDMOV = $ultimoValor->IDMOV + 1; 
			$numeroMovimentos = $rotinasTmovModel->buscarUltimoNumeroMovSC($SERIE);
			$proximoNUMEROMOV = $numeroMovimentos > 0 ? $numeroMovimentos + 1 : 1;

			// Dados principais do movimento
			$DadosPreRecebimento->IDMOV = $proximoIDMOV;       
			$DadosPreRecebimento->RECMODIFIEDON = $now;
			$DadosPreRecebimento->INTEGRAAPLICACAO = 'T';
			$DadosPreRecebimento->CODCOLIGADA = 1;
			$DadosPreRecebimento->CNPJCPFADQUIRENTE = $array['NFe']['infNFe']['emit']['CNPJ'] ?? '00000000000000';
			$DadosPreRecebimento->NUMEROMOV = (string)$proximoNUMEROMOV;
			$DadosPreRecebimento->CODTMV = '1.1.43'; // tipo de movimento
			$DadosPreRecebimento->RECCREATEDON = $now;
			$DadosPreRecebimento->DATALANCAMENTO = $now;
			$DadosPreRecebimento->HORULTIMAALTERACAO = $now;
			$DadosPreRecebimento->DATAMOVIMENTO = $now;
			$DadosPreRecebimento->DATAEMISSAO = $now;
			$DadosPreRecebimento->DATACRIACAO = $now;
			$DadosPreRecebimento->SERIE = $SERIE; 
			$DadosPreRecebimento->TIPO = 'A';
			$DadosPreRecebimento->STATUS = 'A';
			$DadosPreRecebimento->CODCCUSTO = $CODCCUSTO;
			$DadosPreRecebimento->CODFILIAL = 1;
			

			// Inserção do movimento principal
			$rotinasTmovModel->insertTmov($DadosPreRecebimento);

			// Itens
			$titmmovModel = new Rotinas_titmmov(); 
			$detItens = $array['NFe']['infNFe']['det'] ?? [];

			// Padronizar para array
			if (isset($detItens['prod'])) {
				$detItens = [$detItens];
			}

			$itensNaoLocalizados = [];

			foreach ($detItens as $item) {
				$descricao       = $item['prod']['xProd'] ?? '';
				$quantidade      = $item['prod']['qCom'] ?? 0;
				$PRECOUNITARIO   = $item['prod']['vUnCom'] ?? 0;
				$QUANTIDADE      = $item['prod']['qCom'] ?? 0;
				$CODUND          = $item['prod']['uCom'] ?? '';
				$NSEQITMMOV      = $item['@attributes']['nItem'] ?? null;
				$NUMEROSEQUENCIAL= $item['@attributes']['nItem'] ?? null;
				$NCM             = $item['prod']['NCM'] ?? 0;

				$resultadoIDPRD = $titmmovModel->getItemInserir($NCM);

				if (!$resultadoIDPRD || !isset($resultadoIDPRD['IDPRD'])) {
					$itensNaoLocalizados[] = [
						'descricao' => $descricao,
						'NCM' => $NCM
					];
					continue;
				}

				$IDPRD = $resultadoIDPRD['IDPRD'];	

				$data = [
					'IDMOV' => $proximoIDMOV,
					'CODCOLIGADA' => 1,
					'IDPRD' => $IDPRD,
					'PRECOUNITARIO' => $PRECOUNITARIO,
					'QUANTIDADE' => $QUANTIDADE,
					'RECCREATEDON' => $now,
					'RECMODIFIEDON' => $now,
					'CODUND' => $CODUND,
					'INTEGRAAPLICACAO' => 'T',
					'PRODUTOSUBSTITUTO' => 0,
					'NSEQITMMOV' => $NSEQITMMOV,
					'NUMEROSEQUENCIAL' => $NUMEROSEQUENCIAL,
				];

				$insertResult = $titmmovModel->insertTitmmov($data);

				if (!$insertResult) {
					$itensNaoLocalizados[] = [
						'descricao' => $descricao,
						'erro' => 'Erro ao inserir item no banco'
					];
				}
			}

			return $this->response->setJSON([
				'status' => 'success',
				'message' => 'Dados inseridos com sucesso',
				'itensNaoLocalizados' => $itensNaoLocalizados
			]);

		} catch (\Exception $e) {
			return $this->response->setJSON(['status' => 'error', 'message' => 'Ocorreu um erro: ' . $e->getMessage()]);
		}
	}






// // LOG PARA ANÁLISE CASO TENHA ERRO
// return $this->response->setJSON([
// 	'status' => 'log',
// 	'message' => 'LOG DE Variáveis',
// 	'VARIÁVEIS' => $NOMEDAVARIAVEL
// ]);	
	
}