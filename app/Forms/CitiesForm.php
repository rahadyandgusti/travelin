<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CitiesForm extends Form
{
    public function buildForm()
    {
    	$provinces = new \App\Models\ProvincesModel;

        $this
        	->add('province_id', 'select', [
        		'label' => 'Province',
                'choices' => $provinces->pluck("name", "id")->toArray(),
                'empty_value' => '- Choose Province -',
			])
			->add("name", "text")
			->add("description", "textarea");
    }
}
