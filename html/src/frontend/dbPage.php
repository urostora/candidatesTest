<?php

use CandidateTest\Helpers\HtmlHelper;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

echo HtmlHelper::GetHtmlHeader('Basic database operations');

?>

<fieldset>
    <legend>Database info</legend>

    <h4>Database connection</h4>
    <ul>
        <li>Host: localhost:<?= $_ENV['MYSQL_PORT'] ?></li>
        <li>User: <?= $_ENV['MYSQL_USER'] ?></li>
        <li>Password: <?= $_ENV['MYSQL_PASSWORD'] ?></li>
        <li>Database: <?= $_ENV['MYSQL_DATABASE'] ?></li>
    </ul>
</fieldset>
<br />
<br />
<fieldset>
    <legend>"select" html element from manufacturers table</legend>
    <p>Render (echo) a "select" HTML component filled with all manufacturers ordered by name from the database<br />
     value: manufacturer.id,<br />
     label: manufacturer.name</p>

    <div>
        <span><b>Manufacturers:</b></span>
        <?php \CandidateTest\Db\DbBasics::renderManufacturersSelectComponent() ?>
    </div>

    <ul>
        <li>Code location: src/classes/Db/DbBasics.php</li>
        <li>Method: DbBasics::renderManufacturersSelectComponent</li>
    </ul>
</fieldset>
<br />
<br />
<fieldset>
    <legend>"table" html element filled from the database</legend>

    <p>Render (echo) a "table" HTML component filled with all products from the database<br />
     Columns: product.id, category.name, manufacturer.name, product.name, product.price</p>

    <h4>Products:</h4>
    <div>
        <?php \CandidateTest\Db\DbBasics::renderProductList() ?>
    </div>

    <ul>
        <li>Code location: src/classes/Db/DbBasics.php</li>
        <li>Method: DbBasics::renderProductList</li>
    </ul>
</fieldset>


<br />
<br />
<fieldset>
    <legend>Add manufacturer</legend>

    <p>Add a manufacturer to the database<br />
    When a name exists in the database or the name is empty, return an error.
    </p>

    <div>
        <label for="addManufacturer"></label>
        <input type="text" id="addManufacturerTxt" name="manufacturerName" />
        <input type="button" id="addManufacturerBtn" value="Add" />
    </div>

    <div>
        <span id="addManufacturerResult"></span>
    </div>

    <script type="text/javascript">
        /*  
            CLIENT-SIDE CODE HERE
            - Add click event handler to button with id "addManufacturerBtn"
            - Get new manufacturer name from input text with id "addManufacturerTxt"
            - POST this data to API endpoint //frontend/dbApi.php
                - action parameter must be "addManufacturer"
                - new manufacturer name parameter can be anything, you must process it in API code
            - process result (json)
                - on success: { "ok": true }
                - on fail: { "ok": false, "error": "error when trying...", "trace": "PHP trace info"}

            - show result in span with id "addManufacturerResult"
        */

        
    </script>

    <ul>
        <li><b>Front-end</b></li>
        <li>HTML code locaton: src/frontend/dbPage.php</li>
        <li>Input: input with id "addManufacturerTxt"</li>
        <li>Output: span with id "addManufacturerResult"</li>
        <li>AJAX endpoint: http://localhost:8080/frontend/dbApi.php</li>
        <li>Method: POST</li>
        <li>"action" post parameter must be "addManufacturer"</li>
        <li>client-side script area is above this list &uArr;</li>

        <li><b>Back-end</b></li>
        <li>API code location: src/classes/Db/DbApi.php</li>
        <li>Method: DbApi::handleAddManufacturer</li>

        <li><b>Database</b></li>
        <li>Table: manufacturer</li>
        <li>Field: name</li>
    </ul>
</fieldset>

<?php

echo HtmlHelper::GetHtmlFooter();
