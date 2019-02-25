<?php namespace Mafindo\Reports;

use Backend;
use System\Classes\PluginBase;

/**
 * Reports Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Reports',
            'description' => 'No description provided yet...',
            'author'      => 'Mafindo',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Mafindo\Reports\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mafindo.reports.some_permission' => [
                'tab' => 'Reports',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'reports' => [
                'label'       => 'Reports',
                'url'         => Backend::url('mafindo/reports/reports'),
                'icon'        => 'icon-envelope',
                'permissions' => ['mafindo.reports.*'],
                'order'       => 500,
            ],
        ];
    }
}
