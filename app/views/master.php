<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->e($title)?></title>
    <?php echo $this->section('css'); ?>
</head>
<body>
    <div class="container">
        <?php $this->insert('partials/header') ?>

        <?php echo $this->section('content')?>
    </div>

    <?php echo $this->section('js'); ?>
</body>
</html>