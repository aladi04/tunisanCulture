<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('event_message'); ?>
<div class="row">
    <div class="col-md-8">
        <h2>Upcoming Events</h2>
    </div>
   
    <div class="col-md-4">
    <form action="<?php echo URLROOT; ?>/events/index" method="GET">
    <input type="text" name="search" value="<?php echo $data['searchTerm']; ?>" placeholder="Rechercher un événement">
    <button type="submit">Rechercher</button>
</form>
    </div>
    
</div>
<?php foreach ($data['events'] as $event) : ?>
    <div class="card mb-3 mt-2">
        <div class="card-body">
            <h2 class="card-title"><?php echo htmlspecialchars($event->nom); ?></h2>
            <p class="card-text">
                <strong>Region:</strong> <?php echo htmlspecialchars($event->region); ?><br>
                <strong>Date:</strong> <?php echo htmlspecialchars($event->date); ?>
            </p>
            <p class="card-text">
                <?php echo htmlspecialchars(substr($event->description, 0, 150)) . '...'; ?>
            </p>
            <?php if (!empty($event->image)) : ?>
    <img src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($event->image); ?>" alt="Event Image" class="img-fluid mb-3">
<?php endif; ?>

            <p class="card-title bg-light p-2 mb-3"></p>
            <a href="<?php echo URLROOT; ?>/events/show/<?php echo $event->id_event; ?>" class="btn btn-dark btn-block">More...</a>
        </div>
    </div>
<?php endforeach; ?>






<!-- Pagination -->
<?php if($data['totalPages'] > 1): ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if($data['currentPage'] > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo URLROOT; ?>/events/index?page=<?php echo $data['currentPage'] - 1; ?>&search=<?php echo $data['searchTerm']; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for($i = 1; $i <= $data['totalPages']; $i++): ?>
                <li class="page-item <?php echo ($i == $data['currentPage']) ? 'active' : ''; ?>">
                    <a class="page-link" href="<?php echo URLROOT; ?>/events/index?page=<?php echo $i; ?>&search=<?php echo $data['searchTerm']; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if($data['currentPage'] < $data['totalPages']): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo URLROOT; ?>/events/index?page=<?php echo $data['currentPage'] + 1; ?>&search=<?php echo $data['searchTerm']; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>