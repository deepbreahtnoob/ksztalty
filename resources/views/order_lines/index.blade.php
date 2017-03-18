@extends('main')

@section('title', '| Zamówienia')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>{{ $ord->name }}</h1>

		</div>
		<div class="col-md-2">
		{{ Html::linkRoute('orders.index', 'Lista zamówień', array(), array('class' => 'btn btn-success btn-block')) }}
		{{ Html::linkRoute('orders.order_lines.create', 'Dodaj nowy blat', array($ord->id), array('class' => 'btn btn-primary btn-block')) }}
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
				<th>wymiary</th>
				<th>Ilość</th>
				<th>Okleina</th>
				<th>Ostatnia edycja</th>
				<th>Akcje</th>
			  </thead>
			  <tbody>
			  	@foreach ($lines as $line)
			  		<tr>
			  			<td>{{ $counter++}}</td>
			  			<td>{{ $line->description }}</td>
			  			<td>{{ $line->width}} x {{ $line->height}}</td>	
			  			<td>{{ $line->quantity}}</td>
			  			<td><img src="/img/{{ $line->okleina_a }}{{ $line->okleina_b }}{{ $line->okleina_c }}{{ $line->okleina_d }}.png" style="height: 75px;"></td>			

			  			<td>{{ date($format, strtotime($line->updated_at)) }}</td>
			  			<td>
			  			{{ Html::linkRoute('orders.order_lines.edit', 'Edycja', array($line->order_id, $line->id), array('class' => 'btn btn-success btn-block')) }}
			  			{{ Form::open(['method' => 'DELETE', 'route' => ['orders.order_lines.destroy', $line->order_id, $line->id]]) }}
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
