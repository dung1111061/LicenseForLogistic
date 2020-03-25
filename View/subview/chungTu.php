<div class="row">
			<div  class="col-md-2">
				<!-- Doc Name: <input type="text" class="hidden" name="creater" value="<?=$chungTu->docName?>">  -->
			</div>
			<div  class="col-md-2">
				The day received: <input type="date" class="form-control" name="ngayhangden_di" value="<?=$chungTu->theDayReceived?>"> 
			</div>

			<div class="col-md-2">
				The customers name:
				<input type="text" class="form-control" name="tenkhachhang" value="<?=$chungTu->theCustomersName?>">
			</div>
			<div class="col-md-2">
				The commodity:
				<input type="text" class="form-control" name="sanpham" value="<?=$chungTu->theCommodity?>">
			</div>
			<div class="col-md-2">
				The declarations No:
				<input type="text" class="form-control" name="sotokhai" value="<?=$chungTu->theDeclarationsNo?>">
			</div>
			<div class="col-md-2">
				Files No: 
				<input type="text" class="form-control" name="sofiles" value="<?=$chungTu->filesNo?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				Port of destination: <input type="text" class="form-control" name="destination" value="<?=$chungTu->portOfDestination?>"> 
			</div>
			<div  class="col-md-2">
				Port of loading: <input type="text" class="form-control" name="loading" value="<?=$chungTu->portOfLoading?>"> 
			</div>

			<div class="col-md-2">
				Volume:	<input type="text" class="form-control" name="volume" value="<?=$chungTu->volume?>">
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
						<td colspan="4">Danh sach loai phi</td>
						
					</tr>
					<?php
					
					foreach($data as $k=>$r)
					{
						$checked = in_array($r['maLoaiPhi'], array_column($phi, "maLoaiPhi") )? "checked": null;

						$value = $checked ? array_column($phi, "gia")[0]: null;
						?>

					<tr>
						<td><?php echo $k+1 ?></td>
						<td>
							<input type="checkbox" class="form-control" name="maloaiphi[]" <?=$checked?>  value="<?php echo $r['maLoaiPhi'] ?>">
						</td>
						<td>
							<?php echo $r['tenLoaiPhi'] ?>
						</td>
						<td>
							<input type="number" class="form-control" name="value[]"  value="<?=$value?>">
						</td>
	
					</tr>
					
					<?php
					}
					?>
				<tr>
					<td colspan="4">
						<input type="submit" value="Luu" class="form-control">
					</td>

				</tr>
				</table>
			</div>
		</div>