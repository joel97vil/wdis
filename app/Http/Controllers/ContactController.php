<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactRequestEmail;

class ContactController extends Controller
{
    protected $mailTemplate = 'emails.contact';

    protected $subject = 'Nova petició de contacte web';

    protected $excludedFields = ['_token', '_method', 'legal_checkbox'];

    public function index()
    {
        return view('common.contact');
    }

    public function submit(ContactFormRequest $request)
    {
        Mail::to(config('mail.to.address'))
            ->locale('es')
            ->send(new ContactRequestEmail($request, $this->mailTemplate, $this->subject, $this->excludedFields));

        return redirect()->back()->with('message', __('forms.contact_request_successful'));
    }
}
