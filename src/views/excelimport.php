<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

?>
<h1>Import your Excel file</h1>
<p>To have the right file, please download the Excel export <a href="excelExport?name=<?php echo $this->msgInstanceName?>">Excel Export</a></p>

<?php 
if($this->submit) {
	echo '<div class="good">';
	echo '<span class="label label-success">successfully saved</span>';
	echo '</div>';
	?>
	<script type="text/javascript">
	setTimeout(function() {
		jQuery('.good').fadeOut(1000);
	}, 4000);

	</script>
	<?php 	
}
?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#file').change(function() {
		   $('#file-input').val($(this).val());
		});
	});
</script>


<input id="lefile" type="file" style="display:none">

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="msginstancename" value="<?php echo plainstring_to_htmlprotected($this->msgInstanceName) ?>" />
	<input type="hidden" name="selfedit" value="<?php echo plainstring_to_htmlprotected($this->selfedit) ?>" />
	<input type="file" name="file" id="file" value="" style="display: none"/>
	<div class="input-append">
	   <input id="file-input" class="input-large" type="text">
	   <a class="btn" onclick="$('#file').click();">Browse</a>
	</div>
	<br />
	<input type="submit" name="import" value="Import" class="btn"/>
</form>
