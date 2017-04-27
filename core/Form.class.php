<?php

class Form
{
    public $name;
    protected $id;
    protected $method;
    protected $action;
    protected $submit;
    protected $onclick;
    protected $class;
    protected $enctype;
    protected $inputs;


    public function __construct($form = [])
    {
        if (!isset($form['options'])) {
            Logger::log('form options are not set');
            return false;
        }
        if (!isset($form['data'])) {
            Logger::log('form data isn\'t set');
            return false;
        }
        $this->inputs = $form['data'];
        if (isset($form['options']['method'])) {
            $this->method = $form['options']['method'];
        } else {
            $this->method = conf::DEFAULT_FORM_VALIIDATION;
        }
        if (isset($form['options']['name'])) {
            $this->name = $form['options']['name'];
        } else {
            Logger::log('The form must be named');
            return false;
        }
        if (isset($form['options']['id'])) {
            $this->id = $form['options']['name'];
        } else {
            Logger::log('The form must have an id');
            return false;
        }
        if (isset($form['options']['action'])) {
            $this->action = $form['options']['action'];
        } else {
            $this->action = '';
        }
        if (isset($form['options']['submit'])) {
            $this->submit = $form['options']['submit'];
        } else {
            $this->submit = conf::DEFAULT_FORM_SUBMIT;
        }
        if (isset($form['options']['form'])) {
            $this->class = implode(" ", $form['options']['form']);
        } else {
            $this->class = '';
        }
        if (isset($form['options']['onclick'])) {
            $this->onclick = $form['options']['onclick'];
        } else {
            $this->onclick = '';
        }
        if (isset($form['options']['enctype'])) {
            $this->enctype = $form['options']['enctype'];
        } else {
            $this->enctype = '';
        }
        return true;
    }
    /**
     * return form result as array
     */
    public function validate()
    {
        if (!isset($_POST['type']) || $_POST['type'] != $this->name) {
            return false;
        }
        $data = [];
        $error["error"] = false;
        $error['fields'] = [];
        foreach ($this->inputs as $key => $input) {
            if (!isset($input['validation'])) {
                Logger::log('No validation method selected in form ' . $this->name);
                return null;
            }
            $default = true;
            if ($input['validation'] == 'text') {
                $default = false;
                if (is_string($_POST[$key])) {
                    /* remove all tags*/
                    $data[$key] = trim(preg_replace("#(?i)<(?!\/?).*?>#", "", $_POST[$key]));
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('invalid text value');
                }
            }
            if ($input['validation'] == 'int') {
                $default = false;
                if (is_int($_POST[$key])) {
                    $data[$key] = intval($_POST[$key]);
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('invalid int value');
                }
            }
            if ($input['validation'] == 'date') {
                $default = false;
                if (true) {
                    $data[$key] = $_POST[$key];
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('invalid int value');
                }
            }
            if ($input['validation'] == 'file') {
                $default = false;
                if (true) {
                    $data[$key] = $_FILES[$key];
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('invalid file');
                }
            }
            if ($input['validation'] == 'radio') {
                $default = false;
                if (isset($_POST[$key])) {
                    $data[$key] =  $_POST[$key];
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('invalid radio value');
                }
            }
            if ($input['validation'] == 'select') {
                $default = false;
                if (isset($_POST[$key])) {
                    $data[$key] =  $_POST[$key];
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('invalid select value');
                }
            }
            if ($input['validation'] == 'email') {
                $default = false;
                if (isset($_POST[$key])) {
                   if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL))
                   {
                    $applicant = new Applicant();
                    $applicants = $applicant->getWhere();
                    $email= array();
                    foreach ($applicants as $emails){
                      $email[] = $emails->getEmail();
                    }
                    if(!in_array($_POST[$key], $email)){
                         $data[$key] =  $_POST[$key];
                    }else{
                        $error["error"] = true;
                        $error['fields'][] = $key;
                        Logger::log('le mail exite déja!'); 
                    }
                   }
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('Le mail est obligatoire');
                }
            }
            if ($input['validation'] == 'password') {
                $default = false;
                if (isset($_POST[$key])) {
                   if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL))
                   {
                    $applicant = new Applicant();
                    $applicants = $applicant->getWhere();
                    $email= array();
                    foreach ($applicants as $emails){
                      $email[] = $emails->getEmail();
                    }
                    if(!in_array($_POST[$key], $email)){
                         $data[$key] =  $_POST[$key];
                    }else{
                        $error["error"] = true;
                        $error['fields'][] = $key;
                        Logger::log('le mail exite déja!'); 
                    }
                   }
                } else {
                    $error["error"] = true;
                    $error['fields'][] = $key;
                    Logger::log('Le mail est obligatoire');
                }
            }
            /*if ($default) {
                Logger::log('invalid default value (or unknown component)');
            }*/
        }
        $data["error"] = $error;
        //if (isset($error['state'])) {
        //    return $error;
        //}
        return $data;
    }
    /**
     * @param string $main_class
     * @param array $data
     * @return bool
     */
    public function display($main_class = "", $data = [], $sumited = null)
    {

        echo '<form data-extra="" action="' . $this->action . '" method="' . $this->method . '" name="' . $this->name . '" class="' . $this->class . ' ' . $main_class . '" id="' . $this->id . ' ' . $main_class . '" enctype="' . $this->enctype . '">';
        echo '<input type="hidden" value="' . $this->name . '" name="type">';
        if (isset($main_class)) {
            echo '<input type="hidden" value="' . $main_class . '" name="seperator">';
        }
        foreach ($this->inputs as $key => $input) {
            /**
             * prepare input data
             */
            if (isset($input['name'])) {
                $name = $input['name'];
            } elseif (isset($key)) {
                $name = $key;
            } else {
                Logger::log('input must have name in form ' . $this->name);
                return false;
            }
            if (isset($input['type'])) {
                $type = $input['type'];
            } else {
                $type = "";
            }
            if (isset($input['value'])) {
                $value = $input['value'];
            } else {
                $value = "";
            }
            if (isset($input['placeholder'])) {
                $placeholder = $input['placeholder'];
            } else {
                $placeholder = "";
            }
            if (isset($input['label'])) {
                $label = $input['label'];
            } else {
                $label = "";
            }
            if (isset($input['class'])) {
                $class = $input['class'];
            } else {
                $class = "";
            }
            if (isset($input['id'])) {
                $id = $input['id'];
            } else {
                $id = "";
            }
            if (isset($input['icon_class'])) {
                $icon_class = $input['icon_class'];
            } else {
                $icon_class = "";
            }
            if (isset($input['icon_content'])) {
                $icon_content = $input['icon_content'];
            } else {
                $icon_content = "";
            }
            if (isset($input['div_class'])) {
                $div_class = $input['div_class'];
            } else {
                $div_class = "";
            }
            if (isset($input['file_class'])) {
                $file_class = $input['file_class'];
            } else {
                $file_class = "";
            }
            if (isset($input['class_wrapper'])) {
                $class_wrapper = $input['class_wrapper'];
            } else {
                $class_wrapper = "";
            }
            if (isset($input['class_inputWrapper'])) {
                $class_inputWrapper = $input['class_inputWrapper'];
            } else {
                $class_inputWrapper = "";
            }
            if (isset($input['type_inputWrapper'])) {
                $type_inputWrapper = $input['type_inputWrapper'];
            } else {
                $type_inputWrapper = "";
            }
            if (isset($input['values'])) {
                $values = $input['values'];
            } else {
                $values = "";
            }
            if (isset($input['div_color'])) {
                $div_color = $input['div_color'];
            } else {
                $div_color = "";
            }
            if (isset($input['text'])) {
                $text = $input['text'];
            } else {
                $text = "";
            }
            if (isset($input['labelClass'])) {
                $labelClass = $input['labelClass'];
            } else {
                $labelClass = "";
            }
            /**
             * display input data
             */
            if ($type == "textarea") {
                ?>
                <div class="<?php echo $div_class ?>">
                    <i class="<?php echo $icon_class ?>"><?php echo $icon_content ?></i>
                    <label for="<?php echo $name ?>" class=""><?php echo $label ?></label>
                    <textarea
                        name="<?php echo $name ?>"
                        placeholder="<?php echo $placeholder ?>"
                        class=""
                        id="<?php echo $id ?>"
                    >
                    <?php echo (isset($data[$name])) ? $data[$name] : $value; ?>
                    </textarea>
                </div>
                <?php
            } elseif ($type == "file") {
                ?>
                <div class="<?php echo $file_class ?>">
                    <div class="<?php echo $div_class ?>">
                        <i class="<?php echo $icon_class ?>"><?php echo $icon_content ?></i>
                        <label for="<?php echo $name ?>"><?php echo $label ?></label>
                        <input
                            name="<?php echo $name ?>"
                            type="<?php echo $type ?>"
                            class="<?php echo $class  ?>"
                            value="<?php echo (isset($data[$name])) ? $data[$name] : $value; ?>"
                            placeholder="<?php echo $placeholder ?>"
                        >
                    </div>
                    <div class="<?php echo $class_wrapper ?>">
                        <input class="" type="text">
                    </div>
                </div>
                <?php
            } elseif ($type== "select") {
                ?>
                    <div class="<?php echo $div_class ?>">
                        <div class="<?php echo $class ?>">
                            <label class=""><?php echo $label ?></label>
                            <select name="<?php echo $name ?>" class="<?php echo $class ?>">
                                <?php foreach($values as $value){ ?>
                                     <option value="<?php echo $value->getId() ?>"><?php echo $value->getWording(); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
               
              <?php
            } elseif ($type == "radio" && $sumited==1) {
                ?>
                <div class="<?php echo $div_class ?>"><?php
                foreach ($values as $value) { ?>
                    <input
                        type="radio"
                        value="<?php echo $value; ?>"
                        name="<?php echo $name ?>"
                        class="<?php echo $class . "-" .$value; ?>"
                        id="<?php echo $class . "-" .$value; ?>"
                    />
                    <label
                        class="<?php echo $class . "-" .$value; ?>"
                        for="<?php echo $class . "-" .$value; ?>">
                        <?php echo $value; ?>
                    </label>
                <?php } ?>
                <span></span>
                </div>
           <?php } elseif ($type == "radio") { ?>

               <div class="top-5 down-5 <?php echo $div_class ?>">
                   <div class="col s12">
                        <label
                            class=""
                            for="">
                                <?php echo  $label; ?>
                        </label>
                   </div>
                   <div class="col s12">
                        <?php foreach($div_color as $color) {?>
                       
                            <?php if($text=='1'){?>
                              <div class="center-align <?php echo $color ?>">
                                  <input
                                      type="<?php echo $type ?>"
                                      value="<?php
                                                    if (preg_match('(\ )',$color)){
                                                        $newTextColor = str_replace(' ', '-text text-',$color);
                                                        echo  $newTextColor;
                                                    }else{
                                                        echo  $color .'-text';
                                                    }
                                            ?>"
                                      name="<?php echo $name ?>"
                                      class="<?php echo $class ; ?>"
                                      id="<?php echo $id ; ?>"
                                  /> 
                              </div>
                            <?php }else{?>
                              <div class="center-align <?php echo $color ?>">
                                  <input
                                      type="<?php echo $type ?>"
                                      value="<?php echo  $color; ?>"
                                      name="<?php echo $name ?>"
                                      class="<?php echo $class ; ?>"
                                      id="<?php echo $id ; ?>"
                                  /> 
                              </div>
                            <?php }?>
                        <?php } ?>
                   </div>
               </div>
                
       <?php
            } else {
                ?>
                <div class="<?php echo $div_class ?>">
                    <i class="<?php echo $icon_class ?>"><?php echo $icon_content ?></i>
                    <label for="<?php echo $name ?>" class=""><?php echo $label ?></label>
                    <input
                        name="<?php echo $name ?>"
                        type="<?php echo $type ?>"
                        class=""
                        value="<?php echo (isset($data[$name])) ? $data[$name] : $value; ?>"
                    >
                </div>

                <?php
            }
        }

            echo '<div class="row">'
                . '<div class="col s4">'
                . '<button name="submit" id="submit" type="submit" onclick="' . $this->onclick . '" class="btn right green accent-4">' . $this->submit
                . '</button>'
                . '</div>';
            echo '</form>';
     
    }
}