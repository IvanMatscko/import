<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>


        table {
            border-spacing: 0 10px;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
        }
        th {
            padding: 10px 20px;
            background: #56433D;
            color: #F9C941;
            border-right: 2px solid;
            font-size: 0.9em;
        }
        th:first-child {
            text-align: left;
        }
        th:last-child {
            border-right: none;
        }
        td {
            vertical-align: middle;
            padding: 10px;
            font-size: 14px;
            text-align: center;
            border-top: 2px solid #56433D;
            border-bottom: 2px solid #56433D;
            border-right: 2px solid #56433D;
        }
        td:first-child {
            border-left: 2px solid #56433D;
            border-right: none;
        }
        td:nth-child(2){
            text-align: left;
        }


        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content" style="padding: 5px;">
        @if($flash = session('message'))
            <div class="alert alert-success" role="alert">
                {{$flash}}
            </div>
        @endif
        <a href="{{ route('export') }}">Загрузить</a>

        <div class="form-block">
            <form method="post" enctype="multipart/form-data" action="{{ url('/import') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td width="40%" align="right"><label>Select File for Upload</label></td>
                            <td width="30">
                                <input type="file" name="import_file" />
                            </td>
                            <td width="30%" align="left">
                                <input type="submit" name="import" class="btn btn-primary" value="Import">
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"></td>
                            <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                            <td width="30%" align="left"></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div>
            <table>
                <thead>
                <tr>
                    <th>id</th>
                    <th>rubric</th>
                    <th>categories</th>
                    <th>brand</th>
                    <th>product_name</th>
                    <th>code</th>
                    <th>description</th>
                    <th>price</th>
                    <th>guarantee</th>
                    <th>availability</th>
                </tr>
                </thead>
                <tbody>

                <?php var_dump(count($catalogs)); ?>


                @forelse($catalogs as $catalog)
                    <tr>
                        <td>{{ $catalog->id }}</td>
                        <td>{{ $catalog->rubric }}</td>
                        <td>{{ $catalog->categories }}</td>
                        <td>{{ $catalog->brand }}</td>
                        <td>{{ $catalog->product_name }}</td>
                        <td>{{ $catalog->code }}</td>
                        <td>{{ $catalog->description }}</td>
                        <td>{{ $catalog->price }}</td>
                        <td>{{ $catalog->guarantee }}</td>
                        <td>{{ $catalog->availability }}</td>
                    </tr>
                @empty
                    <tr>Записи отсутствуют</tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
