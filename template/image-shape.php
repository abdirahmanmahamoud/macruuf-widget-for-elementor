<?php
/**
 * Macruuf widget for elementor
 *
 * @package           macruuf-widget
 * @author            Abdirahman mahamoud
 * @copyright         2022 Abdirahman mahamoud or macruuf tech
 * @license           GPL-2.0-or-later
 */

class image_shape_macruuf extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Image Shape widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mfimshape';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image Shape widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image Shape', 'macruuf-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Image Shape widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-image';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Image Shape widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'macruuf-category' ];
	}

	/**
	 * Register Image Shape widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'macruuf-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'image_shape',
			[
				'label' => esc_html__( 'Choose Image', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				],
			]
		);
        $this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'background Color', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image-shape .img-box .shape-1' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Image Shape widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
   <div class="image-shape">
            <div class="pattern-bg"></div>
            <div class="img-box">
                <img src='<?php echo $settings['image_shape']['url'] ?>'>
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
            </div>
        
          </div>
        <?php
	}

}
 ?>