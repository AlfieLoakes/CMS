@extends('layout')

@section('content')
    <h5>Pages</h5>
    <p>See a list of all your pages</p>
        <form method="POST" action="/admin/site/{{$site->id}}/page/">
            {{ csrf_field() }}
            <button type="submit">Add a new page</button>
        </form>

    @foreach($pages as $page)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">

                        <h5>{{ $page->title }}</h5>
                        <p>{{ $page->description }}</p>
                        <p>{{ $site->description }}</p>


                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                        <div class="col-sm-6">
                        <div>
                            <i class="far fa-edit"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/page/{{ $page->id }}/edit">Edit</a>
                        </div>
                        <i class="far fa-eye"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/page/{{ $page->id }}">View</a>
                        </div>
                        <div class="col-sm-6">
                        <form method="POST" action="/admin/site/{{ $site->id }}/page/{{ $page->id }}">
                            @method('DELETE')
                            @csrf
                            <button style="margin-top: 5px;" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection