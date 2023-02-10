<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;

class MailController extends Controller
{
    public function sendMail(Request $request) {
		//validate right email domain
		$this->validate($request, [
			'emailList' => 'array|required',
		    'emailList.*.email' => 'required|string|email|max:255|indisposable',
		]);

		$mailData = [
			'title' => 'You were invited to join Forever Missed',
			'body' 	=> $request->message
		];

		foreach ($request->emailList as $key => $emailItem) {
			try{
				Mail::to($emailItem['email'])->later(now()->addMinutes($key), new InviteMail($mailData));
			} catch( Exception $exception ){ dd($exception); }
		}

		return response()->json(['success' => true]);
	}
}
