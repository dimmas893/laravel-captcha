<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adding Google reCAPTCHA v2 to form in Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <!-- Include script -->
    {!! htmlScriptTagJsApi() !!}
</head>

<body>
    ​
    <!-- Alert message (start) -->
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    <!-- Alert message (end) -->
    <div class="container">
        <h2>Contact form</h2>
        <form action="{{ route('page.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="email" placeholder="Enter name" name="name"
                    value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                    value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" placeholder="Enter message" name="message">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <small class="text-danger">{{ $errors->first('message') }}</small>
                @endif
            </div>

            <!-- Google reCaptcha v2 -->
            {!! htmlFormSnippet() !!}
            @if ($errors->has('g-recaptcha-response'))
                <div>
                    <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    ​
</body>

</html>
