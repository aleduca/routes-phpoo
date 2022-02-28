<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>
<?php echo flash('created') ?>

<form action="/user/update" method="post">
    <?php echo flash('firstName', 'color:red') ?>
    <input type="text" name="firstName" value="Alexandre">

    <?php echo flash('lastName', 'color:red') ?>
    <input type="text" name="lastName" value="Cardoso">

    <?php echo getToken(); ?>

    <?php echo flash('email') ?>
    <input type="text" name="email" value="xandecar@hotmail.com">
    
    <?php echo flash('password') ?>
    <input type="password" name="password" value="123">

    <button type="submit">Atualizar</button>

</form>