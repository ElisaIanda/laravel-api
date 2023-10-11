@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>LISTA PROGETTI</h1>
        <div class="row">
            <div>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary my-4 ">Aggiungi Progetto</a>
            </div>

            @foreach ($projects as $singleProject)
                <div class="col-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('/storage/'. $singleProject['image'])}}" alt="{{ $singleProject->title }}" style="height: 200px">

                        <div class="card-body">
                            <h3 class="text-center">{{ $singleProject->title }}</h3>
                            <div class="">{{ $singleProject->type?->title }}</div>

                            <div class="text-center">
                                <a href="{{ route('admin.projects.show', $singleProject->id) }}"
                                    class="btn btn-primary small" type="button">Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
