<!DOCTYPE html>

<html><head>
        <style type="text/css">
body { margin: 0; padding: 0; }  
body > table { width: 100%!important; } 
body > table td { padding: 0 ;} 
body>table>tbody>tr>td>table,
body>table>tbody>tr>td>form,
body>table>tbody>tr>td>div { width: 100%; max-width: 1000px; margin:0 auto !important; }
.socialMediaTable { display: none; }
.header, .footer, .main-section {background-color:#fff;font-family:Arial, sans-serif;font-size:15px;line-height:1.6;color:#454545;cursor:default;min-width:320px;margin:0;padding:0;max-width:none;}
nav ul li{display:inline-block;}
.horizontalSubMenuItem { display: block}
label{display:inline-block;margin-bottom:5px;}
.clearfix{zoom:1;}
.clearfix:before,.clearfix:after{display:table;line-height:0;content:"";}
.text-right{text-align:right;}
.text-left{text-align:left;}
.text-center,.AlignCenter,.Align-Center{text-align:center;}
.float-left{float:left;}
.float-right{float:right;}
.container{margin-right:auto;margin-left:auto;width:1000px;}
.container:before,.container:after{display:table;content:" ";}
.btn,.content input[type=submit],.content input[type=button],#newsletterform input[type=submit],#newsletterform input[type=button],#apmlfilter input[type=submit],.comment .reply-to-comment,.widget.search #searchbutton{border:none;color:#fff;line-height:22px;text-decoration:none;text-shadow:none;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;-webkit-transition:.25s;-moz-transition:.25s;-o-transition:.25s;transition:.25s;-webkit-backface-visibility:hidden;background-color:#263f52;padding:3px 12px 4px!important;}
.btn:hover,.btn:focus,.btn-group:focus .btn.dropdown-toggle,.content input[type=submit]:hover,.content input[type=button]:hover,#newsletterform input[type=submit]:hover,#newsletterform input[type=button]:hover,#apmlfilter input[type=submit]:hover,.comment .reply-to-comment:hover,.widget.search #searchbutton:hover{color:#fff;outline:none;-webkit-transition:.25s;-moz-transition:.25s;-o-transition:.25s;transition:.25s;-webkit-backface-visibility:hidden;cursor:pointer;background-color:#435d72;}
.btn.disabled,.btn[disabled]{background-color:#bdc3c7;color:rgba(255,255,255,0.75);-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;opacity:0.7;filter:alpha(opacity=70);}
.btn.btn-small{font-size:13px;line-height:20px;padding:4px 7px;}
.btn.btn-large{font-size:18px!important;font-weight:700;line-height:20px;padding:4px 18px!important;}
textarea,input[type=text],input[type=password],input[type=datetime],input[type=datetime-local],input[type=date],input[type=month],input[type=time],input[type=week],input[type=number],input[type=email],input[type=url],input[type=search],input[type=tel],input[type=color],.uneditable-input{border:1px solid #bdc3c7;color:#333;font-size:16px;height:21px;text-indent:6px;-webkit-appearance:none;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;-webkit-backface-visibility:hidden;width:220px;margin-bottom:3px;padding:3px 2px;}
select{border:1px solid #bdc3c7;color:#333;font-size:16px;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;-webkit-backface-visibility:hidden;width:225px;margin-bottom:3px;padding:2px 5px;}
textarea{height:auto;line-height:24px;text-indent:0;margin:10px 0;padding:5px 2px;}
textarea:focus,input[type=text]:focus,input[type=password]:focus,input[type=datetime]:focus,input[type=datetime-local]:focus,input[type=date]:focus,input[type=month]:focus,input[type=time]:focus,input[type=week]:focus,input[type=number]:focus,input[type=email]:focus,input[type=url]:focus,input[type=search]:focus,input[type=tel]:focus,input[type=color]:focus,.uneditable-input:focus{-moz-outline:none;outline:none;border-color:#999;}
a{text-decoration:none;color:#007BA5;}
a:hover { text-decoration: underline; } .line-header { background-color: #27bac2; } .line-header .navbar .nav > li > a, .line-header .navbar .nav > li:hover > a {color: #8ae8ff; background: transparent; } .line-header .navbar .nav > li > .contact, .default-theme .line-header .navbar .nav > li:hover > .contact, .line-header .navbar .nav > li > .contact:hover {color: #FFF;background: url(http://www.aafa.org/themes/kfa-new-theme/img/icon_mail.png) no-repeat 100% 50%;padding-right: 32px;} 
.main-section{-moz-opacity:1;opacity:1;font-size:14px;line-height:1.4;}
.main-section > h1:first-child{font-size:26px;font-family:Cabin;font-weight:400;margin: -125px 0 110px 20px;}
.main-section .content h2{color:#416e98;font-size:21px;font-family:cabinsemibold;font-weight:400;margin-top:0;}
.main-section .content h3{font-size:16px;font-family:cabinbold;font-weight:400;}
.main-section .content a{text-decoration:underline;}
.content{width:75%;}
.content.wide{width:100%;}
.sidebar{width:22%;}
.header{position:relative;background-color:transparent!important; text-align: left;}
.banner-header{position:relative;width:100%;}
.banner-header .item-r{display:none;top:0;left:0;position:absolute;z-index:5;width:100%;min-width:100%;height:100%;min-height:100%;background-position:0 bottom;}
.banner-header .item-r.item-1{background:url(http://www.aafa.org/themes/kfa-new-theme/img/effect_1.png) repeat-x;}
.banner-header .item-r.item-2{background:url(http://www.aafa.org/themes/kfa-new-theme/img/effect_2.png) repeat-x;}
.banner-header .item-r.item-3{background:url(http://www.aafa.org/themes/kfa-new-theme/img/effect_3.png) repeat-x;}
.item-r{display:block!important;}
.navbar{height:35px;padding-top:5px;background:#27bac2;}
.navbar .nav{margin-right:0;padding-left:10px;}
.navbar ul li{display:inline-block;font-family:Cabin;}
.navbar .nav > li{position:relative;line-height:35px;-moz-border-radius:0!important;-webkit-border-radius:0!important;border-radius:0!important;}
.navbar .nav > li a{height:100%;line-height:35px;outline:none;}
.navbar .nav > li:hover > ul{opacity:1;top:100%;visibility:visible;z-index:200;-webkit-transform:scale(1,1);display:block\9;}
.navbar .nav > li > ul{padding-top:0;top:80%;z-index:100;}
.navbar .nav > li > ul li:hover ul{opacity:1;-webkit-transform:scale(1,1);visibility:visible;display:block\9;}
.navbar .nav > li > ul li ul{left:100%;}
.navbar .nav > li > a{color:#FFF;font-size:16px;display:block;text-shadow:none;padding:0 10px;}
.navbar .nav > li:hover > a,.navbar .nav > li > a:focus{background-color:#2e4a60;background:#FFF url(http://www.aafa.org/themes/kfa-new-theme/img/corner_NE_blue.png) no-repeat 100% 0;color:#1E86BC;}
.navbar .nav > li > a[class*=fui-]{font-size:24px;font-weight:400;}
.navbar .nav > li > a > [class*=fui-]{font-size:24px;position:relative;top:4px;margin:-4px 0 0;}
.navbar .nav > li > a > [class*=fui-] + *{margin-left:12px;}
.navbar .nav ul{left:0;list-style-type:none;margin-left:0;opacity:0;position:absolute;top:0;width:234px;z-index:-100;visibility:hidden;}
.navbar .nav ul ul{left:95%;padding-left:5px;}
.navbar .nav ul li{position:relative;display:block;background-color:#00649C;padding:0 3px 3px;}
.navbar .nav ul li:first-child{padding-top:3px;}
.navbar .nav ul li:last-child{padding-bottom:3px;}
.navbar .nav ul li.active + li > a{padding-left:9px;padding-right:9px;}
.navbar .nav ul a{border-radius:2px;color:#fff;display:block;font-size:14px;line-height:16px;text-decoration:none;padding:3px 9px;}
.social{position:relative;text-align:center;top:0;}
.social ul{height:30px;margin:0;padding:5px 0;}
.social ul li{display:inline-block;list-style:none;height:30px;margin:0 2px;}
.social ul li a{display:block;width:30px;height:30px;background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/social.png);background-repeat:no-repeat;background-position:0 0;outline:none;-moz-transition:all ease .3s;-o-transition:all ease .3s;-webkit-transition:all ease .3s;transition:all ease .3s;}
.social ul li a:hover{opacity:0.6;}
.social ul li.tw a{background:url(http://www.aafa.org/themes/kfa-new-theme/img/sm_tw.png);}
.social ul li.fb a{background:url(http://www.aafa.org/themes/kfa-new-theme/img/sm_fb.png);}
.social ul li.gp a{background:url(http://www.aafa.org/themes/kfa-new-theme/img/sm_gp.png);}
.social ul li.rs a{background:url(http://www.aafa.org/themes/kfa-new-theme/img/sm_rs.png);}
.social ul li.yt a{background:url(http://www.aafa.org/themes/kfa-new-theme/img/sm_yt.png);}
.social ul li.sh a{background:url(http://www.aafa.org/themes/kfa-new-theme/img/sm_em.png);}
.header .search{bottom:12px;right:15px;position:absolute;text-align:right;color:#007ba5;font-size:14px;}
.header .search .btn-toggle-search{float:right;width:20px;height:15px;border:none;background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/BtnSearch.png);background-repeat:no-repeat;background-position:0 0;font-size:0!important;cursor:pointer;position:relative;top:6px;margin:0 0 0 4px;}
.header .search .btn-toggle-search:hover{background-position:0 bottom;}
.header .search input[type=text]{position:relative;-moz-border-radius:150px;-webkit-border-radius:150px;font-size:15px;font-family:Calibri;background-color:#19364d;background:#fff url(http://www.aafa.org/themes/kfa-new-theme/img/icon_srch.png) no-repeat 98% 50%;color:#999;border-radius:5px;border:1px solid #1E86BC;width: 280px;height: 28px;padding: 0 7px;-moz-opacity: 1;opacity: 1;}
.title-blog{height:135px;position:relative;top:0;-moz-opacity:1;opacity:1;z-index:6;background:#e6fcff;padding:15px 0;}
.title-blog div{margin:0 0 4px;height:125px;}
.title-blog h1{margin:0 0 4px;}
.title-blog h1 a{color:#454545!important;font-family:cabinitalic;font-size:24px;font-weight:400;background:url(http://www.aafa.org/themes/kfa-new-theme/img/aafa-new.png) no-repeat 20px 10px;text-indent:-999em;display:block;height:125px;width:383px;}

.kfalogo a {color:#454545!important;font-family:cabinitalic;font-size:24px;font-weight:400;background: url(http://www.kidswithfoodallergies.org/themes/kfa-new-theme/img/kfa-new.png) no-repeat 20px 10px; text-indent:-999em; float:right; display:block;height:125px;width:383px;position: absolute;
    left: 500px;
    top: 12px;
            }
.title-blog h2{font-size:14px;font-weight:400;font-family:cabinitalic;}
nav.nav-top{background-color:#27bac2; height:40px;text-align:center;clear:both;position:relative;margin-bottom:144px;font-family:'Trebuchet MS', Arial, sans-serif;}
nav.nav-top ul{padding-top:4px;}
nav.nav-top ul > li > a{color:#FFF;display:block;margin-right:10px;line-height:1;height:16px;position:relative;text-decoration:none;padding:8px 6px 12px 16px;}
nav.nav-top ul > li:hover > a,nav.nav-top ul > li.active > a{background-color:#FFF;color:#1490ba;}
nav.nav-top ul.nav-3 > li,nav.nav-top ul.nav-3 > li:hover{border-bottom:none;}
nav.nav-top ul.nav-3 > li.active > a,nav.nav-top ul.nav-3 > li > a{background-color:transparent;color:#FFF;white-space:normal;height:auto;}
nav.nav-top ul > li > a:after{content:'';position:absolute;left:100%;top:0;height:100%;width:10px;background:url(http://www.aafa.org/themes/kfa-new-theme/img/nav_top_corner.png) no-repeat 0 0;display:none;}
ul.nav.nav-2{position:absolute;left:0;top:100%;width:100%;background:url(http://www.aafa.org/themes/kfa-new-theme/img/sec_nav_bg.gif) no-repeat 50% 39px;height:36px;padding-top:78px;}
ul.nav.nav-2 > li:hover > a,ul.nav.nav-2 > li.active > a{color:#23aedc;}
ul.nav.nav-3 { position: absolute; top: 100%; left: 0; background-color: #1990ba; z-index: 3; text-align: left; display: none; min-width:100%; padding:4px 0; }
ul.nav.nav-3 li{display:block;}
ul.nav.nav-3 li a{ font-size:14px; padding:4px 16px; margin:0;}
ul.nav.nav-3 li a:after{display:none !important;}
ul.nav.nav-3 li:hover a{color:#8ae8ff; background-color:transparent;}
ul.nav.nav-2 > li:hover ul.nav.nav-3{display:block;}

.title-bar{background:#62b30c url(http://www.aafa.org/themes/kfa-new-theme/img/corner_NE_white.png) no-repeat 100% 0;position:relative;color:#FFF;font-family:Cabin, sans-serif;text-transform:uppercase;line-height:40px;font-size:18px;padding:0 15px;}
.top .title-bar{background:#f58220 url(http://www.aafa.org/themes/kfa-new-theme/img/corner_NE_white.png) no-repeat 100% 0;}
.title-bar:after{display:block;content:'';background-repeat:no-repeat;background-position:50% 50%;width:28px;height:26px;position:absolute;right:15px;top:8px;}
.title-bar.questions:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_qstn.png);}
.title-bar.web:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_comp.png);}
.title-bar.help:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_help.png);}
.title-bar.blog:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_blog.png);}
.title-bar.stars:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_star.png);}
.title-bar.support:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_sppt.png);}
.title-bar.recipes:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_rcps.png);}
.title-bar.search:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_srchW.png);}
#page{background:#FFF;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;}
#page h1{margin-bottom:15px;font-size:26px;}
.navbar .nav > li > ul:before{border-color:transparent transparent #435d72;}
.navbar .nav ul a:hover{background-color:#00649C;color:#c2ebfc;}
a:hover,a:focus{color:#33B0DC;}
.btn-blue{background:#27bac2 url(http://www.aafa.org/themes/kfa-new-theme/img/corner_NE_ltblue.png) no-repeat 100% 0;-moz-transition:background .3s ease 0;-o-transition:background .3s ease 0;-webkit-transition:background .3s ease 0;transition:background .3s ease 0;}
.btn-green{background:#62B30C url(http://www.aafa.org/themes/kfa-new-theme/img/corner_NE_white.png) no-repeat 100% 0;-moz-transition:background .3s ease 0;-o-transition:background .3s ease 0;-webkit-transition:background .3s ease 0;transition:background .3s ease 0;}
.btn-blue:hover{background-color:#53aac8;}
.btn-green:hover{background-color:#8dcc6c;}
.btn-blue a:hover,.btn-green a:hover{text-decoration:none;}
.header .btn-blue,.header .btn-green{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/corner_NE_ltblue.png);margin:0 15px 0 -5px;}
.btn-blue,.btn-green{font-size:16px;height:40px;line-height:40px;text-transform:uppercase;font-weight:700;}
.btn-blue a,.btn-green a{color:#FFF;height:40px;display:inline-block;line-height:40px;background:url(http://www.aafa.org/themes/kfa-new-theme/img/corner_SW_white.png) no-repeat 0 100%;text-decoration:none;background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/corner_SW_ltblue.png);padding:0 30px;}
.nav-top > ul > li{color:#c7f1ff;list-style-type:none;margin:0 0 5px 2px;}
.nav-top ul > .active{border-bottom:5px solid #fff;margin-bottom:0;}
.nav-top ul > .active > a{color:#fff;}
.nav-top a{color:#c7f1ff;display:block;float:left;text-decoration:none;white-space:nowrap;padding:5px 10px;}
.nav-top .nav{background:#49c1e9;left:0;position:absolute;top:100%;width:240px;}
.nav-top .nav a{float:none;}
.nav-top .nav-3{left:100%;top:0;}
.nav-top .nav li{float:none;margin:0;padding:0;}
h4,h5,h6,ul,ol{margin-top:0;margin-bottom:10px;}
nav ul,.title-blog h1,.title-blog h2{margin:0;padding:0;}
nav ul li.show-mob,.social ul li span,.header .search input[type=button],.nav-toggle{display:none;}
.clearfix:after,.container:after{clear:both;}
nav.nav-top ul > li:hover > a:after,nav.nav-top ul > li.active > a:after,li.active > ul.nav.nav-2{display:block;}
ul.nav.nav-2 > li,header .container{position:relative;}
#signInHeaderLeftColumn { display: none; }
div#horizontalNavMenuSecondaryWrapper { width:100%; }
#menuWhitespaceTd .horizontalMenuWhitespace { display:none; }
table.horizontalMenu {
margin:auto;
width:300px;
}
 
</style>
 </head>
    <body>
        <div class="header">
<div class="line-header">
<div class="container">
<nav class="nav-header navbar">

</nav>
</div>
</div>

<div class="banner-header">
<div class="container title-blog">


<h1><a href="http://www.aafa.org/">Asthma and Allergy Foundation of America</a></h1>
<span class="kfalogo"><a href="http://www.kidswithfoodallergies.org/">Kids with Food Allergies/></a></span>
     
</div>

<div class="container">
</div>
</div>
</div>

<div class="container main-section clearfix">
<h1 style="text-align: left">Get Involved</h1>
</div>

<div class="container">
 
        </div>
<style type="text/css">.feature{float:left;padding-left:10px;margin-bottom:30px;font-size:13px;line-height:1.4;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;}
.feature .inner{border:1px solid #52A8D9;border-top:0;border-bottom-left-radius:10px;padding:10px 15px;}
.feature p{line-height:1.3;margin:0 0 .3em;}
.feature a{font-weight:700;}
.feature p a{text-transform:uppercase;}
.feature h3{font-size:16px;margin:0 0 .3em;}
.feature h5{font-size:12px;margin:0 0 .3em;}
.footer{color:#666;position:relative;max-width:1000px;margin:20px auto 0;}
.footer .title-bar:after{background-image:url(http://www.aafa.org/themes/kfa-new-theme/img/icon_link.png);}
.footer .title-bar .float-left{position:absolute;top:0;left:15px;}
.footer .footer-widgets{font-size:14px;padding:0;}
.footer .footer-widgets .float-left img{margin:0 0 24px 13px;} 
 .footer .footer-widgets .float-right img{margin:0 13px 24px 0;}
.footer .footer-widgets .widgetselector{padding:3px!important;}
.footer .footer-widgets input[type=button][value=Add]{height:33px!important;border:2px solid #666;padding:0 15px!important;}
.footer .footer-widgets .widget{width:31%;margin-right:3%;float:left;background:none;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;border:none;margin-bottom:20px;padding:0;}
.footer .footer-widgets .widget .widget-title{font-size:20px;font-weight:400;font-family:Domine;line-height:50px;padding-bottom:5px;border-bottom-style:solid;margin-bottom:15px;margin-top:0;border-bottom-color:#3999f2;color:#3999f2;border-width:3px;}
.footer .footer-widgets .widget #moveWidgetTo{width:160px;padding:3px;}
.footer .footer-widgets .widget #moveWidgetToBtn{border:1px solid #CCC;margin-left:1px;cursor:pointer;padding:4px;}
.footer .footer-widgets .widget .widget-body{color:#999;font-size:14px;}
.footer .footer-widgets .widget .widget-body a{color:#00649c;font-size:14px;}
.footer .footer-widgets .widget .widget-body ul li{border-bottom-color:#555!important;}
.footer .footer-widgets h2{font-size:16px;font-weight:700;line-height:1.1; margin: 10px 0;}
.footer .scrollup{background-color:#19364d;}
.footer .scrollup:hover{background-color:#2e4a60;}
.footer .tagline { font-family: 'cabinbold'; color: #27bac2; font-size: 24px}
.footer .footer-line{background: #27bac2 url(http://www.aafa.org/themes/kfa-new-theme/img/aafa_footer_top.png) no-repeat 0 0; background-size:contain;font-size:13px;color:#FFF;margin-top:20px;padding:50px 0 20px;}
.footer .footer-line ul{padding:0;}
.footer .footer-line ul li{list-style:none;display:inline;font-weight:700;margin:0 .5em;}
.footer .footer-line a{color:#FFF!important;}
.footer .footer-line .separator{top:-2px;background-color:#777!important;margin:0 8px;}
.footer .footer-links{border:1px solid #62b30c;border-top:0;border-bottom-left-radius:10px;margin-bottom:30px;}
.footer .footer-links ul{list-style:none;width:25%;float:left;margin:15px 0;padding:0;}
.footer .footer-links ul li{margin:0 0 5px 15px;padding:0; list-style:none;text-align:left;}
.footer .footer-links a{text-decoration:underline;color:#007BA5;}
.footer .footer-links a:hover{color:#3999f2;text-decoration:underline;}
.footer .footer-widgets .widget .widget-body a:hover{color:#3999f2;}
.footer .footer-widgets .widget.last-child,.footer p{margin:0;}
</style>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(function() {
  var tracker = _gat._getTracker('UA-216208-1');
  tracker._trackPageview();
});
</script>
<div class="footer">
<div class="container">
                   
                <div class="footer-widgets container text-center">
                 
                    
                   <div class="tagline">for life without limits&#8482;</div>
                    <p class="text-center" style="line-height:1.4"><strong>Asthma and Allergy Foundation of America</strong><br />
                        8201 Corporate Drive Suite 1000 Landover, MD 20785<br />
                        Phone: 1-800-7-ASTHMA (1.800.727.8462) </p>                       
                </div>
                <div class="footer-line">
                    <div class="container text-center">
            
                        <p>Copyright &copy; 1995-2015. Asthma and Allergy Foundation of America. <br> All rights reserved.</p>
                    </div>
                </div></div> 
    </body></html>
