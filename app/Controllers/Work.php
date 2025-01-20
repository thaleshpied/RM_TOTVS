<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Informacoes_gerenciais;
Use App\Models\Rotinas_usuarios;
Use App\Models\Rotinas_fiscais;

class Work extends BaseController
{

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
		// 	return redirect()->to(site_url('page-login'));
		// }
		// $sessionData = $this->get_session_data();

		// $CODCCUSTO = $session->get('CODCCUSTO'); 	
		// $USUARIO = $session->get('USUARIO'); 	
		// $CLIENTE = $session->get('CLIENTE'); 
		
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

	// ATUALIZANDO INFORMAÇÕES DE MOVIMENTOS SENDO ALTERANDO DADOS DOS ITENS UTILIZADOS E OUTROS DADOS DO MOVIMENTO EM SI 
	public function UpdatesMovimentos()
	{
		$IDMOV = $this->request->getGet('IDMOV');
		
		$USUARIO = 'CONVIDADO';
		$action = __FUNCTION__;
		$page_title = 'Rotinas Fiscais';
		
		$Informacoes_gerenciais = new Informacoes_gerenciais();
		$Rotinas_fiscalModel = new Rotinas_fiscais();

		
		$getRegistroFiscalModel = $Informacoes_gerenciais->getRegistroFiscal($IDMOV);		
		$CFOP = $Rotinas_fiscalModel->getCFOP();

		
		
		return view('components/rotinas/updateFiscal', [
			'action' => $action,
			'page_title' => $page_title,
			'IDMOV' => $IDMOV,
			'data'=>$getRegistroFiscalModel,
			'CFOP' => $CFOP
		]);
	}
	

	
	
	
}