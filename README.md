# 迷宫-beta第一版说明：
1. 这是一个小型的社交网络类型网站。
2. 可以实现日记（公开和非公开），心情和交友互动功能。
3. 第一版本主要夯实了框架和基类，后续功能会逐渐丰富。

# 迷宫-beta第二版说明：
1. 增加了登录验证
2. 增加了消息推送通知
3. 优化了搜索代码
3. 服务器迁移腾讯云

## 项目展示地址：
http://www.ohmymaze.com/

## web后端
1. 本项目使用了小而优雅的CI框架。（文档地址：http://codeigniter.org.cn/user_guide/index.html）。
2. 项目基于SAE平台，由于SAE对写文件的限制，实现图片上传非常繁琐，$config['upload_path'] 必须使用SAE中设定的storage名称（storage服务需开启和设置），具体可参见SAE的storage文档。
3. memcache缓存驱动目录在application\libraries\Cache\drivers\Cache_memcached.php 下。

示例参考：
```
$this->load->driver('cache');
$this->cache->kvdb->save('key1','value1',0);
$this->cache->memcached->save('key2','value2',0);
echo $this->cache->kvdb->get('key1');
echo $this->cache->memcached->get('key2');
```

## web前端
1. 本人非前端，所以UI配色和交互可能略显拙劣，但是会尽可能完善，也欢迎大家提建议或者修改分支。
2. 前端主要依赖Bootstrap和社区相关JS插件。
3. CSS部分样式参考了知乎网，豆瓣网和果壳网。

效果参考：
![GitHub set up](https://raw.githubusercontent.com/emocheng/social-networks/master/public/demo/1.png)



![GitHub set up](https://raw.githubusercontent.com/emocheng/social-networks/master/public/demo/2.png)

![GitHub set up](https://raw.githubusercontent.com/emocheng/social-networks/master/public/demo/3.png)

![GitHub set up](https://raw.githubusercontent.com/emocheng/social-networks/master/public/demo/4.png)

![GitHub set up](https://raw.githubusercontent.com/emocheng/social-networks/master/public/demo/5.png)



## 使用说明
1. 你可以自由的下载或者检出分支，并且做出修改。
2. 只做测试学习之用，不可用于商业用途。
3. bug或建议请联系:txmengzhu@sina.cn









