<?php
class imageresizer {
	public function __construct($filename, $width=100, $height=100, $image_type, $quality, $dest = null) {
			
			if ( $image_type == 'image/jpeg' || $image_type == 'image/pjpeg' ) {
				$this->jpeg_resize($filename, $width, $height, $image_type, $quality, $dest);
			}
			else if ( $image_type == 'image/gif' ) {
				$this->gif_resize($filename, $width, $height, $image_type, $dest);
			}
			else if ( $image_type == 'image/png' ) {
				$this->png_resize($filename, $width, $height, $image_type, $dest);
			}
			else $this->error($image_type, 1);
	}
	
	private function error($image_type, $num) {
		if ( $num == 1 ) $msg = "$image_type is not supported image type";
		echo "<script>alert('$msg')</script>";
	}
	
	private function jpeg_resize($filename, $width, $height, $image_type, $quality = 60, $dest = null) {  // JPEG 타입 리사이즈 
				
				$image_size = $this->getimagesize($filename, $width, $height);
				$image_org = imagecreatefromjpeg($filename);
				$image_new = imagecreatetruecolor( $width, $height );
				imagecopyresampled($image_new, $image_org, 0 - ( $image_size['new_width'] - $width ), 0 - ( $image_size['new_height'] - $height) , 0, 0, $image_size['new_width'], $image_size['new_height'], $image_size['width'], $image_size['height'] );
				
				if ( $dest ) $dest_filename = $dest;
				else $dest_filename = $filename.'_thumbnail';
				
				imagejpeg($image_new, $dest_filename, $quality);
				imagedestroy($image_new);
	}
	private function gif_resize($filename, $width, $height, $image_type, $dest = null) {  // GIF 타입 리사이즈
				$image_size = $this->getimagesize($filename, $width, $height);
				$image_org = imagecreatefromgif($filename);
				$image_new = imagecreatetruecolor( $width, $height );
				imagecopyresampled($image_new, $image_org,  0 - ( $image_size['new_width'] - $width ), 0 - ( $image_size['new_height'] - $height) , 0, 0, $image_size['new_width'], $image_size['new_height'], $image_size['width'], $image_size['height'] );
				
				if ( $dest ) $dest_filename = $dest;
				else $dest_filename = $filename.'_thumbnail';
				
				imagegif($image_new, $dest_filename);
				imagedestroy($image_new);
	}
	private function png_resize($filename, $width, $height, $image_type, $dest = null) { // PNG 타입 리사이즈
				$image_size = $this->getimagesize($filename, $width, $height);
				$image_org = imagecreatefrompng($filename);
				$image_new = imagecreatetruecolor( $width, $height );
				imagecopyresampled($image_new, $image_org,  0 - ( $image_size['new_width'] - $width ), 0 - ( $image_size['new_height'] - $height), 0, 0, $image_size['new_width'], $image_size['new_height'], $image_size['width'], $image_size['height'] );
				
				if ( $dest ) $dest_filename = $dest;
				else $dest_filename = $filename.'_thumbnail';
				
				imagepng($image_new, $dest_filename, 0);
				imagedestroy($image_new);
	}
	
	private function getimagesize($filename, $width, $height) {  // 리사이즈 될 이미지 사이즈
		$new_size = array();
		list($w, $h) = getimagesize($filename);
		$image_size['width'] = $w;
		$image_size['height'] = $h;
		
		$original_aspect = $image_size['width'] / $image_size['height'];
		$thumb_aspect = $width / $height;
		
		if ( $original_aspect >= $thumb_aspect ) {
			$image_size['new_height'] = $height;
			$image_size['new_width'] = $image_size['width'] / ( $image_size['height'] / $height );
		}
		else {
			$image_size['new_width'] = $width;
			$image_size['new_height'] = $image_size['height'] / ( $image_size['width'] / $width );
		}
		/*
		if ( $w > $h ) $height = $height * round($h / $w, 2) -1;
		else if ( $h > $w ) $width = $width * round($w / $h, 2) - 1;
		*/
		/* 본래 width사이즈와 reszied 될 이미지의 크기 비율을 구하고 이를 통해 높이를 구한다. */
		/*
		$image_size['new_width']  = $width;
		$image_size['new_height'] = $height;
		*/
		
		return $image_size;
	}
}
?>