<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

	<div class="container">
		<?php if(validation_errors()): ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors()?>
			</div>
		<?php endif; ?>

		<?= $this->session->flashdata('message'); ?>
		<?= $this->session->flashdata('message1'); ?>
		<?= $this->session->flashdata('message2'); ?>
		<div class="row mb-5">
			<div class="col-sm-12">
				<ul class="navbar-nav ml-auto float-right mr-10">
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 float-right">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-1 small" id="searchfungsio" name='searchfungsio' placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search">
								<div class="input-group">
									<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>
				</ul>
				<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newSubModalCenterFungsio">Add New Fungsio</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm">
				<div class="table-responsive-md table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-bordered table-striped mb-0" id="fungsiotable" name="fungsiotable">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Name</th>
								<th scope="col">NRP</th>
								<th scope="col">Gender</th>
								<th scope="col">Address</th>
								<th scope="col">Birth Place</th>
								<th scope="col">Date of Birth</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($fungsiogen as $Fungsio):?>
								<tr>
									<th scope="row"><?= $i; ?></th>
									<td><?=$Fungsio['name']?></td>
									<td><?=$Fungsio['nrp']?></td>
									<td><?=$Fungsio['gender']?></td>
									<td><?=$Fungsio['address']?></td>
									<td><?=$Fungsio['birthplace']?></td>
									<td><?=$Fungsio['date_of_birth']?></td>
									<td>
										<a href="<?=site_url('member/detail/').$Fungsio['id_fungsio']?>" class="badge badge-pill badge-primary detail">Detail</a>
										<a href="<?=site_url('member/editFungsioView/').$Fungsio['id_fungsio']?>" class="badge badge-pill badge-warning editFungsio">Edit</a>
										<a href="<?=site_url('member/deleteFungsio/').$Fungsio['id_fungsio']?>" class="badge badge-pill badge-danger dltfungsio" onclick="return confirm('Are you sure?');">Delete</a>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Bootstrap For addNew -->
<div class="modal fade" id="newSubModalCenterFungsio" tabindex="-1" role="dialog" aria-labelledby="newSubModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubModalLongTitleFungsio">Add Fungsio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open_multipart('member/fungsio');?>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="fungsio_name" name="fungsio_name" placeholder="Input Name Fungsio">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="fungsio_nrp" name="fungsio_nrp" placeholder="Input NRP">
				</div>
				<div class="form-group">
					<select name="fungsio_gender" id="fungsio_gender" class='form-control'>
						<option value="">Input Gander</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="fungsio_address" name="fungsio_address" placeholder="Input Address">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="fungsio_birthplace" name="fungsio_birthplace" placeholder="Input Birthplace">
				</div>
				<div class="form-group">
					<input type="Date" class="form-control" id="fungsio_birthdate" name="fungsio_birthdate" placeholder="Input Birth Date">
				</div>
				<div class="form-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="fungsio_image" name="fungsio_image">
						<label class="custom-file-label" for="fungsio_image">Choose file</label>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="fungsio_periodjoin" name="fungsio_periodjoin" placeholder="Input Period Join ex.2017/2018">
				</div>
				<div class="form-group">
					<select name="position_id" id="position_id" class='form-control'>
						<option value="">Input Position</option>
						<?php foreach($position as $Position): ?>
							<option value="<?= $Position['id']?>"><?= $Position['position'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<select name="department_id" id="department_id" class='form-control'>
						<option value="">Input Department</option>
						<?php foreach($department as $Department): ?>
							<option value="<?= $Department['id']?>"><?= $Department['department'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</form>
	</div>
</div>
</div>