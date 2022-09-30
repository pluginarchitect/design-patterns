<?php

namespace App;

class Pages
{
    public static function all()
    {
        $dir = config('pages.source' );
        $files = array_diff(scandir( $dir ), ['.','..']);
        return collect($files)->map(fn($file) => [
            'filename' => pathinfo("$dir/$file", PATHINFO_FILENAME),
            'contents' => file_get_contents("$dir/$file"),
        ]);
    }
}
