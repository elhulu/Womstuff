<!-- sidebar a inclure avec "echo $this->element('sidebar');" sur les vues la nécessitant -->

<div class="col-md-3" id="sidebar">
<?php $categories = $this->requestAction('categories/getcategories'); ?>
    <div class="panel-group" id="accordion">
      <?php foreach ($categories as $key => $value): ?>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?= $value['Category']['id'] ?>">
                      <?= $value['Category']['name'] ?>
                    </a>
            </h4>
        </div>
        <div id="<?= $value['Category']['id'] ?>" class="panel-collapse collapse">
            <div class="panel-body">
    
                <?php $subCategories = $this->requestAction('categories/children/'.$value['Category']['id']) ?>
                <ul>
                <?php foreach ($subCategories as $key => $subCategory): ?>
                    <li><?= $this->Html->link('> ' . $subCategory['Category']['name'], array('controller' => 'products', 'action' => 'view', 'category' => $subCategory['Category']['slug'])); ?></li>            
                <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    </div>
</div>
<?= $this->fetch('content') ?>