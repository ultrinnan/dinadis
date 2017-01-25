var preloader = {
    'showLogo' : function(){
        $('.preloader-logo').animate({
            'opacity' : 1
        },500);
    },
    'moveLogo' : function(){
        $('a.logo.preloader-logo').css('top', 35);
        setTimeout(function(){
            $('a.logo.preloader-logo').hide();
        },2500);
    },
    'showProgress' : function(percent){
        // percent
        var x = Math.round(percent);
        var currentNumber = $('.loadercouner .num').text();
        $('.loaderline').addClass('load');
        $({numberValue: currentNumber}).animate({numberValue: percent}, {
            duration: 4000,
            easing: 'linear',
            step: function() {
                $('.loadercouner .num').text(Math.ceil(this.numberValue));
            }
        });
    },
    'hideBG' : function(){
        $('.preloader-main').fadeOut(800);
    },
    'init' : function(){
        // start script
        var self = this;
        self.showLogo();
        self.showProgress(100);
        setTimeout(function(){
            self.moveLogo();
        },3000);
        setTimeout(function(){
            self.hideBG();
        },4500);
        setTimeout(function(){
            $('body').removeClass('preload');
        },5500);
    }
};
if(window.location.pathname==="/" || window.location.pathname==="/uk/" || window.location.pathname==="/en/"){
    preloader.init();
}

