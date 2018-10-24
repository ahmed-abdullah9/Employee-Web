<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
    <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
    </div>
  </div>
    <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Title</th>
            <th>Created by</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['posts'] as $post) : ?>
        <tr>
            <td>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">
              <div class="data_table">
              <?php echo $post->title; ?>
              </div>
            </a>
            </td>
            <td><?php echo $post->name; ?></td>
            <td><?php echo $post->created_at; ?></td>
        </tr>

      <?php endforeach; ?>

    </tbody>
</table>
<script>

$(document).ready( function () {
    $('#table_id').DataTable({
    });
});
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>