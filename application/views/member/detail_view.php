<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

	<?php foreach($fungsiogen as $Fungsio)?>

	<div class="container detailcon">
		<div class="row">
			<div class="col-sm-6">
				<img src="<?=site_url('public/img/gentafungsio/').$Fungsio['fungsio_picture']?>" class="img-thumnail" height="500px" width="500px"/>
			</div>
			<div class="col-md-6 details">
				<blockquote>
					<h3><?= $Fungsio['name']; ?></h3>
				</blockquote>
				<p>
					<h5><cite title="Source Title">Address<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['address']?>
				</p>
				<p>
					<h5><cite title="Source Title">Email John<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['nrp']?>@john.petra.ac.id
				</p>
				<p>
					<h5><cite title="Source Title">Gender<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['gender']?>
				</p>
				<p>	
					<h5><cite title="Source Title">Date of Birth<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['birthplace']?>, <?=$Fungsio['date_of_birth']?>
				</p>
				<p>	
					<h5><cite title="Source Title">Department<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['department']?>
				</p>
				<p>	
					<h5><cite title="Source Title">Position<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['position']?>
				</p>
				<p>	
					<h5><cite title="Source Title">Period<i class="icon-map-marker"></i></cite></h5>
					<?=$Fungsio['period_join']?>
				</p>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->