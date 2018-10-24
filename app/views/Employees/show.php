<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
  <br>
  <h1><?php echo $data['Employees']->FirstName . " " . $data['Employees']->LastName; ?></h1>
  <div class="bg-secondary text-white p-2 mb-3">
    Department <?php echo $data['Employees']->Name; ?>
  </div>
  <p><?php echo $data['Employees']->Manager; ?></p>
  <p><?php echo $data['Employees']->Email; ?></p>
  <p><?php echo $data['Employees']->PhoneNumber; ?></p>




<?php require APPROOT . '/views/inc/footer.php'; ?>