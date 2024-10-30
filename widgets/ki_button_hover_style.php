<?php
namespace KiButtonHoverStyle\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ki_button_hover_style extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'button';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Button', 'ki-buttonhoverstyle' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ki-buttonhoverstyle' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'ki-buttonhoverstyle-script' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ki-buttonhoverstyle' ),
			]
		);

		$this->add_control(
			'style',
			array(
			  'label'       => esc_html__('Style', 'ki-buttonhoverstyle'),
			  'type'        => \Elementor\Controls_Manager::SELECT,
			  'default'     => 'metis',
			  'label_block' => true,
			  'options' => array(
				'metis' => esc_html__('Metis', 'ki-buttonhoverstyle'),
				'io' => esc_html__('IO', 'ki-buttonhoverstyle'),
				'thebe' => esc_html__('Thebe', 'ki-buttonhoverstyle'),
				'leda' => esc_html__('Leda', 'ki-buttonhoverstyle'),
				'ersa' => esc_html__('Ersa', 'ki-buttonhoverstyle'),
				'elara' => esc_html__('Elara', 'ki-buttonhoverstyle'),
				'dia' => esc_html__('Dia', 'ki-buttonhoverstyle'),
				'kale' => esc_html__('Kale', 'ki-buttonhoverstyle'),
				'carpo' => esc_html__('Carpo', 'ki-buttonhoverstyle'),
				'helike' => esc_html__('Helike', 'ki-buttonhoverstyle'),
				'mneme' => esc_html__('Mneme', 'ki-buttonhoverstyle'),
				'eirene' => esc_html__('Eirene', 'ki-buttonhoverstyle'),
			  )
			)
		  );	

		$this->add_control( 'btn_title', [
			'label'   => esc_html__( 'Button Text', 'ki-buttonhoverstyle' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Button Text', 'ki-buttonhoverstyle' )
		] );

		$this->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'ki-buttonhoverstyle' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

		$this->end_controls_section();

		$this->start_controls_section(
			'alignment_style',
			[
				'label' => esc_html__( 'Alignment', 'ki-buttonhoverstyle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'display_alignment', [
			'label'   => esc_html__( 'Alignment ', 'ki-buttonhoverstyle' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'button-left'   => esc_html__( 'Left', 'ki-buttonhoverstyle' ),
				'button-center'    => esc_html__( 'Center', 'ki-buttonhoverstyle' ),
				'button-right'   => esc_html__( 'Right', 'ki-buttonhoverstyle' ),

			],
			'default' => 'button-left'
		] );


		$this->end_controls_section();
		
		$this->start_controls_section(
			'typo',
			[
				'label' => esc_html__( 'Typography', 'ki-buttonhoverstyle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Font Family', 'ki-buttonhoverstyle' ),
				'selector' => '{{WRAPPER}} .button--ki span'
			]
		);	

		$this->end_controls_section();
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
	?>
		<a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="button--ki button--<?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['display_alignment']); ?>">
			<span><?php echo esc_html($settings['btn_title']); ?></span>
		</a>
	<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {}
	
}
