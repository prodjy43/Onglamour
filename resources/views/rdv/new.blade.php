@extends('default')

@section('content')
	<section class="box special">
		{!! Form::open(['url' => 'rdv/store', 'method' => 'post']) !!}
			{!! Form::token() !!}
			<div class="row uniform 50%">
				<div class="12 12(mobilep)">
					<p>Avec ce <strong>formulaire </strong>vous pouvez <strong>prendre un rendez-vous chez moi</strong> pour vous faire vos ongle. <strong>La date et l'heure</strong> du formulaire <strong>ne font pas fois</strong> donc si je ne vous <strong>recevez un e-mail de confirmation</strong> c'est que <strong>le jour et l'heure que vous avez choisi est votre rendez-vous</strong>. Dans le cas ou je vous appelle ou vous renvoie un e-mail pour vous dire que le rendez-vous ne m'arrange pas <strong>nous fixeront soit une nouvelle date soit une nouvelle heure</strong>.</p>	
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::select('forfait', $forfait) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::text('date', null, ['placeholder' => 'Date du rendez-vous (JJ/MM/AAAA) exemple: 23/09/2016']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::text('heure', null, ['placeholder' => 'Date du rendez-vous (HH/MM/) exemple: 15/30']) !!}
				</div>
				<div class="12u 12u(mobilep)">
					{!! Form::submit('Envoyer') !!}
				</div>
			</div>
		{!! Form::close() !!}
	</section>
@stop