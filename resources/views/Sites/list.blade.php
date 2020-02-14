@extends('layout')

@section('content')
    <h5>Sites</h5>
    <p>See a list of all your sites allowed</p>

    @foreach($sites as $site)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h5>{{ $site->name }}</h5>
                        <p>{{ $site->domain }}</p>
                        <p>{{ $site->description }}</p>
                        <div>
                        <i class="far fa-edit"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/edit">Edit</a>
                        </div>
                            <i class="far fa-eye"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/pages">View</a>
                    </div>
                    <div class="col-sm-4">
                        <h6>Created</h6>
                        <p>{{ $site->created_at }}</p>
                        <h6>Updated</h6>
                        <p>{{ $site->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection