<?php switch ($type) {
    case 'error':?>
    <div class="alert alert-danger">
        <?= $message ?>
    </div>
    <?php break; 
    case 'success':?>
    <div class="alert alert-success">
        <?= $message ?>
    </div>
    <?php break;
    case 'warning' :?>
    <div class="alert alert-warning">
        <?= $message ?>
    </div>
    <?php break;
    case 'info' :?>
    <div class="alert alert-info">
        <?= $message ?>
    </div>
<?php 
} ?>