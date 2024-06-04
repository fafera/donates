<!DOCTYPE html>
<html lang="pt-BR" itemscope itemtype="http://schema.org/WebPage">
	<head>
		@component('head', ['data' => $data])
		@endcomponent
	</head>
	<body class="about-us bg-gray-200">
		@component('parts.nav', ['data' => $data])
		@endcomponent
		@component('parts.header', ['data'=> $data])
		@endcomponent
		<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
			@livewire('donate-list', ['args'=> $data])
		</div>
		<footer class="footer pt-5 mt-5">
			<div class="container">
				@component('footer')
				@endcomponent
			</div>
		</footer>
	</body>
</html>