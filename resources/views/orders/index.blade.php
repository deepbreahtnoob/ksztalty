@extends('main')

@section('title', '| Zamówienia')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Zamówienia</h1>

		</div>
		<div class="col-md-2">
			<a href="{{ route('orders.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">Dodaj</a>
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
				<th>Wydrukowano</th>
				<th>Utworzono</th>
				<th>Akcje</th>
				<th></th>
			  </thead>
			  <tbody>
			  	@foreach ($orders as $order)
			  		<tr>
			  			<td>{{ $order->id}}</td>
			  			<td>{{ $order->name }}</td>
			  			<td>{{ $order->printed}}</td>			

			  			<td>{{ date($format, strtotime($order->updated_at)) }}</td>
			  			<td>
			  			{{ Html::linkRoute('orders.edit', 'Edycja', array($order->id), array('class' => 'btn btn-success btn-block')) }}
			  			{{ Html::linkRoute('orders.order_lines.index', 'Pokaż', array($order->id), array('class' => 'btn btn-success btn-block')) }}
			  			
						{{ Form::open(['method' => 'DELETE', 'route' => ['orders.destroy', $order->id]]) }}
						    {{ Form::submit('Usuń', ['class' => 'btn btn-danger btn-block space']) }}
						{{ Form::close() }}
						

						</td>

			  		</tr>

			  	@endforeach
			  </tbody>
			</table>
		</div>
	</div>
@stop
