<?php foreach ($chungTuList as $obj){

?>

		<div class="row">
			<div class="col-md-3">
				Doc name: <?=$obj->id?> 
			</div>
			<div  class="col-md-3">
				The day received: <?=$obj->theDayReceived?> 
			</div>

			<div class="col-md-3">
				The customers name:
				<?=$obj->theCustomersName?> 
			</div>

			<div class="col-md-3">
				Files No: 
				<?=$obj->filesNo?> 
			</div>
		</div>

		<a href="index.php?controller=Admin&action=hienthi_chitietchungtu&id=<?=$obj->id?>">Chi Tiết</a>
		<div class="h-divider"></div>
<?php } ?>




							