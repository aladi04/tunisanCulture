<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Edit Event</h2>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/events" class="btn btn-light pull-right">
                            <i class="fa fa-backward"></i> Back
                        </a>
                    </div>
                </div>
                <p class="card-text">Update the details of the event below</p>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo URLROOT; ?>/events/edit/<?php echo $data['id_event']; ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Event Name<sub>*</sub></label>
                        <input type="text" name="nom"
                            class="form-control form-control-lg <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['nom']; ?>">
                        <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="region">Region<sub>*</sub></label>
                        <select name="region"
                            class="form-control form-control-lg <?php echo (!empty($data['region_err'])) ? 'is-invalid' : ''; ?>">
                            <option value="">Select Region</option>
                            <option value="North" <?php echo ($data['region'] === 'North') ? 'selected' : ''; ?>>North
                            </option>
                            <option value="South" <?php echo ($data['region'] === 'South') ? 'selected' : ''; ?>>South
                            </option>
                            <option value="East" <?php echo ($data['region'] === 'East') ? 'selected' : ''; ?>>East
                            </option>
                            <option value="West" <?php echo ($data['region'] === 'West') ? 'selected' : ''; ?>>West
                            </option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['region_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="description">Description<sub>*</sub></label>
                        <textarea name="description"
                            class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="image">Image (Optional)</label>
                        <input type="file" name="image"
                            class="form-control form-control-lg <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="date">Date<sub>*</sub></label>
                        <input type="date" name="date"
                            class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['date']; ?>">
                        <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                    </div>

                    <!-- Add Aspect selection -->
                    <div class="form-group">
                        <label for="aspect">Aspect<sub>*</sub></label>
                        <select name="aspect"
                            class="form-control form-control-lg <?php echo (!empty($data['aspect_err'])) ? 'is-invalid' : ''; ?>">
                            <option value="">Select Aspect</option>
                            <?php foreach ($data['aspects'] as $aspect): ?>
                            <option value="<?php echo $aspect->id_aspect; ?>"
                                <?php echo ($data['aspect'] == $aspect->id_aspect) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($aspect->categorie); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['aspect_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block pull-left" value="Update Event">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>