<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('event_message'); ?>
<div class="row">
    <div class="col-md-8">
        <h2>Upcoming Events</h2>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/events/add"><i class="fa fa-plus"></i> Add
            Event</a>
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
        <p class="card-text"><?php echo htmlspecialchars(substr($event->description, 0, 150)) . '...'; ?></p>
        <?php if (!empty($event->image)) : ?>
        <img src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($event->image); ?>" alt="Event Image"
            class="img-fluid mb-3">
        <?php endif; ?>
        <p class="card-title bg-light p-2 mb-3">

        </p>
        <a href="<?php echo URLROOT; ?>/events/show/<?php echo $event->id_event; ?>"
            class="btn btn-dark btn-block">More...</a>
    </div>
</div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>