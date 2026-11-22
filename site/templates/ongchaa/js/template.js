/* Ong-cha-A Brand Theme — slideshow + lightbox behaviors */
(function () {
	"use strict";

	// --- Simple slideshow (used by the banner module) ---
	function initSlides(root) {
		var slides = root.querySelectorAll(".oca-slide");
		if (!slides.length) return;
		var dots = root.querySelectorAll(".oca-dots button");
		var idx = 0, timer = null;

		function show(i) {
			slides.forEach(function (s, k) { s.classList.toggle("active", k === i); });
			dots.forEach(function (d, k) { d.classList.toggle("active", k === i); });
			idx = i;
		}
		function next() { show((idx + 1) % slides.length); }
		function play() { timer = setInterval(next, 5000); }

		dots.forEach(function (d, k) {
			d.addEventListener("click", function () {
				clearInterval(timer);
				show(k);
				play();
			});
		});
		show(0);
		play();
	}

	// --- Lightbox for the gallery ---
	function initLightbox() {
		var lb = document.querySelector(".oca-lightbox");
		if (!lb) {
			lb = document.createElement("div");
			lb.className = "oca-lightbox";
			lb.innerHTML = '<button class="oca-lightbox-close" aria-label="Close">&times;</button>' +
				'<img src="" alt="">' + '<div class="oca-lightbox-caption"></div>';
			document.body.appendChild(lb);
		}
		var img = lb.querySelector("img");
		var cap = lb.querySelector(".oca-lightbox-caption");
		var close = lb.querySelector(".oca-lightbox-close");

		function open(src, caption) {
			img.src = src;
			cap.textContent = caption || "";
			lb.classList.add("open");
		}
		function shut() { lb.classList.remove("open"); img.src = ""; }

		document.querySelectorAll(".oca-photo-grid figure").forEach(function (fig) {
			var f = fig.querySelector("img");
			if (!f) return;
			fig.addEventListener("click", function () {
				var full = f.src || f.getAttribute("data-full");
				open(full, fig.querySelector("figcaption") ? fig.querySelector("figcaption").textContent : "");
			});
		});
		close.addEventListener("click", shut);
		lb.addEventListener("click", function (e) { if (e.target === lb) shut(); });
		document.addEventListener("keydown", function (e) { if (e.key === "Escape") shut(); });
	}

	document.addEventListener("DOMContentLoaded", function () {
		document.querySelectorAll(".oca-slides").forEach(initSlides);
		initLightbox();
	});
})();
