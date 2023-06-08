<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComentarioRequest;
use App\Http\Resources\ComentarioResource;
use App\Models\comentario;
use App\Models\topico;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    protected $comentario,$topico;
    public function __construct(comentario $comentario,topico $topico)
    {
        $this->comentario = $comentario;
        $this->topico = $topico;
        
    }

    public function index($idtopico){
        // retornando os comentario vinculado ao topico
        $topico = $this->topico->where('id',$idtopico)->first();
        $comentario = $this->comentario->where('topico_id',$idtopico)->latest()->paginate(10);
        return response()->json(['comentario'=> ComentarioResource::collection($comentario),'topico' =>$topico]);
    }

    public function store(ComentarioRequest $request){
         // criando comentario
        $this->comentario->create(
            [
                'content'=> $request->content,
                'topico_id'=> intval($request->topico_id)
            ]
        );

        return response()->json(['success'=>'Publicado com sucesso'],200);
    }


    public function update(comentarioRequest $request,$id){
        // retornado comentario 
        $comentario = $this->comentario->where('id',$id)->first();
       // verificando se o nikname é igual o user_to se for true o usuario pode edita
       if(auth()->user()->nikname == $comentario->user_to){
        $comentario->update($request->all());
        // atualizando
        return response()->json(['success'=>'Publicação atualizada com sucesso'],200);

       }
       return response()->json(['error'=> ' Humm.. você não é dono desse Comentario'],404);
    }

    public function destroy($id){
         // retornado comentario 
        $comentario = $this->comentario->where('id',$id)->first();


        // se for admin pode excluir
        if(auth()->user()->profile == 'admin'){

            // deletando o comentario
             $comentario->delete();
             return response()->json(['success'=>'Publicação excluida com sucesso'],200);
       }


        // verificando se o nikname é igual o user_to se for true o usuario excluir
       if(auth()->user()->nikname == $comentario->user_to){

                // deletando o comentario
                 $comentario->delete();
                 return response()->json(['success'=>'Publicação excluida com sucesso'],200);
       }
       return response()->json(['error'=>'você não pode excluir'],401);

    }
}
