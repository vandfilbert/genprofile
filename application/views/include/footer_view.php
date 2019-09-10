<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; GENTA Website <?=date('Y')?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?=site_url('home/signout')?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>public/asset/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>public/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url()?>public/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>public/asset/js/sb-admin-2.min.js"></script>

<!-- Jquery AJAX for user Access Role-->
<script type="text/javascript">
//====================================================================================================================================
//For Upload File 
$('.custom-file-input').on('change', function(){
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});
//====================================================================================================================================
//For Access Role
$('.form-check-input').on('click',function(){
	const menuId = $(this).data('menu');
	const roleId = $(this).data('role');

	$.ajax({
		url: "<?= site_url('admin/changeAccess'); ?>",
		type: "POST",
		data:{
				//left object from data & right is variable const
				menuId: menuId,
				roleId: roleId
			},
			success: function(){
				document.location.href="<?= site_url('admin/userRoleAccess/');?>"+roleId;
			}
		});
});
//====================================================================================================================================
//For Edit Role
$('.editbtn').on('click', function(){
	const id= $(this).data('id');
	const role= $(this).data('role');
		//console.log(id);
		
		$.ajax({
			url: "<?= site_url('admin/getDataEdit'); ?>",
			type: "POST",
			data:{
				//left object from data & right is variable const
				id: id,
				role : role
			},
			dataType : "JSON",
			success: function(data){
				//console.log(data);
				//console.log(role);
				$('#edit_role').val(role);
				$('#id').val(id);
			}
		});
	});
//====================================================================================================================================
//For edit Sub Menu
$('.editsubmenu').on('click', function(){
	const id= $(this).data('id');
	const menuid= $(this).data('menuid');
	//console.log(menuid);
	const title= $(this).data('title');
	const url= $(this).data('url');
	const icon= $(this).data('icon');
	const is_active= $(this).data('is_active');
	//console.log(id);

	$.ajax({
		url: "<?= site_url('addMenu/getDataEdit'); ?>",
		type: "POST",
		data:{
				//left object from data & right is variable const
				id: id,
				menuid : menuid,
				title : title,
				url : url,
				icon : icon,
				is_active : is_active
			},
			dataType : "JSON",
			success: function(data){
				//console.log(menuid);
				$('#idsubmenu').val(id);
				$('#edit_title').val(title);
				$('#edit_url').val(url);
				$('#edit_icon').val(icon);
				$('#edit_menu_id').val(menuid);
			}
		});
});
//====================================================================================================================================
//For Edit Menu
$('.edtMenu').on('click',function(){
	const id = $(this).data('id');
	const menu = $(this).data('menu');

	$.ajax({
		url: "<?= site_url('addMenu/getDataAdminMenu'); ?>",
		type: "POST",
		data:{
				//left object from data & right is variable const
				id: id,
				menu: menu
			},
			dataType : "JSON",
			success: function(data){
				$('#menu2id').val(id);
				$('#editmenu2').val(menu);
			}
		});
});
//====================================================================================================================================
//close Button
$('#cancelbtn').on('click', function(){
	window.location ="<?= site_url('member/fungsio');?>"
});
//====================================================================================================================================
//search Button
$(document).ready(function(){
	$('#searchfungsio').keyup(function(){
		search_table($(this).val());
	});

	function search_table(value){
		$(#fungsiotable).each(function(){
			var found='false';
			$(this).each(function(){
				if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0){
					found='true';
				}
			});

			if(found=='true'){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	}
});
//====================================================================================================================================
</script>
</body>
</html>