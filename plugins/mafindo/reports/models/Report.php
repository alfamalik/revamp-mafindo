<?php namespace Mafindo\Reports\Models;

use Model;
use Mail;

/**
 * Report Model
 */
class Report extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'mafindo_reports_reports';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachMany = ['evidences' => ['System\Models\File']];
    public $attachOne = [];

    public function afterCreate()
    {
      $vars = ['name' => $this->name,
      'email' => $this->email,
      'title' => $this->title,
      'text' => $this->text,
      'mail' => $this->message,
      'picture' => 'https://www.imageholders.com/wp-content/themes/timber/img/device-integration/products.svg',
               ];
      Mail::send('mafindo.report::mail.message', $vars, function($msg) {

        $msg->to('admin@domain.tld', 'Admin Person');
        $msg->subject('New message');
      });
    }
}
