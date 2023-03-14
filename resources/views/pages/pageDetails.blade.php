<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('assets/css/index.css') }}">
</head>

<body>



    <a href="{{ route('view-pages') }}">Back</a> <br><br><br>

    <div>
        <div style="display: flex; justify-content:space-between;">
            <div>
                Title: <h3>{!! $page->title !!}</h3>
            </div>
            @if(Auth::user()->user_type == 'admin')
            <div>
                <a href="{{ route('delete-page-details', [ 'url_slug' => $page->url_slug ]) }}"><button onclick="return confirm('Are you sure, you want to delete the Page?')">Delete</button></a>
                <a href="{{ route('edit-page-details', [ 'url_slug' => $page->url_slug ]) }}"><button>Edit</button></a>
            </div>
            @endif
        </div>
        <div>
            Content: <h1>{!! $page->content !!}</h1>
        </div>
    </div>




</body>

</html>