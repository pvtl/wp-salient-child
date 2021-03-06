<?php
/**
 * Header of the email
 *
 * @package salient-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrapper = '
	background-color:' . $settings['body_bg'] . ';
	width:100%;
	-webkit-text-size-adjust:none !important;
	margin:0;
	padding: 0;
    padding-top: ' . ( $settings['body_bg'] != $settings['header_bg'] ? '70px' : '0' ) . ';
    padding-bottom: ' . ( $settings['body_bg'] != $settings['footer_bg'] ? '70px' : '0' ) . ';
';
// $border_radius = $settings['template'] == 'boxed' ? '6px' : '0px';
$template_container  = '
	background-color: #fafafa;
	width: 100%;
	max-width: ' . ( $settings['template'] == 'boxed' ? $settings['body_size'] . 'px' : '100%' ) . ';';
$template_header     = '
	background-color: ' . $settings['header_bg'] . ';
	color: #f1f1f1;
	border-bottom: 0;
	font-family:Arial;
	font-weight:bold;
	line-height:100%;
	vertical-align:middle;
';
$body_content        = '
	background-color: ' . $settings['email_body_bg'] . ';
';
$body_content_inner  = '
	color: ' . $settings['body_text_color'] . ';
	font-family:Arial;
	font-size: ' . $settings['body_text_size'] . 'px;
	line-height:150%;
	text-align:left;
';
$header_content_h1   = '
	color: ' . $settings['header_text_color'] . ';
	margin:0;
	padding: 28px 24px ' . ( $settings['email_body_bg'] != $settings['header_bg'] ? '28px' : '0' ) . ' 24px;
	display:block;
	font-family:Arial;
	font-size: ' . $settings['header_text_size'] . 'px;
	font-weight:bold;
	text-align:' . $settings['header_aligment'] . ';
	line-height: 150%;
';
$header_content_h1_a = '
	color: ' . $settings['header_text_color'] . ';
	text-decoration: none;
    ' . ( ! empty( $settings['header_logo'] ) ? 'line-height: 0;' : '' ) . '
';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo get_bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name' ); ?></title>
		<style type="text/css">
			#template_body a{
				color: <?php echo $settings['body_href_color']; ?>;
			}
		</style>
		<style type="text/css" id="custom-css">
			<?php echo $settings['custom_css']; ?>
		</style>
	</head>
	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="body" style="<?php echo $wrapper; ?>">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0"  id="template_container" style="<?php echo $template_container; ?>">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header" style="<?php echo $template_header; ?>">
										<tr>
											<td>
												<h1 style="<?php echo $header_content_h1; ?>" id="logo">
													<a style="<?php echo $header_content_h1_a; ?>" href="<?php echo apply_filters( 'mailtpl/templates/header_logo_url', home_url() ); ?>" title="<?php echo apply_filters( 'mailtpl/templates/header_logo_url_title', ! empty( $settings['header_logo_text'] ) ? do_shortcode( strip_tags( $settings['header_logo_text'] ) ) : get_bloginfo( 'name' ) ); ?>">
																		 <?php
																			if ( ! empty( $settings['header_logo'] ) ) {

																				$attrs = apply_filters( 'mailtpl/templates/header_logo_attr', array( 'style' => 'max-width:100%;' ) );

																				$header_logo_attr = array();
																				foreach ( $attrs as $attr_key => $attr_value ) {
																					$header_logo_attr[] = sanitize_key( $attr_key ) . '=' . sanitize_text_field( $attr_value );
																				}

																				echo '<img ' . implode( ' ', $header_logo_attr ) . ' src="' . apply_filters( 'mailtpl/templates/header_logo', $settings['header_logo'] ) . '" alt="' . apply_filters( 'mailtpl/templates/header_logo_alt', ! empty( $settings['header_logo_text'] ) ? do_shortcode( strip_tags( $settings['header_logo_text'] ) ) : get_bloginfo( 'description' ) ) . '"/>';
																			} elseif ( ! empty( $settings['header_logo_text'] ) ) {
																				echo do_shortcode( $settings['header_logo_text'] );
																			} else {
																				echo get_bloginfo( 'name' );
																			}
																			?>
													</a>
												</h1>

											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body">
										<tr>
											<td valign="top" style="<?php echo $body_content; ?>" id="mailtpl_body_bg">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div style="<?php echo $body_content_inner; ?>" id="mailtpl_body">
