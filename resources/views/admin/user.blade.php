@extends('default')

@section('content')
	<section class="box special">
		<table>
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>E-mail</th>
					<th>Grade</th>
					<th>Fonction</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->nom }}</td>
						<td>{{ $user->prenom }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->grade }}</td>
						<td><a href="/admin/user/edit/{{ $user->nom.'-'.$user->prenom }}" class="button small edit"><i class="fa fa-edit"></i></a> <a href="/admin/user/delete/{{ $user->nom.'-'.$user->prenom }}" class="button small delete"><i class="fa fa-trash"></i></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section>
@stop