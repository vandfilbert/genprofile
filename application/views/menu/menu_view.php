<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Admin Menu Management</h1>

	<!--View Menu-->
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<?= form_error('editmenu2','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<?= $this->session->flashdata('message'); ?>
				<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newModalCenter">Add New Menu</a>
				<div class="table-responsive-md table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-bordered table-striped mb-0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Menu</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($menu as $Menu):?>
								<tr>
									<th scope="row"><?= $i; ?></th>
									<td><?= $Menu['menu']; ?></td>
									<td>
										<a href="#" class="badge badge-pill badge-warning edtMenu" data-id="<?=$Menu['id']?>" data-menu="<?=$Menu['menu']?>" data-toggle="modal" data-target="#newModalCenter2">Edit</a>
										<a href="<?=site_url('addMenu/deleteMenu/').$Menu['id']?>" class="badge badge-pill badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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

<!-- Modal Menu Bootstrap -->
<div class="modal fade" id="newModalCenter" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newModalLongTitle">Add New Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=site_url('addMenu')?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Input new menu">
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

<!-- Modal Edit Menu Bootstrap -->
<div class="modal fade" id="newModalCenter2" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newModalLongTitle2">Edit Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=site_url('addMenu/editMenu')?>" method="POST">
				<div class="modal-body">
					<input type="hidden" class="form-control" id="menu2id" name="menu2id">
					<div class="form-group">
						<input type="text" class="form-control" id="editmenu2" name="editmenu2">
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