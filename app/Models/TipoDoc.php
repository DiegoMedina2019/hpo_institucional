<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    use HasFactory;
    protected $table = 'tipos_doc';
    public $timestamps = false;

    //1:N 
    public function documentos()
    {
        return $this->hasMany(NoticiaDoc::class,'tipos_doc_id','id');
    }
}
