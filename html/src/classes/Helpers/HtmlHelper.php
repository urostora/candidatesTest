<?php

namespace CandidateTest\Helpers;

class HtmlHelper {
    public static function GetHtmlHeader(string $title = 'PHP candidates test'): string {
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
    
    public static function GetHtmlFooter(): string {
        return '
        </body>
        </html>';
    }
}