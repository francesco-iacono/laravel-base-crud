@extends('layouts.app')

@section('main')
  <h1 class="mt-5">Le nostre birre</h1>

  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>   
  @endif

  <table class="table table-light table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Azienda</th>
        <th>Stile</th>
        <th>Percentuale Alcolica</th>
        <th>Prezzo</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
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
          <td>{{ number_format($beer->price, 2) }}</td>
          <td>{{ $beer->created_at }}</td>
          <td>{{ $beer->updated_at }}</td>
          <td>
            <a href="{{ route('beers.show', $beer->id) }}" class="btn btn-outline-dark"> <i class="fas fa-search-plus"></i></a>
          </td>
          <td>
            <a href="{{ route('beers.edit', $beer->id) }}" class="btn btn-outline-dark"> <i class="fas fa-pen"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table> 
  <div class="text-right">
    <a href="{{ route('beers.create') }}" class="btn btn-lg btn-primary">Nuova birra</a>
  </div>   
@endsection