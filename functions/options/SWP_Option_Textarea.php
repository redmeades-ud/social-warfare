<?PHP

/**
 * Used to create input options.
 *
 * This class is used to create each input option needed on the options page.
 *
 * @since  2.4.0   | Created | 02 MAR 2017
 * @access public
 */
class SWP_Option_Textarea extends SWP_Option_Text {

    public function __construct( $name, $key ) {
        parent::__construct( $name, $key );
        $this->default = '';
    }

    /**
    * Defines the default value among this select's choices.
    *
    *
    * @param mixed $value The key associated with the default option.
    * @return SWP_Option_Select $this The calling instance, for method chaining.
    *
    */
    public function set_default( $default ) {
        if ( is_numeric( $default) ) :
            settype( $default, 'string' );
        endif;

        if ( !is_string( $default )  ) :
            $this->_throw( 'Please provide a default value as a string.' );
        endif;

        $this->default = $default;

        return $this;
    }

    /**
    * Renders the HTML to create the <input type="text" /> element.
    *
    * @return string $html The fully qualified HTML.
    *
    */
    public function render_HTML() {
        // Open wrapper
        $html = '<div class="sw-grid sw-col-940 sw-option-container ' . $this->key . '_wrapper" ';
        $html .= $this->render_dependency();
        $html .= $this->render_premium();
        $html .= '>';

            $html .= '<div class="sw-grid sw-col-300">';
                $html .= '<p class="sw-input-label">' . $this->name . '</p>';
            $html .= '</div>';

            $html .= '<div class="sw-grid sw-col-620 sw-fit ">';
                $html .= '<textarea name="' . $this->key . '" data-swp-name="' . $this->key . '"  class="sw-grid-textarea" placeholder="' . $this->default . '>'. $this->get_value() . '</textarea>';
            $html .= '</div>';

        // Close wrapper
        $html .= '</div>';
    }
}