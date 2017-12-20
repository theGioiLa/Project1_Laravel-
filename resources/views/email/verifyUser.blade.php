
@component('mail::message')
# Mã kích hoạt
Chào mừng đến với cửa hàng, đây là mã kích hoạt tài khoản của bạn:
@component('mail::button', ['url' => url('user/verify', $user->verifyUser->token)])
Kích hoạt tài khoản
@endcomponent

@endcomponent
