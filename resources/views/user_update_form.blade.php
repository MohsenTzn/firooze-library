@extends('layouts.app')
@can('isSuperAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ثبت نام</div>

                    <div class="card-body">
                        <form method="POST" action="/user_update/{{$user->id}}" style="direction: rtl">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">نام کاربری</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">نام</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right"> نام خانوادگی</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="father_name" class="col-md-4 col-form-label text-md-right"> نام پدر</label>

                                <div class="col-md-6">
                                    <input id="father_name" type="text" class="form-control" value="{{ $user->father_name }}" name="father_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right"> آدرس</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" value="{{ $user->address }}" name="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_job" class="col-md-4 col-form-label text-md-right"> شغل پدر</label>

                                <div class="col-md-6">
                                    <input id="father_job" type="text" class="form-control" value="{{ $user->father_job }}" name="father_job">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile_number" class="col-md-4 col-form-label text-md-right">شماره موبایل</label>

                                <div class="col-md-6">
                                    <input id="mobile_number" type="text" class="form-control" value="{{ $user->mobile_number }}" name="mobile_number">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_mobile_number" class="col-md-4 col-form-label text-md-right"> شماره موبایل پدر</label>

                                <div class="col-md-6">
                                    <input id="father_mobile_number" type="text" class="form-control" value="{{ $user->father_mobile_number }}" name="father_mobile_number">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="grade" class="col-md-4 col-form-label text-md-right"> مقطع طحصیلی</label>

                                <div class="col-md-6">
                                    <input id="grade" type="number" class="form-control" value="{{ $user->grade }}" name="grade">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="user_type" class="col-md-4 col-form-label text-md-right">نوع کاربر</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="user_type" value="{{ $user->user_type }}"  name="user_type" >
                                            <option>admin</option>
                                            <option>user</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
@section('content')
    <div class="container"  >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Auth::check())
                        <div class="card-header">کاربر</div>
                    @else
                        <div class="card-header">خطا</div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/login">دسترسی غیر مجاز ....</a>
                        <script type="text/javascript">
                            var count = 5;
                            var redirect = "/login";

                            function countDown(){
                                var timer = document.getElementById("timer");
                                if(count > 0){
                                    count--;
                                    timer.innerHTML ="<p>" + count + "</p>";
                                    //delay for 1000ms
                                    setTimeout("countDown()", 1000);
                                }else{
                                    window.location.href = redirect;
                                }
                            }

                        </script>
                        <br>
                        <span id="timer">
                            <script type="text/javascript">countDown();</script>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endcan
