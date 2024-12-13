

<x-mail::message>
# Post Created Successfully

Hello, **{{ ucfirst($userName) }}** 
Your post **{{ ucfirst($postTitle) }}** has been successfully created! 


You can now view and manage your post on your dashboard.


Thank you for using our platform!

If you have any questions, feel free to contact our support team.

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
