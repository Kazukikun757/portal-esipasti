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

    public function addAccount()
    {
        $data = [
            'title' => 'Tambah Akun',
            'validation' => session()->getFlashdata('validation')
        ];

        return view('admin/menu/add-acount', $data);
    }

    public function doAddAccount()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'full_name' => 'required|min_length[2]|max_length[100]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ];

        $messages = [
            'username' => [
                'required' => 'Username harus diisi',
                'min_length' => 'Username minimal 3 karakter',
                'max_length' => 'Username maksimal 50 karakter',
                'is_unique' => 'Username sudah digunakan'
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Format email tidak valid',
                'is_unique' => 'Email sudah digunakan'
            ],
            'full_name' => [
                'required' => 'Nama lengkap harus diisi',
                'min_length' => 'Nama lengkap minimal 2 karakter',
                'max_length' => 'Nama lengkap maksimal 100 karakter'
            ],
            'password' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 6 karakter'
            ],
            'password_confirm' => [
                'required' => 'Konfirmasi password harus diisi',
                'matches' => 'Konfirmasi password tidak sama dengan password'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'full_name' => $this->request->getPost('full_name'),
            'password' => $this->request->getPost('password')
        ];

        try {
            $userId = $this->userModel->insert($data);

            if ($userId) {
                session()->setFlashdata('success', 'Registrasi berhasil!');
                return redirect()->to('/admin/menu');
            } else {
                session()->setFlashdata('error', 'Registrasi gagal. Silakan coba lagi.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        $this->session->destroy();
        session()->setFlashdata('success', 'Anda telah logout');
        return redirect()->to('/login');
    }
}
