<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/events"><i class="fa fa-backward"></i> Go
            Back</a>
    </div>
</div>
<div class="card mb-3 mt-2">
    <div class="card-body">
        <h2 class="card-text"><?php echo htmlspecialchars($data['event']->nom); ?></h2>
    </div>
    <p class="card-body">
        <?php echo nl2br(htmlspecialchars($data['event']->description)); ?>
    </p>
    <p class="card-title bg-light p-2 mb-3">
        <strong>Region:</strong> <?php echo htmlspecialchars($data['event']->region); ?><br>
        <strong>Date:</strong> <?php echo htmlspecialchars($data['event']->date); ?><br>

    </p>


   

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>