<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NoticiaDoc extends Model
{
    use HasFactory;
    protected $table = 'noticia_docs';
    public $timestamps = false;

    public function create($noticia_id, $request)
    {
        $data = $this->gestioDocs($request);

        $this->isEnlace = ($request->isEnlace == "1");
        $this->url_doc = $data['url'];
        $this->nombre_doc = $data['nombre_doc'];
        $this->isPortada = 1;
        $this->noticias_id = $noticia_id;
        $this->tipos_doc_id = $request->tipo;   
        $this->save();
    }
    public function edit($request)
    {
        $data = $this->gestioDocs($request);

        $this->isEnlace = ($request->isEnlace == "1");
        if (count($data)>0) {
            $this->url_doc = $data['url'];
            $this->nombre_doc = $data['nombre_doc'];
        }
        $this->isPortada = 1;
        $this->tipos_doc_id = $request->tipo;   
        $this->save();
    }
    public function gestioDocs($request)
    {
        $user_id = auth()->user()->id;
        $data = array();
        //pregunta si es un video de Youtube, si es SI aplica logica para separar el codigo del link
        if($request->isEnlace == "1"){
            $video = $request->link;//"https://www.youtube.com/watch?v=_8MjEhfKRbI&t=1204s";
            $youtube_code = explode('&', explode('=',$video)[1] )[0];
            $url = "https://www.youtube.com/embed/".$youtube_code;
            $data['url'] = $url;
            $data['nombre_doc'] = $video;
        }else {
            if ($request->file('portada') != null) {
                if ( !Storage::disk('public')->exists("files/noticias")) {
                    if(Storage::disk('public')->makeDirectory("/files/noticias" )){
                        //dd("creo la ruta");
                        $ruta = public_path()."/files/noticias";
                    }else{                
                        //dd("No creo nada devolver algo un error ");
                        DB::rollback();
                        Log::error('**ALTA DE NOTICA: Class->NoticiaDoc**: No se pudo crear el directorio para la noticia');
                        return back()->with('error',' No se pudo crear el directorio para la noticia, por favor, intente de nuevo');
                    }            
                }else{
                    //dd("entro al else ya existe la carpeta");
                    $ruta = public_path()."/files/noticias";
                }
                $file = $request->file('portada');
        
                $fileName = $user_id ."_". uniqid() ."_". $file->getClientOriginalName();
            
                $file->move($ruta, $fileName);
                $data['url'] = "/files/noticias/".$fileName;
                $data['nombre_doc'] = $fileName;

                //paso a eliminar el archivo viejo 
                $exists = Storage::disk('public')->has($this->url_doc);
                if ($exists) {
                    Storage::disk('public')->delete($this->url_doc);
                }
            }
        }
        return $data;
    }

    //1:N invrsa
    public function noticia()
    {
        return $this->belongsTo(Noticia::class,'noticias_id','id');
    }
    //1:N invrsa
    public function tipoDoc()
    {
        return $this->belongsTo(TipoDoc::class,'tipos_doc_id','id');
    }

}
