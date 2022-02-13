<?php $this->layout('master', ['title' => $title]) ?>

<h1>Home (<?php echo $pagination->getTotal(); ?>)</h1>


<h3><?php echo $pagination->getPerPage() ?></h3>

<ul>
    <?php foreach ($users as $user) : ?>
        <li><?php echo $user->firstName; ?></li>
    <?php endforeach; ?>
</ul>

<?php echo $pagination->links(); ?>