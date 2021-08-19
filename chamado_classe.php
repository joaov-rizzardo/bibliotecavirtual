<?php

    class Chamado {
        private $id_usuario;
        private $assunto;
        private $categoria;
        private $descricao;
        private $conexao;

        public function __construct(Conexao $conexao){
            $this->conexao = $conexao->conectar();
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo = $valor;
            return $this;
        }

        public function abrirChamado(){
            $query = 'insert into tb_chamado(id_usuario,assunto_chamado,categoria_chamado,descricao_chamado)values(:id_usuario,:assunto_chamado,:categoria_chamado,:descricao_chamado)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
            $stmt->bindValue(':assunto_chamado',$this->__get('assunto'));
            $stmt->bindValue(':categoria_chamado',$this->__get('categoria'));
            $stmt->bindValue(':descricao_chamado',$this->__get('descricao'));
            $stmt->execute();
        }

        public function recuperaChamadosUsuario($id_usuario){
            $query = "select 
                        c.id_chamado,u.nome_usuario,c.assunto_chamado, c.status_chamado, c.categoria_chamado, c.descricao_chamado, date_format(c.data_chamado,'%d/%m/%Y %H:%i') as data 
                    from 
                        tb_chamado as c left join tb_usuario as u on(c.id_usuario = u.id_usuario)
                    where 
                        c.id_usuario = :id_usuario
                    order by data desc";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function recuperaChamado($id_chamado){
            $query = "select 
                    c.id_chamado,u.nome_usuario, c.id_usuario,c.assunto_chamado, c.status_chamado, c.categoria_chamado, c.descricao_chamado, date_format(c.data_chamado,'%d/%m/%Y %H:%i') as data 
                from 
                    tb_chamado as c left join tb_usuario as u on(c.id_usuario = u.id_usuario)
                where 
                    c.id_chamado = :id_chamado";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_chamado', $id_chamado);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function fecharChamado($id_chamado){
            $query = "update tb_chamado set status_chamado = 'Encerrado' where id_chamado = :id_chamado";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_chamado', $id_chamado);
            $stmt->execute();
        }

        public function recuperaChamados(){
            $query = "select 
                        c.id_chamado,u.nome_usuario,c.assunto_chamado, c.status_chamado, c.categoria_chamado, c.descricao_chamado, date_format(c.data_chamado,'%d/%m/%Y %H:%i') as data 
                    from 
                        tb_chamado as c left join tb_usuario as u on(c.id_usuario = u.id_usuario)
                    order by data desc";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }
    }
?>