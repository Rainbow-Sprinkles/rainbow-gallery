<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://[website-domain]/gallery
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            //get all images from model - Images
            //model Images is already autoloaded
            $pix = $this->Images->all();
            
            //build an array of formatted cells for images
            $cells = array();
            foreach ($pix as $picture) {
                $cells[] = $this->parser->parse("_cell", (array) $picture, true);
            }
            
            //prime the table class
            $this->load->library("table");
            $params = array(
                'table_open' => '<table class="gallery">',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            
            $this->table->set_template($params);
            
            //generate the table body
            $rows = $this->table->make_columns($cells, 3);
            $this->data['thetable'] = $this->table->generate($rows);
            
            $this->data['pagebody'] = 'gallery';
            $this->render(); 
	}

}
