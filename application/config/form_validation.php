<?php
$config = array(
    'eksternal' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|alpha',
            'errors' => array(
                'required' => 'Masukkan Nama Anda',
                'alpha' => 'Nama Hanya Mengandung Alphabet'
            )
        ),
        array(
            'field' => 'nik',
            'label' => 'NIK',
            'rules' => 'required|numeric',
            'errors' => array(
                'required' => 'Masukkan NIK Anda',
                'numeric' => 'NIK Hanya Mengandung Angka'
            )
        ),
        array(
            'field' => 'jenisKelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Jenis Kelamin Anda'
            )
        ), 
        array(
            'field' => 'instansi',
            'label' => 'Instansi'
            // 'rules' => 'required',
            // 'errors' => array(
            //     'required' => 'Masukkan Instansi Anda'
            // )
        ), 
        array(
            'field' => 'jabatan',
            'label' => 'Jabatan'
            // 'rules' => 'required',
            // 'errors' => array(
            //     'required' => 'Masukkan Jabatan Anda'
            // )
        ), 
        array(
            'field' => 'telefon',
            'label' => 'Telefon',
            'rules' => 'numeric|min_length[9]',
            'errors' => array(
                'numeric' => 'Nomor Telefon Hanya Menandung Angka',
                'min_length' => 'Masukkan Nomor Telefon yang valid'
            )
        ), 
        array(
            'field' => 'buktiKehadiran',
            'label' => 'Bukti Kehadiran',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Bukti Kehadiran Anda'
            )
        )
        // array(
        //     'field' => 'email',
        //     'label' => 'Email',
        //     'rules' => 'required|valid_email',
        //     'errors' => array(
        //         'required' => 'Masukkan Email Anda',
        //         'valid_email' => 'Masukkan Email valid'
        //     )
        // ),
        // array(
        //     'field' => 'kodeRapat',
        //     'label' => 'Kode Rapat',
        //     'rules' => 'required',
        //     'errors' => array(
        //         'required' => 'Masukkan Koder Rapat'
        //     )
        // )
    ),
    // 'group_two' => array(
    //     array(
    //         'field' => 'min_text_field',
    //         'label' => 'Text Field Two',
    //         'rules' => 'required|min_length[8]'
    //     ),
    //     array(
    //         'field' => 'max_text_field',
    //         'label' => 'Text Field Three',
    //         'rules' => 'required|max_length[20]'
    //     )
    // )
);