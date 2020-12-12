@extends('layouts.layout')

@section('content')

<div class="container mt-3">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Contact
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
            <form method="post" action="{{ route('contacts.update', $contact->id) }}" id="myForm">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>                    
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $contact->nama }}" aria-describedby="nama" >                
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>                    
                    <input type="text" name="nohp" class="form-control" id="nohp" value="{{ $contact->nohp }}" aria-describedby="nohp" >                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>                    
                    <input type="text" name="email" class="form-control" id="email" value="{{ $contact->email }}" aria-describedby="email" >                
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection