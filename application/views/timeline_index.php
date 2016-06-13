<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>迷宫网-更新日志</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/history.css">
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.easing.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/history.js"></script>

</head>
<body>

<div id="arrow">
    <ul>
        <li class="arrowup"></li>
        <li class="arrowdown"></li>
    </ul>
</div>

<div id="history">

    <div class="title">
        <h2>更新日志</h2>
        <div id="circle">
            <div class="cmsk"></div>
            <div class="circlecontent">
                <div thisyear="2016" class="timeblock">
                    <span class="numf"></span>
                    <span class="nums"></span>
                    <span class="numt"></span>
                    <span class="numfo"></span>
                    <div class="clear"></div>
                </div>
                <div class="timeyear">YEAR</div>
            </div>
            <a href="#" class="clock"></a>
        </div>
    </div>

    <div id="content">
        <ul class="list">
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2016</span>
                            <span class="md">6月13日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">代码优化&&注册登录统一</a></div>
                        <div class="hisct">
                            <p>增加了memcache缓存，统一了注册登录页面，修复部分bug</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2016</span>
                            <span class="md">3月21日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">优化注册页面</a></div>
                        <div class="hisct">
                            <p>注册时新增验证码,复写Captcha类</p>

                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2016</span>
                            <span class="md">3月18日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">消息推送&&日记撰写bug修复</a></div>
                        <div class="hisct">
                            <p>新增消息推送功能,当有新粉丝||新点赞||新评论时消息提醒</p>
                            <p>nav栏右上角 &&修复日记撰写内容居中bug</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2016</span>
                            <span class="md">3月6日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">首页改版</a></div>
                        <div class="hisct">首页更换大图,登录交互修改</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2016</span>
                            <span class="md">3月5日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">添加用户关系</a></div>
                        <div class="hisct">添加好友搜索,好友列表页面,用户可以自由寻找添加好友</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2016</span>
                            <span class="md">3月4日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">日记板块更新</a></div>
                        <div class="hisct">增加了用户权限,可以设置隐私日记</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">

                    <div class="lileft">
                        <div class="date">
                            <span class="year">2015</span>
                            <span class="md">12月12日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">用户信息完善</a></div>
                        <div class="hisct">用户可以增加用户详细资料.由于本站挂在SAE云平台,对上传图片有严格控制,暂时不开放相册功能</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2015</span>
                            <span class="md">12月9日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">注册登录</a></div>
                        <div class="hisct">网站增加注册,登录功能.</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2015</span>
                            <span class="md">12月8日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">HTML代码构建</a></div>
                        <div class="hisct">本人非专业前端,CSS样式借鉴了SF社区,js部分效果借鉴了开源中国</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">

                    <div class="lileft">
                        <div class="date">
                            <span class="year">2015</span>
                            <span class="md">12月2日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">模块建立</a></div>
                        <div class="hisct">php页面,html,基本静态文件导入完成</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="liwrap">
                    <div class="lileft">
                        <div class="date">
                            <span class="year">2015</span>
                            <span class="md">12月1日</span>
                        </div>
                    </div>

                    <div class="point"><b></b></div>

                    <div class="liright">
                        <div class="histt"><a href="#">网站开坑</a></div>
                        <div class="hisct">网站基于CI框架,纯属兴趣,不做商业用途,提供微型社交用途</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

</body>
</html>