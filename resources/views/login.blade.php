@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                  @if(isset(Auth::user()->email))
                  <script>window.location="/main/successlogin";</script>
                  @endif

                  @if($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{$message}}</strong>
                  </div>
                  @endif
                  @if(count($errors) > 0)
                    <div>
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/masterlogin') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('tgi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Employee ID</label>

                            <div class="col-md-6">
                                <input type="tgi" class="form-control" name="tgi" value="{{ old('tgi') }}">

                                @if ($errors->has('tgi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="pass">

                                @if ($errors->has('pass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection