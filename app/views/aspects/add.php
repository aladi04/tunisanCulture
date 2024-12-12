<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Add New Aspect</h2>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ;?>/aspects" class="btn btn-light pull-right"><i
                                class="fa fa-backward"></i> Back</a>
                    </div>
                </div>
                <p class="card-text">Please fill in the details for the new aspect.</p>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo URLROOT ;?>/aspects/add">
                    <div class="form-group">
                        <label for="nom_aspect">Aspect Name<sub>*</sub></label>
                        <input type="text" name="nom_aspect"
                            class="form-control form-control-lg <?php echo (!empty($data['nom_aspect_err'])) ? 'is-invalid' : '' ;?>"
                            value="<?php echo $data['nom_aspect'] ;?>">
                        <span class="invalid-feedback"><?php echo $data['nom_aspect_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <label for="categorie">Category<sub>*</sub></label>
                        <input type="text" name="categorie"
                            class="form-control form-control-lg <?php echo (!empty($data['categorie_err'])) ? 'is-invalid' : '' ;?>"
                            value="<?php echo $data['categorie'] ;?>">
                        <span class="invalid-feedback"><?php echo $data['categorie_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <label for="description_aspect">Description<sub>*</sub></label>
                        <textarea name="description_aspect"
                            class="form-control form-control-lg <?php echo (!empty($data['description_aspect_err'])) ? 'is-invalid' : '' ;?>"><?php echo $data['description_aspect'] ;?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_aspect_err'] ;?> </span>
                    </div>


                    <div class="form-group">
                        <label for="image_aspect">Image<sub>*</sub></label>
                        <input type="file" name="image_aspect"
                            class="form-control form-control-lg <?php echo (!empty($data['image_aspect_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['image_aspect_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary btn-block pull-left" value="Add Aspect">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>