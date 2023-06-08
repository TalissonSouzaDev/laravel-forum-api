<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubforumRequest;
use App\Http\Resources\SubforumResource;
use App\Models\subforum;
use Illuminate\Http\Request;

class SubforumController extends Controller
{
    protected $subforum;
    public function __construct(subforum $subforum)
    {
        $this->subforum = $subforum;
        
    }

    public function index(){
        // retornando todo os subforum
        $subforum = $this->subforum->latest()->paginate(10);
        $forum =  SubforumResource::collection($subforum);
        return response()->json(['subforum' => $forum],200);
    }

    public function store(SubforumRequest $request){
    
   // criando subforum
        $this->subforum->create(
            [
                'title' => $request->title,
                'description'=> $request->description,
            ]
        );

        return response()->json(['success'=>'SubForum Publicado com sucesso'],200);
    }


    public function edit($id){
         // retornando forum
         $subforum = $this->subforum->where('id',$id)->first();

         return response()->json(['subforum'=>$subforum],200);

    }


    public function update(subforumRequest $request,$id){
        // retornando forum
        $subforum = $this->subforum->where('id',$id)->first();
        // so quem é admin pode criar
       if(auth()->user()->profile == 'admin'){
        // criando subforum
        $subforum->update($request->all());
        return response()->json(['success'=>'Subforum atualizado com sucesso'],200);

       }
       return response()->json(['error'=> ' Humm.. você não tem permissão'],404);
    }

    public function destroy($id){

    
        $subforum = $this->subforum->where('id',$id)->first();

         // so quem é admin pode criar
       if(auth()->user()->profile == 'admin'){
        // deletando subforum
        $subforum->delete();
        return response()->json(['success'=>'Subforum excluida com sucesso'],200);
       }
      
       return response()->json(['error'=>'Você não tem permissão :('],200);
    

    }
}
