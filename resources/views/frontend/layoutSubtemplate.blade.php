<html>
<head>
    <title>{!! $page->title !!}</title>
    {!! $template->head !!}
    {!! $page->head !!}
    <link rel='stylesheet' type='text/css' href='{{secure_asset('/css/style.php')}}' />
</head>
<body>
{!! $body !!}
</body>
</html>
