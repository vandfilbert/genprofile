<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Admin Role Management</h1>

	<!--View Menu-->
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?= $this->session->flashdata('message'); ?>

				<h3>Role : <?= $role['role']?></h3>
				<div class="table-responsive-md table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-bordered table-striped mb-0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Menu</th>
								<th scope="col">Access</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($menu as $Menu):?>
								<tr>
									<th scope="row"><?= $i; ?></th>
									<td><?= $Menu['menu']; ?></td>
									<td>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" <?= checkAccess($role['id'], $Menu['id'])?> data-role="<?=$role['id']?>" data-menu="<?=$Menu['id']?>">
										</div>
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