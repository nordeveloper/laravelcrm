@extends('layouts.main')
@section('content')
<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>
@endsection

@section('scripts')
<meta charset="utf-8">
<title>elFinder 2.0</title>

<!-- jQuery and jQuery UI (REQUIRED) -->
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="<?= asset('packages/barryvdh/elfinder/css/elfinder.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= asset('packages/barryvdh/elfinder/css/theme.css') ?>">

<!-- elFinder JS (REQUIRED) -->
<script src="<?= asset('packages/barryvdh/elfinder/js/elfinder.min.js') ?>"></script>

<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    $().ready(function() {
        $('#elfinder').elfinder({
            //lang:'en';
            height:'80%', 
            customData: { 
                _token: '<?= csrf_token() ?>'
            },
            url : '<?= route("elfinder.connector") ?>',  // connector URL
            soundPath: '<?= asset('/sounds') ?>'
        });
    });
</script>
@endsection