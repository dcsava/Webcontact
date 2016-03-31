@include('flash::message')
{!! Form::open(['route' => 'contact.post']) !!}
<div class="row">
    <div class="col-xs-6 col-md-6 form-group {{ $errors->first('contact_name') ? 'has-error' : '' }}">
        {!! Form::text('contact_name', '', [
            'class' => 'form-control',
            'placeholder' => 'Name'
            ])
        !!}
        @if($errors->first('contact_name'))
            <span class="help-block text-left">&nbsp;&nbsp;{!! $errors->first('contact_name') !!}</span>
        @endif
    </div>
    <div class="col-xs-6 col-md-6 form-group {{ $errors->first('contact_phone') ? 'has-error' : '' }}">
        {!! Form::text('contact_phone', '', [
            'class' => "form-control",
            'placeholder' => 'Phone'
            ])
        !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 form-group {{ $errors->first('contact_email') ? 'has-error' : '' }}">
        {!! Form::email('contact_email', '', [
            'class' => "form-control",
            'placeholder' => 'Email'
            ])
        !!}
        @if($errors->first('contact_email'))
            <span class="help-block text-left">&nbsp;&nbsp;{!! $errors->first('contact_email') !!}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 form-group {{ $errors->first('contact_subject') ? 'has-error' : '' }}">
        {!! Form::text('contact_subject', '', [
            'class' => "form-control",
            'placeholder' => 'Subject'
            ])
        !!}
        @if($errors->first('contact_subject'))
            <span class="help-block text-left">&nbsp;&nbsp;{!! $errors->first('contact_subject') !!}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 form-group {{ $errors->first('contact_message') ? 'has-error' : '' }}">
        {!! Form::textarea('contact_message', '', [
            'class' => "form-control",
            'placeholder' => 'Message'
            ])
        !!}
        @if($errors->first('contact_message'))
            <span class="help-block text-left">&nbsp;&nbsp;{!! $errors->first('contact_message') !!}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 form-group">
        {!! Form::submit('Send', [
                'class' => "btn btn-primary pull-right"
            ])
        !!}
    </div>
</div>
{!! Form::close() !!}