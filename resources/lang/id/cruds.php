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
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'instansi_penerbit'          => 'Instansi Yang Mengeluarkan',
            'instansi_penerbit_helper'   => ' ',
            'nomor_izin'                 => 'Nomor Izin',
            'nomor_izin_helper'          => ' ',
            'lampiran_file'              => 'Lampiran File',
            'lampiran_file_helper'       => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'nama_izin'                  => 'Nama Izin',
            'nama_izin_helper'           => ' ',
            'owner'                      => 'Owner',
            'owner_helper'               => ' ',
            'tanggal_dikeluarkan'        => 'Tanggal Dikeluarkan',
            'tanggal_dikeluarkan_helper' => ' ',
            'berlaku_sampai'             => 'Berlaku Sampai',
            'berlaku_sampai_helper'      => 'isi tanggal atau selamanya',
        ],
    ],
    'dataStakeholder' => [
        'title'          => 'Data Kerja Sama',
        'title_singular' => 'Data Kerja Sama',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'nama_stakeholder'              => 'Nama Stakeholder',
            'nama_stakeholder_helper'       => 'Contact penghubung dari pihak Lembaga Kerjasama',
            'jangkauan_kerjasama'           => 'Jangkauan Kerjasama',
            'jangkauan_kerjasama_helper'    => ' ',
            'lampiran'                      => 'Lampiran',
            'lampiran_helper'               => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
            'owner'                         => 'Owner',
            'owner_helper'                  => ' ',
            'jenis_kerjasama'               => 'Jenis Kerjasama',
            'jenis_kerjasama_helper'        => 'Nama kerjasama antara Lembaga dan Lembaga Kerjasama',
            'mulai_kerjasama'               => 'Mulai Kerjasama',
            'mulai_kerjasama_helper'        => ' ',
            'frekuensi_kerjasama'           => 'Frekuensi Kerjasama',
            'frekuensi_kerjasama_helper'    => 'sekali / rutin (tahunan, bulanan, mingguan, harian, dll)',
            'no_hp_wa_lembaga'              => 'No HP/WA Lembaga',
            'no_hp_wa_lembaga_helper'       => 'No HP kontak di lembaga',
            'kontak_di_lembaga'             => 'Kontak Di Lembaga',
            'kontak_di_lembaga_helper'      => 'Contact penghubung dari pihak lembaga',
            'no_hp_wa_stakeholder'          => 'No Hp Wa Stakeholder',
            'no_hp_wa_stakeholder_helper'   => 'No HP kontak Stakeholder',
            'nama_lembaga_kerjasama'        => 'Nama Lembaga Kerjasama',
            'nama_lembaga_kerjasama_helper' => 'Dinas / Penerbit / Kwarcab / dll',
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
        'title'          => 'Data Lembaga',
        'title_singular' => 'Data Lembaga',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'nama_lembaga'               => 'Nama Lembaga',
            'nama_lembaga_helper'        => 'Nama singkatan dan nama panjang',
            'ketua'                      => 'Ketua',
            'ketua_name'                 => 'Nama Ketua',
            'periode'                    => 'Periode',
            'ketua_helper'               => ' ',
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
            'owner'                      => 'Owner',
            'owner_helper'               => ' ',
            'province'                   => 'Province',
            'province_helper'            => ' ',
            'sekretariat_wilayah'        => 'Sekretariat Wilayah',
            'sekretariat_wilayah_helper' => ' ',
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
    'province' => [
        'title'          => 'Provinces',
        'title_singular' => 'Province',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'province_name'        => 'Province Name',
            'province_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'owner'                => 'Owner',
            'owner_helper'         => ' ',
            'id_province'          => 'Id Province',
            'id_province_helper'   => ' ',
        ],
    ],
    'regency' => [
        'title'          => 'Regencies',
        'title_singular' => 'Regency',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'id_province'         => 'Id Province',
            'id_province_helper'  => ' ',
            'id_regency'          => 'Id Regency',
            'id_regency_helper'   => ' ',
            'regency_name'        => 'Regency Name',
            'regency_name_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'district' => [
        'title'          => 'Districts',
        'title_singular' => 'District',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'id_regency'           => 'Id Regency',
            'id_regency_helper'    => ' ',
            'id_district'          => 'Id District',
            'id_district_helper'   => ' ',
            'district_name'        => 'District Name',
            'district_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'owner'                => 'Owner',
            'owner_helper'         => ' ',
        ],
    ],
    'village' => [
        'title'          => 'Villages',
        'title_singular' => 'Village',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'id_district'         => 'Id District',
            'id_district_helper'  => ' ',
            'id_village'          => 'Id Village',
            'id_village_helper'   => ' ',
            'village_name'        => 'Village Name',
            'village_name_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'owner'               => 'Owner',
            'owner_helper'        => ' ',
        ],
    ],
    'dataKhusu' => [
        'title'          => 'Data Khusus',
        'title_singular' => 'Data Khusu',
    ],
    'dataDaerah' => [
        'title'          => 'Data Daerah',
        'title_singular' => 'Data Daerah',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'regency'               => 'Regency',
            'regency_helper'        => ' ',
            'nama_ketua'            => 'Nama Ketua',
            'nama_ketua_helper'     => ' ',
            'kontak_hp_wa'          => 'Kontak HP/WA',
            'kontak_hp_wa_helper'   => ' ',
            'jumlah_anggota'        => 'Jumlah Anggota',
            'jumlah_anggota_helper' => ' ',
            'lampiran'              => 'Lampiran',
            'lampiran_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'owner'                 => 'Owner',
            'owner_helper'          => ' ',
        ],
    ],
    'dataCabang' => [
        'title'          => 'Data Cabang',
        'title_singular' => 'Data Cabang',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'district'              => 'District',
            'district_helper'       => ' ',
            'nama_ketua'            => 'Nama Ketua',
            'nama_ketua_helper'     => ' ',
            'kontak_hp_wa'          => 'Kontak HP/WA',
            'kontak_hp_wa_helper'   => ' ',
            'jumlah_anggota'        => 'Jumlah Anggota',
            'jumlah_anggota_helper' => ' ',
            'lampiran'              => 'Lampiran',
            'lampiran_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'owner'                 => 'Owner',
            'owner_helper'          => ' ',
        ],
    ],
    'dataRanting' => [
        'title'          => 'Data Ranting',
        'title_singular' => 'Data Ranting',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'village'               => 'Village',
            'village_helper'        => ' ',
            'nama_ketua'            => 'Nama Ketua',
            'nama_ketua_helper'     => ' ',
            'kontak_hp_wa'          => 'Kontak HP/WA',
            'kontak_hp_wa_helper'   => ' ',
            'jumlah_anggota'        => 'Jumlah Anggota',
            'jumlah_anggota_helper' => ' ',
            'lampiran'              => 'Lampiran',
            'lampiran_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
];
