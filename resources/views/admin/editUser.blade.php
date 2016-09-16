@extends('default')

@section('content')
	<section class="box special">
		{!! Form::model($user, ['url' => 'admin/user/edit/'.$user->nom.'-'.$user->prenom, 'method' => 'put']) !!}
			{!! Form::token() !!}
			<div class="row uniform 50%">
				<div class="6u 12u(mobilep)">
					{!! Form::text('nom', null, $attributes = ['placeholder' => 'Nom', 'disabled' => 'disabled']) !!}
				</div>
				<div class="6u 12u(mobilep)">
					{!! Form::text('prenom', null, $attributes = ['placeholder' => 'Prenom', 'disabled' => 'disabled']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::text('pseudo', null, $attributes = ['placeholder' => 'Pseudo', 'disabled' => 'disabled']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::email('email', null, $attributes = ['placeholder' => 'Adresse E-mail', 'disabled' => 'disabled']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::textarea('statut', null, $attributes = ['placeholder' => 'Statut de profil', 'disabled' => 'disabled']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					<select name="grade">
						@foreach ($grades as $grade)
							<option value="{{ $grade->id_grade }}" @if ($grade->id_grade == $user->grade_id)
								selected
							@endif>{{ $grade->grade }}</option>
						@endforeach	
					</select>
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::submit('Enregistrer') !!}
				</div>
			</div>
		{!! Form::close() !!}	
	</section>
@stop