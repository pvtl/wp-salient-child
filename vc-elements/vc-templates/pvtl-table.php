<?php


$table = vc_param_group_parse_atts( $atts['table'] );

?>
<?php if ( ! empty( $table ) ) : ?>
    <table class="table pricing-table<?php echo $auto ? ' auto-width' : ''; ?><?php echo $white ? ' white-bg' : ''; ?>">
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
