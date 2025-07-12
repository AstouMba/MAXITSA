<?php
namespace App\entity;
use App\Core\abstract\AbstractEntity;
use App\Repository;

class Client extends AbstractEntity {
    private int $id;
    private string $name;
    private string $prenom;
    private string $telephone ;
    private string $adresse ;
    private ?array $compte;


    public static function toObject(array $data): static {
        $client = new static();
        $client->id = $data['id'];
        $client->name = $data['name'];
        $client->prenom = $data['prenom'];
        $client->ptelephone = $data['telephone'];
        $client->adresse = $data['adresse'] ;
        $client->compte = $data['compte'] ;
        return $client;
    }

    public function toArray(): array {
        return [
          
        ];
    }
 
}