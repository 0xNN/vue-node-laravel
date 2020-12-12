@extends('layouts.layout')

@section('content')

<div class="container mt-3">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Add Contact
            </div>
            <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('contacts.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>                    
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" >                
                </div>
                <div class="form-group">
                    <label for="nohp">No Hp</label>
                    <input type="text" name="nohp" class="form-control" id="nphp" aria-describedby="nohp">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>                    
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >                
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection