@component('mail::message')

# Hi {{$reservation->name}}

Thank you for booking with **{{config('app.name')}}**
We Are happy to serve you . <br>
Your Reservation in

- Restaurant :  **{{$reservation->restaurant->name}}**
- Booking Number **{{$reservation->booking_number}}**
- Guest **{{$reservation->person_number}}**

has Been **<span class="text-success">Confirmed</span>** Enjoy for it

@component('mail::button', ['url' => 'https://www.fnbtime.com/client'])
   Check All Reservation
@endcomponent

Our Regard,<br>
  {{ config('app.name') }} Team
@endcomponent
