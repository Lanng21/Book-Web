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
            <form action="{{ route('managementReborrow.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã thẻ</label>
                            <input type="text" name="id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã sách</label>
                            <input type="text" name="idBook" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Ngày mượn</label>
                            <input type="date" name="dateBorrow" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Ngày trả</label>
                            <input type="date" name="deadline" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" min="1" max="500">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Ghi chú</label>
                            <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">số lượng</label>
                            <input class="form-control" name="amount" id="" value="1"></input>
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
