@extends('layout')

@section('content')
    <form method="POST" action="/admin/site/{{ $site->id }}/template/{{ $template->id }}">
        @method('PATCH')
        @csrf
        <div class="card">
            <div class="card-body">
                <h5>Template Settings</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $template->name }}">
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1"  value="1" @if( $template->status == 1) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Enabled</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" @if( $template->status == 0) checked @endif>
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
                <button style="float: right;position: absolute;top: 20px;right: 20px;" class="btn" type="button" data-toggle="collapse" data-target="#collapseHead" aria-expanded="false" aria-controls="collapseHead">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="collapse show" id="collapseHead">
                    <div id="headeditor">{{ $template->head }}</div>
                </div>


                <script>
                    $( document ).ready(function() {
                        //NEW WAY
                        var editor = ace.edit("headeditor");
                        editor.setTheme('ace/theme/monokai');

                        editor.setOptions({
                            showPrintMargin: false,
                            maxLines: Infinity
                        });

                        var HTMLMode = ace.require("/ace/mode/html");
                        //editor.session.setMode(new HTMLMode());

                        editor.getSession().setMode("ace/mode/html");

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

                <button style="float: right;position: absolute;top: 20px;right: 20px;" class="btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="collapse show" id="collapseExample">
                    <div id="bodyeditor">{{ $template->body }}</div>
                </div>
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
                <!-- END HJSHCAJKC SJKCHSJKDHSJKLD KS -->


        </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5>CSS</h5>
                <p>Edit stylesheet</p>
                <div id="csseditor">{{ $template->css }}</div>

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



                <textarea name="head" style="display: none;" id="headedit">{!! $template->head!!}</textarea>
                <textarea name="body" style="display: none;" id="bodyedit" >{!! $template->body !!}</textarea>
                <textarea name="css" style="display: none;" id="cssedit" >{!! $template->css !!}</textarea>

                <!-- END HJSHCAJKC SJKCHSJKDHSJKLD KS -->



            </div>

        </div>
        <button class="submit" type="submit">Save</button>

    </form>


@endsection