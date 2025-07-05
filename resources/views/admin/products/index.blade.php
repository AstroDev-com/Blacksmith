@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>{{ __('dashboard.products') }}</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">{{ __('dashboard.create_product') }}</a>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('dashboard.name') }}</th>
                    <th>{{ __('dashboard.description') }}</th>
                    <th>{{ __('dashboard.image') }}</th>
                    <th>{{ __('dashboard.status') }}</th>
                    <th>{{ __('dashboard.category') }}</th>
                    <th>{{ __('dashboard.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{ asset( $product->image) }}" alt="{{ $product->name }}" width="100"></td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">{{ __('dashboard.view') }}</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">{{ __('dashboard.edit') }}</a>
                            <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-danger">{{ __('dashboard.delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection