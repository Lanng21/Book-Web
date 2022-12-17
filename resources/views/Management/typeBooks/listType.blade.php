<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>HOME</title>
    @include('library.Books')
    @include('library.Home')
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Management Books">
    <meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    {{-- navbar --}}
    @include('PublicViews.navbar')


    <div class="wrapper">

        <div class="content">
            <table class="table table-bordered   wrapper-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Thể loại</th>
                    </tr>
                </thead>
                @foreach ($types as $type)
                    <tr class="tr_info">
                        <td>{{ $type->id }}</td>

                        <td class="td_info">{{ $type->nametype }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
