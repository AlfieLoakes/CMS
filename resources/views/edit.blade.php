@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Page Settings</h5>
            <div class="row">
            <div class="col-sm-6">
                <p>Page Template</p>
                <p>Sub-Template</p>
                <p>Featured Image</p>

            </div>
            <div class="col-sm-6">
                <p>URL</p>
                <p>Status</p>
            </div>
            </div>
        </div>
    </div>

        <div class="card">
            <div class="card-body">
                <h5>Head Elements</h5>
                <p>Edit page header below</p>
                <p>Or use parent head elements</p>
                <div id="headeditor"></div>

                <script>
                    $( document ).ready(function() {
                        //NEW WAY
                        var editor = ace.edit("headeditor");
                        editor.setTheme("ace/theme/monokai");

                        var HTMLMode = ace.require("ace/mode/html").Mode;
                        editor.session.setMode(new HTMLMode());


                        //OLD WAY
                        var textarea = $('#head');

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
                <div id="bodyeditor"></div>

                <script>
                    $( document ).ready(function() {
                        //NEW WAY
                        var bodyeditor = ace.edit("bodyeditor");
                        bodyeditor.setTheme("ace/theme/monokai");

                        var HTMLMode = ace.require("ace/mode/html").Mode;
                        bodyeditor.session.setMode(new HTMLMode());


                        //OLD WAY
                        var bodytextarea = $('#content');

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


                <form action="updatepage.php" method="post">
                    <textarea name="headcontent" style="display: none;" id="head"></textarea>
                    <textarea name="bodycontent" style="display: none;" id="content" ></textarea>


                <!-- END HJSHCAJKC SJKCHSJKDHSJKLD KS -->



            </div>

        </div>
    <button class="submit" type="submit">Save</button>

    </form>


@endsection