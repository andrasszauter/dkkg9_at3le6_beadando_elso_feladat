<?php
session_start();

function bejelentkeztet($felhasznalo)
{
    $_SESSION['felhasznalo'] = $felhasznalo;
}

function kijelentkeztet()
{
    unset($_SESSION['felhasznalo']);
}

function bejelentkezve()
{
    return isset($_SESSION['felhasznalo']);
}

function bejelentkezesi_nev()
{
    return $_SESSION['felhasznalo']['csaladi_nev']
        . ' '  . $_SESSION['felhasznalo']['utonev']
        . ' (' . $_SESSION['felhasznalo']['bejelentkezes'] . ')';
}

function felhasznalo_id()
{
    return $_SESSION['felhasznalo']['id'];
}

?>