@extends('layouts.user')

@section ('title')
Ganti PIN
@endsection

@section ('content')

<div class="container">
    <br>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row">
        <div class="card-body">
            <form method="POST" action="{{ route('anggota.pin.update') }}">
                @method('patch')
                @csrf

                <div class="input-group mb-3">
                    <label class="input-group">Pin Baru</label>
                    <input id="password" type="password" class="form-control @error('pin') is-invalid @enderror" name="pin" required autocomplete="new-pin" data-toggle="password">
                    @error('pin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <label class="input-group">Pin Lama</label>
                    <input id="current_pin" type="password" class="form-control @error('current_pin') is-invalid @enderror" name="current_pin" required autocomplete="current_pin">

                    @error('current_pin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update PIN
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection