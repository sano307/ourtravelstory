<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('email');

        $this->email->from('kdhong@gmail.com', 'Kiminseo');
        $this->email->to('sano307@naver.com');
        $this->email->cc('tkdry4911@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        // $this->email->attach('/path/to/file1.png');

        if ($this->email->send())
            echo "Mail Sent!";
        else {
            echo "There is error in sending mail!";
            echo $this->email->print_debugger();
        }
    }
}
?>