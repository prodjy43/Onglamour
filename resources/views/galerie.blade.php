@extends('default')

@section('content')
	<section class="box special">
		<header class="major">
            <h2>Galerie photo</h2>
            <p>Ici vous trouverez toutes mes créations <br> et pourrez choisir ce qu'il vous plaît avant de venir le reéaliser sur vous</p>
            <br>
            <br>
        </header>
		<div class="row no-collapse 50% uniform">
			@foreach ($files as $file)
				<div class="4u"><span class="image fit"><img src="{{ elixir($file) }}" alt="{{ elixir($file) }}" /></span></div>
			@endforeach
		</div>
	</section>
@stop