<?php
return new PDO('sqlite:ackapgaDB.db', null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);