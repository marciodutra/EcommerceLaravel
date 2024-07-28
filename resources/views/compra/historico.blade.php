@extends("layout")
@section("scriptjs")
<script>
    $(function() {
        $(".infocompra").on('click', function() {
            let id = $(this).data("value"); // Corrigido para usar data() ao invés de attr()
            $.post('{{ route("compra_detalhes") }}', {
                idpedido: id,
                _token: '{{ csrf_token() }}' // Inclua o token CSRF
            }, function(result) {
                $("#conteudopedido").html(result);
            }).fail(function(xhr) {
                console.log(xhr.responseText);
            });
        });
    });
</script>

@endsection
@section("conteudo")
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class="col-12">
    <h2>Minhas compras</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data da compra</th>
            <th>Situação</th>
            <th></th>
        </tr>
        @foreach ($lista as $ped)
            <tr>
                <td>{{ (new DateTime($ped->datapedido))->format("d/m/Y H:i") }}</td>
                <td>{{ $ped->statusDesc() }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{ $ped->id }}" data-toggle="modal" data-target="#modalcompra">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div class="modal fade" id="modalcompra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da compra</h5>
            </div>
            <div class="modal-body">
                <div id="conteudopedido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endsection
