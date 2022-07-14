@extends('main')
  
@section('content')
<section class="amount-homes">
        <div class="container">
            <h3>Reset Password</h3>
            <div class="clearfix"></div>
            <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email_address" class="form-label">E-Mail Address</label>
                    <input type="email" name="email" class="form-control" id="email_address" placeholder="">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="resetlinkpassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="resetlinkpassword" placeholder="">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-blue" id="btnresetpasswordlink">Reset Password</button>
                </div>
            </form>
        </div>
</section>
@endsection