<?php namespace Turnbackhoax\News\Models;

use Model;

/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'turnbackhoax_news_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /* relation */
    public $belongsToMany = [
      'categories' => [
        'Turnbackhoax\News\Models\categories',
        'table' => 'turnbackhoax_news_news_categories',
        'order' => 'categories_tittle'
      ]
    ];
}
