<?php
    //Start a Session
    if( !session_id() ) @session_start();

    require "../vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <?php
  if(true) {
      flash()->message('Hot!');
  }
  echo flash()->display('error');

    flash()->message('Error!', 'error');
//    echo flash()->display();

    flash()->error('Error-type2!', 'error');
//    echo flash()->display();

    flash()->success('Success message!');
//    echo flash()->display();

    flash('something', 'error');

  ?>
</body>
</html>