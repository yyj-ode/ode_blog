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
  <div class="container">
    <div class="con_content">
      <div class="about_box">
        <h2 class="nh1"><span>您现在的位置是：<a href="/ode_blog/index.php/Home/index/index">网站首页</a>>><a href="/ode_blog/index.php/Home/<?php echo ($controller_name); ?>/index"><?php echo ($atype_name); ?></a>>>博文</span><b>博文</b></h2>
        <div class="f_box">
          <p class="a_title"><?php echo ($data['article_title']); ?></p>
          <p class="p_title"></p>
          <!--  <p class="box_p"><span>发布时间：2017-07-07 15:12:42</span><span>作者：唐孝文</span><span>来源：稽查支队</span><span>点击：111056</span></p>--> 
          <!-- 可用于内容模板 --> 
        </div>
        <ul class="about_content">
          <!--<p>我叫郝颂歌，是个1991年出生的金融白领。天秤座，考虑的多，烦恼多，没安全感，想要个家。中央民族大学金融系毕业，现居住于北京市朝阳区。</p>-->
          <!--<p><img src="/ode_blog/Public/images/01.jpg" style="width:300px;"></p>-->
          <!--<p>“冥冥中该来则来，无处可逃”。 </p>-->
          <?php echo ($data['article_content']); ?>
        </ul>
        <!--    <div class="nextinfos">
      <p>上一篇：<a href="/">区中医医院开展志愿服务活动</a></p>
      <p>下一篇：<a href="/">广安区批准“单独两孩”500例</a></p>
    </div>--> 
        <!-- 可用于内容模板 --> 
        
        <!-- container代码 结束 --> 
      </div>
    </div>
    <div class="blank"></div>
  </div>
  <!-- container代码 结束 -->
  
  <footer>
    <div class="footer">
      <div class="f_l">
        <p>All Rights Reserved 版权所有：<a href="/ode_blog/index.php/Home/index/index">郝颂歌个人博客</a> 备案号：蜀ICP备00000000号</p>
      </div>
      <div class="f_r textr">
        <p>Design by DanceSmile</p>
      </div>
    </div>
  </footer>
</div>
</body>
</html>