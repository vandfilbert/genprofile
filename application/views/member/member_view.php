<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

  <div class="row">
    <div class="container">
      <?= $this->session->flashdata('message');?>
    </div>
  </div>

  <div class="card">
    <img src="<?=site_url('public/img/images/').$user['picture']?>" alt="GENTA" style="width:100%">
    <h1><?=$user['name']?></h1>
    <?php if($user['role_id']==1):?>
      <p class="title">Administrator</p>
      <?php else: ?>
        <p class="title">Member</p>
      <?php endif; ?>
      <p class="title"><?=$user['email']?></p>
      <p>Petra Christian University</p>
      <div style="margin: 24px 0;">
        <a href="#"><i class="fa fa-dribbble"></i></a> 
        <a href="#"><i class="fa fa-twitter"></i></a>  
        <a href="#"><i class="fa fa-linkedin"></i></a>  
        <a href="#"><i class="fa fa-facebook"></i></a> 
      </div>
    </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->