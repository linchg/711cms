(function() {
    function r(e, t) {
        var n = {
            softwareandgame: 1,
            music: 2,
            wallpaper: 5,
            ebook: 6,
            ring: 7,
            theme: 8
        },
        r = {
            soft: "\u641c\u7d22\u624b\u673a\u8f6f\u4ef6\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            game: "\u641c\u7d22\u624b\u673a\u6e38\u620f\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            music: "\u641c\u6b4c\u540d\u3001\u6b4c\u8bcd\u3001\u6b4c\u624b\u6216\u4e13\u8f91\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            wallpaper: "\u641c\u7d22\u6d77\u91cf\u624b\u673a\u58c1\u7eb8\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            ebook: "\u641c\u7d22\u6d77\u91cf\u5c0f\u8bf4\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            ring: "\u641c\u7d22\u7cbe\u5f69\u597d\u94c3\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            theme: "\u641c\u7d22\u5404\u79cd\u684c\u9762\u6d77\u91cf\u4e3b\u9898\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
            forum: "\u78b0\u5230\u624b\u673a\u95ee\u9898\uff0c\u9a6c\u4e0a\u641c\u4e00\u4e0b"
        },
        i = "http://sug.leidian.com/sug?category=%cate%&callback=suggest_so&word=";
        category = n[e] || "",
        slogan = r[e] || "\u641c\u7d22\u624b\u673a\u8d44\u6e90\uff0c\u4e00\u952e\u88c5\u8fdb\u624b\u673a",
        t && t.text() == "\u8f6f\u4ef6" && (slogan = r.soft),
        t && t.text() == "\u6e38\u620f" && (slogan = r.game),
        i = i.replace("%cate%", category),
        $("input[name=q]").attr("suggestUrl", i),
        $("input[name=q]").attr("_placeholder", slogan),
        $("label[for=input]").html(slogan)
    }
    function i() {
        var e = null;
        $(".search-tablist").bind({
            mouseleave: function() {
                var t = $(this);
                e && clearTimeout(e),
                t.removeClass("st-actived")
            },
            mouseenter: function() {
                var t = $(this);
                e = setTimeout(function() {
                    t.hasClass("st-actived") ? t.removeClass("st-actived") : (t.css("height", "auto").addClass("st-actived"), $("input[name=q]")[0].blur())
                },
                200)
            }
        }),
        n.each(function(e, t) {
            $(t).attr("data-id", e)
        }),
        n.bind("click",
        function() {
            var e = $(this),
            t = e.attr("data-t").toLowerCase(),
            i = $(".search-tablist .current"),
            s = i.attr("data-id") * 1,
            o = s + 1;
            if (e.hasClass("current")) return ! 1;
            $(".search-tablist a").removeClass("current"),
            o >= n.length ? i.appendTo(e.parent()) : $(".search-tablist a[data-id=" + o + "]").before(i),
            e.addClass("current").prependTo(e.parent()),
            e.parent().removeClass("st-actived"),
            $("input[name=t]").val(t),
            r(t, e)
        })
    }
    window.topSearchBar = window.topSearchBar || {};
    var e = null,
    t = null,
    n = $(".search-tablist a");
    r($("input[name=t]").val());
    var s = {
        config: {
            logoSrc: {
                fold:  $('#logo_pc').attr('src'),
                unfold: $('#logo_pc').attr('src')
            },
            mascotSrc: {
                fold: "http://p9.qhimg.com/t01d8c466357d4475cc.png",
                unfold: "http://p8.qhimg.com/t012fb35581259e9b10.png"
            },
            barHeight: 80,
            iptHeightGap: 8,
            tabTopGap: 4,
            layer: $(".mod-search-hd-bunny"),
            box: $(".mod-search"),
            nav: $(".mod-nav,.nav-list"),
            logo: $(".mod-search .logo"),
            iptText: $(".ipt-text"),
            iptTextHeight: $(".ipt-text").height(),
            iptBtn: $(".btn-search"),
            iptBtnHeight: $(".btn-search").height(),
            tab: $(".search-tablist"),
            tabTop: parseInt($(".search-tablist").css("top"), 10),
            tabHeight: $(".search-tablist").height(),
            mascot: $(".install-mascot"),
            doudou: $(".ld-doudou"),
            isFolded: !1
        },
        exchange: function(e) {
            var t = this,
            n = t.config,
            r = n.iptTextHeight,
            i = n.iptBtnHeight,
            s = n.tabTop,
            o = n.tabHeight,
            u = e ? "fold": "unfold";
            e ? (n.logo.css({
                "margin-top": "0px"
            }), n.layer.addClass("mod-search-hd-bunny-fold"), n.layer.parent().css("height", "200px"), $.browser.msie && $.browser.version < 7 && n.mascot.find(">img").addClass("pngfix"), n.box.css({
                height: "60px",
                "padding-top": "15px"
            }), n.mascot.css({
                position: "absolute",
                top: "26px",
                left: "50%",
                "margin-left": "350px"
            }), r -= n.iptHeightGap, i -= n.iptHeightGap, s -= n.tabTopGap, o -= n.tabTopGap) : (n.logo.removeAttr("style"), n.layer.removeAttr("style").removeClass("mod-search-hd-bunny-fold"), n.box.removeAttr("style"), n.mascot.removeAttr("style"), n.layer.parent().removeAttr("style"), $.browser.msie && $.browser.version < 7 && (n.mascot.find(">img").removeAttr("style").removeClass("pngfix"), n.layer.find("shape").remove())),
            n.logo.find("img").attr("src", n.logoSrc[u]),
            n.iptText.css({
                height: r + "px",
                "line-height": r + "px"
            }),
            n.iptBtn.css({
                height: i + "px",
                "line-height": i + "px"
            }),
            n.tab.css({
                top: s + "px",
                height: o + "px"
            }),
            n.mascot.find(">img").attr("src", n.mascotSrc[u]),
            n.nav.css("display", e ? "none": "block"),
            n.doudou.toggleClass("ld-doudou-default"),
            $("#suggest-align label").css({
                height: r + "px",
                "line-height": r + "px"
            }),
            $(window.topSearchBar).trigger("exchange", {
                isFold: e
            })
        },
        slide: function(e) {
            var t = this,
            n = t.config.layer,
            r = {};
            e ? ($.browser.msie && $.browser.version >= 7 || !$.browser.msie) && n.animate({
                top: "0px"
            },
            "fast",
            function() {
                Doudou.change({
                    isFold: e
                })
            }) : Doudou.change({
                isFold: e
            })
        },
        init: function() {
            var e = this,
            t = Math.max($("body").scrollTop(), document.documentElement.scrollTop),
            n = e.config.barHeight,
            r = e.config.isFolded,
            i = Math.max($("body").height(), $("#page-wrap").height() || $("#doc4").height() || $("#doc").height()),
            s = t > 80 ? !0 : !1;
            r != s && (e.exchange(s), e.slide(s)),
            e.config.isFolded = s
        },
        install: function() {
            var e = this,
            t = e.config.mascot;
            t.find(".doudou-other").append(['<div class="ld-phone">', '<span class="leidoudou-num"></span>', "</div>"].join("")),
            e.config.phone = $(".install-mascot .ld-phone")
        }
    };
    Doudou = {
        config: {
            doudou: $(".ld-doudou"),
            glow: $(".ld-doudou .doudou-toy"),
            glowCss: ["doudou-toy-bigger", "doudou-toy-smaller"],
            ring: $(".ld-doudou .doudou-ring")
        },
        start: function() {
            this.config.doudou.addClass("ld-doudou-animate")
        },
        stop: function() {
            this.config.doudou.removeClass("ld-doudou-animate")
        },
        change: function(e) {}
    },
    i(),
    s.install(),
    $.topbar = s,
    $.doudou = $(Doudou),
    $.doudou.bind({
        start: Doudou.start,
        stop: Doudou.stop,
        change: function(e, t) {
            Doudou.change(t)
        }
    })
})(),
function(e) {
    function t(t) {
        this.el = e(t);
        var n = e.trim(this.el.attr("placeholder"));
        if (!n) return;
        this.el.attr("_placeholder", n);
        if (!e.browser.msie || parseInt(e.browser.version) > 7) {
            var r = this;
            try {
                r.el.removeAttr("placeholder")
            } catch(i) {
                try {
                    r.el[0].removeAttribute("placeholder")
                } catch(s) {}
            }
        }
        this.setHolder()
    }
    var n = e.browser.opera || e.browser.mozilla;
    t.prototype.setHolder = function() {
        var t = this.el;
        if (t) {
            var n = this,
            r = e("<label />");
            r.text(e(t).attr("_placeholder"));
            var i = parseInt(e(t).css("paddingLeft"), 10) || 0,
            s = parseInt(e(t).css("paddingBottom"), 10) || 0,
            o = parseInt(e(t).css("paddingTop"), 10) || 0,
            u = parseInt(e(t).css("border-top-width"), 10) || 0,
            a = e.trim(e(t).val());
            r.css({
                backgroundColor: "#fff",
                color: "#888999",
                fontSize: e(t).css("fontSize"),
                fontFamily: e(t).css("fontFamily"),
                fontWeight: e(t).css("fontWeight"),
                lineHeight: "26px",
                position: "absolute",
                top: e(t).position().top,
                left: e(t).position().left,
                width: e(t).width(),
                marginLeft: i + "px",
                marginTop: o + u + "px",
                marginBottom: s + u + "px",
                display: a ? "none": "inline",
                overflow: "hidden"
            }),
            e(t).attr("id") || e(t).attr("id", n.guid()),
            r.attr("for", e(t).attr("id")),
            e(t).after(r),
            n.holder = r,
            n.setListen(t, r)
        }
    },
    t.prototype.setListen = function() {
        function r() {
            e.val() == "" && (t.hide(0), e.addClass("focus"))
        }
        function i() {
            e.val() == "" && (t.show(0), e.removeClass("focus"))
        }
        var e = this.el,
        t = this.holder;
        e.bind("focus", r),
        e.bind("blur", i),
        n ? t.bind("mousedown",
        function(t) {
            t.preventDefault(),
            e.focus()
        }) : (t.bind("contextmenu",
        function(t) {
            e.focus()
        }), t.bind("selectstart",
        function(t) {
            t.preventDefault(),
            e.focus()
        }))
    },
    t.prototype.guid = function() {
        return ( + (new Date)).toString(36)
    },
    e.fn.placeholder = function() {
        return new t(this[0]),
        this
    },
    e.placeholder = t,
    e(function() {
        e("input[placeholder]").placeholder()
    })
} (jQuery),
function() {
    var e = function(e) {
        var t = {
            ref: "#hd .inner",
            time: 300,
            btnLeft: 20
        },
        e = e || {};
        $.extend(t, e);
        var n = $()
        r = $("#bt-gotop"),
        i = $(t.ref),
        s = $("#gotop-holder-close"),
        o = $("#gotop-holder-open"),
        u = $("#gotop-mobile1"),
        a = $("#gotop-mobile2"),
        f = $("#gotop-weixin"),
        l = $("#code_mobile"),
        c = $("#code_weixin"),
        h = i.width(),
        p = (r.width() + t.btnLeft) * 2 + h,
        d = $(window),
        v = function() {
            function e(e) {
                e > 0 ? n.css({
                    bottom: "45px"
                }) : n.css({
                    bottom: "0px"
                })
            }
            e(d.scrollTop()),
            d.bind("scroll resize",
            function() {
                $.topbar.init();
                var t = d.scrollTop();
                t > 0 ? (s.hide(), o.fadeIn()) : (s.fadeIn(), o.hide()),
                e(t)
            })
        },
        m = function() {
            r.fadeOut(),
            d.unbind("scroll resize")
        };
        u.on("click",
        function() {
            s.hide(),
            o.fadeIn()
        }),
        a.on("mouseover",
        function() {
            $(this).parent().find(".expand").removeClass("expand"),
            $(this).addClass("expand")
        }),
        f.on("mouseover",
        function() {
            $(this).parent().find(".expand").removeClass("expand"),
            $(this).addClass("expand")
        }),
        v(),
        r.on("click",
        function(e) {
            e.preventDefault(),
            $("body,html").animate({
                scrollTop: 0
            },
            t.time,
            function() {
                v()
            })
        })
    };
    $.backToTop = e,
    window.backToTop = e
} (),
$(function() {
    $.backToTop ? $.backToTop({
        ref: "#bd"
    }) : window.backToTop({
        ref: "#bd"
    })
}),
function() {
    var e = "",
    t = 0;
    try {
        function n(t) {
            var n = monitor.data.getClick(t);
            n.p = e,
            monitor.log(n, "click")
        }
        function r(t) {
            var n = monitor.data.getKeydown(t);
            n.p = e,
            monitor.log(n, "click")
        }
        monitor.logSiteMap = function(i) {
            if (t) return;
            t = 1,
            e = i,
            $(document.body).click(n).keydown(r)
        };
        function i(e) {
            var t = new RegExp("[?&]" + e + "=([^&#]+)", "i"),
            n = t.exec(window.location.href);
            return n && n[1] || ""
        }
        monitor.data.getPageRef = function() {
            var e = i("src"),
            t = document.referrer;
            if (e) {
                if (t) {
                    var n = t;
                    return /\?/.test(n) ? /([&?])src=[^&]+/.test(n) ? n = n.replace(/([&?])src=[^&]+/, "$1src=" + e) : n += "&src=" + e: n += "?src=" + e,
                    n
                }
                return e
            }
            return t
        }
    } catch(s) {}
} (),
window.CookieUtils = {
    get: function(e) {
        try {
            var t, n = new RegExp("(^| )" + e + "=([^;]*)(;|$)");
            return (t = document.cookie.match(n)) ? unescape(t[2]) : ""
        } catch(r) {
            return ""
        }
    },
    set: function(e, t, n) {
        n = n || {};
        var r = n.expires;
        typeof r == "number" && (r = new Date, r.setTime(r.getTime() + n.expires));
        try {
            document.cookie = e + "=" + escape(t) + (r ? ";expires=" + r.toGMTString() : "") + (n.path ? ";path=" + n.path: "") + (n.domain ? "; domain=" + n.domain: "")
        } catch(i) {}
    }
},
function() {
    function e(e) {
        var t = new RegExp("[?&]" + e + "=([^&#]+)", "i"),
        n = t.exec(window.location.href);
        return n && n[1] || ""
    }
    var t = e("src");
    if (/^360se/.test(t)) {
        var n = CookieUtils.get("from360se");
        n || CookieUtils.set("from360se", "1", {
            path: "/",
            domain: ".leidian.com"
        })
    }
    try {
        monitor.data.from360se = function() {
            var e = CookieUtils.get("from360se");
            if (e) {
                var t = document.referrer;
                return t || /src=360se/.test(window.location.href) ? !0 : (CookieUtils.set("from360se", "", {
                    path: "/",
                    domain: ".leidian.com",
                    expires: -1e5
                }), !1)
            }
            return ! 1
        }
    } catch(r) {}
} (),
$(function() {
    function e() {
        var e = new Date;
        return e.getFullYear() * 1e4 + (e.getMonth() + 1) * 100 + e.getDate()
    }
    var t = e();
    if (t >= 20130922 && t <= 20131007) {
        var n = "http://p2.qhimg.com/t015ea08dc10935d895.png",
        r = new Image;
        r.onload = function() {
            var e = $(".mod-search-hd-bunny .nav-list").length ? 111 : 82,
            t = $('<a target="_blank" href="http://www.leidian.com/zt/travel.html?src=logo"><img width="50" height="42" src="' + n + '"/></a>').css({
                position: "absolute",
                top: e + "px",
                left: "0"
            }),
            r = $(".mod-search-hd-bunny .mod-search");
            r.css({
                position: "relative"
            }).append(t),
            r.closest(".inner").css({
                position: "relative"
            }),
            $(window.topSearchBar).bind("exchange",
            function(n, r) {
                var i = r.isFold;
                i ? t.css({
                    top: "18px"
                }) : t.css({
                    top: e + "px"
                })
            })
        },
        r.src = n
    }
});