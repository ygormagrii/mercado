<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etiquetas extends CI_Controller {

	public function index(){

		$this->load->model("etiquetas_model");
		$usuarioLogado = $this->session->userdata("usuario_logado");
		$this->load->helper(array("currency"));
		$this->load->template("etiquetas/index.php");
	}

	function create_image($user){

		global $fontname;	
		global $quality;
		$file = "covers/".md5($user[0]['name'].$user[1]['name'].$user[2]['name']).".jpg";	
	
		// if the file already exists dont create it again just serve up the original	
		//if (!file_exists($file)) {	
				

				// define the base image that we lay our text on
				$im = imagecreatefromjpeg("pass.jpg");
				
				// setup the text colours		
				$color['grey'] = imagecolorallocate($im, 54, 56, 60);
				$color['green'] = imagecolorallocate($im, 55, 189, 102);
				
				// this defines the starting height for the text block
				$y = imagesy($im) - $height - 295;
				 
			// loop through the array and write the text	
			foreach ($user as $value){
				// center the text in our image - returns the x value
				$x = center_text($value['name'], $value['font-size']);	
				imagettftext($im, $value['font-size'], 0, $x, $y+$i, $color[$value['color']], $fontname,$value['name']);
				// add 32px to the line height for the next text block
				$i = $i+32;	
				
			}
				// create the image
				imagejpeg($im, $file, $quality);
				
		//}
						
		return $file;	
	}

	function center_text($string, $font_size){

		global $fontname;

		$image_width = 895;
		$dimensions = imagettfbbox($font_size, 0, $fontname, $string);
		
		return ceil(($image_width - $dimensions[4]) / 2);				
	}
}
		