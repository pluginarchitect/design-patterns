<?php

namespace App;

use League\CommonMark\GithubFlavoredMarkdownConverter;

class Markdown
{
    public static function toHtml($markdown)
    {
        $converter = new GithubFlavoredMarkdownConverter();
        return $converter->convert($markdown);
    }
}
