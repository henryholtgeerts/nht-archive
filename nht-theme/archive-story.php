<?php get_header(); ?>
<div class="nht-main">
	<div class="nht-billboard nht-billboard--live-search">
		<div class="nht-container">
			<form class="nht-live-search__searchbox">
				<input type="text" class="nht-live-search__input" id="nhtLiveSearchInput" autocomplete="off" placeholder="Search stories"></input>
				<button type="submit" class="nht-live-search__submit"><i class="fas fa-search"></i></button>
			</form>
			<button id="expandFilters" class="nht-live-search__filter-button nht-live-search__filter-button--expand">Filters  <i class="fas fa-chevron-down"></i></button>
			<a href="/?s=" class="nht-live-search__filter-button nht-live-search__filter-button--explore">Full Archive</a>
			<div class="nht-live-search__filters" filters-expanded="false">
				<div class="nht-live-search__filter-section">
					<p class="nht-live-search__filter-title">From</p>
					<input type="date" id="startDate" name="trip"
               			value="2010-01-01"
						/>
					<p class="nht-live-search__filter-title">To</p>
					<input type="date" id="endDate" name="trip"
               			value="2018-12-31"
               			/>
				</div>
				<div class="nht-live-search__filter-section">
					<p class="nht-live-search__filter-title">Categories</p>
					<?php
						//for each category, show 5 posts
						$cat_args=array(
						'orderby' => 'name',
						'order' => 'ASC'
						);
						$categories=get_categories($cat_args);
						foreach($categories as $category) { 
							echo '<button class="nht-live-search__filter-button" cat-filter-active="false" filter-slug="'. $category->cat_ID . '">' . $category->name .'</button> ';
						} // foreach($categories
					?>
				</div>
				<div class="nht-live-search__filter-section">
					<p class="nht-live-search__filter-title">People</p>
					<?php
						//for each category, show 5 posts
						$tag_args=array(
						'taxonomy' => 'post_tag',
						'orderby' => 'name',
						'order' => 'ASC'
						);
						$tags=get_terms($tag_args);
						foreach($tags as $tag) { 
							echo '<button class="nht-live-search__filter-button" tag-filter-active="false" filter-slug="'. $tag->term_id . '">' . $tag->name .'</button> ';
						} // foreach($categories
					?>
				</div>
				<div class="nht-live-search__filter-section">
					<p class="nht-live-search__filter-title">Arrange by</p>
					<input type="radio" name="arrange" value="recent" checked="checked"> Date (Recent)<br>
					<input type="radio" name="arrange" value="past"> Date (Past)<br>
 					<input type="radio" name="arrange" value="name"> Name<br>
				</div>
			</div>
		</div>
	</div>
	<div class="nht-container">
		<div class="nht-live-search nht-live-search--archive">
			<div class="nht-live-search__results">
				<div class="nht-live-search__section" search-section="stories" style="display: none">
					<div class="nht-row nht-row--three-by nht-row--live-search" search-results="stories">
					</div>
				</div>
			</div>
		</div>
		<div class="nht-live-search__no-results">
			<h4>Sorry, there were no results found.</h4>
		</div>
	</div>
</div>

<?php get_footer(); ?>
