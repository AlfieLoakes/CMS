@extends('layout')

@section('head')

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@endsection

@section('content')
    <h5>Media Library</h5>
    <form method="post" action="{{url('admin/site/' . $site->id . '/media/upload/store')}}" enctype="multipart/form-data"
 class="dropzone" id="dropzone">
        @csrf
    </form>
    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                //maxFilesize: 12,
                renameFile: function(file) {
                    //var dt = new Date();
                    //var time = dt.getTime();
                    return file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{url('admin/site/' . $site->id . '/media/upload/delete')}}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
    </script>

    <div class="row">
    @foreach($medias as $media)
        <div class="col-sm-2">
            <div class="media-container">
                <div class="media-item" style="background-image: url({{ url('images/'.$site->id.'/'.$media->filename) }}); background-size: contain;background-repeat: no-repeat;background-position: center;">
                </div>
            </div>
        </div>
    @endforeach

    <style type="text/css">
        .media-container {
            width: 100%;
            padding-top: 100%;
            position: relative;
            background-color: white;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .media-item {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        #dropzone {
            background-color: #f2f2f2;
            border: 1px solid rgba(0,0,0,0.3);
        }

    </style>



@endsection
    </div>