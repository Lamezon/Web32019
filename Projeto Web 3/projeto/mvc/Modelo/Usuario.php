<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;

class Usuario extends Modelo
{
    const BUSCAR_POR_LOGIN = 'SELECT * FROM usuarios WHERE login = ? LIMIT 1';
    const INSERIR = 'INSERT INTO usuarios(login,password) VALUES (?, ?)';
    private $id;
    private $login;
    private $password;
    private $password_secundario;

    public function __construct(
        $login,
        $password,
        $id = null
    ) {
        $this->id = $id;
        $this->login = $login;
        $this->password_secundario = $password;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }


    public function verificarSenha($password_secundario)
    {
        return password_verify($password_secundario, $this->password);
    }

    protected function verificarErros()
    {
        if (strlen($this->login) < 3) {
            $this->setErroMensagem('login', 'Tamanho do login é muito curto.');
        }

        if (strlen($this->password_secundario) < 3) {
            $this->setErroMensagem('password', 'Tamanho da senha é muito curta.');
        }
        if (self::buscarLogin($this->login) != null ) {
            $this->setErroMensagem('login', 'Login já existe.');
        }
        if ($_POST["password"] !== $_POST["password2"]) {
            $this->setErroMensagem('password2', 'A senha não é a mesma, tente novemente!');
        }

        if ($_POST["login"] === $_POST["password"]) {
            $this->setErroMensagem('password', 'Login e senha não podem ser o mesmo!');
        }

    }

    public function salvar()
    {
        $this->inserir();
    }

    private function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->login, PDO::PARAM_STR);
        $comando->bindValue(2, $this->password, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function buscarLogin($login)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_POR_LOGIN);
        $comando->bindValue(1, $login, PDO::PARAM_STR);
        $comando->execute();
        $objeto = null;
        $registro = $comando->fetch();
        if ($registro) {
            $objeto = new Usuario(
                $registro['login'],
                '',
                $registro['id']

            );
            $objeto->password = $registro['password'];
        }
        return $objeto;
    }
}
