<?php $this->layout('master', ['title' => $title]) ?>

<h1>Contato</h1>

<form action="/contact" method="post">
    <input type="text" name="email" id="" placeholder="email">
    <input type="text" name="subject" id="" placeholder="Subject">
    <textarea name="message" id="" cols="30" rows="10"></textarea>

    <button type="submit">Send</button>
</form>