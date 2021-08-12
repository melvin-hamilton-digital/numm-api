<?php

namespace MHD\Numm\Data;

use stdClass;

class Sales extends stdClass
{
    public $CompteGeneral;
    public $TiersEntite;
    public $DebitOrigine;
    public $CreditOrigine;
    public $DebitPiece;
    public $CreditPiece;
    public $LibelleLigne;
    public $TauxTVA;
    public $MontantTVA;
    public $FaitGen;
    public $BAP;
    public $Etablissement;
    public $Prorata;
    public $Acompte;
    public $ExtIdLine;
    public $TypeTransaction;
    public $lignesAnaly;

    public function addAnalytics(SalesAnalytics $analytics): self
    {
        $this->lignesAnaly[] = $analytics;

        return $this;
    }
}
