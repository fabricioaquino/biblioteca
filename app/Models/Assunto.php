<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $table = 'assuntos';
    protected $primaryKey = 'cod';
    protected $fillable = ['descricao'];
    public $timestamps = false;

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'assunto_cod', 'livro_cod');
    }

    public function safeDelete(): bool
    {
        // Impede exclusão se houver livros associados
        if ($this->livros()->exists()) {
            return false;
        }

        return (bool) $this->delete();
    }
}
