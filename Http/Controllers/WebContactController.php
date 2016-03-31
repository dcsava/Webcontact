<?php
/**
 * User: David
 * Date: 30/03/2016
 * Time: 5:09 PM
 */

namespace Modules\Webcontact\Http\Controllers;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Webcontact\Exceptions\WebContactFailedException;
use Modules\Webcontact\Http\Requests\CreateWebContactRequest;
use Modules\Webcontact\Repositories\WebContactRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;

class WebContactController extends BasePublicController
{
    use DispatchesJobs;

    /**
     * @var WebContactRepository
     */
    private $webcontact;

    public function __construct(WebContactRepository $webcontact)
    {
        parent::__construct();

        $this->webcontact = $webcontact;
    }

    public function postContact(CreateWebContactRequest $request)
    {
        $this->webcontact->create($request->all());
        $contact_name       = $request['contact_name'];
        $contact_email      = $request['contact_email'];
        $contact_phone      = $request['contact_phone'];
        $contact_subject    = $request['contact_subject'];
        $contact_message    = $request['contact_message'];

        if(env('MAIL_CONTACT_SEND_MAIL'))
        {
            try {
                Mail::send('webcontact::emails.contactEmail', compact('contact_name', 'contact_phone', 'contact_email', 'contact_subject', 'contact_message'), function (Message $m) {
                    $emails = explode('|', env('MAIL_CONTACT_RECIPIENTS'));
                    $m->to($emails)->subject(env('MAIL_CONTACT_SUBJECT'));
                });
            } catch (WebContactFailedException $e) {
                flash()->error('Failed to send message, please try again.');
                return redirect()->back()->withInput();
            }
        }

        return redirect('contact')->with('success', env('MAIL_CONTACT_THANKYOU'));
    }

}