<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $this->renderSection('title') ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <?= $this->renderSection('styles') ?>

  <style>
        .img-student{
            height: 100px;
            width: 100px;
        }
  </style>
  
</head>
<body>
 
    <div class="container">
        <h2>Quản lý sinh viên</h2>

        <?php
          if(session()->get("success")){
              ?>
                <div class="alert alert-success">
                    <?= session()->get("success") ?>
                </div>
              <?php
          }

          if(session()->get("error")){
            ?>
              <div class="alert alert-danger">
                  <?= session()->get("error") ?>
              </div>
            <?php
        }
        ?>

        <?= $this->renderSection('body') ?>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
