<?php

namespace App\Models;

use CodeIgniter\Model;

class Rotinas_tmov extends Model
{
    protected $table = 'TMOV'; 

    protected $allowedFields = [
        'CODCCUSTO',
        'IDMOV',
        'RECMODIFIEDON',
        'CODCOLIGADA',
        'INTEGRAAPLICACAO',
        'NUMEROMOV',
        'CODTMV',    
        'RECCREATEDON',
        'DATALANCAMENTO',
        'HORULTIMAALTERACAO',
        'DATAMOVIMENTO',
        'DATAEMISSAO',
        'CODFILIAL',
        'CODLOC',
        'SERIE',        
        'TIPO',
        'STATUS',
        'CODUSUARIO',
        'RECCREATEDBY',
        'RECMODIFIEDBY',
        'DATACRIACAO',        
        'DATAEXTRA1',
        'DATAEXTRA2',
        'STATUS',
        'CNPJCPFADQUIRENTE'
    ]; 

    // INSERINDO NA TMOV
    public function insertTmov($data)
    {
        return $this->insert($data);
    }  
    
    // ATUALIZNADO DATA MONTAGEM TMOV 
    public function updateDataEmissao($DATAEMISSAO, $IDMOV)
    {
        $sql = "UPDATE TMOV SET DATAEMISSAO = ? WHERE IDMOV = ?";
        $this->db->query($sql, [$DATAEMISSAO, $IDMOV]);
    }

    public function updateDataLancamento($DATALANCAMENTO, $IDMOV)
    {
        $sql = "UPDATE TMOV SET DATALANCAMENTO = ? WHERE IDMOV = ?";
        $this->db->query($sql, [$DATALANCAMENTO, $IDMOV]);
    }
    
    // ATUALIZANDO CHAVE DE ACESSO NFE 
    public function updateChaveAcesso($IDMOV, $CHAVEACESSONFE)
    {
        $sql = "UPDATE TMOV SET CHAVEACESSONFE = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$CHAVEACESSONFE, $IDMOV]);
        return $result;
    } 
    
    public function updateNumeroMov($IDMOV, $NUMEROMOV)
    {
        $sql = "UPDATE TMOV SET NUMEROMOV = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$NUMEROMOV, $IDMOV]);
        return $result;
    }   

    public function updateCFOP($IDMOV, $IDNAT)
    {
        $sql = "UPDATE TMOV SET IDNAT = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$IDNAT, $IDMOV]);
        return $result;
    } 
    
    public function updateFrete($IDMOV, $INDNATFRETE)
    {
        $sql = "UPDATE TITMMOVFISCAL SET INDNATFRETE = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$INDNATFRETE, $IDMOV]);
        return $result;
    }

    // ATUALIZANDO INDICATIVO DE FRETE 
    public function updateIndnatfrete($IDMOV, $INDNATFRETE)
    {
        $sql = "UPDATE TITMMOVFISCAL 
        SET TITMMOVFISCAL.INDNATFRETE = ?
        FROM TITMMOVFISCAL
        LEFT JOIN TMOV ON TMOV.IDMOV = TITMMOVFISCAL.IDMOV AND TMOV.CODCOLIGADA = TITMMOVFISCAL.CODCOLIGADA 
        WHERE  
        TITMMOVFISCAL.IDMOV = ?";
        $result = $this->db->query($sql, [$INDNATFRETE, $IDMOV]);
        return $result;
    }

    // ATUALIZANDO SITUACAO PIS E COFINS E NATUREZA DE BASE 
    public function updateTributNatbc($SITTRIBUTARIAPIS, $NATBCCRED, $IDPRD)
    {
        $sql = "UPDATE TPRDFISCAL 
                SET 
                SITTRIBUTARIAPIS = ?,
                NATBCCRED = ?
                FROM TPRDFISCAL
                LEFT JOIN 
                TPRD 
                ON TPRD.IDPRD = TPRDFISCAL.IDPRD
                WHERE TPRD.IDPRD = ?
                AND TPRD.CODCOLIGADA = 1
				AND TPRDFISCAL.CODCOLIGADA = 1";
        $result = $this->db->query($sql, [$SITTRIBUTARIAPIS, $NATBCCRED, $IDPRD]);
        return $result;
    }



    // ATUALIZANDO A NATUREZA DE BASE DOS LANÇAMENTOS COM BASE NOS PRODUTOS 
    public function updateNatbccredLancamento($IDMOV)
    {
        $sql = "UPDATE TITMMOVFISCAL SET NATBCCRED = TPRDFISCAL.NATBCCRED
                FROM 
                --SELECT 
                TITMMOVFISCAL 
                LEFT JOIN TITMMOV ON TITMMOV.NSEQITMMOV = TITMMOVFISCAL.NSEQITMMOV AND TITMMOV.CODCOLIGADA = TITMMOVFISCAL.CODCOLIGADA AND TITMMOV.IDMOV = TITMMOVFISCAL.IDMOV
                LEFT JOIN TPRDFISCAL ON TPRDFISCAL.IDPRD = TITMMOV.IDPRD AND TPRDFISCAL.CODCOLIGADA = TITMMOV.CODCOLIGADA 
                WHERE TITMMOV.DATAEMISSAO > '2024-01-01'
                AND TITMMOV.IDMOV = ?";
        $result = $this->db->query($sql, [$IDMOV]);
        return $result;
    }
     
    // ATUALIZANDO SITUACAO TRIBUTARIA DO DTRBITEM COM BASE NO CADASTRO DO PRODUTO
    public function updateSittributariaLancamento($IDMOV)
    {
        $sql = "UPDATE TTRBMOV
        SET TTRBMOV.SITTRIBUTARIA = TPRDFISCAL.SITTRIBUTARIAPIS
        FROM 
        --SELECT TTRBMOV.SITTRIBUTARIA, TPRDFISCAL.SITTRIBUTARIACOFINS FROM
        TITMMOVFISCAL 
        LEFT JOIN TITMMOV ON TITMMOV.NSEQITMMOV = TITMMOVFISCAL.NSEQITMMOV AND TITMMOV.CODCOLIGADA = TITMMOVFISCAL.CODCOLIGADA AND TITMMOV.IDMOV = TITMMOVFISCAL.IDMOV
        LEFT JOIN TPRDFISCAL ON TPRDFISCAL.IDPRD = TITMMOV.IDPRD AND TPRDFISCAL.CODCOLIGADA = TITMMOV.CODCOLIGADA 
        LEFT JOIN DITEM ON DITEM.CODCOLIGADA = TPRDFISCAL.CODCOLIGADA AND DITEM.IDPRD = TPRDFISCAL.IDPRD
        LEFT JOIN TTRBMOV ON TTRBMOV.IDMOV = TITMMOV.IDMOV AND TITMMOV.CODCOLIGADA = TITMMOV.CODCOLIGADA AND TTRBMOV.NSEQITMMOV = TITMMOV.NSEQITMMOV
        WHERE TITMMOV.DATAEMISSAO > '2024-01-01'
        AND TTRBMOV.CODTRB IN ('PIS C', 'COFINS C') 
        AND TITMMOV.IDMOV = ?";
        $result = $this->db->query($sql, [$IDMOV]);
        return $result;
    }



    


    public function buscarUltimoNumeroMovSC($SERIE)
    {
        $builder = $this->db->table('TMOV');
        $builder->where('SERIE', $SERIE);
        // $builder->where('CODTMV', '1.1.40');
        $clonedBuilder = clone $builder;
        $total = $clonedBuilder->countAllResults();

        return $total;
    }

    public function buscarUltimoVALOR()
    {
        $builder = $this->db->table('TMOV');
        $builder->select('IDMOV');
        // $builder->where('SERIE', $SERIE);
        $builder->orderBy('IDMOV', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        $row = $query->getRow();
        if ($row) {
            return $row; 
        } else {
            return null; 
        }
    }   

    public function buscarRelacaoCNPJ(array $cnpjs): array
    {
        if (empty($cnpjs)) {
            return [];
        }

        // Limpar CNPJs
        $cnpjs = array_map(fn($c) => preg_replace('/\D/', '', $c), $cnpjs);

        // Criar placeholders com "?" para valores posicionais
        $placeholders = implode(',', array_fill(0, count($cnpjs), '?'));

        // CodTMV e Status fixos
        $sql = "
            SELECT DISTINCT 
                REPLACE(REPLACE(REPLACE(REPLACE(FCFO.CGCCFO, '.', ''), '-', ''), '/', ''), ';', '') AS CNPJ
            FROM CorporeRM_PONTO.dbo.TMOV
            LEFT JOIN CorporeRM_PONTO.dbo.FCFO 
                ON FCFO.CODCFO = TMOV.CODCFO 
                AND FCFO.CODCOLIGADA = TMOV.CODCOLCFO
            WHERE CODTMV = ?
            AND STATUS IN ('A', 'G')
            AND REPLACE(REPLACE(REPLACE(REPLACE(FCFO.CGCCFO, '.', ''), '-', ''), '/', ''), ';', '') IN ($placeholders)
        ";

        // Primeiro parâmetro é o CODTMV
        $params = array_merge(['1.1.06'], $cnpjs);

        return $this->db->query($sql, $params)->getResultArray();
    }

    






}