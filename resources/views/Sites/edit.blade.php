@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Edit Site</h5>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/sites/{{ $site->id }}">
                @method('PATCH')
                @csrf

                <div class="form-group row">
                    <label for="sitename" class="col-sm-2 col-form-label " >Site Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="name" id="sitename" placeholder="Site Name" value="{{ $site->name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="domain" class="col-sm-2 col-form-label">Domain</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="domain" id="domain" placeholder="Domain" value="{{ $site->domain }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Site</button>
            </form>


            <form method="POST" action="/sites/{{ $site->id }}">
                @method('DELETE')
                @csrf
                <button style="margin-top: 5px;" type="submit" class="btn btn-danger">Delete Site</button>
            </form>
        </div>
    </div>
@endsection