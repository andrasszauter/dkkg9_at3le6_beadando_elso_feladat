<?php

Class Menu {
    public static $menu = array(
        'nyitolap'           => array('Főoldal'              ,""      , 0),
        "belepes"            => array("Belépés"              ,""      , 1),
        "hirek"              => array("Hírek"                ,""      , 2),
        'ujhir'              => array('Új hír'               ,"hirek" , 2),
        'soapteszt'          => array('SOAP teszt'           ,""      , 0),
        'mnb'                => array('MNB SOAP'             ,""      , 0),
        'arfolyamkeres'      => array('MNB árfolyam keresés' , "mnb"  , 0),
        'tablazat'           => array('MNB táblázat', "mnb"           , 0),
        "kilepes"            => array("Kilépés"   ,""                 , 2),
    );

    public static function getMenu($sItems) {
        $status = bejelentkezve() ? 2 : 1;

        $submenu = "";
        
        $menu = "<ul id='mainmenu'>";
        foreach(self::$menu as $menuindex => $menuitem)       
        {
            if ($menuitem[2] == 0 || $status == $menuitem[2])
            {
                if($menuitem[1] == "")
                { $menu.= "<li id='menu-".$menuindex."'><a href='".SITE_ROOT.$menuindex."' ".($menuindex==$sItems[0]? "class='selected'":"").">".$menuitem[0]."</a></li>"; }
                else if($menuitem[1] == $sItems[0])
                { $submenu .= "<li id='menu-".$menuindex."'><a href='".SITE_ROOT.$sItems[0]."/".$menuindex."' ".($menuindex==$sItems[1]? "class='selected'":"").">".$menuitem[0]."</a></li>"; }
            }
        }
        $menu.="</ul>";
        
        if($submenu != "")
        {
            $submenu = "<ul id='submenu'>".$submenu."</ul>";
        }

        
        return $menu.$submenu;;
    }
}
?>