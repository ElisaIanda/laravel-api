@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <a href={{ route('admin.projects.index', ['id' => $project->id]) }}
                    class="btn btn-outline-primary my-4 ">Indietro</a>
                <a href={{route("admin.projects.edit", $project->id)}} 
                    class="btn btn-outline-warning my-4">Modifica
                </a>

                <form action="{{ route("admin.projects.destroy", $project->id)}}"
                    method="POST" class="d-inline-block">
                    @csrf
                    
                    {{-- Passo il vero metodo che voglio usare --}}
                    @method("DELETE")
                    <input type="submit" value="Elimina" class="btn btn-outline-danger">
                </form>
            </div>

            <div class="card my-3 p-0">
                {{-- $project->image  contiene il percorso dell'immagine--}}
                <img src="{{ asset('/storage/' . $project->image ) }}" class="card-img-top w-100" alt="{{ $project->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text">{{ $project->type?->title }}</p>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            <a href="{{ $project->link }}">{{ $project->link }}</a>
                        </small>
                    </p>
                    <p class="card-text">
                        <small class="text-body-secondary">{{ $project->date }}</small>
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
