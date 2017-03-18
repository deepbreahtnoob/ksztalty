@extends('main')

@section('title', '| Stwórz nowe zamówienie')
@section('stylesheets')
@endsection


@section('content')
<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Nowe zamówienie</h1>
			<hr>

		{!! Form::open(['route' => 'orders.store', 'data-parsley-validate' => '']) !!}
        {{ Form::label('name', "Nazwa:") }}
        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}
        {{ Form::submit('Utwórz', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 15px;')) }}

      {!! Form::close() !!}
		</div>
	</div>

@endsection
@section('scripts')
@endsection
