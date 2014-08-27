<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('cut_uri_arg'))
{
	function cut_uri_arg($arr, $str)
	{
	  if(!empty($arr))foreach($arr as $arg){
      $str=preg_replace("/\&".$arg."[^&]+/",'',$str);
      }
      return $str;
    }

}

if ( ! function_exists('req_uri_q'))
{
	function req_uri_q($urlenc=FALSE)
	{
	  if(!strstr($_SERVER['REQUEST_URI'], '?')){
       $uriq=$_SERVER['REQUEST_URI'].'?';
      }else{
       $uriq=$_SERVER['REQUEST_URI'];
       }
      if($urlenc){$uriq=urlencode($uriq);}
      return $uriq;
    }

}

if ( ! function_exists('first_arr_val'))
{
	function first_arr_val($arr)
	{
      foreach($arr as $val){
        return $val;
        break;
      }
    }

}

if ( ! function_exists('rename_key'))
{
	function rename_key($old_key, $new_key, $arr, $new_val=FALSE)
	{
foreach($arr as $key => $val)
{
if($key === $old_key){ $key = $new_key; if($new_val){$val=$new_val;} }
$_arr[$key] = $val;
}
   return $_arr;
   }

}

function getExt($filename) {
    return end(explode(".", $filename));
  }

function img_resize($src, $dest, $width, $height, $thumb, $rgb=0xFFFFFF, $quality=100)
{
  if (!file_exists($src)) return false;

  $size = getimagesize($src);

  if ($size === false) return false;

  // Определяем исходный формат по MIME-информации, предоставленной
  // функцией getimagesize, и выбираем соответствующую формату
  // imagecreatefrom-функцию.
  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc)) return false;

   if($thumb == 1) {  $width = round($size[0] * $height / $size[1]); } else if($thumb == 2){
                      $height = round($size[1] * $width / $size[0]);
   }else{

   if($size[0]<$width and $size[1]<$height){$width=$size[0];$height=$size[1];} else{

   if ($size[0] > $size[1]) {
      $height = round($size[1] * $width / $size[0]);
    } else {
      $width = round($size[0] * $height / $size[1]);
    }

                      }                                                     }

  $x_ratio = $width / $size[0];
  $y_ratio = $height / $size[1];

  $ratio       = min($x_ratio, $y_ratio);
  $use_x_ratio = ($x_ratio == $ratio);

  $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
  $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
  $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
  $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

  $isrc = $icfunc($src);
  $idest = imagecreatetruecolor($width, $height);

  imagefill($idest, 0, 0, $rgb);
  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
    $new_width, $new_height, $size[0], $size[1]);

  imagejpeg($idest, $dest, $quality);

  imagedestroy($isrc);
  imagedestroy($idest);

  return true;

}

//resize and crop image by center
function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality=80){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];

    switch($mime){
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;

        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            //$quality = 7;
            break;

        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            break;

        default:
            return false;
            break;
    }

    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);

    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }

    //$image($dst_img, $dst_dir, $quality);
    imagejpeg($dst_img, $dst_dir, $quality);

    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}

function img_src($type, $arr)
{
 return substr($arr['img_path'], 1).$type.'_'.$arr['id'].'_'.$arr['to_table'].'_'.$arr['element_id'].'.jpg';
}

function obrez_after($string, $lng)
{
 $str=strip_tags($string);
 $str_length = mb_strlen($str, 'utf-8');
 if($lng>=$str_length){return $str;}
for ($length=$lng; $str[$length]!==' ' and $length; $length--);

return mb_substr($str, 0, $length, 'utf-8').'...';
}