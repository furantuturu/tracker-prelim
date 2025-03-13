<?php

namespace Classes;

class ValidateFile {
    private static function isNotPDF(string $type) {
        return $type !== 'pdf';
    }
    private static function isFileExists(string $file) {
        return file_exists($file);
    }
    public static function validate($type, $file) {
        if (static::isNotPDF($type)) {
            Session::flash('filetypeerr', "This is not a PDF file");
        }
        
        if (static::isFileExists($file)) {
            Session::flash('fileexists','PDF file has already been uploaded');
        }

        return Session::has('_flash');
    }
}