<div id="donate-table-livewire-component">
    <div class="candidate-list-box card mt-4">
        @foreach($items as $item)
        <div class="p-4 card-body">
            <div class="align-items-center row">
                <div class="col-lg-8">
                    <div class="candidate-list-content mt-3 mt-lg-0">
                        <h5 class="fs-19 mb-0">
                            <a class="primary-link" href="#">{{$item->title}}</a><span class="badge bg-{{$item->statusLabel}} ms-1">{{$item->status}}</span>
                        </h5>
                        <p class="text-muted mb-2">{{substr_replace($item->description, "...", 20)}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-of">
                    <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                    <span class="badge bg-soft-success fs-14 mt-1"><i class="mdi mdi-star align-middle"></i><a
                                type="button"
                                data-bs-toggle="modal" data-bs-target="#modalEnderecos" href="#">QUERO DOAR</a></span>
                        <span class="badge bg-soft-success fs-14 mt-1"><i class="mdi mdi-cash align-middle"></i><a
                                    type="button"
                                    data-bs-toggle="modal" data-bs-target="#modalDoacaoPix"
                                    href="#">QUERO DOAR DINHEIRO</a></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$items->links('donate-list/pagination')}}
    <div class="modal fade" id="modalEnderecos" tabindex="-1" aria-labelledby="modalEnderecosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEnderecosLabel">Endereços Para Doações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h6>Endereço 1:</h6>
                            <p>Rua Tal, número 10</p>
                            <p>Telefone: 54-5293219</p>
                            <p>Como chegar: <a href="https://google.com/maps/blablabla" target="_blank">Google Maps</a>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h6>Endereço 1:</h6>
                            <p>Rua Tal, número 10</p>
                            <p>Telefone: 54-5293219</p>
                            <p>Como chegar: <a href="https://google.com/maps/blablabla" target="_blank">Google Maps</a>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDoacaoPix" tabindex="-1" aria-labelledby="modalDoacaoPixLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDoacaoPixLabel">Faça sua Doação via Pix</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h6>Dados do Beneficiário:</h6>
                    <p>Nome: Fulano de Tal</p>
                    <p>Chave Pix: 12345678901234</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=pix%3A12345678901234"
                         alt="QR Code Pix" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>