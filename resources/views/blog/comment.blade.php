@extends('default')

@section('content')
	 <div class="row">
        <div class="12u 12u(mobilep)">
            <section class="box">
                <span class="image featured"><img src="{{ elixir('images/upload/'.$news['image']) }}" alt="{{ elixir('images/upload/'.$news['image']) }}" /></span>
                <h3>{{ $news->title }}</h3>
                <p>{!! nl2br($news->content) !!}</p>
                <p><strong>Posté par : {{ $news->prenom }} {{ $news->nom }}</strong></p>
            </section>
        </div>
        @if (Auth::check())
        <div class="12u 12u(mobilep)">
        	<section class="box special">
        		<h2>Posté un commentaire</h2>
	    		{!! Form::open(['url' => '/blog/'.$news->slug, 'method' => 'post']) !!}
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
        </div>
        @else
        	<div class="12u 12u(mobilep)">
        		<section class="box special">
        			<p>Vous devez <strong>être connecté</strong> pour posté un commentaire. <br> Si vous <strong>possédé déjà un compte</strong> <a href="/account/login">Connectez-vous</a> si ce n'est pas le cas <a href="/account/register">Inscrivez-vous</a>.</p>
        		</section>
        	</div>
        @endif
        @foreach ($comments as $comment)
        	<div class="12u 12u(mobilep)">
	            <section class="box">
	                <h3>{{ $comment->title }}</h3>
	                <p>{!! nl2br($comment->content) !!}</p>
	                <p><strong>Posté par : {{ $comment->prenom }} {{ $comment->nom }}</strong></p>
	                @if (Auth::user()->id === $comment->id)
	                	<ul class="actions">
	                		<li><a href="/blog/edit/{{ $comment->id_comment }}" class="button alt">Editer mon commentaire</a></li>
	                	</ul>
	                @endif
	            </section>
	        </div>
        @endforeach
    </div>
@stop