<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ================================
        // Inserção de autores
        // ================================
        DB::table('autores')->insert([
            ['nome' => 'Machado de Assis'],
            ['nome' => 'Clarice Lispector'],
            ['nome' => 'José Saramago'],
            ['nome' => 'George Orwell'],
            ['nome' => 'J.K. Rowling'],
            ['nome' => 'Paulo Coelho'],
            ['nome' => 'Isaac Asimov'],
            ['nome' => 'H.G. Wells'],
        ]);

        // ================================
        // Inserção de assuntos
        // ================================
        DB::table('assuntos')->insert([
            ['descricao' => 'Lit. Brasileira'],
            ['descricao' => 'Ficção Científica'],
            ['descricao' => 'Romance'],
            ['descricao' => 'Distopia'],
            ['descricao' => 'Fantasia'],
        ]);

        // ================================
        // Inserção de livros
        // ================================
        DB::table('livros')->insert([
            ['titulo' => 'Dom Casmurro', 'editora' => 'Editora A', 'edicao' => 1, 'ano_publicacao' => '1899'],
            ['titulo' => 'A Hora da Estrela', 'editora' => 'Editora B', 'edicao' => 1, 'ano_publicacao' => '1977'],
            ['titulo' => 'Ensaio sobre a Cegueira', 'editora' => 'Editora C', 'edicao' => 1, 'ano_publicacao' => '1995'],
            ['titulo' => '1984', 'editora' => 'Editora D', 'edicao' => 1, 'ano_publicacao' => '1949'],
            ['titulo' => 'Harry Potter e a Pedra Filosofal', 'editora' => 'Editora E', 'edicao' => 1, 'ano_publicacao' => '1997'],
            ['titulo' => 'O Alquimista', 'editora' => 'Editora F', 'edicao' => 1, 'ano_publicacao' => '1988'],
            ['titulo' => 'Fundação', 'editora' => 'Editora G', 'edicao' => 1, 'ano_publicacao' => '1951'],
            ['titulo' => 'Guerra dos Mundos', 'editora' => 'Editora H', 'edicao' => 1, 'ano_publicacao' => '1898'],
            ['titulo' => 'Contos Fantásticos', 'editora' => 'Editora I', 'edicao' => 1, 'ano_publicacao' => '2000'],
            ['titulo' => 'Mistério Coletivo', 'editora' => 'Editora J', 'edicao' => 1, 'ano_publicacao' => '2020'],
        ]);

        // ================================
        // Associação livros x autores
        // ================================
        DB::table('livro_autor')->insert([
            ['livro_cod' => 1, 'autor_cod' => 1],
            ['livro_cod' => 2, 'autor_cod' => 2],
            ['livro_cod' => 3, 'autor_cod' => 3],
            ['livro_cod' => 4, 'autor_cod' => 4],
            ['livro_cod' => 5, 'autor_cod' => 5],
            ['livro_cod' => 6, 'autor_cod' => 6],
            ['livro_cod' => 7, 'autor_cod' => 7],
            ['livro_cod' => 7, 'autor_cod' => 2],
            ['livro_cod' => 8, 'autor_cod' => 8],
            ['livro_cod' => 8, 'autor_cod' => 4],
            ['livro_cod' => 9, 'autor_cod' => 2],
            ['livro_cod' => 9, 'autor_cod' => 1],
            ['livro_cod' => 9, 'autor_cod' => 3],
            ['livro_cod' => 10, 'autor_cod' => 5],
            ['livro_cod' => 10, 'autor_cod' => 6],
        ]);

        // ================================
        // Associação livros x assuntos
        // ================================
        DB::table('livro_assunto')->insert([
            ['livro_cod' => 1, 'assunto_cod' => 1],
            ['livro_cod' => 1, 'assunto_cod' => 3],
            ['livro_cod' => 2, 'assunto_cod' => 1],
            ['livro_cod' => 2, 'assunto_cod' => 3],
            ['livro_cod' => 3, 'assunto_cod' => 3],
            ['livro_cod' => 3, 'assunto_cod' => 2],
            ['livro_cod' => 4, 'assunto_cod' => 4],
            ['livro_cod' => 4, 'assunto_cod' => 2],
            ['livro_cod' => 5, 'assunto_cod' => 5],
            ['livro_cod' => 6, 'assunto_cod' => 3],
            ['livro_cod' => 6, 'assunto_cod' => 5],
            ['livro_cod' => 7, 'assunto_cod' => 2],
            ['livro_cod' => 7, 'assunto_cod' => 4],
            ['livro_cod' => 8, 'assunto_cod' => 2],
            ['livro_cod' => 8, 'assunto_cod' => 4],
            ['livro_cod' => 9, 'assunto_cod' => 1],
            ['livro_cod' => 9, 'assunto_cod' => 3],
            ['livro_cod' => 9, 'assunto_cod' => 5],
            ['livro_cod' => 10, 'assunto_cod' => 3],
            ['livro_cod' => 10, 'assunto_cod' => 5],
        ]);
    }
}
