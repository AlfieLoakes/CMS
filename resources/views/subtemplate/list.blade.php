@extends('layout')

@section('content')
    <h5>Sub-Templates</h5>
    <p>See a list of all your sub-templates</p>
    <form method="POST" action="/admin/site/{{$site->id}}/subtemplate/">
        {{ csrf_field() }}
        <button type="submit">Add a new sub-template</button>
    </form>

    @foreach($subtemplate as $template)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h5>{{ $template->name }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <i class="far fa-edit"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/subtemplate/{{ $template->id }}/edit">Edit</a>
                                </div>
                            <!--<i class="far fa-eye"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/template/{{ $template->id }}">View</a>-->
                            </div>
                            <div class="col-sm-6">
                                <form method="POST" action="/admin/site/{{ $site->id }}/subtemplate/{{ $template->id }}">
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