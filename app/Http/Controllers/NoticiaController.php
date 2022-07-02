<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\NoticiaDoc;
use App\Models\TipoDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::All()->where('user_creador',auth()->user()->id);
        return view('admin.noticias.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocs = TipoDoc::All();
        return view('admin.noticias.create',compact('tipoDocs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
        $validado = Validator::make($request->all(), [
            'titulo'=>'required|string',
            'resumen'=>'required|string',
            'tipo'=>'required'
        ]);
        if ($validado->fails() ) {
            return back()
                        ->withErrors($validado)
                        ->withInput($request->all());
        }
        switch ($request->tipo) {
            case '1':
                $request->validate([
                    'portada' => 'image|mimes:jpeg,png,jpg,gif',
                  ],[
                    'portada' => 'Debe seleccionar un archivo de tipo jpeg,png,jpg,gif',
                ]);
                break;
            case '2':
                if ($request->isEnlace == "1") {
                    $request->validate([
                        'link' => 'required',
                      ],[
                        'link' => 'El link del video de youtube es requerido',
                    ]);
                }else{
                    $request->validate([
                        'portada' => 'mimetypes:video/avi,video/mpeg,video/mp4',
                      ],[
                        'portada' => 'Debe seleccionar un archivo de tipo avi,mpeg o mp4',
                    ]);
                }  
                break;            
            default:
                $request->validate([
                    'portada'=>'required',
                ],[
                    'portada' => 'Debe seleccionar algun archivo',
                ]);
                break;
        }

        DB::beginTransaction();
        try {
            $noticia = new Noticia();
            $noticia->create($request);

            $doc = new NoticiaDoc();
            $doc->create($noticia->id, $request);
            
            DB::commit();
            return redirect()->route('admin.noticias')->with('success','Noticia creada correctamente');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('**ALTA DE NOTICA**: ' . $th->getMessage());
            return back()->with("error","Disculpe, algo salio mal en medio del proceso es posible que deba repetir la carga o comunicarse con Ciatware");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $noticia = Noticia::find($id);
        $docs = $noticia->documentos[0];
        $tipoDocs = TipoDoc::All();
        return view('admin.noticias.edit',compact('noticia','docs','tipoDocs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
       // dd($request);
        $validado = Validator::make($request->all(), [
            'titulo'=>'required|string',
            'resumen'=>'required|string',
            'tipo'=>'required'
        ]);
        if ($validado->fails() ) {
            return back()
                        ->withErrors($validado)
                        ->withInput($request->all());
        }
        switch ($request->tipo) {
            case '1':
                if ($request->file('portada') != null) {

                    $request->validate([
                        'portada' => 'image|mimes:jpeg,png,jpg,gif',
                      ],[
                        'portada' => 'Debe seleccionar un archivo de tipo jpeg,png,jpg,gif',
                    ]);

                }
                break;
            case '2':
                if ($request->isEnlace == "1") {
                    $request->validate([
                        'link' => 'required',
                      ],[
                        'link' => 'El link del video de youtube es requerido',
                    ]);
                }else{
                    if ($request->file('portada') != null) {
                        $request->validate([
                            'portada' => 'mimetypes:video/avi,video/mpeg,video/mp4',
                          ],[
                            'portada' => 'Debe seleccionar un archivo de tipo avi,mpeg o mp4',
                        ]);
                    }
                }                
                break;            
            default:
                if ($request->file('portada') != null) {
                    $request->validate([
                        'portada'=>'required',
                    ],[
                        'portada' => 'Debe seleccionar algun archivo',
                    ]);
                }
                break;
        }

        DB::beginTransaction();
        try {
            $noticia = Noticia::find($id);
            $noticia->edit($request);

            $doc = $noticia->documentos[0];
            $doc->edit( $request );
            
            DB::commit();
            return redirect()->route('admin.noticias')->with('success','Noticia editada correctamente');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('**EDICION DE NOTICA**: ' . $th->getMessage());
            return back()->with("error","Disculpe, algo salio mal en medio del proceso es posible que deba repetir la edicion o comunicarse con Ciatware");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        DB::beginTransaction();
        try {
            $noticia = Noticia::find($id);
            $doc = $noticia->documentos[0];
            
            if($doc->isEnlace == 0){ ///verificar o configurar los discos de los archivos q no vaya al storage a revisar sino a public
                $exists = Storage::disk('public')->has($doc->url_doc);
                if ($exists) {
                    Storage::disk('public')->delete($doc->url_doc);
                }
            }
            $doc->delete();
            $noticia->delete();
            
            
            DB::commit();
            return redirect()->route('admin.noticias')->with('success','Noticia eliminada correctamente');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('**DESTROY DE NOTICA**: ' . $th->getMessage());
            return back()->with("error","Disculpe, algo salio mal en medio del proceso es posible que deba repetir la accion o comunicarse con Ciatware");
        }
    }
}
