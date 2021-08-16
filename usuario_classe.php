<?php
    class Usuario{
        private $usuario;
        private $senha;
        private $conexao;

        public function __construct(Conexao $conexao){
            $this->conexao = $conexao->conectar();
        }

        public function __get($atributo){
            return $this->$atributo;
        }   

        public function __set($atributo,$valor){
            $this->$atributo = $valor;
        }

        public function logar(){

        }

        public function cadastrar(){
            $query = "insert into tb_usuario(nome_usuario, senha_usuario)values(:usuario,:senha)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':usuario', $this->usuario);
            $stmt->bindValue(':senha', $this->senha);
            $stmt->execute();
        }

        public function recuperaUsuario(){
            $query = "select * from tb_usuario where nome_usuario = :usuario";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':usuario', $this->__get('usuario'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function logoff(){
            session_destroy();
            header('Location: index.php');
        }
    }
?>