<?php

use Illuminate\Database\Seeder;

class TermsDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idRutin = \DB::table('unsur')->where('name','=','Rutin Ahli Daya')->first()->id;

		\DB::table('terms')->insert([
            [
                'name' => 'Surat Permohonan Pembayaran',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Kuitansi',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy NPWP (Nomor Pokok Wajib Pajak)',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy PKP (Pengusaha Kena Pajak)',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Faktur Pajak',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy bukti nomor seri faktur pajak dari Dirjen Pajak',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Berita Acara Pekerjaan Selesai oleh Direksi Pekerjaan',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Berita Acara Serah Terima Pekerjaan yang ditandatangani PIHAK PERTAMA dan PIHAK KEDUA dalam rangkap 2 (dua) bermaterai cukup',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy bukti transfer dan daftar pembayaran upah tenaga kerja PIHAK KEDUA',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Bukti pembayaran BPJS (Ketenagakerjaan & Kesehatan ) berupa Kuitansi dari BPJS',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy pembayaran uang pengakhiran yang disetorkan melalui DPLK (Dana Pensiun Lembaga Keuangan) tenaga kerja Penyedia Barang/Jasa bulan sebelumnya',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy PKWTT (Perjanjian Kerja Wktu Tidak Tertentu) antara tenaga kerja dengan penyedia Barang/Jasa untuk tagihan pertama dan atau jika terjadi perubahan status (mutasi/pergantian) tenaga kerja',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy pelaporan tenaga kerja ke Disnaker (tagihan ketiga) satu kali dalam setahun',
                'id_unsur' => $idRutin,
            ],
            [
                'name' => 'Foto copy surat perjanjian dan atau Adendum',
                'id_unsur' => $idRutin,
            ],
        ]);
    }
}
