<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimpanPenyimpananRequest extends FormRequest
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
            'kode' => ['bail', 'required', 'unique:penyimpanan,kode', 'min:3', 'max:255'],
            'id_gudang' => ['required'],
            'jumlah_barang' => ['required', 'numeric', 'min:0', 'min_digits:2', 'max_digits:11'],
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
            'kode.required' => 'Kode Penyimpanan Harus diisi.',
            'kode.unique' => 'Kode Penyimpanan Sudah ada, Tips: berikan penanda seperti huruf maupun angka dibelakang kode penyimpanan.',
            'kode.min_digits' => 'Kode Penyimpanan Harus lebih dari 3 Huruf.',
            'kode.max_digits' => 'Kode Penyimpanan Tidak dapat lebih dari 255 Huruf.',
            'id_gudang.required' => 'Id Gudang Harus diisi.',
            // 'id_gudang.uuid' => 'Id Gudang Tidak Valid, harus sesuai dengan id gudang yang sudah ada',
            'jumlah_barang.required' => 'Jumlah Barang Harus diisi.',
            'jumlah_barang.numeric' => 'Jumlah Barang Harus berupa bilangan bulat.',
            'jumlah_barang.min_digits' => 'Jumlah Barang Harus lebih dari 1 digit',
            'jumlah_barang.max_digits' => 'Jumlah Barang Harus kurang dari 11 digit'
        ];
    }
}
