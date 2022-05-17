<?php

    include_once "conf/Conexao.php";


    class Quadrado{
        private $id;
        private $lado;
        private $cor;

        public function __construct($id, $lado, $cor) {
            $this->setId($id);
            $this->setLado($lado);
            $this->setCor($cor);
        }

        public function __toString() {
            return  "[Quadrado]<br>Lado: ".$this->getlado()."<br>".
                    "Cor: ".$this->getcor()."<br>".
                    "Area: ".$this->Area()."<br>".
                    "Perimetro: ".$this->Perimetro()."<br>".
                    "Diagonal: ".$this->Diagonal()."<br>";
        }

        public function setId($id) {
            if ($id > 0)
                return  $this -> id = $id ;
        }
        
        
        public function setLado($lado) {
            if ($lado > 0)
                return  $this -> lado = $lado ;
        }

        public function setCor($cor) {
            if (strlen($cor) > 0)
                return  $this -> cor = $cor ;
        }

        Public function getId () {
            return  $this->id;
        }

        Public function getLado () {
            return  $this->lado;
        }

        Public function getCor(){
            return  $this ->cor;
        }

        public function Area() {
            //return $this->lado * $this->lado;
            $area = floatval($this->getLado()) * floatval($this->getLado());
            return $area;
        }

        public function Perimetro() {
            //return $this->lado * 4;
            $perimetro = floatval($this->getLado()) * 4;
            return $perimetro;
        }

        public function Diagonal() {
            //return $this->lado * sqrt(2);
            $diagonal = floatval($this->getLado()) * sqrt(2);
            return $diagonal;
        }
    

        public function salvar(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor) VALUES (:lado, :cor)');
            $stmt->bindParam(':lado',$this->lado, PDO::PARAM_STR);
            $stmt->bindParam(':cor',$this->cor, PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('DELETE FROM quadrado WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function editar(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE quadrado SET lado = :lado, cor = :cor WHERE id = :id');
            $stmt->bindValue(':id', $this->getId());
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());
            return $stmt->execute();
        }

        
    }


?>