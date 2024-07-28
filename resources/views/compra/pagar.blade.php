@extends("layout")
@section("scriptjs")
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script>
function carregar(){
    console.log("Session ID: {{ $sessionID }}");
    PagSeguroDirectPayment.setSessionId('{{ $sessionID }}');
}

$(function(){
    carregar();

    $(".ncredito").on('blur', function(){
        PagSeguroDirectPayment.onSenderHashReady(function(response){
            if(response.status == 'error'){
                console.log(response.message);
                return false;
            }

            var hash = response.senderHash;
            $(".hashseller").val(hash);
        });
    });
});
</script>
<script>
    $(".nparcela").on("blur", function(){
        var bandeira = 'visa';
        var totalParcelas = $(this).val();

        PagSeguroDirectPayment.getInstallments({
            amount : $(".totalfinal").val(),
            maxInstallmentsNoInterest : 2,
            brand : bandeira,
            success : function(response){
                console.log(response);
            }
        })
    })
</script> --}}
<script>
    fetch('http://127.0.0.1:8000//gerar-token-pagamento', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        produto_id: '1',
        usuario_id: $senha
    })
})
.then(response => response.json())
.then(data => {
    console.log('Token de pagamento:', data.payment_token);
})
.catch(error => {
    console.error('Erro:', error);
});
</script>
@endsection
@section("conteudo")

<form>
    <input type="hidden" name="hashseller" class="hashseller">
    <div class="row">
        <div class="col-4">
            Cartão de crédito:
            <input type="text" name="ncredito" class="ncredito form-control" />
        </div>
        <div class="col-4">
            CVV:
            <input type="text" name="ncvv" class="ncvv form-control" />
        </div>
        <div class="col-4">
            Mês de expiração:
            <input type="text" name="mesexp" class="mesexp form-control" />
        </div>
        <div class="col-4">
            Ano de expiração:
            <input type="text" name="anoexp" class="anoexp form-control" />
        </div>
        <div class="col-4">
            Nome no cartão:
            <input type="text" name="nomecartao" class="nomecartao form-control" />
        </div>
        <div class="col-4">
            Parcelas:
            <input type="text" name="nparcela" class="nparcela form-control" />
        </div>
        <div class="col-4">
            Valor total:
            <input type="text" name="totalfinal" class="totalfinal form-control" />
        </div>
        <div class="col-4">
            Valor da parcela:
            <input type="text" name="totalparcela" class="totalparcela form-control" />
        </div>
        @csrf
    </div>
    <input type="button" value="pagar" class="btn btn-lg btn-success pagar" />
</form>
@endsection
