<?php
class photo {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }
    function photoPresentBien($idb) {
        $leBien = $idb;
        
    }
}
?>