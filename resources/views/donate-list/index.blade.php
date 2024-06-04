<section id="donate-section" class="py-7">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="align-items-center row">
					<div class="col-lg-4">
						<input id="exampleFormControlInput1"
						       placeholder="Pesquisar por texto... " type="search"
						       class="form-control filler-job-input-box form-control"
						       wire:model.live="search"/>
					
					</div>
					<div class="col-lg-2 offset-lg-6">
						<select class="form-select" data-trigger="true"
						        name="choices-single-filter-orderby" id="choices-single-filter-orderby"
						        aria-label="Default select example"
						        wire:model.live="orderSelect">
							<option value="">Ordenar por:</option>
							<option value="status-DESC">Padrão</option>
							<option value="title-ASC">Ordem alfabética (A-z)</option>
							<option value="title-DESC">Ordem alfabética (Z-a)</option>
							<option value="status-DESC">Prioridade</option>
						</select>
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="donate-table" class="candidate-list">
					<div class="candidate-list-box card mt-4">
						@foreach($items as $item)
							<div class="p-4 card-body">
								<div class="row align-items-center">
									<div class="col-lg-8">
										<div class="candidate-list-content mt-3 mt-lg-0">
											<h5 class="fs-19 mb-0">
												<a class="primary-link" href="#" data-bs-toggle="modal" data-bs-target="#detailsModal">{{$item->title}}</a>
												<span class="badge bg-{{$item->statusLabel}} ms-1">{{$item->statusText}}</span>
											</h5>
											<p class="text-muted mb-2">{{ substr($item->description, 0, 100) . '...' }}</p>
										</div>
									</div>
									<div class="col-lg-4 d-flex flex-wrap align-items-start gap-1 mt-2 mt-lg-0">
				                        <span class="badge bg-soft-success fs-14 mt-1">
				                            <i class="mdi mdi-star align-middle"></i>
				                            <a href="#" type="button" data-bs-toggle="modal"
				                               data-bs-target="#addressesModal">QUERO DOAR</a>
				                        </span>
														<span class="badge bg-soft-success fs-14 mt-1">
				                            <i class="mdi mdi-cash align-middle"></i>
				                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#pixModal">QUERO DOAR DINHEIRO</a>
				                        </span>
									</div>
								</div>
							</div>
							@component('donate-list.modals.details', ['item' => $item])
							@endcomponent
						@endforeach
					</div>
				</div>
				
				{{$items->links('donate-list/pagination')}}
				
				@component('donate-list.modals.addresses', ['addresses' => $addresses])
				@endcomponent
				@component('donate-list.modals.pix', ['data' => $data])
				@endcomponent
			</div>
		</div>
	</div>
	</div>
</section>