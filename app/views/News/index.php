<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row mb-3">
    <div class="col-md-6">
    <h1>News</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/News/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add News</a>
    </div>
  </div>

<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="https://designshack.net/wp-content/uploads/brochure-templates-368x247.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"> <?php  echo array_values($data['News'])[0]->Title ?></h5>
      <p class="card-text"><?php  echo array_values($data['News'])[0]->Description ?></p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="https://designshack.net/wp-content/uploads/brochure-templates-368x247.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="https://designshack.net/wp-content/uploads/brochure-templates-368x247.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="https://designshack.net/wp-content/uploads/brochure-templates-368x247.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>