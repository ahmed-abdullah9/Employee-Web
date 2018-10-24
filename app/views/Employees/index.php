<?php require APPROOT . '/views/inc/header.php'; ?>
  <!-- <?php flash('post_message'); ?> -->
  <div class="row mb-3">
    <div class="col-md-6">
    <h1>Employees</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Employee</a>
    </div>
  </div>
    <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['employees'] as $employee) : ?>
        <tr>
            <td>
            <a href="<?php echo URLROOT; ?>/Employees/show/<?php echo $employee->employeesId; ?>">
              <div class="data_table">
              <?php echo $employee->FirstName . " " . $employee->LastName ; ?>
              </div>
            </a>
            </td>
            <td><?php echo $employee->Name; ?></td>
            <td><?php echo $employee->Email; ?></td>
            <td><?php echo $employee->PhoneNumber; ?></td>
        </tr>

      <?php endforeach; ?>

    </tbody>
</table>
<script>

$(document).ready( function () {
    $('#table_id').DataTable({
        "bLengthChange": false
    });
});
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>