@extends('master')
@section('title', 'Contact')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
			<form class="form-horizontal" method="post">
				@foreach ($errors->all() as $error)
				<p class="alert alert-danger">{{ $error }}</p>
				@endforeach

				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<fieldset>
					<legend>Enviar un nuevo ticket</legend>
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Asunto</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="title" placeholder="Title" name="title">
						</div>
					</div>


					<div class="form-group">
						<label for="priority" class="col-lg-2 control-label">Prioridad</label>
						<div class="col-lg-10">
							<select class="form-control" id="priority" name="priority">
								<option value='alta'>Alta</option>
  								<option value='media'>Media</option>
    							<option value='baja'>Baja</option>
							</select>
						</div>
					</div>



					<div class="form-group">
						<label for="date_assignment" class="col-lg-2 control-label">Fecha</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="date_assignment" placeholder="Fecha de Asignacion" name="date_assignment">
						</div>
					</div>

					<div class="form-group">
						<label for="user_assigned" class="col-lg-2 control-label">Usuario Asignado</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="user_assigned" placeholder="Usuario Asignado" name="user_assigned">
						</div>
					</div>

					<div class="form-group">
						<label for="content" class="col-lg-2 control-label">Tarea a realizar</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="3" id="content" name="content"></textarea>
							<span class="help-block">Envia un ticket para dudas y consultas.</span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-default">Cancelar</button>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection