@component('mail::message')
<h4>Chúc mừng {{ $customer->name}} đăng ký thành công</h4>
<p>Dưới đây là thông tin của bạn:</p>
<ul>
    <li>Email : {{ $customer->email }}</li>
    <li>Phone : {{ $customer->phone }}</li>
</ul>
@endcomponent