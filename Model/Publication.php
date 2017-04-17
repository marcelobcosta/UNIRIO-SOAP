<?php
namespace SOAP\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Publication extends Eloquent {

    protected $table = 'publicacoes';

    protected $guarded = [];

    public $timestamps = false;

    public function authors()
    {
        return $this->belongsToMany(Author::class,'autores_publicacoes','publicacao_id','autor_id');
    }

}