
<div class="hcf_box">
    <style scoped>
        #hcf_price, #hcf_name {
			width: 100%;
		}
    </style>
	<p class="meta-options hcf_field"> 
        <input id="hcf_name" type="text" name="hcf_name" placeholder="Enter Name" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_name', true ) ); ?>">
    </p>
    <p class="meta-options hcf_field">
        <input id="hcf_price" type="text" placeholder="Enter Link" name="hcf_price" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_price', true ) ); ?>" />
    </p>
</div>