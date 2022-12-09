<?php class fameup_pagination { function fameup_page($curpage, $post_type_data) { ?>
	<nav aria-label="Page navigation">
	<ul class="pagination">
		<?php if($curpage != 1  ) {
			echo '<li class="page-item disabled"><a class="page-link" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><i class="fa fa-angle-left"></i></a></li>'; } 

		for($i=1;$i<=$post_type_data->max_num_pages;$i++) {
				echo '<li class="page-item '.($i == $curpage ? 'active ' : '').'"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>'; }				
		if($i-1!= $curpage)	 {
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(($curpage+1 <= $post_type_data->max_num_pages ? $curpage+1 : $post_type_data->max_num_pages)).'"><i class="fa fa-angle-right"></i></a></li>';
		} ?>
	</ul>
</nav>
<?php } } ?>