@extends('layouts.app')

@section("content")
    <div class="container mt-5">
        <div class="row">
            <div class="col ">
                <form action="{{route("admin.projects.update", $project->id)}}" method="POST">
                    @csrf()
                    
                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control @error("title") is-invalid                            
                        @enderror" value="{{old("title", $project->title)}}">
                        @error("title")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>
        

                    

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link" class="form-control @error("link") is-invalid                            
                        @enderror" value="{{old("title", $project->link)}}">
                        @error("link")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea  id="description" name="description" class="form-control @error("description") is-invalid                            
                        @enderror">{{old("description", $project->description)}}</textarea>
                        @error("description")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    

                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text"  name="image" class="form-control @error("image") is-invalid                            
                        @enderror" value="{{old("image", $project->image)}}">
                        @error("image")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    

                    <div class="mb-3">
                        <label for="date" class="form-label">Data</label>
                        <input type="date" name="date"  class="form-control @error("release") is-invalid                            
                        @enderror" value="{{old("date", $project->date)}}">
                        @error("date")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary mt-5 mb-4 px-5 fw-bold">Modifica</button>
                        <button class="btn bg-danger mt-5 mb-4 px-5 fw-bold">
                            <a class="text-white" href="{{ route('admin.projects.index') }}">Annulla</a>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection