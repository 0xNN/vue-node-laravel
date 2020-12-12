@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Contact
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name: </b>{{$contact->name}}</li>
                    <li class="list-group-item"><b>No HP: </b>{{$contact->nohp}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$contact->email}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('contacts.index') }}">Back</a>

        </div>
    </div>
</div>
@endsection