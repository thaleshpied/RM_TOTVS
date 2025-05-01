<?php

namespace App\Controllers;

use App\Services\NsDocsService;
use CodeIgniter\API\ResponseTrait;

class Documentos extends BaseController
{
    use ResponseTrait;

    protected $nsDocsService;

    public function __construct()
    {
        $this->nsDocsService = new NsDocsService();
    }

    public function listar()
    {
        $filtro = $this->request->getGet('filtro') ?? '';
        $campos = $this->request->getGet('campos') ?? '';
        $quantidade = $this->request->getGet('quantidade') ?? 100;
        $deslocamento = $this->request->getGet('deslocamento') ?? 0;

        $dados = $this->nsDocsService->buscarDocumentos($filtro, $campos, $quantidade, $deslocamento);
        
        return $this->respond($dados);
    }
}