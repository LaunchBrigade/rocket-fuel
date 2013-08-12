<?php
global $wp_query;

if ($wp_query->max_num_pages > 1) : ?>
<!-- Pagination -->
<div class="pagination">
	<?php
		$current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(  
			'base' => get_pagenum_link(1) . '%_%',  
			'format' => '/page/%#%',  
			'current' => $current_page,  
			'total' => $wp_query->max_num_pages,  
		)); 
	?>
</div>
<?php endif; ?>