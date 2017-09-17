<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>郝颂歌的个人博客</title>
<meta name="keywords" content="郝颂歌的个人博客" />
<meta name="description" content="郝颂歌的个人博客" />
<link href="/ode_blog/Public/css/base.css" rel="stylesheet">
<link href="/ode_blog/Public/css/main.css" rel="stylesheet">
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
      <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
        <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
        <input name="show" value="title" type="hidden">
        <input name="tempid" value="1" type="hidden">
        <input name="tbname" value="news" type="hidden">
        <input name="Submit" class="input_submit" value="搜索" type="submit">
      </form>
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
<div class="container">
  <div class="con_content">
    <div class="about_box">
      <h2 class="nh1"><span>您现在的位置是：<a href="/" target="_blank">网站首页</a>>><a href="#" target="_blank">朋友圈</a></span><b>朋友圈</b></h2>
      <div class="dtxw box">
        <?php if(is_array($data["list"])): foreach($data["list"] as $key=>$v): ?><li>
            <div class="dttext f_l">
              <ul>
                <h2><a href="/ode_blog/index.php/Home/Article/detail/article_id/<?php echo ($v['article_id']); ?>"><?php echo ($v['article_title']); ?></a></h2>
                <p><?php echo ($v['article_summary']); ?></p>
                <span><?php echo ($v['time']); ?></span>
              </ul>
            </div>
            <div class="xwpic f_r"><a href="/ode_blog/index.php/Home/Article/detail/article_id/<?php echo ($v['article_id']); ?>"><img src="<?php echo ($v['article_img']); ?>"></a></div>
          </li><?php endforeach; endif; ?>
      </div>
      <div class="pagelist">页次：<?php echo ($data["page"]); ?>/<?php echo ($data["count"]); ?> 每页6 总数<?php echo ($data["total"]); ?>
        <a href="/ode_blog/index.php/Home/Circle/index/page/1"> 首页 </a>
        <a href="/ode_blog/index.php/Home/Circle/index/page/<?php echo ($data["pre"]); ?>"> 上一页 </a>
        <a href="/ode_blog/index.php/Home/Circle/index/page/<?php echo ($data["next"]); ?>">下一页 </a>
        <a href="/ode_blog/index.php/Home/Circle/index/page/<?php echo ($data["count"]); ?>">尾页 </a></div>
    </div>
  </div>
  <div class="blank"></div>
  <!-- container代码 结束 -->
  
  <footer>
    <div class="footer">
      <div class="f_l">
        <p>All Rights Reserved 版权所有：<a href="http://www.yangqq.com">杨青个人博客</a> 备案号：蜀ICP备00000000号</p>
      </div>
      <div class="f_r textr">
        <p>Design by DanceSmile</p>
      </div>
    </div>
  </footer>
</div>
</body>
</html>