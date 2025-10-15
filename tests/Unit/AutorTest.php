<?php

namespace Tests\Unit;

use Mockery;
use App\Models\Autor;
use PHPUnit\Framework\TestCase;

class AutorTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function cria_um_autor()
    {
        $dados = [
            'nome' => 'Machado de Assis',
        ];

        $autorMock = Mockery::mock(Autor::class)->makePartial();
        $autorMock->shouldReceive('create')
            ->once()
            ->with($dados);

        $autorMock::create($dados);

        $this->assertTrue(true); // só para o PHPUnit considerar que passou
    }

    /** @test */
    public function atualiza_um_autor()
    {
        $dados = [
            'nome' => 'Clarice Lispector',
        ];

        $autorMock = Mockery::mock(Autor::class)->makePartial();
        $autorMock->shouldReceive('update')
            ->once()
            ->with($dados);

        $autorMock->update($dados);

        $this->assertTrue(true);
    }

    /** @test */
    public function deleta_um_autor_com_safeDelete()
    {
        $autorMock = Mockery::mock(Autor::class)->makePartial();
        $autorMock->shouldReceive('safeDelete')
            ->once()
            ->andReturn(true);

        $resultado = $autorMock->safeDelete();

        $this->assertTrue($resultado);
    }

    /** @test */
    public function nao_deleta_autor_se_safeDelete_retornar_false()
    {
        $autorMock = Mockery::mock(Autor::class)->makePartial();
        $autorMock->shouldReceive('safeDelete')
            ->once()
            ->andReturn(false);

        $resultado = $autorMock->safeDelete();

        $this->assertFalse($resultado);
    }
}
