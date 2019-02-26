<?php namespace Mafindo\Reports\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Reports Back-end Controller
 */
class Reports extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mafindo.Reports', 'reports', 'reports');
    }
}
