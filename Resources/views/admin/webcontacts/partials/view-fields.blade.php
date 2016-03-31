<div class="box-body">
    <div><label>Name</label></div>
    <div class="form-control">{!! $webcontact->contact_name !!}</div>
    <br>
    <div><label>Phone</label></div>
    <div class="form-control">{!! $webcontact->contact_phone !!}</div>
    <br>
    <div><label>Email</label></div>
    <div class="form-control">
        {!! Html::mailto($webcontact->contact_email, $webcontact->contact_email) !!}
    </div>
    <br>
    <div><label>Subject</label></div>
    <div class="form-control">{!! $webcontact->contact_subject !!}</div>
    <br>
    <div><label>Message</label></div>
    <div class="form-control" style="overflow:auto;height:auto;">{!! $webcontact->contact_message !!}</div>
</div>
