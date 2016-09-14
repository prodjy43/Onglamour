@extends('default')

@section('content')
	<section class="box special">
		<h2>Liste des rendez-vous</h2>
		<table>
			<thead>
				<tr>
					<th>Forfait</th>
					<th>Demandeur</th>
					<th>date et heure</th>
					<th>Function</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($meetings as $meeting)
					<tr>
						<td>{{ $meeting->forfait }}</td>
						<td>{{ $meeting->prenom }} {{ $meeting->nom }}</td>
						<td>{{ $meeting->date }} à {{ $meeting->heure }}</td>
						<td><a href="/admin/rendez-vous/accept/{{ $meeting->id }}" class="button small fa fa-check"></a> <a href="/admin/rendez-vous/decline/{{ $meeting->id }}" class="button small fa fa-times"></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section>
@stop