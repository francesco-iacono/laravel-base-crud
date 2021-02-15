@extends('layouts.app')

@section('main')
  <h1 class="mt-5">Modifica birra</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('beers.update', $beer->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Nome" value="{{ $beer->name }}">
    </div>
    <div class="form-group">
      <label for="brand">Nome dell'Azienda</label>
      <input type="text" class="form-control" name="brand" id="brand" placeholder="Azienda" value="{{ $beer->brand }}">
    </div>
    <div class="form-group">
      <label for="style">Stile</label>
      <input type="text" class="form-control" name="style" id="style" placeholder="Stile" value="{{ $beer->style }}">
    </div>
    <div class="form-group">
      <label for="alcohol_content">Titolo alcolometrico</label>
      <input type="text" class="form-control" name="alcohol_content" id="alcohol_content" placeholder="Percentuale Alcolica" value="{{ $beer->alcohol_content }}">
    </div>
    <div class="form-group">
      <label for="price">Prezzo</label>
      <input type="text" class="form-control" name="price" id="price" placeholder="Prezzo" value="{{ $beer->price }}">
    </div>
    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control" name="description" id="description" rows="10">{{ $beer->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('beers.index') }}" class="btn btn-secondary">Indietro</a>
  </form>
@endsection