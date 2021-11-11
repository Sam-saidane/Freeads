@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>Marque</td>
          <td>Prix</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($article as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->nom}}</td>
            <td>{{$article->description}}</td>
            <td>{{$article->prix}}</td>
            <td><a href="{{ route('article.edit', $article->id)}}" class="btn btn-primary">Modifier</a></td>
            <td>
                <form action="{{ route('article.destroy',$article->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection