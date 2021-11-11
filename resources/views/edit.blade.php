@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier l'article
  </div>

  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('article.update', $article->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="marque">Nom :</label>
              <input type="text" class="form-control" name="nom" value="{{ $article->nom }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Description:</label>
              <input type="text" class="form-control" name="description" value="{{ $article->description }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Prix :</label>
              <input type="text" class="form-control" name="prix" value="{{ $article->prix }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection