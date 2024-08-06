<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbahGudangRequest extends FormRequest
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
            'nm_tempat' => ['bail', 'required', 'min:5', 'max:255'],
            'lokasi' => ['required', 'string', 'min:10', 'max:255'],
            'nm_supervisor' => ['required', 'min:4', 'max:255'],
            'kapasitas' => ['required', 'numeric', 'min:0', 'min_digits:4', 'max_digits:11']
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
            'nm_tempat.required' => 'Nama Gudang Harus diisi.',
            'nm_tempat.min' => 'Nama Gudang Harus lebih dari 5 Huruf.',
            'nm_tempat.max' => 'Nama Gudang Tidak dapat lebih dari 255 Huruf.',
            'lokasi.required' => 'Lokasi Gudang Harus diisi.',
            'lokasi.min' => 'Lokasi Gudang Harus lebih dari 10 Huruf.',
            'lokasi.max' => 'Lokasi Gudang Tidak dapat lebih dari 255 Huruf.',
            'nm_supervisor.required' => 'Nama Supervisor Harus diisi.',
            'nm_supervisor.min' => 'Nama Supervisor Harus lebih dari 4 Huruf.',
            'nm_supervisor.max' => 'Nama Supervisor Tidak dapat lebih dari 255 Huruf.',
            'kapasitas.required' => 'Kapasitas Gudang Harus diisi.',
            'kapasitas.numeric' => 'Kapasitas Gudang Harus berupa angka.',
            'kapasitas.min_digits' => 'Kapasitas Gudang Harus lebih dari 4 Digit.',
            'kapasitas.max_digits' => 'Kapasitas Gudang Tidak dapat lebih dari 11 Digit.',
        ];
    }
}
