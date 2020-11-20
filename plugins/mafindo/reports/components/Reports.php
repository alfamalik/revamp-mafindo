<?php namespace Mafindo\Reports\Components;

use Cms\Classes\ComponentBase;
use Mafindo\Reports\Models\Report;
use Validator;
use Redirect;
use ValidationException;
use Mail;

class Reports extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Reports Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function init()
    {
         $component = $this->addComponent(
             'Responsiv\Uploader\Components\ImageUploader',
             'imageUploader',
             ['deferredBinding' => false]
         );

         $component->bindModel('evidences', new Report);
    }
    /*function onSend()
    {
        $validator = validator::make(
            [
            'name' => post('name'),
            'email' => post('email'),
            'title' => post('title'),
            'text' => post('text'),
            'message' => post('message')
            ],
            [
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'text' => 'required',
            'message' => 'required'
            ]
        );

        if($validator->fails()){
            return redirect::back()->withErrors($validator);

        }else{
            $vars = ['name' => $this->name,
              'email' => $this->email,
              'title' => $this->title,
              'text' => $this->text,
              'mail' => $this->message,
              'pictures' => $this->evidences,
                       ];
              Mail::send('mafindo.reports::mail.message', $vars, function($msg) {

            $msg->to('admin@domain.tld', 'Admin Person');
            $msg->subject('New message');
        });
    }*/

    public function onSave()
    { 
        /*$validator = validator::make(
            [
                'name' => post('name'),
                'email' => post('email'),
                'title' => post('title'),
                'text' => post('text'),
                'message' => post('message')
            ],
            [
                'name' => 'required',
                'email' => 'required|email',
                'title' => 'required',
                'text' => 'required',
                'message' => 'required'
            ]
        );
        if($validator->fails()){
            throw new ValidationException($validator);            
        }*/


        $report = new Report;
        $report->name = post('name');
        $report->email = post('email');
        $report->title = post('title');
        $report->text = post('text');
        $report->message = post('message');
        $report->save(null, post('_session_key'));

        $vars = ['name' => $report->name,
        'email' => $report->email,
        'title' => $report->title,
        'text' => $report->text,
        'mail' => $report->message,
        'pictures' => $report->evidences,

               ];
        Mail::send('mafindo.reports::mail.message', $vars, function($msg) {

        $msg->to('admin@domain.tld', 'Admin Person');
        $msg->subject('New message');
        });

        \Flash::success('berhasil disimpan');
        return redirect::back();
    }
}
