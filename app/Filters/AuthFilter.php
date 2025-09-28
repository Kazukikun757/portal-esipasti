<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $isLoggedIn = session()->get('is_logged_in') === true;
        // Jika user belum login, redirect ke halaman login
        if (!$isLoggedIn) {
            // Simpan URL yang diakses untuk redirect setelah login
            session()->set('redirect_url', current_url());

            // Set flash message
            session()->setFlashdata('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');

            return redirect()->to('/login');
        }

        // Extend session jika user aktif
        if ($isLoggedIn) {
            session()->markAsTempdata('user_id', 7200); // 2 hours
            session()->markAsTempdata('is_logged_in', 7200);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
