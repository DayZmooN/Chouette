<?php
class UserController extends Controller
{
    private $userModel;
    private $router;

    public function __construct()
    {
        global $router;
        $this->router = $router;
        $this->userModel = new UserModel();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setPseudo($_POST["pseudo"]);
            $user->setMotDePasse(password_hash($_POST["password"], PASSWORD_DEFAULT));
            $user->setEmail($_POST["email"]);

            $existingUser = $this->userModel->findBypseudo($user->getPseudo());

            if ($existingUser) {
                echo json_encode(['status' => 'error', 'message' => 'A user with this pseudo already exists.']);
            } else {
                $this->userModel->create($user);
                echo json_encode(['status' => 'success']);
            }
        } else {
            echo self::getRender('register.html.twig', []);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST["pseudo"];
            $password = $_POST["password"];

            $user = $this->userModel->findBypseudo($pseudo);

            if ($user && password_verify($password, $user->getMotDePasse())) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['pseudo'] = $user->getPseudo();
                $_SESSION['is_connected'] = true;

                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid pseudo or password.']);
            }
        } else {
            echo self::getRender('login.html.twig', []);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        echo json_encode(['status' => 'success']);
    }

    // Ajoutez d'autres méthodes ici au besoin
}
