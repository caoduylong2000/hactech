<?php if($current_page > 3) {
	$first_page = 1; ?>
	<a class="page-item" ?href="?page=<?=$first_page?>"> << </a>
<?php } ?>

<?php for($num = 1; $num <= $totalPages; $num++){ ?>
	<?php if($num != $current_page){ ?>
		<?php if ($num > $current_page - 2 && $num < $current_page + 2) { ?>
			<a class="page-item" href="?page=<?=$num?>"><?=$num?></a>
		<?php } ?>
		
	<?php } else { ?>
		<strong class="currentPage page-item"><?=$num?></strong>
	<?php } ?>
<?php } ?>

<?php if($current_page = $totalPages - 3) {
	$last_page = $totalPages;?>
	<a class="page-item" ?href="?page=<?=$last_page?>"> >> </a>
<?php } ?>