@extends('main')

@section('title', '| Stwórz nowy zapas')
@section('stylesheets')



@section('content')
<div class="row">
		<div class="col-md-12">
			<h1>Nowy blat</h1>
			<hr>

      {!! Form::open(['route' => 'shapes.store', 'data-parsley-validate' => '']) !!}
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
                {{ Form::checkbox('okleina_a', '1', false, array('class' => 'form-control')) }}
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                {{ Form::checkbox('okleina_d', '1', false, array('class' => 'form-control')) }}
              </td>
              <td>
                <img src="/img/prostakat.png" class="center-block">
              </td>
              <td>
                {{ Form::checkbox('okleina_b', '1', false, array('class' => 'text-left')) }}
              </td>
            </tr>
            <tr>
              <td>
                
              </td>
              <td>
                
                {{ Form::checkbox('okleina_c', '1', false, array('class' => 'form-control')) }}
              </td>
              <td>
                
              </td>
            </tr>
        </table>
        {{ Form::submit('Utwórz', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 15px;')) }}

      {!! Form::close() !!}
		</div>
	</div>

@endsection
@section('scripts')
@endsection
