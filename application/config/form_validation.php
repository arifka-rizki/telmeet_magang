<?php
$config = array(
    'eksternal' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|alpha_numeric_spaces',
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
    ),
    'tambah_rapat_PIC' => array(
        array(
            'field' => 'NAMA_RAPAT',
            'label' => 'Judul Rapat',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Judul Rapat'
            )
        ),
        array(
            'field' => 'NOTA_DINAS',
            'label' => 'Nota Dinas',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Nomor Nota Dinas'
            )
        ),
        array(
            'field' => 'TIPE_RAPAT',
            'label' => 'Tipe Rapat',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Tipe Rapat'
            )
        ),
        array(
            'field' => 'PENGUNDANG',
            'label' => 'Pengundang',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Nama Pengundang Rapat'
            )
        ),
        array(
            'field' => 'TANGGAL',
            'label' => 'Tanggal',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Tanggal Rapat'
            )
        ),
        array(
            'field' => 'WAKTU_MULAI',
            'label' => 'Waktu Mulai',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Waktu Mulai Rapat'
            )
        ),
        array(
            'field' => 'WAKTU_SELESAI',
            'label' => 'Waktu Selesai',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Waktu Selesai Rapat'
            )
        ),
        array(
            'field' => 'NOTULEN',
            'label' => 'Notulen',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Nama Notulen'
            )
        ),
        array(
            'field' => 'TEMPAT',
            'label' => 'Lokasi Rapat',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Lokasi Rapat'
            )
        )
    ),
    'hasil_rapat' => array(
        array(
            'field' => 'resultRapat',
            'label' => 'Result Rapat',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Hasil Rapat'
            )
        )
    ),
    'tambah_rapat' => array(
        array(
            'field' => 'kodeRapat',
            'label' => 'Kode Rapat',
            'rules' => 'required|exact_length[8]',
            'errors' => array(
                'required' => 'Masukkan Kode Rapat',
                'exact_length' => 'Kode Rapat Harus Berisi 8 Karakter'
            )
        )
    ),
    'bukti_rapat' => array(
        array(
            'field' => 'BUKTI_KEHADIRAN',
            'label' => 'Bukti Kehadiran',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Masukkan Foto Bukti Kehadiran'
            )
        )
    )
);