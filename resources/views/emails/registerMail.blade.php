@component('mail::message')	
	<div>
		<p>{{__('Hi ').$name}}</p>
		<p>Thank You for Register our site <b>{{ env('APP_NAME') }}</b> </p>
		<p>You can login on site {{ env('APP_URL') }}.</p>
		<br/>
		
		<p>Regards</p>
		<p>{{ env('ADMIN_NAME') }}</p>
		<p>If you have any concern please feel free to contact at {{ env('ADMIN_MAIL') }}</p>
	</div>
@endcomponent