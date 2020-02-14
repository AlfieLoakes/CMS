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
            <h5>Head Elements</h5>
            <input type="checkbox" name="parent_header" value="true"><span id="inlinespan" style="padding-left: 5px;">use parent head elements</span><br>
            <hr>
            <p>Or edit page header below</p>


            <div id="headeditor">{{ $page->head }}</div>

            <script>
                $( document ).ready(function() {
                    //NEW WAY
                    var editor = ace.edit("headeditor");
                    editor.setTheme('ace/theme/monokai');

                    var HTMLMode = ace.require("/ace/mode/html");
                    //editor.session.setMode(new HTMLMode());

                    editor.getSession().setMode("ace/mode/html");
                    editor.setOptions({
                        showPrintMargin: false,
                        maxLines: Infinity
                    });


                    //OLD WAY
                    var textarea = $('#headedit');

                    editor.getSession().on('change', function () {
                        textarea.val(editor.getSession().getValue());
                    });

                    textarea.val(editor.getSession().getValue());

                    $("#toggletextarea-btn").on('click', function () {
                        textarea.toggle();
                        $(this).text(function (i, text) {
                            return text === "Show Content" ? "Hide Content" : "Show Content";
                        });
                    });

                    $("#alertcontent-btn").on('click', function () {
                        alert(textarea.val());
                    });

                });
            </script>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h5>Body Content</h5>
            <p>Edit Body content</p>
            <div id="bodyeditor">{{ $page->body }}</div>

            <script>
                $( document ).ready(function() {
                    //NEW WAY
                    var bodyeditor = ace.edit("bodyeditor");
                    bodyeditor.setTheme("ace/theme/monokai");

                    //var HTMLMode = ace.require("ace/mode/html");
                    //bodyeditor.session.setMode(new HTMLMode());
                    bodyeditor.getSession().setMode("ace/mode/html");
                    bodyeditor.setOptions({
                        showPrintMargin: false,
                        maxLines: Infinity
                    });

                    //OLD WAY
                    var bodytextarea = $('#bodyedit');

                    bodyeditor.getSession().on('change', function () {
                        bodytextarea.val(bodyeditor.getSession().getValue());
                    });

                    bodytextarea.val(bodyeditor.getSession().getValue());

                    $("#toggletextarea-btn").on('click', function () {
                        bodytextarea.toggle();
                        $(this).text(function (i, text) {
                            return text === "Show Content" ? "Hide Content" : "Show Content";
                        });
                    });

                    $("#alertcontent-btn").on('click', function () {
                        alert(bodytextarea.val());
                    });

                });
            </script>

        </div>

    </div>

        <div class="card">
            <div class="card-body">
                <h5>CSS</h5>
                <p>Edit stylesheet</p>
                <div id="csseditor">{{ $page->css }}</div>

                <script>
                    $( document ).ready(function() {
                        //NEW WAY
                        var csseditor = ace.edit("csseditor");
                        csseditor.setTheme('ace/theme/monokai');

                        csseditor.setOptions({
                            showPrintMargin: false,
                            maxLines: Infinity
                        });

                        var HTMLMode = ace.require("/ace/mode/css");
                        //editor.session.setMode(new HTMLMode());

                        csseditor.getSession().setMode("ace/mode/css");

                        //OLD WAY
                        var csstextarea = $('#cssedit');

                        csseditor.getSession().on('change', function () {
                            csstextarea.val(csseditor.getSession().getValue());
                        });

                        csstextarea.val(csseditor.getSession().getValue());

                        $("#toggletextarea-btn").on('click', function () {
                            csstextarea.toggle();
                            $(this).text(function (i, text) {
                                return text === "Show Content" ? "Hide Content" : "Show Content";
                            });
                        });

                        $("#alertcontent-btn").on('click', function () {
                            alert(csstextarea.val());
                        });

                    });
                </script>



                <textarea name="head" style="display: none;" id="headedit">{!! $page->head!!}</textarea>
                <textarea name="body" style="display: none;" id="bodyedit" >{!! $page->body !!}</textarea>
                <textarea name="css" style="display: none;" id="cssedit" >{!! $page->css !!}</textarea>

                <!-- END HJSHCAJKC SJKCHSJKDHSJKLD KS -->



            </div>

        </div>
    <button class="submit" type="submit">Save</button>

    </form>


@endsection