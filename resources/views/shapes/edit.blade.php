@extends('main')

@section('title', '| Edytycja posta')
@section('stylesheets')

@section('content')
	<div class="row">
{{ Form::model($shape, array('method' => 'PUT', 'route' => array('shapes.update', $shape->id))) }}
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
                {{ Form::checkbox('okleina_a', '1', $shape->okleina_a, array('class' => 'form-control')) }}
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                {{ Form::checkbox('okleina_d', '1', $shape->okleina_d, array('class' => 'form-control')) }}
              </td>
              <td>
                <img src="/img/prostakat.png" class="center-block">
              </td>
              <td>
                {{ Form::checkbox('okleina_b', '1', $shape->okleina_b, array('class' => 'text-left')) }}
              </td>
            </tr>
            <tr>
              <td>
                
              </td>
              <td>
                
                {{ Form::checkbox('okleina_c', '1', $shape->okleina_c, array('class' => 'form-control')) }}
              </td>
              <td>
                
              </td>
            </tr>
        </table>

						{!! Html::linkRoute('shapes.index', 'Anuluj', array(), array('class' => 'btn btn-danger btn-block')) !!}
					{{ Form::submit('Zapisz zmiany', array('class' => 'btn btn-primary btn-block')) }}
		
		{{ Form::close() }}
	</div> <!-- End of row -->

@endsection
