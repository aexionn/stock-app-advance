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
            'deskripsi' => ['required', 'string', 'min:5', 'max:255'],
            'harga' => ['required', 'numeric' , 'min_digits:6', 'max_digits:11'],
            'id_gudang' => ['required', 'string']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nm_barang.required' => 'Nama Barang Harus diisi.',
            'nm_barang.min' => 'Nama Barang Harus lebih dari 3 Huruf.',
            'nm_barang.max' => 'Nama Barang Tidak dapat lebih dari 255 Huruf.',
            'deskripsi.required' => 'Deskripsi Barang Harus diisi.',
            'deskripsi.min' => 'Deskripsi Barang Harus lebih dari 5 Huruf.',
            'deskripsi.max' => 'Deskripsi Barang Tidak dapat lebih dari 255 Huruf.',
            'harga.required' => 'Harga Barang Harus diisi.',
            'harga.numeric' => 'Harga Barang Harus berupa angka.',
            'harga.min_digits' => 'Harga Barang Harus lebih dari 6 Angka (Termasuk dibelakang titik).',
            'harga.max_digits' => 'Harga Barang Tidak dapat lebih dari 11 Angka (Termasuk dibelakang titik).',
            'id_gudang.required' => 'Info Gudang Harus diisi.',
        ];
    }
}
