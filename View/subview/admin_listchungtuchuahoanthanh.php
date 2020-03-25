<?php for ($i = 0; $i < count($chungTuList); $i++){
			$obj = $chungTuList[$i];

?>

		<div class="row">
			<div class="col-md-3">
				Files No: 
				<?=$obj->filesNo?> 
			</div>

			<div  class="col-md-3">
				The day received: <?=$obj->theDayReceived?> 
			</div>

			<div class="col-md-3">
				The customers name:
				<?=$obj->theCustomersName?> 
			</div>
		
			<div class="col-md-3">
				<a href="index.php?controller=Admin&action=hienthi_chitietchungtu&id=<?=$obj->id?>">Chi Tiết</a> &nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?controller=Admin&action=process_banGiaoChungTu&id=<?=$obj->id?>&idThucHien=<?=$thucHienList[$i]?>">Giao</a>
			</div>
		</div>


		<div class="h-divider"></div>
<?php } ?>




							