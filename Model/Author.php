<?php
/**
 * Created by PhpStorm.
 * User: marcelobrunocostaesilva
 * Date: 12/04/17
 * Time: 17:20
 */

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