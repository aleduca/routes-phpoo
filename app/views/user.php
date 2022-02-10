<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css') ?>
    <link rel="stylesheet" href="/css/styles.css">
<?php $this->stop() ?>

<h1>User</h1>
<p>Hello, <?php echo $this->e($name)?></p>

<?php $this->start('js') ?>
    <script>
        alert('teste');
    </script>
<?php $this->stop() ?>