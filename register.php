<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


</head>

<body>


    <div class="container" style="margin-left: 400px;margin-top: 30px;">

        <div class="row">

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                {{csrf_field()}}
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm Mới User</h3>
                    </div>

                    <form action="{{URL::to('/register')}}" method="POST" enctype="multipart/form-data" role="form">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="panel-body">
                            <label for="">Email:</label>

                            <input type="email" name="mail_address" class="form-control" value="" required="required" title="">

                        </div>
                        <div class="panel-body">
                            <label for="">Mật khẩu:</label>

                            <input type="password" name="password" class="form-control" value="" required="required" title="">
                            @if ($errors->get('password'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('password') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>

                        <div class="panel-body">
                            <label for="">Nhập lại mật khẩu:</label>

                            <input type="password" name="password_confirm" class="form-control" value="" required="required" title="">
                            @if ($errors->any())
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('password_confirm') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>
                        <div class="panel-body">
                            <label for="">Họ tên:</label>

                            <input type="text" name="name" class="form-control" value="" required="required" title="">

                        </div>
                        <div class="panel-body">
                            <label for="">Địa chỉ:</label>

                            <input type="address" name="address" class="form-control" value="" required="required" title="">

                        </div>
                        <div class="panel-body">
                            <label for="">Số điện thoại:</label>

                            <input type="text" name="phone" class="form-control" value="" required="required" title="">

                        </div>
                        <div class="panel-body">


                            <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>


                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>





    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>