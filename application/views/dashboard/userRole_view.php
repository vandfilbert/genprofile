<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Admin Role Management</h1>

	<!--View Menu-->
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?= form_error('newrole','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<?= form_error('edit_role','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<?= $this->session->flashdata('message'); ?>
				<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newModalCenter">Add New Role</a>
				<div class="table-responsive-md table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-bordered table-striped mb-0">
						<thead>
							<tr>
								<th scope="col">NO</th>
								<th scope="col">Role</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($role as $Role):?>
								<tr>
									<th scope="row"><?= $i; ?></th>
									<td><?= $Role['role']; ?></td>
									<td>
										<a href="<?=site_url('admin/userRoleAccess/') . $Role['id']?>" class="badge badge-pill badge-success">Access</a>
										<a href="#" class="badge badge-pill badge-warning editbtn" data-toggle="modal" data-target="#newModalCenter2" data-id="<?=$Role['id']?>" data-role="<?=$Role['role']?>">Edit</a>
										<a href="<?=site_url('admin/deleteRole/').$Role['id']?>" class="badge badge-pill badge-danger deletebtn" id="deltid" onclick="return confirm('Are you sure?');">
										Delete</a>
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

<!-- Modal Bootstrap for Add Role-->
<div class="modal fade" id="newModalCenter" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newModalLongTitle">Add New Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=site_url('admin/userRole')?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="newrole" name="newrole" placeholder="Input new role">
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

<!-- Modal Bootstrap for Edit Role-->
<div class="modal fade" id="newModalCenter2" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newModalLongTitle2">Edit Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=site_url('admin/editRole')?>" method="POST">
				<input type="hidden" id="id" name="id">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="edit_role" name="edit_role">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>