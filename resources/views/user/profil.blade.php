@extends('default')

@section('content')
	<section class="box special">
		<h2>Information sur {{ $user->prenom }} {{ $user->nom }}</h2>
		<table>
			<thead>
			<tr>
				<td colspan="2"></td>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nom et prénom :</td>
					<td>{{ $user->prenom }} {{ $user->nom }}</td>
				</tr>
				<tr>
					<td>Grade :</td>
					<td>{{ $user->grade }}</td>
				</tr>
				<tr>
					<td>Pseudo :</td>
					<td>{{ $user->pseudo }}</td>
				</tr>
				<tr>
					<td>Inscrit le :</td>
					<td>{{ $user->created_at }}</td>
				</tr>			
			</tbody>
		</table>
		@if (Auth::user()->nom === $user->nom && Auth::user()->prenom === $user->prenom)
		<hr>
			<h2>Modification de votre compte</h2>
			{!! Form::open(['url' => 'account/edit/'.Auth::user()->id, 'method' => 'put']) !!}
				{!! Form::token() !!}
				<div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
						{!! Form::text('nom', Auth::user()->nom, $attributes = ['placeholder' => 'Nom']) !!}
					</div>
					<div class="6u 12u(mobilep)">
						{!! Form::text('prenom', Auth::user()->prenom, $attributes = ['placeholder' => 'Prenom']) !!}
					</div>
					<div class="12u 12u(mobilep)">
						{!! Form::text('pseudo', Auth::user()->pseudo, $attributes = ['placeholder' => 'Pseudo']) !!}
					</div>
					<div class="12u 12u(mobilep)">
						{!! Form::email('email', Auth::user()->email, $attributes = ['placeholder' => 'Adresse E-mail']) !!}
					</div>
					<div class="12u 12u(mobilep)">
						{!! Form::submit('Enregistrer') !!}
					</div>
				</div>
			{!! Form::close() !!}
		@endif
	</section>
@stop