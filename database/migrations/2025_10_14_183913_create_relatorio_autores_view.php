<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW relatorio_autores AS
            SELECT 
                a.cod AS autor_cod,
                a.nome AS autor_nome,
                l.cod AS livro_cod,
                l.titulo AS livro_titulo,
                l.editora,
                l.edicao,
                l.ano_publicacao,
                GROUP_CONCAT(DISTINCT s.descricao ORDER BY s.descricao ASC SEPARATOR ', ') AS assuntos
            FROM autores a
            JOIN livro_autor la ON a.cod = la.autor_cod
            JOIN livros l ON la.livro_cod = l.cod
            LEFT JOIN livro_assunto ls ON l.cod = ls.livro_cod
            LEFT JOIN assuntos s ON ls.assunto_cod = s.cod
            GROUP BY a.cod, a.nome, l.cod, l.titulo, l.editora, l.edicao, l.ano_publicacao
            ORDER BY a.nome, l.titulo;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS relatorio_autores");
    }
};
