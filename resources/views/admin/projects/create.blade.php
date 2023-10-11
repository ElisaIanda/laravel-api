@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col ">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()


                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title"
                            class="form-control @error('title') is-invalid                            
                        @enderror"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>




                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link"
                            class="form-control @error('link') is-invalid                            
                        @enderror"
                            value="{{ old('link') }}">
                        @error('link')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea id="description" name="description"
                            class="form-control @error('description') is-invalid                            
                        @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" accept="image/*" name="image"
                            class="form-control @error('image') is-invalid                            
                        @enderror">
                        @error('image')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select class="form-select" name="type_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Data</label>
                        <input type="date" name="date"
                            class="form-control @error('date') is-invalid                            
                        @enderror"
                            value="{{ old('date') }}">
                        @error('date')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary mt-5 mb-4 px-5 fw-bold">Aggiungi</button>
                        <button class="btn bg-danger mt-5 mb-4 px-5 fw-bold">
                            <a class="text-white" href="{{ route('admin.projects.index') }}">Annulla</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
