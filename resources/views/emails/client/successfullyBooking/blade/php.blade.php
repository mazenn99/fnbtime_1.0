@component('mail::message')

# Hi {{$reservation->name}}

Thank you for booking with **{{config('app.name')}}**
We Are happy to serve you .

- Your Reservation in **{{$reservation->restaurant->name}}**
- Booking Number **{{$reservation->booking_number}}**
- Guest **{{$reservation->person_number}}**

We Confirm Your Reservation Via 24 hours And Email you

@component('mail::button', ['url' => 'https://www.fnbtime.com/client'])
Check All Reservation
@endcomponent

Our Regard,<br>
{{ config('app.name') }},Team
@endcomponent
