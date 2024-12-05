<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('aspect_message'); ?>
<div class="row">
    <div class="col-md-8">
        <h2>Aspects of Our Projects</h2>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT ;?>/aspects/add"><i class="fa fa-pencil"></i> Add
            Aspect</a>
    </div>
</div>
<?php foreach ($data['aspects'] as $aspect) : ?>
<div class="card mb-3 mt-2">
    <div class="card-body">
        <h2 class="card-text"><?php echo $aspect->nom_aspect; ?></h2>
        <p class="card-body">
            <?php echo $aspect->description_aspect; ?>
        </p>
        <p class="card-title bg-light p-2 mb-3">
            Category: <?php echo $aspect->categorie; ?>
        </p>
        <a href="<?php echo URLROOT ;?>/aspects/show/<?php echo $aspect->id_aspect ;?>"
            class="btn btn-dark btn-block">More...</a>
    </div>
</div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>