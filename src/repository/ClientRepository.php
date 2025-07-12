<?php
namespace App\Repository;
use App\Core\DataBase;
use PDO;
use PDOException;

class ClientRepository 
{
    private PDO $pdo;
    public function __construct()
    {

        $this->pdo = DataBase::getInstance()->getConnexion();

    }

    public function selectByPhone(string $phone, string $password): ?array

    {
        
        try 
        {
            $sql = "SELECT * FROM client WHERE telephone = :telephone";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':telephone', $phone, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result ? $result[0] : null; // Return the first result or null if not found

        } catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
            return null;
        } 
    }


  public function insert(string $telephone, string $cni, string $nom, string $prenom, string $adresse, ?array $photoRecto, ?array $photoVerso): int {

    // var_dump($telephone, $cni,$nom);
    // die;


   
        try {
            // Définir le répertoire de stockage des fichiers
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            // Générer des noms uniques pour éviter les collisions
            $photoRectoName = uniqid('recto_') . '_' . basename($photoRecto['name']);
            $photoVersoName = uniqid('verso_') . '_' . basename($photoVerso['name']);
    
            // Déplacer les fichiers vers le dossier de destination
            move_uploaded_file($photoRecto['tmp_name'], $uploadDir . $photoRectoName);
            move_uploaded_file($photoVerso['tmp_name'], $uploadDir . $photoVersoName);
    
            // Requête d’insertion
            $sqlUser = "INSERT INTO client (nom, prenom, telephone, cni, adresse, photo_recto, photo_verso)
                        VALUES (:nom, :prenom, :telephone, :cni, :adresse, :photo_recto, :photo_verso)";

            
            $stmtUser = $this->pdo->prepare($sqlUser);
            $stmtUser->bindParam(':nom', $nom);
            $stmtUser->bindParam(':prenom', $prenom);
            $stmtUser->bindParam(':telephone', $telephone);
            $stmtUser->bindParam(':cni', $cni);
            $stmtUser->bindParam(':adresse', $adresse);
            $stmtUser->bindParam(':photo_recto', $photoRectoName);
            $stmtUser->bindParam(':photo_verso', $photoVersoName);
            $stmtUser->execute();
    
            return (int) $this->pdo->lastInsertId();
    
        } catch (PDOException $e) {
            // var_dump('repositorie',$e);die;
            throw new \Exception("Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage());
        }
    }
}
