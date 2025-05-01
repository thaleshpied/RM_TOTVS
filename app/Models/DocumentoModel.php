<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentoModel extends Model
{
    protected $table      = 'documentos'; // Nome da tabela no banco
    protected $primaryKey = 'id'; // Chave primária

    protected $allowedFields = ['id', 'tipo', 'data', 'nome', 'status']; // Campos permitidos para inserção

    // Se você quiser inserir as datas automaticamente:
    protected $useTimestamps = true; // Se você tem os campos created_at e updated_at no seu banco
}