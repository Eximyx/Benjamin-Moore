<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summernote</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<div id="summernote"><p>Hello Summernote</p></div>
<script>
    const getSummerNote = () => {
        const htmlCode = $('#summernote').summernote('code');
        const div = document.createElement("div");

        div.innerHTML = htmlCode;
        new FormData()
        document.body.appendChild(div);

    }


    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
{{--<div>--}}
<button onclick="getSummerNote()" class="btn btn-primary" type="submit">
ALee
</button>
{{-- </div>--}}
</body>
</html>
