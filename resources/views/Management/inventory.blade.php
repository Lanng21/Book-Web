<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>nventory</title>
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
        <div class="search" style="display: flex">
            <form action="{{ route('managementReborrow.index') }}" method="post">
                @csrf
                {{-- @method('show') --}}
                <div class="">
                    <input type="text" name="search" id="" class="form-control" placeholder="search">
                </div>
                <div class="">
                    <input type="submit" value="Search" class="btn btn-outline-primary ">
                </div>
            </form>
        </div>
        <div class="content">
            <table class="table table-bordered   wrapper-table">
                <tr>
                    <th>Mã Sách</th>
                    <th>Tên Sách</th>
                    <th>Tổng số sách</th>
                    <th>Sách trong kho</th>
                    <th>Sách cho mượn</th>

                </tr>
                @foreach ($store as $book)
                <tr class="tr_info">
                    <td>{{ $book->idBook }}</td>
                    <td class="td_info">{{ $book->nameBook }}</td>
                    <td class="td_info">{{ $book->total }}</td>
                    <td class="td_info">{{ $book->storeBooks }}</td>
                    <td class="td_info">{{ $book->borrowBooks }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>