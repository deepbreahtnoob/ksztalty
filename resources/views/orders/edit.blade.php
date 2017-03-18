@extends('main')

@section('title', '| Stwórz nowe zamówienie')
@section('stylesheets')
@endsection


@section('content')
<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Nowe zamówienie</h1>
			<hr>

		{{ Form::model($order, array('method' => 'PUT', 'route' => array('orders.update', $order->id), 'data-parsley-validate' => '')) }}
        {{ Form::label('name', "Nazwa:") }}
        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}
        {{ Form::submit('Utwórz', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 15px;')) }}

      {!! Form::close() !!}
      {{ Html::linkRoute('orders.index', 'Powrót', array(), array('class' => 'btn btn-success btn-block space')) }}
		</div>
	</div>

@endsection
@section('scripts')
@endsection
