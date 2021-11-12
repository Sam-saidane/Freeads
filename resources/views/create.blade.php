
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Ajouter une annonce
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

      <form method="post" enctype= 'multipart/form-data' action="{{ route('article.store') }}">
.         @csrf
          <div class="form-group">
              <label for="nom">Nom de l'article:</label>
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              <label for="description">Description de l'article:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="prix">Prix :</label>
              <input type="text" class="form-control" name="prix"/>
          </div>
          <div class="form-group">
              <label for="lieu">Lieu :</label>
              <input type="text" class="form-control" name="lieu"/>
          </div>
          <div class="form-group">
            <input id="file-upload" type="file" name="image" accept="image/*" onchange="readURL(this);">
            <label for="file-upload" id="file-drag">
            <img id="file-image" src="#" alt="Preview" class="hidden" >
            <div id="start" >
              <br>
                <i class="fa fa-download" aria-hidden="true"></i>
                <br>
                <div>Select a file or drag here</div>
                <div id="notimage" class="hidden">Please select an image</div>
                <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                <br>
                <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection