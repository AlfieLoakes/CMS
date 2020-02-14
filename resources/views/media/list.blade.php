@extends('layout')

@section('content')
    <h5>Media Library</h5>

    <form method="POST" action="/admin/site/{{$site->id}}/page/">
        {{ csrf_field() }}
        <button type="submit">Upload</button>
    </form>

     @foreach($medias as $media)
     <div class="card">
         <div class="card-body">
             <div class="row">
                 <div class="col-sm-8">

                     <h5>{{ $media->src }}</h5>




                 </div>
                 <div class="col-sm-4">
                     <div class="row">
                         <div class="col-sm-6">
                             <div>
                                 <i class="far fa-edit"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/page/{{ $media->id }}/edit">Edit</a>
                             </div>
                             <i class="far fa-eye"></i><a style="padding-left: 5px;" href="/admin/site/{{ $site->id }}/page/{{ $media->id }}">View</a>
                         </div>
                         <div class="col-sm-6">
                             <form method="POST" action="/admin/site/{{ $site->id }}/media/{{ $media->id }}">
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