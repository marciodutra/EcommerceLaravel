<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Services\vendaService;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Middleware;
use App\Models\ItensPedido;
use PagSeguro\Configuration\Configure;
use Ramsey\Uuid\Uuid;

class ProdutoController extends Controller
{
    private $_configs;

    public function __construct(){
        $this->_configs = new Configure();
        $this->_configs->setCharset("UTF-8");
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env("PAGSEGURO_AMBIENTE"));
        $this->_configs->setLog(true, storage_path('logs/pagseguro_' . date('Ymd') . '.log'));
    }

    public function getCredential(){
        return $this->_configs->getAccountCredentials();
    }

    public function index(Request $request){
       $data = [] ;

       $listaProdutos = Produto::all();
       $data['lista'] = $listaProdutos;

       return view("home", $data);
    }

    public function categoria(Request $request, $idcategoria = 0){
        $data = [];

        $listaCategorias = Categoria::all();

        $queryProduto = Produto::limit(4);

        if($idcategoria != 0){
            $queryProduto->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategoria"] = $listaCategorias;
        $data["idcategoria"] = $idcategoria;

       return view("categoria", $data);
    }

    public function adicionarCarrinho($idproduto = 0, Request $request){
        $prod = Produto::find($idproduto);

        if($prod){

            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session([ 'cart' => $carrinho ]);
        }

        return redirect()->route("home");
    }

    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        $data = [ 'cart' => $carrinho ];

        return view('carrinho', $data);
    }

    public function excluirCarrinho($indice, Request $request){
        $carrinho = session('cart', []);
        if(isset($carrinho[$indice])){
         unset($carrinho[$indice]);
        }
        session(["cart" => $carrinho]);
        return redirect()->route("ver_carrinho");
    }

    public function finalizar(Request $request){

        $prods = session('cart', []);
        $vendaService = new vendaService();
        $result = $vendaService->finalizarVenda($prods, \Auth::user());

        if($result["status"] == "ok"){
            $request->session()->forget("cart");
        }

        $request->session()->flash($result["status"], $result["message"]);
        return redirect()->route("ver_carrinho");
    }

    public function historico(Request $request){
        $data = [];

        $idusuario = \Auth::user()->id;

        $listaPedido = Pedido::where("usuario_id", $idusuario)->orderBy("datapedido", "desc")->get();

        $data["lista"] = $listaPedido;

        return view("compra/historico", $data);
    }

    public function detalhes(Request $request){
        $idpedido = $request->input("idpedido");

        $listaItens = ItensPedido::join("produtos", "produtos_id", "=", "itens_pedidos.produto_id")
                        ->where("pedido_id", $idpedido)
                        ->get(['itens_pedidos.*', 'itens_pedidos.valor as valoritem', 'produtos.*']);

       $data = [];
       $data["listaItens"] = $listaItens;
       return view("compra/detalhes", $data);
    }

    // public function pagar(Request $request){
    //     $data = [];

    //     $sessionCode = \PagSeguro\Services\Session::create(
    //       $this->getCredential()
    //     );

    //     $IDSession = $sessionCode->getResult();
    //     $data["session"] = $IDSession;

    //     return view("compra/pagar", $data);
    // }

    public function pagar(Request $request)
    {
        $data = [];

        // Criar a sessão do PagSeguro
        $sessionCode = \PagSeguro\Services\Session::create(
            $this->getCredential()
        );

        $IDSession = $sessionCode->getResult();
        $data["sessionID"] = $IDSession;

        // Gerar um UUID como token de pagamento
        $token = Uuid::uuid4()->toString();

        // Aqui você pode salvar o token no banco de dados com informações adicionais,
        // como ID do produto, ID do usuário, etc.

        $data["payment_token"] = $token;
        $data["expires_in"] = 3600; // Tempo de expiração em segundos

        return view("compra/pagar", $data);
    }
}
