@extends('layouts.app')

@section('')
	{{ Form::open(array('action' => array('ArticlesController@update', $article->id), 'method' => 'POST') }}
		<div class="form-group'">
			{{ Form::label('name', 'Nom d'article) }}
			{{ Form::text('name', $article->name, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('price', 'Prix') }}
			{{ Form::text('price', $article->price)}}
		</div>
		<div class="form-group">
			{{ Form::label('quantity', 'Quantité en stock') }}
			{{ Form::number('quantity', $article->quantity) }}
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description d'article') }}
			{{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => $article->description]) }}
		</div>
		<div class="form-group">
			{{ Form::file('image') }}
		</div>
		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{{ Form::close()}}
@endsection