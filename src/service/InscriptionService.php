<?php

namespace App\Service;

use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Repository\CompteRepository;

class InscriptionService
{
    private CompteRepository $compteRepository;
    private ClientRepository $clientRepository;

    public function __construct()
    {
        $this->compteRepository = new CompteRepository();
        $this->clientRepository = new ClientRepository();
    }

    public function inscription(
        string $nom,
        string $prenom,
        string $adresse,
        string $numeroTelephone,
        string $numeroCNI,
        string $password,
        string $photoRecto,
        string $photoVerso,

    ): ?array {
        
       
        if (empty($numeroTelephone) || empty($password)) {
           
            return null;
        }
        
// var_dump($nom,  $prenom,
//          $adresse,
//          $numeroTelephone,
//          $numeroCNI,
//          $password,
//          $photoRecto,
//          $photoVerso, );

//          die;
        $client = $this->clientRepository->selectByPhone($numeroTelephone,$password);

    

        // if (!$client || !password_verify($password, $client['password'])) {
     
        
        //     return null;
        // }
        

        // Création du compte principal
        $dataCompte = [
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adresse'=>$adresse,
            'telephone' => $numeroTelephone,
            'numeroCNI'       => $numeroCNI,
            'password'        => $password,
            'photoRecto'      => $photoRecto,
            'photoVerso'      => $photoVerso,
            'client_id'       => $client['id']
        ];
        

       

        $compteResult = $this->compteRepository->createComptePrimaire($dataCompte);

           var_dump($compteResult);
        die;

        if (!$compteResult['success']) {
          
            return null;
        }
        

        // Tu peux gérer les transactions ici si nécessaire
        // ...

        unset($client['password']); // Par sécurité
   
        return $client;
    }
}
