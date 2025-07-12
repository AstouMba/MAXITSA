<?php
namespace App\Service;
use App\Repository\ClientRepository;
class ConnexionService {
    private ClientRepository $clientRepository;

    public function __construct() {
        
         $this->clientRepository = new ClientRepository();
        
    }
     
public function login(string $telephone, string $password): ?array {
        if (empty($telephone) || empty($password))
         {
            return null; 
        }
        $client = $this->clientRepository->selectByPhone($telephone, $password);
        
        if (!$client) {
            return null; 
        }

        if ($client['password'] !== $password) {
            return null; 
        }
        // unset($client['password']);
        
        return $client;
    }
   
}