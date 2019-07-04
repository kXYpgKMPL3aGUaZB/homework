<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" v-cloak>
        <div class="container py-2">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ url('consoles/activities') }}">
                        @method('PUT')
                        @csrf

                        <div class="btn-group w-100" role="group" aria-label="">
                            <button type="submit" name="enabled" value="1" class="btn btn-success w-100">Enable</button>
                            <button type="submit" name="enabled" value="0" class="btn btn-danger w-100">Disable</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <data-component></data-component>
        <!-- <div class="container">
            @if (count($logs) > 0)
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d.m.Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $logs->links() }}
            @else
            <div class="alert alert-dark" role="alert">
                No records
            </div>
            @endif
        </div> -->
    </div>
</body>

</html>
