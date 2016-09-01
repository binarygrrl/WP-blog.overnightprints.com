/*! ========================================================================== 
 * pongstagr.am v3.0.4 jQuery Plugin | http://pongstr.github.io/pongstagr.am/ 
 * =========================================================================== 
 * Copyright (c) 2014 Pongstr Ordillo. Licensed under MIT License. 
 * =========================================================================== */

+function ($) { "use strict"; 

  var Pongstgrm = function (element, options) {
    this.element  = element
    this.options  = options

    return this
  }

  Pongstgrm.defaults = {

    // USER AUTHENTICATION
    // ===========================
      accessId:     null
    , accessToken:  null

    // DISPLAY OPTIONS
    // ===========================
    , count:       8
	, Image_label: true
    , likes:       true
    , comments:    true
    , timestamp:   true
    , effects:    "scaling"
    , show:       "recent"
	, Show_P_Image:   	true
	, Show_F_Button:	true
	, Show_Post:   		true
	, Show_Website:		true
	, Show_Bio:   		true

    // HTML OPTIONS
    // ===========================
	, id:				"0"
    , preload:          "spinner"
    , button:           "btn btn-success"
    , buttontext:       "Load more"
    , column:           "col-xs-12 col-sm-4 col-md-4 col-lg-4"
    , likeicon:         "fa fa-heart"
    , muteicon:         "fa fa-volume-off"
    , videoicon:        "fa fa-play"
    , commenticon:      "fa fa-comment"
    , picture_size:     64
    , show_counts:      true
    , profile_bg_img:   null
    , profile_bg_color: "#d9534f"
	
	// HOVER EFFECT OPTIONS
    // ===========================
	, hover_effect:     "effect11"
	, animation:     	"left_to_right"
  }


  /* HTML TEMPLATES */
  Pongstgrm.prototype.template = {
    loadmore: function (options) {
		//alert(options.id);
      var _load  = '<div class="row position_'+ options.id +'">'
          _load += '  <button class="'+ options.button +'" data-paginate="'+ options.show +'">'
          _load +=      options.buttontext
          _load += '  </button>'
          _load += '</div>'

      options.insert !== 'before' ? 
        $(options.target).after (_load) :
        $(options.target).before(_load)

      return
    }
    , profile: function (options) {
        var _profile  = '<div class="row pongstgrm-profile">'
            _profile += ' <div class="col-xs-12 text-center">'
			
			if(options.Show_P_Image == true ){
				_profile += '   <div class="thumbnail">'
				_profile += '     <img src="'+ options.profile_picture +'" width="'+ options.picture_size +'"  height="'+ options.picture_size +'" alt="'+ options.username +'">'
				_profile += '   </div>'
			}else{
				_profile += '   <div style="margin-top:15px;"> </div>'
			}
			
			if(options.Show_F_Button == true ){
				_profile +='<form action="https://instagram.com/'+ options.username +'" target="_blank"> <div class="follow-btn"><input class="btn" type="submit" height="25px" value="Follow"  style=" width:'+ options.picture_size +'px; "></div></form>'
			}else{
				_profile += '   <div style="margin-top:15px;"> </div>'
			}
			
			if(options.Show_Post == true ){
				_profile += '   <div class="counts">'
				_profile += '     <span class="h4">'+ options.media +' <small>Posts</small></span>'
				_profile += '     <span class="h4">'+ options.followed_by +' <small>Followers</small></span>'
				_profile += '     <span class="h4">'+ options.follows +' <small>Following</small></span>'
				_profile += '   </div>'
			}else{
				_profile += '   <div style="margin-top:15px;"> </div>'
			}
			
            _profile += '   <div class="user-data">'
            _profile += '     <h3>'+ options.username +'</h3>'
			if(options.Show_Website == true ){
				_profile += '     <small>Website - <a href="'+ options.website +'" target="_blank">' + options.website +'</a></small>'
			}
			if(options.Show_Bio == true ){
				_profile += '     <p>Bio - '+ options.bio +'</p>'
			}else{
				_profile += '   <div style="margin-top:10px;"> </div>'
			}
				_profile += '   </div>'
				_profile += ' </div>'
				_profile += '</div>'
			
          $(options.target)
            .append(_profile)
            .css({
                'background-image': 'url(' + options.profile_bg_img + ')'
              , 'background-color':  options.profile_bg_color 
			  , 'background-position': '50% center'
            })
		
        return
      }
    , thumb: function (options) {
        var _thumbnail  = '<div class="'+ options.dflt.column +' img-thum">'
            _thumbnail += ' <div class="text-center ' + options.dflt.effects + ' item-hover circle colored ' + options.dflt.hover_effect + ' ' + options.dflt.animation + ' ">'

          /* options.dflt.timestamp !== false ?
            _thumbnail += '<strong>'+ options.data.timestamp +'</strong>' : null */
            _thumbnail += '   <div class="'+ options.dflt.preload +'" id="'+ options.dflt.show + '-' + options.data.id +'-thmb-loadr" />'
			
			//alert(options.data.video);
			if( options.data.type !== 'video'){
				
					_thumbnail += '   <a href="'+ options.data.image +'" id="abc" data-lightbox-gallery="enigma_lightbox" class="nivoz">'
			}else{
					_thumbnail += '   <a href="'+ options.data.video +'" id="abc" data-lightbox-gallery="enigma_lightbox" class="nivoz">'
			}
            _thumbnail += '   <div class="img">'
			
            _thumbnail += '     <img id="'+ options.dflt.show + '-' + options.data.id +'-thmb" src="'+ options.data.image +'" alt="'+ options.data.caption.substring(0, 40) +'"></div>'
			
			_thumbnail += '	<div class="info">'
			_thumbnail += '	<h3 class="imgf-header-label">'
			
			options.dflt.Image_label !== false ?
            _thumbnail += options.data.caption.substring(0, 40) +'<br>': ""
			/* _thumbnail += options.data.caption.substring(0, 40); +'' */
			
			options.dflt.timestamp !== false ?
            _thumbnail += '<strong>'+ options.data.timestamp +'</strong>' : null
			_thumbnail += '<br><br><br>'
			
			options.dflt.likes !== false ?
            _thumbnail += '<span class="likes"><i class="'+ options.dflt.likeicon +'"></i> '+ options.data.likes_count+'</span>': "" 

          options.dflt.comments !== false ? 
            _thumbnail += '&nbsp;&nbsp;<span class="comments"><i class="'+ options.dflt.commenticon +'"></i> '+ options.data.comments_count+'</span>': ""
			
            _thumbnail += '   </h3>'
			_thumbnail += '   </div></a>'
          options.data.type === 'video' ?
            _thumbnail += '<span class="type"><i class="'+ options.dflt.videoicon +'"></i></span>': ""
			
            _thumbnail += ' </div>'
			
			_thumbnail += '	<h3 class="imgf-footer-label">'
			
			options.dflt.Image_label !== false ?
            _thumbnail += options.data.caption.substring(0,30) +'<br>': ""
			/* _thumbnail += options.data.caption.substring(0, 40); +'' */
			
			options.dflt.timestamp !== false ?
            _thumbnail += '<strong>'+ options.data.timestamp +'</strong>' : null
			_thumbnail += '<br>'
			
			options.dflt.likes !== false ?
            _thumbnail += '<span class="likes"><i class="'+ options.dflt.likeicon +'"></i> '+ options.data.likes_count+'</span>': "" 

          options.dflt.comments !== false ? 
            _thumbnail += '&nbsp;&nbsp;<span class="comments"><i class="'+ options.dflt.commenticon +'"></i> '+ options.data.comments_count+'</span>': ""
			
            _thumbnail += '   </h3>'
			
            _thumbnail += '</div>'
		
		//$('#'+ options.dflt.show + '-' + options.data.id +'-thmb-loadr').append('style').css("display", "none"); 
		
		$( '#'+ options.dflt.show + '-' + options.data.id +'-thmb-loadr' ).addClass( "myClass" );
		
		//alert('https://instagram.com/'+ options.data.username +'');
        $(options.target).append(_thumbnail)

      return
    }
    , bsmodal: function (options) {
        var alert  = '<div class="alert">Your browser does not support HTML5 Videos or MPEG-4 format.</div>'
          , image  = '<div class="'+ options.dflt.preload +'" id="'+ options.data.id +'-full-loadr"></div>'
            image += '<img id="'+ options.data.id +'-full" src="'+ options.data.image +'" alt="'+ options.data.caption +'">'

        var video  = '<video id="'+ options.data.id +'-video" width="100%" height="auto">'
            video += '  <source src="'+ options.data.video +'" type="video/mp4">'
            video +=  alert
            video += '</video>'
            video += '<button type="button" class="btn btn-lg" id="play-pause"><i class="glyphicon glyphicon-play"></i></button>'
            video += '<button type="button" class="btn btn-lg" id="mute"><i class="glyphicon glyphicon-volume-up"></i></button>'

        var modal  = '<div id="'+ options.data.id +'" class="modal fade">'
            modal += '  <div class="modal-dialog">'
            modal += '    <div class="modal-content">'
            modal += '      <div class="modal-body">'
            modal += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
            modal += '        <div class="row">'
            modal += '<div class="media-column">'

          options.data.type !== 'video' ?
            modal += image : 
          navigator.userAgent.match(/webkit/i) || navigator.userAgent.match(/(iPod|iPhone|iPad)/) ?
            modal += video : 
            modal += alert + image

            modal += '</div>'
            modal += '<div class="media-comment">'

            modal += '<div class="media">'
            modal += '  <a href="https://instagram.com/'+ options.data.username +'" class="media-object thumbnail pull-left">'
            modal += '    <img src="'+ options.data.profile_picture +'" width="'+ options.dflt.picture_size +'" height="'+ options.dflt.picture_size +'" class="">'
            modal += '  </a>'
            modal += '  <div class="modal-body">'
            modal += '      <h5 class="media-heading">'
            modal += '        <a href="https://instagram.com/'+ options.data.username +'">'+ options.data.username +'</a>'
            modal += '      </h5>'

          options.data.caption !== null ?
            modal += '      <p>'+ options.data.caption +'</p>': ""
            modal += '  </div>'
            modal += '</div>'

          options.data.comments_count !== 0 ?
            $.each(options.data.comments_data, function(a, b){
              modal += '<div class="media">'
              modal += '  <a href="https://instagram.com/'+ b.from.username +'" class="media-object thumbnail pull-left">'
              modal += '    <img src="'+ b.from.profile_picture +'" width="'+ options.dflt.picture_size +'" height="'+ options.dflt.picture_size +'">'
              modal += '  </a>'
              modal += '  <div class="modal-body">'
              modal += '      <h5 class="media-heading">'
              modal += '        <a href="https://instagram.com/'+ b.from.username +'">'+ b.from.username +'</a>'
              modal += '      </h5>'
              modal += '      <p>'+ b.text +'</p>'
              modal += '  </div>'
              modal += '</div>'
            }) : ""

            modal += '        </div>'
            modal += '      </div>'
            modal += '    </div>'
            modal += '  </div>'
            modal += '</div>'

      return
    }
  }


  Pongstgrm.prototype.preloadMedia = function (option) {
    var $image = $(option.imgid)
      ,  start = 0

    $image.one('load', function () {
      ++start === $image.length &&
        $(option.loadr).fadeOut()
        $(this).addClass('fade')
    }).each(function () {
      this.complete && $(this).load()
    })

    return
  }


  Pongstgrm.prototype.videoBtn = function (option, callback) {
    $(option.trigger).on('click', function(e) {
      e.preventDefault(); callback();

      $(option.child, this)
        .toggleClass(option.classes)
    })

    return
  }

  Pongstgrm.prototype.stream = function () {
    var element = this.element
      , options = this.options
      , apiurl  = 'https://api.instagram.com/v1/users/'
      , rcount  = '?count=' +  options.count + '&access_token=' + options.accessToken

    function paginate (option) {
      (option.url === undefined || option.url === null) ? 
        $('[data-paginate='+ option.show +']').on('click', function (e) {
            $(this)
              .removeClass()
              .addClass('btn btn-default')
              .attr('disabled','disabled')
          e.preventDefault()
        }) :

        $('[data-paginate='+ option.show +']').on('click', function (e) {
          e.preventDefault()

          ajaxdata({ 
              url: option.url
            , opt: option.opt 
          })

          $(this).unbind(e)
        })
		
			
				jQuery(document).ready(function(){
					// NIVO-LIGHTBOX
					jQuery('a.nivoz').nivoLightbox({
						effect: 'slideDown'
					});
				});

			
      return
    }

    function media (data, option) {
      $.each(data, function (a, b) {
        var newtime = new Date(b.created_time * 1000)
          , created = newtime.toDateString()
          , defaults = {
              dflt: option
            , target: element
            , data: {
                  id:             b.id
                , type:           b.type
                , video:          b.videos && b.videos.standard_resolution.url
                , image:          b.images.standard_resolution.url
                , caption:        b.caption && b.caption.text 
                , username:       b.user.username
                , timestamp:      created
                , thumbnail:      b.images.low_resolution.url
                , likes_count:    b.likes.count
                , comments_count: b.comments.count
                , comments_data:  b.comments.data
                , profile_picture:b.user.profile_picture
              }
          }

        Pongstgrm.prototype.template.thumb (defaults)

        Pongstgrm.prototype.preloadMedia({
            imgid : '#' + option.show + '-' + b.id + '-thmb'
          , loadr : '#' + option.show + '-' + b.id + '-thmb-loadr'
        })

        Pongstgrm.prototype.template.bsmodal (defaults)

      })
    }

    function profile (data, option) {
      Pongstgrm.prototype.template.profile ({
          target:             element
        , bio:                data.bio
        , media:              data.counts.media
        , website:            data.website
        , follows:            data.counts.follows
        , username:           data.username
        , full_name:          data.full_name
        , followed_by:        data.counts.followed_by
        , picture_size:       option.picture_size
        , profile_bg_img:     option.profile_bg_img
        , profile_picture:    data.profile_picture
        , profile_bg_color:   option.profile_bg_color
		, Show_P_Image:   	  option.Show_P_Image
		, Show_F_Button:   	  option.Show_F_Button
		, Show_Post:   		  option.Show_Post
		, Show_Website:   	  option.Show_Website
		, Show_Bio:   		  option.Show_Bio
      })
      return
    }

    function ajaxdata (option) {
      $.ajax({
          url      : option.url
        , cache    : true
        , method   : 'GET'
        , dataType : 'jsonp' 
        , success  : function(data){
            option.opt.show !== 'profile' ?
              media   (data.data, option.opt) :
              profile (data.data, option.opt)

            option.opt.show !== 'profile' &&
              paginate ({ 
                  show: option.opt.show
                , url:  data.pagination.next_url
                , opt: option.opt
              })
          }
      })

      return
    }

    switch (options.show) {
      case 'liked':
        ajaxdata({
            url : apiurl + 'self/media/liked' + rcount
          , opt : options
        })
      break

      case 'feed':
        ajaxdata({
            url: apiurl + 'self/feed' + rcount
          , opt: options
        })
      break

      case 'profile':
        ajaxdata({
            url: apiurl + options.accessId + '?access_token=' + options.accessToken
          , opt: options
        })
      break

      case 'recent':
        ajaxdata({
            url: apiurl + options.accessId + '/media/recent' + rcount
          , opt: options
        })
      break

      default:
        ajaxdata({
            url: 'https://api.instagram.com/v1/tags/' + options.show + '/media/recent' + rcount
          , opt: options
        })
    }

    return
  }


  Pongstgrm.prototype.create = function () {
    var element = this.element
      , options = this.options

    $(element)
      .attr('data-type', options.show)
      .addClass('pongstagrm row')


    options.show !== 'profile' &&
      Pongstgrm.prototype.template.loadmore({
          show:       options.show
        , target:     element
        , button:     options.button
        , buttontext: options.buttontext
		, id:     	  options.id
      })

    this.stream()

    return
  }


  Pongstgrm.prototype.start = function () {
    var option = this.options
    if (option.accessId !== null || option.accessToken !== null) {
      this.create(); return
    }
  }

  // PONGSTAGR.AM PLUGIN DEFINITON
  // =============================
  $.fn.pongstgrm = function (option) {
    var options  = $.extend({}, Pongstgrm.defaults, option)

    return this.each(function () {
      var media = new Pongstgrm($(this)[0], options)
          media.start()
    })
  }


  // PONGSTAGR.AM DEFAULT OPTIONS
  // =============================  
  $.fn.pongstgrm.defaults = Pongstgrm.options

}(window.jQuery);