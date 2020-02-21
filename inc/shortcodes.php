<?php 
	
// Container
add_shortcode('container','btsu_container_shortcode');
function btsu_container_shortcode( $atts, $content = null ) {       
	$html = '<div class="container">' . do_shortcode($content) . '</div>';
    return $html;
}	

// Container Fluid
add_shortcode('containerfluid','btsu_containerfluid_shortcode');
function btsu_containerfluid_shortcode( $atts, $content = null ) {       
	$html = '<div class="container-fluid">' . do_shortcode($content) . '</div>';
    return $html;
}

// row
add_shortcode('row','btsu_row_shortcode');
function btsu_row_shortcode( $atts, $content = null ) {       
	$html = '<div class="row">' . do_shortcode($content) . '</div>';
    return $html;
}

// columns
add_shortcode('col','bs_col_shortcode');
function bs_col_shortcode( $atts, $content = null ) {     
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'num'  => '',
                'sm'   => '',
                'md'   => '',
                'lg'   => '',
                'xl'   => '',
            ), 
            $atts
        )
    ); 
	ob_start();?>
	<div class="<?php 
		if(!empty($num)){ echo 'col-'.$num.' ';}
		if(!empty($sm)){ echo 'col-sm-'.$sm.' ';}
		if(!empty($md)){ echo 'col-md-'.$md.' ';}
		if(!empty($lg)){ echo 'col-lg-'.$lg.' ';}
		if(!empty($xl)){ echo 'col-xl-'.$xl.' ';}
		else{ echo 'col';}
	?>"><?php echo $content; ?></div>
	
	<?php return ob_get_clean();
}// columns


// Bootstrap Button
add_shortcode('button','bs_button_shortcode');
function bs_button_shortcode( $atts, $content = null ) {     
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'tag'  => 'button',
                'href'  => '',
                'type'   => 'button',
                'style'   => ''
            ), 
            $atts
        )
    ); 
    ob_start();?>

    <?php if( $tag == "button" ) { ?>
        <button type="<?php esc_attr_e($type); ?>" class="btn btn-<?php esc_attr_e( $style ); ?>"><?php echo $content; ?></button>
    <?php } else if( $tag == "a" ) { ?>
        <a href="<?php esc_attr_e($href); ?>" type="<?php esc_attr_e($type); ?>" class="btn btn-<?php esc_attr_e( $style ); ?>"><?php echo $content; ?></a>
    <?php } else if( $tag == "input" ) { ?>
        <input type="<?php esc_attr_e($type); ?>" class="btn btn-<?php esc_attr_e( $style ); ?>" value="<?php esc_attr_e($content); ?>">
    <?php } ?>
  
    <?php return ob_get_clean();
}