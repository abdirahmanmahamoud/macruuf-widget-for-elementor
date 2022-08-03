<?php
/**
 * Macruuf widget for elementor
 *
 * @package           macruuf-widget
 * @author            Abdirahman mahamoud
 * @copyright         2022 Abdirahman mahamoud or macruuf tech
 * @license           GPL-2.0-or-later
 */

class card_profile_macruuf extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Card Profile widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mfcp';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Card Profile widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Card Profile', 'macruuf-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Card Profile widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-credit-card';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Card Profile widget belongs to.
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
	 * Register Card Profile widget controls.
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
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'card_image',
			[
				'label' => esc_html__( 'Choose Image', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Title', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Profile website', 'macruuf-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'macruuf-widget' ),
			]
		);	
		$repeater->add_control(
			'card_description',
			[
				'label' => esc_html__( 'Description', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,	
				'rows' => 10,
				'default' => esc_html__( 'Item content. Click the edit button to change this text.', 'macruuf-widget' ),
				'placeholder' => esc_html__( 'Type your description here', 'macruuf-widget' ),
			]
		);
		$this->add_control(
			'card_profile',
			[
				'label' => esc_html__( 'cards List', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'card_title' => esc_html__( 'Profile website', 'macruuf-widget' ),
						'card_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'macruuf-widget' ),
					],
					[
						'card_title' => esc_html__( 'Profile website', 'macruuf-widget' ),
						'card_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'macruuf-widget' ),
					],
					
				],
				'title_field' => '{{{ card_title }}}',
			]
		);
    
        $this->end_controls_section();
		$this->start_controls_section(
			'color_section',
			[
				'label' => esc_html__( 'Color', 'macruuf-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container-mfcp .card .card-boyd h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container-mfcp .card .card-boyd p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'card_color',
			[
				'label' => esc_html__( 'Card Color', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container-mfcp .card' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'background Color', 'macruuf-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container-mfcp' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'typography_section',
			[
				'label' => esc_html__( 'Typography', 'macruuf-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Title', 'macruuf-widget' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .container-mfcp .card .card-boyd h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typo',
				'label' => __( 'description', 'macruuf-widget' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .container-mfcp .card .card-boyd p',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Card Profile widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['card_profile'] ) {
			?>
			<?php
			echo '<div class="container-mfcp">';
			foreach (  $settings['card_profile'] as $item ) {?>
			<div class="card" >
				<div class="card-img">
					<img src="<?php echo $item['card_image']['url'] ?>">
				</div>
				<div class="card-boyd">
					<h3 style="color: <?php echo esc_attr( $settings['title_color'] ); ?>;"><?php echo $item['card_title']; ?></h3>
					<p style="color: <?php echo esc_attr( $settings['description_color'] ); ?>;"><?php echo $item['card_description']; ?></p>
				</div>
			</div>
    
				<?php
			}
			echo '</div>';
		}
	
	}

}
 ?>