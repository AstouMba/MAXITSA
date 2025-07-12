<?php
namespace App\Entity;
use App\Core\abstract\AbstractEntity;
use App\Entity\TransactionEnum;

class Transaction extends AbstractEntity{
    private int $id;
    private string $dateCreation;
    private string $montant;
    private TypeEnum $type;
    private string $compte_id;
     public function __construct($id,$dateCreation,$montant,$type, $compte_id) {
        $this->id = $id;
        $this->dateCreation = $dateCreation;
        $this->montant = $montant;
        $this->type = $type;
        $this->compte_id = $compte_id;
    }
    public static function toObject(array $data): static {
        $transaction = new static();
        $transaction->id = $data['id'];
        $transaction->dateCreation = $data['dateCreation']?? '';
        $transaction->montant = $data['montant']?? '';
        $transaction->type = $data['type']?? TypeEnum::PAIEMENT;
        $transaction->compte_id = $data['compte']?? '';
        return $transaction;
    }

    public function toArray(): array {
        return [
          
        ];
    }
  
}
