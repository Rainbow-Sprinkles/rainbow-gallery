<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://[website-domain]/about
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['pagebody'] = 'about';
		$this->render(); 
	}

}
