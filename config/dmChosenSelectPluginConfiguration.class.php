<?php

/**
 * Description of dmChosenSelectPluginConfiguration
 *
 * @author TheCelavi
 */
class dmChosenSelectPluginConfiguration extends sfPluginConfiguration {
    
    public function initialize() {
        $this->dispatcher->connect('dm.form_generator.widget_subclass', array($this, 'listenToFormGeneratorWidgetSubclassEvent'));       
    }
    
    public function listenToFormGeneratorWidgetSubclassEvent(sfEvent $e, $subclass) {
        if ($this->isChosenSelectColumn($e['column']))
            $subclass = 'ChosenSelect'; 
        return $subclass;
    }

    protected function isChosenSelectColumn(sfDoctrineColumn $column) {
        return false !== strpos(dmArray::get($column->getTable()->getColumnDefinition($column->getName()), 'extra', ''), 'chosen');
    }
    
}

?>
