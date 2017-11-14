TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>app_category`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>app_category` (`cate_id`, `parent_id`, `cname`, `cname_py`, `ctitle`, `ckey`, `cdesc`, `corder`, `cat_show`, `cate_logo`) VALUES
(1, 2, '休闲益智', 'lifeedu', '', '', '', 0, 1, '/templates/cates/lifeedu.png'),
(2, 1, '影音图像', 'video', '', '', '', 0, 1, '/templates/cates/videoimage.png'),
(3, 1, '阅读学习', 'reading', '', '', '', 0, 1, '/templates/cates/reading.png'),
(4, 1, '实用工具', 'tool', '', '', '', 0, 1, '/templates/cates/toolp.png'),
(5, 2, '经营策略', 'strategy', '', '', '', 0, 1, '/templates/cates/strategy.png'),
(6, 2, '角色扮演', 'role', '', '', '', 0, 1, '/templates/cates/role.png'),
(7, 2, '策略', 'gamestrategy', '', '', '', 0, 1, '/templates/cates/gamestrategy.png'),
(8, 2, '网络游戏', 'netgames', '', '', '', 0, 1, '/templates/cates/netgames.png'),
(9, 2, '飞行射击', 'flyshoot', '', '', '', 0, 1, '/templates/cates/flightShooting.png'),
(10, 1, '健康医疗', 'strong', '', '', '', 0, 1, '/templates/cates/strong.png'),
(11, 1, '旅游酒店', 'travel', '', '', '', 0, 1, '/templates/cates/travel.png'),
(12, 2, '社交游戏', 'socialgame', '', '', '', 0, 1, '/templates/cates/socialgame.png'),
(13, 1, '金融理财', 'finance', '', '', '', 0, 1, '/templates/cates/finance.png'),
(14, 1, '生活地图', 'map', '', '', '', 0, 1, '/templates/cates/maplife.png'),
(15, 1, '办公商务', 'office', '', '', '', 0, 1, '/templates/cates/office.png'),
(16, 1, '聊天通讯', 'chat', '', '', '', 0, 1, '/templates/cates/chat.png'),
(17, 1, '购物优惠', 'shopcoupon', '', '', '', 0, 1, '/templates/cates/shopcoupon.png'),
(18, 1, '儿童亲子', 'childen', '', '', '', 0, 1, '/templates/cates/childen.png'),
(19, 1, '教育学习', 'studying', '', '', '', 0, 1, '/templates/cates/study.png'),
(20, 1, '地图旅游', 'tour', '', '', '', 0, 1, '/templates/cates/tourmap.png'),
(21, 1, '系统安全', 'sysinput', '', '', '', 0, 1, '/templates/cates/sysinput.png'),
(22, 1, '壁纸主题', 'wallpaper', '', '', '', 0, 1, '/templates/cates/wallpaper.png'),
(23, 1, '摄影摄像', 'pai', '', '', '', 0, 1, '/templates/cates/pai.png'),
(24, 2, '棋牌天地', 'chess', '', '', '', 0, 1, '/templates/cates/chess.png'),
(25, 2, '跑酷', 'parkour', '', '', '', 0, 1, '/templates/cates/parkour.png'),
(26, 2, '格斗', 'wrestle', '', '', '', 0, 1, '/templates/cates/wrestle.png'),
(27, 2, '竞技游戏', 'sportsgame', '', '', '', 0, 1, '/templates/cates/sportsgame.png'),
(28, 2, '模拟辅助', 'analog', '', '', '', 0, 1, '/templates/cates/analog.png'),
(29, 2, '体育竞速', 'racing', '', '', '', 0, 1, '/templates/cates/racing.png'),
(30, 2, '其它', 'other', '', '', '', 0, 1, '/templates/cates/other.png'),
(31, 2, '动作', 'action', '', '', '', 0, 1, '/templates/cates/action.png'),
(32, 2, '塔防', 'tower', '', '', '', 0, 1, '/templates/cates/tower.png'),
(33, 2, '体育', 'physical', '', '', '', 0, 1, '/templates/cates/physical.png'),
(34, 2, '动作冒险', 'actions', '', '', '', 0, 1, '/templates/cates/actions.png'),
(35, 2, '儿童游戏', 'childgame', '', '', '', 0, 1, '/templates/cates/childgame.png'),
(37, 2, '养成', 'develop', '', '', '', 0, 1, '/templates/cates/develop.png')$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>info_category`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>info_category` (`cate_id`, `parent_id`, `cname`, `cname_py`, `ctitle`, `ckey`, `cdesc`, `corder`, `cat_show`) VALUES
(2, 1, '热门资讯', 'hot', '', '', '', 0, 1),
(3, 1, '游戏攻略', 'game', '', '', '', 0, 1),
(4, 1, '安卓资讯', 'android', '', '', '', 0, 1)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>navicat`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>navicat` (`navicat_id`, `navicat_name`, `navicat_url`, `navicat_m`, `navicat_seotitle`, `navicat_seokey`, `navicat_seodesc`, `navicat_enabled`, `navicat_order`, `navicat_time`, `navicat_blank`, `uid`) VALUES
(2, '安卓软件', '/index.php?c=index&m=softs', 'softs', '', '', '', 1, 8, 1442141993, 2, 1),
(3, '安卓游戏', '/index.php?c=index&m=games', 'games', '', '', '', 1, 7, 1442127736, 2, 1),
(4, '装机必备', '/index.php?c=index&m=necessaries', 'necessaries', '', '', '', 1, 5, 1442127763, 2, 1),
(5, '资讯', '/index.php?c=index&m=infos', 'infos', '', '', '', 1, 6, 1442127788, 2, 1),
(6, '专题', '/index.php?c=index&m=specials', 'specials', '', '', '', 1, 4, 1442127813, 2, 1),
(7, '首页', '/', 'index', '', '', '', 1, 9, 1442127897, 2, 1)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>recommend`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>recommend` (`area_id`, `area_title`, `area_html`, `area_remarks`, `area_logo`, `area_order`, `area_ids`, `area_type`) VALUES
(30, '最受欢迎', '', '最受欢迎（PC网站首页）', '', 0, '1,2,3', 1),
(31, '装机必备', '', '装机必备（PC网站首页）', '', 0, '1,2,3', 1),
(29, '今日热门推荐', '', '今日热门推荐（PC网站首页）', '', 0, '4,5,6,7,8', 1),
(32, '时下热门', '', '时下热门（手助端首页）', '', 0, '1,2,3,8', 2),
(33, '精品推荐', '', '精品推荐（手助端首页）', '', 0, '1,2,3', 2),
(34, '每日推荐', '', '每日推荐（手助端首页）', '', 0, '1,2,3,4,5,6,7,8,9', 2),
(35, '上升最快', '', '上升最快（手助端首页）', '', 0, '1,2,3', 2),
(36, '装机必备', '', '装机必备（手助端首页）', '', 0, '1,2,3', 2),
(37, '下载排行', '', '下载排行（手助端首页）', '', 0, '1,2,3', 2),
(38, '应用排行', '', '应用排行（手助端排行页）', '', 0, '1,2,3', 2),
(39, '游戏排行', '', '游戏排行（手助端排行页）', '', 0, '1,2,3', 2),
(40, '今日推荐', '', '今日推荐（PC网站首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(41, '精品推荐', '', '精品推荐（PC网站首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(42, '热门排行', '', '热门排行（PC网站首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(44, '飙升榜', '', '飙升榜（PC网站首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(45, '热门', '', '软件热门（wap首页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(46, '热门', '', '游戏热门（wap首页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(47, '精品', '', '软件精品（wap首页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(48, '精品', '', '游戏精品（wap首页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(49, '飙升', '', '软件飙升（wap首页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(50, '飙升', '', '游戏飙升（wap首页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(51, '排行榜', '', '软件飙升（wap排行榜页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(52, '排行榜', '', '游戏飙升（wap排行榜页mobile-1）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(53, '最受欢迎', '', '最受欢迎（wap1最受欢迎页）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(54, '软件', '', '软件（template-3首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(55, '游戏', '', '游戏（template-3首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(56, '飙升排行榜', '', '飙升排行榜-软件（template-3首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(57, '飙升排行榜', '', '飙升排行榜-游戏（template-3首页）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(58, '精品推荐', '', '精品推荐（PC网站软件页template-3）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(59, '精品推荐', '', '精品推荐（PC网站游戏页template-3）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(60, '下载排行', '', '下载排行（PC网站软件页template-3|template-4）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(61, '上升最快', '', '上升最快（PC网站软件页template-3）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(62, '时下热门', '', '时下热门（PC网站软件页template-3）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(63, '下载排行', '', '下载排行（PC网站游戏页template-3|template-4）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(64, '上升最快', '', '上升最快（PC网站游戏页template-3）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(65, '时下热门', '', '时下热门（PC网站游戏页template-3）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(66, '下载排行', '', '下载排行（PC网站新闻页template-3|template-4）', '', 0, '1,2,3,4,5,6,7,8,9', 1),
(67, '精品推荐', '', '精品推荐（wap首页mobile-2）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(68, '下载排行', '', '下载排行（wap首页mobile-2）', '', 0, '1,2,3,4,5,6,7,8,9', 3),
(69, '上升最快', '', '上升最快（wap首页mobile-2）', '', 0, '1,2,3,4,5,6,7,8,9', 3)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>advert`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>advert` (`ad_id`, `ad_title`, `ad_type`, `ad_alts`, `ad_images`, `ad_links`, `ad_remarks`, `ad_time`, `uid`) VALUES
(30, 'PC网站首页轮播', 1, 'pc|test', '/uploads/images/36678d549cc10510616ba43f81b3c61f.jpg|/uploads/images/2bec98d452f11fe936ccbe3934ffa465.jpg', '/index.php?c=index&m=content_app&app_id=264|http://www.711cms.com', '', 1441013282, 1),
(31, '手助首页轮播', 3, '手助广告第一屏|手助广告第二屏', '/uploads/images/29c6506d0c5f74d3de60dc7beb8301ed.png|/uploads/images/2bec98d452f11fe936ccbe3934ffa465.jpg', '1|2', '', 1444462466, 1),
(32, 'WAP首页轮播', 2, 'wap', '/uploads/images/29c6506d0c5f74d3de60dc7beb8301ed.png', 'http://www.711cms.com', '', 1445321845, 1)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>special`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>special` (`area_id`, `area_title`, `area_html`, `area_remarks`, `area_logo`, `area_order`, `area_ids`, `special_seotitle`, `special_seokey`, `special_seodesc`, `special_time`, `uid`) VALUES
(32, '专题二', '', '', '/uploads/images/b01f7bee4cebf5bfd322328fd0949fdb.gif', 0, '4,5,6', '', '', '', 1445411835, 1),
(33, '专题三', '', '', '/uploads/images/ddb4cb8830d76ae2326570b620eb058d.gif', 0, '7,8,9', '', '', '', 1445411841, 1),
(31, '专题一', '', '', '/uploads/images/80de3333fd830896e60368592175355b.gif', 0, '1,2,3', '', '', '', 1445411827, 1)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>necessary`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>necessary` (`necessary_id`, `necessary_title`, `necessary_type`, `necessary_remarks`, `necessary_html`, `necessary_order`, `necessary_list`, `necessary_time`, `uid`) VALUES
(29, '游戏必备', 2, '游戏必备', '游戏必备', 0, '1,2,3', 1444960000, 1),
(30, '软件必备', 1, '软件必备', '软件必备', 0, '4,5,6', 1444959997, 1)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>search`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>search` (`q_id`, `q`, `qnum`, `qorder`, `q_type`) VALUES
(1, '整除·4', 1, 0, 1),
(2, 'BesTV', 1, 0, 1),
(3, '一点资讯', 5, 0, 1),
(4, '今日头条', 5, 0, 1),
(5, '小黄人大眼萌乐园', 2, 0, 2),
(6, '万万没想到之大皇帝', 4, 0, 2)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>app`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>app` (`app_id`, `last_cate_id`, `app_title`, `app_stitle`, `app_update_time`, `app_type`, `app_logo`, `app_desc`, `app_company`, `app_company_url`, `app_tags`, `create_time`, `app_grade`, `app_recomment`, `uid`, `app_comments`, `app_visitors`, `app_down`, `app_order`, `data_app_id`, `charge_app_id`, `app_seodesc`, `app_seokey`) VALUES
(1, 1, '整除·4', '整除·4', 1451010136, '1', 'http://p15.qhimg.com/t015dfbcbccea894d2e.png', '心算屏幕上显示的数字是否能被4整除，选择对错，就是这么简单。。。\n\n被3整除的规律：最后两位数的数字加起来可以被4整除的话，那整个数字都可以被4整除。', 'H.Light', '', '休闲益智', 1451010136, 6.3, 3, 0, 0, 0, 0, 0, 1, 3173264, '', ''),
(2, 2, 'BesTV', 'BesTV', 1451010136, '1', 'http://p16.qhimg.com/t0105a23fd0be54ca86.png', 'BesTV是中国内容最新最全面的正版高清手机视频客户端。\r\n\r\n拥有【40000部电影】，全年院线电影覆盖率95%，每年引进迪斯尼、索尼、派拉蒙、环球、福克斯、华纳等国际大片超2000部。\r\n\r\n拥有【200000集电视剧】，覆盖卫视黄金档80%以上电视剧，每年引进环球、华纳、BBC、CBS等英美剧超1000小时，拥有TVB电视剧大陆地区独家版权。\r\n\r\n拥有【迪斯尼、尼克、芝麻街、CN卡通】等6大少儿节目品牌的独家内容版权。\r\n\r\n拥有【BBC、DISCOVERY、历史频道、国家地理】4大全球最著名纪实品牌纪录片内容，每年引进最新精品纪录片内容超1200小时。\r\n\r\n拥有【BesTV Live音乐品牌】，全年华语、韩流一线歌王、新锐王、优质偶像、音乐节等演唱会直播超100场。\r\n\r\n同时，BesTV作为国内最大的赛事集成平台，拥有【英超、NBA、NFL、FIFA、CBA、澳网、武网】等国内外顶级足球、篮球、网球、赛车等体育赛事的直播权，及最快最全面最专业的体育资讯。\r\n\r\nBesTV内容涵盖范围还包括上海电视台和韩国MBC、SBS等电视台的王牌综艺、生活娱乐、新闻财经等内容，同时包括东方购物、东方旅游、实时互动等应用入口，为用户提供包括电影、电视剧、综艺、体育、纪实、新闻、音乐、娱乐、动漫等全面内容的高清音视频【直播、回看和点播】服务。\r\n\r\n2016值得期待：\r\n【好莱坞巨作】：《蝙蝠侠大战超人》、《功夫熊猫3》、《白雪公主与猎人2》、《美国队长3》、《愤怒的小鸟》、《X战警天启》、《爱丽丝镜中奇遇记》、《忍者神龟2》、《魔兽世界》、《惊天魔盗团2》、《海底总动员2》、《谍影重重5》……\r\n\r\n【HBO重磅剧】：《权力的游戏》、《黑吃黑》、《反击》、《副总统》、《新闻编辑室》、《血战太平洋》、《斯图尔特：倒带人生》《罪恶赎金》、《时光尽头的恋人》、《球手们》、《政局边缘》……\r\n\r\n【TVB潮流港剧】：《陪着你走》、《无双谱》、《警犬巴打》、《收规华》、《陈寨英雄》、《巾帼枭雄之喋血长天》、《爱情食物链》、《流氓皇帝》、《实习天使》、《纯熟意外》、《公公出宫》、《为食神探》\r\n\r\n【少儿动漫】：《米奇妙妙屋》《西部警长凯里》》《小熊维尼与跳跳虎》《小小马戏屋》《飞哥与小佛》《航海王》《光之美少女》《灌篮高手》《圣斗士星矢》《奥特曼》《数码宝贝》《汪汪队立大功》《爱探险的朵拉》《功夫熊猫》《迪亚哥》《海绵宝宝》《花园宝宝》《天线宝宝》《威比小猪》《布鲁精灵》《芝麻街》《声调小方块》《大鸟看世界》《飞天小女警》《Ben 10》《我的麻吉是猴子》《熊出没之冬日乐翻天》《变形金刚》《小马宝莉》\r\n\r\n【国家地理、BBC纪录片】：《多灾之年》《世界大战》《最高档》《超级拆解》、《超级工厂》、《寻找超级大鱼》、《极限维修大挑战》、《超级射手》、《沼泽生存之道》、《极地卡车队》、《空中格斗》、《人体武器》、《冰冻星球》、《人类星球》、《行星地球》、《飞越地球》、《格斗行天下》、《荒野求生》《求生一加一》、《前进大未来》\r\n\r\n【高清体育】： NBA赛事全网高清直播、英超独家全网直播、FIFA全网独家直播、NFL、武网……', '上海东方龙新媒体有限公司', '', '在线视频 直播 视频', 1441269801, 7.2, 3, 0, 0, 0, 10035, 0, 2, 3008667, 'BesTV－你想看的全都有！', ''),
(3, 3, '一点资讯', '一点资讯', 1451010133, '1', 'http://p18.qhimg.com/t01a329cf37a42bbeea.png', '苹果APP Store推荐的精品应用！\r\n2200,000+ 资讯频道，想看什么就有什么！\r\n聚合100,000+ 媒体平台，海量资讯随意订阅！\r\n智能分析用户爱好，精准推荐你真正感兴趣的内容！\r\n\r\n—————兴趣是探索世界的引擎—————\r\n时政新闻、财经资讯、社会热点、军事报道、\r\n娱乐八卦、时尚潮流、运动健康、生活百科、\r\n家装设计、育儿常识、星座命理、出游旅行、\r\n野史探秘、太空探索、未解之谜、前沿科技...\r\n订制你感兴趣的资讯，探索你未知的新世界！\r\n\r\n你可以获取时事动态，关注经济走势；还可以订阅行业知识充电学习；亦可以了解野史秘闻、探秘未解之谜！\r\n\r\n搜索你感兴趣的内容，订阅你的专属频道，独创兴趣引擎智能分析你的爱好，为你呈现真正感兴趣的内容！\r\n\r\n2015年最火的资讯类应用，千万用户的共同选择！\r\n\r\n—————来自用户的认可—————\r\n\r\n地铁族：\r\n“每天上下班地铁上都用一点资讯阅读离线文章，非常方便，再也不用担心信号的问题了！”---by 泽鹏85\r\n\r\n\r\n学生族：\r\n“一点资讯的内容很丰富，各行各业都有，我的手机图书馆的感觉！好文章一键收藏！感谢一点资讯的开发者们。” ----by 蕾蕾花开\r\n\r\n\r\n已退休的叔叔：\r\n“没事的时候在这里翻翻新闻，看看外面的动静。字可以调的很大，眼睛不累，现在平板上也有了，很不错！” ----by 石兰山下\r\n“本地新闻是个好栏目，发生在身边的事，很及时。”\r\n\r\n\r\n妈妈：\r\n“感谢一点资讯，从怀孕到生完一直在看，各种各样的怀孕要注意的事项，带孩子的细节，总能让我学到新知识！”----by 兜兜她妈\r\n“在一点上学习到了很多养生食谱，不仅美味，还能给老人、孩子更丰富的营养，没事我都会打开看看，一直给我推荐，特别方便”---by hua123\r\n\r\n\r\n追星族：\r\n“和喜欢欧巴的人一起订了频道，欧巴的所有消息都能第一时间收到，喜欢欧巴的看过来，让欧巴订阅数上十万！”    ----by ilovedachui\r\n\r\n\r\n自媒体人：\r\n“在很多地方都有更新自己的文章，一点这边给我的感觉是不浮躁，认真的文字给认真的人看，这种感觉很好，感谢一点资讯。”---by 大师笔记\r\n\r\n---------------------------\r\n\r\n感谢所有支持一点资讯的朋友们，你们的五星好评、真挚留言是我们前进的最大动力！\r\n\r\n\r\n如果你还有其他的想法，请让我们知道：\r\n微博：@一点资讯\r\n微信公众平台：yidianzixun2013\r\n官方网站：www.yidianzixun.com\r\n媒体平台：www.yidianzixun.com/mp\r\n商务合作：bd@yidian-inc.com', '北京一点网聚信息技术有限公司', '', '新闻资讯 阅读 头条 资讯', 1373869747, 8.1, 4, 0, 0, 0, 4093659, 0, 3, 701491, '一点资讯，为你私人定制的资讯客户端', ''),
(4, 4, '灵机算命八字星座解梦风水', '灵机算命八字星座解梦风水', 1451010133, '1', 'http://p17.qhimg.com/t01dfd06574fdd59b8c.png', '灵机妙算 专业八字算命大师，为你提供最专业的运程预测！\r\n全球专业八字算命命理老师云集灵机妙算，婚姻，事业，健康全方位为你导航！\r\n专业准确八字算命，从八字为你剖析你的运势发展！\r\n\r\n【专业算命】传统面相，八字算命，求签占卜，为你提供专业算命指导！\r\n【实用工具】起名，姓名测算，手机号码，车牌号码，为你选出最幸运的号码；\r\n【婚姻事业】真爱一生，为你提供专业八字合婚配对测算服务！\r\n【黄历通胜】专业择日宜忌看哪家！必选灵机妙算！\r\n【星座运势】十二星座运程每周更新，陪伴你度过日日夜夜；\r\n\r\n灵机妙算以传播国学、佛学、易学知识帮助他人解除困惑为宗旨，精确率达到95%。\r\n强大的功能满足了各种用户的需求，打造全球首款拥有最全面的精准预测应用。已在台湾、香港、新加坡、马来西亚等国家地方获得深厚的信用和知名度。\r\n\r\n灵机妙算为你提供专业八字算命，星座占卜，婚姻测算，事业分析，哎呦，不错哦！不可错过！\r\n\r\n你还可以通过发表个人动态，记录生活随时随地说出内心的话分享到微信、微博、QQ空间、YY、in、易信、旺信、nice、line、陌陌、爱奇艺、淘宝、美团、美图秀秀、百度云、美颜相机、唱吧、全民K歌、小咖秀、wifi万能钥匙。让我们身边的所有事情都可以传达给小伙伴们，一起点燃心身灵！\r\n\r\n欢迎您联系我们：\r\n微信号：lingjimiaosuan', '广东亿俊计算机系统有限公司', '', '星座 算命 占卜 运势 风水 周公解梦 八字算命 紫微算命', 1331622701, 5.0, 2, 0, 0, 0, 4194682, 0, 4, 1578, '八字算命必备，专业运程预测！', ''),
(5, 3, '今日头条', '今日头条', 1451010129, '1', 'http://p15.qhimg.com/t01013bf71419accc86.png', '用户量过2.6亿的新闻阅读客户端 \r\n\r\n占领AppStore新闻类榜首24个月 \r\n\r\n每天用户总在线时长超过7.2亿分钟 \r\n\r\n每天社交平台分享量达1000万次 \r\n\r\n5秒钟掌握你的新闻阅读兴趣点 \r\n\r\n\r\n\r\n你关心的，才是头条！《今日头条》会聪明地分析你的兴趣爱好，理解你的阅读行为，为你推荐喜欢的新闻资讯内容，并且越用越懂你！ \r\n\r\n\r\n\r\n今日头条，聚合各大门户的全平台新闻资讯，涵盖热点新闻、科技、财经、社会、国际、娱乐、段子、图片、体育、军事、汽车... \r\n随时随地分享新闻资讯到微博、微信、朋友圈、QQ空间等社交平台。 \r\n\r\n\r\n\r\n【软件特点】 \r\n\r\n5秒算出你的兴趣:使用手机号、微信、微博、qq、人人均可登陆； \r\n\r\n内容全面且及时：聚合超过5000个内容站点，24小时刷不停； \r\n\r\n推荐精准：定制你的专属新闻资讯，头条更懂你； \r\n\r\n评论精彩：网友互动，评论比新闻更劲爆； \r\n\r\n分享便捷：全社交平台一键分享，你的看法，与更多好友分享； \r\n\r\n云端储存：云端自动备份你的收藏和评论，数据永不丢失，在手机和电脑上都能查看 。\r\n\r\n\r\n\r\n【欢迎移步，献计献策有礼包】 \r\n\r\n通过以下任意方式表达您的意见或是建议，有机会获得标兵用户大礼包。 \r\n\r\n公众账号：今日头条headline_today \r\n\r\n官方微博：@今日头条 \r\n\r\n官方QQ：237557116 \r\n\r\n官网：www.toutiao.com \r\n\r\n反馈邮箱：kefu@bytedance.com', '北京字节跳动网络技术有限公司', '', '新闻资讯 资讯 头条 新闻 男性 订阅', 1342423621, 8, 4, 0, 0, 0, 144365589, 0, 5, 141843, '超过2亿用户使用的新闻客户端', ''),
(6, 3, '网易新闻', '网易新闻', 1451010129, '1', 'http://p18.qhimg.com/t012bdeec57ab1e5e21.png', '-----网易新闻 世界在你手中-----\r\n\r\n \r\n\r\n 直观：首页架构优化，优质内容一览无余，一键发现精彩。\r\n\r\n 定制：个性订阅、智能推荐，量身打造你的专属阅读节奏。\r\n\r\n 多元：视频新闻、原创电台、图文资讯，各场景多重体验。\r\n\r\n 聚合：彩票、邮箱、活动、积分…增值服务，不只是资讯。\r\n\r\n \r\n\r\n-----中文移动资讯定义者-----\r\n\r\n \r\n\r\n改变3亿人的阅读生活。网易新闻客户端是网易公司全力打造的精品应用，因体验最流畅、新闻最快速、评论最犀利而备受推崇。\r\n\r\n \r\n\r\n网易新闻客户端基于用户大数据和海量内容源，为用户量身打造移动阅读节奏，提供全场景阅读体验，智能推荐、个性订阅、富媒体视听新闻……随时随地，满足用户多样化的资讯需求。网易新闻客户端坚持高质量的原创内容，已推出《娱乐BigBang》、《每日轻松一刻》、《另一面》等四十余档原创栏目，深受用户热捧。本地频道覆盖全国300多个城市，为用户提供美食、旅游等贴心的周边服务。“无跟贴，不新闻”一直是网易新闻客户端最具特色的部分，已经形成犀利、独特视角的跟贴文化，为用户自由表态提供了个性化的平台。\r\n\r\n \r\n\r\n网易新闻客户端，重新定义中文资讯阅读。\r\n\r\n \r\n\r\n-----联系方式-----\r\n\r\n \r\n\r\nQQ交流群：304167586，190991883\r\n\r\n易信公众号：网易新闻\r\n\r\n微信公众号：网易新闻客户端\r\n\r\n新浪微博：@网易新闻客户端', '网易传媒科技（北京）有限公司', '', '新闻资讯 头条 新闻 男性 门户', 1331626708, 6.8, 3, 0, 0, 0, 62532869, 0, 6, 2744, '评论最犀利而备受推崇，有态度网友的一致选择', ''),
(7, 3, '掌阅iReader', '掌阅iReader', 1451010129, '1', 'http://p17.qhimg.com/t010fdd95b6c633517f.png', '海量免费小说！畅销小说盗墓笔记、花千骨、心理罪，本本都精彩！免费阅读器支持TXT, UMD, PDF, EBK, CHM、EPUB等多种阅读格式。全网小说第一时间更新！富媒体精品书带你进入阅读新境界！4.8亿用户的选择，30多万册热门图书，国内最火的阅读软件，下载注册就送100阅饼！\r\n掌阅iReader，国内最卓越的手机阅读品牌，你的掌上图书馆！\r\n特色功能：\r\n【精品书】精美图文混排、音乐伴读、视频解读；\r\n【护眼模式】全球首创护眼模式，减轻眼睛负担；\r\n【云书架】自动备份阅读信、跨设备轻松对接；\r\n【语音朗读】多种特色方言，享受听得乐趣；\r\n【自动阅读】解放双手，“懒人”阅读解决方案；\r\n【附近的人】查看附近的“Ta”读什么书，还可“窃”书；\r\n【WIFI传书】甩掉数据线，轻松传好书；\r\n【伴读一生】关注你的阅读，了解你的阅读；\r\n【新增漫画】高清正版漫画，二次元宅腐基快快看过来；\r\n【新增杂志】男人装、时尚、瑞丽、昕薇、读者、知音等让你眼花缭乱。', '北京掌阅科技有限公司', '', '小说 阅读器 电子书 图书 男性', 1331621836, 5.6, 3, 0, 0, 0, 141410758, 0, 7, 1152, '海量免费小说、漫画、杂志，让你欲罢不能！', ''),
(8, 5, '小黄人大眼萌乐园', '小黄人大眼萌乐园', 1451013076, '1', 'http://p17.qhimg.com/t01635b690ffffe9f48.png', '和小黄人一起度过一段终身难忘的假期！ 看这个可爱又笨拙、名叫菲尔的小黄人不慎弄沉了一整艘游轮，游轮上载着度假中的小黄人伙伴。 为了赎罪，菲尔要把一座荒无人烟的热带岛屿改造成完美度假胜地。 Illumination Entertainment – 《小黄人》影片的创作者 – 和EA一同邀请您帮助菲尔建造它的终极小黄人乐园。\r\n\r\n本应用提供应用内购买。 您可以在设备设置中禁用应用内购买功能。\r\n\r\n和您最喜欢的小黄参加派对\r\n搭起小阳伞并撬开一些椰子。 菲尔正在把小岛改造成派对天堂，您也被邀请了，还有来自《小黄人》电影中的凯文、斯图尔特和鲍勃。 帮助菲尔举办不可思议的小黄人派对并将您的岛屿改造成完美的世外桃源。 把喷火器拿来！\r\n \r\n释放您的创造力\r\n用浴盆、吊床和沙滩排球场来使您的岛屿与众不同，还有全新的小黄人动画。 种植萤火虫树和大串大串的香蕉，用电鳗发电，为菲尔和他的小黄人伙伴们打造难忘的小岛体验。\r\n \r\n探索小岛天堂\r\n您获取的土地越多，小黄人能找到的乐子就越多！ 您也可以成为疯狂垂钓、滑道跳水以及很多其它活动的专家。 \r\n \r\n恶棍的假期\r\n所有的小黄人都需要服侍一位恶棍老板！ 帮助菲尔为《小黄人》电影中的恶棍们建造一个特别的度假村。 帮助这些恶棍们一边在天堂享受美好假期，一边执行他们卑鄙的计划。\r\n\r\n联系我们：\r\n如果您在游戏中遇到任何问题，或想提供宝贵的游戏建议，请与客服人员联系。\r\n客服热线：010-51145017 \r\n客服QQ：3301927293 \r\n客服邮箱：xiaohuangren@lwan.com', '艺电计算机软件（上海）有限公司', '', '模拟经营', 1450342694, 7.6, 3, 0, 0, 0, 1281274, 0, 8, 3172369, '创建自己的小黄人度假天堂岛', ''),
(9, 6, '十万个大魔王(点爆皮卡丘)', '十万个大魔王(点爆皮卡丘)', 1451013090, '1', 'http://p17.qhimg.com/t013c0bd1371c4e9a09.png', '啪啪小怪兽！点爆大魔王！召集小伙伴们一起挑战神秘魔王组织！众多经典萌宠不在装傻卖蠢集体加入邪恶阵营！《十万个大魔王》神秘组织正式成立！Σ( ° △ °|||)\n \n各种绝赞人气角色纷纷来袭挑战你的手速极限，帅气勇者与可爱小龙伴你共同闯荡世界，收集神秘的宝物、图腾与圣光来增强自己，更有万千勇者伙伴等你一起来组建公会挑战史上最强魔王！\n \n勇敢的骚年啊！快去集齐五色神龙创造奇迹吧！不过你知道萌宠变成魔王需要几步嘛？\n——穿越到一个魔王统治的世界\n——加入名为《十万个大魔王》的组织 ?\n——宣誓！“我不做好人了！”\n——变成大魔王\n \n众多萌物魔王宣言：\n气球精灵：我不要再当什么“暖男”了！ 简直就是备胎代名词！\n四色神龟：我们不要只在地下管道里呆着了！\n光之战士：拒绝殴打小怪兽！我要和小怪兽相亲相爱去啪啪！\n小黄军团：我们本来就是坏人……\n皮卡皮卡：皮卡，皮卡皮，皮卡皮卡，皮……\n \n面对如（sàng）此（xīn）豪（bìng）华（kuáng）的阵容~你该怎么办呢？\n我能不能选择“狗带（go die）”……\n不要“方（慌）”！我来告诉你如何打败他们！首先你要有一部手机_\n升级呢？  看着勇者自己打\n装备呢？  听说会送各式各样的神装\n工资呢？  第二天睁眼几亿金币已到账\n一个人？  很多小伙伴等你来组建公会！\n这么简单就完了？ Too Young Too Simple！\n \n实力提升之后还能改变形象！\n超可爱萌宠魔王等你挑战！\n娇小侍从碎碎念伴你左右！\n收服魔王们参加竞技对战！\n点击助力勇者即可战翻魔王！\n收集前所未有的神秘宝物！\n圣光不再是邪恶的马赛克！\n招募勇者结成冒险者联盟！一起挑战Boss Rush！\n冒险途中的随机宝箱会带来意外惊喜！\n还有更多魔王的花样嘬死的“姿势”等你开发哟！\n \n更多信息：\n魔王总部联系方式：dmw@hardtime.cn\n魅魔（客服）：617300005\n魔王福利微信：shiwangedamowang', '嘉兴赫德信息科技有限公司', '', '角色扮演 即时战斗', 1449481330, 8.2, 4, 0, 0, 0, 801006, 0, 9, 3162880, '全球首款拼手速网游！疯狂点爆皮卡丘！！', ''),
(10, 7, '万万没想到之大皇帝', '万万没想到之大皇帝', 1451013089, '1', 'http://p16.qhimg.com/t0110c780813655d601.png', '12月18日 10:00正式公测，现在预下载游戏并通过《万万没想到之大皇帝》客户端登录360账号，30天的月卡轻松拿！\n\n先行充值，享最高300元优惠福利：下载并安装“360游戏的大厅”→搜索“万万没想到之大皇帝”→进入游戏详情页后点击“福利”→进行充值。\n\n《万万没想到》正版授权三国手游，玩大皇帝，你就是皇帝，50位三国名将为你而战，3000后宫佳丽等你宠信，经典七宫格，5V5热血战斗，阵容搭配千变万化！万人国战等你一展身手！\n\n\n选择《万万没想到之大皇帝》的五大理由：\n\n【游戏特色】\n\n明星团队 惊喜不断\n《万万没想到》原班明星团队化身NPC入驻游戏，王大锤终于逆袭称帝，孔连顺竟出没后宫，本煜父王居然上了通缉令……爆笑不断！惊喜不断！\n\n三国名将 炫酷大招\n每一位三国名将都有独特的炫酷大招，周瑜释放火雨，诸葛亮召唤落雷，马超冲锋陷阵，貂蝉魅惑逆转……没有绝对的强弱，只有给力的组合！\n\n后宫美人 激情互动\n狂野的匈奴公主、性感的赵飞燕、清纯的东瀛公主、温柔的步练师……古今中外、少女人妻，总有一款适合你！为美人搓澡，与妃子猜拳，惊艳之旅，触手可及！\n\n实时国战 热血联盟\n千人热血实时手操国战！智能匹配，四盟相争，广阔世界地图上的城池争夺激情四射，热血联盟，兄弟并肩，打一场惊天动地的战斗！\n\n经典事件 创意主线\n草船借箭、七擒孟获、三顾茅庐、千里走单骑……真实还原三国真实历史，重温经典大事件；多线式主线亮点不断，自主选路，随机事件！\n\n【联系我们】\n360官网:http://u.360.cn/wwmxdzdhd/\n360官方QQ群:167680852\n360官方论坛:http://bbs.u.360.cn/forum-3641-1.html\n客服电话：4006689919', '上海驰游信息技术有限公司', '', '策略 网游 360精品游戏 影视 三国 网络游戏', 1447660153, 6.6, 3, 0, 0, 0, 1465947, 0, 10, 3144622, '玩大皇帝，你就是皇帝，纯正三国策略等你来战！', '')$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>history`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>history` (`history_id`, `app_id`, `history_version`, `history_update_time`, `history_size`, `history_system`, `data_history_id`, `history_type`, `history_minSdkVersion`, `history_package`, `history_VersionCode`, `history_permission`, `history_file`) VALUES
(1, 1, '1.0', 1451010136, '3897169', 'Android 2.3, 2.3.1, 2.3.2', 1, 1, 9, 'com.hl.divisible4', 1, 'android.permission.INTERNET;android.permission.ACCESS_NETWORK_STATE', ''),
(2, 2, '1.2.0', 1451010136, '14030940', 'Android 2.3, 2.3.1, 2.3.2', 2, 1, 9, 'com.bestv.app', 10, 'android.permission.INTERNET;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.READ_PHONE_STATE;android.permission.MODIFY_AUDIO_SETTINGS;android.permission.GET_TASKS;android.permission.SYSTEM_ALERT_WINDOW;android.permission.READ_EXTERNAL_STORAGE;android.permission.WAKE_LOCK;android.permission.WRITE_SETTINGS;android.permission.READ_LOGS;android.permission.PROCESS_OUTGOING_CALLS;android.permission.RECEIVE_BOOT_COMPLETED;android.permission.VIBRATE;android.permission.CAMERA;android.permission.FLASHLIGHT;android.permission.BROADCAST_PACKAGE_ADDED;android.permission.BROADCAST_PACKAGE_CHANGED;android.permission.BROADCAST_PACKAGE_INSTALL;android.permission.BROADCAST_PACKAGE_REPLACED;android.permission.RESTART_PACKAGES;android.permission.GET_ACCOUNTS;android.permission.RECORD_AUDIO;android.permission.CHANGE_NETWORK_STATE;android.permission.ACCESS_FINE_LOCATION;android.permission.READ_CONTACTS', ''),
(3, 3, '3.4.4', 1451010133, '11948095', 'Android 2.3, 2.3.1, 2.3.2', 3, 1, 9, 'com.hipu.yidian', 34400, 'android.permission.CHANGE_WIFI_STATE;android.permission.CHANGE_NETWORK_STATE;android.permission.INTERNET;android.permission.ACCESS_NETWORK_STATE;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.READ_EXTERNAL_STORAGE;android.permission.ACCESS_WIFI_STATE;android.permission.READ_PHONE_STATE;android.permission.GET_TASKS;android.permission.REORDER_TASKS;android.permission.GET_ACCOUNTS;android.permission.MANAGE_ACCOUNTS;android.permission.VIBRATE;android.permission.WRITE_SETTINGS;com.xiaomi.permission.AUTH_SERVICE;com.android.launcher.permission.INSTALL_SHORTCUT;com.android.launcher.permission.UNINSTALL_SHORTCUT;android.permission.ACCESS_COARSE_LOCATION;android.permission.ACCESS_FINE_LOCATION;android.permission.RECORD_AUDIO;com.android.launcher.permission.READ_SETTINGS;android.permission.RECEIVE_BOOT_COMPLETED;android.permission.WAKE_LOCK;android.permission.READ_LOGS;android.permission.CHANGE_CONFIGURATION;com.hipu.yidian.permission.MIPUSH_RECEIVE', ''),
(4, 4, '8.6.3', 1451010133, '28820010', 'Android 3.0.x', 4, 1, 11, 'oms.mmc.fortunetelling', 863, 'android.permission.MOUNT_UNMOUNT_FILESYSTEMS;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.READ_EXTERNAL_STORAGE;android.permission.INTERNET;android.permission.READ_PHONE_STATE;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.RESTART_PACKAGES;android.permission.ACCESS_COARSE_LOCATION;android.permission.GET_TASKS;com.android.launcher.permission.INSTALL_SHORTCUT;com.android.launcher.permission.UNINSTALL_SHORTCUT;android.permission.SYSTEM_ALERT_WINDOW;android.permission.WRITE_SETTINGS;android.permission.CHANGE_WIFI_STATE;android.permission.BROADCAST_STICKY;android.permission.RECEIVE_USER_PRESENT;android.permission.WAKE_LOCK;android.permission.KILL_BACKGROUND_PROCESSES;android.permission.READ_LOGS;android.permission.VIBRATE;android.permission.BATTERY_STATS', ''),
(5, 5, '5.1.3', 1451010129, '16232223', 'Android 2.3, 2.3.1, 2.3.2', 5, 1, 9, 'com.ss.android.article.news', 513, 'android.permission.INTERNET;android.permission.READ_PHONE_STATE;android.permission.READ_CONTACTS;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.WRITE_EXTERNAL_STORAGE;com.android.launcher.permission.READ_SETTINGS;com.android.launcher.permission.INSTALL_SHORTCUT;com.android.launcher.permission.UNINSTALL_SHORTCUT;android.permission.RECEIVE_BOOT_COMPLETED;android.permission.ACCESS_COARSE_LOCATION;android.permission.ACCESS_FINE_LOCATION;android.permission.WAKE_LOCK;android.permission.CHANGE_CONFIGURATION;android.permission.WRITE_SECURE_SETTINGS;android.permission.GET_ACCOUNTS;android.permission.WRITE_SETTINGS;android.permission.GET_TASKS;com.ss.android.article.news.permission.MIPUSH_RECEIVE;android.permission.CAMERA;android.permission.READ_EXTERNAL_STORAGE;android.permission.CALL_PHONE;android.permission.READ_SMS;android.permission.RECEIVE_SMS;android.permission.RESTART_PACKAGES;android.permission.SEND_SMS;android.permission.SYSTEM_ALERT_WINDOW;android.permission.VIBRATE;android.permission.DISABLE_KEYGUARD;android.permission.CHANGE_NETWORK_STATE;android.permission.CHANGE_WIFI_STATE;cn.kuwo.player.permission.ACCESS_KUWO_SERVICE;android.permission.READ_LOGS;android.permission.ACCESS_MOCK_LOCATION;android.permission.ACCESS_LOCATION_EXTRA_COMMANDS;android.permission.MOUNT_UNMOUNT_FILESYSTEMS', ''),
(6, 6, '5.4.5', 1451010129, '26683450', 'Android 4.0, 4.0.1, 4.0.2', 6, 1, 14, 'com.netease.newsreader.activity', 450, 'android.permission.RECORD_AUDIO;android.permission.INTERNET;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.CHANGE_CONFIGURATION;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.READ_PHONE_STATE;android.permission.READ_LOGS;android.permission.WAKE_LOCK;android.permission.ACCESS_COARSE_LOCATION;com.netease.newsreader.permission.READ;com.netease.newsreader.permission.WRITE;com.android.launcher.permission.INSTALL_SHORTCUT;android.permission.CHANGE_WIFI_STATE;android.permission.CAMERA;android.permission.FLASHLIGHT;android.permission.ACCESS_FINE_LOCATION;android.permission.MOUNT_UNMOUNT_FILESYSTEMS;android.permission.WRITE_SETTINGS;android.permission.VIBRATE;android.permission.RECEIVE_BOOT_COMPLETED;android.permission.SYSTEM_ALERT_WINDOW;android.permission.GET_TASKS;com.android.permission.SEND_NETEASE_POMELO_PUSH_SERVICE_NEWS;android.permission.RESTART_PACKAGES;com.android.browser.permission.READ_HISTORY_BOOKMARKS;android.permission.CHANGE_NETWORK_STATE;android.permission.READ_EXTERNAL_STORAGE;android.permission.MODIFY_AUDIO_SETTINGS;android.permission.READ_SYNC_SETTINGS;android.permission.WRITE_SYNC_SETTINGS;android.permission.AUTHENTICATE_ACCOUNTS;com.netease.newsreader.activity.permission.MIPUSH_RECEIVE', ''),
(7, 7, '5.0.0', 1451010129, '10692340', 'Android 2.3, 2.3.1, 2.3.2', 7, 1, 9, 'com.chaozh.iReaderFree', 501, 'android.permission.READ_PHONE_STATE;android.permission.INTERNET;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.ACCESS_NETWORK_STATE;android.permission.CHANGE_NETWORK_STATE;android.permission.SEND_SMS;android.permission.VIBRATE;android.permission.WRITE_SETTINGS;com.android.launcher.permission.READ_SETTINGS;com.android.launcher.permission.INSTALL_SHORTCUT;android.permission.ACCESS_WIFI_STATE;android.permission.CHANGE_WIFI_STATE;android.permission.ACCESS_FINE_LOCATION;android.permission.ACCESS_COARSE_LOCATION;android.permission.CAMERA;android.permission.FLASHLIGHT;android.permission.READ_EXTERNAL_STORAGE;android.permission.READ_LOGS;android.permission.WAKE_LOCK;android.permission.RECEIVE_USER_PRESENT;android.permission.RECEIVE_BOOT_COMPLETED;android.permission.SYSTEM_ALERT_WINDOW;android.permission.DISABLE_KEYGUARD;android.permission.GET_TASKS;android.permission.READ_SMS;android.permission.READ_SETTINGS;android.permission.MOUNT_UNMOUNT_FILESYSTEMS;android.permission.RECORD_AUDIO;android.permission.MODIFY_AUDIO_SETTINGS;org.simalliance.openmobileapi.SMARTCARD', ''),
(8, 8, '4.0.3', 1451013076, '31589246', 'Android 4.1, 4.1.1', 0, 1, 8, 'com.popcap.gp.minions', 3, 'android.permission.INTERNET;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.READ_EXTERNAL_STORAGE;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.READ_PHONE_STATE;android.permission.BLUETOOTH;android.permission.WRITE_SETTINGS;android.permission.ACCESS_FINE_LOCATION;android.permission.ACCESS_COARSE_LOCATION;android.permission.GET_TASKS;android.permission.GET_ACCOUNTS;com.android.vending.BILLING;android.permission.VIBRATE;android.permission.WAKE_LOCK;com.google.android.c2dm.permission.RECEIVE;com.ea.gp.minions.permission.C2D_MESSAGE;android.permission.SEND_SMS;android.permission.CHANGE_NETWORK_STATE;android.permission.CHANGE_WIFI_STATE;android.permission.SYSTEM_ALERT_WINDOW;android.permission.READ_CONTACTS;android.permission.READ_SMS;android.permission.WRITE_SMS;android.permission.RECEIVE_SMS;android.permission.RESTART_PACKAGES;android.permission.MOUNT_UNMOUNT_FILESYSTEMS;android.permission.MODIFY_AUDIO_SETTINGS;android.webkit.permission.PLUGIN;android.permission.MANAGE_ACCOUNTS;android.permission.AUTHENTICATE_ACCOUNTS;android.permission.USE_CREDENTIALS;android.permission.READ_SETTINGS;android.permission.RECORD_AUDIO', ''),
(9, 9, '1.11.3', 1451013090, '53920758', 'Android 2.3, 2.3.1, 2.3.2', 9, 1, 9, 'com.zzy.bigdevil.s360', 1, 'android.permission.INTERNET;android.permission.CHANGE_NETWORK_STATE;android.permission.CHANGE_WIFI_STATE;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.MOUNT_UNMOUNT_FILESYSTEMS;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.READ_PHONE_STATE;android.permission.WAKE_LOCK;android.permission.READ_LOGS;android.permission.GET_TASKS;android.permission.SEND_SMS;android.permission.SYSTEM_ALERT_WINDOW;android.permission.READ_CONTACTS;android.permission.WRITE_SMS;android.permission.RECORD_AUDIO;android.permission.READ_EXTERNAL_STORAGE;android.permission.RECEIVE_SMS;android.permission.ACCESS_COARSE_LOCATION;android.permission.ACCESS_FINE_LOCATION;android.permission.RESTART_PACKAGES;android.webkit.permission.PLUGIN;android.permission.VIBRATE;android.permission.MODIFY_AUDIO_SETTINGS;android.permission.GET_ACCOUNTS;android.permission.MANAGE_ACCOUNTS;android.permission.AUTHENTICATE_ACCOUNTS;android.permission.USE_CREDENTIALS;android.permission.WRITE_SETTINGS;android.permission.READ_SETTINGS', ''),
(10, 10, '1.1.8', 1451013089, '133267831', 'Android 2.3, 2.3.1, 2.3.2', 10, 1, 9, 'com.youzu.dahuangdi.qihoo360', 22, 'android.permission.INTERNET;android.permission.RECORD_AUDIO;android.permission.CHANGE_NETWORK_STATE;android.permission.CHANGE_WIFI_STATE;android.permission.ACCESS_NETWORK_STATE;android.permission.ACCESS_WIFI_STATE;android.permission.MOUNT_UNMOUNT_FILESYSTEMS;android.permission.WRITE_EXTERNAL_STORAGE;android.permission.ACCESS_FINE_LOCATION;android.permission.READ_CONTACTS;android.permission.WAKE_LOCK;android.permission.READ_PHONE_STATE;android.permission.DEVICE_POWER;android.permission.RECEIVE_BOOT_COMPLETED;android.permission.GET_TASKS;android.permission.MANAGE_ACCOUNTS;android.permission.GET_ACCOUNTS;android.permission.BLUETOOTH;android.permission.BLUETOOTH_ADMIN;android.permission.SEND_SMS;android.permission.SYSTEM_ALERT_WINDOW;android.permission.WRITE_SMS;android.permission.READ_EXTERNAL_STORAGE;android.permission.RECEIVE_SMS;android.permission.ACCESS_COARSE_LOCATION;android.permission.RESTART_PACKAGES;android.webkit.permission.PLUGIN;android.permission.VIBRATE;android.permission.MODIFY_AUDIO_SETTINGS;android.permission.AUTHENTICATE_ACCOUNTS;android.permission.USE_CREDENTIALS;android.permission.WRITE_SETTINGS;android.permission.READ_SETTINGS', '')$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>resource`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>resource` (`id`, `info_app_id`, `type`, `resource_url`, `width`, `height`, `size`) VALUES
(1, 1, 0, 'http://p15.qhimg.com/t01a51aa3e5b4b4bdf6.png', 0, 0, 0),
(2, 1, 0, 'http://p19.qhimg.com/t017449ae7e2d3b7016.png', 0, 0, 0),
(3, 1, 0, 'http://p19.qhimg.com/t016605aeffc0aa8887.png', 0, 0, 0),
(4, 1, 0, 'http://p17.qhimg.com/t01119208d29c0ba2b3.png', 0, 0, 0),
(5, 1, 0, 'http://p16.qhimg.com/t01a1600c26831e03d0.png', 0, 0, 0),
(6, 2, 0, 'http://p17.qhimg.com/t0135cb30a6a7584382.png', 0, 0, 0),
(7, 2, 0, 'http://p16.qhimg.com/t01620fcd4bd6566223.png', 0, 0, 0),
(8, 2, 0, 'http://p17.qhimg.com/t01a9e8b75ab5360fed.png', 0, 0, 0),
(9, 2, 0, 'http://p17.qhimg.com/t01df8a9ec4d12b9d70.png', 0, 0, 0),
(10, 2, 0, 'http://p17.qhimg.com/t01cb68fdec833de022.png', 0, 0, 0),
(11, 3, 0, 'http://p15.qhimg.com/t01b4355ec6d5bace58.png', 0, 0, 0),
(12, 3, 0, 'http://p17.qhimg.com/t015287dbd6c81b43ee.png', 0, 0, 0),
(13, 3, 0, 'http://p19.qhimg.com/t01e882837746ffa40b.png', 0, 0, 0),
(14, 3, 0, 'http://p17.qhimg.com/t01557476f024da1eaf.png', 0, 0, 0),
(15, 3, 0, 'http://p19.qhimg.com/t017fbe58e24aa31170.png', 0, 0, 0),
(16, 4, 0, 'http://p19.qhimg.com/t01b8082c429aa4b4d5.jpg', 0, 0, 0),
(17, 4, 0, 'http://p15.qhimg.com/t01b684fde76e882513.jpg', 0, 0, 0),
(18, 4, 0, 'http://p18.qhimg.com/t019da21d101e14add1.jpg', 0, 0, 0),
(19, 4, 0, 'http://p17.qhimg.com/t01c15070a5ec92ee3e.jpg', 0, 0, 0),
(20, 4, 0, 'http://p16.qhimg.com/t01efc89c2e2f673c0c.jpg', 0, 0, 0),
(21, 5, 0, 'http://p19.qhimg.com/t0188462b418890357c.jpg', 0, 0, 0),
(22, 5, 0, 'http://p15.qhimg.com/t0198235422d6cf1854.jpg', 0, 0, 0),
(23, 5, 0, 'http://p17.qhimg.com/t014f9821af9095768c.jpg', 0, 0, 0),
(24, 5, 0, 'http://p17.qhimg.com/t01c10e21151da5e264.jpg', 0, 0, 0),
(25, 5, 0, 'http://p15.qhimg.com/t01212eb16984e5dcca.jpg', 0, 0, 0),
(26, 6, 0, 'http://p17.qhimg.com/t012b86b0cc7fba671e.png', 0, 0, 0),
(27, 6, 0, 'http://p17.qhimg.com/t01f8f70660c1fd3f3c.png', 0, 0, 0),
(28, 6, 0, 'http://p15.qhimg.com/t0152f0eab8eba390ed.png', 0, 0, 0),
(29, 6, 0, 'http://p16.qhimg.com/t01b749301128c42424.png', 0, 0, 0),
(30, 6, 0, 'http://p19.qhimg.com/t018dd71d0cab155dbd.png', 0, 0, 0),
(31, 7, 0, 'http://p18.qhimg.com/t01cf4f198afaa8f99b.jpg', 0, 0, 0),
(32, 7, 0, 'http://p15.qhimg.com/t012a1389e54e064023.jpg', 0, 0, 0),
(33, 7, 0, 'http://p19.qhimg.com/t01e2fffb9d071495da.jpg', 0, 0, 0),
(34, 7, 0, 'http://p16.qhimg.com/t016b41bfec6a6a5eab.jpg', 0, 0, 0),
(35, 8, 0, 'http://p16.qhimg.com/t01a3148273e75e0bf4.jpg', 0, 0, 0),
(36, 8, 0, 'http://p15.qhimg.com/t017cd7f2917af83013.jpg', 0, 0, 0),
(37, 8, 0, 'http://p19.qhimg.com/t01483a3d3fbf882570.jpg', 0, 0, 0),
(38, 8, 0, 'http://p15.qhimg.com/t01f11c4c338d722618.jpg', 0, 0, 0),
(39, 8, 0, 'http://p19.qhimg.com/t012d509b972c8c297a.jpg', 0, 0, 0),
(40, 9, 0, 'http://p15.qhimg.com/t01c7f1d3544cadf35a.jpg', 0, 0, 0),
(41, 9, 0, 'http://p16.qhimg.com/t0166b22550db563826.jpg', 0, 0, 0),
(42, 9, 0, 'http://p19.qhimg.com/t011c29f07ad0d4476f.jpg', 0, 0, 0),
(43, 9, 0, 'http://p18.qhimg.com/t01b72aecea764b3a0d.jpg', 0, 0, 0),
(44, 9, 0, 'http://p18.qhimg.com/t01fd588190d3d29c76.jpg', 0, 0, 0),
(45, 10, 0, 'http://p19.qhimg.com/t015ddf766e5b6fa24c.jpg', 0, 0, 0),
(46, 10, 0, 'http://p16.qhimg.com/t01c0b692b8136e6be9.jpg', 0, 0, 0),
(47, 10, 0, 'http://p16.qhimg.com/t01ecf4c78f95f04191.jpg', 0, 0, 0),
(48, 10, 0, 'http://p17.qhimg.com/t013004af84d5a11bd6.jpg', 0, 0, 0),
(49, 10, 0, 'http://p17.qhimg.com/t01a060a98b1b65c5ee.jpg', 0, 0, 0)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>gather`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>gather` (`gather_id`, `gather_name`, `gather_site`, `cate_id`, `gather_charset`, `gather_is_local`, `gather_index_url`, `gather_list_url`, `gather_page_start`, `gather_page_end`, `gather_list_sign`, `gather_list_link`, `gather_title_sign`, `gather_content_sign`, `gather_time`, `uid`) VALUES
(1, '新作前瞻', 'http://wy.92wy.com', 2, 'UTF-8', 1, '', 'http://wy.92wy.com/news/30/list_{page}.html', 1, 1, '.list2', 'li a', 'h2,h3', '.info_text_con,.articlecontent', 1440760845, 1),
(2, '手机网游攻略', 'http://sj.xiaopi.com', 3, 'UTF-8', 1, '', 'http://sj.xiaopi.com/news/gonglue_{page}.html', 2, 3, '.wzlb_list', '.wzlb_list_img a', '.top_title', '.article_main', 1440926227, 1),
(3, '安卓资讯', 'http://android.d.cn', 4, 'UTF-8', 1, '', 'http://android.d.cn/news/0/-1/{page}/', 2, 3, '.info-list', '.first  a', '.article h1', '#content', 1442307687, 1)$$

TRUNCATE TABLE `<?php echo $params['dbprefix']; ?>info`$$
INSERT INTO `<?php echo $params['dbprefix']; ?>info` (`info_id`, `last_cate_id`, `info_title`, `info_stitle`, `info_img`, `info_desc`, `info_body`, `info_tags`, `info_update_time`, `create_time`, `info_from`, `uid`, `info_comments`, `info_visitors`, `info_order`, `info_url`, `info_publish_time`, `info_seodesc`, `info_seokey`, `info_status`, `info_author`) VALUES
(24, 4, '《NBA英雄》柏林英雄礼 诺天王伟大的告别', '《NBA英雄》柏林英雄礼 诺天王伟大的告别', '', '', '<p>　2015年欧洲男子篮球锦标赛，德国队对阵西班牙队之前获得1胜3负的战绩，只有赢下这场比赛才有出现的机会。可惜最终事与愿违，德国队遗憾落败，为本届欧洲男子篮球锦标赛画上并不完美的句号。最温情的画面莫过于最终结束时，属于德克·诺维茨基的时刻。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　德国对西班牙的男篮欧锦赛小组赛结束后，当诺维茨基转身走回赛场中间，他立刻得到了全场观众的鼓掌欢呼，诺天王向四周观众席几次挥手、鞠躬，作为一名土生土长的德国人，诺维茨基在主场球迷的欢呼声中，情不自禁流下了激动的泪水，最后用球衣拭去脸上的泪水，消失在球员通道。这也许是37岁的老男孩最后一次身披德国国家队队服出战，泪洒球场诉说这位德国英雄的传奇生涯。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　“感谢大家这一周时间的支持，感谢你们赠与我一场伟大的告别。”诺维茨基赛后在社交网络上这样写道，“这个时刻我永生不忘，对我而言这始终是一份荣耀。”诺维茨基为了欧锦赛如此卖力备战，而他在国家队中的核心地位也已让给了老鹰队后卫施罗德。对阵西班牙的比赛中，诺维茨基在西班牙队米罗蒂奇的贴身盯防下无所适从，但他依然能在最后时刻命中关键球，带领球队奋起反击。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　如今在球队中已不再是头号得分手，但诺维茨基绝对是球队的精神领袖，他在国家队中经历的一切，足以成为一笔宝贵的精神财富。“他是一位伟大的运动员，也是一位实现伟大梦想的德国人。”德国总理默克尔曾这样评价诺维茨基，“篮球并不是德国最受欢迎的运动，但他让更多人热爱上篮球，这是值得被赞扬的。”</p>\r\n', '', 1442988423, 1442199952, '', 1, 0, 1, 0, '', 0, '《NBA英雄》柏林英雄礼 诺天王伟大的告别', '《NBA英雄》柏林英雄礼 诺天王伟大的告别', 1, ''),
(25, 3, '打造完美恋人 《正妹物语》女友养成记', '', '', '', '<p>“夏天夏天悄悄过去留下小秘密 压心底 压心底 不能告诉你~晚风吹过温暖我心底 我又想起你 多甜蜜 多甜蜜 怎能忘记~”哈哈，夏天就剩下一个小尾巴了，你的粉红色记忆找到了吗?没有到话就来《正妹物语》看看吧，好多好多漂亮可爱的萌妹子都在这等着你哦~</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　由深圳微讯移通独家代理的真人女友恋爱养成手游《正妹物语》手把手教你泡正妹，各色女神任君挑选，性感魅惑、清纯可人、温柔体贴、妩媚动人...只要你要，只要我有。养成完美恋人，百变女神给你前所未有的恋爱新体验，夏日脱单ing~</p>\r\n\r\n<p>　　天气正慢慢褪去燥热，但玩家们的热情却持续上升，为了和女神交盆友，大家也是蛮拼的~好吧，为了回馈众男神，《正妹物语》又要出大招了，这一发的大招绝对甜到你心里!!</p>\r\n\r\n<p>　　没有错!又有新女神要来做你们的女朋友啦!高不高兴，期不期待，嗨不嗨!世界都变美好了对不对!哈哈，这次新版本即将上线的妹纸到底是个什么类型的女神呢?小编表示，这次的妹子绝对是所有男性无法抗拒的诱惑，想要吗><</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　新鲜的女神就像多汁的水蜜桃一样诱人，但是想吃到可不是那么容易的事情哦~耐心等待吧，新版本上线之日，就是迎娶女神之时，后宫妹子那么多，可都要好好安抚哟~除此之外，《正妹物语》公测即将开启，到时候又有一大波惊喜等着大家咯，鸡血打起来，人生巅峰就要来啦!!</p>\r\n\r\n<p>　　快来《正妹物语》领个女友回家养着吧，会撒娇会卖萌长得漂亮身材巨棒，女神将临，你准备好了吗~</p>\r\n', '', 1442988416, 1442200092, '', 1, 0, 2, 0, '', 0, '', '', 1, ''),
(26, 4, '决战魔窟 《魔力时代》英魂圣能之战', '', '', '', '<p>《魔力时代》常用的游戏资源除了金币和钻石之外，还有英魂和圣能。《魔力时代》中没有“穷人”，只有不努力获取资源的人。所有你所需要的资源，你都可以通过在游戏攻打副本或者其他玩法来获取，英魂和圣能也是如此，勇者们快到深渊魔窟中战斗，抢夺英魂和圣能吧!</p>\r\n', '', 1444981482, 1442200229, '', 1, 0, 0, 0, '', 1444981508, '', '', 2, ''),
(23, 2, '《全民飞机大战》太阳级新战机嫦娥测评', '《全民飞机大战》太阳级新战机嫦娥测评', '', '', '<p>《全民飞机大战》宠物革新时代降临，神级皇冠宠物纷纷登场，掀起合宠热潮!此次，神宠版本再添惊喜，拥有更强属性、更全面技能的太阳战机——嫦娥强势上架商城!首款太阳战机会有怎样的表现?小编带大家一起揭晓!</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　嫦娥满级属性：</p>\r\n\r\n<p>　　品质：三太阳</p>\r\n\r\n<p>　　生命值：1600</p>\r\n\r\n<p>　　攻击力：2180</p>\r\n\r\n<p>　　攻击速度：250</p>\r\n\r\n<p>　　战机技能：</p>\r\n\r\n<p>　　【弦乐之舞】：每损失300生命(双打模式为600)时舞蹈弦乐之舞将屏幕内的敌机变成伴舞的兔子，兔子移动速度降低，停止发射子弹，舞蹈时流转的圆刃秒杀周围敌机，并对boss或首领造成伤害，持续8秒，释放期间嫦娥免伤。技能开始与结束时均造成清屏爆炸，累积最高造成1000000伤害。</p>\r\n\r\n<p>　　【圆月之舞】：主动使用后与友机同时进入免伤状态，并召唤出共同控制的灵体舞蹈圆月之舞将屏幕内的敌机变成伴舞的兔子，兔子移动速度降低，停止发射子弹，期间对全屏敌机造成伤害，舞蹈时流转的圆刃秒杀周围的敌机，并对boss或首领造成伤害，持续12秒。技能释放前后均造成清屏爆炸，累积最高造成1600000伤害。冷却时间300秒。</p>\r\n\r\n<p>　　【月轮斩】：每秒发射2个圆刃，共造成5000伤害。</p>\r\n\r\n<p>　　【月华冰心】：击杀boss或首领回血320点，并且最终结算时，击杀boss或首领的基础得分加成160%，友机基础得分加成80%。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　嫦娥不愧为帝俊之女、后羿之妻，不仅貌美非凡，实力也不容小觑。作为《全民飞机大战》首架太阳级战机，嫦娥的等级可升至100，攻击速度为战机最高水平，满级攻击力与生命力也远超月亮级战机登上顶峰。如此娇艳美人、如此强势属性，定会迎来新一轮购机狂潮!</p>\r\n\r\n<p>　　而更为逆天的则是嫦娥的技能设定，不仅实用强力，在弹幕和技能释放的视觉效果上也是绝佳!嫦娥拥有四项技能，且有三项技能都为双打模式做了特别设计。“月华冰心”不仅拥有得分加成，击杀boss还可回血，增强战机续航能力;配合“弦乐之舞”这一华丽的损血技能，所有敌机都变成人畜无害的兔子，嫦娥挥舞圆刃瞬杀敌机，并能对boss或首领造成极高伤害，还有二重清屏效果再增输出，就是如此暴力，就是这么任性!</p>\r\n\r\n<p>　　嫦娥还拥有首项主动技能“圆月之舞”，免伤加超高输出、全屏伤害再加双重清屏，绝对神技!更惊喜的是，在双打模式下，除自身可用之外，友军也会拥有免伤状态，并控制灵体舞蹈，双打更加游刃有余，与好友更轻松遨游飞行上空!触发被动和主动时，嫦娥处于是无敌状态，释放技能无障碍!“月轮斩”则进一步加强了嫦娥的输出能力，可分担旁支威胁。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　在搭配上，小编推荐天空三件套，如果没有天空也可铁流套装，都是高伤高防的组合。小编宠物搭配了月宫神兔与幽蓝之星，护盾加回血续航能力可见一斑，攻击加成为战机增强输出，还有得分加成为玩家登榜再添一力。有了这样完美的搭配，无论遇到多刁难的boss都能无所畏惧轻易击杀!</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　嫦娥作为首架太阳战机，属性为现今最高，技能也极其强势，是非常完美的战机。而且在活动期间将嫦娥升到满级还可获赠皇冠宠月宫神兔，嫦娥搭配月兔当然是极好的，心动的玩家可别错过了!</p>\r\n', '', 1442988428, 1442199542, '', 1, 0, 33, 0, '', 0, '《全民飞机大战》太阳级新战机嫦娥测评', '《全民飞机大战》太阳级新战机嫦娥测评', 1, ''),
(22, 4, '科幻手游《小兵传奇》公测火爆开启 同名小说正版授权', '', '', '', '<p>在9月12日，由广州49You重金独代、网络人气作家玄雨授权并亲自监制、2015年超高期待的同名科幻手游《小兵传奇》已经华丽开启全网公测。公测后如何在最快时间融入游戏也是玩家们关心的话题，今天咱们就来为新手们支一招，看看前辈们都是怎么在游戏中捷足先登的吧!</p>\r\n\r\n<p>　　在49You《小兵传奇》这款游戏里面，阵型搭配是非常讲究的，而且阵型也是非常中国传统兵法特色。《孙子兵法》读得再多也都是纸上谈兵，咱们到了这里就要学会实战运用，而这，就是49You《小兵传奇》一大亮点之一。玩家要合理根据英雄的属性，来决定前后排站位，从而组成最高的输出战力。同时也要合理安排替补，以便应对突发情况。如果你平时有看足球篮球比赛，场边那个运筹帷幄、掌控全局的主教练就是你在《小兵传奇》中的形象哦!</p>\r\n\r\n<p><img alt="小兵传奇公测" src="http://www.xiaopi.com/game/uploadfile/2015/0914/20150914093653784.jpg" /></p>\r\n\r\n<p>　　英雄系统是玩法中的重点，而命运系统又是决定英雄战斗力的关键玩法。49You《小兵传奇》里英雄的战斗力除了来源于自身能力和道具装备外，更加依赖于自身与其他上阵英雄或特定装备产生的“命运”。替补中的角色也是可以作为出阵英雄存在的，上阵英雄的“命运”除了阵内角色外，与替补英雄同样也可以产生联系。这样一来就可以产生多种多样的命运组合啦，赶紧去试一试啦。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　在新游戏里，大家往往会东转西转找不到北，错过最佳练级和成长的机会，49You《小兵传奇》为大家提供了一个很好的平台方便大家完成每天的任务，更快的升级进阶，从此妈妈再也不用担心我的战斗力了!只要有体力就去刷图，有体力药剂就猛磕体力药剂，每天买满体力药剂，买满各种箱子开出体力药剂，级别就能拉开很多。</p>\r\n\r\n<p> </p>\r\n\r\n<p>　　除此之外，公测开启的同时伴随着还有众多豪礼来袭，比如像登陆有惊喜、累积充值等等活动都一一俱全;并且还会有星际动荡“天下第一”、“命运北斗”再次开启这样的趣味活动同步上线!而且所有充值项首充都可以获得双倍返还，并且充值就送10%，充值100元以上可获送15%，赶紧来参加吧!</p>\r\n', '', 1442988434, 1442199465, '711cms', 1, 0, 12, 0, '', 0, '', '', 1, '')$$
