<?php

namespace App\Controllers;

use App\Models\AssetModel;

class Home extends BaseController
{
	protected $model;
	public function __construct()
	{
		$this->model = new AssetModel();
	}
	public function index()
	{
		return view('Login/index');
	}

	public function asset()
	{
		$aset = $this->model->getData();
		$data = [
			'aset' => $aset,
		];
		return view('Admin/Asset/index', $data);
	}
	public function asset_add()
	{

		return view('Admin/Asset/tambah');
	}
	public function asset_edit($id)
	{
		$aset = $this->model->getData($id);
		$data = [
			'aset' => $aset
		];
		return view('Admin/Asset/edit', $data);
	}
	public function save()
	{
		//echo $this->request->getVar('no_kontrak');
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'no_kontrak' => $this->request->getVar('no_kontrak'),
			'jenis_aset' => $this->request->getVar('jenis_aset'),
			'lokasi' => $this->request->getVar('lokasi'),
			'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
			'tanggal_berakhir' => $this->request->getVar('tanggal_berakhir'),
			'saldo' => $this->request->getVar('saldo'),

		];
		$this->model->save($data);
		session()->setFlashdata('pesan', 'Tambah data berhasil');
		return redirect()->to('/asset');
	}

	public function update($id)
	{
		//dd($this->request->getVar());
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'id' => $id,
			'no_kontrak' => $this->request->getVar('no_kontrak'),
			'jenis_aset' => $this->request->getVar('jenis_aset'),
			'lokasi' => $this->request->getVar('lokasi'),
			'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
			'tanggal_berakhir' => $this->request->getVar('tanggal_berakhir'),
			'saldo' => $this->request->getVar('saldo'),

		];
		$this->model->save($data);
		session()->setFlashdata('pesan', 'Ubah data berhasil');
		return redirect()->to('/asset');
	}



	public function delete($id)
	{
		$this->model->delete($id);
		return redirect()->to('/asset');
	}

	public function info($id)
	{
		$aset = $this->model->getData($id);
		$data = [
			'aset' => $aset,
		];
		return view('Admin/Asset/info', $data);
	}



	public function users()
	{
		return view('Admin/Users/index');
	}
	public function history()
	{
		return view('Admin/History/index');
	}
}
