<div class="modal fade" id="addressesModal" tabindex="-1" aria-labelledby="addressesModalLabel"
     aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addressesModalLabel">Endereços Para Doações</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
				        aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					@foreach($addresses as $address)
					<li class="list-group-item">
						<h6>{{$address->label}}</h6>
						<p>{{$address->fullAddress}} </p>
						<p>Como chegar: <a href="{{$address->googleMapsLink}}"
						                   target="_blank">Google Maps</a>
						</p>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn button" data-bs-dismiss="modal">Fechar
				</button>
			</div>
		</div>
	</div>
</div>