/*
 WATable 1.05
 Copyright (c) 2012 Andreas Petersson, http://wootapa-watable.appspot.com/

 Permission is hereby granted, free of charge, to any person obtaining
 a copy of this software and associated documentation files (the
 "Software"), to deal in the Software without restriction, including
 without limitation the rights to use, copy, modify, merge, publish,
 distribute, sublicense, and/or sell copies of the Software, and to
 permit persons to whom the Software is furnished to do so, subject to
 the following conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
(function (a, b) {
    var c = function () {
        var c = {};
        var d = {};
        c.options = {};
        var e = {
            url: "",
            urlData: "",
            urlPost: false,
            debug: false,
            filter: false,
            columnPicker: false,
            pageSize: 10,
            pageSizes: [10, 20, 30, 40, 50, "All"],
            actions: "",
            hidePagerOnEmpty: false,
            preFill: false,			
            types: {
                string: {},
                number: {},
				numbersmall: {},
				money: {},
				stringsmall: {},
				userid: {}, 
                bool: {},
                date: {}
            }
        };
        c.ext = {};
        c.ext.XDate = function (a, b, c, d) {
            function e() {
                var b = this instanceof e ? this : new e,
                    c = arguments,
                    d = c.length,
                    h;
                typeof c[d - 1] == "boolean" && (h = c[--d], c = y(c, 0, d));
                if (d) if (d == 1) if (d = c[0], d instanceof a || typeof d == "number") b[0] = new a(+d);
                else if (d instanceof e) {
                    var c = b,
                        i = new a(+d[0]);
                    if (f(d)) i.toString = G;
                    c[0] = i
                } else {
                    if (typeof d == "string") {
                        b[0] = new a(0);
                        a: {
                            for (var c = d, d = h || !1, i = e.parsers, j = 0, k; j < i.length; j++) if (k = i[j](c, d, b)) {
                                b = k;
                                break a
                            }
                            b[0] = new a(c)
                        }
                    }
                } else b[0] = new a(F.apply(a, c)), h || (b[0] = u(b[0]));
                else b[0] = new a;
                typeof h == "boolean" && g(b, h);
                return b
            }
            function f(a) {
                return a[0].toString === G
            }
            function g(b, c, d) {
                if (c) {
                    if (!f(b)) d && (b[0] = new a(F(b[0].getFullYear(), b[0].getMonth(), b[0].getDate(), b[0].getHours(), b[0].getMinutes(), b[0].getSeconds(), b[0].getMilliseconds()))), b[0].toString = G
                } else f(b) && (b[0] = d ? u(b[0]) : new a(+b[0]));
                return b
            }
            function h(a, b, c, d, e) {
                var f = x(s, a[0], e),
                    a = x(t, a[0], e),
                    e = b == 1 ? c % 12 : f(1),
                    g = !1;
                d.length == 2 && typeof d[1] == "boolean" && (g = d[1], d = [c]);
                a(b, d);
                g && f(1) != e && (a(1, [f(1) - 1]), a(2, [v(f(0), f(1))]))
            }
            function i(a, c, d, e) {
                var d = Number(d),
                    f = b.floor(d);
                a["set" + B[c]](a["get" + B[c]]() + f, e || !1);
                f != d && c < 6 && i(a, c + 1, (d - f) * D[c], e)
            }
            function j(a, c, d) {
                var a = a.clone().setUTCMode(!0, !0),
                    c = e(c).setUTCMode(!0, !0),
                    f = 0;
                if (d == 0 || d == 1) {
                    for (var g = 6; g >= d; g--) f /= D[g], f += s(c, !1, g) - s(a, !1, g);
                    d == 1 && (f += (c.getFullYear() - a.getFullYear()) * 12)
                } else d == 2 ? (d = a.toDate().setUTCHours(0, 0, 0, 0), f = c.toDate().setUTCHours(0, 0, 0, 0), f = b.round((f - d) / 864e5) + (c - f - (a - d)) / 864e5) : f = (c - a) / [36e5, 6e4, 1e3, 1][d - 3];
                return f
            }
            function k(c) {
                var d = c(0),
                    e = c(1),
                    c = c(2),
                    e = new a(F(d, e, c)),
                    f = l(d),
                    c = f;
                e < f ? c = l(d - 1) : (d = l(d + 1), e >= d && (c = d));
                return b.floor(b.round((e - c) / 864e5) / 7) + 1
            }
            function l(b) {
                b = new a(F(b, 0, 4));
                b.setUTCDate(b.getUTCDate() - (b.getUTCDay() + 6) % 7);
                return b
            }
            function m(a, b, c, e) {
                var f = x(s, a, e),
                    g = x(t, a, e),
                    c = l(c === d ? f(0) : c);
                e || (c = u(c));
                a.setTime(+c);
                g(2, [f(2) + (b - 1) * 7])
            }
            function n(a, b, c, d, f) {
                var g = e.locales,
                    h = g[e.defaultLocale] || {}, i = x(s, a, f),
                    c = (typeof c == "string" ? g[c] : c) || {};
                return o(a, b, function (a) {
                    if (d) for (var b = (a == 7 ? 2 : a) - 1; b >= 0; b--) d.push(i(b));
                    return i(a)
                }, function (a) {
                    return c[a] || h[a]
                }, f)
            }
            function o(a, b, c, e, f) {
                for (var g, h, i = ""; g = b.match(E);) {
                    i += b.substr(0, g.index);
                    if (g[1]) {
                        h = i;
                        for (var i = a, j = g[1], k = c, l = e, m = f, n = j.length, q = void 0, r = ""; n > 0;) q = p(i, j.substr(0, n), k, l, m), q !== d ? (r += q, j = j.substr(n), n = j.length) : n--;
                        i = h + (r + j)
                    } else g[3] ? (h = o(a, g[4], c, e, f), parseInt(h.replace(/\D/g, ""), 10) && (i += h)) : i += g[7] || "'";
                    b = b.substr(g.index + g[0].length)
                }
                return i + b
            }
            function p(a, c, d, f, g) {
                var h = e.formatters[c];
                if (typeof h == "string") return o(a, h, d, f, g);
                else if (typeof h == "function") return h(a, g || !1, f);
                switch (c) {
                    case "fff":
                        return A(d(6), 3);
                    case "s":
                        return d(5);
                    case "ss":
                        return A(d(5));
                    case "m":
                        return d(4);
                    case "mm":
                        return A(d(4));
                    case "h":
                        return d(3) % 12 || 12;
                    case "hh":
                        return A(d(3) % 12 || 12);
                    case "H":
                        return d(3);
                    case "HH":
                        return A(d(3));
                    case "d":
                        return d(2);
                    case "dd":
                        return A(d(2));
                    case "ddd":
                        return f("dayNamesShort")[d(7)] || "";
                    case "dddd":
                        return f("dayNames")[d(7)] || "";
                    case "M":
                        return d(1) + 1;
                    case "MM":
                        return A(d(1) + 1);
                    case "MMM":
                        return f("monthNamesShort")[d(1)] || "";
                    case "MMMM":
                        return f("monthNames")[d(1)] || "";
                    case "yy":
                        return (d(0) + "").substring(2);
                    case "yyyy":
                        return d(0);
                    case "t":
                        return q(d, f).substr(0, 1).toLowerCase();
                    case "tt":
                        return q(d, f).toLowerCase();
                    case "T":
                        return q(d, f).substr(0, 1);
                    case "TT":
                        return q(d, f);
                    case "z":
                    case "zz":
                    case "zzz":
                        return g ? c = "Z" : (f = a.getTimezoneOffset(), a = f < 0 ? "+" : "-", d = b.floor(b.abs(f) / 60), f = b.abs(f) % 60, g = d, c == "zz" ? g = A(d) : c == "zzz" && (g = A(d) + ":" + A(f)), c = a + g), c;
                    case "w":
                        return k(d);
                    case "ww":
                        return A(k(d));
                    case "S":
                        return c = d(2), c > 10 && c < 20 ? "th" : ["st", "nd", "rd"][c % 10 - 1] || "th"
                }
            }
            function q(a, b) {
                return a(3) < 12 ? b("amDesignator") : b("pmDesignator")
            }
            function r(a) {
                return !isNaN(+a[0])
            }
            function s(a, b, c) {
                return a["get" + (b ? "UTC" : "") + B[c]]()
            }
            function t(a, b, c, d) {
                a["set" + (b ? "UTC" : "") + B[c]].apply(a, d)
            }
            function u(b) {
                return new a(b.getUTCFullYear(), b.getUTCMonth(), b.getUTCDate(), b.getUTCHours(), b.getUTCMinutes(), b.getUTCSeconds(), b.getUTCMilliseconds())
            }
            function v(b, c) {
                return 32 - (new a(F(b, c, 32))).getUTCDate()
            }
            function w(a) {
                return function () {
                    return a.apply(d, [this].concat(y(arguments)))
                }
            }
            function x(a) {
                var b = y(arguments, 1);
                return function () {
                    return a.apply(d, b.concat(y(arguments)))
                }
            }
            function y(a, b, e) {
                return c.prototype.slice.call(a, b || 0, e === d ? a.length : e)
            }
            function z(a, b) {
                for (var c = 0; c < a.length; c++) b(a[c], c)
            }
            function A(a, b) {
                b = b || 2;
                for (a += ""; a.length < b;) a = "0" + a;
                return a
            }
            var B = "FullYear,Month,Date,Hours,Minutes,Seconds,Milliseconds,Day,Year".split(","),
                C = ["Years", "Months", "Days"],
                D = [12, 31, 24, 60, 60, 1e3, 1],
                E = /(([a-zA-Z])\2*)|(\((('.*?'|\(.*?\)|.)*?)\))|('(.*?)')/,
                F = a.UTC,
                G = a.prototype.toUTCString,
                H = e.prototype;
            H.length = 1;
            H.splice = c.prototype.splice;
            H.getUTCMode = w(f);
            H.setUTCMode = w(g);
            H.getTimezoneOffset = function () {
                return f(this) ? 0 : this[0].getTimezoneOffset()
            };
            z(B, function (a, b) {
                H["get" + a] = function () {
                    return s(this[0], f(this), b)
                };
                b != 8 && (H["getUTC" + a] = function () {
                    return s(this[0], !0, b)
                });
                b != 7 && (H["set" + a] = function (a) {
                    h(this, b, a, arguments, f(this));
                    return this
                }, b != 8 && (H["setUTC" + a] = function (a) {
                    h(this, b, a, arguments, !0);
                    return this
                }, H["add" + (C[b] || a)] = function (a, c) {
                    i(this, b, a, c);
                    return this
                }, H["diff" + (C[b] || a)] = function (a) {
                    return j(this, a, b)
                }))
            });
            H.getWeek = function () {
                return k(x(s, this, !1))
            };
            H.getUTCWeek = function () {
                return k(x(s, this, !0))
            };
            H.setWeek = function (a, b) {
                m(this, a, b, !1);
                return this
            };
            H.setUTCWeek = function (a, b) {
                m(this, a, b, !0);
                return this
            };
            H.addWeeks = function (a) {
                return this.addDays(Number(a) * 7)
            };
            H.diffWeeks = function (a) {
                return j(this, a, 2) / 7
            };
            e.parsers = [function (b, c, d) {
                if (b = b.match(/^(\d{4})(-(\d{2})(-(\d{2})([T ](\d{2}):(\d{2})(:(\d{2})(\.(\d+))?)?(Z|(([-+])(\d{2})(:?(\d{2}))?))?)?)?)?$/)) {
                    var e = new a(F(b[1], b[3] ? b[3] - 1 : 0, b[5] || 1, b[7] || 0, b[8] || 0, b[10] || 0, b[12] ? Number("0." + b[12]) * 1e3 : 0));
                    b[13] ? b[14] && e.setUTCMinutes(e.getUTCMinutes() + (b[15] == "-" ? 1 : -1) * (Number(b[16]) * 60 + (b[18] ? Number(b[18]) : 0))) : c || (e = u(e));
                    return d.setTime(+e)
                }
            }];
            e.parse = function (a) {
                return +e("" + a)
            };
            H.toString = function (a, b, c) {
                return a === d || !r(this) ? this[0].toString() : n(this, a, b, c, f(this))
            };
            H.toUTCString = H.toGMTString = function (a, b, c) {
                return a === d || !r(this) ? this[0].toUTCString() : n(this, a, b, c, !0)
            };
            H.toISOString = function () {
                return this.toUTCString("yyyy-MM-dd'T'HH:mm:ss(.fff)zzz")
            };
            e.defaultLocale = "";
            e.locales = {
                "": {
                    monthNames: "January,February,March,April,May,June,July,August,September,October,November,December".split(","),
                    monthNamesShort: "Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),
                    dayNames: "Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),
                    dayNamesShort: "Sun,Mon,Tue,Wed,Thu,Fri,Sat".split(","),
                    amDesignator: "AM",
                    pmDesignator: "PM"
                }
            };
            e.formatters = {
                i: "yyyy-MM-dd'T'HH:mm:ss(.fff)",
                u: "yyyy-MM-dd'T'HH:mm:ss(.fff)zzz"
            };
            z("getTime,valueOf,toDateString,toTimeString,toLocaleString,toLocaleDateString,toLocaleTimeString,toJSON".split(","), function (a) {
                H[a] = function () {
                    return this[0][a]()
                }
            });
            H.setTime = function (a) {
                this[0].setTime(a);
                return this
            };
            H.valid = w(r);
            H.clone = function () {
                return new e(this)
            };
            H.clearTime = function () {
                return this.setHours(0, 0, 0, 0)
            };
            H.toDate = function () {
                return new a(+this[0])
            };
            e.now = function () {
                return +(new a)
            };
            e.today = function () {
                return (new e).clearTime()
            };
            e.UTC = F;
            e.getDaysInMonth = v;
            if (typeof module !== "undefined" && module.exports) module.exports = e;
            return e
        }(Date, Math, Array);
        var f = null;
        var g = null;
        var h = null;
        var i = null;
        var j = null;
        var k = null;
        var l = null;
        var m = null;
        var n = 1;
        var o = null;
        var p = null;
        var q = null;
        var r = false;
        var s = null;
        var t = {};
        var u = null;
        var v = null;
        var w = {};
        var x = false;
        c.init = function () {
            f = c.options.id;			
            if (String(c.options.pageSize).toLowerCase() == "auto") {
                c.options[option] = -1;
                o = c.options.pageSize;
                a(window).on("resize", c.windowResized)
            }
            c.options.types.string = (c.options.types || {}).string || {};
            c.options.types.number = (c.options.types || {}).number || {};
			c.options.types.numbersmall = (c.options.types || {}).numbersmall || {};
			c.options.types.money = (c.options.types || {}).money || {};
			c.options.types.stringsmall = (c.options.types || {}).stringsmall || {};			
			c.options.types.userid = (c.options.types || {}).userid || {};			
            c.options.types.bool = (c.options.types || {}).bool || {};
            c.options.types.date = (c.options.types || {}).date || {};
			
            if (c.options.preFill) {
                var b = {
                    cols: {
                        dummy: {
                            index: 1,
                            friendly: " ",
                            type: "none"
                        }
                    },
                    rows: []
                };
                for (var d = 0; d < c.options.pageSize; d++) b.rows.push({
                    dummy: " "
                });
                c.setData(b)
            }
            c.update()
        };
        c.createTable = function () {
            var d = new c.ext.XDate;
            if (g == null) {
                h = k = l = null;
                g = a('<table class="watable table table-striped table-hover table-bordered table-condensed"></table>').appendTo(f)
            }
            if (h == null) {
                g.find("thead").remove();
                i = j = null;
                h = a("<thead></thead>").prependTo(g)
            }
            var e = Object.keys(m.cols).sort(function (a, b) {
                return m.cols[a].index - m.cols[b].index
            });
            
            if (i == null) {
                h.find(".sort i").tooltip("hide");
                h.find(".sort").remove();
                i = a('<tr class="sort"></tr>').prependTo(h);
                if (v && !m.cols[v].hidden) {
                    var s = x ? "checked" : "";
                    var u = a("<th></th>").appendTo(i);
                    var y = a('<input {0} class="checkToggle" type="checkbox" />'.f(s)).appendTo(u);
                    y.on("change", c.checkToggleChanged)
                }
                for (var z = 0; z < e.length; z++) {
                    var A = e[z];
                    var B = m.cols[A];
                    if (!B.hidden) {
                        var u = a("<th></th>").appendTo(i);
                        var C = a('<a class="pull-left" href="#">{0}</a>'.f(B.friendly || A));
                        C.on("click", {
                            column: A
                        }, c.columnClicked).appendTo(u);
                        if (B.tooltip) a('<i class="icon-info-sign"></i>').tooltip({
                            title: B.tooltip,
                            placement: "top",
                            delay: {
                                show: 500,
                                hide: 100
                            }
                        }).appendTo(C);
                        if (A == q) {
                            if (r) a('<i class="icon-chevron-down pull-right"></i>').appendTo(u);
                            else a('<i class="icon-chevron-up pull-right"></i>').appendTo(u)
                        }
                    }
                }
            }
            if (j == null && c.options.filter) {
                h.find(".filter").remove();
                j = a('<tr class="filter"></tr>').appendTo(h);
                var u;
                var y;
                var D = "";
                var E = "";
                if (v && !m.cols[v].hidden) {
                    E = c.options.types.bool.tooltip || "Toggle between:<br/>indeterminate,<br/>checked,<br/>unchecked";
                    var u = a("<th></th>").appendTo(j);
                    var y = a('<input class="filter indeterminate" checked type="checkbox" />').appendTo(u);
                    a.map(t, function (a, b) {
                        if (b == "unique") {
                            if (a.filter) y.prop("checked", true).removeClass("indeterminate");
                            else if (!a.filter) y.prop("checked", false).removeClass("indeterminate");
                            else if (a.filter == "") y.addClass("indeterminate")
                        }
                    });
                    E = E.trim();
                    if (E) y.tooltip({
                        title: E,
                        trigger: "hover",
                        placement: "top",
                        delay: {
                            show: 500,
                            hide: 100
                        }
                    });
                    y.on("click", {
                        column: "unique"
                    }, c.filterChanged)
                }
                
                for (var z = 0; z < e.length; z++) {
                    var A = e[z];
                    var B = m.cols[A];
                    B.filter = B.filter === false ? false : true;
                    if (!B.hidden) {
                        u = a("<th></th>").appendTo(j);
                        switch (B.type || "none") {
							case "numbersmall":
								D = c.options.types.numbersmall.placeHolder || "";
                                E = c.options.types.numbersmall.tooltip || "Values 10 to 20:<br/>>10 <20<br/>Values exactly 50:<br/>=50";
                                y = a('<input placeholder="{0}" style="width:50px;" class="filter" type="text" />'.f(D));
                                y.on("keyup", {
                                    column: A
                                }, c.filterChanged);
                                break;
                            case "number":					
                                D = c.options.types.number.placeHolder || ">10 <20 =50";
                                E = c.options.types.number.tooltip || "Values 10 to 20:<br/>>10 <20<br/>Values exactly 50:<br/>=50";
                                y = a('<input placeholder="{0}" style="width:90px;" class="filter" type="text" />'.f(D));
                                y.on("keyup", {
                                    column: A
                                }, c.filterChanged);
                                break;
							case "money":
							debug(c.options.style);
                                D = c.options.types.number.placeHolder || ">10 <20 =50";
                                E = c.options.types.number.tooltip || "Values 10 to 20:<br/>>10 <20<br/>Values exactly 50:<br/>=50";
                                y = a('<input placeholder="{0}" style="width:90px;" class="filter" type="text" />'.f(D));
                                y.on("keyup", {
                                    column: A
                                }, c.filterChanged);
                                break;								
                            case "date2":
                                D = c.options.types.date.placeHolder || ">-7 <0";
                                E = c.options.types.date.tooltip || "Today:<br/>>0 <1<br/>A week today excluded:<br/>>-7 <0";
                                y = a('<div><input placeholder="{0}" class="filter" type="text" /></div>'.f(D));
                                if (c.options.types.date.datePicker === true || c.options.types.date.datePicker == b) {
                                    if (a().datepicker) {
                                        y.addClass("date-wrap");
                                        var F = (new c.ext.XDate(false)).setHours(0, 0, 0, 0).toString("yyyy-MM-dd");
                                        var G = a('<div style="float:right" class="date" data-date="{0}" data-date-format="{1}" />'.f(F, "yyyy-mm-dd")).appendTo(y);
                                        a('<input style="display:none" type="text"  />').appendTo(G);
                                        a('<span class="add-on"><i class="icon-chevron-right"></i></span>').on("click", {
                                            op: ">"
                                        }, c.dpOpChanged).appendTo(G);
                                        a('<span class="add-on"><i class="icon-chevron-left"></i></span>').on("click", {
                                            op: "<"
                                        }, c.dpOpChanged).appendTo(G);
                                        G.datepicker();
                                        G.on("changeDate", {
                                            column: A,
                                            input: a("input.filter", y)
                                        }, c.dpClicked)
                                    } else if (c.options.debug) console.log("datepicker plugin not found")
                                }
                                y.on("keyup", "input.filter", {
                                    column: A
                                }, c.filterChanged);
                                break;
                            case "bool":
                                E = c.options.types.bool.tooltip || "Toggle between:<br/>indeterminate,<br/>checked,<br/>unchecked";
                                y = a('<input class="filter indeterminate" checked type="checkbox" />');
                                y.on("click", {
                                    column: A
                                }, c.filterChanged);
                                break;
							case "id": 
								y = a("<div><input type=\"checkbox\" value=\"\" name=\"checkall\" id=\"checkall\"/></div>");
							break;							
							case "stringsmall":
                                D = c.options.types.string.placeHolder || "";
                                E = c.options.types.string.tooltip || "Find John Doe:<br/>John Doe<br/>Find all but John Doe:<br/>!John Doe";
                                y = a('<input placeholder="{0}" style="width:90px;" class="filter" type="text" />'.f(D));
                                y.on("keyup", {
                                    column: A
                                }, c.filterChanged);
                                break;
                            case "string":
                                D = c.options.types.string.placeHolder || "Buscar...";
                                E = c.options.types.string.tooltip || "Find John Doe:<br/>John Doe<br/>Find all but John Doe:<br/>!John Doe";
                                y = a('<input placeholder="{0}" class="filter" type="text" />'.f(D));
                                y.on("keyup", {
                                    column: A
                                }, c.filterChanged);
                                break;
							 case "userid":
                                D = c.options.types.userid.placeHolder || "";
                                E = c.options.types.userid.tooltip || "Find John Doe:<br/>John Doe<br/>Find all but John Doe:<br/>!John Doe";
                                y = a('<input placeholder="{0}" style="width:65px;" class="filter" type="text" />'.f(D));
                                y.on("keyup", {
                                    column: A
                                }, c.filterChanged);
                                break;
                            case "none":
                                y = a("<div> </div>");
                                break
                        }
                        E = E.trim();
						E = ''; //No tooltip
                        if (E) y.tooltip({
                            title: E,
                            trigger: "hover",
                            placement: "top",
                            delay: {
                                show: 500,
                                hide: 100
                            }
                        });
                        if (y && B.filter) {
                            a.map(t, function (a, b) {
                                if (b == A) {
                                    if (a.col.type == "bool") {
                                        if (a.filter) y.prop("checked", true).removeClass("indeterminate");
                                        else if (!a.filter) y.prop("checked", false).removeClass("indeterminate");
                                        else if (a.filter == "") y.addClass("indeterminate")
                                    } else y.val(a.filter)
                                }
                            });
                            y.appendTo(u)
                        }
                    }
                }
            }
            
            if (k == null) {
                g.find("tbody").remove();
                k = a("<tbody></tbody>").insertAfter(h);
                k.on("change", ".unique", c.rowChecked);
                k.on("click", "td", c.rowClicked);
                if (c.options.pageSize == -1) m.toRow = m.rows.length;
                else {
                    m.toRow = m.fromRow + c.options.pageSize;
                    if (m.toRow > m.rows.length) m.toRow = m.rows.length
                }
                var H = 0;                
                a.each(m.rows.slice(m.fromRow, m.toRow), function (b, d) {
                    var h = a("<tr></tr>").appendTo(k);
                    
                    if (v && !m.cols[v].hidden) {
                        var i = w[d[v]] != null ? "checked" : "";
                        var j = a("<td></td>").appendTo(h);
                        var l = a('<input class="unique" {0} type="checkbox" />'.f(i)).appendTo(j)
                    }
                    for (var n = 0; n < e.length; n++) {
                        var o = e[n];
                        var p = d[o] || "";
                        if (!m.cols[o]) return;
                        if (m.cols[o].unique) h.data("unique", p);
                        if (!m.cols[o].hidden) {
                            var j = a("<td></td>").appendTo(h);
                            j.data("column", m.cols[o]);
                            var q = d[o + "Format"] || m.cols[o].format || "{0}";                            
                            switch (m.cols[o].type) {
                                case "number":  case "numbersmall":                               
                                    j.html(q.f('<div class="right">'+p+'</div>'));
                                    break;
								case "money":                            
                                    j.html(q.f('<div class="right">$ '+addCommas(p)+'</div>'));
                                    break;
                                case "string": case "userid":  case "stringsmall":                               
                                case "none":
                                    j.html('<div class="left">'+q.f(p)+'</div>');
                                    break;
                                case "id":      								
									if(d.maxid == undefined){
										j.html(q.f(p));
									}else{
										if(d.maxid <= m.extras.maxlevel){
											j.html(q.f(p));
										}else{
											j.html("&nbsp;<span class=\"hiddenids\" id=\"hidden_"+p+"\">");                                        
										}
									}
                                    break;
                                case "date":
                                    p = (new c.ext.XDate(p, c.options.types.date.utc === true)).toString(c.options.types.date.format || "yyyy-MM-dd HH:mm:ss");
                                    j.html(q.f(p));
                                    break;
                                case "bool":
                                    a('<input type="checkbox" {0} disabled />'.f(p ? "checked" : "")).appendTo(j);
                                    break
                            }
                        }
                    }
                    H++;
                    if (c.options.pageSize == -1) {
                        if (!c.elementInViewport(f)) {
                            var r = g.find("tfoot").length;
                            if (!r && h.prev()) {
                                h.prev().remove();
                                H--
                            }
                            if (!r && h.prev()) {
                                h.prev().remove();
                                H--
                            }
                            if (!r && h.prev()) {
                                h.prev().remove();
                                H--
                            }
                            h.remove();
                            H--;
                            m.toRow = m.fromRow + H;
                            return false
                        }
                    } else {
                        if (H >= c.options.pageSize) {
                            m.toRow = m.fromRow + H;
                            return false
                        }
                    }
                });
                if (n == 1) {
                    o = H;
                    p = Math.round(Math.ceil(m.rows.length / o))
                }
                if (n == p) {
                    while (H < o) {
                        var I = a("<tr></tr>").appendTo(k);
                        if (v && !m.cols[v].hidden) {
                            var J = a("<td></td>").appendTo(I);
                            var y = a('<input disabled type="checkbox" />').appendTo(J)
                        }
                        a.each(m.cols, function (b, c) {
                            if (!c.hidden) {
                                a("<td> </td>").appendTo(I)
                            }
                        });
                        H++
                    }
                }
            }
            if (l == null) {
                g.find("tfoot").remove();
                l = a("<tfoot></tfoot>").insertAfter(k);
                var K = a("<tr></tr>").appendTo(l);
                var L = a('<td colspan="999"></td>').appendTo(K);                
                if (m.rows.length > 0) a("<p>Displaying {0}-{1} of {2} Items</p>".f(m.fromRow + 1, Math.min(m.toRow, m.rows.length), m.rows.length)).appendTo(L);                
                else {
                    a("<p>No results</p>").appendTo(L);
                    p = 0
                }                
                var M = n - 2;
                var N = n + 2;
                if (N > p) {
                    var O = N - p;
                    N = p;
                    M -= O
                }
                if (M < 1) M = 1;
                if (N < 5) N = 5;
                var P = a('<div class="btn-toolbar"></div>').appendTo(L);
                var Q = a('<div class="btn-group"></div>').appendTo(P);
                var R = a('<div class="pagination"></div>').appendTo(Q);
                var S = a("<ul></ul>").appendTo(R);
                a('<li class="{0}"><a href="#">«</a></li>'.f(n == 1 ? "disabled" : "")).on("click", {
                    pageIndex: n - 1
                }, c.pageChanged).appendTo(S);
                for (var z = M; z <= N; z++) {
                    var C = null;
                    if (z != n) C = a('<li class="{1}"><a href="#">{0}</a></li>'.f(z, z > p ? "disabled" : ""));
                    if (z == n) C = a('<li class="active"><a href="#">{0}</a></li>'.f(z));
                    if (C != null) {
                        C.on("click", {
                            pageIndex: z
                        }, c.pageChanged);
                        C.appendTo(S)
                    }
                }
                a('<li class="{0}"><a href="#">»</a></li>'.f(n == p ? "disabled" : "")).on("click", {
                    pageIndex: n + 1
                }, c.pageChanged).appendTo(S);
                if (c.options.pageSizes.length) {
                    var T = a('<div class="btn-group dropup pagesize"></div>').appendTo(P);
                    var U = a('<button class="btn2 dropdown-toggle2" data-toggle="dropdown" href="#">Records Per Page </button>').appendTo(T);
                    var V = a('<span class="caret"></span>').appendTo(U);
                    var W = a('<ul class="dropdown-menu">').appendTo(T);
                    a.each(c.options.pageSizes, function (b, c) {
                        var d = a("<li></li>").appendTo(W);
                        a('<a href="#">{0}</a>'.f(c)).appendTo(d)
                    });
                    T.on("click", "a", c.pageSizeChanged)
                }
                if (c.options.columnPicker) {
                    var T = a('<div class="btn-group dropup columnpicker"></div>').appendTo(P);
                    var U = a('<button class="btn2 dropdown-toggle2" data-toggle="dropdown" href="#">Headers to Display </button>').appendTo(T);
                    var V = a('<span class="caret"></span>').appendTo(U);
                    var W = a('<ul class="dropdown-menu">').appendTo(T);
                    a.each(m.cols, function (b, c) {						
                        if (c.type != "unique") {
                            var d = a("<li></li>").appendTo(W);							
                            a('<input {0} type="checkbox" title="{1}" value="{1}" > {2}</input>'.f(c.hidden ? "" : "checked", b, c.friendly || b)).appendTo(d)
                        }
                    });
                    T.on("click", "input", c.columnPickerClicked)
                }
                if (c.options.actions) {
                    var T = a('<div class="btn-group dropup actions"></div>').appendTo(P);
                    var U = a('<button class="btn2 dropdown-toggle2" data-toggle="dropdown" href="#"><i class="icon-list"></i> </button>').appendTo(T);
                    var V = a('<span class="caret"></span>').appendTo(U);
                    var W = a('<ul class="dropdown-menu">').appendTo(T);
                    if (c.options.actions.filter) {
                        var X = a("<li></li>").appendTo(W);
                        a('<input {0} type="checkbox" > Filter</input>'.f(c.options.filter ? "checked" : "")).appendTo(X);
                        X.on("click", "input", function (a) {
                            c.options.filter = !c.options.filter;
                            h = null;
                            c.createTable()
                        })
                    }
                    if (c.options.actions.columnPicker) {
                        var X = a("<li></li>").appendTo(W);
                        a('<input {0} type="checkbox" > ColumnPicker</input>'.f(c.options.columnPicker ? "checked" : "")).appendTo(X);
                        X.on("click", "input", function (a) {
                            c.options.columnPicker = !c.options.columnPicker;
                            l = null;
                            c.createTable()
                        })
                    }
                    if (c.options.actions.custom) {
                        a.each(c.options.actions.custom, function (b, c) {
                            var d = a("<li></li>").appendTo(W);
                            a(c).appendTo(d)
                        })
                    }                    
                }                
            }
            
            if (m.rows.length == 0 && c.options.hidePagerOnEmpty) a(".btn-toolbar", l).remove();
            if (c.options.debug) console.log("table created in {0} ms.".f(new c.ext.XDate - d));
            if (typeof c.options.tableCreated == "function") c.options.tableCreated.call(g.get(0), {
                table: g.get(0)
            })
            if (typeof c.options.dataCreated == "function") c.options.dataCreated.call(m.rows, {
                rows: m.rows})
            
        };
        c.update = function (b, d) {
            if (!c.options.url) {
                console.log("no url found");
                return
            }
            if (c.options.debug) console.log("requesting data from url:{0} data:{1}".f(c.options.url, JSON.stringify(c.options.urlData) || ""));
            var e = new c.ext.XDate;
            a.ajax({
                url: c.options.url,
                type: c.options.urlPost ? "POST" : "GET",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: c.options.urlData,
                async: true,
                success: function (a) {
                    if (c.options.debug) console.log("request finished in {0} ms.".f(new c.ext.XDate - e));
                    if (a.d && a.d.cols) c.setData(a.d, d);
                    else c.setData(a, d);
                    if (typeof b == "function") b.call(this)
                },
                error: function (a) {
                    console.log("request error: ".f(a))
                }
            })
        };
        c.setData = function (b, d) {
            var e = a.extend(true, {}, b);
            e.fromRow = m && m.fromRow || 0;
            e.toRow = m && m.toRow || 0;
            if (d || false) e.cols = m.cols;
            m = e;
            m.rowsOrg = m.rows;
            if (n > 1) {
                m.toRow = Math.min(m.rows.length, m.toRow);
                m.fromRow = m.toRow - o;
                m.fromRow = Math.max(m.fromRow, 0);
                n = Math.ceil(m.fromRow / o) + 1;
                p = Math.ceil(m.rows.length / o)
            } else {
                m.fromRow = 0;
                if (c.options.pageSize != -1) m.toRow = m.fromRow + c.options.pageSize;
                m.toRow = Math.max(m.toRow, m.rows.length)
            }
            a.each(m.cols, function (a, b) {
                if (!q && b.sortOrder) {
                    q = a;
                    r = b.sortOrder != "asc"
                }
                if (!b.type) m.cols[a].type = "none";
                if (b.unique) v = a;
                if (!b.index) m.cols[a].index = new c.ext.XDate;
                b.column = a
            });
            if (v) {
                m.cols["unique"] = {
                    column: "unique",
                    type: "unique",
                    index: -1,
                    hidden: true
                }
            }
            a.each(w, function (a, b) {
                w[a] = c.getRow(a)
            });
            h = null;
            k = null;
            l = null;
            c.filter();
            c.sort();
            c.createTable()
        };
        c.filter = function () {
            if (!c.options.filter) return;
            if (Object.keys(t).length == 0) return;
            else m.rows = a.extend(true, {}, m.rowsOrg);
            var b = new c.ext.XDate;			
            a.each(t, function (b, d) {
                if (c.options.debug) console.log("filtering on text:{0} col:{1} type:{2} ".f(d.filter, d.col.column, d.col.type));							
                switch (d.col.type) {
                    case "string":	case "stringsmall": case "userid":				
                        m.rows = a.map(m.rows, function (a) {
                            var c = String(a[b]);
                            var e = d.filter.toLowerCase();
                            var f = e.charAt(0) == "!";
                            if (f) e = e.substring(1);
                            var g = c.toLowerCase().indexOf(e);
                            if (g == -1 && f) return a;
                            else if (g >= 0 && !f) {
                                if (!a[b + "Format"] && !d.col.format) {
                                    var h = c.substring(0, g);
                                    var i = c.substring(g, g + d.filter.length);
                                    var j = c.substring(g + d.filter.length, a[b].length);
                                    a[b + "Format"] = '<span>{0}<span class="filter">{1}</span>{2}</span>'.f(h, i, j)
                                }
                                return a
                            }
                        });
                        break;
                    case "number": case "numbersmall": case "money": 
                    case "date":
                        m.rows = a.map(m.rows, function (e) {
                            var f = d.filter.replace(/\s+/gi, " ").split(" ");
                            var g = 0;
                            a.each(f, function (a, f) {
                                if (f.length < 2 || f.length == 2 && f.charAt(1) == "-") {
                                    g++;
                                    return
                                }
                                var h = f.charAt(0);
                                var i = f.substring(1, f.length);
                                if (d.col.type == "date") {
                                    var j = (new c.ext.XDate(c.options.types.date.utc === true)).setHours(0, 0, 0, 0);
                                    i = j - i * -1 * 60 * 60 * 24 * 1e3
                                }
                                switch (h) {
                                    case ">":
                                        if (e[b] >= i) g++;
                                        break;
                                    case "<":
                                        if (e[b] < i) g++;
                                        break;
                                    case "=":
                                        if (e[b] == i) g++;
                                        break
                                }
                            });                            
                            if (g == f.length || d.filter == "") return e
                        });
                        break;
                    case "bool":
                        m.rows = a.map(m.rows, function (a) {
                            if (d.filter === "") return a;
                            if (Boolean(a[b]) && d.filter || !Boolean(a[b]) && !d.filter) return a
                        });
                        break;
                    case "unique":
                        m.rows = a.map(m.rows, function (a) {
                            if (d.filter === "") return a;
                            var b = a[v];
                            var c = w[b] ? w[b][v] : "";
                            if (d.filter && b === c || !d.filter && c === "") return a
                        });
                        break
                }
                if (d.filter === "") delete t[d.col.column]
            });
           
            if (c.options.debug) console.log("filtering finished in {0} ms.".f(new c.ext.XDate - b));
            n = 1;
            m.fromRow = 0;
            k = null;
            l = null
        };
        c.sort = function () {
            if (!q) return;
            var a = new c.ext.XDate;
            if (c.options.debug) console.log("sorting on col:{0} order:{1}".f(q, r ? "desc" : "asc"));
            var b = m.cols[q].type == "string";
            m.rows = m.rows.sort(function (a, c) {
                if (b) {
                    if (String(a[q]).toLowerCase() == String(c[q]).toLowerCase()) return 0;
                    if (String(a[q]).toLowerCase() > String(c[q]).toLowerCase()) return r ? -1 : 1;
                    else return r ? 1 : -1
                } else {
                    if (a[q] == c[q]) return 0;
                    if (a[q] > c[q]) return r ? -1 : 1;
                    else return r ? 1 : -1
                }
            });
            if (c.options.debug) console.log("sorting finished in {0} ms.".f(new c.ext.XDate - a))
        };
        c.elementInViewport = function (a) {
            var b = a.get(0).getBoundingClientRect();
            return b.top >= 0 && b.left >= 0 && b.bottom <= window.innerHeight && b.right <= window.innerWidth
        };
        c.getRow = function (b) {
            var d = new c.ext.XDate;
            var e;
            a.each(m.rowsOrg, function (a, c) {
                if (c[v] == b) {
                    e = c;
                    return false
                }
            });
            if (c.options.debug) console.log("row lookup finished in {0} ms.".f(new c.ext.XDate - d));
            return e
        };
        c.filterChanged = function (b) {			
            if (u != null) {
                clearTimeout(u);
                if (c.options.debug) console.log("filtering cancelled")
            }
            var d = this.value;
            var e = m.cols[b.data.column];
            var f = 200;
            if (e.type == "bool" || e.type == "unique") {
                f = 0;
                var g = a(this);
                var h = "indeterminate";
                if (g.hasClass(h)) {
                    b.preventDefault();
                    g.removeClass(h);
                    d = true
                } else {
                    if (!g.is(":checked")) {
                        d = false
                    } else {
                        g.addClass(h);
                        d = ""
                    }
                }
            }
            t[e.column] = {
                filter: d,
                col: e
            };
            u = setTimeout(function () {
                u = null;
                c.filter();
                c.sort();
                c.createTable()
            }, f)
        };
        c.pageChanged = function (a) {
            a.preventDefault();
            if (a.data.pageIndex < 1 || a.data.pageIndex > p) return;
            n = a.data.pageIndex;
            if (c.options.debug) console.log("paging to index:{0}".f(n));
            m.fromRow = (n - 1) * o;
            m.toRow = m.fromRow + o;
            if (m.toRow > m.rows.length) m.toRow = m.rows.length;
            k = null;
            l = null;
            c.createTable()
        };
        c.pageSizeChanged = function (b) {
            b.preventDefault();
            var d = a(this).text().toLowerCase();
            if (c.options.debug) console.log("pagesize changed to:{0}".f(d));
            a(window).off("resize", c.windowResized);
            if (d == "all") c.options.pageSize = m.rows.length;
            else if (d == "auto") {
                c.options.pageSize = -1;
                a(window).on("resize", c.windowResized)
            } else c.options.pageSize = parseInt(d);
            n = 1;
            m.fromRow = 0;
            m.toRow = m.fromRow + c.options.pageSize;
            if (m.toRow > m.rows.length) m.toRow = m.rows.length;
            k = null;
            l = null;
            c.createTable()
        };
        c.columnClicked = function (a) {
            a.preventDefault();
            if (c.options.debug) console.log("col:{0} clicked".f(a.data.column));
            if (q == a.data.column) r = !r;
            q = a.data.column;
            i = null;
            k = null;
            c.sort();
            c.createTable()
        };
        c.columnPickerClicked = function (b) {
            b.stopPropagation();
            var d = a(this);
            var e = d.val();
            if (c.options.debug) console.log("col:{0} {1}".f(e, d.is(":checked") ? "checked" : "unchecked"));
            m.cols[e].hidden = !m.cols[e].hidden;
            m.cols[e].index = new c.ext.XDate;
            h = null;
            k = null;
            c.createTable()
        };
        c.checkToggleChanged = function (b) {
            b.preventDefault();
            var d = a(this);
            if (d.is(":checked")) {
                var e = new c.ext.XDate;
                a.each(m.rows, function (a, b) {
                    var c = m.rows[a];
                    w[b[v]] = c
                });
                if (c.options.debug) console.log("{0} rows checked in {1} ms.".f(m.rows.length, new c.ext.XDate - e));
                x = true
            } else {
                w = {};
                x = false
            }
            k = null;
            c.createTable()
        };
        c.rowChecked = function (b) {
            b.preventDefault();
            var d = a(this);
            var e = d.closest("tr").data("unique");
            console.log("row({0}) {1}".f(e, d.is(":checked") ? "checked" : "unchecked"));
            if (d.is(":checked")) w[e] = c.getRow(e);
            else delete w[e]
        };
        c.rowClicked = function (b) {
            if (!v) {
                if (c.options.debug) console.log("no unique column specified");
                return
            }
            var d = a(this);
            var e = d.data("column");
            var f = d.closest("tr").data("unique");
            var g = c.getRow(f);
            if (typeof c.options.rowClicked == "function") c.options.rowClicked.call(b.target, {
                event: b,
                row: g,
                column: e
            })
        };
        c.dpOpChanged = function (a) {
            if (c.options.debug) console.log("dp oper:{0} clicked".f(a.data.op));
            a.preventDefault();
            s = a.data.op
        };
        c.dpClicked = function (b) {
            if (c.options.debug) console.log("dp date:{0} clicked".f((new c.ext.XDate(b.date, c.options.types.date.utc === true)).toString("yyyy-MM-dd")));
            b.preventDefault();
            var d = (new c.ext.XDate(false)).setHours(0, 0, 0, 0);
            var e = Math.floor(b.date / (60 * 60 * 24 * 1e3)) - Math.floor(d / (60 * 60 * 24 * 1e3));
            var f = a(b.data.input).val().replace(/\s{2,}/g, " ").trim().split(" ");
            var g = -1;
            a.each(f, function (a, b) {
                if (f[a].charAt(0) == s) g = a
            });
            if (g != -1) f[g] = s + e;
            else f.push(s + e);
            a(this).datepicker("hide");
            a(b.data.input).val(f.join(" ")).trigger("keyup")
        };
        c.windowResized = function (a) {
            if (c.options.debug) console.log("window resized");
            n = 1;
            m.fromRow = 0;
            k = null;
            l = null;
            c.createTable()
        };
        d.init = function (b) {
            if (c.options.debug) console.log("watable initialization...");
            a.extend(c.options, e, b);
            c.init();
            return d
        };
        d.update = function (a, b) {
            if (c.options.debug) console.log("publ.update called");
            c.update(a, b);
            return d
        };
        d.getData = function (b, d) {
            if (c.options.debug) console.log("publ.getData called");
            b = b || false;
            d = d || false;
            var e = a.extend(true, {}, m);
            delete e.cols["unique"];
            if (!d) {
                delete e.rows;
                e.rows = e.rowsOrg
            }
            delete e.rowsOrg;
            delete e.fromRow;
            delete e.toRow;
            if (b) {
                delete e.rows;
                e.rows = a.map(w, function (a, b) {
                    return a
                })
            }
            return e
        };
        d.setData = function (a, b) {
            if (c.options.debug) console.log("publ.setData called");
            c.setData(a, b);
            return d
        };
        d.getObject = function(){
          return m;  
        };
        d.option = function (a, e) {
            if (c.options.debug) console.log("publ.option called");
            if (e == b) return c.options[a];
            c.options[a] = e;
            h = null;
            k = null;
            l = null;
            c.createTable();
            return d
        };
        return d
    };
    a.fn.WATable = function (b) {
        b = b || {};
        return this.each(function () {
            b.id = this;
            a(this).data("WATable", (new c).init(b))
        })
    };
    String.prototype.format = String.prototype.f = function () {
        var a = this,
            b = arguments.length;
        while (b--) a = a.replace(new RegExp("\\{" + b + "\\}", "gm"), arguments[b]);
        return a
    }
})(jQuery);