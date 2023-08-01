<?php

class UserService extends Model
{
    public static function findBypseudo($pseudo)
    {
        $stmt = self::getDb()->prepare("SELECT * FROM user WHERE pseudo = ?");
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

    public static function create($pseudo, $password, $email)
    {
        $stmt = self::getDb()->prepare("INSERT INTO user (pseudo, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $password, $email]);
    }
}
