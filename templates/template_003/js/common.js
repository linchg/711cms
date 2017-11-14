(function(g, j) {
    var k = function() {};
    k.prototype = {
        constructor: k,
        tab: function(a, b, c, e) {
            function f(c) {
                for (var e = 0; e < $(a).length; e++) c !== e ? $(a).eq(e).removeClass(i.activeClass) : $(a).eq(e).addClass(i.activeClass);
                for (var f = 0; f < $(b).length; f++) c !== f ? (i.showType === "slide" ? $(b).eq(f).slideUp() : $(b).eq(f).fadeOut(), $(b).eq(e).removeClass(i.activeClass)) : (i.showType === "slide" ? $(b).eq(f).slideDown() : $(b).eq(f).fadeIn(), $(b).eq(e).addClass(i.activeClass))
            }
            var i = {
                index: c && !isNaN(c.index) ? c.index: 0,
                activeClass: c && c.activeClass ? c.activeClass: "current",
                eventType: c && c.eventType ? c.eventType: "click",
                showType: c && c.showType ? c.showType: "fade"
            };
            f(i.index);
            $(a).on(i.eventType,
            function() {
                var a = $(this).index();
                f(a);
                e && typeof e === "function" && e($(this), i)
            })
        },
        slider: function(a, b, c, e) {
            function f(c) {
                for (var e = 0; e < $(a).length; e++) c !== e ? $(a).eq(e).removeClass(h.activeClass) : $(a).eq(e).addClass(h.activeClass);
                for (e = 0; e < $(b).length; e++) c !== e ? $(b).eq(e).fadeOut() : $(b).eq(e).fadeIn()
            }
            function i() {
                g = setInterval(function() {
                    var c = $(a).filter("." + h.activeClass).index();
                    c === $(a).length - 1 ? ($(a).eq(c).removeClass(h.activeClass), $(a).eq(0).addClass(h.activeClass), $(b).eq(c).fadeOut(), $(b).eq(0).fadeIn()) : ($(a).eq(c).removeClass(h.activeClass), $(a).eq(c + 1).addClass(h.activeClass), $(b).eq(c).fadeOut(), $(b).eq(c + 1).fadeIn())
                },
                h.duration)
            }
            var h = {
                index: c && !isNaN(c.index) ? +c.index: 0,
                duration: c && !isNaN(c.duration) ? +c.duration: 5E3,
                activeClass: c && c.activeClass ? c.activeClass: "current"
            },
            g;
            f(h.index);
            i();
            $(a).mouseenter(function() {
                var a = $(this).index();
                f(a);
                e && typeof e === "function" && e();
                clearInterval(g);
                i()
            })
        },
        switchList: function(a, b, c) {
            function e(b) {
                for (var e = 0; e < $(a).length; e++) e === b ? $(a).eq(e).addClass(f.activeClass) : $(a).eq(e).removeClass(f.activeClass);
                c && typeof c === "function" && c()
            }
            var f = {
                index: b && !isNaN(b.index) ? +b.index: 0,
                activeClass: b && b.activeClass ? b.activeClass: "current"
            };
            e(f.index);
            $(a).mouseenter(function() {
                var a = $(this).index();
                e(a)
            })
        },
        setHome: function(a) {
            if (document.all) document.body.style.behavior = "url(#default#homepage)",
            document.body.setHomePage(a);
            else if (g.sidebar) {
                if (g.netscape) try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")
                } catch(b) {
                    alert("\u62b1\u6b49\uff0c\u60a8\u7684\u6d4f\u89c8\u5668\u65e0\u6cd5\u5b8c\u6210\u6b64\u64cd\u4f5c\u3002\n\n\u8bf7\u624b\u52a8\u5c06\u3010" + a + "\u3011\u8bbe\u7f6e\u4e3a\u9996\u9875\u3002")
                }
                Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch).setCharPref("browser.startup.homepage", a)
            } else alert("\u62b1\u6b49\uff0c\u60a8\u7684\u6d4f\u89c8\u5668\u65e0\u6cd5\u5b8c\u6210\u6b64\u64cd\u4f5c\u3002\n\n\u8bf7\u624b\u52a8\u5c06\u3010" + a + "\u3011\u8bbe\u7f6e\u4e3a\u9996\u9875\u3002")
        },
        addFavorite: function(a, b) {
            try {
                g.external.addFavorite(a, b)
            } catch(c) {
                try {
                    g.sidebar.addPanel(b, a, "")
                } catch(e) {
                    alert("\u52a0\u5165\u6536\u85cf\u5931\u8d25\uff0c\u8bf7\u4f7f\u7528Ctrl+D\u8fdb\u884c\u6dfb\u52a0")
                }
            }
        },
        scrollTo: function(a, b, c) {
            var e = {
                x: b && !isNaN(b.x) ? +b.x: 0,
                y: b && !isNaN(b.y) ? +b.y: 0,
                d: b && !isNaN(b.duration) ? +b.duration: 200
            };
            a ? $(a).click(function() {
                $("body,html").animate({
                    scrollTop: e.y
                },
                e.d);
                c && typeof c === "function" && c()
            }) : ($("body,html").animate({
                scrollTop: e.y
            },
            e.d), c && typeof c === "function" && c())
        },
        scrollFixed: function(a, b, c) {
            var e = {
                top: b && !isNaN(b.top) ? b.top: 0,
                activeClass: b && b.activeClass ? b.activeClass: "fixed",
                isFadeOut: b ? b.isFadeOut: !1,
                isSlideDown: b ? b.isSlideUp: !1,
                duration: b && !isNaN(b.duration) ? b.duration: 1E3
            };
            $(g).scroll(function() {
                Math.max(document.body.scrollTop, document.documentElement.scrollTop) >= e.top ? ($(a).addClass(e.activeClass), e.isFadeOut && $(a).fadeIn(e.duration), e.isSlideDown && $(a).SliderDown()) : $(a).removeClass(e.activeClass);
                c && typeof c === "function" && c()
            })
        },
        openDiv: function(a, b, c, e) {
            $(a).click(function() {
                $(b).show();
                e && typeof e === "function" && e();
                return ! 1
            })
        },
        closeDiv: function(a, b, c, e) {
            $(a).click(function() {
                $(b).hide();
                e && typeof e === "function" && e();
                return ! 1
            })
        },
        sliderImg: function(a, b, c) {
            var e = $(c).children(),
            f = parseInt(e.length) * parseInt(e.css("width"));
            maxLeft = -parseInt(e.length - 1) * parseInt(e.css("width"));
            $(c).css({
                width: f,
                left: 0
            });
            $(a).click(function() {
                parseInt($(c).css("left")) >= 0 ? $(c).is(":animated") || ($(c).animate({
                    left: parseInt($(c).css("left")) + parseInt(e.css("width")) / 2
                },
                "normal"), $(c).animate({
                    left: 0
                },
                "normal")) : $(c).animate({
                    left: parseInt($(c).css("left")) + parseInt(e.css("width"))
                },
                "normal")
            });
            $(b).click(function() {
                parseInt($(c).css("left")) <= maxLeft ? $(c).is(":animated") || ($(c).animate({
                    left: parseInt($(c).css("left")) - parseInt(e.css("width")) / 2
                },
                "normal"), $(c).animate({
                    left: maxLeft
                },
                "normal")) : $(c).animate({
                    left: parseInt($(c).css("left")) - parseInt(e.css("width"))
                },
                "normal")
            })
        },
        setCookie: function(a, b, c) {
            var e = new Date;
            e.setDate(e.getDate() + c);
            document.cookie = a + "=" + escape(b) + (c == null ? "": ";expires=" + e.toGMTString())
        },
        getCookie: function(a) {
            if (document.cookie.length > 0 && (c_start = document.cookie.indexOf(a + "="), c_start !== -1)) {
                c_start = c_start + a.length + 1;
                c_end = document.cookie.indexOf(";", c_start);
                if (c_end == -1) c_end = document.cookie.length;
                return unescape(document.cookie.substring(c_start, c_end))
            }
            return ""
        },
        step: function(a) {
            var b = {
                nav: a && a.nav ? $(a.nav) : null,
                section: a && a.section ? $(a.section) : a.section,
                callback: a && a.callback ? a.callback: null,
                next: null
            };
            b.next = function() {
                var a = b.nav.index(b.nav.siblings(".current"));
                b.nav.eq(a).removeClass("current");
                b.nav.eq(a + 1).addClass("current");
                b.section.hide();
                b.section.eq(a + 1).show();
                if (b.callback && typeof b.callback === "function") return b.callback(d),
                d
            };
            return b
        },
        logIn: function(a) {
            var b = {
                username: a && a.username ? a.username: j,
                password: a && a.password ? a.password: j,
                callback: a && a.callback ? a.callback: null
            };
            $.post("/api/login/", {
                username: b.username,
                password: b.password
            },
            function(a) {
                if (b.callback && typeof b.callback === "function") return b.callback(a),
                a
            })
        },
        signUp: function(a) {
            var b = {
                username: typeof a.username === "string" ? a.username: "",
                password: typeof a.password === "string" ? a.password: "",
                nickname: typeof a.nickname === "string" ? a.nickname: "",
                identity_name: typeof a.identity_name === "string" ? a.identity_name: "",
                identity_num: typeof a.identity_num === "string" ? a.identity_num: "",
                key: typeof a.key === "string" ? a.key: "",
                captcha: typeof a.captcha === "string" ? a.captcha: "",
                doneback: typeof a.doneback === "function" ? a.doneback: null,
                failback: typeof a.failback === "function" ? a.failback: null
            },
            a = $("#dialogSignUpForm").attr("action"),
            a = $.ajax({
                type: "POST",
                url: a,
                data: {
                    username: b.username,
                    password: b.password,
                    nickname: b.nickname,
                    identity_name: b.identity_name,
                    identity_num: b.identity_num,
                    key: b.key,
                    captcha: b.captcha
                },
                xhrFields: {
                    withCredentials: !0
                }
            });
            a.done(function(a) {
                b.doneback(a)
            });
            a.fail(function(a) {
                b.failback(a)
            })
        },
        signIn: function(a) {
            var b = $("#dialogLogInForm").attr("action"),
            c = {
                username: a && a.username ? a.username: j,
                password: a && a.password ? a.password: j,
                key: a && a.key ? a.key: "",
                captcha: a && a.captcha ? a.captcha: "",
                callback: a && a.callback ? a.callback: null
            };
            $.ajax({
                type: "POST",
                url: b,
                data: {
                    username: c.username,
                    password: c.password,
                    key: c.key,
                    captcha: c.captcha
                },
                success: function(a) {
                    if (c.callback && typeof c.callback === "function") return c.callback(a),
                    a
                },
                xhrFields: {
                    withCredentials: !0
                }
            })
        },
        isAliveOld: function(a) {
            var b = {
                username: a && a.username ? a.username: j,
                callback: a.callback
            };
            $.get("/api/account/check/", {
                username: b.username
            },
            function(a) {
                if (b.callback && typeof b.callback === "function") return b.callback(a),
                a
            })
        },
        isAlive: function(a) {
            var b = {
                username: a && a.username ? a.username: j,
                callback: a.callback
            };
            $.get("/api/account/user_check/", {
                username: b.username
            },
            function(a) {
                if (b.callback && typeof b.callback === "function") return b.callback(a),
                a
            })
        },
        getMsgCode: function(a) {
            var b = {
                type: a && a.type ? a.type: 1,
                mobile: a && a.mobile ? a.mobile: 1E4,
                callback: a.callback
            };
            $.get("/api/msg/send/", {
                type: b.type,
                mobile: b.mobile
            },
            function(a) {
                if (b.callback && typeof b.callback === "function") return b.callback(a),
                a
            })
        },
        isMsgValidate: function(a) {
            var b = {
                type: a && a.type ? a.type: 1,
                validateCode: a.validateCode,
                callback: a.callback
            };
            $.get("/api/msg/validate/", {
                type: b.type,
                validate_code: b.validateCode
            },
            function(a) {
                if (b.callback && typeof b.callback === "function") return b.callback(a),
                a
            })
        },
        dialogMes: function(a, b, c) {
            function e(a) {
                a.eleChild.innerHTML = f.mes;
                f.timer = setInterval(function() {
                    if (parseFloat(a.ele.style.opacity) < 1) a.ele.style.opacity = parseFloat(a.ele.style.opacity) + 0.04;
                    if (parseFloat(a.ele.style.opacity) >= 1) clearInterval(f.timer),
                    f.timer = setInterval(function() {
                        a.ele.style.opacity = parseFloat(a.ele.style.opacity) - 0.04;
                        parseFloat(a.ele.style.opacity) <= 0 && (clearInterval(f.timer), document.body.removeChild(a.ele), c && typeof c === "function" && c())
                    },
                    50)
                },
                50)
            }
            var f = {
                mes: a ? a: "\u5076\u73a9\u6e38\u620f\u4e2d\u5fc3",
                local: b && b.localtion ? b.localtion: "top",
                mode: b && b.mode ? b.mode: "line",
                cycle: b && b.cycle ? b.cycle: 1E3,
                cssBase: "z-index: 9999; position: fixed; left: 0; padding: 5px; width: 100%; text-align: center; opacity: 0.1;",
                cssTop: "top: 100px;",
                cssMid: "top: 50%;",
                cssBot: "bottom: 100px;",
                cssInner: "padding: 5px; font-size: 14px; background: #000; color: #fff;",
                timer: null
            }; (function() {
                var a = document.createElement("DIV"),
                b = document.createElement("SPAN");
                switch (f.local) {
                case "top":
                    a.style.cssText += f.cssBase + f.cssTop;
                    break;
                case "middle":
                    a.style.cssText += f.cssBase + f.cssMid;
                    break;
                case "bottom":
                    a.style.cssText += f.cssBase + f.cssBot;
                    break;
                default:
                    a.style.cssText += f.cssBase + f.cssTop
                }
                b.style.cssText += f.cssInner;
                document.body.appendChild(a);
                a.appendChild(b);
                e({
                    ele: a,
                    eleChild: b
                })
            })()
        },
        stopWatch: function(a) {
            var b = {
                second: a && a.second ? a.second: 10,
                control: a && a.control ? $(a.control) : null,
                callback: a && a.callback
            }; (function() {
                var a = setInterval(function() {
                    b.control.text(b.second--);
                    b.second < 0 && (clearInterval(a), b.callback && typeof b.callback === "function" && b.callback())
                },
                1E3)
            })()
        },
        isValidPhone: function(a) {
            return RegExp(/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/).test(a) ? !0 : !1
        },
        dialogWindow: function(a, b) {
            function c() {
                var a = f,
                b = document.createElement("DIV");
                b.className = "dialog-bg";
                document.body.appendChild(b);
                a.dialogWrap = b;
                $(f.dialogId).show();
                $(f.dialogId).css("z-index", 1001);
                f.back && f.back(f)
            }
            function e() {
                f.dialogWrap && document.body.removeChild(f.dialogWrap);
                $(f.dialogId).hide();
                $(f.dialogId).css("z-index", "initial")
            }
            var f = {
                dialogId: a && a.dialogId ? a.dialogId: "",
                btnOpenId: a && a.btnOpenId ? a.btnOpenId: "",
                btnCloseId: a && a.btnCloseId ? a.btnCloseId: "",
                dialogWrap: null,
                back: typeof b === "function" ? b: null
            }; (function() {
                if (f.btnOpenId) $(f.btnOpenId).on("click",
                function() {
                    c()
                });
                if (f.btnCloseId) $(f.btnCloseId).on("click",
                function() {
                    e()
                })
            })();
            return {
                close: function() {
                    e()
                },
                open: function() {
                    c()
                }
            }
        },
        isValidIC: function(a) {
            return /^((1[1-5])|(2[1-3])|(3[1-7])|(4[1-6])|(5[0-4])|(6[1-5])|71|(8[12])|91)\d{4}((19\d{2}(0[13-9]|1[012])(0[1-9]|[12]\d|30))|(19\d{2}(0[13578]|1[02])31)|(19\d{2}02(0[1-9]|1\d|2[0-8]))|(19([13579][26]|[2468][048]|0[48])0229))\d{3}(\d|X|x)?$/.test(a) ? !0 : !1
        }
    };
    g.OU = k;
    g.ScrollLoad = function(a) {
        var b = arguments.length == 0 ? {
            src: "data-src",
            time: 300
        }: {
            src: a.src || "data-src",
            time: a.time || 300
        },
        c = function(a) {
            return a.replace(/-(\w)/g,
            function(a, b) {
                return b.toUpperCase()
            })
        };
        this.getStyle = function(a, b) {
            if (arguments.length != 2) return ! 1;
            var e = a.style[c(b)];
            e || (document.defaultView && document.defaultView.getComputedStyle ? e = (e = document.defaultView.getComputedStyle(a, null)) ? e.getPropertyValue(b) : null: a.currentStyle && (e = a.currentStyle[c(b)]));
            return e == "auto" ? "": e
        };
        var e = function() {
            var a = g.pageYOffset ? g.pageYOffset: g.document.documentElement.scrollTop,
            c = a + Number(g.innerHeight ? g.innerHeight: document.documentElement.clientHeight),
            h = document.images,
            j = h.length;
            if (!j) return ! 1;
            for (var m = 0; m < j; m++) {
                var k = h[m].getAttribute(b.src),
                l = h[m],
                n = l.nodeName.toLowerCase();
                if (l && (postPage = l.getBoundingClientRect().top + g.document.documentElement.scrollTop + g.document.body.scrollTop, postWindow = postPage + Number(this.getStyle(l, "height").replace("px", "")), postPage > a && postPage < c || postWindow > a && postWindow < c)) n === "img" && k !== null && l.setAttribute("src", k),
                l = null
            }
            g.onscroll = function() {
                setTimeout(function() {
                    e()
                },
                b.time)
            }
        };
        return e()
    }
})(window);
var ou = new OU;