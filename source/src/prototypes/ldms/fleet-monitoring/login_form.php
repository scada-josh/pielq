<html>
<head>
<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap3.3.6/css/bootstrap.min.css">

    <script src="assets/jquery/jquery-1.12.3.min.js"></script>
    <script src="assets/bootstrap3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<form class="form-horizontal" action="login.php" method="post" data-parsley-validate>
<center><h2 class="form-signin-heading">PLASE SIGN IN</h2></center>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="input" class="col-sm-4 control-label">Username</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="strUser" name="strUser" required data-parsley-trigger="keyup" data-parsley-pattern="/^[0-9a-zA-_-]+$/" data-parsley-pattern-message="ค่านี้ควรจะเป็น ตัวเลข, ภาษาอังกฤษ">
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="input" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="strPass" name="strPass" required data-parsley-trigger="keyup" data-parsley-pattern="/^[0-9a-zA-_-]+$/" data-parsley-pattern-message="ค่านี้ควรจะเป็น ตัวเลข, ภาษาอังกฤษ">
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="col-sm-4 control-label"></label>
        <div class="col-sm-4">
        <button type="submit" class="btn btn-lg btn-primary btn-block">LOGIN</button>
      </div>
    </div>
  </div>
</div>

</form>

</body>
</html>