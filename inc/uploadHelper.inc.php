<?php

namespace helpers;

class UploadHelper {

	public static function createFile($directory, $filename) {

		$uploadsDir = UPLOADS_DIR;
		$directory = "{$uploadsDir}/{$directory}";

		//Der Pfad existiert noch nicht => diesen anlegen
		if (!file_exists($directory)) 
			mkdir($directory, 0777, true);

		$file = "{$directory}/{$filename}";
	
		if(!file_exists($file)) fopen($file, 'w');

	}

	public static function moveFile($from, $targetPath, $filename) {

		//Der Pfad existiert noch nicht => diesen anlegen
		if (!file_exists($targetPath)) mkdir($targetPath, 0777, true);

		$target = "{$targetPath}/{$filename}";
		
		if(!file_exists($target)) rename($from, $target);
	}

	public static function deleteFile($file) {
		if(file_exists($file)) unlink($file);
	}

}