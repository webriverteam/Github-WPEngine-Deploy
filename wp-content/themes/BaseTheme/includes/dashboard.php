<?php
/**
 * Custom dashboard functions added to all projects
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */


/**
 * Remove default WordPress welcome panel
 *
 */

remove_action('welcome_panel', 'wp_welcome_panel');


/**
 * Custom welcome panel for WordPress dashboard
 *
 */

add_action( 'admin_footer', 'custom_dashboard_widget' );
function custom_dashboard_widget() {

	// Bail if not viewing the main dashboard page
	if ( get_current_screen()->base !== 'dashboard' ) {
		return;
	}

	?>

	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-container">
					<div class="welcome-panel-column-half">
						<h2>Welcome to Sample Project!</h2>
						<h3 class="about-description">We’ve assembled some links to get you started:</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque asperiores consequatur commodi maiores molestiae nihil, nostrum saepe, cupiditate corrupti quibusdam eveniet, minima optio consequuntur quidem?</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe itaque placeat maiores quam deserunt. Voluptates ad at deserunt quam error nulla ut incidunt, dolores facere.</p>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam, qui ex. Nisi possimus velit, corporis maxime dolorem itaque, sequi praesentium magnam soluta ducimus repudiandae illum?</p>
						<div class="cdw-socialshares">
							<span class="dashicons dashicons-facebook-alt"></span>
							<span class="dashicons dashicons-twitter"></span>
							<span class="dashicons dashicons-admin-site-alt2"></span>
						</div>
					</div><!-- .welcome-panel-column-half -->
					<div class="welcome-panel-column-half">
						<div class="cdw-form-container">
							<form name="contactform" method="post" action="http://sample.abubakar.me/wp-content/send_form_email.php">
								<div class="cdw-form-input cdw-half-input-field">
									<input type="text" name="first_name" id="first_name" maxlength="50" class="cdw-single-input" placeholder="Full Name">
								</div>
								<div class="cdw-form-input cdw-half-input-field">
									<input type="text" name="email" placeholder="Email"  class="cdw-single-input">
								</div>
								<div class="cdw-form-input">
									<textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
								</div>
								<div class="cdw-form-submit-button">
									<input type="submit" value="Submit" class="button button-primary button-large">
								</div>
							</form>
						</div>
					</div><!-- .welcome-panel-column-half -->
					<div class="clear"></div>
				</div>
				<div class="cdw-container-heading">
					Our Services
				</div>
				<div class="welcome-panel-container services-container">
					<div class="welcome-panel-column-fourth">
						<div class="cdw-service-panel">
							<div class="cdw-service-image">
								<span class="dashicons dashicons-wordpress-alt"></span>
							</div>
							<div class="cdw-service-heading">
								WordPress Development
							</div>
						</div>
					</div><!-- .welcome-panel-column-fourth -->
					<div class="welcome-panel-column-fourth">
						<div class="cdw-service-panel">
							<div class="cdw-service-image">
								<span class="dashicons dashicons-wordpress-alt"></span>
							</div>
							<div class="cdw-service-heading">
								WordPress Development
							</div>
						</div>
					</div><!-- .welcome-panel-column-fourth -->
					<div class="welcome-panel-column-fourth">
						<div class="cdw-service-panel">
							<div class="cdw-service-image">
								<span class="dashicons dashicons-wordpress-alt"></span>
							</div>
							<div class="cdw-service-heading">
								WordPress Development
							</div>
						</div>
					</div><!-- .welcome-panel-column-fourth -->
					<div class="welcome-panel-column-fourth">
						<div class="cdw-service-panel">
							<div class="cdw-service-image">
								<span class="dashicons dashicons-wordpress-alt"></span>
							</div>
							<div class="cdw-service-heading">
								WordPress Development
							</div>
						</div>
					</div><!-- .welcome-panel-column-fourth -->
					<div class="clear"></div>
				</div><!-- .welcome-panel-container -->
				<div class="welcome-panel-column">
					<h3>Get Started</h3>
					<a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://localhost:8888/uw-website/wp-admin/customize.php">Customize Your Site</a>
					<a class="button button-primary button-hero hide-if-customize" href="http://localhost:8888/uw-website/wp-admin/themes.php">Customize Your Site</a>
					<p class="hide-if-no-customize">or, <a href="http://localhost:8888/uw-website/wp-admin/themes.php">change your theme completely</a></p>
				</div><!-- .welcome-panel-column -->
				<div class="welcome-panel-column">
					<h3>Next Steps</h3>
					<ul>
						<li><a href="http://localhost:8888/uw-website/wp-admin/post.php?post=2557&amp;action=edit" class="welcome-icon welcome-edit-page">Edit your front page</a></li>
						<li><a href="http://localhost:8888/uw-website/wp-admin/post-new.php?post_type=page" class="welcome-icon welcome-add-page">Add additional pages</a></li>
						<li><a href="http://localhost:8888/uw-website/wp-admin/post-new.php" class="welcome-icon welcome-write-blog">Add a blog post</a></li>
						<li><a href="http://localhost:8888/uw-website/" class="welcome-icon welcome-view-site">View your site</a></li>
					</ul>
				</div><!-- .welcome-panel-column -->
				<div class="welcome-panel-column welcome-panel-last">
					<h3>More Actions</h3>
					<ul>
						<li><div class="welcome-icon welcome-widgets-menus">Manage <a href="http://localhost:8888/uw-website/wp-admin/widgets.php">widgets</a> or <a href="http://localhost:8888/uw-website/wp-admin/nav-menus.php">menus</a></div></li>
						<li><a href="http://localhost:8888/uw-website/wp-admin/options-discussion.php" class="welcome-icon welcome-comments">Turn comments on or off</a></li>
						<li><a href="https://codex.wordpress.org/First_Steps_With_WordPress" class="welcome-icon welcome-learn-more">Learn more about getting started</a></li>
					</ul>
				</div><!-- .welcome-panel-column -->
			</div>
		</div><!-- .welcome-panel-content -->
	</div><!-- .welcome-panel -->

	<script>
		jQuery(document).ready(function($) {
			$('#dashboard-widgets-wrap').before($('#welcome-panel').show());
		});
	</script>

<?php }


/**
 * Add custom CSS styles to WordPress admin panel
 *
 */

function custom_dashboard_css() {
	echo '
		<style>
			.welcome-panel-content {
				max-width: 100%;
			}
			.welcome-panel-column-half {
				float: left;
				width: 48%;
				margin-right: 4%;
			}
			.welcome-panel-container .welcome-panel-column-half {
				margin-right: 0;
			}
			.cdw-socialshares span.dashicons-facebook-alt {
				color: #3b5999;
			}
			.cdw-socialshares span.dashicons-twitter {
				color: #55acee;
			}
			.cdw-socialshares span {
				font-size: 24px;
				width: 35px;
			}
			.cdw-container-heading {
				width: auto;
				position: relative;
				text-align: center;
				margin: 40px 0;
				border-bottom: 2px solid #000;
			}
			.cdw-container-heading:after {
				position:absolute;
				height:2px;
				width:80%;
				top:50%;
				transform:translateY(-50%);
				left:5%;
				transform:translateX(-50%);
				z-index:1;
				background: #000;
			}
			.cdw-container-heading:before {
				position:absolute;
				height:2px;
				width:80%;
				top:50%;
				right: 5%;
				transform:translateY(-50%);
				transform:translateX(50%);
				z-index:1;
				background: #000;
			}
			.welcome-panel-container .welcome-panel-column-fourth {
				width: 23%;
				float: left;
				margin-right: 2%;
			}
			.welcome-panel-container .welcome-panel-column-fourth:nth-child(4n+4) {
				margin-right: 0;
			}
			.cdw-service-panel {
				text-align: center;
			}
			.services-container {
				margin-bottom:40px;
			}
			.cdw-service-image span {
				font-size: 50px;
				width: 50px;
				height: auto;
			}
			.cdw-half-input-field {
				width: 48%;
				margin-right: 4%;
				float: left;
			}
			.cdw-form-container .cdw-half-input-field:nth-child(2n+2) {
				margin-right: 0;
			}
			.cdw-form-input input, .cdw-form-input textarea {
				width: 100%;
				margin-bottom: 20px;
			}
			.cdw-form-input textarea {
				height: 130px;
			}
		</style>
	';
}

add_action('admin_head', 'custom_dashboard_css');
