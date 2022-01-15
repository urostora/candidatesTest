<?php

namespace CandidateTest\Helpers;

class HtmlHelper {
    public static function GetHtmlHeader(string $title = 'PHP candidates test') {
        return '<html>
        <head>
          <title>' . htmlspecialchars($title) . '</title>
        </head>
        <body>
        ';
    }
    
    public static function GetHtmlFooter() {
        return '
        </body>
        </html>';
    }
}