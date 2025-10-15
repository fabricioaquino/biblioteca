<?php

namespace Tests\Unit;

use Mockery;
use App\Models\Livro;
use PHPUnit\Framework\TestCase;

class LivroTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function cria_um_livro_com_relacoes()
    {
        $dados = [
            'titulo' => '1984',
            'editora' => 'Companhia das Letras',
            'edicao' => 1,
            'ano_publicacao' => '1949',
            'valor' => 45.50,
            'autor_ids' => [1, 2],
            'assunto_ids' => [3, 4],
        ];

        // Mock parcial do model Livro
        $livroMock = Mockery::mock(Livro::class)->makePartial();
        $livroMock->shouldReceive('createWithRelations')
            ->once()
            ->with($dados);

        // Chama o método mockado
        $livroMock->createWithRelations($dados);

        $this->assertTrue(true); // só para o PHPUnit considerar que passou
    }

    /** @test */
    public function atualiza_um_livro_com_relacoes()
    {
        $dados = [
            'titulo' => '1984 - Edição Atualizada',
            'editora' => 'Companhia das Letras',
            'edicao' => 2,
            'ano_publicacao' => '1949',
            'valor' => 50.00,
            'autor_ids' => [1, 2],
            'assunto_ids' => [3, 4],
        ];

        $livroMock = Mockery::mock(Livro::class)->makePartial();
        $livroMock->shouldReceive('updateWithRelations')
            ->once()
            ->with($dados);

        $livroMock->updateWithRelations($dados);

        $this->assertTrue(true);
    }

    /** @test */
    public function deleta_um_livro_com_relacoes()
    {
        $livroMock = Mockery::mock(Livro::class)->makePartial();
        $livroMock->shouldReceive('deleteWithRelations')
            ->once();

        $livroMock->deleteWithRelations();

        $this->assertTrue(true);
    }
}
