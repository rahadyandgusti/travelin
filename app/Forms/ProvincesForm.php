<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProvincesForm extends Form
{
    public function buildForm()
    {
        $this->add("name", "text")
        	->add("description", "textarea");
    }
}
