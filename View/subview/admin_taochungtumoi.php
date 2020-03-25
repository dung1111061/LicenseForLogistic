<div class="row">
	<div class="header">
		SOUTHERN SEASKY LOGISTICS CO.,LTD
	LOGISTICS REPORT
</div>
</div>
<form id="chungtuForm" action="index.php?controller=Admin&action=process_luuchungtumoi" method="post">


		
		<div class="row">

			<div  class="col-md-2">
				The day received: <input type="date" class="form-control" name="ngayhangden_di"> 
			</div>

			<div class="col-md-2">
				The customers name:
				<input type="text" class="form-control" name="tenkhachhang">
			</div>
			<div class="col-md-2">
				The commodity:
				<input type="text" class="form-control" name="sanpham">
			</div>
			<div class="col-md-2">
				The declarations No:
				<input type="text" class="form-control" name="sotokhai">
			</div>
			<div class="col-md-2">
				Files No: 
				<input type="text" class="form-control" name="sofiles">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				Port of destination: <input type="text" class="form-control" name="destination"> 
			</div>
			<div  class="col-md-2">
				Port of loading: <input type="text" class="form-control" name="loading"> 
			</div>

			<div class="col-md-2">
				Volume:	<input type="text" class="form-control" name="volume">
			</div>
			<div class="col-md-2">
				Sales name:
				<select  name="saler" class="form-control">
<?php 
foreach ($salerList as $saler) {
?>

				  <option value="<?=$saler["idUser"]?>"><?=$saler["ten"]?></option>
<?php
}
?>
				</select>

			</div>
			<div class="col-md-2">
				Logistics name:
				<select  name="logisticer" class="form-control">
<?php 
foreach ($logisticerList as $logisticer) {
?>

				  <option value="<?=$logisticer["idUser"]?>"><?=$logisticer["ten"]?></option>
<?php
}
?>
				</select>
			</div>
			<div class="col-md-2">
				Transporter name: 
				<select  name="transporter" class="form-control">
				
<?php 
foreach ($transporterList as $transporter) {
?>

				  <option value="<?=$transporter["idUser"]?>"><?=$transporter["ten"]?></option>
<?php
}
?>
				</select>
			</div>
		</div>

		<div class="row" style="margin-top: 10px">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<td colspan="3">Danh sach loai phi</td>
						
					</tr>
					<?php
					
					foreach($data as $k=>$r)
					{?>

					<tr>
						<td><?php echo $k+1 ?></td>
						<td><input type="checkbox" class="form-control" name="maloaiphi[]" value="<?php echo $r['maLoaiPhi'] ?>"></td>
						<td>
							<?php echo $r['tenLoaiPhi'] ?>
						</td>
					</tr>
					
					<?php
					}
					?>
					<tr><td colspan="3">
						<input type="submit" value="Luu" class="form-control">
					</td></tr>
				</table>
			</div>
		</div>
</form>