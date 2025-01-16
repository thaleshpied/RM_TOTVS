<?php

namespace App\Models;

use CodeIgniter\Model;

class Rotinas_fiscais extends Model
{
    // protected $table = 'TMOVCOMPL'; 

    // protected $allowedFields = [
    //     'IDMOV',
    //     'CODCOLIGADA',
    //     'RECCREATEDON',
    //     'RECMODIFIEDON',
    //     'RECCREATEDBY',
    //     'RECMODIFIEDBY',
    //     'SAMF_CLI_OS',
    //     'SAMF_CLI_QRCODE',
    //     'SAMF_IDMOV_ORIGEM',
    //     'SAMF_ENCARREGADO',
    //     'SAMF_VS_AP1',
    //     'SAMF_VS_AP2',
    //     'SAMF_VS_INTERFER1',
    //     'SAMF_VS_INTERFER2',
    //     'SAMF_VS_INTERFER3',
    //     'SAMF_VS_INTERFER4',
    //     'SAMF_VS_INTERFER5',
    //     'SAMF_VS_INTERFER6',
    //     'SAMF_VS_INTERFER7',
    //     'SAMF_VS_INTERFER8',
    //     'SAMF_VS_INTERFER9',
    //     'SAMF_VS_INTERFER10',
    //     'SAMF_VS_INTERFER11',
    //     'SAMF_VS_INTERFER12',
    //     'SAMF_VS_INTERFER13',
    //     'SAMF_VS_INTERFER14',
    //     'SAMF_VS_PP1',
    //     'SAMF_VS_PP2',
    //     'SAMF_VS_PP3',
    //     'SAMF_VS_PP4',
    //     'SAMF_VS_PP5',
    //     'SAMF_VS_PP6',
    //     'SAMF_VS_PP7',
    //     'SAMF_VS_COMPLX',
    //     'SAMF_OBSERVACAO',
    //     'SAMF_CLI_TEXTO_BREVE',
    //     'SAMF_CLI_DESC_OP',
    //     'SAMF_PREDECESSORA',
    //     'SAMF_CLI_TAG',
    //     'SAMF_TEMPO_VISITA',
    //     'SAMF_VS_PISO',
    //     'SAMF_CLI_LOCANDAIME',
    //     'SAMF_CLI_LOCANDAIME2',
    //     'SAMF_CLI_PARADA',
    //     'SAMF_CLI_BMOBS',
    //     'SAMF_CLI_AREANV0',
    //     'SAMF_CLI_AREANV1',
    //     'SAMF_CLI_AREANV2',
    //     'SAMF_CLI_TIPOSC',
    //     'SAMF_VS_ADEQUACAO',
    //     'SAMF_VS_DESMONTAGEM',
    //     'SAMF_VS_MOBILIZACAO',
    //     'SAMF_VS_MONTAGEM',
    //     'RDO_RESPONSAVEL_CLI2',
    //     'RDO_TURNO',
    //     'SAMF_RDO_TIPORDO',
    //     'SAMF_VS_MANUTENCAO',
    //     'SAMF_RDO_METCUB',
    //     'SAMF_VS_AMBIENTE',
    //     'SAMF_RDO_TPCONT',
    //     'SAMF_VS_ATICIVIL',
    // ]; 

    // INSERINDO NA TMOVCOMPL
    public function insertTmovcompl($data5)
    {
        return $this->insert($data5);
    }   

    //ATUALIZANDO O ENCARREGADO RESPONSÁVEL
    public function updateEncarregado($IDMOV, $SAMF_ENCARREGADO)
    {
    $query = $this->db->query("UPDATE TMOVCOMPL SET SAMF_ENCARREGADO = $SAMF_ENCARREGADO WHERE IDMOV = $IDMOV");       
    }
    
    //ATUALIZANDO EDIÇÃO
    public function updateGeral_old($IDMOV, $SAMF_ENCARREGADO)
    {
    $query = $this->db->query("UPDATE TMOVCOMPL SET SAMF_ENCARREGADO = $SAMF_ENCARREGADO WHERE IDMOV = $IDMOV");       
    }

    public function updateGeral_old2($data) {
        // Verifica se os dados foram passados corretamente
        if (!isset($data['IDMOV'], $data['STATUS'])) {
            return false;
        }
    
        // Define os dados que serão atualizados
        $dadosAtualizar = $data['STATUS'];
        $idmov = $data['IDMOV'];
    
        // Usando bindings para evitar SQL injection
        $query = $this->db->query("UPDATE TMOV SET STATUS = ? WHERE IDMOV = ?", array($dadosAtualizar, $idmov));
    
        // Verifica se a atualização foi bem-sucedida
        if ($this->db->affected_rows() >= 0) {  // Verifique se é >= 0 em vez de > 0
            return true; // Atualização bem-sucedida
        } else {
            return false; // Falha na atualização
        }
    }


    
    public function updateGeral($SAMF_CLI_TEXTO_BREVE, $SAMF_CLI_DESC_OP, $SAMF_OBSERVACAO, $SAMF_CLI_TAG, $SAMF_CLI_AREANV1, $SAMF_CLI_AREANV2, $SAMF_CLI_TIPOSC, $RDO_RESPONSAVEL_CLI2, $SAMF_CLI_AREANV0, $SAMF_ENCARREGADO, 
    $SAMF_VS_AMBIENTE, $SAMF_VS_ATERRADO, $IDMOV) {
    
        if (empty($IDMOV) || !is_numeric($IDMOV)) {
            throw new InvalidArgumentException('IDMOV inválido.');
        }        
        
        $sql = "UPDATE TMOVCOMPL SET 
                    SAMF_CLI_TEXTO_BREVE = ?, 
                    SAMF_CLI_DESC_OP = ?, 
                    SAMF_OBSERVACAO = ?, 
                    SAMF_CLI_TAG = ?, 
                    SAMF_CLI_AREANV1 = ?, 
                    SAMF_CLI_AREANV2 = ?, 
                    SAMF_CLI_TIPOSC = ?,
                    RDO_RESPONSAVEL_CLI2 = ?,
                    SAMF_CLI_AREANV0 = ?,
                    SAMF_ENCARREGADO = ?,
                    SAMF_VS_AMBIENTE = ?, 
                    SAMF_VS_ATERRADO = ?
                WHERE IDMOV = ?";
        
        try {
            
            $result = $this->db->query($sql, [
                $SAMF_CLI_TEXTO_BREVE, 
                $SAMF_CLI_DESC_OP, 
                $SAMF_OBSERVACAO, 
                $SAMF_CLI_TAG, 
                $SAMF_CLI_AREANV1, 
                $SAMF_CLI_AREANV2, 
                $SAMF_CLI_TIPOSC, 
                $RDO_RESPONSAVEL_CLI2,
                $SAMF_CLI_AREANV0,
                $SAMF_ENCARREGADO,
                $SAMF_VS_AMBIENTE, 
                $SAMF_VS_ATERRADO,
                $IDMOV
            ]);
            
            
            if ($this->db->affectedRows() > 0) {
                return true; 
            } else {
                return false; 
            }
        } catch (\Exception $e) {
            
            log_message('error', $e->getMessage());
            
            throw new \RuntimeException('Erro ao atualizar o registro: ' . $e->getMessage());
        }
    }




    // ATUALIZANDO OS DADOS COMPLEMENTARES DA TMOCOMPL DO RDO
    public function updateRDOTmovcompl($data)
    {
        
        if (!isset($data['IDMOV'])) {
            log_message('error', 'IDMOV não está definido no data fornecido.');
            return false;
        }

        $sql = "UPDATE TMOVCOMPL SET 
            RECMODIFIEDON = ?, 
            RECMODIFIEDBY = ?,
            SAMF_VS_INTERFER1 = ?, 
            SAMF_VS_INTERFER2 = ?, 
            SAMF_VS_INTERFER3 = ?, 
            SAMF_VS_INTERFER4 = ?, 
            SAMF_VS_INTERFER5 = ?, 
            SAMF_VS_INTERFER6 = ?, 
            SAMF_VS_INTERFER7 = ?, 
            SAMF_VS_INTERFER8 = ?, 
            SAMF_VS_INTERFER9 = ?, 
            SAMF_VS_MONTAGEM = ?, 
            SAMF_VS_MOBILIZACAO = ?, 
            SAMF_VS_DESMONTAGEM = ?, 
            SAMF_VS_ADEQUACAO = ?, 
            SAMF_CLI_TIPOSC = ?,            
            SAMF_VS_MANUTENCAO = ?,  
            SAMF_VS_ATICIVIL = ?,
            CODCOLIGADA = ?,            
            RDO_TURNO = ?,
            SAMF_RDO_TIPORDO = ?
            WHERE IDMOV = ?";

        $result = $this->db->query($sql, [
            $data['RECMODIFIEDON'],
            $data['RECMODIFIEDBY'],  
            $data['SAMF_VS_INTERFER1'], 
            $data['SAMF_VS_INTERFER2'], 
            $data['SAMF_VS_INTERFER3'], 
            $data['SAMF_VS_INTERFER4'], 
            $data['SAMF_VS_INTERFER5'], 
            $data['SAMF_VS_INTERFER6'], 
            $data['SAMF_VS_INTERFER7'], 
            $data['SAMF_VS_INTERFER8'], 
            $data['SAMF_VS_INTERFER9'], 
            $data['SAMF_VS_MONTAGEM'], 
            $data['SAMF_VS_MOBILIZACAO'], 
            $data['SAMF_VS_DESMONTAGEM'], 
            $data['SAMF_VS_ADEQUACAO'], 
            $data['SAMF_CLI_TIPOSC'], 
            $data['SAMF_VS_MANUTENCAO'],
            $data['SAMF_VS_ATICIVIL'],
            $data['CODCOLIGADA'], 
            $data['RDO_TURNO'],
            $data['SAMF_RDO_TIPORDO'],
            $data['IDMOV']
        ]);

        if ($result) {
            return true;
        } else {
            log_message('error', 'Erro ao atualizar dados: ' . json_encode($this->db->error()));
            return false;
        }
    }

    // ATUALIZANDO OS DADOS COMPLEMENTARES DA TMOCOMPL DO RDO
    public function updateVisitatmovcompl($data)
    {
        // Verifica se o campo IDMOV está definido
        if (!isset($data['IDMOV'])) {
            log_message('error', 'IDMOV não está definido nos dados fornecidos.');
            return false;
        }

        // SQL corrigido, removendo a vírgula extra antes do WHERE
        $sql = "UPDATE TMOVCOMPL SET 
            RECMODIFIEDON = ?, 
            RECMODIFIEDBY = ?,
            SAMF_VS_INTERFER1 = ?, 
            SAMF_VS_INTERFER2 = ?, 
            SAMF_VS_INTERFER3 = ?, 
            SAMF_VS_INTERFER4 = ?, 
            SAMF_VS_INTERFER5 = ?, 
            SAMF_VS_INTERFER6 = ?, 
            SAMF_VS_INTERFER7 = ?, 
            SAMF_VS_INTERFER8 = ?, 
            SAMF_VS_INTERFER9 = ?, 
            SAMF_VS_INTERFER10 = ?, 
            SAMF_VS_INTERFER11 = ?, 
            SAMF_VS_INTERFER12 = ?, 
            SAMF_VS_INTERFER13 = ?, 
            SAMF_VS_INTERFER14 = ?, 
            SAMF_VS_PP1 = ?,
            SAMF_VS_PP2 = ?,
            SAMF_VS_PP3 = ?,
            SAMF_VS_PP4 = ?,
            SAMF_VS_PP5 = ?,
            SAMF_VS_PP6 = ?,
            SAMF_VS_PP7 = ?,
            SAMF_VS_COMPLX = ?,
            SAMF_VS_AP1 = ?,
            SAMF_VS_AP2 = ?,
            CODCOLIGADA = ?,
            SAMF_VS_AMBIENTE = ?
            WHERE IDMOV = ?";

        // Executa a query com os valores fornecidos
        $result = $this->db->query($sql, [
            $data['RECMODIFIEDON'],
            $data['RECMODIFIEDBY'],
            $data['SAMF_VS_INTERFER1'],
            $data['SAMF_VS_INTERFER2'],
            $data['SAMF_VS_INTERFER3'],
            $data['SAMF_VS_INTERFER4'],
            $data['SAMF_VS_INTERFER5'],
            $data['SAMF_VS_INTERFER6'],
            $data['SAMF_VS_INTERFER7'],
            $data['SAMF_VS_INTERFER8'],
            $data['SAMF_VS_INTERFER9'],
            $data['SAMF_VS_INTERFER10'],
            $data['SAMF_VS_INTERFER11'],
            $data['SAMF_VS_INTERFER12'],
            $data['SAMF_VS_INTERFER13'],
            $data['SAMF_VS_INTERFER14'],
            $data['SAMF_VS_PP1'],
            $data['SAMF_VS_PP2'],
            $data['SAMF_VS_PP3'],
            $data['SAMF_VS_PP4'],
            $data['SAMF_VS_PP5'],
            $data['SAMF_VS_PP6'],
            $data['SAMF_VS_PP7'],
            $data['SAMF_VS_COMPLX'],
            $data['SAMF_VS_AP1'],
            $data['SAMF_VS_AP2'],
            $data['CODCOLIGADA'],
            $data['SAMF_VS_AMBIENTE'],
            $data['IDMOV']
        ]);

        // Verifica o resultado e retorna o status apropriado
        if ($result) {
            return true;
        } else {
            log_message('error', 'Erro ao atualizar dados: ' . json_encode($this->db->error()));
            return false;
        }
    }


     




    
    


    public function updateQrCodePL($IDMOV, $SAMF_CLI_QRCODE)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_CLI_QRCODE = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_CLI_QRCODE, $IDMOV]);
        return $result;
    }
    
    public function updateNV1PL($IDMOV, $SAMF_CLI_AREANV1, $SAMF_CLI_AREANV2)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_CLI_AREANV1 = ?, SAMF_CLI_AREANV2 = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_CLI_AREANV1, $SAMF_CLI_AREANV2, $IDMOV]);
        return $result;
    }

    public function updateLocalizacao($IDMOV, $SAMF_CLI_LOCANDAIME)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_CLI_LOCANDAIME2 = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_CLI_LOCANDAIME, $IDMOV]);
        return $result;
    }

    public function updateParadaPL($IDMOV, $SAMF_CLI_PARADA)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_CLI_PARADA = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_CLI_PARADA, $IDMOV]);
        return $result;
    }

    public function updatePisoPL($IDMOV, $SAMF_VS_PISO)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_VS_PISO = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_VS_PISO, $IDMOV]);
        return $result;
    }

    public function updateambienteaterrado($SAMF_VS_ATERRADO, $SAMF_VS_AMBIENTE, $IDMOV)
    {
        // Corrigido: o sinal de igual estava faltando para o SAMF_VS_AMBIENTE
        $sql = "UPDATE TMOVCOMPL SET SAMF_VS_ATERRADO = ?, SAMF_VS_AMBIENTE = ? WHERE IDMOV = ?";
        
        // Executa a query passando os valores de forma segura
        $result = $this->db->query($sql, [$SAMF_VS_ATERRADO, $SAMF_VS_AMBIENTE, $IDMOV]);
        
        // Retorna o resultado da operação
        return $result;
    }
    

    public function updateOBSPL($IDMOV, $SAMF_CLI_BMOBS)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_CLI_BMOBS = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_CLI_BMOBS, $IDMOV]);
        return $result;
    }

    public function updateDescpecas($IDMOV, $SAMF_VS_DESCPECAS)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_VS_DESCPECAS = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_VS_DESCPECAS, $IDMOV]);
        return $result;
    }

    public function updatetipoand($IDMOV, $SAMF_MTG_TIPOAND)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_MTG_TIPOAND = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_MTG_TIPOAND, $IDMOV]);
        return $result;
    }


    public function updatemtgoperacao($IDMOV, $SAMF_MTG_OPERACAO, $SAMF_MTG_MTLINEAR)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_MTG_OPERACAO = ?, SAMF_MTG_MTLINEAR = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_MTG_OPERACAO, $SAMF_MTG_MTLINEAR, $IDMOV]);
        return $result;
    }

    public function updateBoletaEmit($SAMF_MTG_BOLETAEMIT, $IDMOV)
    {
        $sql = "UPDATE TMOVCOMPL SET SAMF_MTG_BOLETAEMIT = ? WHERE IDMOV = ?";
        $result = $this->db->query($sql, [$SAMF_MTG_BOLETAEMIT, $IDMOV]);
        return $result;
    }





    /* TRAZENDO OS RDO EM CRIAÇÃO*/
    public function getCFOP()
    {
        $query = $this->db->query("
        SELECT IDNAT, CODNAT, NOME FROM DNATUREZA WHERE CODCOLIGADA = 1 ORDER BY CODNAT
        ");
        
        return $query->getResultArray();
    }


    

    
} 