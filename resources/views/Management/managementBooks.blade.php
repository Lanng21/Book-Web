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
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Thể Loại</th>
                        <th>Tác giả</th>
                        <th>Số lượng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach ($result as $book)
                    <tr class="tr_info">
                        <td>{{ $book->id }}</td>
                        <td><img src="{{ url('/public/uploads/' . $book->thumbnail) }}" class="img-book child-child-box"
                                alt=""></td>
                        <td class="td_info">
                            <P>{{ $book->name }}</P>
                        </td>
                        <td class="td_info">
                            <p>{{ $book->type }}</p>
                        </td>
                        <td class="td_info">{{ $book->author }}</td>
                        <td class="td_info">{{ $book->amount }}</td>
                        <td class="td-control">
                            <div class="child-box" style="">
                                <form action="{{ route('managementBooks.edit', $book->id) }}" class="form-action">
                                    <label for="update{{ $book->id }}" class="update"><i
                                            class="fa-solid fa-pen-to-square"></i></label>
                                    <input type="submit" value="Update" id="update{{ $book->id }}" class="update">
                                </form>
                                <form action="{{ route('managementBooks.delete', $book->id) }}}" method="post"
                                    class="form-action">
                                    @csrf
                                    @method('delete')
                                    <label for="delete{{ $book->id }}" class="delete"><i
                                            class="fa-solid fa-trash"></i></label>
                                    <input type="submit" value="Delete" id="delete{{ $book->id }}" class="delete"
                                        style="display: none">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $result->links() }}
    </div>

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
