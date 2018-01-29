<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>
        <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('css/'.$css.'.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ url('js/lib/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('js/lib/vendor.min.js') }}" type="text/javascript"></script>
        <script src="{{url('http://slinex.in.ua/public/js/mask.js')}}" type="text/javascript"></script>
    </head>
    <body>
        <div class="load-pop-up hidden"></div>
        <div class="pop-up hidden"></div>
        @include('header')
        @if (in_array('breadcrumbs',$visible_block))
            @include('breadcrumbs')
        @endif
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            @if (in_array('side_menu',$visible_block))
                @include('side_menu')
            @endif
            @include($content)
        </div>
        @include('footer')
    <script type="text/javascript">
        $(".snav-part_toggle").click(function(){
            $(this).parent().next(".snav-part_info").toggle("blind",800)
        }),
        $(".footer-part_btn").click(function(){
            $(this).parent().parent().find(".footer-part_info").toggle("blind",800)
        }),
        $(".menu-part_hidden").click(function(){
            $(this).parent().find(".menu-wrap").toggle("blind",800)
        }),
        $(".menu-link_btn").click(function(){
            $(this).parent().find(".menu-link_info").toggle("blind",800)
        }),
        $(".cart-btn").click(function(){
            $(this).parent().find(".cart-info").toggle("fold",400)
        }),
        $(".cart-close").click(function(){
            $(this).parent().parent().toggle("fold",400);
        }),
        $(".cart-panel_add").click(function(){
            $('.pop-up').show();
            $(this).parent().parent().toggle("fold",400);
            $(".order").toggle("clip",1e3)
        }),
        $(".order-close").click(function(){
            $(this).parent().parent().toggle("fold",400);
            $('.pop-up').hide();
        }),
        $(".order-form_btn").click(function(){
            $('.pop-up').show();
            $(this).parent().parent().toggle("fold",400);
            $(".order-messege").toggle("fold",400)
        }),
        $(".messege-content_btn").click(function(){
            $(this).parent().parent().toggle("fold",400)
        }),
        $(".reg").click(function(){
            $('.pop-up').show();
            $(".register").show("fold",400)
        }),
        $(".register-close").click(function(){
            $(this).parent().parent().hide("fold",400);
            $('.pop-up').hide();
        }),
        $(".auth").click(function(){
            $('.pop-up').show();
            $(".authorization").show("fold",400)
        }),
        $(".authorization-close").click(function(){
            $('.pop-up').hide();
            $(this).parent().parent().hide("fold",400)
        });
        jQuery.fn.extend({
            addLoader:function(){
                $(this).append('<div class="load-pop-up"></div>');
            },
            removeLoader:function(){
               $(".load-pop-up").remove();
            },
            addLense: function(settings){
                $(this).mouseenter(function (event) {
                    if($('.lens-cursor').length===0) {
                        $(this).parent().append('<canvas width="'+settings.width+'" height="'+settings.height+'" class="lens-dialog"></canvas>');
                        $(this).parent().append('<div class="img-popup"><div  class="lens-cursor"></div></div>');
                        var $img = this;
                        var $lens_cursor = $('.lens-cursor');
                        var imgLeft = $(this).offset().left;
                        var imgTop = $(this).offset().top;
                        var imgwidth = $(this).width();
                        var imgHeight = $(this).height();
                        $lens_cursor.width(imgwidth/3);
                        $lens_cursor.height(imgHeight/3);
                        var curW =  $lens_cursor.width();
                        var curH = $lens_cursor.height();
                        if(imgLeft+curW/2<event.pageX  && event.pageX<imgLeft+imgwidth-curW/2){
                            $lens_cursor.offset({left:event.pageX-curW/2});
                        }else if(imgLeft+curW/2>event.pageX){
                            $lens_cursor.offset({left:imgLeft});
                        }else if(event.pageX>imgLeft+imgwidth-curW/2){
                            $lens_cursor.offset({left:imgLeft+imgwidth-curW});
                        }
                        if(imgTop+curH/2<event.pageY  && event.pageY<imgTop+imgHeight-curH/2){
                            $lens_cursor.offset({top:event.pageY-curH/2});
                        }else if(imgTop+curW/2>event.pageY){
                            $lens_cursor.offset({top:imgTop});
                        }else if(event.pageY>imgTop+imgHeight-curH/2){
                            $lens_cursor.offset({top:imgTop+imgHeight-curH});
                        }
                        var img_natural_width = $img.naturalWidth;
                        var img_natural_height = $img.naturalHeight;

                        var kW = img_natural_width/imgwidth;
                        var kH = img_natural_height/imgHeight;
                        var canvas = document.getElementsByClassName("lens-dialog")[0];
                        var canvasWidth = $(canvas).width();
                        var canvasHeight = $(canvas).height();
                        var ctx = canvas.getContext("2d");
                        ctx.webkitImageSmoothingEnabled = true;
                        ctx.mozImageSmoothingEnabled = true;
                        ctx.imageSmoothingEnabled = true;
                        $('.lens-dialog').hide().slideDown(500);
                        $lens_cursor.on("wheel", function(ev){
                            ev.preventDefault();
                            if(ev.originalEvent.deltaY>0){
                                if(curW+10<=imgwidth && curH+10<=imgHeight){
                                    curW = curW+10;
                                    curH = curH+10;
                                }else if(curW+10>=imgwidth){
                                    curH = curH+imgwidth-curW;
                                    curW = imgwidth;
                                }else if(curH+10>=imgHeight){
                                    curW = curW + imgHeight-curH;
                                    curH = imgHeight;
                                }
                            }else if(ev.originalEvent.deltaY<0){
                                curW = curW-10;
                                curH = curH-10;
                            }
                            $lens_cursor.width(curW);
                            $lens_cursor.height(curH);
                            $lens_cursor.mousemove();
                        });

                    }
                    $lens_cursor.mousemove(function (event) {
                        if(event.pageX-curW/2>imgLeft  && event.pageX+curW/2<imgLeft+imgwidth){
                            $(this).offset({left:event.pageX-curW/2});
                        }
                        if(event.pageY-curH/2>imgTop && event.pageY+curH/2<imgTop+imgHeight ){
                            $(this).offset({top:event.pageY-curH/2});
                        }

                        ctx.clearRect(0, 0, canvasWidth, canvasHeight);
                        ctx.drawImage($img, ($(this).offset().left-imgLeft)*kW, ($(this).offset().top-imgTop)*kH, curW*kW, curH*kH, 0, 0, canvasWidth, canvasHeight);


                        /*var weights =  [0, -1, 0,  -1, 5, -1,  0, -1, 0],
                            katet = Math.round(Math.sqrt(weights.length)),
                            half = (katet * 0.5) |0,
                            dstData = ctx.createImageData(canvasWidth, canvasHeight),
                            dstBuff = dstData.data,
                            mix = 0.5,
                            srcBuff = ctx.getImageData(0, 0, canvasWidth, canvasHeight).data,
                            y = canvasHeight;


                        while(y--) {

                            x = canvasWidth;

                            while(x--) {

                                var sy = y,
                                    sx = x,
                                    dstOff = (y * canvasWidth + x) * 4,
                                    r = 0, g = 0, b = 0, a = 0;

                                for (var cy = 0; cy < katet; cy++) {
                                    for (var cx = 0; cx < katet; cx++) {

                                        var scy = sy + cy - half;
                                        var scx = sx + cx - half;

                                        if (scy >= 0 && scy < canvasHeight && scx >= 0 && scx < canvasWidth) {

                                            var srcOff = (scy * canvasWidth + scx) * 4;
                                            var wt = weights[cy * katet + cx];

                                            r += srcBuff[srcOff] * wt;
                                            g += srcBuff[srcOff + 1] * wt;
                                            b += srcBuff[srcOff + 2] * wt;
                                            a += srcBuff[srcOff + 3] * wt;
                                        }
                                    }
                                }

                                dstBuff[dstOff] = r * mix + srcBuff[dstOff] * (1 - mix);
                                dstBuff[dstOff + 1] = g * mix + srcBuff[dstOff + 1] * (1 - mix);
                                dstBuff[dstOff + 2] = b * mix + srcBuff[dstOff + 2] * (1 - mix);
                                dstBuff[dstOff + 3] = srcBuff[dstOff + 3];
                            }
                        }

                        ctx.putImageData(dstData, 0, 0);*/

                    }).mouseleave(function() {
                        $('.lens-cursor').remove();
                        $('.lens-dialog').slideUp(500).remove();
                    });
                }).mouseleave(function(event) {
                    if(event.pageX<$(this).offset().left  || event.pageX>$(this).offset().left+$(this).width() || event.pageY<$(this).offset().top || event.pageY>$(this).offset().top+$(this).height()){
                        $('.lens-cursor').remove();
                        $('.lens-dialog').slideUp(500).remove();
                    }
                });
            }
        });
        $('.item-img_one>img').addLense({width:$('.item-img_one>img').width(),height:$('.item-img_one>img').height()});
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function registerUser(form,ev){
            ev.preventDefault();
            var $container = $(".register");
            $container.addLoader();
            var $form = $(form);
            $.ajax({
                type: 'get',
                url: '/register',
                data: $form.serialize(),
                success: function(result){
                    $container.removeLoader();
                    if(result.success){
                        $container.hide("fold",400);
                        $('.pop-up').hide();

                    }else{
                        $.each(result.data, function(i, item) {
                            $form.find('input[name="'+i+'"]').next('span').html(item.join('<br>')).fadeOut(10000,function () {
                                $(this).html('').show();
                            });
                        })
                    }
                }
            });
        }
        function loginUser(form,ev){
            ev.preventDefault();
            var $container = $(".authorization");
            $container.addLoader();
            var $form = $(form);
            $.ajax({
                type: 'get',
                url: '/login',
                data: $form.serialize(),
                success: function(result){
                    $container.removeLoader();
                    if(result.success){
                        $('.user .user-btn').toggleClass('hidden');
                        $container.hide("fold",400);
                        $('.pop-up').hide();

                    }else{
                        $.each(result.data, function(i, item) {
                            $form.find('input[name="'+i+'"]').next('span').html(item.join('<br>')).fadeOut(10000,function () {
                                $(this).html('').show();
                            })
                        })
                    }
                }
            });
        }
        $('.user-btn.out').click(function(){
            $('body').addLoader();
            $.ajax({
                type: 'get',
                url: '/logout',
                success: function(result){
                    $('body').removeLoader();
                   if(result){
                       $('.user .user-btn').toggleClass('hidden');
                   }else{
                       alert('Извините произошла ошибка!!!');
                   }
                }
            });
        });
        $('input[type="telephones"]').mask("+38(000)000-00-00",{translation:{0:{pattern:/[0-9]/}},placeholder:"+38(___)___-__-__"})
    </script>
    </body>
</html>
