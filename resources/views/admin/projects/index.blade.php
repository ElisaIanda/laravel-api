@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>LISTA PROGETTI</h1>
        <div class="row">
            <div>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary my-4 ">Aggiungi Progetto</a>
            </div>

            @foreach ($projects as $singleProject)
                <div class="col">
                    <div class="card">
                        <img src="{{ $singleProject['image'] }}" alt="">
                        <h1>{{ $singleProject->title }}</h1>

                        <a href="{{ route('admin.projects.show', $singleProject->id) }}" class="btn btn-primary btn-lg"
                            type="button">Dettagli
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
