@extends('layouts.app')

@section('')
	{{ Form::open(array('action' => array('ArticlesController@store', $boutique->id), 'method' => 'POST') }}
		<div class="form-group'">
			{{ Form::label('name', 'Nom d'article) }}
			{{ Form::text('name','eg: Tapis 100% laine naturelle avec motifs moderne', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('price', 'Prix') }}
			{{ Form::text('price', 'prix d'article)}}
		</div>
		<div class="form-group">
			{{ Form::label('quantity', 'Quantité en stock') }}
			{{ Form::number('quantity', '1') }}
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description d'article') }}
			{{ Form::textarea('description', '', ['class' => 'form-control']) }}
		</div>
		@if($boutique_id == null)
			
		@endif
		<div class="form-group">
			{{ Form::file('image') }}
		</div>
		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{{ Form::close()}}
@endsection