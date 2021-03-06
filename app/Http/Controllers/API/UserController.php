<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $request){
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'Usuario registrado com sucesso';

        } catch(QueryException $error){
            $success = false;
            $message = 'email já cadastrado';

        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);

    }

    public function login(Request $request){


        $dados = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($dados)){
            $success = true;
            $message = 'Usuario logado com sucesso';
        }else{
            $success = false;
            $message = 'email ou login invalidos';
        }

        $response = [
            'user'    => Auth::user()->name,
            'userId'  => Auth::user()->id,
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);

    }

    public function logout(){

        try{
            Session::flush();
            $success = true;
            $message = 'Usuario deslogado com sucesso';
        } catch(QueryException $error){
            $success = false;
            $message = $error->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);

    }
    public function edit(){
        $users = User::all()->toArray();
        $usersEmail = array();

        foreach($users as $user){
            array_push($usersEmail, $user['email']);
        }

        $response = [
            'name'   => Auth::user()->name,
            'email'  => Auth::user()->email,
            'emails' => $usersEmail
        ];
        return response()->json($response);

    }
    public function update(Request $request){


        $user = User::find(Auth::user()->id);
        $user->update($request->all());

        $response = [
            'success' => true,
            'message' => "Usuario atualizado com sucesso",
        ];

        return response()->json($response);


    }
    public function userTips(){

        $user = Auth::user();
        $list_tips = array();
        //var_dump($user->tips);
        foreach($user->tips as $tip){
            //var_dump($tip->id);
            $item = ['id' => $tip->id, 'vehicle' => $tip->vehicle->type, 'brand' => $tip->brand, 'model' => $tip->model];
            //var_dump($item);
            array_push($list_tips, $item);

        }
        return response()->json($list_tips);

    }
}
