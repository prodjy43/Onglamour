@extends('default')

@section('content')
	<section class="box special">
		<span class="image fit"><img src="{{ elixir('images/upload/'.$news['image']) }}"/></span>
		{!! Form::model($news ,['url' => 'admin/news/edit/'.$news->slug, 'method' => 'put']) !!}
			{!! Form::token() !!}
			<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
					{!! Form::text('title', null, ['placeholder' => 'Titre de la news']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::textarea('content', null, ['placeholder' => 'Contenu de la news']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::submit('Envoyer') !!}
				</div>
			</div>
		{!! Form::close() !!}
	</section>
@stop