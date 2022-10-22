<?php

return [
    'userManagement' => [
        'title'          => 'Manajemen User',
        'title_singular' => 'Manajemen User',
    ],
    'permission' => [
        'title'          => 'Izin',
        'title_singular' => 'Izin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Peranan',
        'title_singular' => 'Peranan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Daftar Pengguna',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'is_approved'              => 'Is Approved',
            'is_approved_helper'       => ' ',
        ],
    ],
    'perizinan' => [
        'title'          => 'Perizinan',
        'title_singular' => 'Perizinan',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'instansi_penerbit'        => 'Instansi Yang Mengeluarkan',
            'instansi_penerbit_helper' => ' ',
            'nomor_izin'               => 'Nomor Izin',
            'nomor_izin_helper'        => ' ',
            'masa_berlaku'             => 'Masa Berlaku',
            'masa_berlaku_helper'      => ' ',
            'lampiran_file'            => 'Lampiran File',
            'lampiran_file_helper'     => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'nama_izin'                => 'Nama Izin',
            'nama_izin_helper'         => ' ',
            'jenis_izin'               => 'Jenis Izin',
            'jenis_izin_helper'        => ' ',
        ],
    ],
    'dataStakeholder' => [
        'title'          => 'Data Stakeholders',
        'title_singular' => 'Data Stakeholder',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'nama_stakeholder'             => 'Nama Stakeholder',
            'nama_stakeholder_helper'      => ' ',
            'jangkauan_kerjasama'          => 'Jangkauan Kerjasama',
            'jangkauan_kerjasama_helper'   => ' ',
            'lampiran'                     => 'Lampiran',
            'lampiran_helper'              => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'lama_kerjasama'               => 'Lama Kerjasama',
            'lama_kerjasama_helper'        => ' ',
            'daerah'                       => 'Daerah',
            'daerah_helper'                => ' ',
            'kontak_di_lembaga'            => 'Kontak Di Lembaga',
            'kontak_di_lembaga_helper'     => ' ',
            'kontak_di_stakeholder'        => 'Kontak Di Stakeholder',
            'kontak_di_stakeholder_helper' => ' ',
            'jenis_kerjasama'              => 'Jenis Kerjasama',
            'jenis_kerjasama_helper'       => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Event',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Attributes',
            'properties_helper'   => ' ',
            'host'                => 'IP',
            'host_helper'         => ' ',
            'created_at'          => 'Event time',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'users'             => 'Users',
            'users_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'systemCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'contactCompany' => [
        'title'          => 'Instansi',
        'title_singular' => 'Instansi',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'company_name'           => 'Nama Instansi',
            'company_name_helper'    => ' ',
            'company_address'        => 'Address',
            'company_address_helper' => ' ',
            'company_website'        => 'Website',
            'company_website_helper' => ' ',
            'company_email'          => 'Email',
            'company_email_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'contactContact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'company'                   => 'Company',
            'company_helper'            => ' ',
            'contact_first_name'        => 'First name',
            'contact_first_name_helper' => ' ',
            'contact_last_name'         => 'Last name',
            'contact_last_name_helper'  => ' ',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => ' ',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => ' ',
            'contact_email'             => 'Email',
            'contact_email_helper'      => ' ',
            'contact_skype'             => 'Skype',
            'contact_skype_helper'      => ' ',
            'contact_address'           => 'Address',
            'contact_address_helper'    => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'dataUmum' => [
        'title'          => 'Data Umum',
        'title_singular' => 'Data Umum',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'nama_lembaga'               => 'Nama Lembaga',
            'nama_lembaga_helper'        => ' ',
            'nick_name'                  => 'Nick Name',
            'nick_name_helper'           => ' ',
            'ketua'                      => 'Ketua',
            'ketua_helper'               => ' ',
            'sekretariat_wilayah'        => 'Sekretariat Wilayah',
            'sekretariat_wilayah_helper' => ' ',
            'website'                    => 'Website',
            'website_helper'             => ' ',
            'email'                      => 'Email',
            'email_helper'               => ' ',
            'telp'                       => 'Nomor Telpon',
            'telp_helper'                => ' ',
            'whats_app'                  => 'Whats App',
            'whats_app_helper'           => ' ',
            'lingkup_kegiatan'           => 'Lingkup Kegiatan',
            'lingkup_kegiatan_helper'    => ' ',
            'perizinan'                  => 'Perizinan',
            'perizinan_helper'           => ' ',
            'jumlah_anggota'             => 'Jumlah Anggota',
            'jumlah_anggota_helper'      => ' ',
            'lampiran'                   => 'Lampiran',
            'lampiran_helper'            => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'dataKhusu' => [
        'title'          => 'Data Khusus',
        'title_singular' => 'Data Khusu',
        'fields'         => [
            'id'                                => 'ID',
            'id_helper'                         => ' ',
            'created_at'                        => 'Created at',
            'created_at_helper'                 => ' ',
            'updated_at'                        => 'Updated at',
            'updated_at_helper'                 => ' ',
            'deleted_at'                        => 'Deleted at',
            'deleted_at_helper'                 => ' ',
            'nama_daerah'                       => 'Nama Daerah',
            'nama_daerah_helper'                => 'kabupaten/kota',
            'data_daerah'                       => 'Data Daerah',
            'data_daerah_helper'                => ' ',
            'jumlah_anggota_daerah'             => 'Jumlah Anggota Daerah',
            'jumlah_anggota_daerah_helper'      => ' ',
            'nama_cabang'                       => 'Nama Cabang',
            'nama_cabang_helper'                => ' ',
            'jumlah_anggota_cabang'             => 'Jumlah Anggota Cabang',
            'jumlah_anggota_cabang_helper'      => ' ',
            'nama_sub_wilayah'                  => 'Nama Sub Wilayah',
            'nama_sub_wilayah_helper'           => ' ',
            'jumlah_anggota_sub_wilayah'        => 'Jumlah Anggota Sub Wilayah',
            'jumlah_anggota_sub_wilayah_helper' => ' ',
            'data_sub_wilayah_lain'             => 'Data Sub Wilayah Lain',
            'data_sub_wilayah_lain_helper'      => ' ',
            'data_cabang'                       => 'Data Cabang',
            'data_cabang_helper'                => ' ',
        ],
    ],
    'dataDaerah' => [
        'title'          => 'Data Daerah',
        'title_singular' => 'Data Daerah',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'nama_daerah'        => 'Nama Daerah',
            'nama_daerah_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'dataWilayah' => [
        'title'          => 'Data Wilayah',
        'title_singular' => 'Data Wilayah',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'nama_wilayah'        => 'Nama Wilayah',
            'nama_wilayah_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'daerah'              => 'Daerah',
            'daerah_helper'       => ' ',
        ],
    ],
    'dataCabang' => [
        'title'          => 'Data Cabang',
        'title_singular' => 'Data Cabang',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'nama_cabang'        => 'Nama Cabang',
            'nama_cabang_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'daerah'             => 'Daerah',
            'daerah_helper'      => ' ',
        ],
    ],
    'jenisKerjasama' => [
        'title'          => 'Jenis Kerjasama',
        'title_singular' => 'Jenis Kerjasama',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nama_jenis'        => 'Nama Jenis',
            'nama_jenis_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'jenisIzin' => [
        'title'          => 'Jenis Izin',
        'title_singular' => 'Jenis Izin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nama_jenis'        => 'Nama Jenis',
            'nama_jenis_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'masterData' => [
        'title'          => 'Master Data',
        'title_singular' => 'Master Data',
    ],
    'ketua' => [
        'title'          => 'Ketua',
        'title_singular' => 'Ketua',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ketua'             => 'Ketua',
            'ketua_helper'      => ' ',
            'periode'           => 'Periode',
            'periode_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];