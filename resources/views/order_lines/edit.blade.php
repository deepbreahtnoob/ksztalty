@extends('main')

@section('title', '| Edytuj Linię')
@section('stylesheets')
@endsection


@section('content')
<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Nowa linia</h1>
			<hr>
      {{ Form::model($ol, array('method' => 'PUT', 'route' => array('orders.order_lines.update', $ol->order_id, $ol->id))) }}
        {{ Form::hidden('order_id', $ol->order_id) }}

        {{ Form::label('quantity', "ilość:") }}
        {{ Form::text('quantity', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}
        {{ Form::label('description', "Nazwa:") }}
        {{ Form::text('description', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}

        {{ Form::label('width', 'Szerokość:') }}
        {!! Form::number('width',null,['class' => 'form-control','step'=>'any']) !!}

        {{ Form::label('height', 'Wysokość:') }}
        {!! Form::number('height',null,['class' => 'form-control','step'=>'any']) !!}
        <table class="table table-hover">
            <tr>
              <td></td>
              <td>
                {{ Form::checkbox('okleina_a', '1', $ol->okleina_a, array('class' => 'form-control')) }}
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                {{ Form::checkbox('okleina_d', '1', $ol->okleina_d, array('class' => 'form-control')) }}
              </td>
              <td>
                <img src="/img/prostakat.png" class="center-block">
              </td>
              <td>
                {{ Form::checkbox('okleina_b', '1', $ol->okleina_b, array('class' => 'text-left')) }}
              </td>
            </tr>
            <tr>
              <td>
                
              </td>
              <td>
                
                {{ Form::checkbox('okleina_c', '1', $ol->okleina_c, array('class' => 'form-control')) }}
              </td>
              <td>
                
              </td>
            </tr>
        </table>
        {{ Form::submit('Zatwierdź', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 15px;')) }}

      {!! Form::close() !!}
      {{ Html::linkRoute('orders.order_lines.index', 'Powrót', array($ol->order_id), array('class' => 'btn btn-success btn-block')) }}
		</div>
	</div>

@endsection
@section('scripts')
@endsection
