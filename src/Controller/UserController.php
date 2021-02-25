<?php


namespace Core\Controller;


use Core\App\Controller;
use Core\Model\UserModel;

class UserController extends Controller
{
    private static $_ROLE_ADMIN = 1;
    private $_model;

    public function __construct()
    {
        $this->_model = new UserModel();
    }

    public function logIn()
    {
        if (isset($_POST['connexion'])) {
            if (isset($_POST['nom']) and !empty($_POST['nom']) and isset($_POST['password']) and !empty($_POST['password'])) {
                $nom = $_POST['nom'];
                $password = $_POST['password'];
                $user = $this->_model->checkUser($nom);
                if ($user !== false and password_verify($password, $user['password'])) {
                    $_SESSION['nom'] = $nom;
                    $_SESSION['code_barre'] = $user['code_barre'];
                    $_SESSION['csrf'] = strval(bin2hex(random_bytes(16)));
                    $_SESSION['role'] = $user['role'];
                    header('Location: ' . WEB_ROOT);
                } else {
                    $msg = 'Identifiant ou mot de passe incorect';
                }
            } else {
                $msg = 'Veuillez remplir tout les champs';
            }
        }
        $this->render('User/connexion', ['msg' => ((isset($msg) and !empty($msg)) ? $msg : null), 'title' => 'Connexion']);
    }

    public function signUp()
    {
        if (isset($_POST['inscription'])) {
            if (isset($_POST['nom']) and !empty($_POST['nom']) and isset($_POST['prenom']) and !empty($_POST['prenom']) and isset($_POST['email']) and !empty($_POST['email']) and filter_var(strval($_POST['email']), FILTER_VALIDATE_EMAIL) and isset($_POST['cp']) and !empty($_POST['cp']) and isset($_POST['adresse']) and !empty($_POST['adresse']) and isset($_POST['ville']) and !empty($_POST['ville']) and isset($_POST['password']) and !empty($_POST['password'])) {
                $nom = strval($_POST['nom']);
                $prenom = strval($_POST['prenom']);
                $adresse = strval($_POST['adresse']);
                $cp = strval($_POST['cp']);
                $ville = strval($_POST['ville']);
                $email = strval($_POST['email']);
                $password = strval($_POST['password']);
                if ($this->_model->createUser($nom, $prenom, $adresse, $cp, $ville, $email, 0, $this->generateCode(15), $password)) {
                    $msg = 'Votre compte à bien été créé';
                } else {
                    $msg = 'Erreur';
                }
            } else {
                $msg = 'Veuillez remplir tout les champs correctement';
            }
        }
        $this->render('User/inscription', ['msg' => ((isset($msg) and !empty($msg)) ? $msg : null), 'title' => 'Inscription']);
    }

    public function logOut()
    {
        if (isset($_SESSION['nom']) and !empty($_SESSION['nom'])) {
            session_destroy();
        }
        header('Location: ' . WEB_ROOT);
    }

    public static function isCurrentAdmin()
    {
        if (isset($_SESSION['role']) and !empty($_SESSION['role']) and intval($_SESSION['role']) === UserController::$_ROLE_ADMIN) {
            return True;
        } else {
            return False;
        }
    }

    public static function isConnected()
    {
        if (isset($_SESSION['nom']) and !empty($_SESSION['nom'])) {
            return True;
        } else {
            return False;
        }
    }

    private function generateCode(int $lenght)
    {
        $code = mt_rand(1, 9);
        for ($i = 0; $i < 14; $i++) {
            $code .= mt_rand(0, 9);
        }
        return $code;
    }
}