<div>
    @yield('content')
</div>

<div>
    <p>
        @lang('message.please_email')
    </p>

    <a href="{{ route('home') }}" class="btn btn-info">
        @lang('message.btn_email')
    </a>

    <p>
        @lang('message.thanks_email')
    </p>
</div>

<div>
    <div>@lang('message.contact_us')</div>
    <div>
        <ul>
            <li>@lang('message.our_address')</li>
            <li>@lang('message.our_phone_number')</li>
            <li>@lang('message.our_email')</li>
        </ul>
    </div>
</div>
