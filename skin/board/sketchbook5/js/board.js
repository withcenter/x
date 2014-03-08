// Board
function board(bdObj){
(function($){
// Option
	var bd = $(bdObj);
	var default_style = bd.attr('data-default_style');
	var bdBubble = bd.attr('data-bdBubble');
	var bdImgOpt = bd.attr('data-bdImgOpt');
	var bdImgLink = bd.attr('data-bdImgLink');
	var bdNavSide = bd.attr('data-bdNavSide');

	ie8Check = navigator.userAgent.match(/msie [7]/i) || navigator.userAgent.match(/msie [8]/i);


// Category Navigation
	bd.find('ul.cTab>li>ul>li.on_').parents('li:first').addClass('on');
	var cnb = bd.find('div.bd_cnb');
	if(cnb.length){
		var cMore = bd.find('li.cnbMore');
	    var cItem = cnb.find('>ul>li');
	    var lastEvent = null;
	    function cnbToggle(){
	        var t = $(this);
	        if(t.next('ul').is(':hidden') || t.next('ul').length==0){
	            cItem.find('>ul').fadeOut(100);
	            t.next('ul').fadeIn(200);
	        };
	    };
	    function cnbOut(){
	        cItem.find('ul').fadeOut(100);
	    };
	    cItem.find('>a').mouseover(cnbToggle).focus(cnbToggle);
	    cItem.mouseleave(cnbOut);
		cItem.find('>ul').each(function(){
			var t = $(this);
			t.append('<i class="edge"></i>');
			if(ie8Check) t.prepend('<i class="ie8_only bl"></i><i class="ie8_only br"></i>');
			if(t.width() > $('html,body').width()-t.offset().left){
				t.addClass('flip');
			};
		});
		cItem.find('>ul>li.on').parents('ul:first').show().prev().addClass('on');
	    function cnbStart(){
			// If Overflow
			cItem.each(function(){
				if($(this).offset().top!=cMore.offset().top){
					$(this).addClass('hidden').nextAll().addClass('hidden');
					cMore.css('visibility','visible');
					return false;
				} else {
					$(this).removeClass('hidden').nextAll().removeClass('hidden');
					cMore.css('visibility','hidden');
				};
			});
			cnb.find('>.bg_f_f9').css('overflow','visible');
		};
		cnbStart();
		$(window).resize(cnbStart);
		function cnbMore(){
			cnb.toggleClass('open').find('.ui-icon').toggleClass('ui-icon-triangle-1-s').toggleClass('ui-icon-triangle-1-n');
			return false;
		};
		if((cnb.find('.hidden a,.hidden li').hasClass('on')) && !cnb.hasClass('open')){
			cnbMore();
		};
		cMore.click(cnbMore);
	};

// Speech Bubble
	if(!bdBubble){
		bd.find('a.bubble').hover(function(){
			var t = $(this);
			if(!t.hasClass('no_bubble') && !t.find('.wrp').length){
				t.append('<span class="wrp"><span class="speech">'+t.attr('title')+'</span><i class="edge"></i></span>').removeAttr('title');
				if($('html,body').width()-t.offset().left < 80){
					t.addClass('left').find('.wrp').css({marginTop:t.parent('.wrp').height()/2})
				} else if(t.offset().top < 80 && !t.parent().parent().hasClass('rd_nav_side')){
					t.addClass('btm').find('.wrp').css({marginLeft:-t.find('.wrp').width()/2})
				} else {
					t.find('.wrp').css({marginLeft:-t.find('.wrp').width()/2})
				};
				if(ie8Check) t.find('.wrp').prepend('<i class="ie8_only bl"></i><i class="ie8_only br"></i>');
			};
			if(ie8Check) return;
			if(t.is('.left,.right,.btm')){
				t.find('.wrp:hidden').fadeIn(150)
			} else {
				t.find('.wrp:hidden').css('bottom','150%').animate({
					bottom:'100%'
				},{duration:150,specialEasing:{left:'easeInOutQuad'},complete:function(){
					},step:null,queue:false
				}).fadeIn(150)
			}
		},function(){
			if(ie8Check) return;
			$(this).find('.wrp').fadeOut(100)
		})
	};

// Nanum Font
	if($('#bd_font_install').length>1){
		$('#bd_font_install').eq(1).remove()
	} else {
		if($('#fontcheck_np1').width()==$('#fontcheck_np2').width()){
			bd.removeClass('use_np');
			$.removeCookie('use_np');
		} else {
			bd.addClass('use_np');
			$.cookie('use_np','use_np');
		};
		function installfontOut(){
			$('#install_ng2').fadeOut();
			bd.find('.bd_font .select').focus();
			return false;
		};
		$(document).keydown(function(event){
			if($('#install_ng2').is(':visible')) {
				if(event.keyCode!=27) return true;
				return installfontOut();
			}
		});
		$('#install_ng2 .tg_close2,#install_ng2 .close').click(installfontOut);
		$('#install_ng2 .tg_blur2').focusin(installfontOut);
	};
	bd.find('.bd_font li a').click(function(){
		var p = $(this).parent();
		if(p.hasClass('ng') && $('#fontcheck_ng3').width()==$('#fontcheck_ng4').width()){
			$('#install_ng2').fadeIn().find('.tg_close2').focus();
		} else {
			var pC = p.attr('class');
			if(p.hasClass('ui_font')){
				$.removeCookie('bd_font');
			} else {
				$.cookie('bd_font',''+pC+'');
			};
			$('.bd,.bd input,.bd textarea,.bd select,.bd button,.bd table').removeClass('ui_font ng window_font tahoma').addClass(pC);
			p.addClass('on').siblings('.on').removeClass('on');
			$('.bd_font .select strong').text($(this).text());
		};
		return false;
	});

// sketchbook's Toggle2 (Original : XE UI)
	var tgC2 = bd.find('.tg_cnt2');
	bd.find('.tg_btn2').click(function(){
		var t = $(this);
		var h = t.attr('data-href');
		if(t.next(h).is(':visible')){
			t.focus().next().fadeOut(200);
		} else {
			tgC2.filter(':visible').hide();
			t.after($(h)).next().fadeIn(200).css('display','block').find('a,input,button:not(.tg_blur2),select,textarea').eq(0).focus();
		};
		return false;
	});
	function tgClose2(){
		tgC2.filter(':visible').fadeOut(200).prev().focus();
	};
	$(document).keydown(function(event){
		if(event.keyCode != 27) return true; // ESC
		return tgClose2();
	});
	tgC2.mouseleave(tgClose2);
	bd.find('.tg_blur2').focusin(tgClose2);
	bd.find('.tg_close2,#install_ng2 .close').click(tgClose2);

// Form Label Overlapping
	bd.find('.itx_wrp label').next()
		.focus(function(){
			$(this).prev().css('visibility','hidden');
		})
		.blur(function(){
			if($(this).val()==''){
				$(this).prev().css('visibility','visible');
			} else {
				$(this).prev().css('visibility','hidden');
			};
		});
	// IE8 Fix;
	if(ie8Check){
		bd.find('.bd_guest .itx_wrp label').click(function(){
			$(this).next().focus();
		});
	};

// Scroll
	bd.find('a.back_to').click(function(){
		$('html,body').animate({scrollTop:$($(this).attr('href')).offset().top},{duration:1000,specialEasing:{scrollTop:'easeInOutExpo'}});
		return false;
	});

// Search
	var srchWindow = bd.find('.bd_faq_srch');
	bd.find('a.show_srch').click(function(){
		if(srchWindow.is(':hidden')){
			srchWindow.fadeIn().find('.itx').focus();
		} else {
			srchWindow.fadeOut();
			$(this).focus();
		};
		return false;
	});
	bd.find('.bd_srch_btm_itx').focus(function(){
		bd.find('.bd_srch_btm .itx_wrp').animate({width:140},{duration:1000,specialEasing:{width:'easeOutBack'}}).parent().addClass('on');
	});

// Gallery hover effect
	bd.find('.info_wrp').hover(function(){
		var t = $(this);
		var st = t.find('.info.st,.info.st1');
		var tL = bd.find('ol.bd_tmb_lst');
		if(tL.hasClass('tmb_bg3')){
			st.stop(true,true).animate({opacity:.8},200);
		} else {
			if(ie8Check){
				st.stop(true,true).animate({opacity:.7},200);
			} else {
				st.stop(true,true).animate({opacity:1},200);
			};
		};
		t.find('.info').stop(true,true).animate({top:0,left:0},200);
	},
	function(){
		var t = $(this);
		t.find('.info.st,.info.st1').animate({opacity:0},200);
		t.find('.info.st2').animate({top:'-100%'},200);
		t.find('.info.st3').animate({left:'-100%'},200);
		t.find('.info.st4').animate({top:'-100%',left:'-100%'},200);
	});

// Imagesloaded
	var bdOl = bd.find('ol.bd_lst');
	if(bdOl.length && !bdOl.hasClass('img_loadN')){
		bdOl.find('.tmb').each(function(){
			var t = $(this);
			t.imagesLoaded(function(){
				t.parent().addClass('fin_load').fadeIn(250);
			});
		});
	};

// List Style
if(default_style=='gallery'){
	// Webzine
	var bd_zine = bd.find('ol.bd_zine');
	if(bd_zine.attr('data-masonry')){
		if(bd_zine.attr('data-masonry')!='_N'){
			bd_zine.imagesLoaded(function(){
				bd_zine.masonry({
					itemSelector:'li',
					isFitWidth:true,
					isAnimated:true,
					animationOptions:{duration:500,easing:'easeInOutExpo',queue:false}
				});
			});
		} else {
			bd_zine.imagesLoaded(function(){
				bd_zine.masonry({
					itemSelector:'li',
					isFitWidth:true
				});
			});
		};
	};
} else if(default_style=='webzin'){
	// Gallery
	var bd_tmb_lst = bd.find('ol.bd_tmb_lst');
	if(bd_tmb_lst.attr('data-gall_deg')){
		if(ie8Check) return;
		var gall_deg = bd_tmb_lst.attr('data-gall_deg');
		bd_tmb_lst.find('.tmb_wrp').each(function(){
			var m = Math.floor(Math.random()*gall_deg*2-gall_deg);
			$(this).css({
				'msTransform':'rotate('+m+'deg)',
				'-moz-transform':'rotate('+m+'deg)',
				'-webkit-transform':'rotate('+m+'deg)'
			});
		});
	};
} else if(default_style=='me2'){
	// me2
	var bd_tmb_lst = bd.find('ol.bd_zine');
	if(bd_tmb_lst.attr('data-gall_deg')){
		if(ie8Check) return;
		var gall_deg = bd_tmb_lst.attr('data-gall_deg');
		bd_tmb_lst.find('.tmb_wrp').each(function(){
			var m = Math.floor(Math.random()*gall_deg*2-gall_deg);
			$(this).css({
				'msTransform':'rotate('+m+'deg)',
				'-moz-transform':'rotate('+m+'deg)',
				'-webkit-transform':'rotate('+m+'deg)'
			});
		});
	};
} else if(default_style=='cloud_gall'){
	// Cloud Gallery
	bdCloud(bd);
};



// Read Page Only
if(bd.find('div.rd').length || default_style=='guest'){
	// Prev-Next
	bdPrevNext(bd);
	function rdPrev(){
		var a = bd.find('.bd_rd_prev .wrp');
		$(this).append(a).attr('href',bd.find('.bd_rd_prev').attr('href'));
		a.css({marginLeft:-a.width()/2});
	};
	bd.find('a.rd_prev').mouseover(rdPrev).focus(rdPrev);
	function rdNext(){
		var a = bd.find('.bd_rd_next .wrp');
		$(this).append(a).attr('href',bd.find('.bd_rd_next').attr('href'));
		a.css({marginLeft:-a.width()/2});
	};
	bd.find('a.rd_next').mouseover(rdNext).focus(rdNext);
	
	bd.find('textarea,input,select').keydown(function(event){
		event.stopPropagation();
	});
	// Hide : et_vars, prev_next
	bd.find('.fdb_hide,.rd_file.hide,.fdb_lst .cmt_files').hide();
	if(bd.find('.rd table.et_vars th').length) bd.find('.rd table.et_vars').show();
	if(!bd.find('.bd_rd_prev').length) bd.find('a.rd_prev').hide();
	if(!bd.find('.bd_rd_next').length) bd.find('a.rd_next').hide();
	// Read Navi
	bd.find('.print_doc').click(function(){
		if($(this).hasClass('this')){
			print();
		} else {
			window.open(this.href,'print','width=640,height=999,scrollbars=yes,resizable=yes').print();
		};
		return false;
	});
	bd.find('.font_plus').click(function(){
		var c = $('.bd .wr_content');
		var font_size = parseInt(c.css('fontSize'))+1;
		c.css('font-size',''+font_size+'px');
		return false;
	});
	bd.find('.font_minus').click(function(){
		var c = $('.bd .wr_content');
		var font_size = parseInt(c.css('fontSize'))-1;
		c.css('font-size',''+font_size+'px');
		return false;
	});

	// Content Images
	if(bdImgOpt) bd.find('.wr_content img').draggable();
	if(bdImgLink){
		bd.find('.wr_content img').click(function(){
			window.location.href=$(this).attr('src');
		});
	};
	// Side Navi Scoll
	if(!bdNavSide){
		$(window).scroll(function(){
			var sT = $(this).scrollTop();
			var o = bd.find('div.rd_nav_side .rd_nav');
			if((sT > bd.find('div.rd_body').offset().top) && (sT < bd.find('hr.rd_end').offset().top-$(this).height())){
				o.fadeIn(200);
			} else {
				o.fadeOut(200);
			};
		});
	};

	// Editor
	var simpleWrt = bd.find('.simple_wrt textarea');
	simpleWrt.focus(function(){
		$(this).parent().parent().next().slideDown();
	})

};

})(jQuery)
}

// Prev-Next
function bdPrevNext(bd){
	jQuery(document).keydown(function(event){
		var p = bd.find('.bd_rd_prev');
		var n = bd.find('.bd_rd_next');
		// fixed for 'prettyphoto' addon
		if(!jQuery('div.pp_overlay').length){
			if(event.keyCode==37 && p.length){
				window.location.href = p.attr('href');
			} else	if(event.keyCode==39 && n.length){
				window.location.href = n.attr('href');
			} else 	if(event.keyCode==27 && jQuery('#viewer').length){
				self.close();
			} else {
				return true;
			};
		};
	});
}


