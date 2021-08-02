/**
 * Sticky header
 */

jQuery(document).on("scroll", function() {
	if (jQuery(document).scrollTop() > 0) {
		jQuery("header, body").addClass("shrink");
	} else {
		jQuery("header, body").removeClass("shrink");
	}
});

jQuery(document).ready(function(jQuery) {
	/**
	 * Toggle menu for mobile
	 */
	jQuery(".menu-btn").click(function() {
		jQuery(this).toggleClass("active");
		jQuery(".menu-overlay").toggleClass("open");
		jQuery("html, body").toggleClass("no-overflow");
		jQuery(".main-menu ul li.active").removeClass("active");
		jQuery(".main-menu ul.sub-menu").slideUp();
	});

	/**
	 * Multilevel accordion menu for mobile
	 */
	jQuery("li").each(function() {
		if (jQuery(this).hasClass("menu-item-has-children")) {
			jQuery(this).prepend('<span class="submenu-icon"></span>');
		}
	});

	// jQuery(".main-menu .submenu-icon").click(function() {
	// 	const link = jQuery(this);
	// 	const closestUl = link.closest("ul");
	// 	const parallelActiveLinks = closestUl.find(".active");
	// 	const closestLi = link.closest("li");
	// 	const linkStatus = closestLi.hasClass("active");
	// 	let count = 0;

	// 	closestUl.find("ul").slideUp(function() {
	// 		if (++count === closestUl.find("ul").length) {
	// 			parallelActiveLinks.removeClass("active");
	// 		}
	// 	});

	// 	if (!linkStatus) {
	// 		closestLi.children("ul").slideDown();
	// 		closestLi.addClass("active");
	// 	}
	// });
});
