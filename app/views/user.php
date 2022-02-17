<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>

<form action="/user/update" method="post">

    <input type="text" name="firstName" value="Alexandre">
    <input type="text" name="lastName" value="Cardoso">
    <!-- <?php echo getToken(); ?> -->
    <input type="text" name="email" value="xandecar@hotmail.com">
    <input type="password" name="password" value="123">

    <button type="submit">Atualizar</button>

</form>