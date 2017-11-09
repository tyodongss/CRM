<?php
/*
Class name  : Mailer
Description : Class for handling sending an email
Author		: Achmad Solichin (http://achmatim.net)
*/
 
class Mailer {
	// declare private attributes
	private $from;
	private $subject;
	private $to = array();
	private $cc = array();
	private $bcc = array();
	private $message;
	public $error;
	// Class constructor
	public function __construct($from, $to, $subject, $message) {
		$this->from = $from;
		$this->to = 'latifa@satnetcom.com';
		$this->subject = $subject;
		$this->message = $message;
	}
	// accessor functions
	public function __set($name, $value) {
        $this->$name = $value;
    }
    public function __get($name) {
        return $this->$name;
    }
 
	public function send_mail() {
		if (!empty($this->to) && count($this->to) > 0) {
			$destination = implode (',',$this->to);
		}
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		if (!empty($this->to)) {
			$headers .= 'From: '. $this->from . "\r\n";
		}
		if (!empty($this->cc) && count($this->cc) > 0) {
			$headers .= 'Cc: ';
			$headers .= implode (',',$this->cc);
			$headers .= "\r\n";
		}
		if (!empty($this->bcc) && count($this->bcc) > 0) {
			$headers .= 'Bcc: ';
			$headers .= implode (',',$this->bcc);
			$headers .= "\r\n";
		}
 
		if(mail($destination, $this->subject, $this->message, $headers)) {
			return true;
		} else {
			$this->error = 'Server cannot sending mail.';
			return false;
		}
	}
}
?>