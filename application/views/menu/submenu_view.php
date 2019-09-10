<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Admin Submenu Management</h1>

	<!--View Menu-->
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<?php if(validation_errors()): ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors()?>
					</div>
				<?php endif; ?>

				<?= $this->session->flashdata('message'); ?>
				<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newSubModalCenter">Add New Submenu</a>
				<div class="table-responsive-md table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-bordered table-striped mb-0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Menu</th>
								<th scope="col">Title</th>
								<th scope="col">URL</th>
								<th scope="col">Icon</th>
								<th scope="col">Is Active</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($submenu as $SubMenu):?>
								<tr>
									<th scope="row"><?= $i; ?></th>
									<td><?= $SubMenu['menu']; ?></td>
									<td><?= $SubMenu['title']; ?></td>
									<td><?= $SubMenu['url']; ?></td>
									<td><?= $SubMenu['icon']; ?></td>
									<td><?= $SubMenu['is_active']; ?></td>
									<td>
										<a href="#" class="badge badge-pill badge-warning editsubmenu" data-toggle="modal" data-target="#newSubModalCenter2" data-id="<?=$SubMenu['id']?>" data-menu="<?=$SubMenu['menu']?>" data-title="<?=$SubMenu['title']?>" data-url="<?=$SubMenu['url']?>" data-icon="<?=$SubMenu['icon']?>" data-isactive="<?=$SubMenu['is_active']?>" data-menuid="<?=$SubMenu['menu_id']?>">Edit</a>
										<a href="<?=site_url('addMenu/deleteSubMenu/').$SubMenu['id']?>" class="badge badge-pill badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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
<div class="modal fade" id="newSubModalCenter" tabindex="-1" role="dialog" aria-labelledby="newSubModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubModalLongTitle">Add Sub New Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=site_url('addMenu/subMenu')?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Input new submenu">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class='form-control'>
							<option value="">Select Menu</option>
							<?php foreach($menu as $Menu): ?>
								<option value="<?= $Menu['id']?>"><?= $Menu['menu'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Input new URL">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="ICON font awsome">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" checked>
							<label class="form-check-label" for="is_active">
								Active?
							</label>
						</div>
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

<!-- Modal Bootstrap For editNew -->
<div class="modal fade" id="newSubModalCenter2" tabindex="-1" role="dialog" aria-labelledby="newSubModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubModalLongTitle2">Edit Sub Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=site_url('addMenu/editSubMenu')?>" method="POST">
				<input type="hidden" id="idsubmenu" name="idsubmenu">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="edit_title" name="edit_title">
					</div>
					<div class="form-group">
						<select name="edit_menu_id" id="edit_menu_id" class='form-control'>
							<option value="">Select Menu</option>
							<?php foreach($menu as $Menu): ?>
								<option value="<?= $Menu['id']?>"><?= $Menu['menu'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="edit_url" name="edit_url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="edit_icon" name="edit_icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="edit_is_active" id="edit_is_active" value="1" checked>
							<label class="form-check-label" for="edit_is_active">
								Active?
							</label>
						</div>
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