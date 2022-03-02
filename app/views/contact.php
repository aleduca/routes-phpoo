<?php $this->layout('master', ['title' => $title]) ?>

<h1>Contato</h1>
<?php echo flash('sent_success', 'color:green;') ?>
<?php echo flash('sent_error', 'color:red') ?>

<form action="/contact" method="post">
    <?php echo flash('email') ?>
    <input type="text" name="email" id="" placeholder="email">
    <?php echo flash('subject') ?>
    <input type="text" name="subject" id="" placeholder="Subject">
    <?php echo flash('message') ?>
    <textarea name="message" id="" cols="30" rows="10"></textarea>

    <?php echo getToken(); ?>

    <button type="submit">Send</button>
</form>