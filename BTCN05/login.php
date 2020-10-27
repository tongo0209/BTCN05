<?php
    require_once 'init.php';
    require_once 'functions.php';

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = findUserByUsername($username);
        if(!$user)
        {
            $error = 'Không tìm thấy người dùng';
        }
        else{
            if($password != $user['password']){
                $error ='Mật khẩu không chính xác';
            }
            else{
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Đăng nhập</title>
</head>
<body>
<?php if (isset($error)): ?>
<div>
    <?php echo $error; ?>
</div>
<?php else: ?>

<div class="container">
<form action="login.php" method="POST">
  <div class="form-group">
    <label for="username">Tên đăng nhập</label>
    <input type="username" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>
</div>
</body>
</html>

<?php endif; ?>