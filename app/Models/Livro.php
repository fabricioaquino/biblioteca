<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $primaryKey = 'cod';
    protected $fillable = ['titulo', 'editora', 'edicao', 'ano_publicacao', 'valor'];
    public $timestamps = false;

    /**
     * Relacionamento muitos-para-muitos com Autores
     * usando a tabela pivot livro_autor
     */
    public function autores()
    {
        return $this->belongsToMany(
            Autor::class,        // Modelo relacionado
            'livro_autor',       // Tabela pivot
            'livro_cod',         // Chave estrangeira do livro na pivot
            'autor_cod'          // Chave estrangeira do autor na pivot
        );
    }

    /**
     * Relacionamento muitos-para-muitos com Assuntos
     * usando a tabela pivot livro_assunto
     */
    public function assuntos()
    {
        return $this->belongsToMany(
            Assunto::class,      // Modelo relacionado
            'livro_assunto',     // Tabela pivot
            'livro_cod',         // Chave estrangeira do livro na pivot
            'assunto_cod'        // Chave estrangeira do assunto na pivot
        );
    }

    // Accessor para retornar os nomes dos autores como string
    public function getAutoresNomesAttribute()
    {
        return $this->autores->pluck('nome')->join(', ');
    }

    public function getAssuntosNomesAttribute()
    {
        return $this->assuntos->pluck('descricao')->join(', ');
    }

    public static function createWithRelations(array $dados): self
    {
        $dados = self::prepareData($dados);
        $livro = self::create($dados);
        $livro->syncRelations($dados);

        return $livro;
    }

    public function updateWithRelations(array $dados): bool
    {
        $dados = self::prepareData($dados);
        $atualizado = $this->update($dados);
        $this->syncRelations($dados);

        return $atualizado;
    }

    /**
     * Converte e ajusta os dados antes de salvar.
     */
    private static function prepareData(array $dados): array
    {
        if (isset($dados['valor'])) {
            $valor = str_replace(['R$ ', '.', ','], ['', '', '.'], $dados['valor']);
            $dados['valor'] = (float) $valor;
        }

        return $dados;
    }

    /**
     * Sincroniza os relacionamentos (autores e assuntos).
     */
    private function syncRelations(array $dados): void
    {
        if (isset($dados['autor_ids'])) {
            $this->autores()->sync($dados['autor_ids']);
        }

        if (isset($dados['assunto_ids'])) {
            $this->assuntos()->sync($dados['assunto_ids']);
        }
    }
}
