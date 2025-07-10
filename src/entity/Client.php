<?php
namespace APP\entity;
use App\core\AbstractEntity;

class Client extends AbstractEntity {
    private int $id;
    private string $name;
    private string $prenom;
    private ?string $telephone ;

    public static function toObject(array $data): static {
        $client = new static();
        $client->id = $data['id'];
        $client->name = $data['name'];
        $client->prenom = $data['prenom'];
        return $client;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'prenom' => $this->prenom,
            'telephone' => $this->telephone ,
        ];
    }
}