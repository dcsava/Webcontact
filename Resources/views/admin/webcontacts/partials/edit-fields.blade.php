<div class="box-body">
    {!! Form::normalInput('contact_name', 'Name', $errors, $webcontact) !!}
    {!! Form::normalInput('contact_phone', 'Phone', $errors, $webcontact) !!}
    {!! Form::normalInput('contact_email', 'Email', $errors, $webcontact) !!}
    {!! Form::normalInput('contact_subject', 'Subject', $errors, $webcontact) !!}
    {!! Form::normalTextarea('contact_message', 'Message', $errors, $webcontact) !!}
</div>