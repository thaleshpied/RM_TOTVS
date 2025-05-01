
<?php

use CodeIgniter\Router\RouteCollection;

$routes->set404Override('App\Controllers\Work::page_error_404');

/**
 * @var RouteCollection $routes
 */

//$routes->get('/', 'Home::index');
$routes->get('/', 'Work::index');
$routes->get('index', 'Work::index');

$routes->get('UpdatesMovimentos', 'Work::UpdatesMovimentos');
$routes->get('RecebimentoNFe', 'Work::RecebimentoNFe_controller');
$routes->get('registroFiscalDatatable', 'Work::registroFiscalDatatable');

//ROTAS INTEGRAÇÃO COM NSDOCS
$routes->get('/api/documentos', 'NsDocsController::BuscaDocumentos');
$routes->get('/api/BuscaPDFIndividual', 'NsDocsController::BuscaPDFIndividual/$1');

//ROTA PARA DOWNLOAD
$routes->get('baixar-xml/(:num)', 'NsDocsController::baixarXml/$1');

//PRÉ RECEBIMENTO DE NFE
$routes->post('PreRecebimento', 'Work::PreRecebimento');

//UPDATE CAMPOS LANÇAMENTO
$routes->post('updateDataEmissao', 'Work::updateDataEmissao');
$routes->post('updateDataLancamento', 'Work::updateDataLancamento');
$routes->post('updateChaveAcesso', 'Work::updateChaveAcesso');
$routes->post('updateNumeroMov', 'Work::updateNumeroMov');
$routes->post('updateCFOP', 'Work::updateCFOP');
$routes->post('updateFrete', 'Work::updateFrete');
$routes->post('updateIndnatfrete', 'Work::updateIndnatfrete');
$routes->post('updateTributNatbc', 'Work::updateTributNatbc');
$routes->post('updateNatbccredLancamento', 'Work::updateNatbccredLancamento');
$routes->post('updateSittributariaLancamento', 'Work::updateSittributariaLancamento');
$routes->get('ItensRMFiscal', 'Work::ItensRMFiscal');

//AUTENTICAÇÃO USUÁRIOS
$routes->get('page-login', 'Work::page_login');
$routes->post('logando', 'Work::logando');
$routes->post('logout', 'Work::logout');