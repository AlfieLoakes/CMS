@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Create a new site</h5>

            <form method="POST" action="/admin/site">
                {{ csrf_field() }}


                <div class="form-group row">
                    <label for="sitename" class="col-sm-2 col-form-label " >Site Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="name" id="sitename" placeholder="Site Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="domain" class="col-sm-2 col-form-label">Domain</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="domain" id="domain" placeholder="Domain">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Create New Site</button>
            </form>
        </div>
    </div>
@endsection