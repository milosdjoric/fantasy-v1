<?php

namespace Fantasy\Form;

use Zend\Form\Form;

class UploadForm extends Form
{

    public function __construct()
    {
        parent::__construct();

        $this->add([
            'name' => 'myfile',
            'options' => [
                'label' => 'Your file',
            ],
            'type' => 'file',
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);
    }

}

;
