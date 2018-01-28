<!DOCTYPE html>
<html>

<head>
    <title>Account Kit (Laravel)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
    pre {
        display: block;
        padding: 9.5px;
        margin: 0 0 10px;
        font-size: 13px;
        line-height: 1.42857143;
        color: #e5e5e5;
        word-break: break-all;
        word-wrap: break-word;
        background-color: #286090;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    </style>
</head>
<body>
  <div class="container">
    <div class="jumbotron">
            <h1>Account Kit on Laravel</h1>
            <p>Facebook's Passwordless Login</p>
            <hr>

            <h4>User ID</h4>
            <hr>
            <pre>{{ $user->id }}</pre>

            <h4>FB User ID</h4>
            <hr>
            <pre>{{ $user->fbUserId }}</pre>

            <h4>Number</h4>
            <hr>
            <pre>{{ $user->number }}</pre>

        <hr>

        <form method="post" action="{{ route('fileUpload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload your file</label>
                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <p>Type:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="exampleRadios1" value="Report" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Report
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="exampleRadios2" value="Prescription">
                <label class="form-check-label" for="exampleRadios2">
                    Prescription
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="exampleRadios3" value="Invoice">
                <label class="form-check-label" for="exampleRadios3">
                    Invoice
                </label>
            </div>

            <button class="btn btn-default">Upload</button>
        </form>

        <hr>

        @foreach($files as $file)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" height="70" width="150" src="{{ asset("images/$file->file_name") }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $file->file_name }}</h5>
                <h5 class="card-title">{{ $file->type }}</h5>
            </div>
        </div>
        @endforeach

  </div>

  <a href="{{ route('logout') }}"><button class="btn btn-success" >Logout</button></a>
</body>
</html>
