@extends('backend.layouts.app')

@section('title', __('Order Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Tag')
        </x-slot>
    
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.order.index')" :text="__('Back')" />
        </x-slot>
        <x-slot name="body">
            <p><strong>Mã đơn hàng</strong>: {{ $order->code }}</p>
            <p><strong>Ngày đặt hàng</strong>: {{ $order->created_at->format('d-m-Y') }}</p>
            <p><strong>Số điện thoại</strong>: {{ $order->customer_phone }}</p>
            <p><strong>Trạng thái</strong>: {{ $order->status_label }}</p>

            @if($order->orderDetail->isNotEmpty())
                <h3>Sản phẩm</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="cursor:pointer;">Tên sản phẩm</th>
                            <th style="cursor:pointer;">Số lượng</th>
                            <th style="cursor:pointer;">Giá tiền</th>
                            <th style="cursor:pointer;">Thành tiền</th>
                        </tr>
                        @php $total = 0 ; @endphp
                        @foreach ($order->orderDetail as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ number_format($product->product_price) }}</td>
                                <td>{{ number_format($product->product_price * $product->quantity) }}</td>
                            </tr>
                            @php $total += $product->product_price * $product->quantity @endphp
                        @endforeach
                        <tr>
                            <td align="right" colspan="2"><strong>Tổng tiền</strong></td>
                            <td align="right" colspan="2">{{ number_format($total) }}</td>
                        </tr>
                    </thead>
                </table>
            @endif
        </x-slot>
        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Account Created'):</strong> @displayDate($order->created_at) ({{ $order->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($order->updated_at) ({{ $order->updated_at->diffForHumans() }})
    
                {{-- @if($tags->trashed())
                    <strong>@lang('Account Deleted'):</strong> @displayDate($tags->deleted_at) ({{ $tags->deleted_at->diffForHumans() }})
                @endif --}}
            </small>
        </x-slot>
    </x-backend.card>
@endsection