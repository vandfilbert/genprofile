<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
	<?php foreach($fungsiogen as $Fungsio);?>

	<div class="container-fluid col-8">
		<?php echo form_open_multipart('member/editFungsio');?>
			<input type="hidden" name="fungsio_id_edit" id="fungsio_id_edit" value="<?=$Fungsio['id_fungsio']?>">
			<div class="form-group">
				<label for="name" class="col-sm-2 col-form-label">Full Name</label>
				<input type="text" class="form-control" id="fungsio_name_edit" name="fungsio_name_edit" value="<?=$Fungsio['name']?>" required>
			</div>
			<div class="form-group">
				<label for="nrp" class="col-sm-2 col-form-label">NRP Fungsio</label>
				<input type="text" class="form-control" id="fungsio_nrp_edit" name="fungsio_nrp_edit" value="<?=$Fungsio['nrp']?>" required>
			</div>
			<div class="form-group">
				<label for="fungsio_gender_editgender_edit" class="col-sm-2 col-form-label">Gender Fungsio</label>
				<select name="fungsio_gender_edit" id="fungsio_gender_edit" class='form-control_edit'>
					<?php if($Fungsio['gender']=='Male') :?>
						<option selected value='<?=$Fungsio['gender']?>'><?=$Fungsio['gender']?></option>
						<option value='Female'>Female</option>
					<?php elseif($Fungsio['gender']=='Female') :?>
						<option value='Male'>Male</option>
						<option selected value='<?=$Fungsio['gender']?>'><?=$Fungsio['gender']?></option>
					<?php else: ?>
						<option value=""></option>
						<option value='Male'>Male</option>
						<option value='Female'>Female</option>
					<?php endif;?>
				</select>
			</div>
			<div class="form-group">
				<label for="address" class="col-sm-2 col-form-label">Address Fungsio</label>
				<input type="text" class="form-control" id="fungsio_address_edit" name="fungsio_address_edit" value="<?=$Fungsio['address']?>" required>
			</div>
			<div class="form-group">
				<label for="birthplace" class="col-sm-2 col-form-label">Birthplace Fungsio</label>
				<input type="text" class="form-control" id="fungsio_birthplace_edit" name="fungsio_birthplace_edit" value="<?=$Fungsio['birthplace']?>" required>
			</div>
			<div class="form-group">
				<label for="birthdate" class="col-sm-6 col-form-label">Birthdate Fungsio</label><br>
				<input type="text" class="mb-2" nama="birthdate_edit" name="birthdate_edit" value="<?=$Fungsio['date_of_birth']?>" readonly>
				<input type="Date" class="form-control" id="fungsio_birthdate_edit" name="fungsio_birthdate_edit">
			</div>
			<div class="form-group">
				<label for="picture" class="col-sm-2 col-form-label">Picture Fungsio</label>
				<div class="row">
					<div class="col-sm-3">
						<img src="<?=site_url('public/img/gentafungsio/').$Fungsio['fungsio_picture']?>" class="img-thumbnail">
					</div>
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="editimagefungsio2" name="editimagefungsio2">
							<label class="custom-file-label" for="editimagefungsio2">Choose file</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="period" class="col-sm-2 col-form-label">Periode Fungsio</label>
				<input type="text" class="form-control" id="fungsio_periodjoin_edit" name="fungsio_periodjoin_edit" value="<?=$Fungsio['period_join']?>" required>
			</div>
			<div class="form-group">
				<label for="position" class="col-sm-2 col-form-label">Position Fungsio</label>
				<select name="position_id_edit" id="position_id_edit" class='form-control'>
					<?php foreach($position as $Position): ?>
						<?php if($Fungsio['id_position']==$Position['id']):?>
							<option selected value="<?= $Position['id']?>"><?= $Position['position'] ?></option>
						<?php else :?>
							<option value="<?= $Position['id']?>"><?= $Position['position'] ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 col-form-label">Department Fungsio</label>
				<select name="department_id_edit" id="department_id_edit" class='form-control'>
					<?php foreach($department as $Department): ?>
						<?php if($Fungsio['id_department']==$Department['id']):?>
							<option selected value="<?= $Department['id']?>"><?= $Department['department'] ?></option>
						<?php else :?>
							<option value="<?= $Department['id']?>"><?= $Department['department'] ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row">
				<div class="form-group col-4">
					<button type="submit" class="btn btn-primary">Submit</button><br>
				</div>
				<div class="form-group col-4">
					<button type="button" class="btn btn-secondary" id='cancelbtn'>Close</button>
				</div>
			</div>
		</form>  	
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->