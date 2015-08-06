# phpstudy
bbs is powered by discuz.
template/default/common 模板公共文件夹，全局相关
    |--block_forumtree.htm 树形论坛版块分支js文件
    |--block_thread.htm 特殊主题的风格模块文件
    |--block_userinfo.htm 用户资料的风格模块
    |--common.css 全局公共css文件（所有页面加载）
    |--css_diy.css DIY模式里整个页面的css样式表
    |--css_sample.htm
    |--css_space.css
    |--editor.css 编辑器css样式文件
    |--editor.htm 编辑器
    |--editor_menu.htm 编辑器菜单文件    
    |--faq.htm 帮助
    |--footer.htm 全局底部
    |--footer_ajax.htm ajax模式是使用到的系统总底部模板
    |--forum_calendar.css  广场社区使用到的日历日期样式
    |--forum_moderator.css 版主管理面板样式
    |--header.htm 全局头部
    |--header_ajax.htm ajax模式时使用到的系统总头部文件
    |--header_common.htm 全局头部被header.htm加载
    |--header_diy.htm DIY模式下的头部
    |--invite.htm 邀请朋友 相应链接
    |--module.css 各模块css阅读有关此文件的设置    |--preview.htm 预览的模版文件
    |--pubsearchform.htm 页头搜索条加载
    |--report.htm 举报模板文件
    |--rss.css rss样式表
    |--seccheck.htm 验证码验证模板文件
    |--seditor.htm 编辑器菜单栏
    |--sendmail.htm 发送email内容模板文件
    |--showmessage.htm 提示信息
    |--simplesearchform.htm 当前位置搜索框加载
    |--stat.htm 站点统计左边栏 相应链接
    |--userabout.htm 家园模块左边栏
    |--widthauto.css 切换宽屏时读取的css，如果你调整了论坛的宽度，这里也要调整
    |--wysiwyg.css

==================================================
template/default/forum 广场模块模板文件夹

    |--activity_applylist.htm 活动列表模板文件
    |--activity_export.htm 活动资料内容模板文件
    |--ajax_albumlist.htm ajax获取相册列表模板文件
    |--ajax_attachlist.htm ajax获取附件列表模板文件
    |--ajax_imagelist.htm ajax获取图片列表模板文件
    |--ajax_secondgroup.htm 
    |--announcement.htm 广场公告模板文件
    |--attachpay.htm 附件金币积分支付模板文件
    |--attachpay_view.htm 附件金币积分支付查看模板文件
    |--comment.htm 评论模板文件
    |--comment_more.htm 更多评论模板文件
    |--debate_umpire.htm 辩论模板文件
    |--discuz.htm 广场社区首页模板
    |--discuzcode.htm 编辑器模板文件
    |--editor_menu_forum.htm 广场中编辑器菜单模板文件
    |--forumdisplay.htm 主题列表页
    |--forumdisplay_fastpost.htm 列表页快速发帖框
    |--forumdisplay_list.htm 主题列表页-帖子列表区域
    |--forumdisplay_passwd.htm 进入版块输入密码的界面
    |--forumdisplay_subforum.htm 主题列表页子板块
    |--index.htm 空白文件
    |--index_navbar.htm 广场首页导航栏模板文件
    |--modcp.htm 管理面板模板文件
    |--modcp_announcement.htm 管理面板公告管理页面模板
    |--modcp_forum.htm 管理面板广场管理页面模板
    |--modcp_forumaccess.htm 管理面板用户权限管理页面模板
    |--modcp_home.htm 管理面板内部留言管理页面模板
    |--modcp_log.htm 管理面板管理日志页面模板
    |--modcp_login.htm 管理面板登录页面
    |--modcp_member.htm 管理面板用户管理页面模板
    |--modcp_moderate.htm 管理面板审核页面模板
    |--modcp_moderate_float.htm 管理面板审核页面模板
    |--modcp_post.htm 管理面板发帖管理模板
    |--modcp_recyclebin.htm 管理面板回收站模板
    |--modcp_thread.htm 管理面板主题管理模板
    |--pay.htm 支付页面模板
    |--pay_view.htm 支付结果查看模板
    |--post.htm 发帖页面模板
    |--post_activity.htm 活动发布页面模板
    |--post_debate.htm 辩论发布模板
    |--post_forumselect.htm 版块选择模板
    |--post_infloat.htm ajax发布主题模板
    |--post_poll.htm 投票贴发布模板
    |--post_reward.htm 悬赏帖发布模板
    |--post_sortoption.htm 主题分类选择模板
    |--post_trade.htm 交易帖发布模板
    |--postappend.htm 
    |--rate.htm 主题评分模板
    |--rate_view.htm 主题评分查看模板
    |--recommend.htm 主题推荐模板
    |--relatekw.htm
    |--search_sortoption.htm 主题分类选项搜索模板
    |--stat_main.htm
    |--stat_memberlist.htm
    |--stat_misc.htm
    |--stat_onlinetime.htm
    |--stat_team.htm
    |--stat_trade.htm
    |--topicadmin.htm 话题管理页面模板
    |--topicadmin_action.htm 话题管理动作页面模板
    |--topicadmin_getip.htm 话题管理页面获取IP模板
    |--topicadmin_modlayer.htm 管理管理推送群组操作模板
    |--trade.htm 商品交易主题模板
    |--trade_displayorder.htm 商品排序模板
    |--trade_info.htm 商品交易详细资料模板
    |--trade_view.htm 商品交易浏览页面模板
    |--upload.htm 上传模板文件
    |--viewthread.htm  帖子阅读页面
    |--viewthread_activity.htm 阅读页查看活动页面模板
    |--viewthread_debate.htm 阅读页查看辩论页面模板
    |--viewthread_fastpost.htm 阅读页快速回复模板
    |--viewthread_from_node.htm 特殊主题回复模板
    |--viewthread_mod.htm 主题操作记录模板
    |--viewthread_node.htm 阅读页楼层模板文件  被viewthread.htm加载
    |--viewthread_node_body.htm 阅读页楼层阅读区域模板文件被      viewthread_node.htm加载
    |--viewthread_pay.htm 主题支付模板
    |--viewthread_poll.htm 投票主题查看模板
    |--viewthread_poll_voter.htm 投票主题参与者查看模板
    |--viewthread_portal.htm 门户模式主题查看页模板
    |--viewthread_printable.htm 打印主题模式模板
    |--viewthread_reward.htm 悬赏主题查看模板
    |--viewthread_trade.htm 查看交易主题模板
    |--warn_view.htm 错误报告页面，无需其他报错模板即可执行 
================================================== 
template/default/group 群组模块模板文件夹
    |--group.htm 群组模块首页模板文件
    |--group_attentiongroup.htm 
    |--group_create.htm 群组创建时使用到的模板
    |--group_index.htm 群组首页模板
    |--group_invite.htm 邀请参与群组的模板
    |--group_list.htm 群组列表
    |--group_manage.htm 管理群组的模板
    |--group_memberlist.htm 群组中参与用户的列表
    |--group_my.htm
    |--group_recommend.htm
    |--group_right.htm 群组右侧边栏
    |--index.htm 空白文件
================================================== 
template/default/home 家园模块模板文件夹
    |--invite.htm  空间邀请页面
    |--magic_call.htm  通知好友魔法道具模板
    |--magic_doodle.htm  涂鸦魔法道具模板
    |--magic_downdateline.htm  修改时间的魔法道具模板
    |--magic_visit.htm  访问卡魔法道具模板
    |--misc_ajax.htm  杂项ajax操作模板
    |--misc_inputpwd.htm 密码输入模板
    |--misc_login.htm  杂项登录操作模板
    |--misc_lostpasswd.htm  忘记密码操作模板
    |--misc_register.htm  杂项注册操作模板
    |--misc_stat.htm  杂项统计页面模板
    |--misc_swfupload.htm  FLASH上传模板
    |--network.css  随便看看页CSS样式文件
    |--sendmail.htm  发系统email的模板
    |--space_activity.htm  空间活动页面模板
    |--space_album_list.htm  空间相册列表页面模板
    |--space_album_pic.htm  空间相册图片模板
    |--space_album_view.htm  空间相册浏览模板
    |--space_blog_list.htm 空间日志列表模板
    |--space_blog_view.htm 空间日志浏览模板
    |--space_click.htm  表态模板
    |--space_card.htm X1.5名片模板
    |--space_comment_li.htm  评论模板
    |--space_debate.htm  辩论模板
    |--space_diy.htm  空间DIY模板
    |--space_doing.htm  心情记录模板
    |--space_doing_form.htm  心情记录发送的模板
    |--space_doing_li.htm  心情记录的列表模板
    |--space_favorite.htm  空间收藏模板
    |--space_feed_li.htm  feed事件列表模板
    |--space_footer.htm  空间底部模板
    |--space_friend.htm  空间好友模板
    |--space_group.htm  空间群组模板
    |--space_header.htm  空间头部模板
    |--space_home.htm  空间home页模板
    |--space_index.css  个人空间首页CSS样式文件
    |--space_index.htm  个人空间首页模板
    |--space_list.htm  空间列表页模板
    |--space_magic.htm  空间魔法道具模板
    |--space_magic_log.htm  魔法道具使用记录模板
    |--space_magic_mybox.htm  本人所拥有的魔法道具模板
    |--space_magic_mybox_opreation.htm  魔法道具操作动作的模板
    |--space_magic_shop.htm  魔法道具商城模板
    |--space_magic_shop_opreation.htm  魔法道具操作动作的模板
    |--space_medal.htm  空间勋章
    |--space_menu.htm  空间菜单项模板
    |--space_notice.htm  空间公告模板
    |--space_pm.htm  空间短消息模板
    |--space_poll.htm  空间投票模板
    |--space_privacy.htm  空间隐私模板
    |--space_profile.htm 空间用户资料页模板
    |--space_reward.htm  空间悬赏模板
    |--space_rss.htm  空间rss订阅模板
    |--space_share_form.htm  空间分享来源模板
    |--space_share_li.htm  空间分享模板
    |--space_share_list.htm  空间分享列表模板
    |--space_share_view.htm  空间查看模板
    |--space_status.htm  空间状态模板
    |--space_task.htm  任务模板
    |--space_task_detail.htm  小任务模板
    |--space_task_list.htm  任务列表模板
    |--space_task_parter.htm  参与任务模板
    |--space_thread.htm  空间的主题帖模板
    |--space_top.htm  空间头部模板
    |--space_trade.htm  空间商品交易主题模板
    |--space_userabout.htm  空间用户面板模板
    |--space_videophoto.htm  视频相册模板
    |--space_wall.htm  个人空间留言板
    |--spacecp_album.htm  空间管理面板相册页模板 
    |--spacecp_avatar.htm  空间管理面板修改头像页模板
    |--spacecp_blog.htm  空间管理面板日志页模板
    |--spacecp_class.htm  空间管理面板分类页模板
    |--spacecp_click.htm   空间表态页模板
    |--spacecp_comment.htm  空间管理面板评论页模板
    |--spacecp_credit_action.htm  空间积分动作页模板
    |--spacecp_credit_base.htm  空间基本积分页、兑换等模板
    |--spacecp_credit_header.htm  空间管理面板积分头部模板
    |--spacecp_credit_log.htm  空间管理面板积分操作记录模板
    |--spacecp_credit_usergroup.htm  空间管理面板积分与组别关系模板页面
    |--spacecp_doing.htm  空间管理面板心情记录模板
    |--spacecp_domain.htm  空间域名设置模板
    |--spacecp_ec_explain.htm  我要解释页模板
    |--spacecp_ec_list.htm 我的解释列表页模板
    |--spacecp_favorite.htm  空间管理面板收藏页模板
    |--spacecp_feed.htm  空间管理面板feed事件页模板
    |--spacecp_friend.htm  空间管理面板好友页模板
    |--spacecp_header.htm  空间管理面板头部
    |--spacecp_index.htm  空间管理面板首页
    |--spacecp_invite.htm  空间管理面板邀请页模板
    |--spacecp_magic.htm  空间管理面板魔法道具页模板
    |--spacecp_password.htm  空间管理面板修改密码页模板
    |--spacecp_plugin.htm  空间管理面板插件页模板
    |--spacecp_pm.htm  空间管理面板短消息页模板
    |--spacecp_poke.htm  空间管理面板打招呼页模板！
    |--spacecp_privacy.htm  隐私筛选页模板
    |--spacecp_profile.htm  空间个人资料编辑页模板
    |--spacecp_profile_nav.htm  空间个人资料编辑页导航条
    |--spacecp_search.htm  空间搜索页模板
    |--spacecp_sendmail.htm  空间邮件发送页模板
    |--spacecp_share.htm   空间分享管理页模板
    |--spacecp_space.htm  空间管理页模板
    |--spacecp_upload.htm  空间上传页模板
    |--spacecp_userapp.htm  用户应用页模板
    |--spacecp_videophoto.htm  视频相册页模板
=================================================
template/default/member 用户相关模板文件夹
    |--getpasswd.htm 找回密码模板文件
    |--groupexpiry.htm 用户组期限模板文件
    |--login.htm  用户登录模板文件
    |--register.htm  用户注册模板文件 
================================================= 
template/default/portal 广场模块模板文件夹
    |--comment.htm  评论页面模板文件
    |--comment_li.htm 评论操作模板文件
    |--index.htm  门户首页模板文件
    |--list.htm  门户文章分类默认列表页面 查看该文件帖子
    |--list_category_onerank.htm 文章分类单列模板 查看该文件帖子 
    |--list_category_tworanks.htm 文章分类两列模板 查看该文件帖子 
    |--portal_topic_content.htm  门户专题页面模板
    |--portalcp_article.htm 门户文章管理页面
    |--portalcp_block.htm  门户模块页面
    |--portalcp_category.htm  门户分类页面
    |--portalcp_comment.htm 门户管理评论操作模板文件
    |--portalcp_diy.htm  门户DIY模板文件
    |--portalcp_index.htm  门户管理首页模板文件
    |--portalcp_portalblock.htm  门户管理模块模板文件
    |--portalcp_portalblock_data.htm  门户管理模块数据模板文件
    |--portalcp_topic.htm  门户管理话题模板文件
    |--portalcp_topic_content.htm 门户管理话题内容页模板文件
    |--topic_footer.htm  话题底部模板
    |--topic_head.htm 话题顶部模板
    |--view.htm 文章查看页面 
================================================= 
template/default/search 搜索模块模板文件夹
    |--album.htm 搜索相册结果
    |--album_list.htm  搜索相册列表结果
    |--blog.htm  搜索日志结果
    |--blog_list.htm  搜索日志列表结果
    |--footer.htm 页面底部
    |--forum.htm  广场搜索页
    |--group.htm  群组搜索结果页面
    |--group_list.htm  群组搜索结果列表页面
    |--header.htm  页面头部
    |--portal.htm  门户搜索结果
    |--portal_list.htm 门户搜索结果列表页面
    |--pubsearch.htm  公共搜索页面
    |--sort_list.htm  分类信息列表页面
    |--sortoption.htm  分类信息页面
    |--thread_list.htm  主题列表页面
    |--trade.htm  商品页面 
================================================= 
template/default/ranklist 排行榜模板文件包
    |--activity.htm 活动排行榜
    |--blog.htm 日志排行榜
    |--forum.htm 版块排行榜
    |--group.htm 群组排行榜
    |--member.htm 用户排行榜
    |--member_list.htm 用户排行 数据列表区域 被上面文件加载
    |--picture.htm 图片排行榜
    |--poll.htm 投票排行榜
    |--ranklist.htm 排行榜首页
    |--side_left.htm 排行榜边栏
    |--thread.htm 帖子排行榜 
=================================================  
template/default/userapp 应用模块模板文件夹
    |--userapp_app.htm  用户应用
    |--userapp_index.htm  应用频道首页
    |--userapp_manage.htm  应用管理
    |--userapp_menu_list.htm  应用菜单列表

template/default/style

template/default/discuz_style_default.xml 风格配色备份xml数据，用于安装或恢复
template/default/preview.jpg 风格图片截图，用于后台界面风格里显示 

