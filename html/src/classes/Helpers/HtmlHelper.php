<?php

namespace CandidateTest\Helpers;

class HtmlHelper
{
    public static function getHtmlHeader(string $title = 'PHP candidates test'): string
    {
        return '<html>
        <head>
          <title>' . htmlspecialchars($title) . '</title>
        </head>
        <body>
            <h3>' . htmlspecialchars($title) . '</h3>
            <a href="/">Back</a>
            <br />
            <br />
        ';
    }
    
    public static function getHtmlFooter(): string
    {
        return '
        </body>
        </html>';
    }
}
