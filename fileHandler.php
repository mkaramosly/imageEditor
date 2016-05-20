<?php
/**
 * Created by PhpStorm.
 * User: mehdi.karamosly
 * Date: 5/19/2016
 * Time: 6:39 PM
 */


header('Content-Type: text/plain; charset=utf-8');

try {

	// Undefined | Multiple Files | $_FILES Corruption Attack
	// If this request falls under any of them, treat it invalid.
	if (
		!isset($_FILES['upfile']['error']) ||
		is_array($_FILES['upfile']['error'])
	) {
		throw new RuntimeException('Invalid parameters.');
	}

	// Check $_FILES['upfile']['error'] value.
	switch ($_FILES['upfile']['error']) {
		case UPLOAD_ERR_OK:
			break;
		case UPLOAD_ERR_NO_FILE:
			throw new RuntimeException('No file sent.');
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			throw new RuntimeException('Exceeded filesize limit.');
		default:
			throw new RuntimeException('Unknown errors.');
	}

	// You should also check filesize here.
	if ($_FILES['upfile']['size'] > 1000000) {
		throw new RuntimeException('Exceeded filesize limit.');
	}

	if (function_exists('finfo')) {
		// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
		// Check MIME Type by yourself.
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if (false === $ext = array_search(
				$finfo->file($_FILES['upfile']['tmp_name']),
				array(
					'jpg' => 'image/jpeg',
					'png' => 'image/png',
					'gif' => 'image/gif',
				),
				true
			)) {
			throw new RuntimeException('Invalid file format.');
		}
	} else {
		switch($_FILES['upfile']['type']) {
			case "image/jpeg" :
				$ext = "jpg";
				break;
			case "image/png":
				$ext = "png";
				break;
			case "image/gif":
				$ext = "git";
				break;
		}
//		$ext = pathinfo($_FILES['upfile']['tmp_name'], PATHINFO_EXTENSION);
	}

	// You should name it uniquely.
	// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
	// On this example, obtain safe unique name from its binary data.
	//		sprintf('./uploads/%s.%s',
//			sha1_file($_FILES['upfile']['tmp_name']),
//			$ext
//		)

		$time = time();

		if (!move_uploaded_file(
		$_FILES['upfile']['tmp_name'],
		sprintf('./uploads/%s.%s',
			$time,
			$ext
		)
	)) {
		throw new RuntimeException('Failed to move uploaded file.');
	}

	echo "uploads/$time.$ext";

} catch (RuntimeException $e) {

	echo $e->getMessage();

}