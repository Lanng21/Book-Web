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
        <div class="container mt-5">
            <form action="{{ route('managementType.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="" class="form-label">Thể loại</label>
                            <input type="text" name="nametype" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
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
