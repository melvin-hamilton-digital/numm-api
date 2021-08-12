<?php

namespace MHD\Numm\Data;

use stdClass;

class Payment extends stdClass
{
    public $CompteGeneral;
    public $TiersEntite;
    public $Collectif;
    public $DebitPiece;
    public $LibelleLigne;
    public $TauxTVA;
    public $MontantTVA;
    public $BAP;
    public $Etablissement;
    public $Prorata;
    public $Acompte;
    public $ExtIdLine;
}
