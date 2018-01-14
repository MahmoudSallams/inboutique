/**
 * Adaptive Image Script
 */
;(function(window) {
    "use strict";
    var PREFIX = "ais",
        PATH = ";path=",
        c = {},
        s, d = !1,
        l = !1,
        h = function() {
            for (var e = 0, t = window.document.cookie.split(";"), i = /^\sais\.([^=]+)=(.*?)\s*$/, n = {}, r; e < t.length; ++e)(r = t[e].match(i)) && (n[r[1]] = r[2]);
            return n
        },
        g = function(e, t) {
            e = Math.max(parseFloat(e || 1, 10), .01);
            var i = window.document.documentElement,
                r = function() {
                    var e = window.document.createElement("div"),
                        t = {
                            width: "1px",
                            height: "1px",
                            display: "inline-block"
                        };
                    for (var i in t) e.style[i] = t[i];
                    return e
                },
                o = window.document.createElement("div"),
                c = o.appendChild(r());
            o.appendChild(r()), i.appendChild(o);
            for (var s = o.clientHeight, d = Math.floor(window.innerWidth / s), l = d / 2, u = 0, h = [d]; u++ < 1e3 && (Math.abs(l) > e || o.clientHeight > s);) d += l, c.style.width = d + "em", l /= (o.clientHeight > s ? 1 : -1) * (l > 0 ? -2 : 2), h.push(d);
            return i.removeChild(o), d
        },
        p = function(e, t) {
            for (var i = 0, a = (e || "").split(","), n = /(\d+(?:\.\d+)?)(px)?/i, r = [], o; i < a.length; ++i)(o = a[i].match(n)) && r.push(parseFloat(o[1], 10));
            return r.sort(function(e, t) {
                return e - t
            })
        },
        v = function(e, t) {
            return t * Math.round(10 * e / t) / 10
        },
        ais = function() {
            navigator.cookieEnabled && (c = h()), void 0 !== c.images && (d = !0);
            var ais = window.document.getElementById("ais-script");
            if (ais) {
                var x = "2880",
                    A = "2880";
                if (PATH += ais.getAttribute("data-home"), "true" == ais.getAttribute("data-async"), navigator.cookieEnabled && (window.document.cookie = PREFIX + ".screen=" + window.screen.width + PATH)) {
                    var I = p(ais.getAttribute("data-image-breakpoints")),
                        M = Math.max(window.screen.width, window.screen.height),
                        P = null;
                    do {
                        if (M > (P = I.pop())) break;
                        x = P, window.devicePixelRatio > 1 && (A = P * window.devicePixelRatio)
                    } while (I.length)
                }
                if (window.devicePixelRatio > 1 ? (navigator.cookieEnabled && (window.document.cookie = PREFIX + ".images=" + A + PATH), window.aisImages = A) : (navigator.cookieEnabled && (window.document.cookie = PREFIX + ".images=" + x + PATH), window.aisImages = x), navigator.cookieEnabled) {
                    if (c = h(), s = c.css || "-", !("css" in c && c.css && "-" != c.css)) {
                        var y = window.innerWidth / g(parseFloat(ais.getAttribute("data-em-precision") || .5, 10) / 100);
                        s = window.screen.width + "x" + window.screen.height + "@" + Math.round(10 * y) / 10
                    }
                    window.document.cookie = PREFIX + ".css=" + s + PATH
                }
            }

    		var images = new Array(),
    			adaptiveImages = window.document.querySelectorAll(".adaptive-image:not(.adaptive-fetching)");

    		for (var i = 0; i < adaptiveImages.length; i++) {
    			var img = {},
    				adaptiveImage = adaptiveImages[i];
                adaptiveImage.classList.add("adaptive-fetching");
    			img.uid = adaptiveImage.getAttribute("data-img-uid");
    			img.url = adaptiveImage.getAttribute("data-guid");
                img.crop = adaptiveImage.getAttribute("data-crop");
    			img.path = adaptiveImage.getAttribute("data-path");
    			img.singlew = adaptiveImage.getAttribute("data-singlew");
    			img.singleh = adaptiveImage.getAttribute("data-singleh");
    			img.origwidth = adaptiveImage.getAttribute("data-width");
    			img.origheight = adaptiveImage.getAttribute("data-height");
    			img.fixed = adaptiveImage.getAttribute("data-fixed") == undefined ? null : adaptiveImage.getAttribute("data-fixed");
    			img.logicalWidth = window.screen.width;
    			img.physicalWidth = window.aisImages;
    			images.push(img);
    		}

    		var data = new Array(),
                jsonString = JSON.stringify(images);

    		data["cache"] = "false";
            data["images"] = jsonString;
    		data["action"] = "async_adaptive_images";
            data["abspath"] = zooScriptSettings.ABSPATH;

    		if (images.length > 0) {
    			var xmlhttp = new XMLHttpRequest();
    			xmlhttp.onreadystatechange = function() {
    				if (xmlhttp.readyState == XMLHttpRequest.DONE) {
    					if(xmlhttp.status == 200){
    						var images = JSON.parse(xmlhttp.responseText);
    						for (var i = 0; i < images.length; i++) {
    							var val = images[i];
    							var	getImage = document.querySelectorAll('[data-img-uid="'+val.uid+'"]');
    							for (var j = 0; j < getImage.length; j++) {
    								var replaceImg = new Image();
    								// replaceImg.source = getImage[j].getAttribute('src');
    								replaceImg.el = getImage[j];
                                    replaceImg.el.classList.remove("adaptive-async");
                                    replaceImg.el.classList.remove("adaptive-fetching");
    								replaceImg.onload = function () {
    									this.el.classList.add("async-done");
                                        this.el.removeAttribute("data-crop");
                                        this.el.removeAttribute("data-guid");
                                        this.el.removeAttribute("data-path");
                                        this.el.removeAttribute("data-fixed");
                                        this.el.removeAttribute("data-width");
                                        this.el.removeAttribute("data-height");
                                        this.el.removeAttribute("data-singleh");
                                        this.el.removeAttribute("data-singlew");
                                        this.el.removeAttribute("data-img-uid");
                                        // this.el.src = this.src;
    								}
                                    // console.log(val);
    								replaceImg.el.src = val.url;
    							}
    						}
    					} else if(xmlhttp.status == 400) {
    						console.log("404 error while making AJAX request!")
    					} else {
    						console.log("Unknown error occured.")
    					}
    				}
    			}
                var queryString = "",
                    arrayLength = Object.keys(data).length,
                    arrayCounter = 0;
                for (var key in data) {
                    queryString += key + "=" + data[key];
                    if(arrayCounter < arrayLength - 1) {
                        queryString += "&";
                    }
                    arrayCounter++;
                }
    			xmlhttp.open("POST", zooScriptSettings.baseUri + 'lib/helpers/ajax.php', true);
    			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(queryString);
    		}
        };

    // Init AI
    window.document.addEventListener("DOMContentLoaded", ais);
})(window);
