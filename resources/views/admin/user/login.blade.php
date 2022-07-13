<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" ></script>
    <style>
        body{
            background-color: #83b9f2;
        }
        .slidee {
            animation: slidee;
            -webkit-animation-name: slidee;
            animation-duration: 1.5s;
            -webkit-animation-duration: 1.5s;
            visibility: visible;
        }

        @keyframes slidee {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
        @-webkit-keyframes slidee {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <strong>Logo</strong> &nbsp;
        </a>
    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6 slidee">
            <div class="card">
                <h4 class="card-header">ĐĂNG NHẬP</h4>
                @include('admin.alert')
                <div class="card-body">
                    <form method="post" action="{{route('store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email" >Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Mật khẩu</label>
                            <input type="password" class="form-control" id="matkhau" name="password" required>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 ">
                                <button type="submit" class="btn btn-block btn-primary">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
