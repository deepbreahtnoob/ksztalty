@extends('main')

@section('title', '| Zamówienie {{ $order->id }}')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>{{ $order->name }}</h1>

		</div>
		<div class="col-md-2">
			<a href="{{ route('orders.create') }}" class="btn btn-primary btn-lg btn-block">Dodaj linie</a>
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
				<th>Wysokość</th>
				<th>Szerokość</th>
				<th>Ilość</th>
				<th>Okleina</th>
			  </thead>
			  <tbody>
			  	@foreach ($lines as $line)
			  		<tr>
			  			<td>{{ $line->id}}</td>
			  			
			  			<td>{{ $line->shape->description}}</td>
			  			<td>{{ $line->shape->height}}</td>
			  			<td>{{ $line->shape->width}}</td>			  			
			  			<td>{{ $line->quantity }}</td>
			  			<td><img src="/img/{{ $line->shape->okleina_a }}{{ $line->shape->okleina_b }}{{ $line->shape->okleina_c }}{{ $line->shape->okleina_d }}.png"></td>
			  			<td>
						{{ Form::close() }}

						</td>

			  		</tr>

			  	@endforeach
			  </tbody>
			</table>
		</div>
	</div>
@stop
