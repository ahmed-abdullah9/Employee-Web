<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Create An Account</h2>
      <p>Please fill this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/register" method="POST">
        <div class="form-group">
            <label>First Name:<sup>*</label>
            <input type="text" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['FirstName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['FirstName']; ?>">
            <span class="invalid-feedback"><?php echo $data['FirstName_err']; ?></span>
        </div> 

        <div class="form-group">
            <label>Last Name:<sup>*</label>
            <input type="text" name="last_name" class="form-control form-control-lg <?php echo (!empty($data['LastName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['LastName']; ?>">
            <span class="invalid-feedback"><?php echo $data['LastName_err']; ?></span>
        </div> 
        
        <div class="form-group">
            <label>Email Address:<sup>*</sup></label>
            <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['Email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Email']; ?>">
            <span class="invalid-feedback"><?php echo $data['Email_err']; ?></span>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Department :<sup>*</sup></label>
          <select class="form-control" name="department_id">
            <option  disabled selected>Choose Department:</option>
            <?php foreach($data['Department_id'] as $department) : ?>
              <option value ="<?php echo $department->id?>" <?php echo (!empty($data['Department_id_err'])) ? 'is-invalid' : ''; ?>> <?php echo $department->Name?></option>
            <?php endforeach; ?>
          </select>
          <span class="invalid-feedback"><?php echo $data['Department_id_err']; ?></span>
        </div>

        <div class="form-group">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['Password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Password']; ?>">
            <span class="invalid-feedback"><?php echo $data['Password_err']; ?></span>
        </div>
        
        <div class="form-group">
            <label>Confirm Password:<sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="form-group">
            <label>Phone Number :<sup>*</sup></label>
            <input type="tel" name="phone_number" class="form-control form-control-lg <?php echo (!empty($data['PhoneNumber_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['PhoneNumber']; ?>">
            <span class="invalid-feedback"><?php echo $data['PhoneNumber_err']; ?></span>
        </div>        

        <div class="form-row">
          <div class="col">
            <input type="submit" class="btn btn-success btn-block" value="Register">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>