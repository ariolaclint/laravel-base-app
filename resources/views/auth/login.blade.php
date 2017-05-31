<!DOCTYPE html>
<html>
<head>
  <title> {{ config('app.name', 'My App') }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body class="align">
  <div class="grid">
  <div style="color: darkred;text-align:center;padding-bottom: 20px;">
      @if ($errors->has('username'))
        <span class="help-block">
        <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
  </div>
    @if ($errors->has('password'))
      <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
      </span>
     @endif
    <form action="{{ route('login') }}" method="POST" class="form login" name="myForm">
      {{ csrf_field() }}
      <header class="login__header">
        <h3 class="login__title">Admin Portal</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input  id="username" type="username" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>

        </div>

        <div class="form__field">
          <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" value="Login">
        <p><span></span><a href="#"></a></p>
      </footer>

    </form>
  </div>
</body>
</html>