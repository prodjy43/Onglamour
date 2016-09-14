@extends('default')

@section('content')
	<section class="box special">
		<h2>Modifier une news</h2>
		<table>
			<thead>
				<tr>
					<th>titre</th>
					<th>utilisateur</th>
					<th>posté le</th>
					<th>Function</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($news as $post)	
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->prenom }} {{ $post->nom }}</td>
						<td>{{ $post->created_at }}</td>
						<td><a href="/admin/news/edit/{{ $post->slug }}" class="button small fa fa-pencil"></a> <a href="/admin/news/delete/{{ $post->slug }}" class="button small fa fa-trash"></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<hr>
		<h2>Ajouter une news</h2>
		{!! Form::open(['url' => 'admin/news/add', 'method' => 'post', 'files' => true]) !!}
			{!! Form::token() !!}
			<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
					{!! Form::text('title', null, ['placeholder' => 'Titre de la news']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::textarea('content', null, ['placeholder' => 'Contenu de la news']) !!}
				</div>
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