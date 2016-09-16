@extends('default')

@section('content')
	<section class="box special">
		<h2>Ajouter une photo à la galerie</h2>
		{!! Form::open(['url' => 'admin/galerie/add', 'method' => 'post', 'files' => true]) !!}
			{!! Form::token() !!}
			<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
					<label for="file_upload" class="button special 12u 12u(mobilep)" style="margin-top:20px;">Ajouter une images</label>
					{!! Form::file('image', ['id' => 'file_upload', 'style' => 'display:none;']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::submit('Envoyer') !!}
				</div>
			</div>
		{!! Form::close() !!}
	</section>
@stop