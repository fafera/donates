<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailsModalLabel">Detalhes do item:</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
				        aria-label="Close"></button>
			</div>
			<div class="modal-body text-center">
					<h6>{{$item->title}}</h6>
					<p>{{$item->description}}</p>
					<p>{{$item->quantity}}</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
				</button>
			</div>
		</div>
	</div>
</div>