<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log;

class ClienteService {

    public function salvarUsuario(Usuario $user, Endereco $endereco){
        try{
            $dbUsuario = Usuario::where("login", $user->login)->first();
            if($dbUsuario){
                return [ 'status' => 'err', 'message' => 'Login já cadastrado no sistema' ];
            }

            \DB::beginTransaction();
            $user->save();
            $endereco->usuario_id = $user->id;           
            $endereco->save();
            \DB::commit();
            
            return [ 'status' => 'ok', 'message' => 'Usuário cadastrado com sucesso!' ];
        }catch(\Exception $e){
            \Log::error("erro", ['file' => 'ClienteService.salvarUsuario', 'message' => $e->getMessage()]);
            \DB::rollback();
            return [ 'status' => 'err', 'message' => 'Não foi possível cadastrar o usuário' ];
        }
    }
}