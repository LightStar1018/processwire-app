<?php

namespace ProcessWire;

use PDO;

/**
 * This _init.php file is called automatically by ProcessWire before every page render
 * 
 */

/** @var ProcessWire $wire */

include_once('./_uikit.php');

// config("dbold", new PDO("mysql:host=localhost;dbname=waveinside_old;charset=utf8", "root", "", [
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// ]));

$old_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$old_lang = strpos($old_url, "en") !== false ? "en" : "fr";
$old_id = sanitizer("digits", $old_url);

if ($old_id && substr($old_url, -1) != "/") {
    $p = pages("old_id=$old_id")->first();

    if ($p->id) {
        session()->redirect($p->url);
    } else {
        session()->redirect(pages("/")->url);
    }
}


setting('t', [
    'Yes I agree' => __("Oui, je suis d'accord"),
    'No, more info' => __("Non, plus d'infos"),
    'We use cookies to improve your user experience.' => __("Nous utilisons des cookies pour améliorer votre expérience utilisateur."),
    'Search by product' => __('Mobilier : filtrez par produit'),
    'Search by business sector' => __("Filtrez par secteur d'activité"),
    'Audiovisual technology' => __("Technologie audiovisuelle"),
    'No results found.' => __('Aucun résultat trouvé.'),
    'Back to the list' => __('Retour à la liste'),
    'Previous project' => __('Projet précédent'),
    'Next project' => __('Projet suivant'),
    'CONFIGURE' => __('CONFIGUREZ'),
    'Products Used' => __('PRODUIT(S) UTILISÉ(S)'),
    'Newsletter' => __('Newsletter'),
    'Newsletter_Summary' => __('Pour rester informé de toute notre actualité, n’hésitez pas à nous communiquer votre adresse e-mail.'),
    'Subscribe' => __('Abonnez-Vous'),
    'Read More' => __('En savoir plus'),
    'Country' => __('Région'),
    'languages' => [
        'default' => __("Wallonie et Grand-Duché de Luxembourg"),
        'en' => __("Flanders, Brussels and other regions"),
        'ffr' => __("France, et autres régions francophones"),
    ],
]);

$userCL = input()->cookie("user-cl");
$cl = input("get", "cl", "digits");

if ($userCL && !$cl) {
    if ($userCL && !session("user-cl-redirected")) {
        session("user-cl-redirected", 1);
        session()->redirect(pages("/")->localUrl($userCL));
    }
} else {
    if ($cl) {
        unset($_COOKIE['user-cl']); 
        setcookie("user-cl", user()->language->id, strtotime("+1 year"), "/");
        session()->redirect(pages("/")->url);
    }
}