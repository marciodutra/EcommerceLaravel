<?php

namespace App\Services;

use App\Models\Pedido;
use App\Models\Usuario;
use App\Models\ItensPedido;
use Log;

class vendaService {
    public function finalizarVenda($prods = [], Usuario $user){
        try{
            \DB::beginTransaction();
            $dtHoje = new \DateTime();

            $pedido = new Pedido();
            $pedido->datapedido = $dtHoje->format("d-m-y H:i:s");
            $pedido->status = "pen";
            $pedido->usuario_id = $user->id;

            $pedido->save();

            foreach($prods as $p){
                $itens = new ItensPedido();

                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->dt_item = $dtHoje->format("d-m-y H:i:s");
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }

            \DB::commit();
            return['status' => 'ok', 'message' => 'Venda finalizada com sucesso!'];
        }catch(\Exception $e){
            \DB::rollBack();
            Log::error("ERRO:VENDA SERVICE", ['message' => $e->getMessage()]);
            return['status' => 'err', 'message' => 'Venda não pode ser finalizada'];
        }
    }
}
