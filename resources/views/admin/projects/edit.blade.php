@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col ">
                
                {{-- aggiungo enctype="multipart/form-data in modo che il form riesca a ricevere il file sottoforma di file --}}
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf()

                    @method('put')



                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title"
                            class="form-control @error('title') is-invalid                            
                        @enderror"
                            value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>




                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link"
                            class="form-control @error('link') is-invalid                            
                        @enderror"
                            value="{{ old('link', $project->link) }}">
                        @error('link')
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea id="description" name="description"
                            class="form-control @error('description') is-invalid                            
                        @enderror">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>

                        {{-- per visualizzare l'immagine attuale --}}
                        <img class="img-thumbnail w-100" src="{{ asset('/storage/'. $project->image)}}" alt="">

                        {{-- cambio il tyle in file per permettere l'upload e cancello il value perchè non è previsto nel type file --}}
                        <input type="file" name="image" class="form-control @error('image') is-invalid "                           
                        @enderror>
                        @error('image')
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                            <select class="form-select" name="type_id">
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $project->types_id === $type->id ? 'selected' : '' }}>
                                {{$type->title}}
                            </option>
                            @endforeach
                            </select>
                    </div>



                    <div class="mb-3">
                        <label for="date" class="form-label">Data</label>
                        <input type="date" name="date"
                            class="form-control @error('date') is-invalid                            
                        @enderror"
                            value="{{ old('date', date('Y-m-d', strtotime($project->date))) }}">
                        @error('date')
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
