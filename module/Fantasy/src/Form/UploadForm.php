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
            'name' => 'upload',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Upload',
            ],
        ]);

        $this->add([
            'name' => 'import',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Import',
            ],
        ]);
    }

}

;
