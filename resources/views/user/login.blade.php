@extends('default')

@section('content')
	<section class="box special">
		{!! Form::open(['url' => 'account/login', 'method' => 'post']) !!}
			{!! Form::token() !!}
			<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
					<p>Connectez-vous pour profité des avantages de membre t'elle que crée ou participé à un événement étre informer des derniers événement et des nouveautés du site, ...<br>Pas encore de compte <a href="/account/register">crée s'en un ici</a></p>						
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::email('email', null, $attributes = ['placeholder' => 'Adresse E-mail']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::password('password', $attributes = ['placeholder' => 'Mot de passe']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::submit('Se connecter',['class' => 'style3']) !!}
				</div>
			</div>
		{!! Form::close() !!}
	</section>
@stop