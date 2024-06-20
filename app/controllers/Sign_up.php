<?php
class Sign_up extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model("User");
    }

    public function index()
    {
        $data['pageTitle'] = "Sign Up";
        $this->view("sign_up/sign_up", $data);

        // process d form
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
        // sanitize POST data

        // init data
        $data = [
            'userid' => trim($_POST['userid']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'password2' => trim($_POST['password2'])
            // took user input from d POST that sort by the name of d input
            // trim to remove d white space
            // save it to $data['x']
        ];

        // validate d user input. check if d user val is empty or not, if it did.. show error
        if (empty($data['userid']) || empty($data['username']) || empty($data['email']) || empty($data['password']) || empty($data['password2'])) {
            flash("signup", "Please fill out all inputs");
            redirect("sign_up");
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
            flash("signup", "Invalid username");
            redirect("sign_up");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            flash("signup", "Invalid Email");
            redirect("sign_up");
        }

        if (strlen($data['password']) < 6) {
            flash("signup", "Invalid password");
            redirect("sign_up");
        } else if ($data['password'] !== $data['password2']) {
            flash("signup", "Passwords doesn't match");
            redirect("sign_up");
        }

        // user with d same email or username already exists
        if ($this->model->findUser($data['email'], $data['username'])) {
            flash("signup", "Email or username is already taken");
            redirect("sign_up");
        }
        // passed all validation checks

        // hash d pass
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // reg user
        if ($this->model->register($data)) {
            redirect("sign_up");
        }
    }
}

$init = new Sign_up();

// ensure that user is sending a POST req, if user did, check POST val based on type 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register': // receiving POST req from the signup form
            $init->index();
            break;
    }
}