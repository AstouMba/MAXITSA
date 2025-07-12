<?php
namespace App\Entity;
use App\Core\abstract\AbstractEntity;
use App\Entity\CompteEnum; // Add this line if CompteEnum exists in App\Entity namespace

class Compte extends AbstractEntity {
    private int $id;
    private string $numeroTelephone;
    private string $numeroCompte;
    private string $CNI;
    private string $photoRecto;
    private string $photoVerso;
    private StatutEnum $type; 
    private  Client $client; 
    private array $transaction; 

    private string $dateCreation;

    public function __construct() {
    }


    public static function toObject(array $data): static {
        $compte = new static();
        $compte->id = $data['id'];
        $compte->numeroTelephone = $data['numero_telephone'] ?? '';
        $compte->numeroCompte = $data['numero_compte'];
        $compte->CNI = $data['CNI'] ?? '';
        $compte->photoRecto = $data['photo_recto'] ?? '';
        $compte->photoVerso = $data['photo_verso'] ?? '';    
        $compte->type = $data['type'] ?? StatutEnum::Principale; 
        $compte->client = $data['client'] ?? '';
        $compte->solde = (float)($data['solde'] ?? 0.0);
        $compte->dateCreation = $data['date_creation'] ?? '';

        return $compte;
       
        
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'numero_compte' => $this->numeroCompte,
            'CNI' => $this->CNI,
            'photo_recto' => $this->photoRecto,
            'photo_verso' => $this->photoVerso,
            'solde' => $this->solde,
            'type' => $this->type,
            'date_creation' => $this->dateCreation
        ];
    }
}
