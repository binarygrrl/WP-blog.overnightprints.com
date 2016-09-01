if(window.top.jQuery) {
    var msg = "You just need to set front page from WordPress dashboard > Settings > Reading > Front page displays.";
    var title = "Home page missing";
    if (window.top.jQuery('#customize-preview > iframe').contents().find('iframe#px-iframe').length == 0) {
        if(window.top.jQuery('#customize-preview > iframe').length >1){
            window.top.jQuery('#customize-preview > iframe').first().remove();
        }
        if(localizeVals.vcURL == 'notSet'){
            out();
            window.top.pixflow_messageBox(title,'caution',msg,'GOT IT',function(){
                window.top.location = window.top.location.pathname.replace('customize.php','options-reading.php');
                window.top.pixflow_closeMessageBox();
            },undefined,undefined,function(){
                window.top.location = window.top.location.pathname.replace('customize.php','options-reading.php');
            });
        }else {
            document.write("<iframe id='px-iframe' style='position:fixed;width:100%; height:100%; border:none' src='" + localizeVals.vcURL + "'></iframe>");
        }
    }else{
        if(localizeVals.vcURL == 'notSet'){
            out();
            window.top.pixflow_messageBox(title,'caution',msg,'GOT IT',function(){
                window.top.location = window.top.location.pathname.replace('customize.php','options-reading.php');
                window.top.pixflow_closeMessageBox();
            },undefined,undefined,function(){
                window.top.location = window.top.location.pathname.replace('customize.php','options-reading.php');
            });
        }else {
            window.top.jQuery('#customize-preview > iframe').contents().find('iframe#px-iframe').attr('src', localizeVals.vcURL);
        }
    }
}else{
    window.location.reload();
}
function out(){
    var mainLoader = window.top.$('.main-loader'),
        loaderLoading = mainLoader.find('.loading'),
        loaderSVG = loaderLoading.find('.circle svg'),
        loaderIcon = loaderLoading.find('.circle .icon'),
        loaderText = mainLoader.find('.text'),
        $rotatingText = loaderLoading.find('.rotating-text'),
        loadingText = loaderLoading.find('.loading-text');
    $rotatingText.stop().animate({right:100},{
        duration:2000,
        step:function(now,tween){
            window.top.$(this).html(Math.floor(now)+"%");
        },
        complete:function() {
            try {
                TweenMax.to(loadingText, 0.5, {
                    'opacity': 0, onComplete: function () { //loading text out
                        loadingText.text(customizerValues.allDone);
                    }
                });
                TweenMax.to(loadingText, 0.5, {'opacity': 1, delay: .6}); //all done in
                TweenMax.to(loaderLoading, 0.5, {'width': '75px', delay: .6});
                TweenMax.to(loaderSVG, 0.5, {'opacity': 0, delay: .6}); //svg out
                TweenMax.to(loaderIcon, 0.5, {
                    'opacity': 1, delay: .8, onComplete: function () { //width reduced
                        try {
                            TweenMax.to(loaderText, 0.5, {'opacity': 0, delay: 1.5});
                            TweenMax.to(loaderLoading, 0.5, {'opacity': 0, delay: 1.5});
                            TweenMax.to(mainLoader, 1, {
                                'opacity': '0', delay: 2, onComplete: function () {
                                    mainLoader.css('display', 'none');
                                }
                            });
                        } catch (e) {
                            mainLoader.css('display', 'none');
                        }
                    }
                });
            } catch (e) {
                mainLoader.css('display', 'none');
            }
        }
    })
}