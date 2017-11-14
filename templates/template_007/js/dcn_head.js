function getCookieLoginCommon(name) { // 获取cookie
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if(arr != null) {
      return decodeURI(unescape(arr[2], 'utf-8'));
    }
    return null;
  }

var aLi=document.getElementById("siteNav").getElementsByTagName("li");
	for(var i= 0,j = aLi.length;i < j;i += 1){
		aLi[i].onmouseover=function(){
			this.className += " hover";
			if(this.getElementsByTagName("div")[1]){
				this.getElementsByTagName("div")[1].style.display = "block";
			}
		}
		aLi[i].onmouseout=function(){
			this.className = this.className.replace("hover","");
			if(this.getElementsByTagName("div")[1]){
				this.getElementsByTagName("div")[1].style.display = "none";
			}
		}
	}

/*设置登陆后的一些信息*/
var SetLogin = {
    ifLogin: function(callback){
        return DJPASS().isAutoLogin(callback);
    },
    init: function () {
        var t = SetLogin;
        t.ifLogin(t.setLoginInfo);
        // DJPASS().qqLogin("qqLoginBtn", "A_M");
    },
    setLoginInfo: function () {
        var t = SetLogin;
        var userInfo;
        var avatar_url = "http://img.d.cn/2013/web_index/wwwdcn/images/default.jpg";
        t.memberInfo = getCookieLoginCommon("DJ_MEMBER_INFO");
        if(t.memberInfo != null){
            userInfo = decodeURI(t.memberInfo);
            var showName = userInfo.substring(0, userInfo.indexOf("("));
            var showNum = userInfo.substring(userInfo.indexOf("(") + 1, userInfo.indexOf(")"));
            var newMessageCnt = 0;
            var logined_html=[],message_html=[];
            logined_html.push('<div class="menuShow" id="logined_menuShow_top"><img id="avatar_url_top_id" class="user-head" src="'+avatar_url+'" title="" alt="">');
            logined_html.push('<img id="user-vip" class="user-vip dn" title="" alt="" src="data:image/jpg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMqaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAxNCA3OS4xNTE0ODEsIDIwMTMvMDMvMTMtMTI6MDk6MTUgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTBDMENCMUI0N0EyMTFFNThCMEQ4NzI0OEE4RTQ4QzYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTBDMENCMUM0N0EyMTFFNThCMEQ4NzI0OEE4RTQ4QzYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBMEMwQ0IxOTQ3QTIxMUU1OEIwRDg3MjQ4QThFNDhDNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBMEMwQ0IxQTQ3QTIxMUU1OEIwRDg3MjQ4QThFNDhDNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEAAYEBAQFBAYFBQYJBgUGCQsIBgYICwwKCgsKCgwQDAwMDAwMEAwODxAPDgwTExQUExMcGxsbHB8fHx8fHx8fHx8BBwcHDQwNGBAQGBoVERUaHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fH//AABEIAAkACQMBEQACEQEDEQH/xABwAAADAQAAAAAAAAAAAAAAAAAABAYHAQACAwEAAAAAAAAAAAAAAAAABQMEBgcQAAICAgAHAQAAAAAAAAAAAAECAwQAEUFhsZJTcxQ0EQACAQIDCQEAAAAAAAAAAAABAgARA1FxEkGRoTJSYnITMwT/2gAMAwEAAhEDEQA/ANimFRKcd1yrzSxmNYdkkzBmDSuN8F0eZzmFwW1tC6aFmWmnuqaschTMx+uosV2A8MIr9Vrzyd5yp77nU28yTQMBC1+2f2N1w/R9W8jBOUSmzUxfP//Z">')
        		/*<img class="user-vip" title="" alt="" src="data:image/jpg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMqaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAxNCA3OS4xNTE0ODEsIDIwMTMvMDMvMTMtMTI6MDk6MTUgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTBDMENCMUI0N0EyMTFFNThCMEQ4NzI0OEE4RTQ4QzYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTBDMENCMUM0N0EyMTFFNThCMEQ4NzI0OEE4RTQ4QzYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBMEMwQ0IxOTQ3QTIxMUU1OEIwRDg3MjQ4QThFNDhDNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBMEMwQ0IxQTQ3QTIxMUU1OEIwRDg3MjQ4QThFNDhDNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEAAYEBAQFBAYFBQYJBgUGCQsIBgYICwwKCgsKCgwQDAwMDAwMEAwODxAPDgwTExQUExMcGxsbHB8fHx8fHx8fHx8BBwcHDQwNGBAQGBoVERUaHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fH//AABEIAAkACQMBEQACEQEDEQH/xABwAAADAQAAAAAAAAAAAAAAAAAABAYHAQACAwEAAAAAAAAAAAAAAAAABQMEBgcQAAICAgAHAQAAAAAAAAAAAAECAwQAEUFhsZJTcxQ0EQACAQIDCQEAAAAAAAAAAAABAgARA1FxEkGRoTJSYnITMwT/2gAMAwEAAhEDEQA/ANimFRKcd1yrzSxmNYdkkzBmDSuN8F0eZzmFwW1tC6aFmWmnuqaschTMx+uosV2A8MIr9Vrzyd5yp77nU28yTQMBC1+2f2N1w/R9W8jBOUSmzUxfP//Z">*/
            logined_html.push('<a href="http://my.d.cn" class="login" target="_blank">'+showName+'</a></div>');
        	logined_html.push('<div class="menuHide r10" style="display: none;"><a href="http://my.d.cn" title="" target="_blank">个人中心</a><a href="http://my.d.cn/security/" title="" target="_blank">帐号安全</a><a href="http://paysrv.d.cn/act/wap_gocenter.do" title="" target="_blank">我的钱包</a><a id="dcn-vip" class="dn" href="http://vip.d.cn" title="" target="_blank">VIP特权</a><a href="javascript:void(0)" title="" target="_self" onclick="SetLogin.speLogout();">退出</a></div>')
            message_html.push('<a href="http://my.d.cn/message/indexMessage" title="" target="_blank" class="menuShow">消息[<span class="orange">0</span>]</a>')
        
            logined_html=logined_html.join("");
            message_html=message_html.join("");
            document.getElementById("logined_li").innerHTML = logined_html;
            //$("#logined_li").html(logined_html);
            //$("#newMessageCnt_em_id").html(message_html);
            /*console.log($("#logined_li"),$("#newMessageCnt_em_id"));*/
            document.getElementById("newMessageCnt_em_id").innerHTML = message_html;
            DJPASS().getMemberInfo(t.setUserInfo);
        }
    },
    setUserInfo: function (user) {
        var memberInfo = user;
        if (memberInfo != null) {
            if (memberInfo.msgCnt && memberInfo.msgCnt != 0) {
            	document.getElementById("newMessageCnt_em_id").getElementsByTagName("span")[0].innerHTML = memberInfo.msgCnt;
                //$("#newMessageCnt_em_id span").html(memberInfo.msgCnt);
            }else{
            	document.getElementById("newMessageCnt_em_id").getElementsByTagName("a")[0].innerHTML = "消息";
            	//$("#newMessageCnt_em_id a").html("消息");
            }
            if (!!memberInfo.avatar) {
            	document.getElementById("avatar_url_top_id").src = 'http://tools.service.d.cn/userhead/get?mid='+ memberInfo.mid + '&size=small';
                //$("#avatar_url_top_id").attr("src", memberInfo.avatar);
            }
            if(memberInfo.isVip){
            	document.getElementById("user-vip").className = "user-vip";
            	document.getElementById("dcn-vip").className ="";
            }
        } else {
            return false;
        }
    },
    speLogout: function(){
        DJPASS().logout(window.location.href);
        return false;
    }
};

SetLogin.init();