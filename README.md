# Webcontact
An AsgardCMS module to handle a front end contact form, capture the data and send an email if required.

#### INSTALL MODULE AND CONFIGURE FOR BACKEND USE
This module is designed to accept front end contact form details and both store the contact in the database and email the contact to require recipients. By default the data requested and stored is, Name, Phone, Email, Subject and Message. If different data is required, customise the module before running the migrate command. See the customise section for details.
1.	Copy module into the site modules folder.

    a.	Modules\Webcontact

2.	Run module migration command in a terminal.

    a.	php artisan module:migrate Webcontact

3.	In the backend edit user roles permissions and give Index, Destroy and View permissions to the Webcontact module. Create and Update can be given but due to this being based on front end contacts there should be no need to create or edit them in the backend.

4.	Edit config\app.php to include the Html alias, this is used to display a clickable email address in the View.

    'Html'     => Collective\Html\HtmlFacade::class,

 
#### CONFIGURE FRONT END USE
1.	Create a form either in an existing view in your theme or create a new view for the purpose. 

    a.	Sample form for use with this module can be found in Modules\Webcontact\Resources\views\forms\contactForm.blade.php

    b.	Copy the contents of the sample form into your view (I have no idea how to include it from the module right now) and edit as required.

2.	Email details are taken from the .env file so the following need to be added.
    
    MAIL_CONTACT_SEND_MAIL=true
    
    MAIL_CONTACT_RECIPIENTS=testman@mail.com|testgirl@mail.com
    
    MAIL_CONTACT_SUBJECT=Sample subject 
    
    MAIL_CONTACT_THANKYOU=Your email has been successfully sent thank you for contacting us.

    a.	Recipients can be separated by | so that multiple can receive an email.

    b.	If MAIL_CONTACT_SEND_MAIL is ‘false’ then an email will not be sent the contact details will only be captured in the database. Set to ‘true’ to send emails.

3.	Be sure to edit config\mail.php to include mail server details, type, address, from details, user name and password.

4.	Create a page using the contact view and see what happens.

5.	If successful check that email was sent and check that message can be viewed in the backend.
 

#### CUSTOMISE
The following files can be altered to customise the module. Best to make changes before running the migrate command.
1.	To add or remove database fields edit the file
    2016_03_29_000315935065_create_webcontact_webcontacts_table.php

    a.	Or create a new migration file as required.

2.	To alter which fields are fillable edit

    a.	Modules\Webcontact\Entities\Webcontact.php

3.	To alter what is shown / available on the backend edit the following files as required

    a.	Modules\Webcontact\Resources\views\admin\webcontacts\index.blade.php

    b.	Modules\Webcontact\Resources\views\admin\webcontacts\partials\create-fields.blade.php

    c.	Modules\Webcontact\Resources\views\admin\webcontacts\partials\edit-fields.blade.php

    d.	Modules\Webcontact\Resources\views\admin\webcontacts\partials\view-fields.blade.php

4.	To alter which fields are ‘required’ alter the files (default is Name, Email, Subject and Message)

    a.	Modules\Webcontact\Http\Requests\CreateWebContactRequest.php

    b.	Modules\Webcontact\Http\Requests\UpdateWebContactRequest.php

5.	To edit the contents of the email that is sent edit the file

    a.	Modules\Webcontact\Resources\views\emails\contactEmail.blade.php

6.	Edit the actual front end form as required based on previous instructions.
