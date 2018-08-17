<?php

function sp_search_view(){ ?>
<div class="search_info">
	<div class="inner">
		<div class="input-group">
		  <input type="text" class="form-control" placeholder="Search for...">
		  <span class="input-group-btn">
			<button class="btn btn-default location_btn" type="button"><i class="fa fa-location-arrow"></i> Locate Me</button>
		  </span>
		  <span class="input-group-btn">
			<button class="btn btn-default" type="button">FIND FOOD</button>
		  </span>
		</div>
	</div>
</div>
<?php
}
add_shortcode('search_view_enable', 'sp_search_view');
?>