<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('library.Home')
    @include('library.addBooks')
    <title>{{ $tittle }}</title>
</head>

<body>
    {{-- navbar --}}
    @include('PublicViews.navbar')
    <div class="wrapper">
        <div class="container mt-4">
            <form action="{{ route('managementReborrow.update', $reborrow->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã Thẻ</label>
                            <input type="text" name="id" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reborrow->id }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Mã sách</label>
                            <input type="text" name="idBook" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reborrow->idBook }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Ngày mượn</label>
                            <input type="datetime" name="dateBorrow" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reborrow->dateBorrow }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Ngày trả</label>
                            <input type="datetime" name="deadline" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $reborrow->deadline }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">Ghi chú</label>
                            <textarea class="form-control" name="note" id="" cols="30" rows="10"
                                value="{{ $reborrow->note }}"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="" class="form-label">số lượng</label>
                            <input class="form-control" name="amount" id=""
                                value="{{ $reborrow->amount }}"></input>
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
</body>

</html>
