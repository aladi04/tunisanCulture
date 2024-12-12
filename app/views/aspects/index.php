<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <h2>Aspects of Our Projects</h2>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/aspects/add"><i class="fa fa-plus"></i> Add
            Aspect</a>
    </div>
   
    <div class="col-md-4">
    <form method="GET" action="<?php echo URLROOT; ?>/aspects/index">
    <input type="text" name="search" placeholder="Rechercher par nom" value="<?php echo htmlspecialchars($data['searchTerm']); ?>">
    <button type="submit">Rechercher</button>
</form>

    </div>
</div>

<?php foreach ($data['aspects'] as $aspect) : ?>
<div class="card mb-3 mt-2">
    <div class="card-body">
        <h2 class="card-text"><?php echo $aspect->nom_aspect; ?></h2>
        <p class="card-body"><?php echo $aspect->description_aspect; ?></p>
        <p class="card-title bg-light p-2 mb-3">
            Category: <?php echo $aspect->categorie; ?>
        </p>
        <?php if (!empty($aspect->image_aspect)) : ?>
    <img src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($aspect->image_aspect, ENT_QUOTES, 'UTF-8'); ?>" 
         alt="Aspect Image" 
         class="img-fluid mb-3">
<?php else : ?>
    <p>No image available for this aspect.</p>
<?php endif; ?>

        <a href="<?php echo URLROOT ;?>/aspects/show/<?php echo $aspect->id_aspect ;?>" class="btn btn-dark btn-block">More...</a>
    </div>
</div>
<?php endforeach; ?>

<!-- Pagination -->

<?php if ($data['totalPages'] > 1): ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($data['currentPage'] > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo URLROOT; ?>/aspects/index?search=<?php echo urlencode($data['searchTerm']); ?>&page=<?php echo $data['currentPage'] - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                <li class="page-item <?php echo ($i == $data['currentPage']) ? 'active' : ''; ?>">
                    <a class="page-link" href="<?php echo URLROOT; ?>/aspects/index<?php echo $data['searchTerm'] ? '?search=' . urlencode($data['searchTerm']) . '&' : '?'; ?>page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo URLROOT; ?>/aspects/index?search=<?php echo urlencode($data['searchTerm']); ?>&page=<?php echo $data['currentPage'] + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>
