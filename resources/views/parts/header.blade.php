<header class="bg-gradient-dark">
	<div class="page-header min-vh-75" style="background-image: url({{asset('storage/'.$data['banner_image'])}});">
		<span class="mask bg-gradient-dark opacity-6"></span>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center mx-auto my-auto">
					<h1 class="text-white">{{$data['organization_name'] ?? 'O que precisa?'}}</h1>
					<p class="lead mb-4 text-white opacity-8">Veja os itens que estamos precisando para doações</p>
					<a class="btn bg-white text-dark" href="#donate-section">Veja os itens</a>
					<h6 class="text-white mb-2 mt-5">Redes Sociais</h6>
					<div class="d-flex justify-content-center">
						<a href="{{$data['facebook_link'] ?? '#'}}"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
						<a href="{{$data['instagram_link'] ?? '#'}}"><i class="fab fa-instagram text-lg text-white me-1"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>