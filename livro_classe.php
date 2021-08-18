
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
        
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }

        public function __get($atributo){
            return $this->$atributo;
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

        public function recuperarTodosLivros(){
            $query = 'select * from tb_livro';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function adicionaRemoveDestaque($id_livro, $destaque){
            $query = 'update tb_livro set destaque = :destaque where id_livro = :id_livro';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_livro',$id_livro);
            $stmt->bindValue(':destaque',$destaque);
            $stmt->execute();
        }

        public function excluirLivro($id_livro){
            $query = 'delete from tb_livro_usuario where id_livro = :id_livro; delete from tb_livro where id_livro = :id_livro;';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_livro',$id_livro);
            $stmt->execute();
        }

        public function inserirLivro(){
            $query = 'insert into tb_livro(titulo_livro,autor_livro,id_categoria,sinopse_livro,capa_livro) values(:titulo_livro,:autor_livro,:id_categoria,:sinopse_livro,:capa_livro);';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':titulo_livro', $this->titulo_livro);
            $stmt->bindValue(':autor_livro',$this->autor_livro);
            $stmt->bindValue(':id_categoria',$this->categoria_livro);
            $stmt->bindValue(':sinopse_livro',$this->sinopse_livro);
            $stmt->bindValue(':capa_livro',$this->capa_livro);
            $stmt->execute();
        }

        public function verificaLivro(){
            $query = 'select * from tb_livro where titulo_livro = :titulo_livro';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':titulo_livro',$this->titulo_livro);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function verificaCapa(){
            $query = 'select * from tb_livro where capa_livro = :capa_livro';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':capa_livro',$this->capa_livro);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }


    }
    

?>