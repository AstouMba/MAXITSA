<?php

namespace App\Repository;

use App\Core\DataBase;
use PDO;

class CompteRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DataBase::getInstance()->getConnexion();
    }

    public function createComptePrimaire(array $data): array
    {
        try {
           
            $sql = 'INSERT INTO compte (
                        numerotelephone, numeroCNI, photoRecto, photoVerso,
                        solde, type, client_id, password
                    ) VALUES (
                        :numerotelephone, :numeroCNI, :photoRecto, :photoVerso,
                        :solde, :type, :client_id, :password
                    )';

            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([
                'numerotelephone' => $data['telephone']?? null,
                'numeroCNI'       => $data['numeroCNI'],
                'photoRecto'      => $data['photoRecto'] ?? null,
                'photoVerso'      => $data['photoVerso'] ?? null,
                'solde'           => 0.00,
                'type'          => 'principal',
                'client_id'       => $data['client_id'],
                'password'        => $data['password']
            ]);

            if ($result) {
               
                return [
                    'success'   => true,
                    'message'   => 'Compte principal créé avec succès',
                    'compte_id' => $this->pdo->lastInsertId()
                ];
            }

            return [
                'success' => false,
                'message' => 'Erreur lors de la création du compte'
            ];

        } catch (\PDOException $e) {
            error_log("Erreur création compte: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erreur de base de données : ' . $e->getMessage()
            ];
        }
    }
}
