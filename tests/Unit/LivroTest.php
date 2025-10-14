<?php

namespace Tests\Unit;

use Mockery;
use App\Models\Livro;
use PHPUnit\Framework\TestCase;

class LivroTest extends TestCase
{
    /** @test */
    public function cria_um_livro_e_sincroniza_relacoes_usando_mocks()
    {
        $dados = [
            'titulo' => 'Livro Teste',
            'valor' => 'R$ 1.234,56',
            'autor_ids' => [1, 2],
            'assunto_ids' => [3, 4],
        ];

        // Mock do modelo Livro
        $livroMock = Mockery::mock(Livro::class)->makePartial();

        // Mock do método estático create()
        $livroMock->shouldReceive('create')
            ->once()
            ->with(Mockery::on(function ($arg) {
                // Verifica se o valor foi convertido corretamente
                return $arg['valor'] === 1234.56;
            }))
            ->andReturnSelf();

        // Mock das relações
        $livroMock->shouldReceive('autores->sync')
            ->once()
            ->with($dados['autor_ids']);

        $livroMock->shouldReceive('assuntos->sync')
            ->once()
            ->with($dados['assunto_ids']);

        // Chama o método
        $livroMock::createWithRelations($dados);

        Mockery::close();
    }
}
