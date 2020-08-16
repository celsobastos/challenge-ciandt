<?php

class Select{

    private $options;
    private $name;
    private $autoFocus;
    private $disabled;
    private $multiple;
    private $required;
    private $selected;
    private $size;
    private $tag = '';
    private $class;
    private $id;
    
    public function __construct($args=[]){
                                    
        $this->options = $args['options'] ?? array();
        $this->name = $args['name'] ?? '';
        $this->autoFocus = $args['autoFocus'] ?? FALSE;
        $this->disabled = $args['disabled'] ?? FALSE;
        $this->multiple = $args['multiple'] ?? FALSE;
        $this->required = $args['required'] ?? FALSE;
        $this->selected = $args['selected'] ?? FALSE;
        $this->size = $args['size'] ?? 0;
        $this->class = $args['class'] ?? FALSE;
        $this->id = $args['id'] ?? FALSE;
        
    }
    
    public function setOptions($args=[]){
        $this->options = $args['options'] ?? array();
        $this->name = $args['name'] ?? '';
        $this->autoFocus = $args['autoFocus'] ?? FALSE;
        $this->disabled = $args['disabled'] ?? FALSE;
        $this->multiple = $args['multiple'] ?? FALSE;
        $this->required = $args['required'] ?? FALSE;
        $this->selected = $args['selected'] ?? FALSE;
        $this->size = $args['size'] ?? 0;
        $this->class = $args['class'] ?? FALSE;
        $this->id = $args['id'] ?? FALSE;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setAutoFocus($setAutoFocus){
        $this->autoFocus = $setAutoFocus;
    }

    public function setDisabled($disabled){
        $this->disabled = $disabled;
    }

    public function setMultiple($multiple){
        $this->multiple = $multiple;
    }

    public function setRequired($required){
        $this->required = $required;
    }

    public function setSelected($selected){
        $this->selected = strtolower($selected);
    }

    public function setSize($size){
        $this->size = $size;
    }

    public function setClass($class){
        $this->class = $class;
    }

    public function setID($id){
        $this->id = $id;
    }
    
    public function getOptions($args=[]){
        return $this->options;
    }

    public function createField(){
        $this->tag = '';
        $this->name = empty($this->name) ? "tagName" : $this->name;
        $this->autoFocus = $this->autoFocus ? "autoFocus" : '';
        $this->disabled = $this->disabled ? "disabled" : '';
        $this->multiple = $this->multiple ? "multiple" : '';
        $this->required = $this->required ? "required" : '';
        $this->class = empty($this->class) ? '' : $this->class;
        $this->id = empty($this->id) ? '' : $this->id;
        
        if(count($this->options) > 0){
            $this->tag .= "<select name=\"$this->name\" 
                            class='$this->class'
                            id='$this->id'
                            size='$this->size' 
                            $this->autoFocus 
                            $this->disabled 
                            $this->multiple 
                            $this->required>";
            $this->tag .= $this->createOptions();  
            $this->tag .= "</select>";
        }
        return $this->tag;
    }

    private function createOptions(){	
        $options = "";
        foreach($this->options as $key => $value){
            $selected = strtolower($value) == $this->selected ? 'selected' : '';
            $options .= "<option value=\"$key\" $selected>$value</option>";
        }
        return $options;
    }	

}
