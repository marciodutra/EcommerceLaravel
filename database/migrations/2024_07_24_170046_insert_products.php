<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();
        
        $cat2 = new \App\Models\Categoria(['categoria' => 'Informatica']);
        $cat2->save();

        $cat3 = new \App\Models\Categoria(['categoria' => 'Smartphone']);
        $cat3->save();

        $prod = new \App\Models\Produto(['nome' => 'Notebook Positivo', 'valor' => 2500, 'foto' => 'images/notebook2.jpg', 'descricao' => 'Notebook Positivo Vision C15 Intel Celeron 4GB 1 - 128GB 15,6” HD Windows 11 Microsoft 365 C4128A-1', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome' => 'Notebook Dell', 'valor' => 5000, 'foto' => 'images/notebook1.jpg', 'descricao' => '12ª geração Intel® Core™  i3-1215U (6-core, cache de 10MB, até 4.4GHz)', 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome' => 'Notebook Accer', 'valor' => 2000, 'foto' => 'images/notebook3.jpg', 'Notebook Acer Aspire 5 Intel Core i5 8GB RAM 256GB SSD 15,6” Full HD Windows 11 A515-57-55B8', 'categoria_id' => $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'Notebook HP', 'valor' => 3000, 'foto' => 'images/notebook4.jpg', 'descricao' => 'Notebook HP G9 Intel Core i3 8GB RAM 256GB SSD 15,6” HD Windows 11', 'categoria_id' => $cat->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome' => 'Notebook Lenovo', 'valor' => 1800, 'foto' => 'images/notebook5.jpg', 'descricao' => 'IdeaPad 1 15" AMD', 'categoria_id' => $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome' => 'Smartphone Sansung', 'valor' => 1300, 'foto' => 'images/smartphone1.jpg', 'descricao' => '512GB | 12GB RAM | Tela 7.6" + 6.3" | Câm. Traseira 50+12+10MP | Frontal 10+4MP | Preto', 'categoria_id' => $cat->id]);
        $prod6->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
