@extends('layouts.default')
@section('contents')
    <div class="container">



                        <form action="" method="POST" enctype="multipart/form-data" class="form-floating">
                                                <form action="" method="POST" enctype="multipart/form-data" class="form-floating">
                            <fieldset>
                                <div class="form-group" >
                                    <input class="form-control" placeholder="E-mail" name="  mail_address" type="email" autofocus >
                                    @if ($errors->get('mail_address'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('mail_address') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif


                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control is-invalid" id="floatingInputInvalid" placeholder="nhập mật khẩu" >
                                        @if ($errors->any())
                                        @if ($errors->get('password'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('password') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif 
                                </div>
                                <div class="form-group">
                                    <input type="password" name="passwordconfirm" class="form-control is-invalid" id="floatingInputInvalid" placeholder="xác nhận mật khẩu" >
                                        @if ($errors->any())
                                        @if ($errors->get('passwordconfirm'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('passwordconfirm') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
@@ -33,19 +42,33 @@
                                </div>
                               <div class="form-group">                               
                                  <input class="form-control" placeholder="họ tên" name="name" type="text" autofocus>
                                    @if ($errors->get('name'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('name') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif 
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="địa chỉ" name="address" type="text" autofocus >
                                    @if ($errors->get('address'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('address') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif 
                                </div>
                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control is-invalid" id="floatingInputInvalid" placeholder="nhập số điện thoại" >
                                        @if ($errors->any())
                                        @if ($errors->get('phone'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('phone') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                                @endif 
                                        @endif 
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="submit">Thêm mới</button>
                            </fieldset>
                         @csrf
                        </form>
    </div>
 
@endsection