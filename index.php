<?php	
require_once "controllers/template.controller.php";

require_once "extensions/vendor/autoload.php";

require_once "controllers/employees.controller.php";
require_once "models/employees.model.php";

require_once "controllers/category.controller.php";
require_once "models/category.model.php";

require_once "controllers/supplier.controller.php";
require_once "models/supplier.model.php";

require_once "controllers/product.controller.php";
require_once "models/product.model.php";

require_once "controllers/brand.controller.php";
require_once "models/brand.model.php";

require_once "controllers/measure.controller.php";
require_once "models/measure.model.php";

require_once "controllers/users.controller.php";
require_once "models/users.model.php";

// ========================================================

require_once "controllers/purchaseorder.controller.php";
require_once "models/purchaseorder.model.php";

require_once "controllers/incoming.controller.php";
require_once "models/incoming.model.php";

require_once "controllers/machine.controller.php";
require_once "models/machine.model.php";

require_once "controllers/classification.controller.php";
require_once "models/classification.model.php";

require_once "controllers/building.controller.php";
require_once "models/building.model.php";

require_once "controllers/items.controller.php";
require_once "models/items.model.php";

require_once "controllers/inventory.controller.php";
require_once "models/inventory.model.php";

require_once "controllers/stockout.controller.php";
require_once "models/stockout.model.php";

require_once "controllers/return.controller.php";
require_once "models/return.model.php";

require_once "controllers/clients.controller.php";
require_once "models/clients.model.php";

require_once "controllers/sales.controller.php";
require_once "models/sales.model.php";

require_once "controllers/lot.controller.php";
require_once "models/lot.model.php";

// require_once "extensions/vendor/mike42/escpos-php/src/Mike42/Escpos/printer.php";
// require_once "extensions/vendor/mike42/escpos-php/src/Mike42/Escpos/EscposImage.php";
// require_once "extensions/vendor/mike42/escpos-php/src/Mike42/Escpos/PrintConnectors/FilePrintConnector.php";
// require_once "extensions/vendor/mike42/escpos-php/src/Mike42/Escpos/PrintConnectors/WindowsPrintConnector.php";

require_once "controllers/home.controller.php";
require_once "models/home.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();