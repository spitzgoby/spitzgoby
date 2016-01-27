<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tom Leu</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Raleway:900,600,300|Inconsolata:400,700|Chivo:400,900italic,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="/css/app.css" rel="stylesheet">
    @yield('style')
</head>

<body>
<div class="fluid-container">
    @include('navigation._topbar')

    <div class="row">

        <div class="col-sm-3">
            @yield('navigation')
        </div>

        <section id="content" class="col-sm-8 col-md-6">
            @include('flash::message')

            @yield('content')

            <script src="/js/main.js"></script>
            <script>
                $(document).ready(function() {
                    $('div.alert').not('.important').delay(3000).slideUp(300);
                });
            </script>
            @yield('script')

            <hr>
            <footer>
                <p class="copyright">Copyright Tom Leu {{ date('Y') }}</p>
            </footer>
        </section>

    </div>
</div>
</body>

</html>