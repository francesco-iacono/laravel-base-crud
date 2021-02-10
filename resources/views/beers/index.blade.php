<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beers</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
      <div class="container">
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
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </body>
</html>
