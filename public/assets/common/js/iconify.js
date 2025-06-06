/**
 * (c) Iconify
 *
 * For the full copyright and license information, please view the license.txt
 * files at https://github.com/iconify/iconify
 *
 * Licensed under MIT.
 *
 * @license MIT
 * @version 1.0.7
 */
! function () {
    "use strict";
    const t = Object.freeze({
            left: 0,
            top: 0,
            width: 16,
            height: 16
        }),
        e = Object.freeze({
            rotate: 0,
            vFlip: !1,
            hFlip: !1
        }),
        n = Object.freeze({
            ...t,
            ...e
        }),
        o = Object.freeze({
            ...n,
            body: "",
            hidden: !1
        }),
        i = Object.freeze({
            width: null,
            height: null
        }),
        r = Object.freeze({
            ...i,
            ...e
        });
    const s = /[\s,]+/;
    const c = {
        ...r,
        preserveAspectRatio: ""
    };

    function a(t) {
        const e = {
                ...c
            },
            n = (e, n) => t.getAttribute(e) || n;
        var o;
        return e.width = n("width", null), e.height = n("height", null), e.rotate = function (t, e = 0) {
            const n = t.replace(/^-?[0-9.]*/, "");

            function o(t) {
                for (; t < 0;) t += 4;
                return t % 4
            }
            if ("" === n) {
                const e = parseInt(t);
                return isNaN(e) ? 0 : o(e)
            }
            if (n !== t) {
                let e = 0;
                switch (n) {
                    case "%":
                        e = 25;
                        break;
                    case "deg":
                        e = 90
                }
                if (e) {
                    let i = parseFloat(t.slice(0, t.length - n.length));
                    return isNaN(i) ? 0 : (i /= e, i % 1 == 0 ? o(i) : 0)
                }
            }
            return e
        }(n("rotate", "")), o = e, n("flip", "").split(s).forEach((t => {
            switch (t.trim()) {
                case "horizontal":
                    o.hFlip = !0;
                    break;
                case "vertical":
                    o.vFlip = !0
            }
        })), e.preserveAspectRatio = n("preserveAspectRatio", n("preserveaspectratio", "")), e
    }
    const u = /^[a-z0-9]+(-[a-z0-9]+)*$/,
        l = (t, e, n, o = "") => {
            const i = t.split(":");
            if ("@" === t.slice(0, 1)) {
                if (i.length < 2 || i.length > 3) return null;
                o = i.shift().slice(1)
            }
            if (i.length > 3 || !i.length) return null;
            if (i.length > 1) {
                const t = i.pop(),
                    n = i.pop(),
                    r = {
                        provider: i.length > 0 ? i[0] : o,
                        prefix: n,
                        name: t
                    };
                return e && !f(r) ? null : r
            }
            const r = i[0],
                s = r.split("-");
            if (s.length > 1) {
                const t = {
                    provider: o,
                    prefix: s.shift(),
                    name: s.join("-")
                };
                return e && !f(t) ? null : t
            }
            if (n && "" === o) {
                const t = {
                    provider: o,
                    prefix: "",
                    name: r
                };
                return e && !f(t, n) ? null : t
            }
            return null
        },
        f = (t, e) => !!t && !("" !== t.provider && !t.provider.match(u) || !(e && "" === t.prefix || t.prefix.match(u)) || !t.name.match(u));

    function d(t, n) {
        const i = function (t, e) {
            const n = {};
            !t.hFlip != !e.hFlip && (n.hFlip = !0), !t.vFlip != !e.vFlip && (n.vFlip = !0);
            const o = ((t.rotate || 0) + (e.rotate || 0)) % 4;
            return o && (n.rotate = o), n
        }(t, n);
        for (const r in o) r in e ? r in t && !(r in i) && (i[r] = e[r]) : r in n ? i[r] = n[r] : r in t && (i[r] = t[r]);
        return i
    }

    function h(t, e, n) {
        const o = t.icons,
            i = t.aliases || Object.create(null);
        let r = {};

        function s(t) {
            r = d(o[t] || i[t], r)
        }
        return s(e), n.forEach(s), d(t, r)
    }

    function p(t, e) {
        const n = [];
        if ("object" != typeof t || "object" != typeof t.icons) return n;
        t.not_found instanceof Array && t.not_found.forEach((t => {
            e(t, null), n.push(t)
        }));
        const o = function (t, e) {
            const n = t.icons,
                o = t.aliases || Object.create(null),
                i = Object.create(null);
            return (e || Object.keys(n).concat(Object.keys(o))).forEach((function t(e) {
                if (n[e]) return i[e] = [];
                if (!(e in i)) {
                    i[e] = null;
                    const n = o[e] && o[e].parent,
                        r = n && t(n);
                    r && (i[e] = [n].concat(r))
                }
                return i[e]
            })), i
        }(t);
        for (const i in o) {
            const r = o[i];
            r && (e(i, h(t, i, r)), n.push(i))
        }
        return n
    }
    const g = {
        provider: "",
        aliases: {},
        not_found: {},
        ...t
    };

    function m(t, e) {
        for (const n in e)
            if (n in t && typeof t[n] != typeof e[n]) return !1;
        return !0
    }

    function b(t) {
        if ("object" != typeof t || null === t) return null;
        const e = t;
        if ("string" != typeof e.prefix || !t.icons || "object" != typeof t.icons) return null;
        if (!m(t, g)) return null;
        const n = e.icons;
        for (const t in n) {
            const e = n[t];
            if (!t.match(u) || "string" != typeof e.body || !m(e, o)) return null
        }
        const i = e.aliases || Object.create(null);
        for (const t in i) {
            const e = i[t],
                r = e.parent;
            if (!t.match(u) || "string" != typeof r || !n[r] && !i[r] || !m(e, o)) return null
        }
        return e
    }
    const y = Object.create(null);

    function v(t, e) {
        const n = y[t] || (y[t] = Object.create(null));
        return n[e] || (n[e] = function (t, e) {
            return {
                provider: t,
                prefix: e,
                icons: Object.create(null),
                missing: new Set
            }
        }(t, e))
    }

    function x(t, e) {
        return b(e) ? p(e, ((e, n) => {
            n ? t.icons[e] = n : t.missing.add(e)
        })) : []
    }

    function w(t, e) {
        let n = [];
        return ("string" == typeof t ? [t] : Object.keys(y)).forEach((t => {
            ("string" == typeof t && "string" == typeof e ? [e] : Object.keys(y[t] || {})).forEach((e => {
                const o = v(t, e);
                n = n.concat(Object.keys(o.icons).map((n => ("" !== t ? "@" + t + ":" : "") + e + ":" + n)))
            }))
        })), n
    }
    let k = !1;

    function j(t) {
        return "boolean" == typeof t && (k = t), k
    }

    function A(t) {
        const e = "string" == typeof t ? l(t, !0, k) : t;
        if (e) {
            const t = v(e.provider, e.prefix),
                n = e.name;
            return t.icons[n] || (t.missing.has(n) ? null : void 0)
        }
    }

    function _(t, e) {
        const n = l(t, !0, k);
        if (!n) return !1;
        return function (t, e, n) {
            try {
                if ("string" == typeof n.body) return t.icons[e] = {
                    ...n
                }, !0
            } catch (t) {}
            return !1
        }(v(n.provider, n.prefix), n.name, e)
    }

    function C(t, e) {
        if ("object" != typeof t) return !1;
        if ("string" != typeof e && (e = t.provider || ""), k && !e && !t.prefix) {
            let e = !1;
            return b(t) && (t.prefix = "", p(t, ((t, n) => {
                n && _(t, n) && (e = !0)
            }))), e
        }
        const n = t.prefix;
        if (!f({
                provider: e,
                prefix: n,
                name: "a"
            })) return !1;
        return !!x(v(e, n), t)
    }

    function O(t) {
        return !!A(t)
    }

    function S(t) {
        const e = A(t);
        return e ? {
            ...n,
            ...e
        } : null
    }

    function I(t, e) {
        t.forEach((t => {
            const n = t.loaderCallbacks;
            n && (t.loaderCallbacks = n.filter((t => t.id !== e)))
        }))
    }
    let E = 0;
    const M = Object.create(null);

    function T(t, e) {
        M[t] = e
    }

    function F(t) {
        return M[t] || M[""]
    }
    var N = {
        resources: [],
        index: 0,
        timeout: 2e3,
        rotate: 750,
        random: !1,
        dataAfterTimeout: !1
    };

    function P(t, e, n, o) {
        const i = t.resources.length,
            r = t.random ? Math.floor(Math.random() * i) : t.index;
        let s;
        if (t.random) {
            let e = t.resources.slice(0);
            for (s = []; e.length > 1;) {
                const t = Math.floor(Math.random() * e.length);
                s.push(e[t]), e = e.slice(0, t).concat(e.slice(t + 1))
            }
            s = s.concat(e)
        } else s = t.resources.slice(r).concat(t.resources.slice(0, r));
        const c = Date.now();
        let a, u = "pending",
            l = 0,
            f = null,
            d = [],
            h = [];

        function p() {
            f && (clearTimeout(f), f = null)
        }

        function g() {
            "pending" === u && (u = "aborted"), p(), d.forEach((t => {
                "pending" === t.status && (t.status = "aborted")
            })), d = []
        }

        function m(t, e) {
            e && (h = []), "function" == typeof t && h.push(t)
        }

        function b() {
            u = "failed", h.forEach((t => {
                t(void 0, a)
            }))
        }

        function y() {
            d.forEach((t => {
                "pending" === t.status && (t.status = "aborted")
            })), d = []
        }

        function v() {
            if ("pending" !== u) return;
            p();
            const o = s.shift();
            if (void 0 === o) return d.length ? void(f = setTimeout((() => {
                p(), "pending" === u && (y(), b())
            }), t.timeout)) : void b();
            const i = {
                status: "pending",
                resource: o,
                callback: (e, n) => {
                    ! function (e, n, o) {
                        const i = "success" !== n;
                        switch (d = d.filter((t => t !== e)), u) {
                            case "pending":
                                break;
                            case "failed":
                                if (i || !t.dataAfterTimeout) return;
                                break;
                            default:
                                return
                        }
                        if ("abort" === n) return a = o, void b();
                        if (i) return a = o, void(d.length || (s.length ? v() : b()));
                        if (p(), y(), !t.random) {
                            const n = t.resources.indexOf(e.resource); - 1 !== n && n !== t.index && (t.index = n)
                        }
                        u = "completed", h.forEach((t => {
                            t(o)
                        }))
                    }(i, e, n)
                }
            };
            d.push(i), l++, f = setTimeout(v, t.rotate), n(o, e, i.callback)
        }
        return "function" == typeof o && h.push(o), setTimeout(v),
            function () {
                return {
                    startTime: c,
                    payload: e,
                    status: u,
                    queriesSent: l,
                    queriesPending: d.length,
                    subscribe: m,
                    abort: g
                }
            }
    }

    function R(t) {
        const e = {
            ...N,
            ...t
        };
        let n = [];

        function o() {
            n = n.filter((t => "pending" === t().status))
        }
        return {
            query: function (t, i, r) {
                const s = P(e, t, i, ((t, e) => {
                    o(), r && r(t, e)
                }));
                return n.push(s), s
            },
            find: function (t) {
                return n.find((e => t(e))) || null
            },
            setIndex: t => {
                e.index = t
            },
            getIndex: () => e.index,
            cleanup: o
        }
    }

    function L(t) {
        let e;
        if ("string" == typeof t.resources) e = [t.resources];
        else if (e = t.resources, !(e instanceof Array && e.length)) return null;
        return {
            resources: e,
            path: t.path || "/",
            maxURL: t.maxURL || 500,
            rotate: t.rotate || 750,
            timeout: t.timeout || 5e3,
            random: !0 === t.random,
            index: t.index || 0,
            dataAfterTimeout: !1 !== t.dataAfterTimeout
        }
    }
    const z = Object.create(null),
        Q = ["https://api.simplesvg.com", "https://api.unisvg.com"],
        q = [];
    for (; Q.length > 0;) 1 === Q.length || Math.random() > .5 ? q.push(Q.shift()) : q.push(Q.pop());

    function D(t, e) {
        const n = L(e);
        return null !== n && (z[t] = n, !0)
    }

    function U(t) {
        return z[t]
    }

    function J() {
        return Object.keys(z)
    }

    function $() {}
    z[""] = L({
        resources: ["https://api.iconify.design"].concat(q)
    });
    const H = Object.create(null);

    function B(t, e, n) {
        let o, i;
        if ("string" == typeof t) {
            const e = F(t);
            if (!e) return n(void 0, 424), $;
            i = e.send;
            const r = function (t) {
                if (!H[t]) {
                    const e = U(t);
                    if (!e) return;
                    const n = {
                        config: e,
                        redundancy: R(e)
                    };
                    H[t] = n
                }
                return H[t]
            }(t);
            r && (o = r.redundancy)
        } else {
            const e = L(t);
            if (e) {
                o = R(e);
                const n = F(t.resources ? t.resources[0] : "");
                n && (i = n.send)
            }
        }
        return o && i ? o.query(e, i, n)().abort : (n(void 0, 424), $)
    }
    const G = "iconify2",
        V = "iconify",
        K = V + "-count",
        W = V + "-version",
        X = 36e5;

    function Y(t, e) {
        try {
            return t.getItem(e)
        } catch (t) {}
    }

    function Z(t, e, n) {
        try {
            return t.setItem(e, n), !0
        } catch (t) {}
    }

    function tt(t, e) {
        try {
            t.removeItem(e)
        } catch (t) {}
    }

    function et(t, e) {
        return Z(t, K, e.toString())
    }

    function nt(t) {
        return parseInt(Y(t, K)) || 0
    }
    const ot = {
            local: !0,
            session: !0
        },
        it = {
            local: new Set,
            session: new Set
        };
    let rt = !1;
    let st = "undefined" == typeof window ? {} : window;

    function ct(t) {
        const e = t + "Storage";
        try {
            if (st && st[e] && "number" == typeof st[e].length) return st[e]
        } catch (t) {}
        ot[t] = !1
    }

    function at(t, e) {
        const n = ct(t);
        if (!n) return;
        const o = Y(n, W);
        if (o !== G) {
            if (o) {
                const t = nt(n);
                for (let e = 0; e < t; e++) tt(n, V + e.toString())
            }
            return Z(n, W, G), void et(n, 0)
        }
        const i = Math.floor(Date.now() / X) - 168,
            r = t => {
                const o = V + t.toString(),
                    r = Y(n, o);
                if ("string" == typeof r) {
                    try {
                        const n = JSON.parse(r);
                        if ("object" == typeof n && "number" == typeof n.cached && n.cached > i && "string" == typeof n.provider && "object" == typeof n.data && "string" == typeof n.data.prefix && e(n, t)) return !0
                    } catch (t) {}
                    tt(n, o)
                }
            };
        let s = nt(n);
        for (let e = s - 1; e >= 0; e--) r(e) || (e === s - 1 ? (s--, et(n, s)) : it[t].add(e))
    }

    function ut() {
        if (!rt) {
            rt = !0;
            for (const t in ot) at(t, (t => {
                const e = t.data,
                    n = v(t.provider, e.prefix);
                if (!x(n, e).length) return !1;
                const o = e.lastModified || -1;
                return n.lastModifiedCached = n.lastModifiedCached ? Math.min(n.lastModifiedCached, o) : o, !0
            }))
        }
    }

    function lt(t, e) {
        function n(n) {
            let o;
            if (!ot[n] || !(o = ct(n))) return;
            const i = it[n];
            let r;
            if (i.size) i.delete(r = Array.from(i).shift());
            else if (r = nt(o), !et(o, r + 1)) return;
            const s = {
                cached: Math.floor(Date.now() / X),
                provider: t.provider,
                data: e
            };
            return Z(o, V + r.toString(), JSON.stringify(s))
        }
        rt || ut(), e.lastModified && ! function (t, e) {
            const n = t.lastModifiedCached;
            if (n && n >= e) return n === e;
            if (t.lastModifiedCached = e, n)
                for (const n in ot) at(n, (n => {
                    const o = n.data;
                    return n.provider !== t.provider || o.prefix !== t.prefix || o.lastModified === e
                }));
            return !0
        }(t, e.lastModified) || Object.keys(e.icons).length && (e.not_found && delete(e = Object.assign({}, e)).not_found, n("local") || n("session"))
    }

    function ft() {}

    function dt(t) {
        t.iconsLoaderFlag || (t.iconsLoaderFlag = !0, setTimeout((() => {
            t.iconsLoaderFlag = !1,
                function (t) {
                    t.pendingCallbacksFlag || (t.pendingCallbacksFlag = !0, setTimeout((() => {
                        t.pendingCallbacksFlag = !1;
                        const e = t.loaderCallbacks ? t.loaderCallbacks.slice(0) : [];
                        if (!e.length) return;
                        let n = !1;
                        const o = t.provider,
                            i = t.prefix;
                        e.forEach((e => {
                            const r = e.icons,
                                s = r.pending.length;
                            r.pending = r.pending.filter((e => {
                                if (e.prefix !== i) return !0;
                                const s = e.name;
                                if (t.icons[s]) r.loaded.push({
                                    provider: o,
                                    prefix: i,
                                    name: s
                                });
                                else {
                                    if (!t.missing.has(s)) return n = !0, !0;
                                    r.missing.push({
                                        provider: o,
                                        prefix: i,
                                        name: s
                                    })
                                }
                                return !1
                            })), r.pending.length !== s && (n || I([t], e.id), e.callback(r.loaded.slice(0), r.missing.slice(0), r.pending.slice(0), e.abort))
                        }))
                    })))
                }(t)
        })))
    }
    const ht = (t, e) => {
            const n = function (t, e = !0, n = !1) {
                    const o = [];
                    return t.forEach((t => {
                        const i = "string" == typeof t ? l(t, e, n) : t;
                        i && o.push(i)
                    })), o
                }(t, !0, j()),
                o = function (t) {
                    const e = {
                            loaded: [],
                            missing: [],
                            pending: []
                        },
                        n = Object.create(null);
                    t.sort(((t, e) => t.provider !== e.provider ? t.provider.localeCompare(e.provider) : t.prefix !== e.prefix ? t.prefix.localeCompare(e.prefix) : t.name.localeCompare(e.name)));
                    let o = {
                        provider: "",
                        prefix: "",
                        name: ""
                    };
                    return t.forEach((t => {
                        if (o.name === t.name && o.prefix === t.prefix && o.provider === t.provider) return;
                        o = t;
                        const i = t.provider,
                            r = t.prefix,
                            s = t.name,
                            c = n[i] || (n[i] = Object.create(null)),
                            a = c[r] || (c[r] = v(i, r));
                        let u;
                        u = s in a.icons ? e.loaded : "" === r || a.missing.has(s) ? e.missing : e.pending;
                        const l = {
                            provider: i,
                            prefix: r,
                            name: s
                        };
                        u.push(l)
                    })), e
                }(n);
            if (!o.pending.length) {
                let t = !0;
                return e && setTimeout((() => {
                    t && e(o.loaded, o.missing, o.pending, ft)
                })), () => {
                    t = !1
                }
            }
            const i = Object.create(null),
                r = [];
            let s, c;
            return o.pending.forEach((t => {
                const {
                    provider: e,
                    prefix: n
                } = t;
                if (n === c && e === s) return;
                s = e, c = n, r.push(v(e, n));
                const o = i[e] || (i[e] = Object.create(null));
                o[n] || (o[n] = [])
            })), o.pending.forEach((t => {
                const {
                    provider: e,
                    prefix: n,
                    name: o
                } = t, r = v(e, n), s = r.pendingIcons || (r.pendingIcons = new Set);
                s.has(o) || (s.add(o), i[e][n].push(o))
            })), r.forEach((t => {
                const {
                    provider: e,
                    prefix: n
                } = t;
                i[e][n].length && function (t, e) {
                    t.iconsToLoad ? t.iconsToLoad = t.iconsToLoad.concat(e).sort() : t.iconsToLoad = e, t.iconsQueueFlag || (t.iconsQueueFlag = !0, setTimeout((() => {
                        t.iconsQueueFlag = !1;
                        const {
                            provider: e,
                            prefix: n
                        } = t, o = t.iconsToLoad;
                        let i;
                        delete t.iconsToLoad, o && (i = F(e)) && i.prepare(e, n, o).forEach((n => {
                            B(e, n, (e => {
                                if ("object" != typeof e) n.icons.forEach((e => {
                                    t.missing.add(e)
                                }));
                                else try {
                                    const n = x(t, e);
                                    if (!n.length) return;
                                    const o = t.pendingIcons;
                                    o && n.forEach((t => {
                                        o.delete(t)
                                    })), lt(t, e)
                                } catch (t) {
                                    console.error(t)
                                }
                                dt(t)
                            }))
                        }))
                    })))
                }(t, i[e][n])
            })), e ? function (t, e, n) {
                const o = E++,
                    i = I.bind(null, n, o);
                if (!e.pending.length) return i;
                const r = {
                    id: o,
                    icons: e,
                    callback: t,
                    abort: i
                };
                return n.forEach((t => {
                    (t.loaderCallbacks || (t.loaderCallbacks = [])).push(r)
                })), i
            }(e, o, r) : ft
        },
        pt = t => new Promise(((e, o) => {
            const i = "string" == typeof t ? l(t, !0) : t;
            i ? ht([i || t], (r => {
                if (r.length && i) {
                    const t = A(i);
                    if (t) return void e({
                        ...n,
                        ...t
                    })
                }
                o(t)
            })) : o(t)
        }));

    function gt(t, e) {
        const n = "string" == typeof t ? l(t, !0, !0) : null;
        if (!n) {
            const e = function (t) {
                try {
                    const e = "string" == typeof t ? JSON.parse(t) : t;
                    if ("string" == typeof e.body) return {
                        ...e
                    }
                } catch (t) {}
            }(t);
            return {
                value: t,
                data: e
            }
        }
        const o = A(n);
        if (void 0 !== o || !n.prefix) return {
            value: t,
            name: n,
            data: o
        };
        const i = ht([n], (() => e(t, n, A(n))));
        return {
            value: t,
            name: n,
            loading: i
        }
    }

    function mt(t) {
        return t.hasAttribute("inline")
    }
    let bt = !1;
    try {
        bt = 0 === navigator.vendor.indexOf("Apple")
    } catch (t) {}
    const yt = /(-?[0-9.]*[0-9]+[0-9.]*)/g,
        vt = /^-?[0-9.]*[0-9]+[0-9.]*$/g;

    function xt(t, e, n) {
        if (1 === e) return t;
        if (n = n || 100, "number" == typeof t) return Math.ceil(t * e * n) / n;
        if ("string" != typeof t) return t;
        const o = t.split(yt);
        if (null === o || !o.length) return t;
        const i = [];
        let r = o.shift(),
            s = vt.test(r);
        for (;;) {
            if (s) {
                const t = parseFloat(r);
                isNaN(t) ? i.push(r) : i.push(Math.ceil(t * e * n) / n)
            } else i.push(r);
            if (r = o.shift(), void 0 === r) return i.join("");
            s = !s
        }
    }

    function wt(t, e) {
        const o = {
                ...n,
                ...t
            },
            i = {
                ...r,
                ...e
            },
            s = {
                left: o.left,
                top: o.top,
                width: o.width,
                height: o.height
            };
        let c = o.body;
        [o, i].forEach((t => {
            const e = [],
                n = t.hFlip,
                o = t.vFlip;
            let i, r = t.rotate;
            switch (n ? o ? r += 2 : (e.push("translate(" + (s.width + s.left).toString() + " " + (0 - s.top).toString() + ")"), e.push("scale(-1 1)"), s.top = s.left = 0) : o && (e.push("translate(" + (0 - s.left).toString() + " " + (s.height + s.top).toString() + ")"), e.push("scale(1 -1)"), s.top = s.left = 0), r < 0 && (r -= 4 * Math.floor(r / 4)), r %= 4, r) {
                case 1:
                    i = s.height / 2 + s.top, e.unshift("rotate(90 " + i.toString() + " " + i.toString() + ")");
                    break;
                case 2:
                    e.unshift("rotate(180 " + (s.width / 2 + s.left).toString() + " " + (s.height / 2 + s.top).toString() + ")");
                    break;
                case 3:
                    i = s.width / 2 + s.left, e.unshift("rotate(-90 " + i.toString() + " " + i.toString() + ")")
            }
            r % 2 == 1 && (s.left !== s.top && (i = s.left, s.left = s.top, s.top = i), s.width !== s.height && (i = s.width, s.width = s.height, s.height = i)), e.length && (c = '<g transform="' + e.join(" ") + '">' + c + "</g>")
        }));
        const a = i.width,
            u = i.height,
            l = s.width,
            f = s.height;
        let d, h;
        null === a ? (h = null === u ? "1em" : "auto" === u ? f : u, d = xt(h, l / f)) : (d = "auto" === a ? l : a, h = null === u ? xt(d, f / l) : "auto" === u ? f : u);
        const p = {},
            g = (t, e) => {
                (t => "unset" === t || "undefined" === t || "none" === t)(e) || (p[t] = e.toString())
            };
        return g("width", d), g("height", h), p.viewBox = s.left.toString() + " " + s.top.toString() + " " + l.toString() + " " + f.toString(), {
            attributes: p,
            body: c
        }
    }
    let kt = (() => {
        let t;
        try {
            if (t = fetch, "function" == typeof t) return t
        } catch (t) {}
    })();

    function jt(t) {
        kt = t
    }

    function At() {
        return kt
    }
    const _t = {
        prepare: (t, e, n) => {
            const o = [],
                i = function (t, e) {
                    const n = U(t);
                    if (!n) return 0;
                    let o;
                    if (n.maxURL) {
                        let t = 0;
                        n.resources.forEach((e => {
                            const n = e;
                            t = Math.max(t, n.length)
                        }));
                        const i = e + ".json?icons=";
                        o = n.maxURL - t - n.path.length - i.length
                    } else o = 0;
                    return o
                }(t, e),
                r = "icons";
            let s = {
                    type: r,
                    provider: t,
                    prefix: e,
                    icons: []
                },
                c = 0;
            return n.forEach(((n, a) => {
                c += n.length + 1, c >= i && a > 0 && (o.push(s), s = {
                    type: r,
                    provider: t,
                    prefix: e,
                    icons: []
                }, c = n.length), s.icons.push(n)
            })), o.push(s), o
        },
        send: (t, e, n) => {
            if (!kt) return void n("abort", 424);
            let o = function (t) {
                if ("string" == typeof t) {
                    const e = U(t);
                    if (e) return e.path
                }
                return "/"
            }(e.provider);
            switch (e.type) {
                case "icons": {
                    const t = e.prefix,
                        n = e.icons.join(",");
                    o += t + ".json?" + new URLSearchParams({
                        icons: n
                    }).toString();
                    break
                }
                case "custom": {
                    const t = e.uri;
                    o += "/" === t.slice(0, 1) ? t.slice(1) : t;
                    break
                }
                default:
                    return void n("abort", 400)
            }
            let i = 503;
            kt(t + o).then((t => {
                const e = t.status;
                if (200 === e) return i = 501, t.json();
                setTimeout((() => {
                    n(function (t) {
                        return 404 === t
                    }(e) ? "abort" : "next", e)
                }))
            })).then((t => {
                "object" == typeof t && null !== t ? setTimeout((() => {
                    n("success", t)
                })) : setTimeout((() => {
                    404 === t ? n("abort", t) : n("next", i)
                }))
            })).catch((() => {
                n("next", i)
            }))
        }
    };

    function Ct(t, e) {
        switch (t) {
            case "local":
            case "session":
                ot[t] = e;
                break;
            case "all":
                for (const t in ot) ot[t] = e
        }
    }
    const Ot = "data-style";
    let St = "";

    function It(t) {
        St = t
    }

    function Et(t, e) {
        let n = Array.from(t.childNodes).find((t => t.hasAttribute && t.hasAttribute(Ot)));
        n || (n = document.createElement("style"), n.setAttribute(Ot, Ot), t.appendChild(n)), n.textContent = ":host{display:inline-block;vertical-align:" + (e ? "-0.125em" : "0") + "}span,svg{display:block}" + St
    }

    function Mt(t, e) {
        let n = -1 === t.indexOf("xlink:") ? "" : ' xmlns:xlink="http://www.w3.org/1999/xlink"';
        for (const t in e) n += " " + t + '="' + e[t] + '"';
        return '<svg xmlns="http://www.w3.org/2000/svg"' + n + ">" + t + "</svg>"
    }
    const Tt = {
            "background-color": "currentColor"
        },
        Ft = {
            "background-color": "transparent"
        },
        Nt = {
            image: "var(--svg)",
            repeat: "no-repeat",
            size: "100% 100%"
        },
        Pt = {
            "-webkit-mask": Tt,
            mask: Tt,
            background: Ft
        };
    for (const t in Pt) {
        const e = Pt[t];
        for (const n in Nt) e[t + "-" + n] = Nt[n]
    }

    function Rt(t) {
        return t ? t + (t.match(/^[-0-9.]+$/) ? "px" : "") : "inherit"
    }

    function Lt(t, e) {
        const o = e.icon.data,
            i = e.customisations,
            r = wt(o, i);
        i.preserveAspectRatio && (r.attributes.preserveAspectRatio = i.preserveAspectRatio);
        const s = e.renderedMode;
        let c;
        if ("svg" === s) c = function (t) {
            const e = document.createElement("span"),
                n = t.attributes;
            let o = "";
            return n.width || (o = "width: inherit;"), n.height || (o += "height: inherit;"), o && (n.style = o), e.innerHTML = Mt(t.body, n), e.firstChild
        }(r);
        else c = function (t, e, n) {
            const o = document.createElement("span");
            let i = t.body; - 1 !== i.indexOf("<a") && (i += "\x3c!-- " + Date.now() + " --\x3e");
            const r = t.attributes,
                s = 'url("' + (u = Mt(i, {
                    ...r,
                    width: e.width + "",
                    height: e.height + ""
                }), "data:image/svg+xml," + function (t) {
                    return t.replace(/"/g, "'").replace(/%/g, "%25").replace(/#/g, "%23").replace(/</g, "%3C").replace(/>/g, "%3E").replace(/\s+/g, " ")
                }(u) + '")'),
                c = o.style,
                a = {
                    "--svg": s,
                    width: Rt(r.width),
                    height: Rt(r.height),
                    ...n ? Tt : Ft
                };
            var u;
            for (const t in a) c.setProperty(t, a[t]);
            return o
        }(r, {
            ...n,
            ...o
        }, "mask" === s);
        const a = Array.from(t.childNodes).find((t => {
            const e = t.tagName && t.tagName.toUpperCase();
            return "SPAN" === e || "SVG" === e
        }));
        a ? "SPAN" === c.tagName && a.tagName === c.tagName ? a.setAttribute("style", c.getAttribute("style")) : t.replaceChild(c, a) : t.appendChild(c)
    }

    function zt(t, e, n) {
        return {
            rendered: !1,
            inline: e,
            icon: t,
            lastRender: n && (n.rendered ? n : n.lastRender)
        }
    }! function (t = "iconify-icon") {
        let e, n;
        try {
            e = window.customElements, n = window.HTMLElement
        } catch (t) {
            return
        }
        if (!e || !n) return;
        const o = e.get(t);
        if (o) return o;
        const i = ["icon", "mode", "inline", "width", "height", "rotate", "flip"],
            r = class extends n {
                _shadowRoot;
                _state;
                _checkQueued = !1;
                constructor() {
                    super();
                    const t = this._shadowRoot = this.attachShadow({
                            mode: "open"
                        }),
                        e = mt(this);
                    Et(t, e), this._state = zt({
                        value: ""
                    }, e), this._queueCheck()
                }
                static get observedAttributes() {
                    return i.slice(0)
                }
                attributeChangedCallback(t) {
                    if ("inline" === t) {
                        const t = mt(this),
                            e = this._state;
                        t !== e.inline && (e.inline = t, Et(this._shadowRoot, t))
                    } else this._queueCheck()
                }
                get icon() {
                    const t = this.getAttribute("icon");
                    if (t && "{" === t.slice(0, 1)) try {
                        return JSON.parse(t)
                    } catch (t) {}
                    return t
                }
                set icon(t) {
                    "object" == typeof t && (t = JSON.stringify(t)), this.setAttribute("icon", t)
                }
                get inline() {
                    return mt(this)
                }
                set inline(t) {
                    t ? this.setAttribute("inline", "true") : this.removeAttribute("inline")
                }
                restartAnimation() {
                    const t = this._state;
                    if (t.rendered) {
                        const e = this._shadowRoot;
                        if ("svg" === t.renderedMode) try {
                            return void e.lastChild.setCurrentTime(0)
                        } catch (t) {}
                        Lt(e, t)
                    }
                }
                get status() {
                    const t = this._state;
                    return t.rendered ? "rendered" : null === t.icon.data ? "failed" : "loading"
                }
                _queueCheck() {
                    this._checkQueued || (this._checkQueued = !0, setTimeout((() => {
                        this._check()
                    })))
                }
                _check() {
                    if (!this._checkQueued) return;
                    this._checkQueued = !1;
                    const t = this._state,
                        e = this.getAttribute("icon");
                    if (e !== t.icon.value) return void this._iconChanged(e);
                    if (!t.rendered) return;
                    const n = this.getAttribute("mode"),
                        o = a(this);
                    (t.attrMode !== n || function (t, e) {
                        for (const n in c)
                            if (t[n] !== e[n]) return !0;
                        return !1
                    }(t.customisations, o)) && this._renderIcon(t.icon, o, n)
                }
                _iconChanged(t) {
                    const e = gt(t, ((t, e, n) => {
                        const o = this._state;
                        if (o.rendered || this.getAttribute("icon") !== t) return;
                        const i = {
                            value: t,
                            name: e,
                            data: n
                        };
                        i.data ? this._gotIconData(i) : o.icon = i
                    }));
                    e.data ? this._gotIconData(e) : this._state = zt(e, this._state.inline, this._state)
                }
                _gotIconData(t) {
                    this._checkQueued = !1, this._renderIcon(t, a(this), this.getAttribute("mode"))
                }
                _renderIcon(t, e, n) {
                    const o = function (t, e) {
                            switch (e) {
                                case "svg":
                                case "bg":
                                case "mask":
                                    return e
                            }
                            return "style" === e || !bt && -1 !== t.indexOf("<a") ? -1 === t.indexOf("currentColor") ? "bg" : "mask" : "svg"
                        }(t.data.body, n),
                        i = this._state.inline;
                    Lt(this._shadowRoot, this._state = {
                        rendered: !0,
                        icon: t,
                        inline: i,
                        customisations: e,
                        attrMode: n,
                        renderedMode: o
                    })
                }
            };
        i.forEach((t => {
            t in r.prototype || Object.defineProperty(r.prototype, t, {
                get: function () {
                    return this.getAttribute(t)
                },
                set: function (e) {
                    null !== e ? this.setAttribute(t, e) : this.removeAttribute(t)
                }
            })
        }));
        const s = function () {
            let t;
            T("", _t), j(!0);
            try {
                t = window
            } catch (t) {}
            if (t) {
                if (ut(), void 0 !== t.IconifyPreload) {
                    const e = t.IconifyPreload,
                        n = "Invalid IconifyPreload syntax.";
                    "object" == typeof e && null !== e && (e instanceof Array ? e : [e]).forEach((t => {
                        try {
                            ("object" != typeof t || null === t || t instanceof Array || "object" != typeof t.icons || "string" != typeof t.prefix || !C(t)) && console.error(n)
                        } catch (t) {
                            console.error(n)
                        }
                    }))
                }
                if (void 0 !== t.IconifyProviders) {
                    const e = t.IconifyProviders;
                    if ("object" == typeof e && null !== e)
                        for (const t in e) {
                            const n = "IconifyProviders[" + t + "] is invalid.";
                            try {
                                const o = e[t];
                                if ("object" != typeof o || !o || void 0 === o.resources) continue;
                                D(t, o) || console.error(n)
                            } catch (t) {
                                console.error(n)
                            }
                        }
                }
            }
            return {
                enableCache: t => Ct(t, !0),
                disableCache: t => Ct(t, !1),
                iconExists: O,
                getIcon: S,
                listIcons: w,
                addIcon: _,
                addCollection: C,
                calculateSize: xt,
                buildIcon: wt,
                loadIcons: ht,
                loadIcon: pt,
                addAPIProvider: D,
                appendCustomStyle: It,
                _api: {
                    getAPIConfig: U,
                    setAPIModule: T,
                    sendAPIQuery: B,
                    setFetch: jt,
                    getFetch: At,
                    listAPIProviders: J
                }
            }
        }();
        for (const t in s) r[t] = r.prototype[t] = s[t];
        e.define(t, r)
    }()
}();