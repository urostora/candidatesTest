<?php

use CandidateTest\Helpers\HtmlHelper;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

echo HtmlHelper::GetHtmlHeader('Basic database operations');

?>

<fieldset>
    <legend>"select" html element from manufacturers table</legend>

    <div>
        <span>Manufacturers:</span>
        <?php \CandidateTest\Db\DbBasics::renderManufacturersSelectComponent() ?>
    </div>

    <ul>
        <li>Code location: src/classes/Db/DbBasics.php</li>
        <li>Method: DbBasics::renderManufacturersSelectComponent</li>
    </ul>
</fieldset>

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

<?php

echo HtmlHelper::GetHtmlFooter();
