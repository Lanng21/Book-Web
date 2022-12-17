<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Post 6 Headline, Post 5 Headline, Post 4 Headline, Famous Books">
    <meta name="description" content="">
    <title>Home</title>
    <meta name="generator" content="Nicepage 4.18.5, nicepage.com">
    {{-- <link rel="stylesheet" href="{{ asset('/public/fontawesome-free-6.2.0/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/font-awesome.min.css">
    @include('library.Home')
</head>

<body>
    {{-- navbar --}}
    @include('PublicViews.navbar')

    {{-- aside --}}
    @include('PublicViews.aside')
</body>

</html>
