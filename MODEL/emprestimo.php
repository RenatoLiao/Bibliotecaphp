<?php
    namespace MODEL;

    class Emprestimo {
        private ?int $id;
        private ?string $data_emprestimo;
        private ?string $data_devolucao;
        private ?int $id_livro;
        private ?int $id_usuario;

        public function __construct() {
            $this->id = null;
            $this->data_emprestimo = null;
            $this->data_devolucao = null;
            $this->id_livro = null;
            $this->id_usuario = null;
        }

        public function getId(): ?int {
            return $this->id;
        }

        public function setId(int $id): void {
            $this->id = $id;
        }

        public function getDataEmprestimo(): ?string {
            return $this->data_emprestimo;
        }

        public function setDataEmprestimo(string $data_emprestimo): void {
            $this->data_emprestimo = $data_emprestimo;
        }

        public function getDataDevolucao(): ?string {
            return $this->data_devolucao;
        }

        public function setDataDevolucao(string $data_devolucao): void {
            $this->data_devolucao = $data_devolucao;
        }

        public function getIdLivro(): ?int {
            return $this->id_livro;
        }

        public function setIdLivro(int $id_livro): void {
            $this->id_livro = $id_livro;
        }

        public function getIdUsuario(): ?int {
            return $this->id_usuario;
        }

        public function setIdUsuario(int $id_usuario): void {
            $this->id_usuario = $id_usuario;
        }
    }
?>