<div class="box-body">
    {!! Form::normalInput('contact_name', 'Name', $errors) !!}
    {!! Form::normalInput('contact_phone', 'Phone', $errors) !!}
    {!! Form::normalInput('contact_email', 'Email', $errors) !!}
    {!! Form::normalInput('contact_subject', 'Subject', $errors) !!}
    {!! Form::normalTextarea('contact_message', 'Message', $errors) !!}
</div>