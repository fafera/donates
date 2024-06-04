<div id="paginator">
	<div class="align-items-center row">
		<div class="col-lg-8">
			<div class="mt-3 mb-lg-0"><h6 class="fs-16 mb-0">Mostrando {{($paginator->currentPage() * $paginator->perPage()) - ($paginator->perPage() - 1)}} – {{$paginator->currentPage() * $paginator->perPage()}} de {{$paginator->total()}} resultados</h6></div>
		</div>
	</div>
	<div class="mt-4 pt-2 col-lg-12">
		@if ($paginator->hasPages())
			<nav aria-label="Page navigation example">
				<div class="pagination job-pagination mb-0 justify-content-center">
					@if(!$paginator->onFirstPage())
						<li class="page-item">
							<button class="page-link" tabindex="-1"
							        wire:click="previousPage"><i
										class="mdi mdi-chevron-double-left fs-15"></i></button>
						</li>
					@endif
					@for($i=1; $i <= $paginator->lastPage(); $i++)
						<li class="page-item @if($paginator->currentPage() === $i){{ 'active' }}@endif">
							<button class="page-link"
							        wire:click="gotoPage({{$i}})">{{$i}}</button>
						</li>
					@endfor
					@if($paginator->hasMorePages())
						<li class="page-item">
							<button class="page-link" wire:click="nextPage"><i
										class="mdi mdi-chevron-double-right fs-15"></i></button>
						</li>
					@endif
				</div>
			</nav>
		@endif
	</div>
</div>