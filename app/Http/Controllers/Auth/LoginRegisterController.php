<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {

        $this->user = $user;
        
    }
    public function Register(SignupRequest $request){
        // pegando todos os request
        $data = $request->all();
        // criptografando a senha
        $data ['password']= bcrypt($request->password);
        // criando usuario
        $this->user->create($data);
        // pegando so campo nikname e password
        $credentials = $request->only('nikname','password');
        // autenticando se for true cria o token
        if(Auth::attempt($credentials)){
            // filtrando usuario e gerando token
            $user = $this->user->where('nikname',$request->nikname)->first();
            $token = $user->createToken('token');
             // retorno 
             return response()->json(['token'=>$token->plainTextToken,'user'=>$user],200);
        }
      // retorno 
      return response()->json(['erros'=>'Verifique seu usuario e senha'],404);
    

    }

    public function login(LoginRequest $request){
   
   
        // pegando so campo nikname e password
        $credentials = $request->only('nikname','password');
        // autenticando se for true cria o token
        
        if(Auth::attempt($credentials)){
       
         
            // filtrando usuario e gerando token
            $user = $this->user->where('nikname',$request->nikname)->first();
          
            $token = $user->createToken('token');
             // retorno 
            return response()->json(['token'=>$token->plainTextToken,'user'=>$user],200);
         
        }
         // retorno 
         return response()->json(['erros'=>'Verifique seu usuario e senha'],404);
    

        
    }

    public function logout(Request $request){
        $client = $request->user();
        $client->tokens()->delete();


        return response()->json(['message','Deslogado com sucesso'],200);

    }
}
