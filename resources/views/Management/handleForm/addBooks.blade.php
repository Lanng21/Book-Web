<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('library.Home')
    @include('library.addBooks')
    <title>Document</title>
</head>

<body>
    {{-- navbar --}}
    @include('PublicViews.navbar')
    <div class="wrapper">
        @include('admin.alert')
        <div class="container mt-4">
            <form action="{{ route('managementBooks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã sách</label>
                            <input type="text" name="id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Tên sách</label>
                            <input type="text" name="name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Tác giả </label>
                            <input type="text" name="author" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Số lượng</label>
                            <input type="number" name="amount" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" min="1" max="500">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="type" style="font-weight: bold">Chọn danh mục:</label>
                            <select name="type" id="categoryID" class="form-control">
                                @foreach ($typelists as $typelist)
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
                        <div class="form-group" id="uploadfile">
                            <label for="fileinput">Hình ảnh:</label>
                            <label id="labelfile" for="fileinput">Chọn file</label>
                            <input style="display: none" type="file" name="file" id="fileinput"
                                onchange="chooseFile(this)">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <img src="" id="image" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <input type="submit" value="Thêm" class="btn btn-primary">
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
