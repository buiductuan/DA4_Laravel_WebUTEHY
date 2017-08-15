//Animation 2 banner Left and Right
$(function() {
    if (document.body.clientWidth > 1200) {
        $j('.adv').advScroll({
            easing: 'easeOutBack',
            timer: 1000
        });
    } else {
        document.getElementById("adv1").style.display = "none";
        document.getElementById("adv2").style.display = "none";
    }
});
$(function() {
    $(window).resize(function() {
        if (document.body.clientWidth > 1200) {
            document.getElementById("adv1").style.display = "inline";
            document.getElementById("adv2").style.display = "inline";
        } else {
            document.getElementById("adv1").style.display = "none";
            document.getElementById("adv2").style.display = "none";
        }
    });
});
//Animation 2 banner Left and Right

//Back to top
$(function () {
   $(window).scroll(function () {
       if ($(this).scrollTop() != 0) {
           $('#div-toTop').fadeIn();
       } else {
           $('#div-toTop').fadeOut();
       }
   });
   $('#div-toTop').click(function () {
       $('body,html').animate({ scrollTop: 0 }, 1000);
   });
});

//show subcate in postbox when hover a title
jQuery(document).ready(function () {
    jQuery('.postbox .widgettitle').hover(function () {
        jQuery(this).children('.subcatetitle').fadeIn();
    });
    jQuery('.postbox .widgettitle').hover(function () { }, function () {

        jQuery('.postbox .widgettitle .subcatetitle').fadeOut();
    });
    jQuery('span.subcatetitle a').hover(function () {
        jQuery(this).css("color","red");
    }, function (e) {
        jQuery(this).css("color", "#333");
    });
});
var $j=jQuery.noConflict();
	(function($j){

	$fn.advScroll = function(option) {

	$j.fn.advScroll.option = {
	    marginTop:1,
	    easing:'',
	    timer:400,
	};

	option = $j.extend({}, $j.fn.advScroll.option, option);

	return this.each(function(){
	    var el = $j(this);
	    $j(window).scroll(function(){
	        t = parseInt($(window).scrollTop()) + option.marginTop;
	        el.stop().animate({marginTop:t},option.timer,option.easing);
	    })
	});
	};
});


//Slide show 
$(function() {
    greyInitRedux();
    ieDropdownsNav();
    ieDropdownsFilter();
    itemViewer();
    jsTabsetInit();
    slider();
    headerTabs();
    carousel();
    emergencyClose();
    adjournLinks();
    zebra_strip_rows();

    $("#nav li").hover(function() {
        $(this).find("ul:first").css({
            visibility: "visible",
            display: "none"
        }).show(400);
    }, function() {
        $(this).find("ul:first").css({
            visibility: "hidden"
        });
    });
    slideFooter();
});

function slideFooter() {
    var $container = $(".container");
    $container.wtScroller({
        num_display: 9,
        slide_width: 100,
        slide_height: 90,
        slide_margin: 1,
        button_width: 35,
        ctrl_height: 25,
        margin: 10,
        auto_scroll: true,
        delay: 4000,
        scroll_speed: 1000,
        easing: "",
        auto_scale: false,
        move_one: false,
        ctrl_type: "scrollbar",
        display_buttons: true,
        mouseover_buttons: false,
        display_caption: true,
        mouseover_caption: true,
        caption_effect: "slide",
        caption_align: "bottom",
        caption_position: "inside",
        cont_nav: true,
        shuffle: false,
        mousewheel_scroll: true
    });

    var $submitButton = $("#submit-btn");
    var $resetButton = $("#reset-btn");
    var $ctrlTypes = $("#ctrl-type");
    var $buttonsCB = $("#buttons-cb");
    var $captionCB = $("#caption-cb");
    var $hoverButtonsCB = $("#btnsmouseover-cb");
    var $hoverCaptionCB = $("#capmouseover-cb");
    var $captionEffects = $("#cap-effect");
    var $captionPositions = $("#cap-position");
    var $scrollEasing = $("#easing");

    var $lightboxRB = $("input[name='lightbox-on']");
    var $rotateCB = $("#rotate-cb");
    var $textboxCB = $("#text-cb");
    var $timerCB = $("#timer-cb");
    var $numberCB = $("#number-cb");
    var $dbuttonsCB = $("#dbuttons-cb");
    var $lbTextPositions = $("#text-pos");
    var $lightboxEasing = $("#lb-easing");

    var $panel = $(".panel");
    var $infoPanel = $(".info-section");
    var $desc = $(".description");

    $submitButton.click(function() {
        var vals = $captionPositions.val().split("_");
        $container.undoChanges()
            .setCtrlType($ctrlTypes.val())
            .setButtons($buttonsCB.prop("checked"))
            .setBtnsMouseover($hoverButtonsCB.prop("checked"))
            .setCaption($captionCB.prop("checked"))
            .setCapMouseover($hoverCaptionCB.prop("checked"))
            .setCapEffect($captionEffects.val())
            .setCapPosition(vals[0], vals[1])
            .setEasing($scrollEasing.val())
            .updateChanges();

        if ($lightboxRB.filter(":checked").val() == "on") {
            $("a[rel='scroller']").wtLightBox({
                rotate: $rotateCB.prop("checked"),
                display_number: $numberCB.prop("checked"),
                display_dbuttons: $dbuttonsCB.prop("checked"),
                display_timer: $timerCB.prop("checked"),
                display_caption: $textboxCB.prop("checked"),
                easing: $lightboxEasing.val(),
                caption_position: $lbTextPositions.val()
            });
        }

        if ($buttonsCB.prop("checked") && !$hoverButtonsCB.prop("checked")) {
            $desc.width(680);
            $infoPanel.width(970);
            $panel.width(972);
        } else {
            $desc.width(610);
            $infoPanel.width(920);
            $panel.width(922);
        }
        $panel.css("marginLeft", -Math.floor($panel.outerWidth() / 8));
    });

    $resetButton.click(function() {
        init();
        $submitButton.trigger("click");
    });

    function init() {
        $ctrlTypes.val("scrollbar").attr("disabled", false);
        $buttonsCB.prop("checked", true).attr("disabled", false);
        $captionCB.prop("checked", true).attr("disabled", false);
        $hoverButtonsCB.prop("checked", false).attr("disabled", false);
        $hoverCaptionCB.prop("checked", true).attr("disabled", false);
        $captionEffects.val("slide").attr("disabled", false);
        $captionPositions.val("inside_bottom").attr("disabled", false);
        $scrollEasing.val("").attr("disabled", false);

        $("input#lightbox-yes").prop("checked", true).attr("disabled", false);
        $textboxCB.prop("checked", true).attr("disabled", false);
        $numberCB.prop("checked", true).attr("disabled", false);
        $dbuttonsCB.prop("checked", true).attr("disabled", false);
        $rotateCB.prop("checked", true).attr("disabled", false);
        $timerCB.prop("checked", true).attr("disabled", false);
        $lbTextPositions.val("outside").attr("disabled", false);
        $lightboxEasing.val("").attr("disabled", false);
    }

    $buttonsCB.change(
        function() {
            $hoverButtonsCB.attr("disabled", !$(this).prop("checked"));
        });

    $hoverCaptionCB.change(
        function() {
            $captionEffects.attr("disabled", !$(this).prop("checked"));
        });

    $captionPositions.change(
        function() {
            var vals = $(this).val().split("_");
            var disable = vals[0] == "outside";
            $hoverCaptionCB.attr("disabled", disable);
            $captionEffects.attr("disabled", disable || !$hoverCaptionCB.prop("checked"));
        }
    );

    $captionCB.change(
        function() {
            var vals = $captionPositions.val().split("_");
            var disable = !$(this).prop("checked");
            $captionEffects.attr("disabled", disable || vals[0] == "outside" || !$hoverCaptionCB.prop("checked"));
            $hoverCaptionCB.attr("disabled", disable || vals[0] == "outside");
            $captionPositions.attr("disabled", disable);
        });

    $lightboxRB.change(
        function() {
            var disable = $(this).filter(":checked").val() == "off";
            $textboxCB.attr("disabled", disable);
            $numberCB.attr("disabled", disable);
            $dbuttonsCB.attr("disabled", disable);
            $rotateCB.attr("disabled", disable);
            $timerCB.attr("disabled", disable || !$rotateCB.prop("checked"));
            $lbTextPositions.attr("disabled", disable || !$textboxCB.prop("checked"));
            $lightboxEasing.attr("disabled", disable);
        });

    $textboxCB.change(
        function() {
            $lbTextPositions.attr("disabled", !$(this).prop("checked"));
        });

    $rotateCB.change(
        function() {
            $timerCB.attr("disabled", !$(this).prop("checked"));
        }
    );

    init();
};

