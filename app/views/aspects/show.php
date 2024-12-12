<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT ;?>/aspects"><i class="fa fa-backward"></i> Go
            Back</a>
    </div>
</div>
<div class="card mb-3 mt-2">
    <div class="card-body">
        <h2 class="card-text"><?php echo $data['aspect']->nom_aspect; ?></h2>
    </div>
    <p class="card-body">
        <?php echo $data['aspect']->description_aspect; ?>
    </p>
    <p class="card-title bg-light p-2 mb-3">
        Category: <?php echo $data['aspect']->categorie; ?>
    </p>


    <div class="row">
        <div class="col">
            <a href="<?php echo URLROOT ;?>/aspects/edit/<?php echo $data['aspect']->id_aspect ;?>"
                class="btn btn-dark btn-block">Edit</a>
        </div>
        <div class="col">
            <form class="pull-right"
                action="<?php echo URLROOT ;?>/aspects/delete/<?php echo $data['aspect']->id_aspect; ?>" method="post">
                <input type="submit" class="btn btn-danger btn-block" value="Delete">
            </form>
        </div>
    </div>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>