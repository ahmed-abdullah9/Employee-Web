<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Create a News with this form</p>
        <form action="<?php echo URLROOT; ?>/News/add" method="post">
          <div class="form-group">
              <label>Title:<sup>*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Add a title...">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Description:<sup>*</sup></label>
              <textarea name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['description']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
          </div>
          
          <div class="form-group">
              <label>Summary:<sup>*</sup></label>
              <textarea name="summary" class="form-control form-control-lg <?php echo (!empty($data['summary_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['summary']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['summary_err']; ?></span>
          </div>

          <input type="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>