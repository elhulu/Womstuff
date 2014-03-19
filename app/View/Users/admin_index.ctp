<a class="btn btn-primary small-button" href="/ecommerce/admin/users/add">Ajouter un utilisateur</a>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nom d'utilisateur</th>
        <th>Date de création</th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><span class="badge badge-default"><?php echo $user['User']['id']; ?></span></td>
        <td>
            <?= $this->Html->link($user['User']['username'],
                array('controller' => 'users', 'action' => 'admin_edit', $user['User']['id'])); ?>
        </td>
        <td><?= $user['User']['created']; ?></td>

        <td><?= $this->Html->link("Modifier",
                array('controller' => 'users', 'action' => 'admin_edit', $user['User']['id']),array('class' => 'btn btn-warning small-button')); ?>

            <?= $this->Html->link("Supprimer",
                array('controller' => 'users', 'action' => 'deletef', $user['User']['id']),array('class' => 'btn btn-danger small-button')); ?>
        </td>

    </tr>

<?php 
	endforeach; 
	unset($users); 
 ?>