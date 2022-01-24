<?php

namespace CandidateTest\Helpers;

class HtmlHelper {
    public static function GetHtmlHeader(string $title = 'PHP candidates test'): string {
        return '<html>
        <head>
          <title>' . htmlspecialchars($title) . '</title>
        </head>
        <body>
        ';
    }
    
    public static function GetHtmlFooter(): string {
        return '
        </body>
        </html>';
    }
}