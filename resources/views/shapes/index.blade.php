@extends('main')

@section('title', '| Wszzytkie posty')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Wszystkie produkty</h1>

		</div>
		<div class="col-md-2">
			<a href="{{ route('shapes.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">Dodaj produkt</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- End Of row -->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
			  <thead>
				<th>#</th>
				<th>Nazwa</th>
				<th>Wysokść (cm)</th>
				<th>Szerokość (cm)</th>
				<th>Okleina</th>
				<th>Utworzono</th>
				<th></th>
			  </thead>
			  <tbody>
			  	@foreach ($shapes as $shape)
			  		<tr>
			  			<td>{{ $shape->id}}</td>
			  			<td>{{ $shape->description }}</td>
			  			<td>{{ $shape->height}}</td>
			  			<td>{{ $shape->width}}</td>
			  			
			  			<td><img src="/img/{{ $shape->okleina_a }}{{ $shape->okleina_b }}{{ $shape->okleina_c }}{{ $shape->okleina_d }}.png"></td>
			  			<td>{{ date($format, strtotime($shape->created_at)) }}</td>
			  			<td>
			  			{{ Html::linkRoute('shapes.edit', 'Edycja', array($shape->id), array('class' => 'btn btn-success btn-block')) }}<br>
						{{ Form::open(['method' => 'DELETE', 'route' => ['shapes.destroy', $shape->id]]) }}
						    {{ Form::submit('Usuń', ['class' => 'btn btn-danger']) }}
						{{ Form::close() }}
						</td>

			  		</tr>

			  	@endforeach
			  </tbody>
			</table>
		</div>
	</div>
@stop
