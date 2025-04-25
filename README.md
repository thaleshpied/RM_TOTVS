# Aplicação Web em CodeIgniter 4 com SQL Server

Este repositório contém uma aplicação web desenvolvida com o framework **CodeIgniter 4**, utilizando **SQL Server** como banco de dados. 

A aplicação contém recursos para usuários do ERP TOTVS RM com o foco em Gestão de Estoque e Fiscal.

---

## 🚀 Tecnologias Utilizadas

- PHP 8.x
- CodeIgniter 4
- SQL Server
- Bootstrap 5
- Javascript
- Datatable JS
- **XAMPP** (recomendado para ambiente local)

---

## ✅ Requisitos

- XAMPP instalado (com PHP 8.x)
- Composer instalado
- Driver `php_sqlsrv.dll` (disponível neste repositório)

---

## 🧩 Como configurar o ambiente local

Siga os passos abaixo para rodar a aplicação em ambiente local com suporte ao SQL Server.

### ✅ Passo 1 – Instalar o XAMPP com PHP 8.x

Baixe e instale o **XAMPP** com uma versão do PHP compatível com o driver SQL Server (recomenda-se PHP 8.x).

🔗 [https://www.apachefriends.org/pt_br/index.html](https://www.apachefriends.org/pt_br/index.html)

---

### ✅ Passo 2 – Clonar o repositório

Clone o repositório para a pasta htdocs do XAMPP 


### ✅ Passo 3 – Copiar o driver SQL Server
O driver necessário (php_sqlsrv.dll) está localizado em: app/Libraries/DRIVESQL/php_sqlsrv.dll

Copie esse arquivo para a pasta de extensões do PHP no XAMPP: C:\xampp\php\ext

Depois disso, edite o arquivo: C:\xampp\php\php.ini E adicione a seguinte linha no final (ou próximo das outras extensions): extension=php_sqlsrv.dll

### ✅ Passo 4 – Configurar os dados de acesso ao banco
Copie o arquivo de exemplo: cp env .env

Edite com as credenciais do seu SQL Server:

database.default.hostname = localhost
database.default.database = nome_da_sua_base
database.default.username = seu_usuario
database.default.password = sua_senha
database.default.DBDriver = SQLSRV

Ou configurando o arquivo app/Config/Database.php

### ✅ Passo 5 – Iniciar o Apache pelo XAMPP
Acesse o projeto via navegador: http://localhost/seu-projeto/public

📂 Estrutura do Projeto
├── app/
│   ├── Config/
│   ├── Controllers/
│   ├── Libraries/
│   │   └── DRIVESQL/         ← Driver SQL Server (php_sqlsrv.dll)
│   └── ...
├── public/
├── writable/
├── vendor/
├── instalador.bat            ← Script de instalação do driver
└── README.md


