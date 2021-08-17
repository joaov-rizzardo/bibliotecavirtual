
<?php
    class Livro {
        private $titulo_livro;
        private $autor_livro;
        private $categoria_livro;
        private $sinopse_livro;
        private $capa_livro;
        private $destaque;
        private $conexao;

        public function __construct(Conexao $conexao){
            $this->conexao = $conexao->conectar();
        }
        
        public function recuperarLivrosCategoria($categoria){
            $query = 'select * from tb_livro where id_categoria = :categoria';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':categoria', $categoria);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarLivrosDestaque(){
            $query = 'select * from tb_livro where destaque = 1';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function verificarLivroUsuario($id_livro, $id_usuario){
            $query = 'select * from tb_livro_usuario where id_livro = :id_livro and id_usuario = :id_usuario';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_livro',$id_livro);
            $stmt->bindValue(':id_usuario',$id_usuario);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function adicionaLivro($id_livro, $id_usuario){
            $query = 'insert into tb_livro_usuario(id_livro,id_usuario)values(:id_livro,:id_usuario)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_livro', $id_livro);
            $stmt->bindValue(':id_usuario', $id_usuario).
            $stmt->execute();
        }

        public function recuperarLivrosUsuario($id_usuario){
            $query = 'select * from tb_livro as l left join tb_livro_usuario as la on l.id_livro = la.id_livro where la.id_usuario = :id_usuario';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_usuario',$id_usuario);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function removeLivroUsuario($id_livro, $id_usuario){
            $query = 'delete from tb_livro_usuario where id_livro = :id_livro and id_usuario = :id_usuario';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_livro',$id_livro);
            $stmt->bindValue(':id_usuario',$id_usuario);
            $stmt->execute();
        }

        public function recuperaLivro($id_livro){
            $query = 'select * from tb_livro where id_livro = :id_livro';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_livro', $id_livro);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }


    }
    

?>