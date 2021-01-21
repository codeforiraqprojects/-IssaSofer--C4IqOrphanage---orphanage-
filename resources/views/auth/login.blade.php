@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="logins">
    <div class="container">
        <div class="log">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">تسجيل الدخول</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="socialite text-center">
                            <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook">Facebook <i class="fa fa-facebook"></i></a>
                            <a href="{{ url('/auth/google') }}" class="btn btn-google">Google <i class="fa fa-google"></i></a>
                        </div>
                        <label for="name">اسم المستخدم</label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="اسم المستخدم" />
                        <label for="name">كلمة المرور</label>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="كلمة المرور" />
                        
                        <button type="submit" class="btn btn-primary">
                            تسجيل الدخول
                        </button>
                        <div class="row">
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link rest" href="{{ route('password.request') }}">
                                        هل نسيت كلمة السر؟
                                    </a>
                                @endif
                            </div>

                            <div class="col-6">
                                <a class="btn btn-link" href="{{ route('register') }}">تسجيل جديد</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="img">
                        <img src="{{asset('image/header.jpg')}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- start footer -->
<div class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook-f"></i></a>
            </div>
            <div class="col-7">
                <p>جميع الحقوق &copy; محفوظة لدار الايتام</p>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
@endsection
