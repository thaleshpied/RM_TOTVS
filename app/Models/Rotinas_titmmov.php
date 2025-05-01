<?php

namespace App\Models;

use CodeIgniter\Model;

class Rotinas_titmmov extends Model
{
    protected $table = 'TITMMOV'; 

    protected $allowedFields = [
        
        'IDMOV',
		'CODCOLIGADA',
		'RECCREATEDON',
		'RECMODIFIEDON',
		'RECCREATEDBY',
		'RECMODIFIEDBY',
		'NSEQITMMOV',
		'NUMEROSEQUENCIAL',
		'PRODUTOSUBSTITUTO',
		'QUANTIDADE',
		'IDPRD',
        'QUANTIDADE',
        'PRECOUNITARIO',
        'CODTB5FAT',
        'CODUND',
    ]; 

 
    public function insertTitmmov($data)
    {
        return $this->insert($data);
    }

    public function insertTitmmov_old($data)
    {
        try {
            if ($this->insert($data)) {
                return true; 
            } else {
                log_message('error', 'Erro ao inserir dados: ' . json_encode($this->errors()));
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', 'Exceção ao inserir dados: ' . $e->getMessage());
            return false;
        }
    }





    public function getItemInserir($NCM)
    {
        $query = $this->db->query("
        SELECT TOP 1 IDPRD, NOMEFANTASIA, NUMEROCCF FROM TPRD WHERE NUMEROCCF = ? AND CODCOLIGADA = 1 
        ",[$NCM]);
        
        return $query->getRowArray();

    }


    




     
}