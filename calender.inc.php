<?php
	$app_matrix = $a->getApplicationMatrix($_SESSION['user_id']);
	$oneday = '86400';
	$last_time = time() - (209*$oneday);
	$dd = date('d', $last_time);
	$mm = date('m', $last_time);
	$yy = date('Y', $last_time);
?>
<table class="checkbox_column" cellspacing="5">
	<?php for ($week=1; $week <= 7; $week++) { ?>
	<tr>
		<?php for ($day=0; $day < 30; $day++) { ?>
			<td data-toggle="tooltip" title="<?php echo date('d m Y', $last_time) ?>" <?php 
				foreach ($app_matrix as $key => $value) {
					if(date('dmY', $value['application_date']) == date('dmY', $last_time)){
						echo 'class="active"';
					}
				}
			?>></td>
		<?php
			$last_time = $last_time + $oneday;
		}
		?>
	</tr>
	<?php } ?>
</table>