<?php

Class HomeController{

    public function ctrBringeHome() {
        if (!isset($_REQUEST["json"])) {
          include "Views/layout.php";
        }

        else {
          include "Views/api.php";
        }
    }
}
