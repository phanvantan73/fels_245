<footer class="footer">
    <div class="container">
        <!-- Newsletter -->
        <div class="newsletter">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>{{ trans('message.subcribe') }}</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="newsletter_form_container mx-auto">
                        {!! Form::open(['url' => '', 'method' => 'post']) !!}
                        {!! Form::token() !!}
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                            {!! Form::text('newsletter_email', null, ['class' => 'newsletter_email', 'placeholder' => trans('message.enter_email'), 'id' => 'newsletter_email']) !!}
                            {!! Form::submit(trans('message.subcribe'), ['class' => 'newsletter_submit_btn trans_300', 'id' => 'newsletter_submit']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Content -->
        <div class="footer_content">
            <div class="row">
                <!-- Footer Column - About -->
                <div class="col-lg-3 footer_col">
                    <!-- Logo -->
                    <div class="logo_container">
                        <div class="logo">
                            {{ Html::image('') }}
                            <span>{{ trans('message.courses') }}</span>
                        </div>
                    </div>
                    <p class="footer_about_text">{{ trans('message.description') }} </p>
                </div>
                <!-- Footer Column - Menu -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">{{ trans('message.menu') }}</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_list_item"><a href="#">{{ trans('message.home') }}</a></li>
                            <li class="footer_list_item"><a href="#">{{ trans('message.about_us') }}</a></li>
                            <li class="footer_list_item"><a href="#">{{ trans('message.courses') }}</a></li>
                            <li class="footer_list_item"><a href="#">{{ trans('message.event') }}</a></li>
                            <li class="footer_list_item"><a href="#">{{ trans('message.news') }}</a></li>
                            <li class="footer_list_item"><a href="#">{{ trans('message.contact_us') }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Column - Contact -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">{{ trans('message.contact_us') }}</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    {{ Html::image('') }}
                                </div>
                                {{ trans('message.our_address') }}
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    {{ Html::image('') }}
                                </div>
                                {{ trans('message.our_phone_number') }}
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    {{ Html::image('') }}
                                </div>
                                {{ trans('message.our_email') }}
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer Copyright -->
        <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
            <div class="footer_copyright">
                <span>
                        {{ trans('message.copy') }} &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{ trans('message.all_rights_reserved') }}
                </span>
            </div>
        </div>
    </div>
</footer>
