<?= $this->Html->addCrumb('Informations de livraison', array("controller" => "orders","action" => "step1")); ?>
<?= $this->Html->addCrumb('Mode de paiement', array("controller" => "orders","action" => "step1")); ?>

<div class="mainwell">

<p class="grised"><em>Rappel</em></p>
<p><strong>Total a payer :</strong> <?= $total; ?>€</p>

    <h3>Choisissez votre moyen de paiement :</h3>

</div>