
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

        public function recuperarLivro($id){
            $query = 'select titulo_livro, capa_livro, sinopse_livro, autor_livro, id_categoria from tb_livro where id_livro = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }

    

?>