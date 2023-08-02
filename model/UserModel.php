<?php

class UserModel extends Model
{
    public function findBypseudo($pseudo)
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE pseudo = ?");
        $stmt->execute([$pseudo]);
        $data = $stmt->fetch();

        if ($data) {
            $user = new User();
            $user->setId($data['id']);
            $user->setPseudo($data['pseudo']);
            $user->setEmail($data['email']);
            $user->setMotDePasse($data['password']);
            return $user;
        } else {
            return null;
        }
    }

    public function create(User $user)
    {
        $pseudo = $user->getPseudo();
        $password = $user->getMotDePasse();
        $email = $user->getEmail();

        $stmt = $this->getDb()->prepare("INSERT INTO users (pseudo, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $password, $email]);
    }

    public function getAllUsers()
    {
        $stmt = $this->getDb()->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
