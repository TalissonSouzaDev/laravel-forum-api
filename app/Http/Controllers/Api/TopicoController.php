<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicoRequest;
use App\Http\Resources\TopicoResource;
use App\Models\subforum;
use App\Models\topico;
use Illuminate\Http\Request;

class TopicoController extends Controller
{
    protected $topico,$subforum;
    public function __construct(topico $topico,subforum $subforum)
    {
        $this->topico = $topico;
        $this->subforum = $subforum;
        
    }

    public function index($idsubforum){
        // retornando todo os topico do subforum 
        $subforum = $this->subforum->where('id',$idsubforum)->first();
        $topico = $this->topico->where('forum_id',$idsubforum)->latest()->paginate(10);

        
     
        return response()->json(['topico'=>topicoResource::collection($topico),'subforum' =>$subforum],200);
    }

    public function store(topicoRequest $request){
      // criando topico

        $this->topico->create(
            [
        
                'title'=> $request->title,
                'description'=> $request->description,
                'forum_id'=>$request->forum_id
            ]
        );

        return response()->json(['success'=>'Publicado com sucesso'],200);
    }

    public function edit($id){
        // retornando forum
        $topico = $this->topico->where('id',$id)->first();

        return response()->json(['topico'=>$topico],200);

   }


    public function update(topicoRequest $request,$id){
        // retornando topico
        $topico = $this->topico->where('id',$id)->first();
       // verificando se o nikname é igual o user_to se for true o usuario pode edita

       
         // se for admin pode atualizar
       if(auth()->user()->profile == 'admin'){
        $topico->update($request->all());
        return response()->json(['success'=>'Publicação atualizada com sucesso'],200);

       }
       // so pode atualizar quem é dono do topico
       if(auth()->user()->nikname == $topico->user_to){
        $topico->update($request->all());
        return response()->json(['success'=>'Publicação atualizada com sucesso'],200);

       }
       return response()->json(['error'=> ' Humm.. você não é dono desse topico'],401);
    }

    public function destroy($id){
      
        $topico = $this->topico->where('id',$id)->first();
        // verificando se o nikname é igual o user_to se for true o usuario pode edita
   
       if(auth()->user()->nikname == $topico->user_to){
        // deletando
        $topico->delete();
        return response()->json(['success'=>'Publicação excluida com sucesso'],200);
       }
       
        return response()->json(['error'=>'Você não tem permissão'],401);

    }
}
