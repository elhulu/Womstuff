<!-- Set Title -->
<?php $this->set('title_for_layout', 'Liste des produits') ?>

<div class="row">
    <?= $this->Html->link('Ajouter un produit', array('controller' => 'products', 'action' => 'admin_add'), array('class' => 'btn btn-primary small-button')); ?>
	<table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Slug</th>
            <th>Caractéristiques</th>
            <th>Administration</th>
        </tr>
      <?php foreach ($products as $product) { ?>
        <tr>
            <td><span class="badge badge-default"><?= $product['Product']['id']; ?></span></td>
            <td><?= $product['Product']['name']; ?></td>
            <td><?= $product['Brand']['name']; ?></td>
            <td><?= $product['Product']['price']; ?> &euro;</td>
            <td><?= $product['Category']['name'] ?></td>
            <td><?= $product['Product']['slug'] ?></td>
            <td>
                <?php foreach ($product['Feature'] as $key => $value): ?>
                    <ul>
                        <li><?= $value['name'] ?> : <?= $value['FeaturesProduct']['value'] ?></li>
                    </ul>
                <?php endforeach ?>
            </td>
            <td>
               <?= $this->Html->link('Editer', array('controller' => 'products', 'action' => 'admin_edit', $product['Product']['id']), array('class' => 'btn btn-warning small-button')); ?>
	           <?= $this->Html->link('Supprimer', array('controller' => 'products', 'action' => 'admin_delete', $product['Product']['id']),array('class' => 'btn btn-danger small-button'), null, "Etes vous sûr de vouloir supprimer ce produit?"); ?>
            </td>
            </tr>
            <?php } ?>
    </table>
</div>