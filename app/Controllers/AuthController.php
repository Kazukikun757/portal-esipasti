<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;
    protected $session;
    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
        $this->session = session();
    }

    public function isLoggedIn()
    {
        return $this->session->get('is_logged_in') === true;
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->isLoggedIn()) {
            return redirect()->to('/admin/menu');
        }

        $data = [
            'title' => 'Login - Auth System',
            'validation' => session()->getFlashdata('validation')
        ];

        return view('auth/login', $data);
    }

    public function doLogin()
    {
        $rules = [
            'login_field' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'login_field' => [
                'required' => 'Email atau username harus diisi'
            ],
            'password' => [
                'required' => 'Password harus diisi'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $loginField = $this->request->getPost('login_field');
        $password = $this->request->getPost('password');

        // Cek apakah login menggunakan email atau username
        $user = null;
        if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
            $user = $this->userModel->getUserByEmail($loginField);
        } else {
            $user = $this->userModel->getUserByUsername($loginField);
        }

        if (!$user) {
            session()->setFlashdata('error', 'Email/Username tidak ditemukan');
            return redirect()->back()->withInput();
        }

        if (!$this->userModel->verifyPassword($password, $user['password'])) {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->back()->withInput();
        }

        // Set session
        $sessionData = [
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'is_logged_in' => true,
            'login_time' => time()
        ];

        $this->session->set($sessionData);

        // Regenerate session ID untuk keamanan
        $this->session->regenerate();

        session()->setFlashdata('success', 'Login berhasil! Selamat datang, ' . $user['full_name']);
        return redirect()->to('/admin/menu');
    }

    public function logout()
    {
        $this->session->destroy();
        session()->setFlashdata('success', 'Anda telah logout');
        return redirect()->to('/login');
    }
}
