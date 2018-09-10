(function ($, root, undefined) {
	
	$(function () {

        'use strict';

        var player = $('#nhtPlayer');
        var audio = document.getElementById('nhtPlayerAudio');
        var timeDrag = false;
        var searchTerm;

        $( document ).on( "click", "[nht-player*=true]", async function( event ) {
            audio.pause();

            if ($(this).attr('rest-lookup').length) {

                event.preventDefault();

                $('[is-playing*=true]').children().removeClass('fa-pause');
                $('[is-playing*=true]').children().addClass('fa-play');
    
                if ($(this).attr('is-playing')=='false') {
                    $('[is-playing*=true]').not($(this)).attr('is-playing','false');
                    console.log( 'a element clicked!' );
                    $(this).children().removeClass('fa-play');
                    $(this).children().addClass('fa-pause');
                    $(this).attr('is-playing','true');
                    await loadAudio($(this).attr('rest-lookup'));
                    audio.play();
                } else if ($(this).attr('is-playing')=='true') {
                    unloadAudio();
                    audio.pause();
                    audio.currentTime = 0;
                    $(this).attr('is-playing','false');
                }
            }

        });

        $( document ).on( "click", ".nht-player__play-button", function( event ) {
            if (audio.paused == false) {
                pauseAudio();
            } else {
                playAudio();
            }
        });

        $( document ).on( "click", ".nht-player__seek-forward", function( event ) {
            audio.currentTime = audio.currentTime + 15;
        });

        $( document ).on( "click", ".nht-player__seek-backward", function( event ) {
            audio.currentTime = audio.currentTime - 15;
        });

        $( document ).on( "click", ".nht-player__expand-button", function( event ) {
            unloadAudio();
            audio.pause();
            audio.currentTime = 0;
        });

        $(document).pjax('a', '#ajax-content', {
            fragment: "#ajax-content",
            timeout: 5000
        });

        $(document).on('submit', '.nht-search', function(event) {
            event.preventDefault();
            console.log(event);
            searchTerm = $('.nht-search__input').val();
            $.pjax.submit(event, '#ajax-content', {fragment: '#ajax-content'});
        });

        $(document).on('pjax:start', function(event) {
            $('.nht-player__loading').attr('loading', 'true');
            console.log('show loding!!');
        });


        $(document).on('pjax:end', function(event) {
            console.log('hide loding!!');
            $('.nht-player__loading').attr('loading', 'false');
            // Prevent default timeout redirection behavior
            if($(".nht-body").length){
                $('link[id=nht-styles-css]')[0].disabled=false;

                if($(".nht-live-search.nht-live-search--archive").length){
                    console.log('is an archive search page...');
                    searchTerm = '';
                    $('#nhtLiveSearchInput').val(searchTerm);
                    $('.nht-live-search__searchbox').submit();
                } else if($(".nht-live-search").length) {
                    console.log('is an archive search page...');
                    $('#nhtLiveSearchInput').val(searchTerm);
                    $('.nht-live-search__searchbox').submit();
                }

            } else if ($('#nht-issue__frame').length) {
				// var iframeWindow = document.getElementById("nht-issue__frame").contentWindow;
				window.addEventListener("message", receiveMessage, false);
				console.log(window);
			} else {
                $('link[id=nht-styles-css]')[0].disabled=true;
            }
        });

        async function receiveMessage(event) {
            console.log('message received!!', event.data);
			if (event.data.length > 1) {
                console.log('message received!!', event.data);
                audio.pause();
                await loadAudio(event.data);
                audio.play();
            }
		}

        $(audio).on('timeupdate', function() {
            $('.nht-player__played').css("width", (this.currentTime / this.duration) * 100 + '%');
            $('.nht-player__loaded').css("width", (this.seekable.end(0) / this.duration) * 100 + '%');
            console.log('seekable end', this.seekable.end(0));
            $('.nht-player__playhead').css("left", (this.currentTime / this.duration) * 100 + '%');
            $('.nht-player__time-code').text(fmtMSS(this.currentTime) + ' / ' + fmtMSS(this.duration));

            if (this.currentTime == this.duration) {
                if ($('.nht-player__play-button svg').hasClass('fa-pause')) {
                    $('.nht-player__play-button svg').removeClass('fa-pause');
                    $('.nht-player__play-button svg').addClass('fa-play');
                }
            }
        });

        $('.nht-player__seekbar').mousedown(function (e) {
            timeDrag = true;
            audio.muted = true;
            updateTime(e.pageX);
        });
        $(document).mouseup(function (e) {
            if (timeDrag) {
                audio.muted = false;
                timeDrag = false;
                updateTime(e.pageX);
                audio.play();
                if ($('.nht-player__play-button svg').hasClass('fa-play')) {
                    $('.nht-player__play-button svg').removeClass('fa-play');
                    $('.nht-player__play-button svg').addClass('fa-pause');
                }
            }
        });
        $(document).mousemove(function (e) {
            if (timeDrag) {
                updateTime(e.pageX);
            }
        });
    
		
		
        // DOM ready, take it away
        
        async function loadAudio (rest) {
            return new Promise(resolve => {
                console.log('play link id', rest);

                $.get( '/wp-json/wp/v2/'+rest+'?_embed', function( data ) {
                    $('.nht-player__title--producer').html('');
                    console.log(data);
                    audio.src = data.acf.story_audio;
                    $('.nht-player__title--main').text(data.title.rendered);
                    $('.nht-player__title--main').attr('href', data.link);
                    if (data._embedded != undefined && data._embedded['wp:featuredmedia'] != undefined) {
                        $('.nht-player__artwork img').attr('src',data._embedded['wp:featuredmedia']['0'].source_url);
                    }
                    if (data.acf.producer_credit.length > 0 && data.acf.producer_credit != undefined) {
                     	data.acf.producer_credit.forEach(function(credit) {
                        	console.log('credit!!', credit);
                            $('.nht-player__title--producer').append(credit.post_title+' ');
                        });
                    }
                    playAudio();

                    if ($(player).attr('active') == 'false') {
                        $(player).attr('active', 'true');
                    }

                    resolve('resolved');

                });
            });
        }

        async function unloadAudio () {
            pauseAudio();
            if ($(player).attr('active') == 'true') {
                $(player).attr('active', 'false');
            }

            $('[is-playing*=true]').children().removeClass('fa-pause');
            $('[is-playing*=true]').children().addClass('fa-play');
            $('[is-playing*=true]').attr('is-playing','false');
        }

        function playAudio() {
            $('.nht-player__play-button svg').removeClass('fa-play');
            $('.nht-player__play-button svg').addClass('fa-pause');
            audio.play();
        }

        function pauseAudio() {
            $('.nht-player__play-button svg').addClass('fa-play');
            $('.nht-player__play-button svg').removeClass('fa-pause');
            audio.pause();
        }

        function fmtMSS(s){
            return(s-(s%=60))/60+(10<s?':':':0')+Math.floor(s);
        }

        function updateTime(px) {
            var progress = $('.nht-player__played');
            var total = $('.nht-player__duration');
            var maxduration = audio.duration; //audio duration
            var position = px - progress.offset().left; //Click pos
            var percentage = 100 * (position / total.width());
            console.log('width!!', total.width());
            console.log('offset left!!', progress.offset().left);

            //Check within range
            if (percentage > 100) {
                percentage = 100;
            }
            if (percentage < 0) {
                percentage = 0;
            }

            audio.currentTime = maxduration * percentage / 100;
        }
		
	});
	
})(jQuery, this);
