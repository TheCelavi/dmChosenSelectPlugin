<?php

/**
 * Description of sfWidgetChosenSelect
 *
 * @author TheCelavi
 */
class sfWidgetFormChosenSelect extends sfWidgetFormChoice {
    
    public function __construct($options = array(), $attributes = array()) {
        $this->addOption('widget_width', '100%');
        parent::__construct($options, $attributes);        
    }

    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        if ($style = $this->getAttribute('style')) {
            if (!strpos($style, 'width')) {
                $style .= 'width: '. $this->getOption('widget_width'). ';';
            }
        } else $style = 'width: '.$this->getOption('widget_width').';';  
        
        return sprintf('
            <div class="sfWidgetFormChosenSelect">%s</div>
            '
                , parent::render($name, $value, array_merge($attributes, array_merge($attributes, array("style"=>$style))), $errors));
    }

    public function getJavaScripts() {
        return array(
            '/dmChosenSelectPlugin/js/chosen.jquery.min.js',
            '/dmChosenSelectPlugin/js/dmChosenSelectPlugin.js'
        );
    }

    public function getStylesheets() {
        return array_merge(parent::getStylesheets(), array(
            '/dmChosenSelectPlugin/css/chosen.css' => null,
        ));
    }    
}

?>
