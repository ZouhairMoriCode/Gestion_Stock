@extends('layouts.app')

@section('content')
<div class="text-center py-5">
    <h2 class="display-4 mb-4">Welcome to Stock Management System</h2>
    <p class="lead mb-4">Manage your inventory and customers efficiently</p>
    <div class="d-flex justify-content-center gap-3">
        <a href="/customers" class="btn btn-primary btn-lg shadow-sm">List of Customers</a>
        <a href="/suppliers" class="btn btn-success btn-lg shadow-sm">List of Suppliers</a>
        <a href="/products" class="btn btn-info btn-lg shadow-sm">List of Products</a>
        <a href="/products-by-category" class="btn btn-warning btn-lg shadow-sm">Products by Category</a>
        <a href="/products-by-supplier" class="btn btn-secondary btn-lg shadow-sm">Products by Supplier</a>
        <a href="/products-by-store" class="btn btn-dark btn-lg shadow-sm">Products by Store</a>
        <a href="{{ route('orders.index') }}" class="btn btn-danger btn-lg shadow-sm">Orders by Customer</a>
    </div>
    <br><br><br><br><br>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row gy-4">
    
                    {{-- Cookie section --}}
                    <div class="col-md-6">
                        <div class="card shadow-sm p-3">
                            <h5>Hola mi hermano</h5>
                            @if (Cookie::has('Username'))
                                <h1 class="text-primary">{{ Cookie::get('Username') }}</h1>
                            @endif
    
                            <form method="POST" action="saveCookie" class="mt-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="txtCookie" class="form-label">Entrer votre nom:</label>
                                    <input type="text" id="txtCookie" name="txtCookie" class="form-control" />
                                </div>
                                <button class="btn btn-primary w-100">Save Cookie</button>
                            </form>
                        </div>
                    </div>
    
                    {{-- Session section --}}
                    <div class="col-md-6">
                        <div class="card shadow-sm p-3">
                            <h5>Hola hermano en tu espacio</h5>
                            @if (Session::has('SessionName'))
                                <h1 class="text-success">{{ Session("SessionName") }}</h1>
                            @endif
    
                            <form method="POST" action="saveSession" class="mt-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="txtSession" class="form-label">Entrer votre nom:</label>
                                    <input type="text" id="txtSession" name="txtSession" class="form-control" />
                                </div>
                                <button class="btn btn-success w-100">Save Session</button>
                            </form>
                        </div>
                    </div>
    
                    {{-- Avatar section --}}
                    <div class="col-12">
                        <div class="card shadow-sm p-3">
                            <form method="POST" action="{{ route('saveAvatar') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="avatarFile" class="form-label">@lang('Choose your picture')</label>
                                    <input type="file" id="avatarFile" name="avatarFile" />
                                </div>
                                <button class="btn btn-warning w-100 mb-3">
                                    {{ __('Save picture') }} {{ trans("for your account") }}
                                </button>
    
                                @isset($name)
                                    <div class="text-center">
                                        <img style="width: 200px; border-radius: 50%;" src="{{ asset('storage/avatars/'.$pic) }}" alt="avatar">
                                    </div>
                                @endisset
                            </form>
                            <small class="text-muted d-block mt-2">* Executez <code>php artisan storage:link</code> </small>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection