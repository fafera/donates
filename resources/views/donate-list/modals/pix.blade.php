<div class="modal fade" id="pixModal" tabindex="-1" aria-labelledby="pixModalLabel"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pixModalLabel">Faça sua Doação via Pix</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
				        aria-label="Close"></button>
			</div>
			<div class="modal-body text-center">
				@if(isset($data['recipient'],$data['pix']))
					<h6>Dados do Beneficiário:</h6>
					<p>Nome: {{$data['recipient']}}</p>
					<p>Chave Pix: {{$data['pix']}}</p>
					@if(isset($data['pix_qrcode']) && $data['pix_qrcode'] !== '')
					<img src="{{asset('storage/'.$data['pix_qrcode'])}}"
					     alt="QR Code Pix" class="img-fluid">
					@endif
				@else
					<p>Ops! Nenhuma chave pix cadastrada.</p>
				@endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
				</button>
			</div>
		</div>
	</div>
</div>