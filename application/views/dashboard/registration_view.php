<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

	<div class='row'>
		<div class="container">
			<?= $this->session->flashdata('message');?>
			<form action="<?=site_url('admin/registration')?>" method="POST">
				<div class="form-group">
					<label for="name">Full Name</label>
					<input type="text" class="form-control" id="name" name="name">
					<?=form_error('name','<small class="text-danger pl3">','</small>');?>
				</div>
				<div class="form-group">
					<label for="email_address">Email address</label>
					<input type="text" class="form-control" id="email_address" name="email_address">
					<?=form_error('email_address','<small class="text-danger pl3">','</small>');?>
				</div>
				<div class="form-group">
					<label for="password1">Password</label>
					<input type="password" class="form-control" id="password1" name="password1">
					<?=form_error('password1','<small class="text-danger pl3">','</small>');?>
				</div>
				<div class="form-group">
					<label for="password2">Confirm Password</label>
					<input type="password" class="form-control" id="password2" name="password2">
					<?=form_error('password2','<small class="text-danger pl3">','</small>');?>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>	

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->