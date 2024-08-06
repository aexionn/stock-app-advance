<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbahBarangRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nm_barang' => ['bail', 'required', 'min:3', 'max:255'],
            'stok_awal' => ['required', 'numeric', 'min:0', 'min_digits:1', 'max_digits:11'],
            'stok_terbaru' => ['required', 'numeric', 'min:0', 'min_digits:1', 'max_digits:11'],
            'deskripsi' => ['required', 'string', 'min:5', 'max:255'],
            'harga' => ['required', 'decimal:2', 'between:1000,99999999'],
            //  , 'min_digits:5', 'max_digits:11'
        ];
    }

    /**
     * Get the error messages for the defined validation rules..
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nm_barang.required' => 'Nama Barang Harus diisi.',
            'nm_barang.min' => 'Nama Barang Harus lebih dari 3 Huruf.',
            'nm_barang.max' => 'Nama Barang Tidak dapat lebih dari 255 Huruf.',
            'stok_awal.required' => 'Stok Awal Harus diisi.',
            'stok_awal.numeric' => 'Stok Awal Harus berupa angka.',
            'stok_awal.min_digits' => 'Stok Awal Harus lebih dari 1 Angka.',
            'stok_awal.max_digits' => 'Stok Awal Tidak dapat lebih dari 11 Angka.',
            'stok_terbaru.required' => 'Stok Terbaru Harus diisi.',
            'stok_terbaru.numeric' => 'Stok Terbaru Harus berupa angka.',
            'stok_terbaru.min_digits' => 'Stok Terbaru Harus lebih dari 1 Angka.',
            'stok_terbaru.max_digits' => 'Stok Terbaru Tidak dapat lebih dari 11 Angka.',
            'deskripsi.required' => 'Deskripsi Barang Harus diisi.',
            'deskripsi.min' => 'Deskripsi Barang Harus lebih dari 5 Huruf.',
            'deskripsi.max' => 'Deskripsi Barang Tidak dapat lebih dari 255 Huruf.',
            'harga.required' => 'Harga Barang Harus diisi.',
            'harga.decimal' => 'Harga Barang Harus berupa decimal.',
            'harga.between' => 'Harga Barang Harus diantara 1000 - 99999999.'
        ];
    }
}
