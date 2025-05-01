<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
Use App\Models\Rotinas_tmov;

class NsDocsController extends BaseController
{
    use ResponseTrait;

    /**
     * Busca Documentos na API do NS Docs
     *
     * @return mixed
     */
    public function BuscaDocumentos_old()
    {
        $curl = curl_init();
        $NSDOCS_TOKEN = env('NSDOCS_TOKEN');
        $CNPJEMPRESA = env('NSDOCS_EMPRESA_CNPJ'); 

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
                'Empresa-Cnpj: '.$CNPJEMPRESA,
                'Accept: application/json; charset=utf-8',
                'Authorization: Bearer '.$NSDOCS_TOKEN
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        if ($response) {
            return $this->response->setJSON(json_decode($response, true));
        } else {
            return $this->response->setJSON(['error' => 'Erro ao obter dados da API']);
        }
    }



    public function BuscaDocumentos()
    {
        $curl = curl_init();
        $NSDOCS_TOKEN = env('NSDOCS_TOKEN');
        $CNPJEMPRESA = env('NSDOCS_EMPRESA_CNPJ');

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
                'Empresa-Cnpj: ' . $CNPJEMPRESA,
                'Accept: application/json; charset=utf-8',
                'Authorization: Bearer ' . $NSDOCS_TOKEN
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        if (!$response) {
            return $this->response->setJSON(['error' => 'Erro ao obter dados da API']);
        }

        $docs = json_decode($response, true);

        // Extrair os CNPJs dos emitentes
        $emitenteCnpjs = [];
        foreach ($docs as $doc) {
            if (!empty($doc['emitente_cnpj'])) {
                $emitenteCnpjs[] = preg_replace('/\D/', '', $doc['emitente_cnpj']); // só números
            }
        }

        $emitenteCnpjs = array_unique($emitenteCnpjs);

        // Buscar pendências via Model
        $rotinasTmovModel = new Rotinas_tmov();
        $pendentes = $rotinasTmovModel->buscarRelacaoCNPJ($emitenteCnpjs);

        // Criar um map para facilitar verificação
        $mapPendencias = [];
        foreach ($pendentes as $p) {
            $mapPendencias[$p['CNPJ']] = true;
        }

        // Marcar cada documento com a flag 'pendente'
        foreach ($docs as &$doc) {
            $cnpjLimpo = preg_replace('/\D/', '', $doc['emitente_cnpj'] ?? '');
            $doc['pendente'] = isset($mapPendencias[$cnpjLimpo]);
        }

        return $this->response->setJSON($docs);
    }





    function BuscaPDFIndividual($IDEVENTO){
       
        $curl = curl_init();
        $NSDOCS_TOKEN = env('NSDOCS_TOKEN');
        $CNPJEMPRESA = env('NSDOCS_EMPRESA_CNPJ'); 

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.nsdocs.com.br/v2/documentos/'$IDEVENTO'/pdf?incluir_fonte_pdf=true",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept-Encoding: gzip',
            'Accept: application/pdf',
            'Authorization: Bearer '.$NSDOCS_TOKEN
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }


    /**
     * Baixa o XML de um documento NSDocs.
     *
     * @param int $id ID do documento.
     *
     * @return void
     *
     * @throws \Exception Se o documento não for encontrado ou houver erro na API.
     */
    public function baixarXml($id)
    {
        
        $NSDOCS_TOKEN = env('NSDOCS_TOKEN');
        $CNPJEMPRESA = env('NSDOCS_EMPRESA_CNPJ'); 

        while (ob_get_level()) {
            ob_end_clean();
        }

        $url = "https://api.nsdocs.com.br/v2/documentos/$id/xml?status=Pendente";

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
                'Authorization: Bearer '.$NSDOCS_TOKEN
            ),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code !== 200 || !$response) {
            http_response_code(404);
            echo 'XML não encontrado ou erro na API.';
            exit;
        }

        
        $pos = strpos($response, '<?xml');
        if ($pos !== false) {
            $response = substr($response, $pos);
        } else {
            http_response_code(500);
            echo 'Erro: XML malformado.';
            exit;
        }

        
        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="documento_' . $id . '.xml"');
        echo $response;
        exit;
    }








}