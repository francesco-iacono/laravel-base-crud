@extends('layouts.app')

@section('main')
  <h1 class="mt-5">Dettaglio birra {{ $beer->name }}</h1>
  <table class="table table-light table-striped table-bordered">
    @foreach ($beer->getAttributes() as $key => $value)
    <tr>
      <td><strong>{{ $key }}</strong></td>
      <td>{{ $value }}</td>
    </tr>
        
    @endforeach
  </table>
  <div class="text-right">
    <a href="{{ route('beers.index') }}" class="btn btn-lg btn-primary">Torna alle birre</a>
  </div>
  
@endsection