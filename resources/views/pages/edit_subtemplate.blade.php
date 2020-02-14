@extends('layout')

@section('content')
    <form method="POST" action="/admin/site/{{ $site->id }}/page/{{ $page->id }}">
        @method('PATCH')
        @csrf
        <div class="card">
            <div class="card-body">
                <h5>Page Settings</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{ $page->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Page Template</label>
                            <div class="col-sm-10">
                                <select name="template_id" class="form-control">
                                    <option value="">-- None --</option>
                                    @foreach($templates as $template)
                                        <option value="{{ $template->id }}" @if($page->template_id == $template->id) selected @endif>{{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Template</label>
                            <div class="col-sm-10">
                                <select name="subtemplate_id" class="form-control">
                                    <option value="">-- None --</option>
                                    @foreach($subtemplates as $subtemplate)
                                        <option value="{{ $subtemplate->id }}" @if($page->subtemplate_id == $subtemplate->id) selected @endif>{{ $subtemplate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="slug" value="{{ $page->slug }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1"  value="1" @if( $page->status == 1) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Enabled</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" @if( $page->status == 0) checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>Page Template</h5>


                @foreach($inputs as $key => $value)
                    @if (isset($values[$key]))
                    <input type="{{$value}}" name="templatedata[{{$key}}]" value="{{$values[$key]}}" placeholder="{{$key}}">
                    @else

                        <input type="{{$value}}" name="templatedata[{{$key}}]" value="" placeholder="{{$key}}">
                    @endif
                @endforeach
            </div>

        </div>

        <button class="submit" type="submit">Save</button>

    </form>


@endsection