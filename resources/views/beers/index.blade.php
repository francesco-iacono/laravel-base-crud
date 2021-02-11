@extends('layouts.app')

@section('main')
  <h1 class="mt-5">Le nostre birre</h1>
  <table class="table table-light table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Azienda</th>
        <th>Stile</th>
        <th>Percentuale Alcolica</th>
        <th>Prezzo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($beers as $beer)
        <tr>
          <td>{{ $beer->id }}</td>
          <td>{{ $beer->name }}</td>
          <td>{{ $beer->brand }}</td>
          <td>{{ $beer->style }}</td>
          <td>{{ $beer->alcohol_content }}%</td>
          <td>€  {{ $beer->price }}</td>
          <td>
            <a href="{{ route('beers.show', $beer->id) }}" class="btn btn-outline-dark"> MOSTRA</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table> 
  <div class="text-right">
    <a href="{{ route('beers.create') }}" class="btn btn-lg btn-primary">Nuova birra</a>
  </div>   
@endsection