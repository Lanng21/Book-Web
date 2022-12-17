<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{ $title }}</title>
    @include('library.Books')
    @include('library.Home')
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Management Readers">
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
                        <th>Mã sách</th>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Đã trả</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach ($result as $reborrow)
                    <tr class="tr_info">
                        <td>{{ $reborrow->id }}</td>
                        <td class="td_info">{{ $reborrow->idBook }}</td>
                        <td class="td_info">{{ $reborrow->dateBorrow }}</td>
                        <td class="td_info">{{ $reborrow->deadline }}</td>
                        <td class="td_info">{{ $reborrow->returned }}</td>
                        <td class="td_info">{{ $reborrow->note }}</td>
                        <td class="td-control">
                            <div class="child-box" style="">
                                <div class="child-child-box" style="">
                                    <form action="{{ route('managementReborrow.edit', $reborrow->id) }}">
                                        <input type="submit" value="Update" class="btn btn-outline-primary ">
                                    </form>
                                    <form action="{{ route('managementReborrow.delete', $reborrow->id) }}"
                                        method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="btn btn-outline-danger ">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
