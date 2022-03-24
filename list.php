<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


</head>

<body>



    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <form action="" method="POST" role="form">
                    <legend>Danh sách User </legend>

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                    @endif
            </div>
            <h4>STT {{ $item->firstItem() }} -> {{ $item->lastItem() }}</h4>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Email</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($item as $table)
                    <tr class="odd gradeX">
                        <td>{{$table->id}}</td>
                        <td>{{$table->mail_address}}</td>
                        <td>{{$table->name}}</td>
                        <td>{{$table->address}}</td>
                        <td>{{$table->phone}}</td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
               <button ><a href="register">Thêm</a></button>
            {{ $item->render() }}
        </div>
    </div>

    </form>






    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>