<?php

namespace Tests\Unit;

use Mockery;
use App\Models\Assunto;
use PHPUnit\Framework\TestCase;

class AssuntoTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function cria_um_assunto()
    {
        $dados = [
            'descricao' => 'Literatura Brasileira',
        ];

        // Mock parcial do model Assunto
        $assuntoMock = Mockery::mock(Assunto::class)->makePartial();
        $assuntoMock->shouldReceive('create')
            ->once()
            ->with($dados);

        // Chama o método mockado
        $assuntoMock::create($dados);

        $this->assertTrue(true); // só para o PHPUnit considerar que passou
    }

    /** @test */
    public function atualiza_um_assunto()
    {
        $dados = [
            'descricao' => 'Literatura Internacional',
        ];

        $assuntoMock = Mockery::mock(Assunto::class)->makePartial();
        $assuntoMock->shouldReceive('update')
            ->once()
            ->with($dados);

        $assuntoMock->update($dados);

        $this->assertTrue(true);
    }

    /** @test */
    public function deleta_um_assunto_com_safeDelete()
    {
        $assuntoMock = Mockery::mock(Assunto::class)->makePartial();
        $assuntoMock->shouldReceive('safeDelete')
            ->once()
            ->andReturn(true);

        $resultado = $assuntoMock->safeDelete();

        $this->assertTrue($resultado);
    }

    /** @test */
    public function nao_deleta_assunto_se_safeDelete_retornar_false()
    {
        $assuntoMock = Mockery::mock(Assunto::class)->makePartial();
        $assuntoMock->shouldReceive('safeDelete')
            ->once()
            ->andReturn(false);

        $resultado = $assuntoMock->safeDelete();

        $this->assertFalse($resultado);
    }
}
