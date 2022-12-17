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
        <div class="container">
            <form action="{{ route('managementReaders.update', $reader->idReader) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã người đọc</label>
                            <input type="text" name="id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reader->idReader }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Họ và tên</label>
                            <input type="text" name="name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reader->nameReader }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reader->address }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Số điện thoại</label>
                            <input type="text" name="phonenumber" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reader->phonenumber }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <label for="" class="form-label">Mã thẻ</label>
                        <input type="text" name="idCard" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" min="1" max="500" value="{{ $reader->idCard }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <input type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
