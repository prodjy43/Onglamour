@extends('default')

@section('content')
	<section class="box special">
		<h2>Modification de commentaire</h2>
		{!! Form::model($comment ,['url' => '/blog/edit/'.$comment->id_comment, 'method' => 'put']) !!}
    		{!! Form::token() !!}
    		<div class="row uniform 50%">
    			<div class="12u 12u(mobilep)">
    				{!! Form::text('title', null, ['placeholder' => 'Titre de votre commentaire']) !!}
    			</div>
    			<div class="12u 12u(mobilep)">
    				{!! Form::textarea('content', null, ['placeholder' => 'Contenu de votre commentaire']) !!}
    			</div>
    			<div class="12u 12u(mobilep)">
    				{!! Form::submit('Poster') !!}
    			</div>      			
    		</div>
	    {!! Form::close() !!}
	</section>
@stop