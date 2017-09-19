<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>郝颂歌的个人博客</title>
    <meta name="keywords" content="郝颂歌的个人博客" />
    <meta name="description" content="郝颂歌的个人博客" />
    <link href="/ode_blog/Public/css/base.css" rel="stylesheet">
    <link href="/ode_blog/Public/css/index.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/ode_blog/Public/js/modernizr.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/ode_blog/Public/js/jquery.js"></script>
</head>
<body>
<div id="wrapper">
    <header>
        <div class="headtop"></div>
        <div class="contenttop">
            <div class="logo f_l">郝颂歌的个人博客</div>
            <div class="search f_r">
                <!--<form action="/e/search/index.php" method="post" name="searchform" id="searchform">-->
                    <!--<input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">-->
                    <!--<input name="show" value="title" type="hidden">-->
                    <!--<input name="tempid" value="1" type="hidden">-->
                    <!--<input name="tbname" value="news" type="hidden">-->
                    <!--<input name="Submit" class="input_submit" value="搜索" type="submit">-->
                <!--</form>-->
            </div>
            <div class="blank"></div>
            <nav>
                <div  class="navigation">
                    <ul class="menu">
                        <?php if(is_array($category)): foreach($category as $key=>$v): ?><li>
                                <?php if(($v['cat_view'] == '0') ): ?><a><?php echo ($v['cat_name']); ?></a>
                                <?php else: ?>
                                    <a href="/ode_blog/index.php/Home/<?php echo ($v['cat_view']); ?>/index"><?php echo ($v['cat_name']); ?></a><?php endif; ?>
                                <?php if(($v['has_children'] == 1) ): ?><ul>
                                        <?php if(is_array($v["cat_children"])): foreach($v["cat_children"] as $key=>$v1): ?><li><a href="/ode_blog/index.php/Home/<?php echo ($v1['cat_view']); ?>/index"><?php echo ($v1['cat_name']); ?></a></li><?php endforeach; endif; ?>
                                    </ul><?php endif; ?>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </nav>
            <SCRIPT type=text/javascript>
                // Navigation Menu
                $(function() {
                    $(".menu ul").css({display: "none"}); // Opera Fix
                    $(".menu li").hover(function(){
                        $(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown("normal");
                    },function(){
                        $(this).find('ul:first').css({visibility: "hidden"});
                    });
                });
            </SCRIPT>
        </div>
    </header>
    <div class="jztop"></div>
    <div class="container">
        <div class="bloglist f_l">
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><h3><a href="/ode_blog/index.php/Home/article/detail/article_id/<?php echo ($v['article_id']); ?>">【<?php echo ($v['atype_name']); ?>】<?php echo ($v['article_title']); ?></a></h3>
                <figure><img src="/ode_blog/Public/images/img_1.jpg" alt="【<?php echo ($v['atype_name']); ?>】<?php echo ($v['article_title']); ?>"></figure>
                <ul>
                    <p> <?php echo ($v['article_summary']); ?></p>
                    <a title="<?php echo ($v['article_title']); ?>" href="/ode_blog/index.php/Home/article/detail/article_id/<?php echo ($v['article_id']); ?>" class="readmore">阅读全文&gt;&gt;</a>
                </ul>
                <p class="dateview"><span><?php echo ($v['article_time']); ?></span><span></span><span>个人博客：[<a href="/ode_blog/index.php/Home/<?php echo ($v['controller']); ?>/index"><?php echo ($v['atype_name']); ?></a>]</span></p><?php endforeach; endif; ?>
        </div>

        <div class="r_box f_r">
            <div class="tit01">
                <h3 class="tit">关注我</h3>
                <div class="gzwm">
                    <ul>
                        <li><a class="email" href="#" target="_blank">我的电话</a></li>
                        <li><a class="qq" href="#mailto:admin@admin.com" target="_blank">我的邮箱</a></li>
                        <li><a class="tel" href="#" target="_blank">我的QQ</a></li>
                        <li><a class="prize" href="#">个人奖项</a></li>
                    </ul>
                </div>
            </div>
            <!--tit01 end-->

            <div class="tuwen">
                <h3 class="tit">图文推荐</h3>
                <ul>
                    <!--<li><a href="/"><img src="/ode_blog/Public/images/01.jpg"><b>住在手机里的朋友</b></a>-->
                        <!--<p><span class="tulanmu"><a href="/">手机配件</a></span><span class="tutime">2015-02-15</span></p>-->
                    <!--</li>-->
                    <?php if(is_array($recommend)): foreach($recommend as $key=>$v): ?><li><a href="/ode_blog/index.php/Home/article/detail/article_id/<?php echo ($v['article_id']); ?>"><img src="<?php echo ($v['article_img']); ?>" style="height:66px;"><b><?php echo ($v['article_title']); ?></b></a>
                            <p><span class="tulanmu"><a href="/"><?php echo ($v['atype_name']); ?></a></span><span class="tutime"><?php echo ($v['article_time']); ?></span></p>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="ph">
                <h3 class="tit">点击排行</h3>
                <ul class="rank">
                    <!--<li><a href="/jstt/bj/2017-07-13/784.html" title="【心路历程】请不要在设计这条路上徘徊啦" target="_blank">【心路历程】请不要在设计这条路上徘徊啦</a></li>-->
                    <?php if(is_array($clicks)): foreach($clicks as $key=>$v): ?><li><a href="/ode_blog/index.php/Home/article/detail/article_id/<?php echo ($v['article_id']); ?>" title="【<?php echo ($v['atype_name']); ?>】<?php echo ($v['article_title']); ?>">【<?php echo ($v['atype_name']); ?>】<?php echo ($v['article_title']); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="ad"> <img src="/ode_blog/Public/images/03.jpg"> </div>
        </div>
    </div>
    <!-- container代码 结束 -->

    <footer>
        <div class="footer">
            <div class="f_l">
                <p>All Rights Reserved 版权所有：<a href="/ode_blog/index.php/Home/index/index">郝颂歌个人博客</a> </p>
            </div>
            <div class="f_r textr">
                <p>Design by DanceSmile</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>