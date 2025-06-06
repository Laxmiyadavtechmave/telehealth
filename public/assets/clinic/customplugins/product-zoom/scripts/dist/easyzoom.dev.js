"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*!
 * @name        easyzoom
 * @author       <>
 * @modified    Thursday, November 22nd, 2018
 * @version     2.5.2
 */
!function (t, e) {
  "use strict";

  "function" == typeof define && define.amd ? define(["jquery"], function (t) {
    e(t);
  }) : "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports ? module.exports = t.EasyZoom = e(require("jquery")) : t.EasyZoom = e(t.jQuery);
}(void 0, function (i) {
  "use strict";

  var c,
      d,
      l,
      p,
      u,
      f,
      o = {
    loadingNotice: "Loading image",
    errorNotice: "The image could not be loaded",
    errorDuration: 2500,
    linkAttribute: "href",
    preventClicks: !0,
    beforeShow: i.noop,
    beforeHide: i.noop,
    onShow: i.noop,
    onHide: i.noop,
    onMove: i.noop
  };

  function s(t, e) {
    this.$target = i(t), this.opts = i.extend({}, o, e, this.$target.data()), void 0 === this.isOpen && this._init();
  }

  return s.prototype._init = function () {
    this.$link = this.$target.find("a"), this.$image = this.$target.find("img"), this.$flyout = i('<div class="easyzoom-flyout" />'), this.$notice = i('<div class="easyzoom-notice" />'), this.$target.on({
      "mousemove.easyzoom touchmove.easyzoom": i.proxy(this._onMove, this),
      "mouseleave.easyzoom touchend.easyzoom": i.proxy(this._onLeave, this),
      "mouseenter.easyzoom touchstart.easyzoom": i.proxy(this._onEnter, this)
    }), this.opts.preventClicks && this.$target.on("click.easyzoom", function (t) {
      t.preventDefault();
    });
  }, s.prototype.show = function (t, e) {
    var o = this;

    if (!1 !== this.opts.beforeShow.call(this)) {
      if (!this.isReady) return this._loadImage(this.$link.attr(this.opts.linkAttribute), function () {
        !o.isMouseOver && e || o.show(t);
      });
      this.$target.append(this.$flyout);
      var i = this.$target.outerWidth(),
          s = this.$target.outerHeight(),
          h = this.$flyout.width(),
          n = this.$flyout.height(),
          a = this.$zoom.width(),
          r = this.$zoom.height();
      (c = a - h) < 0 && (c = 0), (d = r - n) < 0 && (d = 0), l = c / i, p = d / s, this.isOpen = !0, this.opts.onShow.call(this), t && this._move(t);
    }
  }, s.prototype._onEnter = function (t) {
    var e = t.originalEvent.touches;
    this.isMouseOver = !0, e && 1 != e.length || (t.preventDefault(), this.show(t, !0));
  }, s.prototype._onMove = function (t) {
    this.isOpen && (t.preventDefault(), this._move(t));
  }, s.prototype._onLeave = function () {
    this.isMouseOver = !1, this.isOpen && this.hide();
  }, s.prototype._onLoad = function (t) {
    t.currentTarget.width && (this.isReady = !0, this.$notice.detach(), this.$flyout.html(this.$zoom), this.$target.removeClass("is-loading").addClass("is-ready"), t.data.call && t.data());
  }, s.prototype._onError = function () {
    var t = this;
    this.$notice.text(this.opts.errorNotice), this.$target.removeClass("is-loading").addClass("is-error"), this.detachNotice = setTimeout(function () {
      t.$notice.detach(), t.detachNotice = null;
    }, this.opts.errorDuration);
  }, s.prototype._loadImage = function (t, e) {
    var o = new Image();
    this.$target.addClass("is-loading").append(this.$notice.text(this.opts.loadingNotice)), this.$zoom = i(o).on("error", i.proxy(this._onError, this)).on("load", e, i.proxy(this._onLoad, this)), o.style.position = "absolute", o.src = t;
  }, s.prototype._move = function (t) {
    if (0 === t.type.indexOf("touch")) {
      var e = t.touches || t.originalEvent.touches;
      u = e[0].pageX, f = e[0].pageY;
    } else u = t.pageX || u, f = t.pageY || f;

    var o = this.$target.offset(),
        i = f - o.top,
        s = u - o.left,
        h = Math.ceil(i * p),
        n = Math.ceil(s * l);
    if (n < 0 || h < 0 || c < n || d < h) this.hide();else {
      var a = -1 * h,
          r = -1 * n;
      this.$zoom.css({
        top: a,
        left: r
      }), this.opts.onMove.call(this, a, r);
    }
  }, s.prototype.hide = function () {
    this.isOpen && !1 !== this.opts.beforeHide.call(this) && (this.$flyout.detach(), this.isOpen = !1, this.opts.onHide.call(this));
  }, s.prototype.swap = function (t, e, o) {
    this.hide(), this.isReady = !1, this.detachNotice && clearTimeout(this.detachNotice), this.$notice.parent().length && this.$notice.detach(), this.$target.removeClass("is-loading is-ready is-error"), this.$image.attr({
      src: t,
      srcset: i.isArray(o) ? o.join() : o
    }), this.$link.attr(this.opts.linkAttribute, e);
  }, s.prototype.teardown = function () {
    this.hide(), this.$target.off(".easyzoom").removeClass("is-loading is-ready is-error"), this.detachNotice && clearTimeout(this.detachNotice), delete this.$link, delete this.$zoom, delete this.$image, delete this.$notice, delete this.$flyout, delete this.isOpen, delete this.isReady;
  }, i.fn.easyZoom = function (e) {
    return this.each(function () {
      var t = i.data(this, "easyZoom");
      t ? void 0 === t.isOpen && t._init() : i.data(this, "easyZoom", new s(this, e));
    });
  }, s;
});