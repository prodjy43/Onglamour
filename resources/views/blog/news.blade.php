@extends('default')

@section('content')
	<div class="row">
		@foreach ($news as $data)
	        <div class="12u 12u(mobilep)">

	            <section class="box">
	                <span class="image featured"><img src="{{ elixir('images/upload/'.$data['image']) }}" alt="{{ elixir('images/upload/'.$data['image']) }}" /></span>
	                <h3>{{ $data->title }}</h3>
	                <p>{!! nl2br($data->content) !!}</p>
	                <ul class="actions">
	                    <li><a href="/blog/{{ $data->slug }}" class="button alt">Voir la news</a></li>
	                </ul>
	            </section>

	        </div>
	    @endforeach
	</div>
@stop