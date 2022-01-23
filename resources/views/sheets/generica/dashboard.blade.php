@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/dashboard.css')) }}">
@endsection

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo" id="showSheets">
        @foreach($fichas as $ficha)
        <div class="col mb-4" id="{{ 'fichaGenerica' . $ficha->id }}">
            <div class="p-3 text-center fundo">
                <a href="{{ route('generica.show', ['fichasgenerica' => $ficha->id]) }}" class="mb-3">
                    <div class="card bg-dark border-1 border-light">
                        <img src="{{ $ficha->imagem_personagem }}" class="card-img-top img-fluid" alt="imagem_generica">
                        <div class="card-body">
                            <p>{{ $ficha->nome }}</p>
                            <a class="btn btn-danger mb-2" data-bs-ficha-id="{{ $ficha->id }}" data-bs-toggle="modal" data-bs-target="#deleteSheetGenericaModal">Excluir</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('sheetCreate')
<button data-bs-toggle="modal" data-bs-target="#novoGenericaModal" class="btn btn-primary me-2">Criar</button>
@endsection

@section('modal')
<!-- NOVO GENERICA MODAL -->
<div class="modal fade" id="novoGenericaModal" tabindex="-1" aria-labelledby="novoGenericaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="novoGenericaModalLabel">Novo Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="genericaModalForm" action="{{ route('generica.store') }}" method="post">
                    @csrf
                    <!-- NOME -->
                    <label for="genericaNome" class="mb-1 fs-5">Nome</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="genericaNome" name="genericaNome" required autofocus>

                    <!-- IMAGEM GENERICA -->
                    <label for="imagemDashboard" class="fs-5">Imagem</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="imagemDashboard" name="imagemDashboard">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Criar" class="btn btn-primary" form="genericaModalForm" id="novoGenerica" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL GENERICA -->
<div class="modal fade" id="deleteSheetGenericaModal" tabindex="-1" aria-labelledby="deleteSheetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 id="deleteSheetModalLabel">Confirmação</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <p>Você tem certeza que deseja excluir essa ficha?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('generica.destroy', ['fichasgenerica' => 1]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="text" name="ficha_id" id="ficha_id" hidden>
                    <input type="submit" value="Sim" class="btn btn-primary">
                </form>
                <input type="button" value="Fechar" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let deleteSheetModal = document.getElementById("deleteSheetGenericaModal");

    deleteSheetModal.addEventListener("show.bs.modal", function(event) {
        let trigger = event.relatedTarget;
        let id = trigger.getAttribute("data-bs-ficha-id");
        let ficha_id = deleteSheetModal.querySelector("#ficha_id");
        ficha_id.value = id;
    });
</script>
@endsection