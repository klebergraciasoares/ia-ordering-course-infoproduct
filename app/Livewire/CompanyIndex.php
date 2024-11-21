<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company; // Importe a sua entidade Company

// App\Http\Livewire\CompanyIndex.php
class CompanyIndex extends Component { 
    public $companies, $name, $description, $company_id;
    public $isModalOpen = 0;
    
    public function companies() 
    { // Lógica para listar as empresas
        //dd("companies....");
        // Lógica para listar as empresas 
        
        $this->companies = Company::all(); 
        // Supondo que você tenha um modelo Company 
        return view('livewire.company-index', ['companies' => $this->companies, 'isModalOpen' => $this->isModalOpen]);
    }
    
    public function render() {
        dd("Render");
        $this->companies = Company::all();
        return view('livewire.company-index');
    }
    
    public function create() {
        dd("create");
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function openModal() {
        $this->isModalOpen = true;
    }
    
    public function closeModal() {
        $this->isModalOpen = false;
    }
    
    private function resetInputFields() {
        $this->name = '';
        $this->description = '';
        $this->company_id = '';
    }
    
    public function store() {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);
        
        Company::updateOrCreate(['id' => $this->company_id], [
            'name' => $this->name,
            'description' => $this->description,
        ]);
        
        session()->flash('message', $this->company_id ? 'Company Updated Successfully.' : 'Company Created Successfully.');
        
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id) {
        $company = Company::findOrFail($id);
        $this->company_id = $id;
        $this->name = $company->name;
        $this->description = $company->description;
        
        $this->openModal();
    }
    
    public function delete($id) {
        Company::find($id)->delete();
        session()->flash('message', 'Company Deleted Successfully.');
    }
}
