<?php

namespace MHD\Numm\Data;

use stdClass;

/**
 * Keep in mind that this is a result of reverse engineering, no documentation was available
 */
class Document extends stdClass
{
    public $ModifInterdite = false;
    public $Entite;
    public $DatePiece;
    public $DateOrigine;
    public $Reference;
    public $Libelle;
    public $ModeReglement;
    public $DateEcheance;
    public $Devise;
    public $TauxEchange;
    public $MontantTTC;
    public $TVA;
    public $Etablissement;
    public $FaitGen;
    public $TiersEntite;
    public $ExtId;
    public $RoleJournal;
    public $Statut;
    public $lignesEcri = [];

    public function addPayment(Payment $payment): self
    {
        $this->lignesEcri[] = $payment;

        return $this;
    }

    public function addSales(Sales $sales): self
    {
        $this->lignesEcri[] = $sales;

        return $this;
    }

    public function addVat(Vat $vat): self
    {
        $this->lignesEcri[] = $vat;

        return $this;
    }
}
