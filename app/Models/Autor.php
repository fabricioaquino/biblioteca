<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $primaryKey = 'cod';
    protected $fillable = ['nome'];
    public $timestamps = false;


    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autor', 'autor_cod', 'livro_cod');
    }

    public function safeDelete(): bool
    {
        // Se o autor tiver livros, não exclui
        if ($this->livros()->exists()) {
            return false;
        }

        // Caso contrário, exclui normalmente
        return (bool) $this->delete();
    }
}
