<?php
class PostModel extends Model
{


    public function getPostById($id)
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPosts()
    {
        $posts = [];

        $req = self::getDb()->query('SELECT posts.id, posts.user_id, users.pseudo, posts.content, posts.created_at FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC');

        while ($post = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $post; // Ici, chaque $post est un tableau associatif contenant les informations du post et du pseudo de l'utilisateur
        }

        return $posts;
    }


    // D'autres méthodes pour interagir avec la table posts...
}
