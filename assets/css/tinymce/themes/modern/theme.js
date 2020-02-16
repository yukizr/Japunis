tinymce.ThemeManager.add("modern", function(e) {
    function t(t, n) {
        var r, i = [];
        if (t) return p(t.split(/[ ,]/), function(t) {
            function o() {
                function n(e) {
                    return function(n, r) {
                        for (var i, o = r.parents.length; o-- && (i = r.parents[o].nodeName, "OL" != i && "UL" != i););
                        t.active(n && i == e)
                    }
                }
                var r = e.selection;
                "bullist" == a && r.selectorChanged("ul > li", n("UL")), "numlist" == a && r.selectorChanged("ol > li", n("OL")), t.settings.stateSelector && r.selectorChanged(t.settings.stateSelector, function(e) {
                    t.active(e)
                }, !0), t.settings.disabledStateSelector && r.selectorChanged(t.settings.disabledStateSelector, function(e) {
                    t.disabled(e)
                })
            }
            var a;
            "|" == t ? r = null : f.has(t) ? (t = {
                type: t,
                size: n
            }, i.push(t), r = null) : (r || (r = {
                type: "buttongroup",
                items: []
            }, i.push(r)), e.buttons[t] && (a = t, t = e.buttons[a], "function" == typeof t && (t = t()), t.type = t.type || "button", t.size = n, t = f.create(t), r.items.push(t), e.initialized ? o() : e.on("init", o)))
        }), {
            type: "toolbar",
            layout: "flow",
            items: i
        }
    }

    function n(e) {
        function n(n) {
            return n ? (r.push(t(n, e)), !0) : void 0
        }
        var r = [];
        if (tinymce.isArray(d.toolbar)) {
            if (0 === d.toolbar.length) return;
            tinymce.each(d.toolbar, function(e, t) {
                d["toolbar" + (t + 1)] = e
            }), delete d.toolbar
        }
        for (var i = 1; 10 > i && n(d["toolbar" + i]); i++);
        return r.length || d.toolbar === !1 || n(d.toolbar || y), r.length ? {
            type: "panel",
            layout: "stack",
            classes: "toolbar-grp",
            ariaRoot: !0,
            ariaRemember: !0,
            items: r
        } : void 0
    }

    function r() {
        function t(t) {
            var n;
            return "|" == t ? {
                text: "|"
            } : n = e.menuItems[t]
        }

        function n(n) {
            var r, i, o, a, s;
            if (s = tinymce.makeMap((d.removed_menuitems || "").split(/[ ,]/)), d.menu ? (i = d.menu[n], a = !0) : i = v[n], i) {
                r = {
                    text: i.title
                }, o = [], p((i.items || "").split(/[ ,]/), function(e) {
                    var n = t(e);
                    n && !s[e] && o.push(t(e))
                }), a || p(e.menuItems, function(e) {
                    e.context == n && ("before" == e.separator && o.push({
                        text: "|"
                    }), e.prependToContext ? o.unshift(e) : o.push(e), "after" == e.separator && o.push({
                        text: "|"
                    }))
                });
                for (var l = 0; l < o.length; l++) "|" == o[l].text && (0 === l || l == o.length - 1) && o.splice(l, 1);
                if (r.menu = o, !r.menu.length) return null
            }
            return r
        }
        var r, i = [],
            o = [];
        if (d.menu)
            for (r in d.menu) o.push(r);
        else
            for (r in v) o.push(r);
        for (var a = "string" == typeof d.menubar ? d.menubar.split(/[ ,]/) : o, s = 0; s < a.length; s++) {
            var l = a[s];
            l = n(l), l && i.push(l)
        }
        return i
    }

    function i(t) {
        function n(e) {
            var n = t.find(e)[0];
            n && n.focus(!0)
        }
        e.shortcuts.add("Alt+F9", "", function() {
            n("menubar")
        }), e.shortcuts.add("Alt+F10", "", function() {
            n("toolbar")
        }), e.shortcuts.add("Alt+F11", "", function() {
            n("elementpath")
        }), t.on("cancel", function() {
            e.focus()
        })
    }

    function o(t, n) {
        function r(e) {
            return {
                width: e.clientWidth,
                height: e.clientHeight
            }
        }
        var i, o, a, s;
        i = e.getContainer(), o = e.getContentAreaContainer().firstChild, a = r(i), s = r(o), null !== t && (t = Math.max(d.min_width || 100, t), t = Math.min(d.max_width || 65535, t), m.setStyle(i, "width", t + (a.width - s.width)), m.setStyle(o, "width", t)), n = Math.max(d.min_height || 100, n), n = Math.min(d.max_height || 65535, n), m.setStyle(o, "height", n), e.fire("ResizeEditor")
    }

    function a(t, n) {
        var r = e.getContentAreaContainer();
        u.resizeTo(r.clientWidth + t, r.clientHeight + n)
    }

    function s() {
        function n() {
            return e.contextToolbars || []
        }

        function r(t) {
            var n, r, i;
            return n = tinymce.DOM.getPos(e.getContentAreaContainer()), r = e.dom.getRect(t), i = e.dom.getRoot(), "BODY" == i.nodeName && (r.x -= i.ownerDocument.documentElement.scrollLeft || i.scrollLeft, r.y -= i.ownerDocument.documentElement.scrollTop || i.scrollTop), r.x += n.x, r.y += n.y, r
        }

        function i() {
            p(e.contextToolbars, function(e) {
                e.panel && e.panel.hide()
            })
        }

        function o(t) {
            var n, o, a, s, l, c, u;
            if (!e.removed) {
                if (!t || !t.toolbar.panel) return void i();
                u = ["tc-bc", "bc-tc", "tl-bl", "bl-tl", "tr-br", "br-tr"], l = t.toolbar.panel, l.show(), a = r(t.element), o = tinymce.DOM.getRect(l.getEl()), s = tinymce.DOM.getRect(e.getContentAreaContainer() || e.getBody()), a.w = t.element.clientWidth, a.h = t.element.clientHeight, e.inline || (s.w = e.getDoc().documentElement.offsetWidth), e.selection.controlSelection.isResizable(t.element) && (a = h.inflate(a, 0, 8)), n = h.findBestRelativePosition(o, a, s, u), n ? (p(u.concat("inside"), function(e) {
                    l.classes.toggle("tinymce-inline-" + e, e == n)
                }), c = h.relativePosition(o, a, n), l.moveTo(c.x, c.y)) : (p(u, function(e) {
                    l.classes.toggle("tinymce-inline-" + e, !1)
                }), l.classes.toggle("tinymce-inline-inside", !0), a = h.intersect(s, a), a ? (n = h.findBestRelativePosition(o, a, s, ["tc-tc", "tl-tl", "tr-tr"]), n ? (c = h.relativePosition(o, a, n), l.moveTo(c.x, c.y)) : l.moveTo(a.x, a.y)) : l.hide())
            }
        }

        function a() {
            function t() {
                e.selection && o(u(e.selection.getNode()))
            }
            tinymce.util.Delay.requestAnimationFrame(t)
        }

        function s() {
            d || (d = e.selection.getScrollContainer() || e.getWin(), tinymce.$(d).on("scroll", a), e.on("remove", function() {
                tinymce.$(d).off("scroll")
            }))
        }

        function l(e) {
            var n;
            return e.toolbar.panel ? (e.toolbar.panel.show(), void o(e)) : (s(), n = f.create({
                type: "floatpanel",
                role: "application",
                classes: "tinymce tinymce-inline",
                layout: "flex",
                direction: "column",
                align: "stretch",
                autohide: !1,
                autofix: !0,
                fixed: !0,
                border: 1,
                items: t(e.toolbar.items)
            }), e.toolbar.panel = n, n.renderTo(document.body).reflow(), void o(e))
        }

        function c() {
            tinymce.each(n(), function(e) {
                e.panel && e.panel.hide()
            })
        }

        function u(t) {
            var r, i, o, a = n();
            for (o = e.$(t).parents().add(t), r = o.length - 1; r >= 0; r--)
                for (i = a.length - 1; i >= 0; i--)
                    if (a[i].predicate(o[r])) return {
                        toolbar: a[i],
                        element: o[r]
                    };
            return null
        }
        var d;
        e.on("click keyup setContent", function(t) {
            ("setcontent" != t.type || t.selection) && tinymce.util.Delay.setEditorTimeout(e, function() {
                var t;
                t = u(e.selection.getNode()), t ? (c(), l(t)) : c()
            })
        }), e.on("blur hide", c), e.on("ObjectResizeStart", function() {
            var t = u(e.selection.getNode());
            t && t.toolbar.panel && t.toolbar.panel.hide()
        }), e.on("nodeChange ResizeEditor ResizeWindow", a), e.on("remove", function() {
            tinymce.each(n(), function(e) {
                e.panel && e.panel.remove()
            }), e.contextToolbars = {}
        })
    }

    function l(t) {
        function o() {
            if (p && p.moveRel && p.visible() && !p._fixed) {
                var t = e.selection.getScrollContainer(),
                    n = e.getBody(),
                    r = 0,
                    i = 0;
                if (t) {
                    var o = m.getPos(n),
                        a = m.getPos(t);
                    r = Math.max(0, a.x - o.x), i = Math.max(0, a.y - o.y)
                }
                p.fixed(!1).moveRel(n, e.rtl ? ["tr-br", "br-tr"] : ["tl-bl", "bl-tl", "tr-br"]).moveBy(r, i)
            }
        }

        function a() {
            p && (p.show(), o(), m.addClass(e.getBody(), "mce-edit-focus"))
        }

        function l() {
            p && (p.hide(), g.hideAll(), m.removeClass(e.getBody(), "mce-edit-focus"))
        }

        function c() {
            return p ? void(p.visible() || a()) : (p = u.panel = f.create({
                type: h ? "panel" : "floatpanel",
                role: "application",
                classes: "tinymce tinymce-inline",
                layout: "flex",
                direction: "column",
                align: "stretch",
                autohide: !1,
                autofix: !0,
                fixed: !!h,
                border: 1,
                items: [d.menubar === !1 ? null : {
                    type: "menubar",
                    border: "0 0 1 0",
                    items: r()
                }, n(d.toolbar_items_size)]
            }), e.fire("BeforeRenderUI"), p.renderTo(h || document.body).reflow(), i(p), a(), s(), e.on("nodeChange", o), e.on("activate", a), e.on("deactivate", l), void e.nodeChanged())
        }
        var p, h;
        return d.fixed_toolbar_container && (h = m.select(d.fixed_toolbar_container)[0]), d.content_editable = !0, e.on("focus", function() {
            t.skinUiCss ? tinymce.DOM.styleSheetLoader.load(t.skinUiCss, c, c) : c()
        }), e.on("blur hide", l), e.on("remove", function() {
            p && (p.remove(), p = null)
        }), t.skinUiCss && tinymce.DOM.styleSheetLoader.load(t.skinUiCss), {}
    }

    function c(t) {
        function a() {
            return function(e) {
                "readonly" == e.mode ? l.find("*").disabled(!0) : l.find("*").disabled(!1)
            }
        }
        var l, c, p;
        return t.skinUiCss && tinymce.DOM.loadCSS(t.skinUiCss), l = u.panel = f.create({
            type: "panel",
            role: "application",
            classes: "tinymce",
            style: "visibility: hidden",
            layout: "stack",
            border: 1,
            items: [d.menubar === !1 ? null : {
                type: "menubar",
                border: "0 0 1 0",
                items: r()
            }, n(d.toolbar_items_size), {
                type: "panel",
                name: "iframe",
                layout: "stack",
                classes: "edit-area",
                html: "",
                border: "1 0 0 0"
            }]
        }), d.resize !== !1 && (c = {
            type: "resizehandle",
            direction: d.resize,
            onResizeStart: function() {
                var t = e.getContentAreaContainer().firstChild;
                p = {
                    width: t.clientWidth,
                    height: t.clientHeight
                }
            },
            onResize: function(e) {
                "both" == d.resize ? o(p.width + e.deltaX, p.height + e.deltaY) : o(null, p.height + e.deltaY)
            }
        }), d.statusbar !== !1 && l.add({
            type: "panel",
            name: "statusbar",
            classes: "statusbar",
            layout: "flow",
            border: "1 0 0 0",
            ariaRoot: !0,
            items: [{
                type: "elementpath"
            }, c]
        }), d.readonly && l.find("*").disabled(!0), e.fire("BeforeRenderUI"), e.on("SwitchMode", a()), l.renderBefore(t.targetNode).reflow(), d.width && tinymce.DOM.setStyle(l.getEl(), "width", d.width), e.on("remove", function() {
            l.remove(), l = null
        }), i(l), s(), {
            iframeContainer: l.find("#iframe")[0].getEl(),
            editorContainer: l.getEl()
        }
    }
    var u = this,
        d = e.settings,
        f = tinymce.ui.Factory,
        p = tinymce.each,
        m = tinymce.DOM,
        h = tinymce.geom.Rect,
        g = tinymce.ui.FloatPanel,
        v = {
            file: {
                title: "File",
                items: "newdocument"
            },
            edit: {
                title: "Edit",
                items: "undo redo | cut copy paste pastetext | selectall"
            },
            insert: {
                title: "Insert",
                items: "|"
            },
            view: {
                title: "View",
                items: "visualaid |"
            },
            format: {
                title: "Format",
                items: "bold italic underline strikethrough superscript subscript | formats | removeformat"
            },
            table: {
                title: "Table"
            },
            tools: {
                title: "Tools"
            }
        },
        y = "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image";
    u.renderUI = function(t) {
        var n = d.skin !== !1 ? d.skin || "lightgray" : !1;
        if (n) {
            var r = d.skin_url;
            r = r ? e.documentBaseURI.toAbsolute(r) : tinymce.baseURL + "/skins/" + n, tinymce.Env.documentMode <= 7 ? t.skinUiCss = r + "/skin.ie7.min.css" : t.skinUiCss = r + "/skin.min.css", e.contentCSS.push(r + "/content" + (e.inline ? ".inline" : "") + ".min.css")
        }
        return e.on("ProgressState", function(e) {
            u.throbber = u.throbber || new tinymce.ui.Throbber(u.panel.getEl("body")), e.state ? u.throbber.show(e.time) : u.throbber.hide()
        }), d.inline ? l(t) : c(t)
    }, u.resizeTo = o, u.resizeBy = a
});