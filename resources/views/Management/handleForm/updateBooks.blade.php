<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('library.Home')
    @include('library.updateBooks')
    <title>Update</title>
</head>

<body>
    {{-- navbar --}}
    @include('PublicViews.navbar')
    <div class="wrapper">
        <div class="container mt-4">
            <form action="{{ route('managementBooks.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã sách</label>
                            <input type="text" name="id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $book->id }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Tên sách</label>
                            <input type="text" name="name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $book->name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Tác giả </label>
                            <input type="text" name="author" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $book->author }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Số lượng</label>
                            <input type="text" name="amount" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $book->amount }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Thể loại </label>
                            <select name="type" id="categoryID" class="form-control">
                                @foreach ($type as $typelist)
                                <option value="{{ $typelist->id }}">
                                    {{ $typelist->nametype }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group" style="display: flex; flex-wrap: wrap">
                            <label for="fileinput">Hình ảnh:</label>
                            <label id="labelfile" for="fileinput" name="updateFile">Chọn file</label>
                            <input style="display: none" type="file" name="file" id="fileinput"
                                onchange="chooseFile(this)">
                            <div class="" style="width: 1000px">
                                <img src="{{ url('/public/uploads/' . $book->thumbnail) }}" alt="{{ $book->thumbnail }}"
                                    id="image">
                            </div>
                            <input type="hidden" name="imgFile" value="{{ $book->thumbnail }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- aside --}}
    @include('PublicViews.aside')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function chooseFile(fileInput) {
            var img = document.getElementById('image');
            if (fileInput.files && fileInput.files[0]) {
                img.style = 'display: block';
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</body>

</html>
