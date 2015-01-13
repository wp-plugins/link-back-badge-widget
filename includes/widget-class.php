<?php

class LBBW_Widget extends WP_Widget {
	/**
	 * Construct function
	 */
	public function LBBW_Widget()
	{
		$widget_options =  array(
			'classname'   => 'lbbw-widget',
			'description' => 'Shows link back badge widget.'
		);
		$this->WP_Widget( 'LBBW_Widget', 'Link Back Badge Widget', $widget_options );
	}

	/**
	 * Build setting form
	 */		
	public function form( $instance )
	{
		$defaults = array(
			'title' => '',
			'image_url'   => '',
			'image_title' => '',
			'website_url' => ''
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		$title = $instance['title'];
		$image_url   = $instance['image_url'];
		$image_title = $instance['image_title'];
		$website_url = $instance['website_url'];

		ob_start();
		?>
		<p>
			Title:
			<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			Image URL:
			<input class="widefat" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo esc_url( $image_url ); ?>">
		</p>
		<p>
			Image Title:
			<input class="widefat" name="<?php echo $this->get_field_name('image_title'); ?>" type="text" value="<?php echo esc_attr( $image_title ); ?>">
		</p>
		<p>
			Website URL:
			<input class="widefat" name="<?php echo $this->get_field_name('website_url'); ?>" type="text" value="<?php echo esc_url( $website_url ); ?>">
		</p>
		<?php
		echo ob_get_clean();
	}

	/**
	 * Update widget setting form
	 * @param  array $new_instance new instance
	 * @param  array $old_instance old instance
	 * @return array               return sanitized values
	 */
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['image_url'] = sanitize_text_field( $new_instance['image_url'] );
		$instance['image_title'] = sanitize_text_field( $new_instance['image_title'] );
		$instance['website_url'] = sanitize_text_field( $new_instance['website_url'] );
		return $instance;
	}

	/**
	 * Display widget on page
	 * @param  array $args     built-in arguments of widget
	 * @param  array $instance value that has been submitted by user
	 * @return object           badge and html code box on site page
	 */
	public function widget( $args, $instance )
	{
		extract( $args );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );
		$image_url = ( empty( $instance['image_url'] ) ) ? '' : $instance['image_url'];
		$image_title = ( empty( $instance['image_title'] ) ) ? '' : $instance['image_title'];
		$website_url = ( empty( $instance['website_url'] ) ) ? '' : $instance['website_url'];

		if ( ! empty( $title ) ) {
			echo $before_title . esc_html( $title ) . $after_title;
		}

		if ( ! empty( $image_url ) && ! empty( $website_url ) ) {		
			ob_start();
			?>
			<div class="lbbw-wrap">
				<div class="lbbw-image-wrap">
					<img id="lbbw-image" class="lbbw-image" src="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_attr( $image_title ); ?>">
				</div>

				<div class="lbbw-instruction-wrap">
					<small class="lbbw-instruction">Copy the HTML code below and paste it on your website.</small>
				</div>

				<div class="lbbw-textarea-wrap">
					<textarea id="lbbw-textarea" class="lbbw-textarea" onclick="this.focus(); this.select()"><div style="text-align: center;"><a href="<?php echo esc_url( $website_url ); ?>" target="_blank"><img src="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_attr( $image_title ); ?>"></a></div></textarea>
				</div>
			</div>
			<?php
			echo ob_get_clean();
		}
		echo $after_widget;
	}
}