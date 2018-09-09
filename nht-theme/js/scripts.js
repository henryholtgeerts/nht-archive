(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away

		var storyReq;
		var issueReq;
		var staffReq;
		var query = {};
		query.categories = [];
		query.tags = [];
		query.fromDate;
		query.toDate;

		var storyResultsPresent = false;
		var issueResultsPresent = false;
		var staffResultsPresent = false;


		$(function() {
			console.log('loaded!!');
			if ($('.nht-live-search.nht-live-search--archive').length) {
				if (storyReq != undefined && issueReq != undefined && staffReq != undefined) {
					storyReq.abort();
					issueReq.abort();
					staffReq.abort();
				}
				query.term = '';
				loadResults(query);		
			} else if ($('.nht-live-search').length) {
				if (storyReq != undefined && issueReq != undefined && staffReq != undefined) {
					storyReq.abort();
					issueReq.abort();
					staffReq.abort();
				}
				var n = window.location.href.indexOf('?s=');
				query.term = window.location.href.slice(n+3);
				$('.nht-live-search__input').val(query.term);
				loadResults(query);		
			}
		});
		
		$(document).on('submit', '.nht-live-search__searchbox', function(event) {            
			event.preventDefault();
			if (storyReq != undefined && issueReq != undefined && staffReq != undefined) {
				storyReq.abort();
				issueReq.abort();
				staffReq.abort();
			}
			query.term = $('.nht-live-search__input').val();
			loadResults(query);		
		});

		$(document).on('keypress', '.nht-live-search__input', function(event) {
			if (storyReq != undefined && issueReq != undefined && staffReq != undefined) {
				storyReq.abort();
				issueReq.abort();
				staffReq.abort();
			} else if (storyReq != undefined) {
				storyReq.abort();
			}
			query.term = $('.nht-live-search__input').val();
			loadResults(query);
		});

		$(document).on('click', '#expandFilters', function(event) {
			if ($('.nht-live-search__filters').attr('filters-expanded') == 'true') {
				$(this).children('svg').removeClass('fa-chevron-up');
				$(this).children('svg').addClass('fa-chevron-down');
				$('.nht-live-search__filters').attr('filters-expanded', 'false');
			} else if ($('.nht-live-search__filters').attr('filters-expanded') == 'false') {
				$(this).children('svg').removeClass('fa-chevron-down');
				$(this).children('svg').addClass('fa-chevron-up');
				$('.nht-live-search__filters').attr('filters-expanded', 'true');
			}
		});

		$(document).on('click', '[cat-filter-active*=false]', function(event) {
			$(this).attr('cat-filter-active','true');
			query.categories.push($(this).attr('filter-slug'));
			loadResults(query);
		});

		$(document).on('click', '[cat-filter-active*=true]', function(event) {
			$(this).attr('cat-filter-active','false');
			query.categories.remove($(this).attr('filter-slug'));
			loadResults(query);
		});

		$(document).on('click', '[tag-filter-active*=false]', function(event) {
			$(this).attr('tag-filter-active','true');
			query.tags.push($(this).attr('filter-slug'));
			loadResults(query);
		});

		$(document).on('click', '[tag-filter-active*=true]', function(event) {
			$(this).attr('tag-filter-active','false');
			query.tags.remove($(this).attr('filter-slug'));
			loadResults(query);
		});

		$(document).on('change', '#startDate', function(event) {
			var date = new Date(document.getElementById('startDate').value);
			query.startDate = date.toISOString();
			loadResults(query);
		});

		$(document).on('change', '#endDate', function(event) {
			var date = new Date(document.getElementById('endDate').value);
			query.endDate = date.toISOString();
			loadResults(query);
		});


		$(document).on('change', 'input[name="arrange"]', function(event) {
			query.arrangeBy = $(this).val();
			loadResults(query);
		});

		$(document).on('click', '.nht-navbar__toggle-menu', function(event) {
			$('.nht-navbar__primary-menu').toggleClass('nht-navbar__primary-menu--expanded');
			$('.nht-navbar__underlay').toggleClass('nht-navbar__underlay--expanded');
		});

		$(document).on('click', 'button.nht-transcript__expand-button', function(event) {
			console.log('expand clicked!!');
			$('.nht-transcript').attr('transcript-expanded', 'true');
		});

		$(document).on('click', '.nht-navbar__underlay.nht-navbar__underlay--expanded', function(event) {
			$('.nht-navbar__primary-menu').toggleClass('nht-navbar__primary-menu--expanded');
			$('.nht-navbar__underlay').toggleClass('nht-navbar__underlay--expanded');
		});

		async function loadResults(query) {
			var queryString = '?_embed&per_page=21&search='+query.term;
			if (query.startDate != undefined) {
				queryString += '&after='+query.startDate;
			}

			if (query.endDate != undefined) {
				queryString += '&before='+query.endDate;
			}

			if (query.categories.length > 0) {
				queryString += '&categories=';
				query.categories.forEach(function(cat, index) {
					if (index == 0) {
						queryString += cat;
					} else {
						queryString += ','+cat;
					}
				});
			}

			if (query.tags.length > 0) {
				queryString += '&tags=';
				query.tags.forEach(function(tag, index) {
					if (index == 0) {
						queryString += tag;
					} else {
						queryString += ','+tag;
					}
				});
			}

			queryString = queryString.replace(/ /g,"+");
			console.log('query string', queryString);

			await loadStoriesSearch(queryString);
			await loadIssuesSearch(queryString);
			await loadStaffSearch(queryString);

			if (storyResultsPresent == false && issueResultsPresent == false && staffResultsPresent == false) {
				console.log('no results!!');
				$('.nht-live-search__no-results').css('display','block');
			} else {
				$('.nht-live-search__no-results').removeAttr('style');
			}
		}

		function loadStoriesSearch(queryString) {
			return new Promise(resolve => {
				if($("[search-section*='stories']").length){
					$("[search-results*='stories']").html('');
					storyReq = $.get( "/wp-json/wp/v2/stories"+queryString, function( data ) {
						console.log('stories response', data);
						if (data.length > 0) {
							$("[search-section*='stories']").removeAttr('style');
							data.forEach(function(story) {
								var producersString = '';
								if (story.acf.producer_credit.length > 0 && story.acf.producer_credit != undefined) {
									story.acf.producer_credit.forEach(function(credit) {
										console.log('credit!!', credit);
										producersString += '<a href="/person/'+credit.post_name+'">'+credit.post_title+'</a>';
									});
								}
								var imageStr = '';
								if (story._embedded != undefined && story._embedded['wp:featuredmedia'] != undefined) {
									imageStr = '<img class="nht-card__img" src="'+story._embedded['wp:featuredmedia']['0'].source_url+'" />';
								}
								$("[search-results*='stories']").append(
								'<div class="nht-card nht-card--story">'+
									'<div class="nht-card__inner">'+
										'<div class="nht-card__top">'+
											'<div class="nht-card__overlay">'+
												'<div class="nht-play-link" nht-player="true" rest-lookup="stories/'+story.id+'" is-playing="false">'+
													'<i class="fas fa-play"></i>'+
												'</div>'+
												'<div class="nht-card__runtime">'+
													story.acf.runtime+
												'</div>'+
											'</div>'+
												'<a href="'+story.link+'" title="'+story.title.rendered+'">'+
													imageStr+
												'</a>'+
										'</div>'+
										'<div class="nht-card__bottom">'+
											'<h6>'+
												'<a href="'+story.link+'" title="">'+story.title.rendered+'</a>'+
											'</h6>'+
											'<p class="nht-card__excerpt">'+story.excerpt.rendered+'</p>'+	
											'<p>'+
												producersString+
											'</p>'+
										'</div>'+
									'</div>'+
								'</div>')
							});
							storyResultsPresent = true;
							resolve('resolved');
						} else {
							storyResultsPresent = false;
							resolve('resolved');
							$("[search-section*='stories']").css('display','none');
						}
					});
				} else {
					storyResultsPresent = false;
					resolve('resolved');
				}
			});
		}

		function loadIssuesSearch(queryString) {
			return new Promise(resolve => {
				if($("[search-section*='issues']").length){
					$("[search-results*='issues']").html('');
					issueReq = $.get( "/wp-json/wp/v2/issues"+queryString, function( data ) {
						console.log(data);
						if (data.length > 0) {
							$("[search-section*='issues']").removeAttr('style');
							data.forEach(function(issue) {
								var imageStr = '';
								if (issue._embedded != undefined && issue._embedded['wp:featuredmedia'] != undefined) {
									imageStr = '<img class="nht-card__img" src="'+issue._embedded['wp:featuredmedia']['0'].source_url+'" />';
								}
								$("[search-results*='issues']").append(
									'<a href="'+issue.link+'" title="'+issue.title.rendered+'">'+
								'<div class="nht-card nht-card--issue">'+
									'<div class="nht-card__inner">'+
										'<div class="nht-card__top">'+
											'<div class="nht-card__overlay">'+
												'<div class="nht-play-link">'+
													'<i class="fas fa-microphone"></i>'+
												'</div>'+
											'</div>'+
												imageStr+
										'</div>'+
									'</div>'+
								'</div>'+
								'</a>')
							});
							issueResultsPresent = true;
							resolve('resolved');
						} else {
							$("[search-section*='issues']").css('display','none');
							issueResultsPresent = false;
							resolve('resolved');
						}
					});
				} else {
					issueResultsPresent = false;
					resolve('resolved');
				}
			});
		}

		function loadStaffSearch(queryString) {
			return new Promise(resolve => {
				if($("[search-section*='staff']").length){
					$("[search-results*='staff']").html('');
					staffReq = $.get( "/wp-json/wp/v2/staff"+queryString, function( data ) {
						console.log(data);
						if (data.length > 0) {
							$("[search-section*='staff']").removeAttr('style');
							data.forEach(function(staff) {
								var imageStr = '';
								if (staff._embedded != undefined && staff._embedded['wp:featuredmedia'] != undefined) {
									imageStr = '<img class="nht-card__img" src="'+staff._embedded['wp:featuredmedia']['0'].source_url+'" />';
								}
								$("[search-results*='staff']").append(
								'<div class="nht-card nht-card--staff">'+
									'<div class="nht-card__inner">'+
										'<div class="nht-card__top">'+
											'<a href="'+staff.link+'" title="'+staff.title.rendered+'">'+
												imageStr+
											'</a>'+
										'</div>'+
										'<div class="nht-card__bottom">'+
											'<h6>'+
												'<a href="'+staff.link+'" title="">'+staff.title.rendered+'</a>'+
											'</h6>'+
											'<p class="nht-card__excerpt">'+
												'<p>'+staff.acf.role+'</p>'+
												'<p>---</p>'+
												'<p>'+staff.acf.year+'</p>'+
											'</p>'+	
										'</div>'+
									'</div>'+
								'</div>')
							});
							staffResultsPresent = true;
							resolve('resolved');
						} else {
							$("[search-section*='staff']").css('display','none');
							staffResultsPresent = false;
							resolve('resolved');
						}
					});
				} else {
					staffResultsPresent = false;
					resolve('resolved');
				}
			});
		}

		Array.prototype.remove = function() {
			var what, a = arguments, L = a.length, ax;
			while (L && this.length) {
				what = a[--L];
				while ((ax = this.indexOf(what)) !== -1) {
					this.splice(ax, 1);
				}
			}
			return this;
		};
		
	});
	
})(jQuery, this);
