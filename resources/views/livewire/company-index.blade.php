<!-- resources/views/livewire/company-index.blade.php -->
@extends('layouts.app')

@section('content')
<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($isModalOpen)
        @include('livewire.create-company')
    @endif

    <button wire:click="create()" class="btn btn-primary">Create New Company</button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td class="border px-4 py-2">{{ $company->name }}</td>
                <td class="border px-4 py-2">{{ $company->description }}</td>
                <td class="border px-4 py-2">
                    <button wire:click="edit({{ $company->id }})" class="btn btn-secondary">Edit</button>
                    <button wire:click="delete({{ $company->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
