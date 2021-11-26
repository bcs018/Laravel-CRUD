<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'categoria',
        'id',
        'autor',
        'ebook',
        'tamanho_arquivo',
        'peso',
        'pessoa_id'
    ];
}
