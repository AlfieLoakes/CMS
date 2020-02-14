@extends('layout')

@section('content')
    <h5>Pages</h5>
    <p>See a list of all your pages</p>

    <p>{{ $site->name }}</p>


    @foreach($site->pages as $page)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>{{ $page->title }}</h5>
                        <p>{{ $page->description }}</p>
                        <div>
                            <i class="far fa-edit"></i><a style="padding-left: 5px;" href="/sites/{{ $site->id }}/edit">Edit Page</a>
                        </div>
                        <i class="far fa-eye"></i><a style="padding-left: 5px;" href="/sites/{{ $site->id }}/edit">View Page</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach





@endsection