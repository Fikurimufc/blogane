<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blogane</title>
        {{HTML::style('//fonts.googleapis.com/css?family=Roboto:300,400,500,700')}}
        {{HTML::style('//fonts.googleapis.com/icon?family=Material+Icons')}}
        {{HTML::style('assets/bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('assets/material-design/css/bootstrap-material-design.min.css')}}
        {{HTML::style('assets/material-design/css/ripples.min.css.map')}}
        {{HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}

        {{HTML::script('assets/js/jQuery-2.1.4.min.js')}}
        {{HTML::script('assets/bootstrap/js/bootstrap.min.js')}}
        {{HTML::script('assets/material-design/js/material.js')}}
        {{HTML::script('assets/material-design/js/material.min.js')}}
        {{HTML::script('assets/material-design/js/material.min.js')}}
        <!-- {{HTML::script('assets/plugin/bootstrap-wysihtml5/ripples.min.js')}} -->
        {{HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}
        {{HTML::script('https://www.google.com/recaptcha/api.js' async defer)}}
    </head>
	<body>
		@yield('content')
	</body>
    <script type="text/javascript">
        $.material.init();
    </script>
</html>        