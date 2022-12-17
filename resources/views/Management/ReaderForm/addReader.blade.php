<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('library.Home')
    @include('library.addBooks')
    <title>{{ $title }}</title>
</head>

<body>
    {{-- navbar --}}
    @include('PublicViews.navbar')
    <div class="wrapper">
        @include('admin.alert')
        <div class="container mt-5">
            <form action="{{ route('managementReaders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã người đọc</label>
                            <input type="text" name="id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Họ và tên</label>
                            <input type="text" name="name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Số điện thoại</label>
                            <input type="text" name="phonenumber" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" min="1" max="500">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã thẻ</label>
                            <input type="text" name="idCard" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" min="1" max="500">
                        </div>
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
</body>

</html>
