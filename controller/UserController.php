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

                // Suppose that $userId is the unique ID of the user after a successful registration.
                $userId = $user->getId();
                $pseudo = $user->getPseudo();  // <--- Add this line

                // Define the path of the user directory.
                $userDirectory = __DIR__ . "/../asset/media/uploads/{$userId}_{$pseudo}";

                $userPhotosDirectory = "{$userDirectory}/photos";
                $userVideosDirectory = "{$userDirectory}/videos";

                // Create the user directory, if it does not already exist.
                if (!file_exists($userPhotosDirectory)) {
                    mkdir($userPhotosDirectory, 0777, true);
                }
                if (!file_exists($userVideosDirectory)) {
                    mkdir($userVideosDirectory, 0777, true);
                }
                global $router;
                // echo json_encode(['status' => 'success']);
                header('Location: ' .  $router->generate('home'));
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
                global $router;
                // echo json_encode(['status' => 'success']);
                header('Location: ' . $router->generate('home'));
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid pseudo or password.']);
            }
        } else {
            echo self::getRender('login.html.twig', []);
        }
    }



    public function logout()
    {
        session_destroy();
        global $router;
        // echo json_encode(['status' => 'success']);
        header('Location: ' . $router->generate('home'));
        exit();
    }
}
