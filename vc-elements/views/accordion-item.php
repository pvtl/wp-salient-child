<?php
/**
 * View for Accordion Item Element
 *
 * @package salient-child
 */

$section_title = $atts['section_title'] ?? false;
$section_price = $atts['section_price'] ?? false;
$section_btn   = $atts['section_btn'] ?? false;
$section_link  = $atts['section_link'] ?? false;

$table = vc_param_group_parse_atts( $atts['table'] );

?>
<div class="toggle default" data-inner-wrap="true">
	<h3>
		<a href="#">
			<?php echo esc_attr( $section_title ); ?>
		</a>
		<?php if ( ! empty( $section_price ) ) : ?>
		<span class="price">
			$<?php echo esc_attr( $section_price ); ?>
		</span>
		<?php endif; ?>
		<?php if ( ! empty( $section_link ) && ! empty( $section_btn ) ) : ?>
		<div class="btn-container">
			<button onclick="window.location.href='<?php echo esc_url( $section_link ); ?>'" class="acc-btn"><?php echo esc_attr( $section_btn ); ?></button>
		</div>
		<?php endif; ?>
		<i class="fas fa-angle-down"></i>
	</h3>
	<div class="toggle-content">
		<div class="inner-content">
		   <?php if ( ! empty( $content ) ) : ?>
				<div class="content">
					<?php echo $content; ?>
				</div>
		   <?php endif; ?>
			<?php if ( ! empty( $table ) ) : ?>
				<table class="table pricing-table">
					<tbody>
					<?php foreach ( $table as $row ) : ?>
						<tr class="pricing-row">
							<th scope="row" class="pricing-title">
								<?php echo esc_attr( $row['row_title'] ); ?>
							</th>
							<td class="pricing-content">
								<?php echo esc_attr( $row['row_content'] ); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
	</div>
</div>
