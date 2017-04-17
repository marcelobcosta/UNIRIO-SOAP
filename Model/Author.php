<?php

namespace SOAP\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Author extends Eloquent
{
    protected $table = 'autores';

    protected $guarded = [];

    public $timestamps = false;

    public function publications()
    {
        return $this->belongsToMany(Publication::class,'autores_publicacoes','autor_id','publicacao_id');
    }
}