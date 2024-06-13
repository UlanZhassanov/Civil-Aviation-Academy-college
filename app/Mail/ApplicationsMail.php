<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Applications;
use Illuminate\Http\Request;

class ApplicationsMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build(Request $req)
	{
		$bachelor = new Applications;
		$countENT = $req->mathLit + $req->readLit + $req->historyKZ + $req->math + $req->aviaSec + $req->natureSec + $req->geography + $req->physics;
		$bachelor->type = $req->type;
		if (isset($req->base)) {
			$bachelor->base = $req->base;
		}
		if (isset($req->haveENT)) {
			$bachelor->haveENT = $req->haveENT;
		}
		$bachelor->countENT = $countENT;
		if (isset($req->quantENT)) {
			$bachelor->quantENT = $req->quantENT;
		}
		if (isset($req->readLit)) {
			$bachelor->readLit = $req->readLit;
		}
		if (isset($req->mathLit)) {
			$bachelor->mathLit = $req->mathLit;
		}
		if (isset($req->historyKZ)) {
			$bachelor->historyKZ = $req->historyKZ;
		}
		if (isset($req->math)) {
			$bachelor->math = $req->math;
		}
		if (isset($req->profSub)) {
			$bachelor->profSub = $req->profSub;
		}
		if (isset($req->aviaSec)) {
			$bachelor->aviaSec = $req->aviaSec;
		}
		if (isset($req->natureSec)) {
			$bachelor->natureSec = $req->natureSec;
		}
		if (isset($req->geography)) {
			$bachelor->geography = $req->geography;
		}
		if (isset($req->physics)) {
			$bachelor->physics = $req->physics;
		}
		if (isset($req->iin)) {
			$bachelor->iin = $req->iin;
		}
		$bachelor->programms = $req->programms;
		$bachelor->citizen = $req->citizen;
		$bachelor->region = $req->region;
		$bachelor->countries = $req->countries;
		$bachelor->surname = $req->surname;
		$bachelor->name = $req->name;
		$bachelor->patronymic = $req->patronymic;
		$bachelor->phone_1 = $req->phone_1;
		$bachelor->phone_2 = $req->phone_2;
		return $this->markdown('front.email.applications', ['bachelor' => $bachelor])->subject("Анкета на поступление");
	}
}
